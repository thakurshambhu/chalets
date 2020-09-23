<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <!-- <?= $this->Html->image('admin/Logo.png',['alt'=>'...','class'=>'img-circle profile_img']);?> -->
                <?php $logo =  $Auth->user('logo'); ?>
                
           <?= $this->Html->image('profile/'. $logo,['alt'=>'...','class'=>'img-circle profile_img']);?>
               
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $Auth->user('username'); ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><?= $this->Html->link('Chalet List', array('controller'=>'chalets','action'=>'dashboard')); ?></li>
                            <li><?= $this->Html->link('General Notes', array('controller'=>'GeneralNotes','action'=>'add')); ?></li>
                            <li><?= $this->Html->link('Contact Us', array('controller'=>'contact','action'=>'add')); ?></li>
                            <!-- <li><?= $this->Html->link('header & footer', array('controller'=>'chalets','action'=>'header_footer')); ?></li> -->
                            <li><?= $this->Html->link('Settings', array('controller'=>'users','action'=>'profile')); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <!-- /menu footer buttons -->
    </div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  
                    <?= $this->Html->image('profile/'. $logo);?><?php echo $Auth->user('username'); ?>
                    <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><?= $this->Html->link('Profile', array('controller'=>'users','action'=>'profile')); ?></li>
                        <li><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-sign-out pull-right')).'Log Out', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)) ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->