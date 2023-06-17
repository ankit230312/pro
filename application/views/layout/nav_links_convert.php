<!-- line no 137 to line no 161 -->

<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'lessonplan', 'lesson')) { ?>
        <li><a href="<?php echo site_url('lessonplan/lesson/index'); ?>"><?php echo $this->lang->line('lesson'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'lessonplan', 'topic')) { ?>
        <li><a href="<?php echo site_url('lessonplan/topic/index'); ?>"><?php echo $this->lang->line('topic'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'lessonplan', 'timeline')) { ?>
        <li><a href="<?php echo site_url('lessonplan/timeline'); ?>"><?php echo $this->lang->line('lesson_time_line'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'lessonplan', 'status')) { ?>
        <li><a href="<?php echo site_url('lessonplan/status'); ?>"><?php echo $this->lang->line('lesson_status'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'lessonplan', 'lessonplan')) { ?>
        <li><a href="<?php echo site_url('lessonplan/index'); ?>"><?php echo $this->lang->line('lesson_plan'); ?></a>
        </li>
    <?php } ?>



</ul>



<!-- line no 526 to line no 535 -->
<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'hrm', 'designation')) { ?>
        <li><a href="<?php echo site_url('hrm/designation/index'); ?>"><?php echo $this->lang->line('manage_designation'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'hrm', 'employee')) { ?>
        <li><a href="<?php echo site_url('hrm/employee/index'); ?>"><?php echo $this->lang->line('manage_employee'); ?></a>
        </li>
    <?php } ?>
</ul>



<!-- line no 577 to line no 582 -->

<ul class="nav child_menu  child_menu1">
    <?php if (has_permission(VIEW, 'teacher', 'department')) { ?>
        <li><a href="<?php echo site_url('teacher/department/index'); ?>"><?php echo $this->lang->line('department'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'teacher', 'teacher')) { ?>
        <li><a href="<?php echo site_url('teacher/index'); ?>"><?php echo $this->lang->line('manage_teacher'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'teacher', 'lecture')) { ?>
        <li><a href="<?php echo site_url('teacher/lecture/index'); ?>">Class Resources</a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'teacher', 'rating') && $this->session->userdata('role_id') == STUDENT) { ?>
        <li><a href="<?php echo site_url('teacher/rating/index'); ?>"><?php echo $this->lang->line('rating'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'teacher', 'rating') && $this->session->userdata('role_id') != STUDENT) { ?>
        <li><a href="<?php echo site_url('teacher/rating/manage'); ?>"><?php echo $this->lang->line('rating'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'teacher', 'bulk') && $this->session->userdata('role_id') != STUDENT) { ?>
        <li><a href="<?php echo site_url('teacher/bulk/add'); ?>"><?php echo $this->lang->line('bulk'); ?></a>
        </li>
    <?php } ?>
</ul>



<!-- line no 558 to line no 562 -->

<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'leave', 'type')) { ?>
        <li><a href="<?php echo site_url('leave/type/index'); ?>"><?php echo $this->lang->line('leave_type'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'application')) { ?>
        <li><a href="<?php echo site_url('leave/application/index'); ?>"><?php echo $this->lang->line('leave_application'); ?>
            </a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'waiting')) { ?>
        <li><a href="<?php echo site_url('leave/waiting/index'); ?>"><?php echo $this->lang->line('waiting_application'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'approve')) { ?>
        <li><a href="<?php echo site_url('leave/approve/index'); ?>"><?php echo $this->lang->line('approved_application'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'decline')) { ?>
        <li><a href="<?php echo site_url('leave/decline/index'); ?>"><?php echo $this->lang->line('declined_application'); ?></a>
        </li>
    <?php } ?>
</ul>


<!-- line no 570 to line no  -->



