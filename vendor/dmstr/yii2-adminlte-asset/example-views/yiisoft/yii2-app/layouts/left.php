<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <!--<div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>-->
          <!--  <div class="pull-left info">
                <p>Adim</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->

        <!-- search form -->
       
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                              ['label' => 'Dashboard', 'icon' => ' fa-pencil', 'url' => ['/dashboard/'],], 
                             
                              [
                             'label' => 'Configuration',
                             'icon' => 'share',
                             'url' => '#',
                             'items' => [
                              // ['label' => 'Role', 'icon' => 'dashboard', 'url' => ['role/'],], 
                              ['label' => 'Contact Method', 'icon' => ' fa-phone-square', 'url' => ['/contactmethod/'],],
                              ['label' => 'Referal Source', 'icon' => ' fa-hand-o-right', 'url' => ['/referalsource/'],],
                              ['label' => 'Sales Stage', 'icon' => ' fa-bars', 'url' => ['/salesstage/'],],
                              ['label' => 'Lead', 'icon' => ' fa-thumbs-up', 'url' => ['/leadstatus/'],], 
                            ],],



                    [
                        'label' => 'Master',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Client', 'icon' => 'file-code-o', 'url' => ['/company/'],],
                          //  ['label' => 'Designation', 'icon' => 'dashboard', 'url' => ['designation/'],],
                            ['label' => 'Contact Person', 'icon' => 'dashboard', 'url' => ['/person/'],],
                             ['label' => 'Business Partner', 'icon' => 'dashboard', 'url' => ['/business-partner/'],],
                             ['label' => 'user', 'icon' => ' fa-pencil', 'url' => ['/user-management/user/index'],]
                                
                        ],
                   ],
                     
                    
                     
                ]
                
            ]
        ) ?>

    </section>

</aside>
