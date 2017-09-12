<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SalesStage;
use app\models\ContactLog;
use app\models\Company;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DashboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
             [
            'label'    =>    'Client',
            'format'=>'raw',
            'value' => 'company_name'
                
            ],
            [
                'attribute'    =>    'Sales Stage',
                'format'=>'raw',
                    'value' => function($data1){
                        $role_label = SalesStage::find()->where(['=', 'sales_stage_id', $data1->sales_stage])->one();
                        if($role_label)
                        return $role_label->stage_name;
                        else return '--';
                    }
            ],
             
            [
                'attribute'    =>    'Details',
                'format'=>'raw',
                    'value' => function($data1){
                                          $request = Yii::$app->request;
                    $rolemapid = $request->get('company_id');
                    $model= new Company(); 
                    $url = '/dashboard/view?id='.$data1->company_id;
                     //print_r($url);
                     // exit;
                        return Html::a( "View",$url ,['class' => 'btn btn-info','style'=>'margin-top:-3px;',]);
                          
                    }
            ],
            
        ],
    ]); ?>
</div>

