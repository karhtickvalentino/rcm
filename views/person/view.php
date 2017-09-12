<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Company;

/* @var $this yii\web\View */
/* @var $model app\models\person */

$this->title = 'Person';
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->customer_id], [
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
            
            'first_name',
            'last_name',
                    [
                'attribute'    =>    'company_name',
                'format'=>'raw',
                    'value' => function($data1){
                        $role_label = Company::find()->where(['=', 'company_id', $data1->company_id])->one();
                        if($role_label){
                        return $role_label->company_name;
                    }
                    else return '--';
                    }
            ],
            'address',
            'email1:email',
            'email2:email',
            'telephone1',
            'telephone',
            'country',
            'city',
            'remarks',
            'updated_by'
        ],
    ]) ?>

</div>
