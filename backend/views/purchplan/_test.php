<?php

use yii\jui\AutoComplete;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'แผนสั่งซื้อ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$url_to_search = Url::to(['purchplan/findsub'],true);
$js=<<<JS
  var idInc = 2;
  var idCol = 1;
  var idTr = 1;
  $(function() {
    $(".plan_qty,.qty,.price").on("keypress keyup blur",function(event){
       $(this).val($(this).val().replace(/[^0-9\.]/g,""));
       if((event.which != 46 || $(this).val().indexOf(".") != -1) && (event.which <48 || event.which >57)){event.preventDefault();}
    });
    $('.btn-add-row').click(function() {
      //  alert();
      var tr = $("table.table tr:last");
      var clone = tr.clone();
      idTr +=1;
     // clone.find(".plan-type").attr("id","type-"+idTr);
      clone.find(".plan-type").attr("id","type-"+idTr);
      clone.find(".plan-type").attr("name","plan_row_"+idTr+"_type[]");
      clone.find(".rows").val(idTr);
      tr.after(clone);
      $("table.table tr:last").attr("class",'tr-'+idTr);
      idInc = 2;
      idCol = 1;
      var loop = 3;
      var loop_cnt = 0;
      $("table.table tbody tr:last td").each(function(){
          loop_cnt +=1;
          if(loop_cnt > loop){
              $(this).remove();
          }
          
      });
       $("table.table tbody tr:last").find(".sub").attr("name","plan_row_"+idTr+"_sub_"+idCol+"[]");
       $("table.table tbody tr:last").find(".sub").attr("id","sub-"+idCol);
       $("table.table tbody tr:last").find(".plan_qty").attr("name","plan_row_"+idTr+"_plan_qty_"+idCol+"[]");
       $("table.table tbody tr:last").find(".plan_qty").attr("id","plan_qty-"+idCol);
       $("table.table tbody tr:last").find(".qty").attr("name","plan_row_"+idTr+"_qty_"+idCol+"[]");
       $("table.table tbody tr:last").find(".qty").attr("id","qty-"+idCol);
       $("table.table tbody tr:last").find(".price").attr("name","plan_row_"+idTr+"_price_"+idCol+"[]");
       $("table.table tbody tr:last").find(".price").attr("id","price-"+idCol);
       
       var row_col_lenght = $("table.table tbody tr:last td").length;
      $("table.table tbody tr:last").find(".rows_col").attr("name","row_"+idTr+"_col[]");
      $("table.table tbody tr:last").find(".rows_col").val(row_col_lenght-2);
      
    });
    
  });
  function delline(e){
      e.parent().parent().parent().parent().remove();
  }
  function addline(e) {
      var td = e.closest('tr').find('td:last');
      var clone = td.clone();
      //var plantype = $("table.table-plan tr:last").attr("class");
     // alert(plantype);
       if(idCol == 1){idCol =2;}
      //clone.find(".sub").attr("name","plan_row[]");
      clone.find(".sub").attr("name","plan_row_"+idTr+"_sub_"+idCol+"[]");
      clone.find(".sub").attr("id","sub-"+idCol);
      clone.find(".plan_qty").attr("name","plan_row_"+idTr+"_plan_qty_"+idCol+"[]");
      clone.find(".plan_qty").attr("id","plan_qty-"+idCol);
      clone.find(".qty").attr("name","plan_row_"+idTr+"_qty_"+idCol+"[]");
      clone.find(".qty").attr("id","qty-"+idCol);
      clone.find(".price").attr("name","plan_row_"+idTr+"_price_"+idCol+"[]");
      clone.find(".price").attr("id","price-"+idCol);
      td.after(clone);
      
      var row_col_lenght = $("table.table tbody tr:last td").length;
      $("table.table tbody tr:last").find(".rows_col").attr("name","row_"+idTr+"_col[]");
      $("table.table tbody tr:last").find(".rows_col").val(row_col_lenght-2);
      
      idCol +=1;
}
  function remove(e) {
    e.parent().parent().remove();
  }
  
  function chk_num(e){
   e.on("keypress keyup blur",function(event){
       $(this).val($(this).val().replace(/[^0-9\.]/g,""));
       if((event.which != 46 || $(this).val().indexOf(".") != -1) && (event.which <48 || event.which >57)){event.preventDefault();}
    });
  }
JS;
$this->registerJs($js,static::POS_END);

$sub = \backend\models\Suplier::find()->all();
?>
<div class="prodrec-form">
    <div class="panel panel-headlin">
<div class="panel-heading">
  <i class="fa fa-calendar-check-o"> แผนซื้อประจำวันที่</i> <?=$model->isNewRecord?date('d-m-Y'):date('d-m-Y',$model->plan_date)?>
</div>
        <div class="panel-body">
<form action="index.php?r=purchplan/testsave" method="post">
    <table class="table table-plan">
        <tbody class="xaa">
        <tr class="tr-1">
            <input type="hidden" class="rows" name="row[]" value="1">
            <input type="hidden" class="rows_col" name="row_1_col[]" value="1">
            <td style="width: 10%;">
                <div class="row">
                    <select name="plan_row_1_type[]" id="plan-1" class="form-control plan-type" style="left: -10px;">
                        <option value="0">ควั่น</option>
                        <option value="1">ลูกสำเร็จ</option>
                    </select>

                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="btn btn-success" onclick="addline($(this));"><i class="fa fa-plus-circle"></i></div>
                    </div>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="btn btn-danger" onclick="delline($(this));">ลบ</div>
                    </div>
                </div>
            </td>
            <td style="width: 5%;">
                <div class="row">
                    <input type="text" disabled class="form-control" value="ผู้ขาย">
                </div>
                <div class="row">
                    <input type="text" disabled class="form-control" value="แผน">
                </div>
                <div class="row">
                    <input type="text" disabled class="form-control" value="เข้าจริง">
                </div>
                <div class="row">
                    <input type="text" disabled class="form-control" value="ราคา">
                </div>

            </td>
            <td style="padding-left: 5px ;">
                <div class="row">
<!--                    <input type="text" name="plan-1-1sup[]" class="form-control sub">-->
                    <select name="plan_row_1_sub_1[]" class="form-control sub" id="">
                        <?php foreach($sub as $data):?>
                        <option value="<?=$data->id?>"><?=$data->name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="row">
                    <input type="text" name="plan_row_1_plan_qty_1[]" class="form-control plan_qty">
                </div>
                <div class="row">
                    <input type="text" name="plan_row_1_qty_1[]" class="form-control qty" onkeypress="chk_num($(this));">
                </div>
                <div class="row">
                    <input type="text" name="plan_row_1_price_1[]" class="form-control price">
                </div>
                <div class="row">
                    <div class="btn btn-remove" onclick="remove($(this));"><i class="fa fa-trash-o"></i> </div>
                </div>
            </td>

        </tr>
        </tbody>
    </table>

    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="btn btn-primary btn-add-row"> เพิ่มประเภท</div>
            <input type="submit" value="บันทึกแผน" class="btn btn-success">
        </div>
    </div>
</form>
        </div>
    </div>
</div>

