<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">CRM</span><span class="logo-lg">'.'CRM'. '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
               
                <!-- Tasks: style can be found in dropdown.less -->
                

                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        </i>Authentication
                    </a>
                    <ul class="dropdown-menu" style="background-color: #e0ebeb;">
                        
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="/user-management/user/"><h4>User</h4></a>
                                </li>

                                <li>
                                    <a href="/user-management/role/"><h4>Role</h4></a>
                                </li>

                                <li>
                                    <a href="/user-management/permission/"><h4>Permissions</h4></a>
                                </li>

                                <li>
                                    <a href="/user-management/user-visit-log/"><h4>Visit Log</h4></a>
                                </li>                               
                                
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"<?php 
                        $isGuest = Yii::$app->user->isGuest;
                        if($isGuest) echo 'user';
                         else
                          echo Yii::$app->user->identity->first_name;?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php  
                                   if(Yii::$app->user->isGuest) echo "user";
                                     elseif(Yii::$app->user->isSuperadmin) echo 'superadmin';
                                        else
                                            { echo Yii::$app->user->identity->first_name;echo "    ";
                                              echo Yii::$app->user->identity->last_name;
                                            }
                                ?> 
                                            
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/user-management/auth/change-own-password" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
