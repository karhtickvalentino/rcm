<?php

namespace webvimark\modules\UserManagement\controllers;

use webvimark\components\AdminDefaultController;
use Yii;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\search\UserSearch;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\rbacDB\Role;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AdminDefaultController
{
	/**
	 * @var User
	 */
	public $modelClass = 'webvimark\modules\UserManagement\models\User';

	/**
	 * @var UserSearch
	 */
	public $modelSearchClass = 'webvimark\modules\UserManagement\models\search\UserSearch';

	/**
	 * @return mixed|string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new User(['scenario'=>'newUser']);

		if ( $model->load(Yii::$app->request->post())   )
		{
			$model->username = $model->email;
			//print_r(Yii::$app->request->post());exit;
			$roles = [];
            $model->save();
            array_push($roles, 'employees');

            $uid = User::find()->where(['email' => $model->email])->one();
            
			$oldAssignments = array_keys(Role::getUserRoles($uid->id));

              // To be sure that user didn't attempt to assign himself some unavailable roles
              $newAssignments = array_intersect(Role::getAvailableRoles(Yii::$app->user->isSuperAdmin, true), (array)$roles);

              $toAssign = array_diff($newAssignments, $oldAssignments);
              $toRevoke = array_diff($oldAssignments, $newAssignments);

              foreach ($toRevoke as $role)
              {
                  User::revokeRole($uid->id, $role);
              }

              foreach ($toAssign as $role)
              {
                  User::assignRole($uid->id, $role);
              }
		
			return $this->redirect(['view',	'id' => $model->id]);
		}

		return $this->renderIsAjax('create', compact('model'));
	}

	/**
	 * @param int $id User ID
	 *
	 * @throws \yii\web\NotFoundHttpException
	 * @return string
	 */
	public function actionChangePassword($id)
	{
		$model = User::findOne($id);

		if ( !$model )
		{
			throw new NotFoundHttpException('User not found');
		}

		$model->scenario = 'changePassword';

		if ( $model->load(Yii::$app->request->post()) && $model->save() )
		{
			return $this->redirect(['view',	'id' => $model->id]);
		}

		return $this->renderIsAjax('changePassword', compact('model'));
	}

}
