<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusinessPartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Partner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-partner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Business Partner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'fname',
            [
            'attribute'    =>    'business_partner_type',
            'format'=>'raw',
                'value' => function($data1){
                  $bptype=$data1->business_partner_type;
                  if($bptype==0)
                    return 'person';
                   else return 'company';
                }
            ],
            'lname',
            'address',
            'city',
            // 'country',
            // 'pin',
            // 'telephone1',
            // 'telephone2',
            // 'website_url:url',
            // 'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