<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'leave', 'type')) { ?>
        <li><a href="<?php echo site_url('leave/type/index'); ?>"><?php echo $this->lang->line('leave_type'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'application')) { ?>
        <li><a href="<?php echo site_url('leave/application/index'); ?>"><?php echo $this->lang->line('leave_application'); ?>
            </a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'waiting')) { ?>
        <li><a href="<?php echo site_url('leave/waiting/index'); ?>"><?php echo $this->lang->line('waiting_application'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'approve')) { ?>
        <li><a href="<?php echo site_url('leave/approve/index'); ?>"><?php echo $this->lang->line('approved_application'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'leave', 'decline')) { ?>
        <li><a href="<?php echo site_url('leave/decline/index'); ?>"><?php echo $this->lang->line('declined_application'); ?></a>
        </li>
    <?php } ?>
</ul>


<!-- line no 586 to line no  -->




<ul class="nav child_menu child_menu1">

    <?php if (has_permission(VIEW, 'attendance', 'teacher')) { ?>
        <li><a href="<?php echo site_url('attendance/teacher/index'); ?>"><?php echo $this->lang->line('teacher_attendance'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'attendance', 'employee')) { ?>
        <li><a href="<?php echo site_url('attendance/employee/index'); ?>"><?php echo $this->lang->line('employee_attendance'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'attendance', 'absentemail')) { ?>
        <li><a href="<?php echo site_url('attendance/absentemail/index'); ?>"><?php echo $this->lang->line('absent_email'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'attendance', 'absentsms')) { ?>
        <li><a href="<?php echo site_url('attendance/absentsms/index'); ?>"><?php echo $this->lang->line('absent_sms'); ?></a>
        </li>
    <?php } ?>
</ul>







<!-- line no 659 to line no  -->


<li><a href="<?php echo site_url('exam/examtypelist'); ?>"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('type'); ?></a>
</li>

<li><a href="<?php echo site_url('exam/examsubtypelist'); ?>"><?php echo $this->lang->line('exam'); ?> Sub<?php echo $this->lang->line('type'); ?></a>
</li>
<li><a href="<?php echo site_url('exam/sectionlist'); ?>">Section</a>
</li>








<!-- line no 933 to line no  -->
<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'administrator', 'smstemplate')) { ?>
        <li><a href="<?php echo site_url('administrator/smstemplate/index'); ?>"><?php echo $this->lang->line('sms_template'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'emailtemplate')) { ?>
        <li><a href="<?php echo site_url('administrator/emailtemplate/index'); ?>"><?php echo $this->lang->line('email_template'); ?></a>
        </li>
    <?php } ?>
</ul>



<!-- line no 667 to line no  -->

<ul class="nav child_menu child_menu1">
    <li><a href="<?php echo site_url('exam/index'); ?>"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('name'); ?></a>
    </li>
    <?php if (has_permission(VIEW, 'onlineexam', 'onlineexam')) { ?>
        <li><a href="<?php echo site_url('onlineexam/index'); ?>"><?php echo $this->lang->line('online_exam'); ?></a>
        </li>
    <?php } ?>


    <?php if (has_permission(VIEW, 'exam', 'schedule')) { ?>
        <li><a href="<?php echo site_url('exam/schedule/index'); ?>">Offline <?php echo $this->lang->line('exam'); ?></a>
        </li>
    <?php } ?>


</ul>


<!-- line no 404 to line no  -->


