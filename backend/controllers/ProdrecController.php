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
/**
 * ProdrecController implements the CRUD actions for Prodrec model.
 */
class ProdrecController extends Controller
{
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
                        'actions'=>['index','create','update','delete','view','bill','invoice','findzone'],
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
        $pageSize = \Yii::$app->request->post("perpage");
        $searchModel = new ProdrecSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = $pageSize;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
            $model->trans_date = strtotime($model->trans_date);
            if($model->save()){
                array_push($data,['product_id'=>$model->raw_type,'qty'=>$model->qty,'price'=>$model->plan_price]);
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
    public function actionBill(){
        $model = \backend\models\Plant::find()->one();
        $modeladdress = \backend\models\AddressBook::find()->where(['party_id'=>1])->one();

        $pdf = new Pdf([
            'mode' => Pdf::MODE_ASIAN, // leaner size using standard fonts
          //  'format' => [150,236], //manaul
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('_bill',[
                'model'=>$model,
                'modeladdress' => $modeladdress
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
            ]
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
