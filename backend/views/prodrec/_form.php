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

$modelgreen = \backend\models\Productcat::find()->where(['LIKE','name','วัสดุ'])->one();

$modelproduct = \backend\models\Product::find()->where(['status'=>1])->andFilterWhere(['!=','category_id',$modelgreen->id])->all();
$modelproduct2 = \backend\models\Product::find()->where(['status'=>1,'category_id'=>$modelgreen->id])->all();

$has = count($modelissue)>0?1:0;
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
                                          var da = xdate.getDate()<=9?"0"+xdate.getDate():xdate.getDate();                                                                    
                                          var mo = xdate.getMonth()<=9?"0"+ (parseInt(xdate.getMonth()) +1):parseInt(xdate.getMonth())+1;                                                                    
                                          var lot = supcode+ da + mo +(xdate.getFullYear()+543).toString().substr(-2);
                                          $(".lot_no").val(lot);
                                          
                                          $("table.table-line tbody tr").each(function(){
                                             $(this).find(".line_lot").val(lot);
                                          });
                                });
                            ',
                            ],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <input type="checkbox" class="has-issue" ><span> มีรายการเบิก</span>
                    <input type="hidden" class="has_issue" name="has_issue" value="0">
                </div>
            </div>
            <br>
            <p><b>รายการรับเข้า</b></p>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-line">
                        <thead>
                            <tr style="background: #c3c3c3">
                                <th>ประเภท</th>
                                <th style="text-align: center">กอง</th>
                                <th style="text-align: center">Lot</th>
                                <th style="text-align: center">จำนวน</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php if($model->isNewRecord):?>
                            <tr>
                                <td>
                                    <select name="product_id[]" onchange="checkzone($(this));" class="form-control line_product" id="" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center">
                                        <option value="">เลือกประเภท</option>
                                        <?php foreach($modelproduct as $data):?>
                                        <option value="<?=$data->id?>"><?=$data->product_code?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                                <td>
                                    <input readonly id="task-1" class="line_zone"  type="text" name="line_zone[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                    <input readonly id="task-1" class="line_zone_id"  type="hidden" name="line_zone_id[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                    <input readonly id="task-1" class="line_zone_qty"  type="hidden" name="line_zone_qty[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                </td>
                                <td>
                                    <input readonly id="task-1" class="line_lot"  type="text" name="line_lot[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                </td>
                                <td>
                                    <input  id="task-1" class="line_qty"  type="text" name="line_qty[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="" onchange="line_qty_change($(this))">
                                </td>
                                <td>
                                    <div class="btn btn-danger btn-sm btn-remove-line" onclick="removeline($(this))">ลบ</div>
                                </td>
                            </tr>
                        <?php else:?>
                           <?php if(count($modelrecline)>0):?>
                               <?php $line_qty = 0; ?>
                             <?php foreach($modelrecline as $value):?>
                               <tr>
                                   <td>
                                       <select name="product_id[]" onchange="checkzone($(this));" class="form-control line_product" id="" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center">
                                           <option value="">เลือกประเภท</option>
                                           <?php foreach($modelproduct as $data):?>
                                            <?php
                                                 $select = '';
                                                 if($data->id == $value->product_id){$select = "selected";}
                                               ?>
                                               <option value="<?=$data->id?>" <?=$select?>><?=$data->product_code?></option>
                                           <?php endforeach;?>
                                       </select>
                                   </td>
                                   <td>

                                       <?php
                                         $show_zone = '';
                                         $savezone = explode(',',$value->list_zone);
                                         if(count($savezone)>0){
                                             for($x=0;$x<=count($savezone)-1;$x++){
                                                 if($x == 0){
                                                     $show_zone = $show_zone.\backend\models\Zone::findName($savezone[$x]);
                                                 }else if($x == count($savezone)-1){
                                                     $show_zone = $show_zone.",".\backend\models\Zone::findName($savezone[$x]);
                                                 }else{
                                                     $show_zone = $show_zone.",".\backend\models\Zone::findName($savezone[$x]);
                                                 }

                                             }
                                         }
                                       ?>

                                       <input readonly id="task-1" class="line_zone"  type="text" name="line_zone[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="<?=$show_zone?>">
                                       <input readonly id="task-1" class="line_zone_id"  type="hidden" name="line_zone_id[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="<?=$value->list_zone?>">
                                       <input readonly id="task-1" class="line_zone_qty"  type="hidden" name="line_zone_qty[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                   </td>
                                   <td>
                                       <input readonly id="task-1" class="line_lot"  type="text" name="line_lot[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="<?=$value->lot_no?>">
                                   </td>
                                   <td>
                                       <input  id="task-1" class="line_qty"  type="text" name="line_qty[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="<?=$value->qty?>">
                                   </td>
                                   <td>
                                       <div class="btn btn-danger btn-sm btn-remove-line" onclick="removeline($(this))">ลบ</div>
                                   </td>
                               </tr>
                            <?php endforeach;?>
                               <?php else:?>
                                   <tr>
                                       <td>
                                           <select name="product_id[]" onchange="checkzone($(this));" class="form-control line_product" id="" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center">
                                               <option value="">เลือกประเภท</option>
                                               <?php foreach($modelproduct as $data):?>
                                                   <option value="<?=$data->id?>"><?=$data->product_code?></option>
                                               <?php endforeach;?>
                                           </select>
                                       </td>
                                       <td>
                                           <input readonly id="task-1" class="line_zone"  type="text" name="line_zone[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                           <input readonly id="task-1" class="line_zone_id"  type="hidden" name="line_zone_id[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                           <input readonly id="task-1" class="line_zone_max"  type="hidden" name="line_zone_max[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                       </td>
                                       <td>
                                           <input readonly id="task-1" class="line_lot"  type="text" name="line_lot[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="">
                                       </td>
                                       <td>
                                           <input  id="task-1" class="line_qty"  type="text" name="line_qty[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="" onchange="line_qty_change($(this))">
                                       </td>
                                       <td>
                                           <div class="btn btn-danger btn-sm btn-remove-line" onclick="removeline($(this))">ลบ</div>
                                       </td>
                                   </tr>
                            <?php endif;?>
                           <?php endif;?>
                        </tbody>
                    </table>
                    <div class="btn btn-primary btn-add"><i class="fa fa-plus-circle"></i> เพิ่มรายการ </div>
                </div>
            </div>

            <br>
            <div class="issue" style="display: none">
                <p><b>รายการเบิก</b></p>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-issue">
                        <thead>
                        <tr style="background: #c3c3c3">
                            <th>รายการ</th>
<!--                            <th style="text-align: center">กอง</th>-->
<!--                            <th style="text-align: center">Lot</th>-->
                            <th style="text-align: center">จำนวน</th>
                            <th style="text-align: center">ราคา</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!$model->isNewRecord):?>
                            <?php if(count($modelissue)>0):?>
                                <?php foreach ($modelissue as $data):?>
                                        <tr>
                                            <td>
                                                <select name="product_issue_id[]" onchange="checkzone($(this));" class="form-control line_product" id="" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center">
                                                    <option value="">เลือกประเภท</option>
                                                    <?php foreach($modelproduct2 as $data2):?>
                                                    <?php
                                                        $select = '';
                                                        if($data2->id == $data->product_id){$select="selected";}
                                                        ?>
                                                        <option value="<?=$data2->id?>" <?=$select?>><?=$data2->product_code?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </td>
                                            <td>
                                                <input  id="task-1" class="line_issue_qty"  type="text" name="line_issue_qty[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="<?=$data->qty?>">
                                            </td>
                                            <td>
                                                <input  id="task-1" class="line_issue_price"  type="text" name="line_issue_price[]" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center" value="<?=$data->price?>">
                                            </td>
                                            <td>
                                                <div class="btn btn-danger btn-sm btn-remove-line" onclick="removelineissue($(this))">ลบ</div>
                                            </td>
                                        </tr>
                                <?php endforeach;?>

                                <?php else:?>
                                <tr>
                                    <td>
                                        <select name="product_issue_id[]" onchange="checkzone($(this));" class="form-control line_product" id="" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center">
                                            <option value="">เลือกประเภท</option>
                                            <?php foreach($modelproduct2 as $data):?>
                                                <option value="<?=$data->id?>"><?=$data->product_code?></option>
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
                                        <div class="btn btn-danger btn-sm btn-remove-line" onclick="removelineissue($(this))">ลบ</div>
                                    </td>
                                </tr>
                        <?php endif;?>
                  <?php else:?>
                        <tr>
                            <td>
                                <select name="product_issue_id[]" onchange="checkzone($(this));" class="form-control line_product" id="" style="border: none;padding: 5px 5px 5px 5px;width: 100%;background:transparent;text-align: center">
                                    <option value="">เลือกประเภท</option>
                                    <?php foreach($modelproduct2 as $data):?>
                                        <option value="<?=$data->id?>"><?=$data->product_code?></option>
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
                                <div class="btn btn-danger btn-sm btn-remove-line" onclick="removelineissue($(this))">ลบ</div>
                            </td>
                        </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                    <div class="btn btn-warning btn-add-issue"><i class="fa fa-plus-circle"></i> เพิ่มรายการเบิก </div>
                </div>
            </div>

            <br>
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
<?php
$url_to_search = Url::to(['productionrec/findemp'],true);
$url_to_findzone = Url::to(['prodrec/findzone'],true);
$this->registerJs('
   $(function(){
    var idInc = 2;
      var hasissue = "'.$has.'";
      if(hasissue == 1){
         $(".has-issue").prop("checked",true);
         $("div.issue").show();
      }
      $(".btn-add").click(function(){
      
      var linenum = 0;
      var $tr = $(".table-line tbody tr:last");
    
      var $clone = $tr.clone();
      $clone.find(":text").val("");
      //$clone.find(".line_lot").attr("id","task-"+idInc);
      $clone.find(".line_lot").val($tr.find(".line_lot").val());
             
      //idInc+=1;
      $tr.after($clone);
      
     // $(".table-line tbody tr").each(function(){
       //  linenum+=1;
        // $(this).closest("tr").find("td:eq(0)").text(linenum);
     // });
     });
      $(".btn-add-issue").click(function(){
      
      var linenum = 0;
      var $tr = $(".table-issue tbody tr:last");
    
      var $clone = $tr.clone();
      $clone.find(":text").val("");
      //$clone.find(".line_lot").attr("id","task-"+idInc);
      $clone.find(".line_lot").val($tr.find(".line_lot").val());
             
      //idInc+=1;
      $tr.after($clone);
      
     // $(".table-line tbody tr").each(function(){
       //  linenum+=1;
        // $(this).closest("tr").find("td:eq(0)").text(linenum);
     // });
     });
    $(".line_num_one").on("keypress keyup blur",function(event){
       $(this).val($(this).val().replace(/[^0-9\.]/g,""));
       if((event.which != 46 || $(this).val().indexOf(".") != -1) && (event.which <48 || event.which >57)){event.preventDefault();}
    });
    
    $(".has-issue").change(function(){
       if($(this).is(":checked")){
        $("div.issue").show();
        $(".has_issue").val(1);
       }else{
        $("div.issue").hide();
       }
    });
    
   });
   function checkzone(e){
      //  alert(e.val());
      var curzone =  e.closest("tr").find(".line_zone_id").val();
      var maxzone =  e.closest("tr").find(".line_zone_max").val();
     
      var listzone = [];
      var zonetotal = 0;
       $("table.table-line tbody tr").each(function(){
          if($(this).find(".line_qty").val() >0){
            if(e.val() == $(this).find(".line_product").val() ){
                zonetotal+= parseInt($(this).find(".line_qty").val());
                if(zonetotal > parseInt(maxzone)){
                     listzone.push($(this).find(".line_zone_id").val());
                 }
            }
            
          }
       });
       //alert(listzone[0]);
       // var url = "'.$url_to_findzone.'"+"&id="+e.val()+"&zoneid="+listzone;
        //alert(url);
//        $.post(url,function(data){
//                var xdata = data.split("/");
//                e.closest("tr").find(".line_qty").val(0);
//                e.closest("tr").find(".line_zone_id").val(xdata[0]);
//                e.closest("tr").find(".line_zone").val(xdata[1]);
//                e.closest("tr").find(".line_zone_max").val(xdata[2]);
//         });
   }
   function line_qty_change(e){
      var maxval = e.closest("tr").find(".line_zone_max").val();
      var addqty = 0;
     // alert(e.parent().parent().index());
      
      var prodid = e.closest("tr").find(".line_product").val();
      var curqty = e.val();
      
     
      
       var url = "'.$url_to_findzone.'"+"&id="+prodid+"&qty="+curqty;
       var zonename = "";
       var zonelist = [];
       var zonelistqty = [];
       $.ajax({
          type: "get",
          dataType: "json",
          url : "'.$url_to_findzone.'",
          async: false,
          data : {id:prodid,qty:curqty},
          success: function(data){
             if(data.length > 0){
                for(var x=0;x<=data.length -1;x++){
                   if(x==0){
                       zonename=zonename+data[x]["name"];
                   }else if(x == data.length -1){
                       zonename=zonename+","+data[x]["name"];
                   }
                   else{
                      zonename=zonename+","+data[x]["name"];
                   }
                   zonelist.push(data[x]["id"]);
                   zonelistqty.push(data[x]["qty"]);
                   //alert(zonename);
                }
             }else{
              alert("ไม่มีกองให้ลงสินค้า");
             }
             if(data == null){
             alert("ไม่มีกองให้ลงสินค้า");
             }
          }
       });
       
       e.closest("tr").find(".line_zone").val(zonename);
       e.closest("tr").find(".line_zone_id").val(zonelist);
       e.closest("tr").find(".line_zone_qty").val(zonelistqty);
       
        //alert(url);
       // $.post(url,function(data){
//                var xdata = data.split("/");
//                e.closest("tr").find(".line_qty").val(0);
//                e.closest("tr").find(".line_zone_id").val(xdata[0]);
//                e.closest("tr").find(".line_zone").val(xdata[1]);
//                e.closest("tr").find(".line_zone_max").val(xdata[2]);
       //    alert(data[0]);
         //});
      
     // if(parseInt(e.val()) > parseInt(maxval)){
    //   alert("จำนวนรับมากกว่าจำนวนที่กองกำหนด");
    //   e.val(0);
 //      return;
//      addqty = parseInt(e.val())/parseInt(maxval)-1;
//        if(addqty > 0){
//        var x = 0;
//           for(x=0;x<=addqty-1;x++){
//              var $tr = e.parent().parent();
//              var $clone = $tr.clone();
//              $clone.find(":text").val("");
//              $clone.find(".product_id").val($tr.find(".product_id").val());
//              $clone.find(".line_zone").val($tr.find(".line_zone").val());
//              $clone.find(".line_lot").val($tr.find(".line_lot").val());
//              $clone.find(".line_qty").val(1000);
//              $tr.after($clone);
//           }
//        }
  //    }
   }
   function cal_num(e){
   
     var one = e.closest("tr").find(".line_time_one").val();
     var two = e.closest("tr").find(".line_time_two").val();
     var three = e.closest("tr").find(".line_time_three").val();
     var four = e.closest("tr").find(".line_time_four").val();
     var five = e.closest("tr").find(".line_time_five").val();
     
     if(one == ""){one = 0;}
     if(two == ""){two = 0;}
     if(three == ""){three = 0;}
     if(four == ""){four = 0;}
     if(five == ""){five = 0;}
     
     var newqty = parseInt(one) + parseInt(two) + parseInt(three) + parseInt(four) + parseInt(five);
     e.closest("tr").find(".line_total").val("");
     e.closest("tr").find(".line_total").val(newqty);
   }
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
  function removelineissue(e){
     if(confirm("Do you want to delete this record ?")){
     if($(".table-issue tbody tr").length == 1){
         $(".table-issue tbody tr :text").val("");
         $(".table-issue tbody tr td:eq(0)").text("");
     }else{
        e.parent().parent().remove();
        //cal_linenum();
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