<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'accounting', 'discount')) { ?>
        <li><a href="<?php echo site_url('accounting/discount/index'); ?>"><?php echo $this->lang->line('discount'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'accounting', 'feetype')) { ?>
        <li><a href="<?php echo site_url('accounting/feetype/index'); ?>">
                <?php echo $this->lang->line('fee_type'); ?></a></li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'accounting', 'invoice')) { ?>

        <?php if ($this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == GUARDIAN) { ?>
            <li><a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>
            </li>
        <?php } else { ?>
            <!-- <li><a
                                            href="<?php echo site_url('accounting/invoice/add'); ?>"><?php echo $this->lang->line('fee_collection'); ?></a>
                                    </li> -->
            <li><a href="<?php echo site_url('accounting/invoice/index'); ?>"><?php echo $this->lang->line('fee_collection'); ?></a>
            </li>
            <li><a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>
            </li>
        <?php } ?>
    <?php } ?>

    <?php if (has_permission(VIEW, 'accounting', 'receipt')) { ?>
        <li><a href="<?php echo site_url('accounting/receipt/duereceipt'); ?>"><?php echo $this->lang->line('due_receipt'); ?></a>
        </li>
        <li><a href="<?php echo site_url('accounting/receipt/paidreceipt'); ?>"><?php echo $this->lang->line('paid_receipt'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'accounting', 'duefeeemail')) { ?>
        <li><a href="<?php echo site_url('accounting/duefeeemail/index'); ?>"><?php echo $this->lang->line('due_fee_email'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'accounting', 'duefeesms')) { ?>
        <li><a href="<?php echo site_url('accounting/duefeesms/index'); ?>"><?php echo $this->lang->line('due_fee_sms'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'accounting', 'incomehead')) { ?>
        <li><a href="<?php echo site_url('accounting/incomehead/index'); ?>"><?php echo $this->lang->line('income_head'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'accounting', 'income')) { ?>
        <li><a href="<?php echo site_url('accounting/income/index'); ?>"><?php echo $this->lang->line('income'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'accounting', 'expenditure')) { ?>
        <li><a href="<?php echo site_url('accounting/expenditure/index'); ?>"><?php echo $this->lang->line('expenditure'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'accounting', 'exphead')) { ?>
        <li><a href="<?php echo site_url('accounting/exphead/index'); ?>"><?php echo $this->lang->line('expenditure_head'); ?></a>
        </li>
    <?php } ?>

</ul>





<!-- line no 445 to line no  -->



<ul class="nav child_menu child_menu1">
    <li><a href="<?php echo site_url('report/income'); ?>"><?php echo $this->lang->line('income_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/expenditure'); ?>"><?php echo $this->lang->line('expenditure_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/invoice'); ?>"><?php echo $this->lang->line('invoice_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/duefee'); ?>"><?php echo $this->lang->line('due_fee_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/feecollection'); ?>"><?php echo $this->lang->line('fee_collection_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/balance'); ?>"><?php echo $this->lang->line('accounting_balance_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/library'); ?>"><?php echo $this->lang->line('library_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/sattendance'); ?>"><?php echo $this->lang->line('student_attendance_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/syattendance'); ?>"><?php echo $this->lang->line('student_yearly_attendance_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/tattendance'); ?>"><?php echo $this->lang->line('teacher_attendance_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/tyattendance'); ?>"><?php echo $this->lang->line('teacher_yearly_attendance_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/eattendance'); ?>"><?php echo $this->lang->line('employee_attendance_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/eyattendance'); ?>"><?php echo $this->lang->line('employee_yearly_attendance_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/student'); ?>"><?php echo $this->lang->line('student_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/sinvoice'); ?>"><?php echo $this->lang->line('student_invoice_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/sactivity'); ?>"><?php echo $this->lang->line('student_activity_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/payroll'); ?>"><?php echo $this->lang->line('payroll_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/transaction'); ?>"><?php echo $this->lang->line('daily_transaction_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/statement'); ?>"><?php echo $this->lang->line('daily_statement_report'); ?></a>
    </li>
    <li><a href="<?php echo site_url('report/examresult'); ?>"><?php echo $this->lang->line('exam_result_report'); ?></a>
    </li>
</ul>



<!-- line no 794 to line no  -->





<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'administrator', 'smstemplate')) { ?>
        <li><a href="<?php echo site_url('administrator/smstemplate/index'); ?>"><?php echo $this->lang->line('sms_template'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'emailtemplate')) { ?>
        <li><a href="<?php echo site_url('administrator/emailtemplate/index'); ?>"><?php echo $this->lang->line('email_template'); ?></a>
        </li>
    <?php } ?>
</ul>
</li>






<!-- line no 814 to line no  -->



