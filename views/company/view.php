<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SalesStage;
use app\models\Company;
use app\models\BusinessPartner;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\company */

$this->title = 'Company Details';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->company_id], [
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
            //'company_id',
            'company_name',
            'company_address',
            'company_city',
            'company_country',
            'pin',
             [
            'attribute'    =>    'sales_stage',
            'format'=>'raw',
                'value' => function($data1){
                    $role_label = SalesStage::find()->where(['=', 'sales_stage_id', $data1->sales_stage])->one();
                    if($role_label)
                        return $role_label->stage_name;
                    else return '--';
                }
            ],
             [
            'attribute'    =>    'business_partner',
            'format'=>'raw',
                'value' => function($data1){
                    $role_label = BusinessPartner::find()->where(['=', 'business_partner_id', $data1->business_partner])->one();
                   if($role_label){
                    return $role_label->fname;
                }
                else return '--';
                }
            ],
            'company_telephone1',
            'company_telephone2',
            'website_url:url',
            'number_of_employees',
            'number_of_metrimap_users',
            'notes',
            // [
            // 'attribute'    =>    'created_by',
            // 'format'=>'raw',
            //     'value' => function($data1){
            //         $role_label = User::find()->where(['=', 'id', $data1->created_by])->one();
            //         return $role_label->username;
            //     }
            // ],
        ],
    ]) ?>

    

</div>
