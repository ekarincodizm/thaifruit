<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Prodissue */
/* @var $form yii\widgets\ActiveForm */

$modelzone = \backend\models\Zone::find()->all();

?>

<div class="prodrec-form">
    <div class="panel panel-headlin">
        <div class="panel-heading">
            <h3><i class="fa fa-files-o"></i> <?=$this->title?> <small></small></h3>

            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-label-left']]); ?>
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'issue_no')->textInput(['maxlength' => true,'readonly'=>'readonly','value'=>$model->isNewRecord?$runno:$model->issue_no]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'trans_date')->widget(\kartik\date\DatePicker::className(),[
                            'pluginOptions' => [
                                    'format'=>'dd-mm-yyyy',
                            ]
                    ]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'section_id')->widget(\kartik\select2\Select2::className(),[
                            'data'=>ArrayHelper::map(\backend\models\Section::find()->all(),'id','name'),
                            'options' => ['placeholder'=>'เลือก']
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'issue_by')->textInput() ?>
                </div>
            </div>

          <div class="row">
              <div class="col-lg-12">
                  <table class="table table-line">
                      <thead>
                      <tr style="background: #c3c3c3">
                            <th>กอง</th>
                            <th>lot</th>
                            <th>จำนวน</th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>
                              <select name="product_issue_id[]"  class="form-control line_product" id="" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center">
                                  <option value="">เลือกกอง</option>
                                  <?php foreach($modelzone as $data):?>
                                      <option value="<?=$data->id?>"><?=$data->name?></option>
                                  <?php endforeach;?>
                              </select>
                          </td>
                          <td>
                              <input  id="task-1" class="line_issue_qty"  type="text" name="line_issue_qty[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                          </td>
                          <td>
                              <input  id="task-1" class="line_issue_price"  type="text" name="line_issue_price[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                          </td>
                          <td>
                              <div class="btn btn-danger btn-sm btn-remove-line" onclick="removeline($(this))">ลบ</div>
                          </td>
                      </tr>
                      </tbody>
                  </table>
                  <div class="btn btn-primary btn-add"><i class="fa fa-plus-circle"></i> เพิ่มรายการ </div>
              </div>
          </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'note')->textarea(['maxlength' => true]) ?>
                </div>
            </div>



    <div class="ln_solid"></div>

            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>


    <?php ActiveForm::end(); ?>

</div>
    </div>
<?php
$this->registerJs('
   $(function(){
       $(".btn-add").click(function(){
      
              var linenum = 0;
              var $tr = $(".table-line tbody tr:last");
              if($tr.find(".line_product").val()==""){
                  alert("ข้อมูลสินค้าต้องไม่ว่าง กรุณาตรวจสอบใหม่");
                       return;
              }
              var $clone = $tr.clone();
              $clone.find(":text").val("");
              $clone.find(".line_lot").val($tr.find(".line_lot").val());
              $clone.find(".line_product").val("");
            
              $tr.after($clone);
              
             });
   });
    function removeline(e){
     if(confirm("Do you want to delete this record ?")){
         if($(".table-line tbody tr").length == 1){
             $(".table-line tbody tr :text").val("");
             $(".table-line tbody tr td:eq(0)").text("");
         }else{
            e.parent().parent().remove();
           // cal_linenum();
         }
     }
   }
',static::POS_END);
?>