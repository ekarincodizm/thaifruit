<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use lavrentiev\widgets\toastr\Notification;
use backend\assets\ICheckAsset;
//use kartik\daterange\DateRangePicker;
use dosamigos\multiselect\MultiSelect;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdrecSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
ICheckAsset::register($this);
$this->title = Yii::t('app', 'รับวัตถุดิบ');
$this->params['breadcrumbs'][] = $this->title;

$sup = \backend\models\Suplier::find()->where(['status'=>1])->all();

$this->registerJsFile(
    '@web/js/stockbalancejs.js?V=001',
    ['depends' => [\yii\web\JqueryAsset::className()]],
    static::POS_END
);
$this->registerJsFile( '@web/js/sweetalert.min.jsV=001',['depends' => [\yii\web\JqueryAsset::className()]],static::POS_END);
$this->registerCssFile( '@web/css/sweetalert.css');
$addon = <<< HTML
<span class="input-group-addon">
    <i class="glyphicon glyphicon-calendar"></i>
</span>
HTML;

?>
<div class="prodrec-index">

    <?php $session = Yii::$app->session;
    if ($session->getFlash('msg')): ?>
        <!-- <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php //echo $session->getFlash('msg'); ?>
      </div> -->
        <?php echo Notification::widget([
            'type' => 'success',
            'title' => 'แจ้งผลการทำงาน',
            'message' => $session->getFlash('msg'),
            //  'message' => 'Hello',
            'options' => [
                "closeButton" => false,
                "debug" => false,
                "newestOnTop" => false,
                "progressBar" => false,
                "positionClass" => "toast-top-center",
                "preventDuplicates" => false,
                "onclick" => null,
                "showDuration" => "300",
                "hideDuration" => "1000",
                "timeOut" => "6000",
                "extendedTimeOut" => "1000",
                "showEasing" => "swing",
                "hideEasing" => "linear",
                "showMethod" => "fadeIn",
                "hideMethod" => "fadeOut"
            ]
        ]); ?>
    <?php endif; ?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-headline">
        <form id="form-bill" action="<?=Url::to(['prodrec/bill'],true)?>" method="post" target="_blank">
            <input type="hidden" class="sup_bill" name="sup" value="">
            <input type="hidden" class="bill_from" name="from_date" value="">
            <input type="hidden" class="bill_to" name="to_date" value="">
        </form>
        <div class="panel-heading">
            <div class="btn-group">
                <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> บันทึกรับวัตถุดิบ'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="btn-group">
                    <div class="btn btn-default btn-bill"><i class="fa fa-print"></i> พิมพ์ใบรับสินค้า </div>
                <div class="btn btn-default btn-invoice"><i class="fa fa-bitcoin"></i> จ่ายเงิน </div>
            </div>
            <h4 class="pull-right"><?=$this->title?> <i class="fa fa-cubes"></i><small></small></h4>
            <!-- <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul> -->
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-9">
                <form id="form-search" action="<?=Url::to(['prodrec/index'],true)?>" method="post">
                    <div class="form-inline">
                    <div class="btn-group">
<!--                        --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                        <input type="text" class="form-control txt_search" name="txt_search" placeholder="ค้นหา" value="<?=$txt_search?>">
                    </div>
                    <div class="btn-group">
                        <?php      echo kartik\select2\Select2::widget([
                            // 'id'=>"multiXX",
                            'name'=>'sup_select',
                            'id'=>"sup_select",
                            'data'=>ArrayHelper::map($sup,'id','name'),
                            'value' => $sup_select ,
                            'options'=>['placeholder'=>'ผู้ขาย',
                                 'onchange'=>'
                                  
                                    $(".sup_bill").val($(this).val());
                                     
                                    
                                 '
                                ],

                        ]); ?>
                    </div>
                    <div class="btn-group">
                       <?php

