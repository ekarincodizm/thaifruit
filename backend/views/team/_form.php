<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-headlin">
    <div class="panel-heading">
        <h3><i class="fa fa-institution"></i> <?=$this->title?> <small></small></h3>
        <!-- <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul> -->
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <br />
        <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal form-label-left']]); ?>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ชื่อทีม <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">รายละเอียด
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model, 'description')->textarea(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ประเภททีม <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model, 'team_type')->widget(Select2::className(),[
                    'data' => ArrayHelper::map(backend\helpers\TeamType::asArrayObject(),'id','name'),
                    'options' => ['placeholder'=>'เลือก']
                ])->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ค่าจ้าง
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model, 'wage')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">สถานะ
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'','class'=>'form-control']])->label(false) ?>
            </div>
        </div>


        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <?= Html::submitButton(Yii::t('app', 'บันทึก'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
