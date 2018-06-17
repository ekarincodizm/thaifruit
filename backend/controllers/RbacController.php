<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * SequenceController implements the CRUD actions for Sequence model.
 */
class RbacController extends Controller
{
    /**
     * {@inheritdoc}
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST','GET'],
//                ],
//            ],
//            'access'=>[
//                'class'=>AccessControl::className(),
//                'rules'=>[
//                    [
//                        'allow'=>true,
//                        'actions'=>['index','create','update','delete'],
//                        'roles'=>['@'],
//                    ]
//                ]
//            ]
//        ];
//    }

    /**
     * Lists all Sequence models.
     * @return mixed
     */

    public function actionIndex()
    {
        return $this->render('index', []);
    }
}