//                       echo '<div class="input-group drp-container">';
//                       echo DateRangePicker::widget([
//                               'name'=>'bill_range',
//                               'value'=>$from_date." ถึง ".$to_date,
//                               'convertFormat'=>true,
//                               'useWithAddon'=>true,
//                               'options' => ['class'=>'form-control find_date'],
//                               'pluginOptions'=>[
//                                   'locale'=>[
//                                           'format'=>'d-m-Y',
//                                       'separator'=>' ถึง ',
//                                   ],
//                                   'opens'=>'left'
//                               ]
//                           ]) . $addon;
//                       echo '</div>';
                       ?>
                    </div>
                        <input type="hidden" name="perpage" value="<?=$perpage?>">
                        <div class="btn-group">
                            <input type="submit" class="btn btn-info btn-search" value="ค้นหา" />
                            <div class="btn btn-default btn-reset"> รีเซ็ต</div>
                        </div>
                    </div>
                 </form>
                </div>
                <div class="col-lg-3">
                    <div class="pull-right">
                        <form id="form-perpage" class="form-inline" action="<?=Url::to(['prodrec/index'],true)?>" method="post">
                            <div class="form-group">
                                <label>แสดง </label>
                                <select class="form-control" name="perpage" id="perpage">
                                    <option value="20" <?=$perpage=='20'?'selected':''?>>20</option>
                                    <option value="50" <?=$perpage=='50'?'selected':''?> >50</option>
                                    <option value="100" <?=$perpage=='100'?'selected':''?>>100</option>
                                </select>
                                <label> รายการ</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <div class="table-grid">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'emptyCell'=>'-',
                        'layout'=>'{items}{summary}{pager}',
                        'summary' => "แสดง {begin} - {end} ของทั้งหมด {totalCount} รายการ",
                        'showOnEmpty'=>false,
                        'bordered'=>false,
                        'striped' => false,
                        'tableOptions' => ['class' => 'table table-hover'],
                        'emptyText' => '<br /><div style="color: red;align: center;"> <b>ไม่พบรายการไดๆ</b></div>',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn','contentOptions' => ['style' => 'vertical-align: middle']],
                            ['class' => 'yii\grid\CheckboxColumn','headerOptions' => ['style' => 'text-align: center'],'contentOptions' => ['style' => 'vertical-align: middle;text-align: center;']],
                            // 'id',
                            [
                                'attribute'=>'journal_no',
                                'contentOptions' => ['style' => 'vertical-align: middle'],
                            ],
                            [
                                'attribute'=>'suplier_id',
                                'contentOptions' => ['style' => 'vertical-align: middle'],
                                'value' => function($data){
                                   return \backend\models\Suplier::findName($data->suplier_id);
                                }
                            ],
                            [
                                'attribute'=>'trans_date',
                                'contentOptions' => ['style' => 'vertical-align: middle'],
                                'value' => function($data){
                                   return date('d-m-Y',$data->trans_date);
                                }
                            ],
                            [
                                'attribute'=>'lot_no',
                                'contentOptions' => ['style' => 'vertical-align: middle'],
                            ],
                            [
                                'attribute'=>'qty',
                                'contentOptions' => ['style' => 'vertical-align: middle'],
                            ],
                            [
                                'attribute'=>'status',
                                'contentOptions' => ['style' => 'vertical-align: middle'],
                                'format' => 'html',
                                'value'=>function($data){
                                   if($data->status === 0){
                                       return '<div class="label label-default">รับสินค้าแล้ว</div>';
                                   }else  if($data->status === 1){
                                       return '<div class="label label-primary">รอจ่ายเงิน</div>';
                                   } else{
                                       return '<div class="label label-success">จ่ายเงินแล้ว</div>';
                                   }
                                }
                            ],
                            [

                                'header' => '',
                                'headerOptions' => ['style' => 'text-align:center;','class' => 'activity-view-link',],
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'text-align: right'],
                                'buttons' => [
                                    'view' => function($url, $data, $index) {
                                        $options = [
                                            'title' => Yii::t('yii', 'View'),
                                            'aria-label' => Yii::t('yii', 'View'),
                                            'data-pjax' => '0',
                                        ];
                                        return Html::a(
                                            '<span class="glyphicon glyphicon-eye-open btn btn-xs btn-default"></span>', $url, $options);
                                    },
                                    'update' => function($url, $data, $index) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'Update'),
                                            'aria-label' => Yii::t('yii', 'Update'),
                                            'data-pjax' => '0',
                                            'id'=>'modaledit',
                                        ]);
                                        return Html::a(
                                            '<span class="glyphicon glyphicon-pencil btn btn-xs btn-default"></span>', $url, [
                                            'id' => 'activity-view-link',
                                            //'data-toggle' => 'modal',
                                            // 'data-target' => '#modal',
                                            'data-id' => $index,
                                            'data-pjax' => '0',
                                            // 'style'=>['float'=>'rigth'],
                                        ]);
                                    },
                                    'delete' => function($url, $data, $index) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'Delete'),
                                            'aria-label' => Yii::t('yii', 'Delete'),
                                            //'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                            //'data-method' => 'post',
                                            //'data-pjax' => '0',
                                            'data-url'=>$url,
                                            'onclick'=>'recDelete($(this));'
                                        ]);
                                        return Html::a('<span class="glyphicon glyphicon-trash btn btn-xs btn-default"></span>', 'javascript:void(0)', $options);
                                    }
                                ]
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>

    <div id="billxModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-print"></i> พิมพ์ใบรับของ <small id="items"> </small></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                             ผู้ขาย
                            <select name="vendor" id="vendor" class="form-control">
                                <?php foreach ($sup as $data): ?>
                                <option value="<?=$data->id?>"><?=$data->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-add-bank">บันทึก</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>

        </div>
    </div>

<?php

$url_to_print_bill =  Url::to(['prodrec/callbill'],true);
$this->registerJs('
    $(function(){
        $("#perpage").change(function(){
            $("#form-perpage").submit();
        });
        
        $(".btn-bill").click(function(){
          if($("#sup_select").val()==""){
             alert("ทำการเลือกผู้ขายก่อน");return;
          }
            var finddate = $(".find_date").val().split("ถึง");
                           $(".bill_from").val(finddate[0]);
                           $(".bill_to").val(finddate[1]);
            $(".sup_bill").val($("#sup_select").val());
            $("form#form-bill").submit();
        });
        $(".btn-reset").click(function(){
           $("#sup_select").prop("selectedIndex",0);
           $("#sup_select").trigger("change");
           $(".txt_search").val("");
        });
    });

   function recDelete(e){
        //e.preventDefault();
        var url = e.attr("data-url");
        swal({
              title: "ต้องการลบรายการนี้ใช่หรือไม่",
              text: "",
              type: "error",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            }, function () {
              e.attr("href",url); 
              e.trigger("click");        
        });
    }

    ',static::POS_END);
?>