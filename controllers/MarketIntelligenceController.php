<?php

namespace app\controllers;

use Yii;
use app\models\MarketIntelligence;
use app\models\MarketIntelligencesearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarketIntelligenceController implements the CRUD actions for MarketIntelligence model.
 */
class MarketIntelligenceController extends Controller
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
     * Lists all MarketIntelligence models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MarketIntelligencesearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MarketIntelligence model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        if($model == null){
            $model1= new MarketIntelligence();
        return $this->render('create',['model'=>$model1]);
    }
        else return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new MarketIntelligence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new MarketIntelligence();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->company_id = $id;
            $model->client_id = 1;
             $model->updated_by = Yii::$app->user->identity->username;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->company_id]);
            }
            else{
                return $this->render('create', ['model' => $model,'id' => $id,]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    /**
     * Updates an existing MarketIntelligence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->updated_on = date_format(date_create(),'Y:m:d H:i:s');
            $model->updated_by = Yii::$app->user->identity->username;
            $model->save();
            return $this->redirect(['view', 'id' => $model->company_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MarketIntelligence model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/dashboard/view?id='.$id]);
    }

    /**
     * Finds the MarketIntelligence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MarketIntelligence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MarketIntelligence::findOne($id)) !== null) {
            return $model;
        } else {
            // throw new NotFoundHttpException('The requested page does not exist.');
            return 0;
        }
    }
}
