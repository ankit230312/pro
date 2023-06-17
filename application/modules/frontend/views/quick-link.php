<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
        <?php if (has_permission(VIEW, 'frontend', 'frontend')) { ?>
            <a class="nav-link1 active" href="<?php echo site_url('frontend/index'); ?>"><?php echo $this->lang->line('frontend_page'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'frontend', 'slider')) { ?>
            <a class="nav-link1" href="<?php echo site_url('frontend/slider/index'); ?>"><?php echo $this->lang->line('manage_slider'); ?> </a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'frontend', 'about')) { ?>
            <a class="nav-link1" href="<?php echo site_url('frontend/about/index'); ?>"><?php echo $this->lang->line('about_school'); ?></a>
        <?php } ?>

        <?php if ($this->session->userdata('role_id') != SUPER_ADMIN) { ?>
            <?php if (has_permission(VIEW, 'setting', 'setting')) { ?>
                <a class="nav-link1" href="<?php echo site_url('setting/index'); ?>"><?php echo $this->lang->line('frontend_setting'); ?></a>
            <?php } ?>
        <?php } else { ?>
            <?php if (has_permission(VIEW, 'administrator', 'school')) { ?>
                <a class="nav-link1" href="<?php echo site_url('administrator/school/index'); ?>"> <?php echo $this->lang->line('school_setting'); ?></a>
            <?php } ?>
        <?php } ?>

        <?php if (has_permission(VIEW, 'announcement', 'notice')) { ?>
            <a class="nav-link1" href="<?php echo site_url('announcement/notice/index'); ?>"><?php echo $this->lang->line('manage_notice'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'announcement', 'news')) { ?>
            <a class="nav-link1" href="<?php echo site_url('announcement/news/index'); ?>"><?php echo $this->lang->line('manage_news'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'announcement', 'holiday')) { ?>
            <a class="nav-link1" href="<?php echo site_url('announcement/holiday/index'); ?>"><?php echo $this->lang->line('manage_holiday'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'teacher', 'teacher')) { ?>
            <a class="nav-link1" href="<?php echo site_url('teacher/index'); ?>"><?php echo $this->lang->line('manage_teacher'); ?> </a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'hrm', 'employee')) { ?>
            <a class="nav-link1" href="<?php echo site_url('hrm/employee/index'); ?>"><?php echo $this->lang->line('manage_employee'); ?> / <?php echo $this->lang->line('staff'); ?></a>
        <?php } ?>



        <?php if (
            has_permission(VIEW, 'announcement', 'notice') ||
            has_permission(VIEW, 'announcement', 'news') ||
            has_permission(VIEW, 'announcement', 'holiday')
        ) { ?>
            <a class="nav-link1" class='' href="<?php echo site_url('announcement/notice/index'); ?>">
                <?php echo $this->lang->line('announcement'); ?>
                <!-- <span class="fa fa-chevron-down"></span> -->
            </a>


        <?php } ?>



        <?php if (has_permission(VIEW, 'gallery', 'gallery') || has_permission(VIEW, 'gallery', 'image')) { ?>
            <a class="nav-link1" class='' href="<?php echo site_url('gallery/index'); ?>"><?php echo $this->lang->line('media_gallery'); ?> </span></a>


        <?php } ?>


        <?php if (has_permission(VIEW, 'miscellaneous', 'award') || has_permission(VIEW, 'miscellaneous', 'todo')) { ?>
            <a class="nav-link1" class='' href="<?php echo site_url('miscellaneous/award/index'); ?>"><?php echo $this->lang->line('miscellaneous'); ?> </span></a>


        <?php } ?>
    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>