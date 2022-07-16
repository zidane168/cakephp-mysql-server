<!-- top menu -->

<?php
use Cake\Routing\Router;
?>


<nav class="main-header sidebar-background-primary navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->
    

        <li class="dropdown language">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="hidden-xs">
                    <?php 
                        $session = $this->request->getSession();
                        $current_lang = $session->read('Config.language');          
                        
                        echo $this->Html->image('flags/'.$current_lang.'.png', array(
                            'class' => 'flag',
                            'style' => 'width: 40px;',
                            'alt' => __($current_lang.'_name'))) . "<span>".__($current_lang.'_name')."</span>";
                    ?>
                </span>
            </a>

            <ul class="dropdown-menu" style="padding-left: 10px">

                <?php 
                
                echo $this->Form->create(NULL,  array(Router::fullBaseUrl(null), 'id' => 'form-language', 'type' => 'GET'));
                    $language = array();
                    foreach($available_language as $lang) {				
                        $language[] = ['value'=>$lang,'text'=> __($lang.'_name') ];
                    }
                    echo $this->Form->radio("rblanguage", $language, array(
                        'class' => 'btn-change-language',
                        'value' =>  $current_lang,  // auto SELECTED the current language
                    ));
                           
                ?>  

                <?= $this->Form->end() ?>
            </ul>
        </li>
    </ul>
</nav>      