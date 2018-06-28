<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form">
    <div class="panel panel-headlin">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-lg-2">
                    <?= $form->field($model, 'invoice_no')->textInput(['maxlength' => true,'placeholder'=>'เลขที่']) ?>
                </div>
                <div class="col-lg-3">
                    <?php $model->invoice_date = $model->isNewRecord?date('d-m-Y'):$model->invoice_date; ?>
                    <?= $form->field($model, 'invoice_date')->widget(DatePicker::className(),[
                            'pluginOptions' => [
                                    'format'=>'dd-mm-yyyy'
                            ]
                    ]) ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'suplier_id')->widget(Select2::className(),[
                            'data'=>ArrayHelper::map(\backend\models\Suplier::find()->all(),'id','name'),
                            'options'=>['placeholder'=>'รหัสผลู้ขาย']
                    ]) ?>
                </div>
                <div class="col-lg-4"><br>
                    <input type="text" style="margin-top: 1px" name="sup_name" class="form-control" placeholder="ชื่อผู้ขาย">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">

                </div>
                <div class="col-lg-3">
                    <input type="text" style="margin-top: -10px" class="form-control" name="tel" value="" placeholder="เลขที่เสียภาษี">

                </div>
                <div class="col-lg-4">
                    <textarea name="sup_address" style="margin-top: -10px" id="" class="form-control" placeholder="ที่อยู่" cols="30" rows=""></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">

                </div>
                <div class="col-lg-3">
                    <input type="text" style="margin-top: -12px" class="form-control" name="tel" value="" placeholder="เบอร์โทร">
                </div>
                <div class="col-lg-4">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead style="background: #c3c3c3">
                        <tr>
                            <th>#</th>
                            <th>วันที่</th>
                            <th>เลขบิล</th>
                            <th>ชื่อผู้ส่ง</th>
                            <th>ประเภทสินค้า</th>
                            <th>จำนวนส่ง(ลูก)</th>
                            <th>หัก(ลูก)</th>
                            <th>ราคา</th>
                            <th>จำนวนเงินจ่าย(บาท)</th>
                            <th>หมายเหตุ</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="btn btn-primary"><i class="fa fa-plus-circle"></i> เพิ่มรายการ </div>
                </div>
                <div class="col-lg-7">

                </div>
                <div class="col-lg-4 pull-right">
                    <table class="table" style="font-weight: bold">
                        <tr>
                            <td>
                                รวมเป็นเงิน
                            </td>
                            <td>
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                หักเบิกวัสดุ
                            </td>
                            <td>
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                หักเงินเบิกล่วงหน้า
                            </td>
                            <td>
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ยอดรวมสุทธิ
                            </td>
                            <td>
                                0
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
   </div>
  </div>
</div>
