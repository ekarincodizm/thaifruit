<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller {

  public function actionInit(){
     $auth = Yii::$app->authManager;
     $auth->removeAll();
     Console::output('Removing All RBAC');

     $systemAdmin = $auth->createRole('SystemAdmin');
     $systemAdmin->description = "จัดการระบบ";
     $auth->add($systemAdmin);

     $manageUser = $auth->createRole('ManageUser');
     $manageUser->description = "สำหรับจัดการข้อมูลผู้ใช้งาน";
     $auth->add($manageUser);

     $manageInventory = $auth->createRole('ManageInventory');
     $manageInventory->description="จัดการสินค้าคงคลัง";
     $auth->add($manageInventory);

     $rule = new \common\rbac\AuthorRule; // add rules
     $auth->add($rule);

     $updateOwner = $auth->createPermission('UpdateOwner'); // add permission fon rule
     $updateOwner->description = "แก้ไขข้อมูลของตัวเอง";
     $updateOwner->ruleName = $rule->name;
     $auth->add($updateOwner);

     $auth->addChild($manageInventory,$updateOwner);
     


     $auth->addChild($systemAdmin,$manageUser);
     $auth->addChild($systemAdmin,$manageInventory);

     $auth->assign($systemAdmin,1);
	 $auth->assign($manageInventory,2);


  }

}
?>