<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'academic', 'groups')) { ?>
        <li><a href="<?php echo site_url('academic/groups/index'); ?>"><?php echo $this->lang->line('group'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'academic', 'levels')) { ?>
        <li><a href="<?php echo site_url('academic/levels/index'); ?>"><?php echo $this->lang->line('level'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'academic', 'classes')) { ?>
        <li><a href="<?php echo site_url('academic/classes/index'); ?>"><?php echo $this->lang->line('class'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'academic', 'section')) { ?>
        <li><a href="<?php echo site_url('academic/section/index'); ?>"><?php echo $this->lang->line('section'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'academic', 'subject')) { ?>
        <li><a href="<?php echo site_url('academic/subject/index'); ?>"><?php echo $this->lang->line('subject'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'academic', 'syllabus')) { ?>
        <li><a href="<?php echo site_url('academic/syllabus/index'); ?>"><?php echo $this->lang->line('syllabus'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'academic', 'material')) { ?>
        <li><a href="<?php echo site_url('academic/material/index'); ?>"><?php echo $this->lang->line('material'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'academic', 'liveclass')) { ?>
        <li><a href="<?php echo site_url('academic/liveclass/index'); ?>"><?php echo $this->lang->line('live_class'); ?></a>
        </li>
    <?php } ?>


</ul>



<!-- line no 838 to line no  -->


<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'student', 'type')) { ?>
        <li><a href="<?php echo site_url('student/type/index'); ?>">
                <?php echo $this->lang->line('student_type'); ?></a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'student', 'student')) { ?>
        <li><a href="<?php echo site_url('student/index'); ?>"><?php echo $this->lang->line('student_list'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(ADD, 'student', 'bulk')) { ?>
        <li><a href="<?php echo site_url('student/bulk/add'); ?>">
                <?php echo $this->lang->line('bulk_admission'); ?></a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'student', 'admission')) { ?>
        <li><a href="<?php echo site_url('student/admission/index'); ?>">
                <?php echo $this->lang->line('online_admission'); ?></a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'student', 'activity')) { ?>
        <li><a href="<?php echo site_url('student/activity/index'); ?>">
                <?php echo $this->lang->line('student_activity'); ?></a></li>
    <?php } ?>
</ul>


<!-- line no 660 to line no  -->


<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'exam_marks', 'mark')) { ?>
        <li><a href="<?php echo site_url('exam/mark/index'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'examresult')) { ?>
        <li><a href="<?php echo site_url('exam/examresult/index'); ?>"><?php echo $this->lang->line('exam_term_result'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'finalresult')) { ?>
        <li><a href="<?php echo site_url('exam/finalresult/index'); ?>"><?php echo $this->lang->line('exam_final_result'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'meritlist')) { ?>
        <li><a href="<?php echo site_url('exam/meritlist/index'); ?>"><?php echo $this->lang->line('merit_list'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'marksheet')) { ?>
        <li><a href="<?php echo site_url('exam/marksheet/index'); ?>"><?php echo $this->lang->line('mark_sheet'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'resultcard')) { ?>
        <li><a href="<?php echo site_url('exam/resultcard/index'); ?>"><?php echo $this->lang->line('result_card'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'mail')) { ?>
        <li><a href="<?php echo site_url('exam/mail/index'); ?>"><?php echo $this->lang->line('mark_send_by_email'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'text')) { ?>
        <li><a href="<?php echo site_url('exam/text/index'); ?>"><?php echo $this->lang->line('mark_send_by_sms'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'resultemail')) { ?>
        <li><a href="<?php echo site_url('exam/resultemail/index'); ?>"><?php echo $this->lang->line('result_send_by_email'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'exam_marks', 'resultsms')) { ?>
        <li><a href="<?php echo site_url('exam/resultsms/index'); ?>"><?php echo $this->lang->line('result_send_by_sms'); ?></a>
        </li>
    <?php } ?>
</ul>



<!-- line no 674 to line no  -->
<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'certificate', 'type')) { ?>
        <li><a href="<?php echo site_url('certificate/type/index'); ?>"><?php echo $this->lang->line('certificate_type'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'certificate', 'certificate')) { ?>
        <li><a href="<?php echo site_url('certificate/index'); ?>"><?php echo $this->lang->line('generate_certificate'); ?></a>
        </li>
    <?php } ?>
