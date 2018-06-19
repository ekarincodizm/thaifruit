<?php
use \yii2fullcalendar\yii2fullcalendar;
use yii\helpers\Url;
use yii\web\JsExpression;

$events = array();
//Testing
$Event = new \yii2fullcalendar\models\Event();
$Event->id = 1;
$Event->title = 'แผนซื้อ';
$Event->start = date('Y-m-d\TH:i:s\Z');
//$event->nonstandard = [
//    'field1' => 'Something I want to be included in object #1',
//    'field2' => 'Something I want to be included in object #2',
//];
$events[] = $Event;

$jsEvent = <<<JS
 alert("niran")
JS;
$js = <<< JS
  $(function() {
     $(document).on('click','td.fc-day,.fc-day-top',function() {
         var date = $(this).attr("data-date");
         $(".plan_date").val(date);
         $("#bankModal").modal("show").find('#items').text(new Date(date).toLocaleDateString());
     })
  })
JS;

$this->registerJs($js,static::POS_END);


?>
<div class="panel panel-headlin">
    <div class="panel-heading">
        <h3><i class="fa fa-calendar"></i> วางแผนซื้อ<small></small></h3>

        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <?= \yii2fullcalendar\yii2fullcalendar::widget([
                        'options' => [
                            'lang' => 'th',
                        ],
                        'clientOptions' => [
                            'selectable' => true,
                            'selectHelper' => true,
                            'editable' => true,
            //
                        ],
            //    'eventClick'=> new \yii\web\JsExpression($jsEvent),
                'events' => Url::to(['purchplan/calendaritem']),
            //    'select' => new \yii\web\JsExpression($jsEvent)
                        //'events' => $events
                    ]);
                    ?>
                </div>
            </div>
    </div>
    <div id="bankModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-calendar-check-o"></i> แผนสั่งซื้อประจำวันที่  <span id="items" style="font-size: 24px;font-weight: bold;"> </span></h4>
                </div>
                <div class="modal-body">

                     <?php $form = \yii\widgets\ActiveForm::begin(['action' => Url::to(['purchplan/createtitle'],true)])?>
                    <input type="hidden" class="plan_date" name="plan_date">
                       <?= $form->field($modelevent,'title')->textInput()?>
                    <input type="submit" value="OK">
                     <?php \yii\widgets\ActiveForm::end();?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-add-bank">บันทึก</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>

        </div>
    </div>

</div>

