<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\companysearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'company_id',
            'company_name',
            'company_address',
            'company_city',
            'company_country',
            // 'pin',
            // 'company_telephone1',
            // 'company_telephone2',
            // 'website_url:url',
            // 'number_of_employees',
            // 'number_of_metrimap_users',
            // 'notes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
