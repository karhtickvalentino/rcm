<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\contactmethod */

$this->title = 'Create Contact Method';
$this->params['breadcrumbs'][] = ['label' => 'Contact Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactmethod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
