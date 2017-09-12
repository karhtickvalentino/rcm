<?php

use yii\helpers\Html;
use app\models\MarketIntelligence;

/* @var $this yii\web\View */
/* @var $model app\models\MarketIntelligence */

$this->title = 'Market Intelligence';
//$this->params['breadcrumbs'][] = ['label' => 'Market Intelligences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-intelligence-create">
 <h1><?= Html::encode($this->title) ?></h1>
 <p>
        <?= Html::a('Company Profile','/dashboard/view?id='.$id, ['class' => 'btn btn-success']) ?>
        <?= Html::a('Contact Log','/contact-log/create?id='.$id,['class' => 'btn btn-success']) ?>
        <?= Html::a('View Contact Log','/contact-log/index?id='.$id, ['class' => 'btn btn-success']) ?>
           <?php
        $mi = MarketIntelligence::find()->where(['company_id' => $id])->one();
        if(empty($mi)){
            echo Html::a('Market Intelligence','/market-intelligence/create?id='.$id,['class' => 'btn btn-success']);
        }
        else{
            echo Html::a('Market Intelligence','/market-intelligence/view?id='.$model->company_id,['class' => 'btn btn-success']);
        }
        ?>
    </p>
   
 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
