<?php

use yii\jui\AutoComplete;
use yii\helpers\Url;
$url_to_search = Url::to(['purchplan/findsub'],true);
$js=<<<JS
  var idInc = 2;
  var idCol = 2
  var idTr = 0;
  $(function() {
      
    $('.btn-add-row').click(function() {
      //  alert();
      var tr = $("table.table tr:last");
      var clone = tr.clone();
      clone.find(".plan-type").attr("id","type-"+idInc);
      clone.find(".plan-type").attr("id","type-"+idInc);
      tr.after(clone);
      $("table.table tr:last").attr("class",'tr-'+idInc);
      idInc +=1;
    });
    
  });
function addline(e) {
      var td = e.closest('tr').find('td:last');
      var clone = td.clone();
      var plantype = $("table.table-plan tr:last").attr("class");
      alert(plantype);
      clone.find(".sub").attr("name",plantype+"-"+idCol+"sup[]");
      clone.find(".sub").attr("id",plantype+"-"+idCol+"sup");
      clone.find(".plan_qty").attr("name","plan_qty"+idCol+"[]");
      clone.find(".plan_qty").attr("id","plan_qty-"+idCol);
      clone.find(".qty").attr("name","qty"+idCol+"[]");
      clone.find(".qty").attr("id","qty-"+idCol);
      clone.find(".price").attr("name","price"+idCol+"[]");
      clone.find(".price").attr("id","price-"+idCol);
      td.after(clone);
      idCol +=1;
}
  function remove(e) {
    e.parent().parent().remove();
  }
JS;
$this->registerJs($js,static::POS_END);

$sub = \backend\models\Suplier::find()->all();
?>
<div class="prodrec-form">
    <div class="panel panel-headlin">
<div class="panel-heading">
<div class="btn btn-primary btn-add-row"> เพิ่มประเภท</div>
</div>
        <div class="panel-body">
<form action="index.php?r=purchplan/testsave" method="post">
    <table class="table table-plan" id="niran">
        <tbody class="xaa">
        <tr class="tr-1" id="niran">
            <td style="width: 10%;">
                <div class="row">
                    <select name="plan_type[]" id="plan-1" class="form-control plan-type">
                        <option value="0">ควั่น</option>
                        <option value="1">ลูกสำเร็จ</option>
                    </select>
                    <div class="row">
                    </div>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="btn btn-success" onclick="addline($(this));"><i fa <i class="fa fa-plus-circle"></i></div>
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
                    <select name="plan_1-1sup[]" class="form-control sub" id="">
                        <?php foreach($sub as $data):?>
                        <option value="<?=$data->id?>"><?=$data->name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="row">
                    <input type="text" name="plan_qty[]" class="form-control plan_qty">
                </div>
                <div class="row">
                    <input type="text" name="qty[]" class="form-control qty">
                </div>
                <div class="row">
                    <input type="text" name="price[]" class="form-control price">
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
            <input type="submit" value="บันทึก" class="btn btn-success">
        </div>
    </div>
</form>
        </div>
    </div>
</div>

