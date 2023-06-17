<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">

        <?php if (
            has_permission(VIEW, 'exam_marks', 'mark') ||
            has_permission(VIEW, 'exam_marks', 'examresult') ||
            has_permission(VIEW, 'exam_marks', 'finalresult') ||
            has_permission(VIEW, 'exam_marks', 'meritlist') ||
            has_permission(VIEW, 'exam_marks', 'marksheet') ||
            has_permission(VIEW, 'exam_marks', 'resultcard') ||
            has_permission(VIEW, 'exam_marks', 'text') ||
            has_permission(VIEW, 'exam_marks', 'mail') ||
            has_permission(VIEW, 'exam_marks', 'resultemail') ||
            has_permission(VIEW, 'exam_marks', 'resultsms')
        ) { ?>


            <?php if (has_permission(VIEW, 'exam', 'resultcard')) { ?>
                <a class="nav-link1 active" href="<?php echo site_url('exam/resultcard/index'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
            <?php } ?>
            <?php if (has_permission(VIEW, 'exam', 'resultcard')) { ?>
                <a class="nav-link1" href="<?php echo site_url('exam/examresult/index'); ?>"><?php echo $this->lang->line('exam_term_result'); ?></a>
            <?php } ?>


        <?php
        }
        ?>


    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>