<?php

namespace app\controllers;

use Yii;
use app\models\ContactLog;
use app\models\ContactLogsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use app\models\Company;
use yii\data\ActiveDataProvider;
use app\models\Companysearch;

/**
 * ContactLogController implements the CRUD actions for ContactLog model.
 */
class ContactLogController extends Controller
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all ContactLog models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        // $searchModel = new ContactLogsearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //     return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider
            
            
        // ]);

        $searchModel = new ContactLogsearch();
               
        $query = ContactLog::find()->where(['company_id'=> $id ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'company_id' => SORT_DESC,
                   
                ]
            ],
        ]);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
    }

    /**
     * Displays a single ContactLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContactLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $modelCustomer = new ContactLog;
        $modelsAddress = [new ContactLog];
        $modelCustomer->client_id=1;
        if ($modelCustomer->load(Yii::$app->request->post())) {

            $modelsAddress = Model::createMultiple(ContactLog::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

            // validate all models
            $valid = $modelCustomer->validate();
            $valid = Company::validateMultiple($modelsAddress) && $valid;
            
            //if($valid){
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->client_id=1;
                            $modelAddress->assigned_to=  Yii::$app->user->identity->username;
                            $modelAddress->company_id=$id;
                            if (! ($flag = $modelAddress->save(false))) {

                                $transaction->rollBack();
                                break;
                            }
                            // else{
                            //   $id = $modelAddress->contact_log_id;
                            // }
                        
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index', 'id' => $id]);
                        
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();    
                }
            //}    
        }

        return $this->render('create', [
            'modelCustomer' => $modelCustomer,
            'modelsAddress' => (empty($modelsAddress)) ? [new ContactLog] : $modelsAddress,
            'id'=> $id,
            
        ]);
    }

    /**
     * Updates an existing ContactLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionUpdate($id)
    // {
    //     //  $modelCustomer = $this->findModel($id);
    //     // $modelsAddress = $modelCustomer;

    //     // if ($modelCustomer->load(Yii::$app->request->post())) {

    //     //     $oldIDs = ArrayHelper::map($modelsAddress, 'contact_log_id', 'contact_log_id');
    //     //     $modelsAddress = Model::createMultiple(ContactLog::classname(), $modelsAddress);
    //     //     Model::loadMultiple($modelsAddress, Yii::$app->request->post());
    //     //     $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAddress, 'contact_log_id', 'contact_log_id')));

          

    //     //     // validate all models
    //     //     $valid = $modelCustomer->validate();
    //     //     $valid = Model::validateMultiple($modelsAddress) && $valid;

    //     //     if ($valid) {
    //     //         $transaction = \Yii::$app->db->beginTransaction();
    //     //         try {
    //     //             if ($flag = $modelCustomer->save(false)) {
    //     //                 if (! empty($deletedIDs)) {
    //     //                     Address::deleteAll(['id' => $deletedIDs]);
    //     //                 }
    //     //                 foreach ($modelsAddress as $modelAddress) {
    //     //                     $modelAddress->customer_id = $modelCustomer->id;
    //     //                     if (! ($flag = $modelAddress->save(false))) {
    //     //                         $transaction->rollBack();
    //     //                         break;
    //     //                     }
    //     //                 }
    //     //             }
    //     //             if ($flag) {
    //     //                 $transaction->commit();
    //     //                 return $this->redirect(['view', 'id' => $modelCustomer->id]);
    //     //             }
    //     //         } catch (Exception $e) {
    //     //             $transaction->rollBack();
    //     //         }
    //     //     }
    //     // }

    //     // return $this->render('update', [
    //     //     'modelCustomer' => $modelCustomer,
    //     //     'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress,
    //     //     'id'=>$id
    //     // ]);
    //    $model = $this->findModel($id);
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->contact_log_id]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //             'id'=>$id
    //         ]);
    //     }
    
    // }

    /**
     * Deletes an existing ContactLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$company_id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index','id'=>$company_id]);
    }

    /**
     * Finds the ContactLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContactLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
