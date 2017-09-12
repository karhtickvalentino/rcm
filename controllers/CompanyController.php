<?php

namespace app\controllers;

use Yii;
use app\models\Company;
use app\models\companysearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use app\models\Person;
use app\models\Model;
use webvimark\modules\UserManagement\components\GhostAccessControl;
//use app\base\Model;

/**
 * CompanyController implements the CRUD actions for company model.
 */
class CompanyController extends Controller
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //     // 'ghost-access'=> [
    //     //     'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
    //     // ],
    //     //     'verbs' => [
    //     //         'class' => VerbFilter::className(),
    //     //         'actions' => [
    //     //             'delete' => ['POST'],
    //     //         ],
    //     //     ],
    //     ];
    // }
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => GhostAccessControl::className(),
            ],
        ];
    }

    /**
     * Lists all company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new companysearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        // return $this->render('view', [
        //     'model' => $this->findModel($id),
        // ]);
        $model = $this->findModel($id);
        $addresses = $model->hasMany($model,$id);

        return $this->render('view', [
            'model' => $model,
            'addresses' => $addresses,
        ]);
    }


    /**
     * Creates a new company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelCustomer = new Company;
        $modelsAddress = [new Person];
        $modelCustomer->client_id=1;
        $modelCustomer->created_by = Yii::$app->user->identity->username;
       //  $model->created_on = date_format(date_create(),'Y:m:d H:i:s');
        //  $model->updated_on = date_format(date_create(),'Y:m:d H:i:s');
        // $model->created_on = date_format(date_create(),'Y:m:d H:i:s');
       
        if ($modelCustomer->load(Yii::$app->request->post())) {

            $modelsAddress = Model::createMultiple(Person::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

                        
            
            // validate all models
            // $valid = $modelCustomer->validate();
            // $valid = Company::validateMultiple($modelsAddress) && $valid;
            
            
                $transaction = \Yii::$app->db->beginTransaction();
                try { 

                    if ($flag = $modelCustomer->save(false)) {
                       
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->client_id=1;
                            $modelAddress->company_id=$modelCustomer->company_id;
                            $modelAddress->updated_on = date_format(date_create(),'Y:m:d H:i:s');
                            $modelAddress->created_on = date_format(date_create(),'Y:m:d H:i:s');
                            $modelAddress->updated_by = Yii::$app->user->identity->username;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCustomer->company_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                
            }
        }

        return $this->render('create', [
            'modelCustomer' => $modelCustomer,
            'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
        ]);
    }

    /**
     * Updates an existing company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    // public function actionUpdate($rolemapid,$kpiid)
    // {
    //     $rolemapid = base64_decode($rolemapid);
    //     $kpiid = base64_decode($kpiid);
    //     $model = $this->getTargets($rolemapid, $kpiid);
    //     $rolemap = RoleMap::findOne($rolemapid);

    //     if(isset($_POST['button1'])){
    //         $statusSaved = StatusTable::find()->select('status_id')->where(['=', 'status_label', 'Saved(OD Target)'])->one();
    //         $odStatus = OutcomeDriverTarget::find()->where(['role_map_id' => $rolemapid, 'kpi_id' => $kpiid])->orderBy(['od_target_id'=>SORT_DESC])->one();
            
    //         $statusId = StatusTable::find()->select('status_id')->where(['=', 'status_label', 'Saved(OD Target)'])->one();

    //         $transaction = \Yii::$app->db->beginTransaction();
    //         $flag = true;
    //         try{
    //             foreach(Yii::$app->request->post('OutcomeDriverTarget') as $formvalue){
    //                 if(isset($formvalue['od_target_id']) && $formvalue['od_target_id'] != ""){

    //                     $modelToUpdate = $this->findModel($formvalue['od_target_id']);
    //                     $modelToUpdate->od_target_id = $formvalue['od_target_id']; 
    //                     $modelToUpdate->role_map_id = $rolemapid;
    //                     $modelToUpdate->role_manager_id = $rolemap->role_manager_id;
    //                     $modelToUpdate->role_appraisal_start_date = $rolemap->role_appraisal_start_date;
    //                     $modelToUpdate->role_appraisal_end_date = $rolemap->role_appraisal_end_date;
    //                     $modelToUpdate->kpi_id = $formvalue['kpi_id'];
    //                     $modelToUpdate->outcome_driver_id = $formvalue['outcome_driver_id'];
    //                     $modelToUpdate->od_periodicity = $formvalue['od_periodicity'];
    //                     $modelToUpdate->od_data_source = $formvalue['od_data_source'];
    //                     //$modelToUpdate->is_measure = $formvalue['is_measure'];
    //                     $modelToUpdate->rating_1 = $formvalue['rating_1'];
    //                     //$modelToUpdate->employee_comments = $formvalue['employee_comments'];
    //                     $modelToUpdate->fl_comments = $formvalue['fl_comments'];
    //                     $modelToUpdate->status = $statusId->status_id;
    //                     $modelToUpdate->created_by = Yii::$app->user->identity->email;
                        
    //                     if (!$modelToUpdate->save(false)) {
    //                         $transaction->rollBack();
    //                         break;
    //                     }
                        
    //                 } else {
    //                     $modelToCreate = new OutcomeDriverTarget(); 
    //                     $modelToCreate->role_map_id = $rolemapid;
    //                     $modelToCreate->role_manager_id = $rolemap->role_manager_id;
    //                     $modelToCreate->role_appraisal_start_date = $rolemap->role_appraisal_start_date;
    //                     $modelToCreate->role_appraisal_end_date = $rolemap->role_appraisal_end_date;
    //                     $modelToCreate->kpi_id = $formvalue['kpi_id'];
    //                     $modelToCreate->outcome_driver_id = $formvalue['outcome_driver_id'];
    //                     $modelToCreate->od_periodicity = $formvalue['od_periodicity'];
    //                     $modelToCreate->od_data_source = $formvalue['od_data_source'];
    //                     //$modelToCreate->is_measure = $formvalue['is_measure'];
    //                     $modelToCreate->rating_1 = $formvalue['rating_1'];
    //                     //$modelToCreate->employee_comments = $formvalue['employee_comments'];
    //                     $modelToCreate->fl_comments = $formvalue['fl_comments'];
    //                     $modelToCreate->status = $statusId->status_id;
    //                     $modelToCreate->created_by = Yii::$app->user->identity->email;

    //                     if (! ($flag = $modelToCreate->save(false))) {
    //                         $transaction->rollBack();
    //                         break;
    //                     }
    //                 }
    //             }
    //             if ($flag) {
    //                 $transaction->commit();                 
    //                 return $this->redirect(['/employee-targets', 'rolemapid' => base64_encode($rolemapid)]);
    //             }
    //         } catch (Exception $e){
    //             $transaction->rollBack();
    //             //echo $e;
    //         }
    //     }
            
        
        
    //      return $this->render('update', [
    //         'model' => (empty($model)) ? [new OutcomeDriverTarget] : $model
    //     ]);
    // }

  public function getPerson($companyID)
  {
    $model = Person::find()->where(['company_id' => $companyID])->all();
    return $model;
  }

    public function actionUpdate($id)
    {   
        
        $modelCustomer = $this->findModel($id);
         $modelCustomer->client_id = Yii::$app->user->id;
        $companyID = $id;
        $modelsAddress = $this->getPerson($companyID);
       
        if ($modelCustomer->load(Yii::$app->request->post())) {
             $modelCustomer->client_id=1;

            // print_r(Yii::$app->request->post());exit;
             // $model->updated_on = date_format(date_create(),'Y:m:d H:i:s');
            
            $oldIDs = ArrayHelper::map($modelsAddress, 'company_id', 'customer_id');
            $modelsAddress = Model::createMultiple(Person::classname(), $modelsAddress);
           

            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAddress, 'company_id', 'company_id')));
             //print_r($deletedIDs);exit;
 
           // $valid = Model::validateMultiple($modelsAddress);

            //if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelCustomer->save(false)) {

                        if (! empty($deletedIDs)) {

                           // Person::deleteAll(['customer_id' => $deletedIDs]);
                        }
                      $ary = [];
                        foreach ($modelsAddress as $modelAddress) {
                             //print_r($modelsAddress);exit;
                            $modelAddress->client_id=1;
                            $modelAddress->company_id=$modelCustomer->company_id;
                            $modelAddress->updated_on = date_format(date_create(),'Y:m:d H:i:s');
                            $modelAddress->created_on = date_format(date_create(),'Y:m:d H:i:s');
                            $modelAddress->updated_by = Yii::$app->user->identity->username;
                             $flag = $modelAddress->save(false);
                             array_push($ary, $modelAddress->customer_id);

                            if ($flag == 0) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                     //print_r($ary);exit;
                    if ($flag) {
                                
                         
                                 $transaction->commit();
                                  $rows = (new \yii\db\Query())
                                 ->select([new \yii\db\Expression('customer_id')])
                                 ->from('person')
                                 ->where(['and',['not in','customer_id',$ary],['company_id'=>$modelCustomer->company_id]])
                                 ->all();
                                 //print_r($rows);exit;
                                 if($rows){
                                         foreach ($rows as  $delid) {
                                        //print_r($delid);exit;
                                         $this->delete1($delid);
                                                 }
                                         }
                                 return $this->redirect(['index', 'id' => $modelCustomer->company_id]);
                             }
                }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
             // }
           
        }

        return $this->render('update', [
            'modelCustomer' => $modelCustomer,
            'modelsAddress' => (empty($modelsAddress)) ? [new Person] : $modelsAddress
        ]);
        
    }
    

    /**
     * Deletes an existing company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    
public function actionDelete($id)
    {
        try{
            $this->findModel($id)->delete();
                $_SESSION['errorMsg'] = 'You have deleted one record successfully.';
                return $this->redirect(['index']);
        }
        catch(\Exception $e){
            $_SESSION['errorMsg'] = 'You cannot delete this record since there are line items that use this value.' ;
            return $this->redirect(['index']);
        }
    }
    protected function delete1($id)
    {
        try{
            $this->findModel1($id)->delete();
                $_SESSION['errorMsg'] = 'You have deleted one record successfully.';
                return $this->redirect(['index']);
        }
        catch(\Exception $e){
            $_SESSION['errorMsg'] = 'You cannot delete this record since there are line items that use this value.' ;
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModel1($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
