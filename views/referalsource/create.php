<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\referalsource */

$this->title = 'Create Referal Source';
$this->params['breadcrumbs'][] = ['label' => 'Referal Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referalsource-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
