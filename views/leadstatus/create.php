<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\leadstatus */

$this->title = 'Create Lead Status';
$this->params['breadcrumbs'][] = ['label' => 'Lead Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadstatus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
