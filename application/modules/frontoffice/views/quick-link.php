<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
        <div class="tabbable">


            <?php if (has_permission(VIEW, 'frontoffice', 'purpose')) { ?>
                <a class="nav-link1 active" href="<?php echo site_url('frontoffice/purpose/index'); ?>"><?php echo $this->lang->line('visitor_purpose'); ?></a>
            <?php } ?>
            <?php if (has_permission(VIEW, 'frontoffice', 'visitor')) { ?>
                <a class="nav-link1" href="<?php echo site_url('frontoffice/visitor/index'); ?>"><?php echo $this->lang->line('visitor_info'); ?></a>
            <?php } ?>
            <?php if (has_permission(VIEW, 'frontoffice', 'calllog')) { ?>
                <a class="nav-link1" href="<?php echo site_url('frontoffice/calllog/index'); ?>"><?php echo $this->lang->line('call_log'); ?></a>
            <?php } ?>
            <?php if (has_permission(VIEW, 'frontoffice', 'dispatch')) { ?>
                <a class="nav-link1" href="<?php echo site_url('frontoffice/dispatch/index'); ?>"><?php echo $this->lang->line('postal_dispatch'); ?></a>
            <?php } ?>
            <?php if (has_permission(VIEW, 'frontoffice', 'receive')) { ?>
                <a class="nav-link1" href="<?php echo site_url('frontoffice/receive/index'); ?>"><?php echo $this->lang->line('postal_receive'); ?></a>
            <?php } ?>
    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>