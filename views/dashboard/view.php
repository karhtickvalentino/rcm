<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\ReferalSource;
use app\models\PartnerType;
use app\models\SalesStage;
use app\models\LeadStatus;
use app\models\company;
use app\models\BusinessPartner;
use app\models\MarketIntelligence;

/* @var $this yii\web\View */
/* @var $model app\models\Dashboard */

$this->title = 'Company Detail';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Company Profile','/dashboard/view?id='.$model->company_id, ['class' => 'btn btn-success']) ?>
        <?= Html::a('Contact Log','/contact-log/create?id='.$model->company_id,['class' => 'btn btn-success']) ?>
        <?= Html::a('View Contact Log','/contact-log/index?id='.$model->company_id, ['class' => 'btn btn-success']) ?>
        <?php
        $mi = MarketIntelligence::find()->where(['company_id' => $model->company_id])->one();
        if(empty($mi)){
            echo Html::a('Market Intelligence','/market-intelligence/create?id='.$model->company_id,['class' => 'btn btn-success']);
        }
        else{
            echo Html::a('Market Intelligence','/market-intelligence/view?id='.$model->company_id,['class' => 'btn btn-success']);
        }
        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
       
            'company_name',
            'company_address',
            'company_city',
            'company_country',
            'pin',
            'company_telephone1',
            'company_telephone2',
            'website_url:url',
            'number_of_employees',
            'number_of_metrimap_users',
            
                         [
            'attribute'    =>    'referal_source',
            'format'=>'raw',
                'value' => function($data1){
                    $role_label = ReferalSource::find()->where(['=', 'referal_source_id', $data1->referal_source])->one();
                    return $role_label->referal_source;
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
           
            'scope',
            'deal_value',
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
            'attribute'    =>    'lead_status',
            'format'=>'raw',
                'value' => function($data1){
                    $role_label = LeadStatus::find()->where(['=', 'lead_status_id', $data1->lead])->one();
                    return $role_label->lead_status;
                }
            ],
            'notes',
            'created_by',
            'created_on',
            'updated_on',
        ],
    ]) ?>
 <?= Html::a('Update', ['/company/update', 'id' => $model->company_id], ['class' => 'btn btn-primary']) ?>
</div>
