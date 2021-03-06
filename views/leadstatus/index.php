<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\leadstatussearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lead Status';
$this->params['breadcrumbs'][] = $this->title;
?>
 <?php 
if(isset($_SESSION['errorMsg'])){
    $msg = $_SESSION['errorMsg'] ;
    unset($_SESSION['errorMsg']);
}
else{
    $msg = '';
}?>

<?php 
    if($msg != ""){ 
             if(preg_match('/not/', $msg) OR preg_match('/Not/', $msg)){          
                echo '<div class="alert alert-danger">'.$msg.'</div>';
            }else{
                echo '<div class="alert alert-success">'.$msg.'</div>';
            } 
        }
     ?>
<div class="leadstatus-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lead Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'lead_status_id',
            'lead_status',
            'lead_status_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
