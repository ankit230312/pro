<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
        <?php if (has_permission(VIEW, 'exam', 'grade')) { ?>
            <a class="nav-link1 active" href="<?php echo site_url('exam/grade/index'); ?>"><?php echo $this->lang->line('exam_grade'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'exam')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/examtypelist'); ?>"><?php echo $this->lang->line('exam_term'); ?></a>
        <?php } ?>


        <?php if (has_permission(VIEW, 'exam', 'exam')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/examsubtypelist'); ?>"><?php echo $this->lang->line('exam'); ?> Sub<?php echo $this->lang->line('type'); ?></a>
        <?php } ?>


        <?php if (has_permission(VIEW, 'exam', 'schedule')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/schedule/index'); ?>"><?php echo $this->lang->line('exam_schedule'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'suggestion')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/suggestion/index'); ?>"><?php echo $this->lang->line('exam_suggestion'); ?> </a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'attendance')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/attendance/index'); ?>"><?php echo $this->lang->line('exam_attendance'); ?></a>
        <?php } ?>
        <?php if ($this->session->userdata('role_id') == STUDENT) { ?>
            <?php if (has_permission(VIEW, 'onlineexam', 'takeexam')) { ?>
                <a class="nav-link1" href="<?php echo site_url('onlineexam/takeexam/index'); ?>"><?php echo $this->lang->line('take_exam'); ?></a>

            <?php } ?>
        <?php } ?>
    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>