</ul>




<ul class="nav child_menu child_menu1">



    <!-- line no 870 to line no  -->


    <?php if (has_permission(VIEW, 'exam', 'exam')) { ?>


        <li><a href="<?php echo site_url('exam/examtypelist'); ?>"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('type'); ?></a>
        </li>

        <li><a href="<?php echo site_url('exam/examsubtypelist'); ?>"><?php echo $this->lang->line('exam'); ?> Sub<?php echo $this->lang->line('type'); ?></a>
        </li>
        <li><a href="<?php echo site_url('exam/sectionlist'); ?>">Section</a>
        </li>


    <?php } ?>



    <?php if (has_permission(VIEW, 'exam', 'grade')) { ?>
        <li><a href="<?php echo site_url('exam/grade/index'); ?>"><?php echo $this->lang->line('exam_grade'); ?></a>
        </li>
    <?php } ?>






    <!-- <?php if (has_permission(VIEW, 'onlineexam', 'question')) { ?>
<li><a
    href="<?php echo site_url('onlineexam/question/index'); ?>"><?php echo $this->lang->line('question_bank'); ?></a>
</li>
<?php } ?> -->


    <?php if ($this->session->userdata('role_id') == STUDENT) { ?>
        <?php if (has_permission(VIEW, 'onlineexam', 'takeexam')) { ?>
            <li><a href="<?php echo site_url('onlineexam/takeexam/index'); ?>"><?php echo $this->lang->line('take_exam'); ?></a>
            </li>
        <?php } ?>
    <?php } ?>


</ul>

<!-- line no 870 to line no  -->








<!-- line no 890 to line no  -->


