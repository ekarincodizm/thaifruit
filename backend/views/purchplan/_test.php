<?php

use yii\helpers\Url;

$js=<<<JS
  var idInc = 2;
var idCol = 2
  $(function() {
    $('.btn-add-row').click(function() {
      //  alert();
      var tr = $("table.table tr:last");
      var clone = tr.clone();
      clone.find(".plan-type").attr("id","type-"+idInc);
      tr.after(clone);
      idInc +=1;
    });
    
  });
function addline(e) {
      var td = e.closest('tr').find('td:last');
      var clone = td.clone();
      var plantype = clone.find(".sub").parent().parent().parent().attr("class");
      alert(plantype);
      clone.find(".sub").attr("name",plantype+"-"+idCol+"sup[]");
      clone.find(".sub").attr("id",plantype+"-"+idCol+"sup");
      td.after(clone);
}
  function remove(e) {
    e.parent().parent().remove();
  }
JS;
$this->registerJs($js,static::POS_END);
?>
<div class="btn btn-primary btn-add-row"> เพิ่มประเภท</div>
<form action="index.php?r=purchplan/testsave" method="post">
    <table class="table">
        <tr class="tr-0">
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
            <td class="emp-" style="padding-left: 5px ;">
                <div class="row">
                    <input type="text" name="plan-1-1sup[]" class="form-control sub">
                </div>
                <div class="row">
                    <input type="text" name="plan_qty[]" class="form-control">
                </div>
                <div class="row">
                    <input type="text" name="qty[]" class="form-control">
                </div>
                <div class="row">
                    <input type="text" name="price[]" class="form-control">
                </div>
                <div class="row">
                    <div class="btn btn-remove" onclick="remove($(this));"><i class="fa fa-trash-o"></i> </div>
                </div>
            </td>

        </tr>

    </table>

    <hr>
    <div class="row">
        <div class="col-lg-12">
            <input type="submit" value="บันทึก" class="btn btn-success">
        </div>
    </div>
</form>


