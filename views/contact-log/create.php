<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ContactLog */

$this->title = 'Contact Log';
// $this->params['breadcrumbs'][] = ['label' => 'Contact Logs', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelsAddress' => $modelsAddress,
        'id'=>$id,
        
    ]) ?>

</div>
