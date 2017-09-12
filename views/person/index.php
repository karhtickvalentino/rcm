<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Company;
/* @var $this yii\web\View */
/* @var $searchModel app\models\personsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Person';
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
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'first_name',
            'last_name',

           [
                'attribute'    =>    'company_name',
                'format'=>'raw',
                    'value' => function($data1){
                        $role_label = Company::find()->where(['=', 'company_id', $data1->company_id])->one();

                        if($role_label){
                        return $role_label->company_name;
                    }
                    else return '--';
                    }
            ],
            'address',
            'email1:email',
            // 'email2:email',
            // 'telephone1',
            // 'telephone',
            // 'country',
            // 'city',
            // 'remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
