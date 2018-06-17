<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal form-label-left']]); ?>
    <div class="x_panel">
                  <div class="x_title">
                    <h3><i class="fa fa-cube"></i> <?=$this->title?> <small></small></h3>
                    <ul class="nav navbar-right panel_toolbox" style="margin-top: -40px;">
                      <li><?php echo $form->field($model, 'is_hold')->widget(Switchery::className(),['options'=>['label'=>'','class'=>'form-control']])->label() ?>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                         <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">ข้อมูลสินค้า</a>
                        </li>
                
                        <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">ความเคลื่นไหว</a>
                        </li>
                        </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">รหัสสินค้า <span class="required"></span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                               <?= $form->field($model, 'product_code')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ชื่อสินค้า <span class="required"></span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                               <?= $form->field($model, 'name')->textarea(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">รายละเอียด <span class="required"></span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                               <?= $form->field($model, 'description')->textarea(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">บาร์โค้ด <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'barcode')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                          </div>
                                          
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ประเภท <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'product_type_id')->widget(Select2::className(),[
                                                      'data' => ArrayHelper::map(backend\helpers\ProductType::asArrayObject(),'id','name'),
                                                      'options' => ['placeholder'=>'เลือกประเภท']
                                                   ])->label(false) ?>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">หมวดสินค้า <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'category_id')->widget(Select2::className(),[
                                                      'data' => ArrayHelper::map(backend\models\Productcat::find()->all(),'id','name'),
                                                      'options' => ['placeholder'=>'เลือกกลุ่มสินค้า']
                                                   ])->label(false) ?>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">หน่วยนับ <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'unit_id')->widget(Select2::className(),[
                                                      'data' => ArrayHelper::map(backend\models\Unit::find()->all(),'id','name'),
                                                      'options' => ['placeholder'=>'เลือกหน่วยนับ']
                                                   ])->label(false) ?>
                                            </div>
                                          </div>
                                        
                                           

                                </div>
                                 <div class="col-lg-6">
                                  <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">จัดเก็บขั้นต่ำ <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'min_stock')->textInput(['maxlength' => true,'class'=>'form-control','value'=>$model->min_stock!=""?$model->min_stock:0])->label(false) ?>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">จัดเก็บสูงสุด <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'max_stock')->textInput(['maxlength' => true,'class'=>'form-control','value'=>$model->max_stock!=""?$model->max_stock:0])->label(false) ?>
                                            </div>
                                          </div>
                                     
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ลักษณะสินค้า <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'bom_type')->widget(Select2::className(),[
                                                      'data' => ArrayHelper::map(backend\helpers\Bomtype::asArrayObject(),'id','name'),
                                                      'options' => ['placeholder'=>'เลือกประเภทโครงสร้างสินค้า']
                                                   ])->label(false) ?>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ต้นทุน <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'cost')->textInput(['maxlength' => true,'class'=>'form-control','value'=>$model->cost!=""?$model->cost:0])->label(false) ?>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ราคา <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'price')->textInput(['maxlength' => true,'class'=>'form-control','value'=>$model->price!=""?$model->price:0])->label(false) ?>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">วันที่ราคา <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'date_price')->textInput(['maxlength' => true,'class'=>'form-control','disabled'=>'disabled'])->label(false) ?>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">อายุการใช้ <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'shelf_life')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ตรวจสอบผู้ขาย <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'check_avl')->widget(Select2::className(),[
                                                  'data'=>ArrayHelper::map(\backend\helpers\CheckAvl::asArrayObject(),'id','name')
                                                ])->label(false) ?>
                                            </div>
                                          </div>

                                           
                                 </div>
                                
                            </div>
                              <hr />
                               <div class="row">
                                   <div class="col-lg-6">
                                     <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">น้ำหนักสินค้า <span class="required"></span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <?= $form->field($model, 'netweight')->textInput(['maxlength' => true,'class'=>'form-control','value'=>$model->netweight!=""?$model->netweight:0])->label(false) ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">น้ำหนักบรรจุภัณฑ์ <span class="required"></span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <?= $form->field($model, 'tareweight')->textInput(['maxlength' => true,'class'=>'form-control','value'=>$model->tareweight!=""?$model->tareweight:0])->label(false) ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">น้ำหนักรวม <span class="required"></span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <?= $form->field($model, 'grossweight')->textInput(['maxlength' => true,'class'=>'form-control','disabled'=>'disabled','value'=>$model->grossweight!=""?$model->grossweight:0])->label(false) ?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">สถานะ <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <?= $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'','class'=>'form-control']])->label(false) ?>
                                            </div>
                                          </div>
                                   </div>
                                   <div class="col-lg-6">
                               <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">สินค้าทั้งหมด <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?= $form->field($model, 'all_qty')->textInput(['maxlength' => true,'class'=>'form-control','disabled'=>'disabled','value'=>$model->all_qty!=""?$model->all_qty:0])->label(false) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">สินค้าจอง <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?= $form->field($model, 'reserved_qty')->textInput(['maxlength' => true,'class'=>'form-control','disabled'=>'disabled','value'=>$model->reserved_qty!=""?$model->reserved_qty:0])->label(false) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">สินค้าที่ใช้ได้ <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?= $form->field($model, 'available_qty')->textInput(['maxlength' => true,'class'=>'form-control','disabled'=>'disabled','value'=>$model->available_qty!=""?$model->available_qty:0])->label(false) ?>
                                    </div>
                                </div>
                             </div>
                           </div>
                           <hr />
                            
                        </div>
                     
                      </div>
                    </div>

                        <div class="col-md-8 col-md-offset-4">
                           <?= Html::submitButton(Yii::t('app', 'บันทึก'), ['class' => 'btn btn-success']) ?>
                           <?php if(!$model->isNewRecord):?>
                            <div class="btn btn-default"><a href="<?=Url::to(['product/view/','id'=>$model->id],true)?>">ดูรายละเอียด</a></div>
                          <?php endif;?>
                            <div class="btn btn-danger"><a style="color: #FFF" href="<?=Url::to(['product/index'],true)?>">ยกเลิก</a></div>
                        </div>

                      
                    </div>
                </div>

    <?php ActiveForm::end(); ?>



</div>
            