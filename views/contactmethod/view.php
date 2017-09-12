<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\contactmethod */

$this->title = 'Contact Method';
$this->params['breadcrumbs'][] = ['label' => 'Contactmethods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactmethod-view">

    <!--<h3><?= Html::encode($this->title) ?></h3>-->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->contact_method_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->contact_method_id], [
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
            
            'contact_method',
            'contact_method_description',
        ],
    ]) ?>

</div>
