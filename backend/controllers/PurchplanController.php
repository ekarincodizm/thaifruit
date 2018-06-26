<?php

namespace backend\controllers;

use Yii;
use backend\models\Purchplan;
use backend\models\PurchplanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * PurchplanController implements the CRUD actions for Purchplan model.
 */
class PurchplanController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'allow'=>true,
                        'actions'=>['index','create','update','delete','view','calendaritem','createtitle','showcalendar','test','testsave','updateplan'],
                        'roles'=>['@'],
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Purchplan models.
     * @return mixed
     */

    public function actionIndex()
    {
        $pageSize = \Yii::$app->request->post("perpage");
        $searchModel = new PurchplanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = $pageSize;

        $modelevent = new \common\models\Event();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'perpage' => $pageSize,
            'modelevent'=>$modelevent,
        ]);
    }

    /**
     * Displays a single Purchplan model.
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
     * Creates a new Purchplan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Purchplan();

        if ($model->load(Yii::$app->request->post())) {
            $model->plan_date = strtotime($model->plan_date);
            if($model->save()){
                $session = Yii::$app->session;
                $session->setFlash('msg','บันทึกรายการเรียบร้อย');
                return $this->redirect(['index']);
            }
        }

        return $this->render('_test', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Purchplan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelline = \common\models\PurchPlanLine::find()->where(['plan_id'=>$id])->all();
        $modelrow = \common\models\PurchPlanLine::find()->select('plan_type')->where(['plan_id'=>$id])->distinct()->all();

        if ($model->load(Yii::$app->request->post())) {
           // $pdate = date_create($model->plan_date);

            $model->plan_date = strtotime($model->plan_date);
            if($model->save()){
                $session = Yii::$app->session;
                $session->setFlash('msg','บันทึกรายการเรียบร้อย');
                return $this->redirect(['index']);
            }
        }

        return $this->render('_test', [
            'model' => $model,
            'modelline'=> $modelline,
            'modelrow'=>$modelrow,
        ]);
    }

    /**
     * Deletes an existing Purchplan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

            $session = Yii::$app->session;
            $session->setFlash('msg','บันทึกรายการเรียบร้อย');
            return $this->redirect(['index']);
    }

    /**
     * Finds the Purchplan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Purchplan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Purchplan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionCalendaritem($start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

       // $times = \app\modules\timetrack\models\Timetable::find()->where(array('category'=>\app\modules\timetrack\models\Timetable::CAT_TIMETRACK))->all();
        //$times = \common\models\Event::find()->all();
        $times = \common\models\PurchPlan::find()->all();
        $events = [];

        foreach ($times AS $time){
            //Testing
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $time->id;
            $Event->title = $time->name;
            $Event->start = date('Y-m-d\TH:i:s\Z',$time->plan_date);
           // $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($time->end.' '.$time->end));
            $Event->backgroundColor = "blue";
            $events[] = $Event;
        }

        return $events;
    }
    public function actionCreatetitle(){
        $model = new \common\models\Event();
        if($model->load(Yii::$app->request->post())){
          //  echo Yii::$app->request->post('plan_date');return;
            $pdate = date_create(Yii::$app->request->post('plan_date'));
            //echo date_format($pdate,'d-m-Y');return;
            $model->start = strtotime(date_format($pdate,'d-m-Y'));
            if($model->save()){
                return $this->redirect(['index']);
            }
        }
    }
    public function actionShowcalendar(){
        $modelevent = new \common\models\Event();
        return $this->render('_plancalendar',['modelevent'=>$modelevent,]);
    }
    public function actionTest(){
       // return $this->render('_test');
    }
    public function actionTestsave(){
        $post = Yii::$app->request->post();
        $rows = Yii::$app->request->post('row');
        $row_edit = Yii::$app->request->post('row_id');
        // echo count($rows);

        if($post){
            $model = new \backend\models\Purchplan();
            $model->name = "แผนซื้อประจำวันที่ ".date('d-m-Y');
            $model->plan_date = strtotime(date('d-m-Y'));
            $model->status = 1;
            if($model->save()){
                for($i=0;$i<=count($rows)-1;$i++){
                    $sup = 0;
                    $plan_qty = 0;
                    $qty = 0;
                    $price = 0;
                    $plan_type = Yii::$app->request->post("plan_row_".($i+1)."_type")[0];

                    $row_col = Yii::$app->request->post("row_".($i+1)."_col");


                    for($x=0;$x<=$row_col[0]-1;$x++){
                        $r_sup = 'plan_row_'.($i+1).'_sub_'.($x+1);
                        $r_p_qty = 'plan_row_'.($i+1).'_plan_qty_'.($x+1);
                        $r_qty = 'plan_row_'.($i+1).'_qty_'.($x+1);
                        $r_price = 'plan_row_'.($i+1).'_price_'.($x+1);
                        // echo $xi;
                        // return;
                        if(Yii::$app->request->post($r_sup)!== null){
                            $sup =Yii::$app->request->post($r_sup)[0];
                        }
                        if(Yii::$app->request->post($r_p_qty)!== null){
                            $plan_qty = Yii::$app->request->post($r_p_qty)[0];
                        }
                        if(Yii::$app->request->post($r_qty)!== null){
                            $qty = Yii::$app->request->post($r_qty)[0];
                        }
                        if(Yii::$app->request->post($r_price)!== null){
                            $price = Yii::$app->request->post($r_price)[0];
                        }


                        $modelline = new \common\models\PurchPlanLine();
                        $modelline->plan_type = $plan_type;
                        $modelline->plan_id = $model->id;
                        $modelline->sup_id = $sup;
                        $modelline->plan_qty = $plan_qty;
                        $modelline->received_qty = $qty;
                        $modelline->plan_price = $price;
                        $modelline->save(false);


                    }

                    // print_r($plan_qty);


                }
            }
        }

        $session = Yii::$app->session;
        $session->setFlash('msg','บันทึกรายการเรียบร้อย');
        return $this->redirect(['index']);

//        echo "<pre>";
//        print_r($post);
//        echo "</pre>";



    }
    public function actionUpdateplan(){
        $post = Yii::$app->request->post();
        $rows = Yii::$app->request->post('row');
        $planid = Yii::$app->request->post('planid');
        $row_edit = Yii::$app->request->post('row_id');
        // echo count($rows);
//
//        echo "<pre>";
//        print_r($post);
//        echo "</pre>";
//
//        return;

        if($post){
            $model =\backend\models\Purchplan::find()->where(['id'=>$planid])->one();
            $model->name = "แผนซื้อประจำวันที่ ".date('d-m-Y');
            $model->plan_date = strtotime(date('d-m-Y'));
            $model->status = 1;
            if($model->save(false)){
                \common\models\PurchPlanLine::deleteAll(['plan_id'=>$planid]);
                for($i=0;$i<=count($rows)-1;$i++){
                    $sup = 0;
                    $plan_qty = 0;
                    $qty = 0;
                    $price = 0;
                    $plan_type = Yii::$app->request->post("plan_row_".($i+1)."_type")[0];

                    $row_col = Yii::$app->request->post("row_".($i+1)."_col");


                    for($x=0;$x<=$row_col[0]-1;$x++){
                        $r_sup = 'plan_row_'.($i+1).'_sub_'.($x+1);
                        $r_p_qty = 'plan_row_'.($i+1).'_plan_qty_'.($x+1);
                        $r_qty = 'plan_row_'.($i+1).'_qty_'.($x+1);
                        $r_price = 'plan_row_'.($i+1).'_price_'.($x+1);
                        // echo $xi;
                        // return;
                        if(Yii::$app->request->post($r_sup)!== null){
                            $sup =Yii::$app->request->post($r_sup)[0];
                        }
                        if(Yii::$app->request->post($r_p_qty)!== null){
                            $plan_qty = Yii::$app->request->post($r_p_qty)[0];
                        }
                        if(Yii::$app->request->post($r_qty)!== null){
                            $qty = Yii::$app->request->post($r_qty)[0];
                        }
                        if(Yii::$app->request->post($r_price)!== null){
                            $price = Yii::$app->request->post($r_price)[0];
                        }
                        //echo $sup." ".$plan_qty." ".$qty." ".$price."<br />";

                        $modelline = new \common\models\PurchPlanLine();
                        $modelline->plan_type = $plan_type;
                        $modelline->plan_id = $model->id;
                        $modelline->sup_id = $sup;
                        $modelline->plan_qty = $plan_qty;
                        $modelline->received_qty = $qty;
                        $modelline->plan_price = $price;
                        $modelline->save(false);


                    }

                    // print_r($plan_qty);


                }
            }
        }

        $session = Yii::$app->session;
        $session->setFlash('msg','บันทึกรายการเรียบร้อย');
        return $this->redirect(['index']);




    }
}
