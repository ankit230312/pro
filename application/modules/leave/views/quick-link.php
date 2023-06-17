<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
<?php if(has_permission(VIEW, 'leave', 'type')){ ?>
    <a class="nav-link1 active" href="<?php echo site_url('leave/type/index'); ?>"> <?php echo $this->lang->line('leave_type'); ?></a>
<?php } ?>
<?php if(has_permission(VIEW, 'leave', 'application')){ ?>
    <a class="nav-link1" href="<?php echo site_url('leave/application/index'); ?>">  <?php echo $this->lang->line('leave_application'); ?></a>
<?php } ?>               
<?php if(has_permission(VIEW, 'leave', 'approve')){ ?>
    <a class="nav-link1" href="<?php echo site_url('leave/approve/index'); ?>"> <?php echo $this->lang->line('approved_application'); ?> </a>
<?php } ?>               
<?php if(has_permission(VIEW, 'leave', 'waiting')){ ?>
    <a class="nav-link1" href="<?php echo site_url('leave/waiting/index'); ?>"> <?php echo $this->lang->line('waiting_application'); ?> </a>
<?php } ?>               
<?php if(has_permission(VIEW, 'leave', 'decline')){ ?>
    <a class="nav-link1" href="<?php echo site_url('leave/decline/index'); ?>"> <?php echo $this->lang->line('declined_application'); ?> </a>
<?php } ?>     </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>