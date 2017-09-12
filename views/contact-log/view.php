<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Company;
use app\models\ContactMethod;
use app\models\Person;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\ContactLog */

$this->title = 'contact log';
$this->params['breadcrumbs'][] = ['label' => 'Contact Logs', 'url' => ['index?id='.$model->company_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
        <?= Html::a('Delete', ['delete', 'id' => $model->contact_log_id,'company_id'=>$model->company_id], [
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
            
            [
                'attribute'    =>    'company_name',
                'format'=>'raw',
                    'value' => function($data1){
                        $role_label = Company::find()->where(['=', 'company_id', $data1->company_id])->one();
                        if(!empty($role_label)){
                            return $role_label->company_name;
                        }
                        else{
                            return '';
                        }
                    }
            ],
             [
                'attribute'    =>    'contact_method',
                'format'=>'raw',
                    'value' => function($data1){
                        $role_label = ContactMethod::find()->where(['=', 'contact_method_id', $data1->contact_method])->one();
                        if(!empty($role_label)){
                            return $role_label->contact_method;
                        }
                        else{
                            return '';
                        }
                        
                    }
            ],
                         [
                'attribute'    =>    'contacted_person',
                'format'=>'raw',
                    'value' => function($data1){
                        $role_label = Person::find()->where(['=', 'customer_id', $data1->contacted_person])->one();
                        if(!empty($role_label)){
                            return $role_label->first_name;
                        }
                        else{
                            return '';
                        }
                        
                    }
            ],
            //                         [
            //     'attribute'    =>    'assigned_to',
            //     'format'=>'raw',
            //         'value' => function($data1){
            //             $role_label = User::find()->where(['=', 'id', $data1->assigned_to])->one();
            //             if(!empty($role_label)){
            //                 return $role_label->user_name;
            //             }
            //             else{
            //                 return '';
            //             }
                        
            //         }
            // ],
            'assigned_to',
            'followup_date',
            'comments',
            'created_on',
            'updated_on',
        ],
    ]) ?>

</div>
