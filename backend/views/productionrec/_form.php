<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Productionrec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productionrec-form">
    <div class="panel panel-headline">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-lg-4">
                    <?php $model->trans_date = $model->isNewRecord?date('d-m-Y'):$model->trans_date; ?>
                    <?= $form->field($model, 'trans_date')->widget(DatePicker::className(),[
                            'pluginOptions' => [

                            ],
                    ]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'zone_id')->widget(Select2::className(),[
                            'data'=>ArrayHelper::map(\backend\models\Zone::find()->all(),'id','name'),
                            'options' => ['placeholder'=>'เลือก'],
                    ]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'zone_date')->textInput() ?>
                </div>
            </div>
           <div class="row">
               <div class="col-lg-4">
                   <?= $form->field($model, 'zone_status')->widget(Select2::className(),[
                       'data'=>ArrayHelper::map([['id'=>1,'name'=>'ยังไม่ปิดกอง'],['id'=>2,'name'=>'ปิดกอง']],'id','name'),
                   ]) ?>
           </div>
               <div class="col-lg-4">
                   <?= $form->field($model, 'all_qty')->textInput() ?>
               </div>

               <br />
               <br />
               <div class="row">
                   <div class="col-lg-12">
                       <table class="table table-line">
                         <thead>
                           <tr style="background: #c3c3c3">
                               <th>#</th>
                               <th>พนักงาน</th>
                               <th style="text-align: center">1</th>
                               <th style="text-align: center">2</th>
                               <th style="text-align: center">3</th>
                               <th style="text-align: center">4</th>
                               <th style="text-align: center">5</th>
                               <th style="text-align: center">รวม</th>
                               <th style="text-align: center">-</th>
                           </tr>
                         </thead>
                           <tbody>
                           <tr>
                               <td>1</td>
                               <td>
                                   <input type="hidden" class="asset_id" name="asset_id[]" value="">
                                   <input  id="task-1" class="line_asset_code" type="text" name="line_asset_code[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;" value="">
                               </td>
                               <td>
                                   <input  id="task-1" class="line_asset_code" type="text" name="line_asset_code[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;" value="">
                               </td>
                               <td>
                                   <input  id="task-1" class="line_asset_code" type="text" name="line_asset_code[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;" value="">
                               </td>
                               <td>
                                   <input  id="task-1" class="line_asset_code" type="text" name="line_asset_code[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;" value="">
                               </td>
                               <td>
                                   <input  id="task-1" class="line_asset_code" type="text" name="line_asset_code[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;" value="">
                               </td>
                               <td>
                                   <input  id="task-1" class="line_asset_code" type="text" name="line_asset_code[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;" value="">
                               </td>
                               <td>
                                   <input readonly id="task-1" class="line_asset_code" type="text" name="line_asset_code[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;" value="">
                               </td>
                               <td>
                                   <div class="btn btn-danger btn-sm btn-remove-line" onclick="removeline($(this))">ลบ</div>
                               </td>
                           </tr>
                           </tbody>

                       </table>
                       <div class="btn btn-primary btn-add"><i class="fa fa-plus-circle"></i> เพิ่มรายการ</div>
                   </div>
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

<?php
$url_to_search = Url::to(['productionrec/findemp'],true);
 $this->registerJs('
   $(function(){
    var idInc = 2;
       $(".btn-add").click(function(){
      var linenum = 0;
      var $tr = $(".table-line tbody tr:last");
      var $clone = $tr.clone();
      $clone.find(":text").val("");
      $clone.find(".line_asset_code").attr("id","task-"+idInc);
//             $clone.find(".line_asset_code").autocomplete({
//                minLength: 1,
//                source: function(query,response){
//                    $.ajax({
//                    url: "'.$url_to_search.'",
//                    data: { term: query},
//                    dataType: "json",
//                    type: "POST",
//                    success: function(data) { 
//                        response($.map(data, function(obj) {
//                            //return obj.asset_code;
//                            return {
//                                label: obj.asset_code,
//                                value: obj.asset_code,            
//                                name: obj.name,            
//                                id: obj.id 
//                            };
//                        }));
//                    }
//        
//                    });
//                },
//                 change: function(event,ui){
//                    $clone.find(".line_name").val(ui.item.name);
//                    $clone.find(".line_qty").focus();
//                }
//            });
      idInc+=1;
      $tr.after($clone);
      
      $(".table-line tbody tr").each(function(){
         linenum+=1;
         $(this).closest("tr").find("td:eq(0)").text(linenum);
      });
    });
   });
   
    function removeline(e){
   if(confirm("Do you want to delete this record ?")){
     if($(".table-line tbody tr").length == 1){
         $(".table-line tbody tr :text").val("");
         $(".table-line tbody tr td:eq(0)").text("");
     }else{
        e.parent().parent().remove();
        cal_linenum();
     }
     
   }
 }
 function cal_linenum(){
   var xline = 0;
  $(".table-line tbody tr").each(function(){
         xline+=1;
         $(this).closest("tr").find("td:eq(0)").text(xline);
      });
 }
 ',static::POS_END);
?>