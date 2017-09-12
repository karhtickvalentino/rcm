<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\partnertype */

$this->title = 'Create Partner Type';
$this->params['breadcrumbs'][] = ['label' => 'Partner Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partnertype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
