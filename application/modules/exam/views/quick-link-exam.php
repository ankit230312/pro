<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
        <?php if (has_permission(VIEW, 'exam', 'mark')) { ?>
            <a class="nav-link1 active" href="<?php echo site_url('exam/mark/index'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'examresult')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/examresult/index'); ?>"><?php echo $this->lang->line('exam_term_result'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'finalresult')) { ?>
            <a class="nav-link1"  href="<?php echo site_url('exam/finalresult/index'); ?>"><?php echo $this->lang->line('exam_final_result'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'meritlist')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/meritlist/index'); ?>"><?php echo $this->lang->line('merit_list'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'marksheet')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/marksheet/index'); ?>"><?php echo $this->lang->line('mark_sheet'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'resultcard')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/resultcard/index'); ?>"><?php echo $this->lang->line('result_card'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'resultcard')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/resultcard/all'); ?>"><?php echo $this->lang->line('all_result_card'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'mail')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/mail/index'); ?>"><?php echo $this->lang->line('mark_send_by_email'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'text')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/text/index'); ?>"><?php echo $this->lang->line('mark_send_by_sms'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'resultemail')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/resultemail/index'); ?>"> <?php echo $this->lang->line('result_email'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'exam', 'resultsms')) { ?>
            <a class="nav-link1" href="<?php echo site_url('exam/resultsms/index'); ?>"> <?php echo $this->lang->line('result_sms'); ?></a>
        <?php } ?>
    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>