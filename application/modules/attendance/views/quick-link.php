<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
<?php if(has_permission(VIEW, 'attendance', 'student')){ ?>
    <a class="nav-link1 active" href="<?php echo site_url('attendance/student/index'); ?>"><?php echo $this->lang->line('student_attendance'); ?></a>
<?php } ?>
 <?php if(has_permission(VIEW, 'attendance', 'teacher')){ ?>
    <a class="nav-link1 " href="<?php echo site_url('attendance/teacher/index'); ?>"><?php echo $this->lang->line('teacher_attendance'); ?></a>
<?php } ?>
<?php if(has_permission(VIEW, 'attendance', 'employee')){ ?>
    <a class="nav-link1" href="<?php echo site_url('attendance/employee/index'); ?>"><?php echo $this->lang->line('employee_attendance'); ?></a>                    
<?php } ?>
<?php if(has_permission(VIEW, 'attendance', 'absentemail')){ ?>
    <a class="nav-link1" href="<?php echo site_url('attendance/absentemail/index'); ?>"><?php echo $this->lang->line('absent_email'); ?></a>                    
<?php } ?>
<?php if(has_permission(VIEW, 'attendance', 'absentsms')){ ?>
    <a class="nav-link1" href="<?php echo site_url('attendance/absentsms/index'); ?>"><?php echo $this->lang->line('absent_sms'); ?></a>                    
<?php } ?>
</ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>