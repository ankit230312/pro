<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
        <?php if (has_permission(VIEW, 'administrator', 'setting')) { ?>
            <li>
            <a class="nav-link1 active" href="<?php echo site_url('administrator/setting/index'); ?>"><?php echo $this->lang->line('general_setting'); ?></a>
            </li>          

        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'school')) { ?>
            <li> <a class="nav-link1" href="<?php echo site_url('administrator/school/index'); ?>"><?php echo $this->lang->line('manage_school'); ?></a></li>
           
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'payment')) { ?>
            <li>  <a class="nav-link1" href="<?php echo site_url('administrator/payment/index'); ?>"><?php echo $this->lang->line('payment_setting'); ?></a></li>
          
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'sms')) { ?>
          <li><a class="nav-link1" href="<?php echo site_url('administrator/sms/index'); ?>"><?php echo $this->lang->line('sms_setting'); ?></a></li>  
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'emailsetting')) { ?>
         <li> <a class="nav-link1" href="<?php echo site_url('administrator/emailsetting/index'); ?>"><?php echo $this->lang->line('email_setting'); ?></a></li> 
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'year')) { ?>
           <li><a class="nav-link1" href="<?php echo site_url('administrator/year/index'); ?>"><?php echo $this->lang->line('academic_year'); ?></a></li> 
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'role')) { ?>
          <li><a class="nav-link1" href="<?php echo site_url('administrator/role/index'); ?>"><?php echo $this->lang->line('user_role'); ?></a></li>  
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'permission')) { ?>
           <li><a class="nav-link1" href="<?php echo site_url('administrator/permission/index'); ?>"><?php echo $this->lang->line('role_permission'); ?></a></li> 
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'superadmin')) { ?>
           <li> <a class="nav-link1" href="<?php echo site_url('administrator/superadmin/index'); ?>"><?php echo $this->lang->line('super_admin'); ?></a></li>
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'user')) { ?>
           <li><a class="nav-link1" href="<?php echo site_url('administrator/user/index'); ?>"><?php echo $this->lang->line('manage_user'); ?></a></li> 
        <?php } ?>
        <?php if (has_permission(EDIT, 'administrator', 'password')) { ?>
           <li><a class="nav-link1" href="<?php echo site_url('administrator/password/index'); ?>"><?php echo $this->lang->line('reset_user_password'); ?></a></li> 
        <?php } ?>
        <?php if (has_permission(EDIT, 'administrator', 'username')) { ?>
           <li> <a class="nav-link1" href="<?php echo site_url('administrator/username/index'); ?>"><?php echo $this->lang->line('reset_username'); ?></a></li>
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'usercredential')) { ?>
           <li> <a class="nav-link1" href="<?php echo site_url('administrator/usercredential/index'); ?>"> <?php echo $this->lang->line('user_credential'); ?></a></li>
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'activitylog')) { ?>
          <li><a class="nav-link1" href="<?php echo site_url('administrator/activitylog/index'); ?>"><?php echo $this->lang->line('activity_log'); ?></a></li>  
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'feedback')) { ?>
          <li><a class="nav-link1" href="<?php echo site_url('administrator/feedback/index'); ?>"><?php echo $this->lang->line('feedback'); ?></a></li>  
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'backup')) { ?>
          <li><a class="nav-link1" href="<?php echo site_url('administrator/backup/index'); ?>"><?php echo $this->lang->line('backup'); ?></a></li>  
        <?php } ?>
        <?php if (has_permission(VIEW, 'administrator', 'openinghour')) { ?>
          <li> <a class="nav-link1" href="<?php echo site_url('administrator/openinghour/index'); ?>"><?php echo $this->lang->line('opening_hour'); ?></a></li> 
        <?php } ?>
    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>