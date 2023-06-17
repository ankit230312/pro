<div class="col-md-3 <?php echo $this->enable_rtl ? 'right_col' : 'left_col'; ?>">
    <div class="<?php echo $this->enable_rtl ? 'right_col' : 'left_col'; ?> scroll-view">
        <!-- <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo site_url('dashboard/index'); ?>">
                <?php if($this->global_setting->brand_name){ ?>
                <span
                    <?php if(str_word_count($this->global_setting->brand_name) == 1 ){ echo 'style="margin-top: 18px;"'; }  ?>>
                    <?php  echo $this->global_setting->brand_name; ?>
                </span>
                <?php }else{ ?>
                <span>Multi School</span>
                <?php } ?>

                <?php if($this->global_setting->brand_logo){ ?>
                <img class="logo" src="<?php echo UPLOAD_PATH.'logo/'.$this->global_setting->brand_logo; ?>" style="max-width: 65px;    height: 50px;
    margin-bottom: 4px;
}" alt="">
                <?php }else{ ?>
                <img class="logo" src="<?php echo IMG_URL; ?>/sms-logo-50.png" alt="">
                <?php } ?>
            </a>
        </div> -->
        <div class="clearfix" style=""></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="navbar nav_title" style="border: 0;">
                <a href="<?php echo site_url('dashboard/index'); ?>">
                    <!-- <?php if($this->global_setting->brand_name){ ?>
                            <span
                                <?php if(str_word_count($this->global_setting->brand_name) == 1 ){ echo 'style="margin-top: 18px;"'; }  ?>>
                                <?php  echo $this->global_setting->brand_name; ?>
                            </span>
                            <?php }else{ ?>
                            <span>Multi School</span>
                            <?php } ?> -->

                    <?php if($this->global_setting->brand_logo){ ?>
                    <div class="fsfas_____Sa">
                        <img class="logo" src="<?php echo UPLOAD_PATH.'logo/'.$this->global_setting->brand_logo; ?>"
                            style="max-width: 65px;    height: 50px;
                margin-bottom: 4px;
            }" alt="">
                    </div>
                    <?php }else{ ?>
                    <img class="logo" src="<?php echo IMG_URL; ?>/sms-logo-50.png" alt="">
                    <?php } ?>
                </a>
            </div>
            <div class="menu_section" id="style-3">
                <div class="compl__modules">
                    <span></span>
                    <p style='margin: 0;text-align: center;color: #000;margin-top: 7px;'>Completed Modules</p>
                    <span></span>
                </div>
                <?php 
                    if($this->session->userdata('role_id') != SUPER_ADMIN){                  
                        $classes = get_classes($this->session->userdata('school_id'));
                    }               
                    if($this->session->userdata('role_id') == GUARDIAN){                  
                        $guardian_class_data = get_guardian_access_data('class'); 
                    }               
                ?>

                <ul class="nav side-menu">

                   

                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>