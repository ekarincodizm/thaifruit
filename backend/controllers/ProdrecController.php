<?php

namespace backend\controllers;

use Yii;
use backend\models\Prodrec;
use backend\models\ProdrecSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;

date_default_timezone_set('Asia/Bangkok');
/**
 * ProdrecController implements the CRUD actions for Prodrec model.
 */
class ProdrecController extends Controller
{
    public $enableCsrfValidation =false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'allow'=>true,
                        'actions'=>['index','create','update','delete','view','bill','invoice','findzone','callbill'],
                        'roles'=>['@'],
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Prodrec models.
     * @return mixed
     */
    public function actionIndex()
    {
//       $datetime = new \DateTime('01-07-2018');
//       echo $datetime->getTimestamp()."<br/>";
//       echo date('d-m-Y',$datetime->getTimestamp());
//       return;

        $post = Yii::$app->request->post();

        $txt_search = '';
        $sup_select = '';
        $bill_date =  '';

        $txt_search = Yii::$app->request->post('txt_search');
        $bill_date = explode('ถึง',Yii::$app->request->post('bill_range'));
        $sup_select = explode(',',Yii::$app->request->post('sup_select'));

       //print_r($bill_date);return;

        if($bill_date[0]!= null) {
            $from_date = strtotime($bill_date[0]);
            $to_date = strtotime($bill_date[1]);
        }else{
            $bill_date[0] = date('d-m-Y');
            $bill_date[1] = date('d-m-Y',strtotime(date('d-m-Y').'+7 days'));
            $from_date = strtotime($bill_date[0]);
            $to_date = strtotime($bill_date[1]);
        }


        $pageSize = \Yii::$app->request->post("perpage");
        $searchModel = new ProdrecSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->andFilterWhere(['or',['LIKE','journal_no',$txt_search],['LIKE','qty',$txt_search]]);
        $dataProvider->query->andFilterWhere(['and',['>=','trans_date',$from_date],['<=','trans_date',$to_date]]);


        $dataProvider->pagination->pageSize = $pageSize;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'txt_search' => $txt_search,
            'sup_select' => $sup_select,
            'from_date'=>$bill_date[0],
            'to_date'=>$bill_date[1],
            'perpage' => $pageSize,
        ]);
    }

    /**
     * Displays a single Prodrec model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prodrec model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prodrec();
        $data = [];
        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->trans_date = strtotime(date('d-m-Y',$model->trans_date));
            if($model->save()){
                array_push($data,['product_id'=>$model->raw_type,'qty'=>$model->qty,'price'=>$model->plan_price]);

               // print_r($data);return;
                \backend\models\Journal::createTrans($model->zone_id,$data,'','');

                $session = Yii::$app->session;
                $session->setFlash('msg','บันทึกรายการเรียบร้อย');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'runno' => $model->getLastNo(),
        ]);
    }

    /**
     * Updates an existing Prodrec model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->trans_date = strtotime($model->trans_date);
            if($model->save()){
                $session = Yii::$app->session;
                $session->setFlash('msg','บันทึกรายการเรียบร้อย');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,

        ]);
    }

    /**
     * Deletes an existing Prodrec model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prodrec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prodrec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prodrec::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function actionCallbill(){
        return $this->render('_tezt');
    }
    public function actionBill(){

        $sup = Yii::$app->request->post('sup');
        $from_date = Yii::$app->request->post('from_date');
        $to_date = Yii::$app->request->post('to_date');

        $model = \backend\models\Plant::find()->one();
        $modeladdress = \backend\models\AddressBook::find()->where(['party_id'=>1])->one();
        $modelline = \backend\models\Prodrec::find()->all();

        $pdf = new Pdf([
            'mode' => Pdf::MODE_ASIAN, // leaner size using standard fonts
          //  'format' => [150,236], //manaul
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('_bill',[
                'model'=>$model,
                'modelline'=>$modelline,
                'modeladdress' => $modeladdress,
                'sup'=>$from_date,
                'bill_date'=>$from_date,
                // 'list'=>$modellist,
                // 'from_date'=> $from_date,
                // 'to_date' => $to_date,
            ]),
            //'content' => "nira",
            'cssFile' => '@backend/web/css/pdf.css',
            'defaultFont' => 'Cloud-Light',
            'options' => [
                'title' => 'รายงานระหัสินค้า',
                'subject' => ''
            ],
            'methods' => [
              //  'SetHeader' => ['รายงานรหัสสินค้า||Generated On: ' . date("r")],
              //  'SetFooter' => ['|Page {PAGENO}|'],
                //'SetFooter'=>'niran',
            ],

        ]);

        return $pdf->render();


//        return $this->render('_bill',[
//            'model'=>$model,
//            'modeladdress' => $modeladdress
//        ]);
    }
    public function actionFindzone($id){
       // $model = \common\models\Zone::find()->where(['AMPHUR_ID' => $id])->all();

        $modelprod = \backend\models\Product::find()->where(['id'=>$id])->one();
        if($modelprod){
            $zonegroup = '';
            if($modelprod->zone_group==1){
                $zonegroup = 'A';
            }
            else if($modelprod->zone_group==2){
                $zonegroup = 'B';
            }
            else if($modelprod->zone_group==3){
                $zonegroup = 'C';
            }
          //  $maxqty = $modelprod->zone_qty_per;
          //  $currentqty = $modelprod->all_qty;
           if($zonegroup !=''){
               $modelzone = \backend\models\Zone::find()->where(['like','name',$zonegroup])->all();
               if($modelzone){
                   foreach ($modelzone as $data){
                       $zon = $data->name;
                       if($data->qty == 0){
                           echo "<option value='" .$data->id. "'>$data->name</option>";
                       }
                   }
               }else{
                   echo "<option>-</option>";
               }
           }
        }

//        if (count($model) > 0) {
//            foreach ($model as $value) {
//
//                echo "<option value='" . $value->DISTRICT_ID . "'>$value->DISTRICT_NAME</option>";
//
//            }
//        } else {
//            echo "<option>-</option>";
//        }
    }
}
