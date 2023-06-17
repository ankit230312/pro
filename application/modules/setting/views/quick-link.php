<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
<?php if(has_permission(VIEW, 'setting', 'setting')  && $this->session->userdata('role_id') != SUPER_ADMIN){ ?>
    <a class="nav-link1 active" href="<?php echo site_url('setting/index'); ?>"><?php echo $this->lang->line('school_setting'); ?></a>
<?php } ?>
<?php if(has_permission(VIEW, 'setting', 'payment')){ ?>
    <a class="nav-link1" href="<?php echo site_url('setting/payment/index'); ?>"><?php echo $this->lang->line('payment_setting'); ?></a>
<?php } ?>
<?php if(has_permission(VIEW, 'setting', 'sms')){ ?>
    <a class="nav-link1" href="<?php echo site_url('setting/sms/index'); ?>"><?php echo $this->lang->line('sms_setting'); ?></a>                    
<?php } ?>                
<?php if(has_permission(VIEW, 'setting', 'emailsetting')){ ?>
    <a class="nav-link1" href="<?php echo site_url('setting/emailsetting/index'); ?>"><?php echo $this->lang->line('email_setting'); ?></a>                    
<?php } ?>  
<?php if(has_permission(VIEW, 'setting', 'openinghour')){ ?>
    <a class="nav-link1" href="<?php echo site_url('setting/openinghour/index'); ?>"><?php echo $this->lang->line('setting_opening_hour'); ?></a>                    
<?php } ?> </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>