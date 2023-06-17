<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
        <?php if (has_permission(VIEW, 'card', 'idsetting')) { ?>
            <a class="nav-link1 active" href="<?php echo site_url('card/idsetting/index'); ?>"><?php echo $this->lang->line('id_card_setting'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'card', 'admitsetting')) { ?>
            <a class="nav-link1" href="<?php echo site_url('card/admitsetting/index'); ?>"><?php echo $this->lang->line('admit_card_setting'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'card', 'schoolidsetting')) { ?>
            <a class="nav-link1" href="<?php echo site_url('card/schoolidsetting/index'); ?>"><?php echo $this->lang->line('id_card_setting'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'card', 'schooladmitsetting')) { ?>
            <a class="nav-link1" href="<?php echo site_url('card/schooladmitsetting/index'); ?>"><?php echo $this->lang->line('admit_card_setting'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'card', 'teacher')) { ?>
            <a class="nav-link1" href="<?php echo site_url('card/teacher/index'); ?>"><?php echo $this->lang->line('teacher_id_card'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'card', 'employee')) { ?>
            <a class="nav-link1" href="<?php echo site_url('card/employee/index'); ?>"><?php echo $this->lang->line('employee_id_card'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'card', 'student')) { ?>
            <a class="nav-link1" href="<?php echo site_url('card/student/index'); ?>"><?php echo $this->lang->line('student_id_card'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'card', 'admit')) { ?>
            <a class="nav-link1" href="<?php echo site_url('card/admit/index'); ?>"><?php echo $this->lang->line('student_admit_card'); ?></a>
        <?php } ?>
    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>