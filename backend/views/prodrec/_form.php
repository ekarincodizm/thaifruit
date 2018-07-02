<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Prodrec */
/* @var $form yii\widgets\ActiveForm */

$url_to_find_sup = Url::to('index.php?r=prodrec/findsupcode',true);


?>

<div class="prodrec-form">
    <div class="panel panel-headlin">
        <div class="panel-heading">
            <h3><i class="fa fa-files-o"></i> <?=$this->title?> <small></small></h3>

            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>


            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'journal_no')->textInput(['maxlength' => true,'value'=>$model->isNewRecord?$runno:$model->journal_no,'readonly'=>'readonly']) ?>
                </div>
                <div class="col-lg-4">
                    <?php $model->trans_date = !$model->isNewRecord?date('d-m-Y',$model->trans_date):date('d-m-Y');?>
                    <?= $form->field($model, 'trans_date')->widget(DatePicker::className(),[
                        'name'=>'trans_date',
                        'pluginOptions' => [
                                'format'=>'dd-mm-yyyy'
                        ]
                    ]) ?>
                </div>
                <div class="col-lg-4">

                    <?= $form->field($model, 'suplier_id')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(\backend\models\Suplier::find()->all(),'id','name'),
                        'options' => ['placeholder'=>'เลือก','class'=>'suplier_id',
                            'onchange'=>'
                           // alert($(this).val());
                                $.post("'.Url::to(['prodrec/findsupcode'],true).'"+"&id="+$(this).val(),function(data){
                                          var xdate = new Date();
                                          var supcode = data;
                                          var da = xdate.getDate()<9?"0"+xdate.getDate():xdate.getDate();                                                                    
                                          var mo = xdate.getMonth()<9?"0"+xdate.getMonth():xdate.getMonth();                                                                    
                                          var lot = supcode+ da + mo +(xdate.getFullYear()+543).toString().substr(-2);
                                          $(".lot_no").val(lot);
                                });
                            ',
                            ],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'raw_type')->widget(Select2::className(),[
                        'data'=>ArrayHelper::map(\backend\models\Product::find()->all(),'id','name'),
                        'options' => ['placeholder'=>'เลือก',
                            'onchange'=>'
                           // alert($(this).val());
                                $.post("'.Url::to(['prodrec/findzone'],true).'"+"&id="+$(this).val(),function(data){
//                                          $("select#zone_id").html(data);
//                                          $("select#zone_id").prop("disabled","disabled");
                                            
                                            var xdata = data.split("/");
                                            $(".zone_text").val(xdata[1]);
                                            $(".zone_id").val(xdata[0]);
                                       });
                            ',
                            ],
                    ]) ?>
                </div>
                <div class="col-lg-4">
                     <p>เลขกอง</p>
                    <input type="text" style="margin-top: -5px;" class="form-control zone_text" name="zone_text" value="" readonly>
                    <?= $form->field($model, 'zone_id')->hiddenInput(['class'=>'zone_id'])->label(false) ?>

                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'plan_price')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'qty')->textInput(['style'=>'font-size: 32px;height: 100px;font-weight: bold;']) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'lot_no')->textInput(['readonly'=>'readonly','class'=>'form-control lot_no']) ?>
                </div>
            </div>

           <div class="row">
               <div class="col-lg-12">
                   <?= $form->field($model, 'qc_note')->textarea(['rows' => 4,'style'=>'font-size: 24px;']) ?>
               </div>
           </div><br>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
