<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Company;
use app\models\ContactMethod;
use app\models\Person;
use app\models\MarketIntelligence;

$request = Yii::$app->request;
$id = $request->get('id');

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactLogsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?= Html::a('Company Profile','/dashboard/view?id='.$id, ['class' => 'btn btn-success']) ?>
        <?= Html::a('Contact Log','/contact-log/create?id='.$id,['class' => 'btn btn-success']) ?>
        <?= Html::a('View Contact Log','/contact-log/index?id='.$id, ['class' => 'btn btn-success']) ?>
       <?php
        $mi = MarketIntelligence::find()->where(['company_id' => $id])->one();
        if(empty($mi)){
            echo Html::a('Market Intelligence','/market-intelligence/create?id='.$id,['class' => 'btn btn-success']);
        }
        else{
            echo Html::a('Market Intelligence','/market-intelligence/view?id='.$id,['class' => 'btn btn-success']);
        }
        ?> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             [
                'attribute' =>    'company_id',
                'format'=>'raw',
                    'value' => function($data1){
                    //      $request = Yii::$app->request;
                    // $rolemapid = $request->get('dataProvider');
                    //       print_r($rolemapid);
                    //       exit;

                        $roleLabel = Company::find()->where(['=', 'company_id', $data1->company_id])->one();
                    
                        if(!empty($roleLabel)){
                                return $roleLabel->company_name;
                            }
                            else{
                                return '-';
                            }                 
                    
                        }
            ],
             [
                'label'    =>    'Contact Method',
                'format'=>'raw',
                    'value' => function($data1){
                        $roleLabel = ContactMethod::find()->where(['=', 'contact_method_id', $data1->contact_method])->one();
                        if(!empty($roleLabel)){
                            return $roleLabel->contact_method;
                        }
                        else{
                            return '-';
                        }
                        
                    }
            ],
                         [
                'label'    =>    'Contacted Person',
                'format'=>'raw',
                    'value' => function($data1){
                        $roleLabel = Person::find()->where(['=', 'customer_id', $data1->contacted_person])->one();
                        if(!empty($roleLabel)){
                            return $roleLabel->first_name;
                        }
                        else{
                            return '-';
                        }
                    }
            ],
           'assigned_to',
           
             'followup_date',
             'comments',
            // 'created_on',
            // 'updated_on',

            // ['class' => 'yii\grid\ActionColumn'],
            [  
        'class' => 'yii\grid\ActionColumn',
        //'contentOptions' => ['style' => 'width:260px;'],
        'header'=>'Actions',
        'template' => '{view} ',
        

       ],
        ],
    ]); ?>
</div>
