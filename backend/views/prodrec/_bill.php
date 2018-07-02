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
        <td colspan="2" style="border: none;font-size: 18px;font-weight: bold">ผู้ขาย <?=$sup?></td>
        <td style="border: none;font-size: 18px;font-weight: bold"></td>
        <td style="border: none;font-size: 18px;font-weight: bold">วันที่  <?=$bill_date?></td>
    </tr>
    </thead>
    <tbody>
        <tr style="background: #c3c3c3">
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: center">ประเภทของ</td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: center">รายละเอียด</td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: right">จำนวน(ลูก)</td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: right">ราคา</td>
        </tr>
        <?php $rows = 0; ?>
        <?php foreach ($modelline as $data):?>
            <?php $rows +=1; ?>
        <tr style="border: 1px solid black">
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: left"><?=\backend\models\Product::findProductinfo($data->raw_type)->name;?></td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: left"><?=\backend\models\Product::findProductinfo($data->raw_type)->description;?></td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: right"><?=$data->qty?></td>
            <td style="border: none;font-size: 18px;font-weight: bold;text-align: right"><?=$data->plan_price?></td>
        </tr>
    <?php endforeach; ?>
        <?php if($rows < 10): ?>
        <?php for($x=0;$x<=(20-$rows)-1;$x++): ?>
            <tr style="border: 1px solid black;">
                <td style="border: none;font-size: 18px;font-weight: bold;text-align: left;height: 10px;"></td>
                <td style="border: none;font-size: 18px;font-weight: bold;text-align: left"></td>
                <td style="border: none;font-size: 18px;font-weight: bold;text-align: right"></td>
                <td style="border: none;font-size: 18px;font-weight: bold;text-align: right"></td>
            </tr>
        <?php endfor; ?>
        <?php endif; ?>
    </tbody>
    <tfoot>
    <tr>
        <td style="border: none;font-size: 18px;font-weight: bold;text-align: center">หมายเหตุ</td>
        <td colspan="3" style="border: none;font-size: 12px;">ตามรายการข้างบน ผู้ขายยินดีให้ผู้ซื้อทำการตรวจนับและเช็คของก่อนว่ามีปัญหาหรือไม่ โดยมีเครดิตในการชำระเงินอย่างน้อยสุด 7-10 วัน </td>
    </tr>

    <tr>
        <td colspan="2" style="border: none;font-size: 16px;font-weight: bold;text-align: center"></td>
        <td colspan="2" style="border: none;font-size: 16px;font-weight: bold;text-align: center"></td>
    </tr><br><br><br>
    <tr>
        <td colspan="2" style="border: none;font-size: 16px;font-weight: normal;text-align: center">ชื่อ............................................ผู้รับ</td>
        <td colspan="2" style="border: none;font-size: 16px;font-weight: normal;text-align: center">ชื่อ............................................ผู้ส่ง</td>
    </tr>
    </tfoot>
</table>
    </div>
</div>