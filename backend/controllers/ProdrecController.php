<?php

namespace backend\controllers;

use Yii;
use backend\models\Prodrec;
use backend\models\ProdrecSearch;
use yii\helpers\Json;
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
                        'actions'=>['index','create','update','delete','view','bill','invoice','findzone','callbill','findsupcode'],
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
     //   $dataProvider->query->andFilterWhere(['and',['>=','trans_date',$from_date],['<=','trans_date',$to_date]]);
        $dataProvider->query->andFilterWhere(['LIKE','suplier_id',$sup_select]);


        $dataProvider->pagination->pageSize = $pageSize;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'txt_search' => $txt_search,
            'sup_select' => $sup_select,
            'from_date'=>trim($bill_date[0]),
            'to_date'=>trim($bill_date[1]),
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

        if ($model->load(Yii::$app->request->post())) {

            $prod_recid = Yii::$app->request->post('product_id');
            $line_zone = Yii::$app->request->post('line_zone_id');
            $line_lot = Yii::$app->request->post('line_lot');
            $line_qty = Yii::$app->request->post('line_zone_qty');


            $has_issue = Yii::$app->request->post('has_issue');
            $product_issue_id = Yii::$app->request->post('product_issue_id');
            $line_issue_qty = Yii::$app->request->post('line_issue_qty');
            $line_issue_price = Yii::$app->request->post('line_issue_price');

             // echo count($product_issue_id);return;

             //print_r($line_qty);return;



            $model->status = 1;
            $model->trans_date = strtotime($model->trans_date);
            if($model->save()){

                if(count($prod_recid)>0){

                    for($i=0;$i<=count($prod_recid)-1;$i++){
                        if($prod_recid[$i]==''){continue;}
                        $zone_line = explode(",",$line_zone[$i]);
                        $qty_line = explode(",",$line_qty[$i]);
                        if(count($zone_line)>0){
                                for($m=0;$m<=count($zone_line)-1;$m++){
                                    $data = [];
                                    $modelrec = new \backend\models\Prodrecline();
                                    $modelrec->prod_rec_id = $model->id;
                                    $modelrec->product_id = $prod_recid[$i];
                                    $modelrec->zone_id = $zone_line[$m];
                                    $modelrec->lot_no = $line_lot[$i];
                                    $modelrec->qty = $qty_line[$m];
                                    $modelrec->line_type = 1; // รับสินค้า
                                    $modelrec->list_zone = $line_zone[$i];
                                    $modelrec->list_qty = $line_qty[$i];

                                    if($modelrec->save(false)){
                                        array_push($data,['product_id'=>$prod_recid[$i],'qty'=>$qty_line[$m],'price'=>$model->plan_price]);
                                        \backend\models\Journal::createTrans($zone_line[$m],$data,'','');
                                    }
                                }
                            }

                    }
                }

                if($has_issue ==1 && count($product_issue_id)>0){
                    for($i=0;$i<=count($product_issue_id)-1;$i++){
                        $data = [];
                        if($product_issue_id[$i]==''){continue;}

                        $modelrec = new \backend\models\Prodrecline();
                        $modelrec->prod_rec_id = $model->id;
                        $modelrec->product_id = $product_issue_id[$i];
                       // $modelrec->zone_id = $line_zone[$i];
                       // $modelrec->lot_no = $line_lot[$i];
                        $modelrec->qty = $line_issue_qty[$i];
                        $modelrec->price = $line_issue_price[$i];
                        $modelrec->line_type = 2; // เบิกสินค้า

                        if($modelrec->save(false)){
//                            array_push($data,['product_id'=>$prod_recid[$i],'qty'=>$line_qty[$i],'price'=>$model->plan_price]);
//                            \backend\models\Journal::createTrans($line_zone[$i],$data,'','');
                        }
                    }
                }

                //array_push($data,['product_id'=>$model->raw_type,'qty'=>$model->qty,'price'=>$model->plan_price]);
               // print_r($data);return;
                //\backend\models\Journal::createTrans($model->zone_id,$data,'','');

                $session = Yii::$app->session;
                $session->setFlash('msg','บันทึกรายการเรียบร้อย');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'runno' => $model->getLastNo(),
            'modelissue'=>null,
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
        $modelrec = \backend\models\Prodrecline::find()->where(['prod_rec_id'=>$id,'line_type'=>1])->all();
        $modelissue = \backend\models\Prodrecline::find()->where(['prod_rec_id'=>$id,'line_type'=>2])->all();
        $modelrecline = \common\models\QueryProdrecline::find()->where(['prod_rec_id'=>$id])->all();

        if ($model->load(Yii::$app->request->post())) {

            $prod_recid = Yii::$app->request->post('product_id');
            $line_zone = Yii::$app->request->post('line_zone_id');
            $line_lot = Yii::$app->request->post('line_lot');
            $line_qty = Yii::$app->request->post('line_zone_qty');

//            print_r($prod_recid);return;

            $has_issue = Yii::$app->request->post('has_issue');
            $product_issue_id = Yii::$app->request->post('product_issue_id');
            $line_issue_qty = Yii::$app->request->post('line_issue_qty');
            $line_issue_price = Yii::$app->request->post('line_issue_price');

            $model->status = 1;
            $model->trans_date = strtotime($model->trans_date);
            if($model->save()){

                if(count($prod_recid)>0){
                    \backend\models\Prodrecline::deleteAll(['prod_rec_id'=>$model->id,'line_type'=>1]);
                    for($i=0;$i<=count($prod_recid)-1;$i++){
                        if($prod_recid[$i]==''){continue;}
                       // print_r($prod_recid);return;
                        $zone_line = explode(",",$line_zone[$i]);
                        $qty_line = explode(",",$line_qty[$i]);

                        if(count($zone_line)>0){
                            for($m=0;$m<=count($zone_line)-1;$m++){
                                $modelrec = new \backend\models\Prodrecline();
                                $modelrec->prod_rec_id = $model->id;
                                $modelrec->product_id = $prod_recid[$i];
                                $modelrec->zone_id = $zone_line[$m];
                                $modelrec->lot_no = $line_lot[$i];
                                $modelrec->qty = $qty_line[$m];
                                $modelrec->line_type = 1; // รับสินค้า
                                $modelrec->list_zone = $line_zone[$i];
                                $modelrec->list_qty = $line_qty[$i];

                                if($modelrec->save(false)){
//                                    array_push($data,['product_id'=>$prod_recid[$i],'qty'=>$qty_line[$m],'price'=>$model->plan_price]);
//                                    \backend\models\Journal::createTrans($zone_line[$m],$data,'','');
                                }
                            }
                        }


                    }
                }

                if($has_issue ==1 && count($product_issue_id)>0){
                    \backend\models\Prodrecline::deleteAll(['prod_rec_id'=>$model->id,'line_type'=>2]);
                    for($i=0;$i<=count($product_issue_id)-1;$i++){
                        if($product_issue_id[$i]==''){continue;}

                        $modelrec = new \backend\models\Prodrecline();
                        $modelrec->prod_rec_id = $model->id;
                        $modelrec->product_id = $product_issue_id[$i];
                        // $modelrec->zone_id = $line_zone[$i];
                        // $modelrec->lot_no = $line_lot[$i];
                        $modelrec->qty = $line_issue_qty[$i];
                        $modelrec->price = $line_issue_price[$i];
                        $modelrec->line_type = 2; // เบิกสินค้า

                        if($modelrec->save(false)){
//                            array_push($data,['product_id'=>$prod_recid[$i],'qty'=>$line_qty[$i],'price'=>$model->plan_price]);
//                            \backend\models\Journal::createTrans($line_zone[$i],$data,'','');
                        }
                    }
                }else{
                    \backend\models\Prodrecline::deleteAll(['prod_rec_id'=>$model->id,'line_type'=>2]);
                }

                $session = Yii::$app->session;
                $session->setFlash('msg','บันทึกรายการเรียบร้อย');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelrec'=> $modelrec,
            'modelissue'=>$modelissue,
            'modelrecline'=>$modelrecline,

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

       // print_r(Yii::$app->request->post()); return;

        $sup = Yii::$app->request->post('sup');
        $txt_search = Yii::$app->request->post('txt_search');
        $from_date = Yii::$app->request->post('from_date');
        $to_date = Yii::$app->request->post('to_date');

        $model = \backend\models\Plant::find()->one();
        $modeladdress = \backend\models\AddressBook::find()->where(['party_id'=>1])->one();


        $supname = '';
        $modelsup = \backend\models\Suplier::find()->where(['id'=>$sup])->one();
        if($modelsup){
            $supname = $modelsup->name;
        }

        $modelline = \backend\models\Prodrec::find()
            ->andFilterWhere(['or',['LIKE','journal_no',$txt_search],['LIKE','qty',$txt_search]])
            ->andFilterWhere(['and',['>=','trans_date',strtotime($from_date)],['<=','trans_date',strtotime($to_date)]])
            ->andFilterWhere(['like','suplier_id',$sup])->all();
      //  echo $sup;return;

        if(!$modelline){ return;}

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
                'sup'=>$supname,
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
//            'modelline'=>$modelline,
//            'modeladdress' => $modeladdress,
//            'sup'=>$supname,
//            'bill_date'=>$from_date,
//        ]);
    }
    public function actionFindsupcode($id){
        $model = \backend\models\Suplier::find()->where(['id'=>$id])->one();
        echo count($model)>0?$model->vendor_code:'';
       // echo $id;
    }
    public function actionFindzone($id,$qty){
       //return $id;

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
                   $json = [];
                   $xqty = 0;
                   foreach ($modelzone as $data){
                       $zon = $data->name;
                       if($data->qty == 0){
                           if($data->max_qty > $qty){
                               array_push($json,['id'=>$data->id,'name'=>$data->name,'qty'=>$qty]);
                               return Json::encode($json);
                           }else{
                               if($qty > $data->max_qty){
                                   array_push($json,['id'=>$data->id,'name'=>$data->name,'qty'=>$data->max_qty]);
                                   $qty = $qty - $data->max_qty;
                               }else{
                                   array_push($json,['id'=>$data->id,'name'=>$data->name,'qty'=>$qty]);
                               }

                           }
                           //echo "<option value='" .$data->id. "'>$data->name</option>";
                         // array_push($json,['id'=>$data->id,'name'=>$data->name,'qty'=>$data->max_qty]);
                       }
                   }
                   return Json::encode($json);
               }else{
                   //echo "<option>-</option>";
                  return null;
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