<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'card', 'idsetting')) { ?>
        <li><a href="<?php echo site_url('card/idsetting/index'); ?>"><?php echo $this->lang->line('id_card_setting'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'card', 'admitsetting')) { ?>
        <li><a href="<?php echo site_url('card/admitsetting/index'); ?>"><?php echo $this->lang->line('admit_card_setting'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'card', 'schoolidsetting')) { ?>
        <li><a href="<?php echo site_url('card/schoolidsetting/index'); ?>"><?php echo $this->lang->line('id_card_setting'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'card', 'schooladmitsetting')) { ?>
        <li><a href="<?php echo site_url('card/schooladmitsetting/index'); ?>"><?php echo $this->lang->line('admit_card_setting'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'card', 'teacher')) { ?>
        <li><a href="<?php echo site_url('card/teacher/index'); ?>"><?php echo $this->lang->line('teacher_id_card'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'card', 'employee')) { ?>
        <li><a href="<?php echo site_url('card/employee/index'); ?>"><?php echo $this->lang->line('employee_id_card'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'card', 'student')) { ?>
        <li><a href="<?php echo site_url('card/student/index'); ?>"><?php echo $this->lang->line('student_id_card'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'card', 'admit')) { ?>
        <li><a href="<?php echo site_url('card/admit/index'); ?>"><?php echo $this->lang->line('student_admit_card'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 890 to line no  -->


<!-- line no 953 to line no  -->
<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'administrator', 'setting')) { ?>
        <li><a href="<?php echo site_url('administrator/setting/index'); ?>">
                <?php echo $this->lang->line('general_setting'); ?></a></li>
    <?php } ?>


    <?php if (has_permission(VIEW, 'administrator', 'school')) { ?>
        <li><a href="<?php echo site_url('administrator/school/index'); ?>">
                <?php echo $this->lang->line('manage_school'); ?></a></li>
    <?php } ?>


    <?php if (has_permission(VIEW, 'administrator', 'school')) { ?>
        <li><a href="<?php echo site_url('administrator/school/index'); ?>">
                Generate ticket </a></li>
    <?php } ?>


    <?php if (has_permission(VIEW, 'administrator', 'payment')) { ?>
        <li><a href="<?php echo site_url('administrator/payment/index'); ?>"><?php echo $this->lang->line('payment_setting'); ?></a>
        </li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'administrator', 'year')) { ?>
        <li><a href="<?php echo site_url('administrator/year/index'); ?>">
                <?php echo $this->lang->line('academic_year'); ?></a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'role')) { ?>
        <li><a href="<?php echo site_url('administrator/role/index'); ?>">
                <?php echo $this->lang->line('user_role'); ?> (ACL)</a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'permission')) { ?>
        <li><a href="<?php echo site_url('administrator/permission/index'); ?>"><?php echo $this->lang->line('role_permission'); ?>
                (ACL)</a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'superadmin')) { ?>
        <li><a href="<?php echo site_url('administrator/superadmin/index'); ?>">
                <?php echo $this->lang->line('manage_super_admin'); ?></a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'user')) { ?>
        <li><a href="<?php echo site_url('administrator/user/index'); ?>"><?php echo $this->lang->line('manage_user'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(EDIT, 'administrator', 'password')) { ?>
        <li><a href="<?php echo site_url('administrator/password/index'); ?>"><?php echo $this->lang->line('reset_user_password'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(EDIT, 'administrator', 'username')) { ?>
        <li><a href="<?php echo site_url('administrator/username/index'); ?>"><?php echo $this->lang->line('reset_username'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'usercredential')) { ?>
        <li><a href="<?php echo site_url('administrator/usercredential/index'); ?>"><?php echo $this->lang->line('user_credential'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'activitylog')) { ?>
        <li><a href="<?php echo site_url('administrator/activitylog/index'); ?>"><?php echo $this->lang->line('activity_log'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'feedback')) { ?>
        <li><a href="<?php echo site_url('administrator/feedback/index'); ?>"><?php echo $this->lang->line('manage_feedback'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'backup')) { ?>
        <li><a href="<?php echo site_url('administrator/backup/index'); ?>"><?php echo $this->lang->line('backup_database'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'administrator', 'openinghour')) { ?>
        <li><a href="<?php echo site_url('administrator/openinghour'); ?>"><?php echo $this->lang->line('opening_hour'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 953 to line no  -->











<!-- line no 1053 to line no  -->





<ul class="nav child_menu box_sha">
    <?php if (has_permission(VIEW, 'frontend', 'frontend')) { ?>
        <li><a href="<?php echo site_url('frontend/index'); ?>">
                <i class="fa fa-bullhorn"></i><?php echo $this->lang->line('frontend_page'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'frontend', 'slider')) { ?>
        <li><a href="<?php echo site_url('frontend/slider/index'); ?>">
                <i class="fa fa-bullhorn"></i><?php echo $this->lang->line('slider'); ?></a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'frontend', 'about')) { ?>
        <li><a href="<?php echo site_url('frontend/about/index'); ?>">
                <i class="fa fa-bullhorn"></i><?php echo $this->lang->line('about_school'); ?></a>
        </li>
    <?php } ?>


    <?php if (
        has_permission(VIEW, 'announcement', 'notice') ||
        has_permission(VIEW, 'announcement', 'news') ||
        has_permission(VIEW, 'announcement', 'holiday')
    ) { ?>
        <li><a class='ad___minh'><i class="fa fa-bullhorn"></i>
                <?php echo $this->lang->line('announcement'); ?> <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu child_menu1">
                <?php if (has_permission(VIEW, 'announcement', 'notice')) { ?>
                    <li><a href="<?php echo site_url('announcement/notice/index'); ?>"><?php echo $this->lang->line('notice'); ?></a>
                    </li>
                <?php } ?>
                <?php if (has_permission(VIEW, 'announcement', 'news')) { ?>
                    <li><a href="<?php echo site_url('announcement/news/index'); ?>"><?php echo $this->lang->line('news'); ?></a>
                    </li>
                <?php } ?>
                <?php if (has_permission(VIEW, 'announcement', 'holiday')) { ?>
                    <li><a href="<?php echo site_url('announcement/holiday/index'); ?>"><?php echo $this->lang->line('holiday'); ?></a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>


    <?php if (has_permission(VIEW, 'event', 'event')) { ?>
        <li><a href="<?php echo site_url('event/index'); ?>"><i class="fa fa fa-calendar-check-o"></i>
                <?php echo $this->lang->line('event'); ?></a></li>
    <?php } ?>

    <?php if (has_permission(VIEW, 'gallery', 'gallery') || has_permission(VIEW, 'gallery', 'image')) { ?>
        <li><a class='ad___minh'><i class="fa fa-image"></i><?php echo $this->lang->line('media_gallery'); ?> <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu child_menu1">
                <?php if (has_permission(VIEW, 'gallery', 'gallery')) { ?>
                    <li><a href="<?php echo site_url('gallery/index'); ?>"><?php echo $this->lang->line('gallery'); ?></a>
                    </li>
                <?php } ?>
                <?php if (has_permission(VIEW, 'gallery', 'image')) { ?>
                    <li><a href="<?php echo site_url('gallery/image/index'); ?>"><?php echo $this->lang->line('gallery_image'); ?></a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>


    <?php if (has_permission(VIEW, 'miscellaneous', 'award') || has_permission(VIEW, 'miscellaneous', 'todo')) { ?>
        <li><a class='ad___minh'><i class="fa fa-image"></i><?php echo $this->lang->line('miscellaneous'); ?> <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu child_menu1">
                <?php if (has_permission(VIEW, 'miscellaneous', 'award')) { ?>
                    <li><a href="<?php echo site_url('miscellaneous/award/index'); ?>"><?php echo $this->lang->line('manage_award'); ?></a>
                    </li>
                <?php } ?>
                <?php if (has_permission(VIEW, 'miscellaneous', 'todo')) { ?>
                    <li><a href="<?php echo site_url('miscellaneous/todo/index'); ?>"><?php echo $this->lang->line('manage_todo'); ?></a>
                    </li>
                <?php } ?>
                <?php if (has_permission(VIEW, 'miscellaneous', 'faq')) { ?>
                    <li><a href="<?php echo site_url('miscellaneous/faq/index'); ?>">
                            <?php echo $this->lang->line('faq'); ?></a></li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>

</ul>


<!-- line no 903 to line no  -->




<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'setting', 'setting')) { ?>
        <li><a href="<?php echo site_url('setting/index'); ?>"><?php echo $this->lang->line('school_setting'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'setting', 'payment')) { ?>
        <li><a href="<?php echo site_url('setting/payment/index'); ?>"><?php echo $this->lang->line('payment_setting'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'setting', 'sms')) { ?>
        <li><a href="<?php echo site_url('setting/sms/index'); ?>"><?php echo $this->lang->line('sms_setting'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'setting', 'emailsetting')) { ?>
        <li><a href="<?php echo site_url('setting/emailsetting/index'); ?>"><?php echo $this->lang->line('email_setting'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'setting', 'openinghour')) { ?>
        <li><a href="<?php echo site_url('setting/openinghour/index'); ?>"><?php echo $this->lang->line('opening_hour'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 903 to line no  -->


<!-- line no 213 to line no  -->
<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'inventory', 'supplier')) { ?>
        <li><a href="<?php echo site_url('inventory/supplier/index'); ?>"><?php echo $this->lang->line('supplier'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'inventory', 'warehouse')) { ?>
        <li><a href="<?php echo site_url('inventory/warehouse/index'); ?>"><?php echo $this->lang->line('warehouse'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'inventory', 'category')) { ?>
        <li><a href="<?php echo site_url('inventory/category/index'); ?>"><?php echo $this->lang->line('category'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'inventory', 'product')) { ?>
        <li><a href="<?php echo site_url('inventory/product/index'); ?>"><?php echo $this->lang->line('product'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'inventory', 'purchase')) { ?>
        <li><a href="<?php echo site_url('inventory/purchase/index'); ?>"><?php echo $this->lang->line('purchase'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'inventory', 'sale')) { ?>
        <li><a href="<?php echo site_url('inventory/sale/index'); ?>"><?php echo $this->lang->line('sale'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'inventory', 'issue')) { ?>
        <li><a href="<?php echo site_url('inventory/issue/index'); ?>"><?php echo $this->lang->line('issue'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 213 to line no  -->



<!-- line no 230 to line no  -->



<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'asset', 'vendor')) { ?>
        <li><a href="<?php echo site_url('asset/vendor/index'); ?>"><?php echo $this->lang->line('vendor'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'asset', 'store')) { ?>
        <li><a href="<?php echo site_url('asset/store/index'); ?>"><?php echo $this->lang->line('store'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'asset', 'category')) { ?>
        <li><a href="<?php echo site_url('asset/category/index'); ?>"><?php echo $this->lang->line('category'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'asset', 'item')) { ?>
        <li><a href="<?php echo site_url('asset/item/index'); ?>"><?php echo $this->lang->line('item'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'asset', 'purchase')) { ?>
        <li><a href="<?php echo site_url('asset/purchase/index'); ?>"><?php echo $this->lang->line('purchase'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'asset', 'issue')) { ?>
        <li><a href="<?php echo site_url('asset/issue/index'); ?>"><?php echo $this->lang->line('issue'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 230 to line no  -->


<!-- line no 244 to line no  -->

<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'library', 'book')) { ?>
        <li><a href="<?php echo site_url('library/book/index'); ?>"><?php echo $this->lang->line('book'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'library', 'member')) { ?>
        <li><a href="<?php echo site_url('library/member/index'); ?>"><?php echo $this->lang->line('library_member'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'library', 'issue')) { ?>
        <li><a href="<?php echo site_url('library/issue/index'); ?>"><?php echo $this->lang->line('issue_and_return'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'library', 'ebook')) { ?>
        <li><a href="<?php echo site_url('library/ebook/index'); ?>"><?php echo $this->lang->line('e_book'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 244 to line no  -->


<!-- line no 260 to line no  -->
<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'transport', 'vehicle')) { ?>
        <li><a href="<?php echo site_url('transport/vehicle/index'); ?>"><?php echo $this->lang->line('vehicle'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'transport', 'route')) { ?>
        <li><a href="<?php echo site_url('transport/route/index'); ?>"><?php echo $this->lang->line('transport_route'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'transport', 'member')) { ?>
        <li><a href="<?php echo site_url('transport/member/index'); ?>"><?php echo $this->lang->line('transport_member'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 260 to line no  -->

<!-- line no 272 to line no  -->

<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'hostel', 'hostel')) { ?>
        <li><a href="<?php echo site_url('hostel/index'); ?>"><?php echo $this->lang->line('manage_hostel'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'hostel', 'room')) { ?>
        <li><a href="<?php echo site_url('hostel/room/index'); ?>"><?php echo $this->lang->line('manage_room'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'hostel', 'member')) { ?>
        <li><a href="<?php echo site_url('hostel/member/index'); ?>"><?php echo $this->lang->line('hostel_member'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 272 to line no  -->





<!-- line no 283 to line no  -->
<ul class="nav child_menu child_menu1">
    <?php if (has_permission(VIEW, 'payroll', 'grade')) { ?>
        <li><a href="<?php echo site_url('payroll/grade/index'); ?>"><?php echo $this->lang->line('salary_grade'); ?></a>
        </li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'payroll', 'payment')) { ?>
        <li><a href="<?php echo site_url('payroll/payment/index'); ?>">
                <?php echo $this->lang->line('salary_payment'); ?></a></li>
    <?php } ?>
    <?php if (has_permission(VIEW, 'payroll', 'payment')) { ?>
        <li><a href="<?php echo site_url('payroll/history/index'); ?>"><?php echo $this->lang->line('salary_history'); ?></a>
        </li>
    <?php } ?>
</ul>
<!-- line no 283 to line no  -->