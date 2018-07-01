<?php

?>
<div class="row">
    <div class="col-lg-12">
<table class="table" border="0" style="width: 100%;">
    <thead>
    <tr colspan="4">
        <td colspan="4" style="text-align: center;font-size: 22px;font-weight: bold">
        <div >
            <?=$model->name;?>
        </div>
        <div style="text-align: center;font-size: 16px;">
            <?=$modeladdress->address." ต."
               .$model::findDistrictname($modeladdress->district_id)
               ." อ.".$model::findCityname($modeladdress->city_id)." จ."
               .$model::findProvincename($modeladdress->province_id)." "
                .$modeladdress->zipcode;?>
        </div>
        <div style="text-align: center;font-size: 18px;">
            <?= 'โทร.'.$model->phone;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= 'Email::'.$model->email;?></span>
        </div>
        </td>
    </tr><br>
    <tr colspan="4">
        <td colspan="4" style="text-align: center;font-size: 28px;font-weight: bold">
            ใบรับของ
        </td>
    </tr><br>
    <tr >
        <td colspan="2" style="border: none;font-size: 18px;font-weight: bold">ผู้ขาย.................................................</td>

        <td colspan="2" style="border: none;font-size: 18px;font-weight: bold">วันที่..........................................</td>
    </tr>
    </thead>
    <tbody>
        <tr style="background: #c3c3c3">
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: center">ประเภทของ</td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: center">รายละเอียด</td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: center">จำนวน(ลูก)</td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: center">ราคา</td>
        </tr>
    </tbody>
</table>
    </div>
</div>