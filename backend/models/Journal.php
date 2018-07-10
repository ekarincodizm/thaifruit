<?php
namespace backend\models;
use Yii;
use yii\db\ActiveRecord;
date_default_timezone_set('Asia/Bangkok');

class Journal extends \common\models\Journal
{
    public function behaviors()
    {
        return [
            'timestampcdate'=>[
                'class'=> \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT=>'created_at',
                ],
                'value'=> time(),
            ],
            'timestampudate'=>[
                'class'=> \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT=>'updated_at',
                ],
                'value'=> time(),
            ],
            'timestampcby'=>[
                'class'=> \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT=>'created_by',
                ],
                'value'=> Yii::$app->user->identity->id,
            ],
            'timestamuby'=>[
                'class'=> \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_UPDATE=>'updated_by',
                ],
                'value'=> Yii::$app->user->identity->id,
            ],
            'timestampupdate'=>[
                'class'=> \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_UPDATE=>'updated_at',
                ],
                'value'=> time(),
            ],
        ];
    }

    public function findName($id){
        $model = Journal::find()->where(['id'=>$id])->one();
        return count($model)>0?$model->name:'';
    }

    public static function createTrans($zone,$data,$ref,$reftype){
        if(count($data)>0){
            $model = new Journal();
            $model->journal_no = self::getLastNo();
            $model->reference = $ref;
            $model->reference_type_id = $reftype;
            if($model->save()){
                $zone_sum_qty = 0;
                for($i=0;$i<=count($data)-1;$i++){
                    $modelline = new Journaltrans();
                    $modelline->journal_id = $model->id;
                    $modelline->product_id = $data[$i]['product_id'];
                    $modelline->qty = $data[$i]['qty'];
                    $modelline->line_price = $data[$i]['price'];
                    $modelline->line_amount = ($data[$i]['price'] * $data[$i]['qty']);
                    $modelline->status = 1;
                    if($modelline->save()){
                        $zone_sum_qty += $data[$i]['qty'];
                    }

                }
                self::sumqty($zone,$zone_sum_qty);
                return true;
            }

        }
    }
    public function sumqty($zone,$new_qty){
       if($zone){
           $model = Zone::find()->where(['id'=>$zone])->one();
           if($model){
               $model->qty = $new_qty;
               $model->lock = 1;
               $model->save();
           }
       }
    }
    public function getLastNo(){
        $model = Journal::find()->MAX('name');
        if($model){
            $prefix = 'AJ'.substr(date("Y"),2,2);
            $cnum = substr((string)$model,5,strlen($model));
            $len = strlen($cnum);
            $clen = strlen($cnum + 1);
            $loop = $len - $clen;
            for($i=1;$i<=$loop;$i++){
                $prefix.="0";
            }
            $prefix.=$cnum + 1;
            return $prefix;
        }else{
            $prefix ='AJ'.substr(date("Y"),2,2);
            return $prefix.'000001';
        }
    }

}
