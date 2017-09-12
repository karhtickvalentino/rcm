<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessPartner */

$this->title = 'Business Partner';
$this->params['breadcrumbs'][] = ['label' => 'Business Partner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-partner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->business_partner_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->business_partner_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'fname',
            'lname',
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
            'address',
            'city',
            'country',
            'pin',
            'telephone1',
            'telephone2',
            'website_url:url',
            'email:email',
            'updated_by'
        ],
    ]) ?>

</div>
