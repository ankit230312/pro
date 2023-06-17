<div class="col-md-3  <?php echo $this->enable_rtl ? 'right_col' : 'left_col'; ?>" id="style-3">
    <div class="<?php echo $this->enable_rtl ? 'right_col' : 'left_col'; ?> scroll-view">
        <!-- <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo site_url('dashboard/index'); ?>">
                <?php if ($this->global_setting->brand_name) { ?>
                <span
                    <?php if (str_word_count($this->global_setting->brand_name) == 1) {
                        echo 'style="margin-top: 18px;"';
                    } ?>>
                    <?php echo $this->global_setting->brand_name; ?>
                </span>
                <?php } else { ?>
                <span>Multi School</span>
                <?php } ?>

                <?php if ($this->global_setting->brand_logo) { ?>
                <img class="logo" src="<?php echo UPLOAD_PATH . 'logo/' . $this->global_setting->brand_logo; ?>" style="max-width: 65px;    height: 50px;
    margin-bottom: 4px;s
}" alt="">
                <?php } else { ?>
                <img class="logo" src="<?php echo IMG_URL; ?>/sms-logo-50.png" alt="">
                <?php } ?>
            </a>
        </div> -->
        <div class="clearfix" style=""></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="navbar nav_title" style="border: 0;">
                <a href="<?php echo site_url('dashboard/index'); ?>">
                    <!-- <?php if ($this->global_setting->brand_name) { ?>
                            <span
                                <?php if (str_word_count($this->global_setting->brand_name) == 1) {
                                    echo 'style="margin-top: 18px;"';
                                } ?>>
                                <?php echo $this->global_setting->brand_name; ?>
                            </span>
                            <?php } else { ?>
                            <span>Multi School</span>
                            <?php } ?> -->

                    <?php if ($this->global_setting->brand_logo) { ?>
                        <div class="fsfas_____Sa">
                            <img class="logo" src="<?php echo UPLOAD_PATH . 'logo/' . $this->global_setting->brand_logo; ?>" style="max-width: 100%; 
                margin-bottom: 4px;    margin-right: 2px; " alt="">
                        </div>
                    <?php } else { ?>
                        <img class="logo" src="<?php echo IMG_URL; ?>/sms-logo-50.png" alt="">
                    <?php } ?>
                </a>
            </div>
            <div class="menu_section">
                <div class="compl__modules">
                    <span></span>
                    <p style='margin: 0;text-align: center;color: #000;margin-top: 7px;'>Completed Modules</p>
                    <span></span>
                </div>
                <?php
                if ($this->session->userdata('role_id') != SUPER_ADMIN) {
                    $classes = get_classes($this->session->userdata('school_id'));
                }
                if ($this->session->userdata('role_id') == GUARDIAN) {
                    $guardian_class_data = get_guardian_access_data('class');
                }
                ?>

                <ul class="nav side-menu ">
                    <li><a href="<?php echo site_url('dashboard/index'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a> </li>



                    <li><a class='ad___minh '><i class="fa fa-users"></i>Classroom<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu box_sha fsfsdf_sfd">
                            <?php if (has_permission(VIEW, 'academic', 'routine')) { ?>
                                <li> <a href="<?php echo site_url('academic/routine/index'); ?>">
                                        <!-- <i
                                                class="fa fa-clock-o"></i> -->
                                        <?php echo "Time table"; ?></a>
                                </li>
                            <?php } ?>





                            <?php if (has_permission(VIEW, 'attendance', 'student')) { ?>
                                <?php if ($this->session->userdata('role_id') == GUARDIAN) { ?>
                                    <li><a href="<?php echo site_url('attendance/student/guardian'); ?>"><?php echo $this->lang->line('student_attendance'); ?></a>
                                    </li>
                                <?php } else { ?>
                                    <?php if ($this->session->userdata('role_id') == STUDENT) { ?>

                                        <li><a href="<?php echo site_url('profile/index'); ?>?page=attendance"><?php echo $this->lang->line('student_attendance'); ?></a>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo site_url('attendance/student/index'); ?>"><?php echo $this->lang->line('student_attendance'); ?></a>
                                        </li>
                                    <?php } ?>





                                <?php } ?>
                            <?php } ?>

                            <?php if (has_permission(VIEW, 'academic', 'assignment')) { ?>
                                <li><a href="<?php echo site_url('academic/assignment/index'); ?>"><?php echo $this->lang->line('assignment'); ?></a>
                                </li>
                            <?php } ?>









                            <!-- <?php if (has_permission(VIEW, 'academic', 'submission')) { ?>
                            <li><a
                                    href="<?php echo site_url('academic/submission/index'); ?>"><?php echo $this->lang->line('submission'); ?></a>
                            </li>
                            <?php } ?> -->




                            <?php if (
                                has_permission(VIEW, 'lessonplan', 'lessonplan') ||
                                has_permission(VIEW, 'lessonplan', 'lesson') ||
                                has_permission(VIEW, 'lessonplan', 'status') ||
                                has_permission(VIEW, 'lessonplan', 'topic')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('lessonplan/lesson/index'); ?>">
                                        <?php echo $this->lang->line('lesson_plan'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>













                                </li>
                            <?php } ?>

                            <?php if (has_permission(VIEW, 'academic', 'promotion')) { ?>
                                <li><a href="<?php echo site_url('academic/promotion'); ?>">
                                        <!-- <i -->
                                        <!-- class="fa fa-mail-forward"></i> -->
                                        <?php echo $this->lang->line('promotion'); ?></a>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>

                    <?php if (
                        has_permission(VIEW, 'frontoffice', 'purpose') ||
                        has_permission(VIEW, 'frontoffice', 'visitor') ||
                        has_permission(VIEW, 'frontoffice', 'calllog') ||
                        has_permission(VIEW, 'frontoffice', 'dispatch') ||
                        has_permission(VIEW, 'frontoffice', 'receive') ||
                        has_permission(VIEW, 'administrator', 'frontoffice')
                    ) { ?>
                        <li><a class='ad___minh'><i class="fa fa-tty"></i>Front Office
                                <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu box_sha">
                                <?php if (has_permission(VIEW, 'frontoffice', 'purpose')) { ?>
                                    <li><a href="<?php echo site_url('frontoffice/purpose/index'); ?>"><?php echo $this->lang->line('visitor_purpose'); ?></a>
                                    </li>
                                <?php } ?>
                                <?php if (has_permission(VIEW, 'frontoffice', 'visitor')) { ?>
                                    <li><a href="<?php echo site_url('frontoffice/visitor/index'); ?>"><?php echo $this->lang->line('visitor_info'); ?></a>
                                    </li>
                                <?php } ?>
                                <?php if (has_permission(VIEW, 'frontoffice', 'calllog')) { ?>
                                    <li><a href="<?php echo site_url('frontoffice/calllog/index'); ?>"><?php echo $this->lang->line('call_log'); ?></a>
                                    </li>
                                <?php } ?>
                                <?php if (has_permission(VIEW, 'frontoffice', 'dispatch')) { ?>
                                    <li><a href="<?php echo site_url('frontoffice/dispatch/index'); ?>"><?php echo $this->lang->line('postal_dispatch'); ?></a>
                                    </li>
                                <?php } ?>
                                <?php if (has_permission(VIEW, 'frontoffice', 'receive')) { ?>
                                    <li><a href="<?php echo site_url('frontoffice/receive/index'); ?>"><?php echo $this->lang->line('postal_receive'); ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <li><a class='ad___minh'><i class="fa fa-users"></i>ERP<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu box_sha fsfsdf_sfd">
                            <?php if (
                                has_permission(VIEW, 'inventory', 'supplier') ||
                                has_permission(VIEW, 'inventory', 'warehouse') ||
                                has_permission(VIEW, 'inventory', 'category') ||
                                has_permission(VIEW, 'inventory', 'product') ||
                                has_permission(VIEW, 'inventory', 'purchase') ||
                                has_permission(VIEW, 'inventory', 'sale') ||
                                has_permission(VIEW, 'inventory', 'issue')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('inventory/supplier/index'); ?>"><i class="fa fa-users"></i>
                                        <?php echo $this->lang->line('inventory'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>


                            <?php if (
                                has_permission(VIEW, 'asset', 'vendor') ||
                                has_permission(VIEW, 'asset', 'store') ||
                                has_permission(VIEW, 'asset', 'category') ||
                                has_permission(VIEW, 'asset', 'item') ||
                                has_permission(VIEW, 'asset', 'purchase') ||
                                has_permission(VIEW, 'asset', 'issue')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('asset/vendor/index'); ?>"><i class="fa fa-users"></i>
                                        <?php echo $this->lang->line('asset_management'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>


                            <?php if (
                                has_permission(VIEW, 'library', 'book') ||
                                has_permission(VIEW, 'library', 'member') ||
                                has_permission(VIEW, 'library', 'issue') ||
                                has_permission(VIEW, 'library', 'ebook')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('library/book/index'); ?>"><i class="fa fa-book"></i>
                                        <?php echo $this->lang->line('library'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>

                            <?php if (
                                has_permission(VIEW, 'transport', 'vehicle') ||
                                has_permission(VIEW, 'transport', 'route') ||
                                has_permission(VIEW, 'transport', 'member')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('transport/vehicle/index'); ?>"> <i class="fa fa-bus"></i>
                                        <?php echo $this->lang->line('transport'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>
                                   
                                </li>
                            <?php } ?>

                            <?php if (
                                has_permission(VIEW, 'hostel', 'hostel') ||
                                has_permission(VIEW, 'hostel', 'room') ||
                                has_permission(VIEW, 'hostel', 'member')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('hostel/index'); ?>"><i class="fa fa-hotel"></i>
                                        <?php echo $this->lang->line('hostel'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>
                                  
                                </li>

                            <?php } ?>


                            <?php if (has_permission(VIEW, 'payroll', 'grade') || has_permission(VIEW, 'payroll', 'payment')) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('payroll/grade/index'); ?>"><i class="fa fa-dollar"></i>
                                        <?php echo $this->lang->line('payroll'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>
                               
                                </li>
                            <?php } ?>


                            <?php if (
                                has_permission(VIEW, 'accounting', 'discount') ||
                                has_permission(VIEW, 'accounting', 'feetype') ||
                                has_permission(VIEW, 'accounting', 'invoice') ||
                                has_permission(VIEW, 'accounting', 'duefeeemail') ||
                                has_permission(VIEW, 'accounting', 'duefeesms') ||
                                has_permission(VIEW, 'accounting', 'exphead') ||
                                has_permission(VIEW, 'accounting', 'expenditure') ||
                                has_permission(VIEW, 'accounting', 'incomehead') ||
                                has_permission(VIEW, 'accounting', 'income')
                            ) { ?>
                                <li><a class='ad___minh'><i class="fa fa-calculator"></i>
                                        <?php echo $this->lang->line('accounting'); ?> <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu child_menu1">



                                        <!--  -->

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

                                        <!--  -->









                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if (has_permission(VIEW, 'report', 'report')) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('report/sattendance'); ?>"><i class="fa fa-bar-chart"></i>
                                        <?php echo $this->lang->line('report'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>

                        </ul>
                    </li>



                    <li><a class='ad___minh'><i class="fa fa-user-md"></i><?php echo $this->lang->line('human_resource_manage'); ?><span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu box_sha">
                            <?php if (has_permission(VIEW, 'hrm', 'designation') || has_permission(VIEW, 'hrm', 'employee')) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('hrm/designation/index'); ?>"><i class="fa fa-user-md"></i>
                                        <span> <?php echo  $this->lang->line('human_resource'); ?></span>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>













                                </li>
                            <?php } ?>




                            <?php if (
                                has_permission(VIEW, 'teacher', 'teacher') ||
                                has_permission(VIEW, 'teacher', 'department') ||
                                has_permission(VIEW, 'teacher', 'lecture') ||
                                has_permission(VIEW, 'teacher', 'bulk') ||
                                has_permission(VIEW, 'teacher', 'rating')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('teacher/index'); ?>"><i class="fa fa-users"></i>
                                        <?php echo $this->lang->line('teacher'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>




                                </li>
                            <?php } ?>


                            <?php if (has_permission(VIEW, 'leave', 'leave') || has_permission(VIEW, 'leave', 'type')) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('leave/type/index'); ?>"><i class="fa fa-bell-o"></i>
                                        <?php echo $this->lang->line('manage_leave'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>




                            <?php if (
                                has_permission(VIEW, 'attendance', 'student') ||
                                has_permission(VIEW, 'attendance', 'teacher') ||
                                has_permission(VIEW, 'attendance', 'employee') ||
                                has_permission(VIEW, 'attendance', 'absentemail') ||
                                has_permission(VIEW, 'attendance', 'absentsms')
                            ) { ?>

                                <li><a class='ad___minh' href="<?php echo site_url('attendance/teacher/index'); ?>"> <i class="fa fa-check-circle-o"></i>
                                        <?php echo $this->lang->line('attendance'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>


                        </ul>
                    </li>




                    <li><a class='ad___minh'><i class="fa fa-users"></i>Exam & Promotion<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu box_sha">


                            <?php  /* if (has_permission(VIEW, 'onlineexam', 'instruction') ||
    has_permission(VIEW, 'onlineexam', 'question') ||
    has_permission(VIEW, 'onlineexam', 'onlineexam') ||
    has_permission(VIEW, 'onlineexam', 'takeexam')) {?>
                            <li><a class='ad___minh'><i class="fa fa-mouse-pointer"></i>
                                    <?php echo $this->lang->line('online_exam'); ?><span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <!-- <?php if (has_permission(VIEW, 'onlineexam', 'instruction')) {?>
                            <li><a
                                    href="<?php echo site_url('onlineexam/instruction/index'); ?>"><?php echo $this->lang->line('instruction'); ?></a>
                            </li>
                            <?php }?> -->
                                    <?php if (has_permission(VIEW, 'onlineexam', 'question')) {?>
                                    <li><a
                                            href="<?php echo site_url('onlineexam/question/index'); ?>"><?php echo $this->lang->line('question_bank'); ?></a>
                                    </li>
                                    <?php }?>
                                    <?php if (has_permission(VIEW, 'onlineexam', 'onlineexam')) {?>
                                    <li><a
                                            href="<?php echo site_url('onlineexam/index'); ?>"><?php echo $this->lang->line('online_exam'); ?></a>
                                    </li>
                                    <?php }?>

                                    <?php if ($this->session->userdata('role_id') == STUDENT) {?>
                                    <?php if (has_permission(VIEW, 'onlineexam', 'takeexam')) {?>
                                    <li><a
                                            href="<?php echo site_url('onlineexam/takeexam/index'); ?>"><?php echo $this->lang->line('take_exam'); ?></a>
                                    </li>
                                    <?php }?>
                                    <?php }?>

                                    <?php if (has_permission(VIEW, 'onlineexam', 'takeexam')) {?>
                                    <li><a
                                            href="<?php echo site_url('onlineexam/takeexam/result'); ?>"><?php echo $this->lang->line('exam_result'); ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php } */ ?>


                            <?php if (
                                has_permission(VIEW, 'exam', 'grade') ||
                                has_permission(VIEW, 'exam', 'exam') ||
                                has_permission(VIEW, 'onlineexam', 'instruction') ||
                                has_permission(VIEW, 'onlineexam', 'question') ||
                                has_permission(VIEW, 'onlineexam', 'onlineexam') ||
                                has_permission(VIEW, 'onlineexam', 'takeexam')
                            ) { ?>
                                <li><a class='ad___minh'><i class="fa fa-graduation-cap"></i>
                                        <?php echo $this->lang->line('manage_exam'); ?> <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu child_menu1">




                                        <?php if (has_permission(VIEW, 'exam', 'schedule') || has_permission(VIEW, 'onlineexam', 'onlineexam')) { ?>
                                            <li>

                                            <li><a class='ad___minh' href="<?php echo site_url('exam/index'); ?>">
                                                    <?php echo $this->lang->line('schedule'); ?>
                                                    <!-- <span class="fa fa-chevron-down"></span> -->
                                                </a>



                                            </li>
                                        <?php } ?>
                                        <?php if (has_permission(VIEW, 'onlineexam', 'takeexam')) { ?>
                                            <li><a href="<?php echo site_url('onlineexam/takeexam/result'); ?>"><?php echo $this->lang->line('exam_result'); ?></a>
                                            </li>
                                        <?php } ?>

                                        <?php if (has_permission(VIEW, 'exam', 'attendance')) { ?>
                                            <li><a href="<?php echo site_url('exam/attendance/index'); ?>"><?php echo $this->lang->line('attendance'); ?></a>
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

                                </li>
                            <?php } ?>

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

                                <li><a class='ad___minh' href="<?php echo site_url('exam/mark/index'); ?>"><i class="fa fa-file-text-o"></i>
                                        <?php echo $this->lang->line('exam_mark'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>






                            <?php if (has_permission(VIEW, 'certificate', 'certificate') || has_permission(VIEW, 'certificate', 'type')) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('certificate/type/index'); ?>"><i class="fa fa-certificate"></i>
                                        <?php echo $this->lang->line('certificate'); ?> 
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>





                            <?php if (
                                has_permission(VIEW, 'scholarship', 'scholarship') ||
                                has_permission(VIEW, 'scholarship', 'candidate') ||
                                has_permission(VIEW, 'scholarship', 'donar')
                            ) { ?>
                                <li><a class='ad___minh'><i class="fa fa-users"></i>
                                        <?php echo $this->lang->line('scholarship'); ?><span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu child_menu1">
                                        <?php if (has_permission(VIEW, 'scholarship', 'candidate')) { ?>
                                            <li><a href="<?php echo site_url('scholarship/candidate/index'); ?>"><?php echo $this->lang->line('candidate'); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if (has_permission(VIEW, 'scholarship', 'donar')) { ?>
                                            <li><a href="<?php echo site_url('scholarship/donar/index'); ?>"><?php echo $this->lang->line('donar'); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if (has_permission(VIEW, 'scholarship', 'scholarship')) { ?>
                                            <li><a href="<?php echo site_url('scholarship/index'); ?>"><?php echo $this->lang->line('scholarship'); ?></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </li>
                            <?php } ?>





                        </ul>
                    </li>


                    <li><a class='ad___minh'><i class="fa fa-users"></i>Communications<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu box_sha">

                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN || $this->session->userdata('role_id') == ADMIN) { ?>
                                <li>
                                    <a href="<?php echo site_url('generateticket/generateticket/index'); ?>"><i class="fa fa-comments-o"></i>
                                        Generate ticket</a>
                                </li>

                            <?php } ?>

                            <?php if (has_permission(VIEW, 'message', 'message')) { ?>
                                <li><a href="<?php echo site_url('message/inbox'); ?>">
                                        <i class="fa fa-comments-o"></i>
                                        <?php echo $this->lang->line('message'); ?>
                                    </a>
                                </li>
                            <?php } ?>


                            <?php if ($this->session->userdata('role_id') != SUPER_ADMIN) { ?>
                                <?php if (has_permission(VIEW, 'usercomplain', 'usercomplain')) { ?>
                                    <li><a href="<?php echo site_url('usercomplain/index'); ?>"><?php echo $this->lang->line('complain'); ?></a>
                                    </li>
                                <?php } ?>
                                <?php if (has_permission(VIEW, 'userleave', 'userleave')) { ?>
                                    <li><a href="<?php echo site_url('userleave/index'); ?>"><?php echo $this->lang->line('leave_application'); ?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>

                            <?php if (has_permission(VIEW, 'message', 'mail') || has_permission(VIEW, 'message', 'text')) { ?>
                                <li><a class='ad___minh'><i class="fa fa-envelope-o"></i>
                                        <?php echo $this->lang->line('mail_and_sms'); ?> <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu child_menu1">
                                        <?php if (has_permission(VIEW, 'message', 'mail')) { ?>
                                            <li><a href="<?php echo site_url('message/mail/index'); ?>"><?php echo $this->lang->line('email'); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if (has_permission(VIEW, 'message', 'text')) { ?>
                                            <li><a href="<?php echo site_url('message/text/index'); ?>"><?php echo $this->lang->line('sms'); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if (has_permission(VIEW, 'administrator', 'sms')) { ?>
                                <li><a href="<?php echo site_url('administrator/sms/index'); ?>"><?php echo $this->lang->line('sms_setting'); ?></a>
                                </li>
                            <?php } ?>
                            <?php if (has_permission(VIEW, 'administrator', 'emailsetting')) { ?>
                                <li><a href="<?php echo site_url('administrator/emailsetting/index'); ?>"><?php echo $this->lang->line('email_setting'); ?></a>
                                </li>
                            <?php } ?>


                            <?php if (has_permission(VIEW, 'complain', 'complain') || has_permission(VIEW, 'complain', 'type')) { ?>
                                <li><a class='ad___minh'><i class="fa fa-commenting"></i>
                                        <?php echo $this->lang->line('complain'); ?> <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu child_menu1">
                                        <?php if (has_permission(VIEW, 'complain', 'type')) { ?>
                                            <li><a href="<?php echo site_url('complain/type/index'); ?>"><?php echo $this->lang->line('complain_type'); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if (has_permission(VIEW, 'complain', 'complain')) { ?>
                                            <li><a href="<?php echo site_url('complain/index'); ?>"><?php echo $this->lang->line('manage_complain'); ?>
                                                </a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>









                        </ul>
                    </li>

                    <li><a class='ad___minh'><i class="fa fa-users"></i>Setup<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu box_sha">


                            <?php if (has_permission(VIEW, 'administrator', 'emailtemplate') || has_permission(VIEW, 'administrator', 'smstemplate')) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('administrator/emailtemplate/index'); ?>"><i class="fa fa-tags"></i>
                                        <?php echo $this->lang->line('template'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                <?php } ?>


                                <?php if (
                                    has_permission(VIEW, 'academic', 'classes') ||
                                    has_permission(VIEW, 'academic', 'section') ||
                                    has_permission(VIEW, 'academic', 'groups') ||
                                    has_permission(VIEW, 'academic', 'levels') ||
                                    has_permission(VIEW, 'academic', 'subject') ||
                                    has_permission(VIEW, 'academic', 'syllabus') ||
                                    has_permission(VIEW, 'academic', 'material') ||
                                    has_permission(VIEW, 'academic', 'liveclass') ||
                                    has_permission(VIEW, 'academic', 'assignment') ||
                                    has_permission(VIEW, 'academic', 'submission')
                                ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('academic/groups/index'); ?>"><i class="fa fa-institution"></i>
                                        <?php echo $this->lang->line('academic'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>




                            <?php if (has_permission(VIEW, 'language', 'language')) { ?>
                                <li><a href="<?php echo site_url('language/index'); ?>"><i class="fa fa-language"></i>
                                        <?php echo $this->lang->line('language'); ?></a></li>
                            <?php } ?>


                            <?php if (
                                has_permission(VIEW, 'student', 'type') ||
                                has_permission(ADD, 'student', 'student') ||
                                has_permission(ADD, 'student', 'bulk') ||
                                has_permission(ADD, 'student', 'admission') ||
                                has_permission(ADD, 'student', 'activity')
                            ) { ?>

                                <li><a class='ad___minh' href="<?php echo site_url('student/type/index'); ?>"><i class="fa fa-group"></i>
                                        <?php echo $this->lang->line('manage_student'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>


                            <?php } ?>


                            <?php if (
                                has_permission(VIEW, 'exam', 'grade') ||
                                has_permission(VIEW, 'exam', 'exam') ||
                                has_permission(VIEW, 'onlineexam', 'instruction') ||
                                has_permission(VIEW, 'onlineexam', 'question') ||
                                has_permission(VIEW, 'onlineexam', 'onlineexam') ||
                                has_permission(VIEW, 'onlineexam', 'takeexam')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('exam/examtypelist'); ?>"><i class="fa fa-graduation-cap"></i>
                                        <?php echo $this->lang->line('exam_setup'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>


                                </li>
                            <?php } ?>

                            <?php if (
                                has_permission(VIEW, 'card', 'idsetting') ||
                                has_permission(VIEW, 'card', 'schoolidsetting') ||
                                has_permission(VIEW, 'card', 'admitsetting') ||
                                has_permission(VIEW, 'card', 'schooladmitsetting') ||
                                has_permission(VIEW, 'card', 'teacher') ||
                                has_permission(VIEW, 'card', 'employee') ||
                                has_permission(VIEW, 'card', 'student') ||
                                has_permission(VIEW, 'card', 'admit')
                            ) { ?>

                                <li><a class='ad___minh' href="<?php echo site_url('card/student/index'); ?>"> <i class="fa fa-barcode"></i>
                                        <?php echo $this->lang->line('generate_card'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>




                            <?php if ($this->session->userdata('role_id') != SUPER_ADMIN) { ?>
                                <?php if (has_permission(VIEW, 'setting', 'setting') || has_permission(VIEW, 'setting', 'payment') || has_permission(VIEW, 'setting', 'sms') || has_permission(VIEW, 'setting', 'openinghour')) { ?>
                                    <li><a class='anchor' href="<?php echo site_url('setting/index'); ?>"><i class="fa fa-gears"></i>
                                            <?php echo $this->lang->line('school_setting'); ?>
                                            <!-- <span class="fa fa-chevron-down"></span> -->
                                        </a>

                                    </li>
                                <?php } ?>
                            <?php } ?>






                            <?php
                            if (
                                has_permission(VIEW, 'administrator', 'setting') ||
                                has_permission(VIEW, 'administrator', 'school') ||
                                has_permission(VIEW, 'administrator', 'payment') ||
                                has_permission(VIEW, 'administrator', 'sms') ||
                                has_permission(VIEW, 'administrator', 'year') ||
                                has_permission(VIEW, 'administrator', 'role') ||
                                has_permission(VIEW, 'administrator', 'permission') ||
                                has_permission(VIEW, 'administrator', 'user') ||
                                has_permission(VIEW, 'administrator', 'usercredential') ||
                                has_permission(VIEW, 'administrator', 'superadmin') ||
                                has_permission(EDIT, 'administrator', 'password') ||
                                has_permission(VIEW, 'administrator', 'backup') ||
                                has_permission(VIEW, 'administrator', 'activitylog') ||
                                has_permission(VIEW, 'administrator', 'feedback')
                            ) { ?>
                                <li><a class='ad___minh' href="<?php echo site_url('administrator/year/index'); ?>"><i class="fa fa-user"></i>
                                        <?php echo $this->lang->line('administrator'); ?>
                                        <!-- <span class="fa fa-chevron-down"></span> -->
                                    </a>

                                </li>
                            <?php } ?>







                            <?php if (has_permission(VIEW, 'guardian', 'guardian')) { ?>
                                <li><a href="<?php echo site_url('guardian/index'); ?>"><i class="fa fa-paw"></i>
                                        <?php echo $this->lang->line('guardian'); ?></a> </li>
                            <?php } ?>


                            <!-- <div class="compl__modules">
                    <span></span>
                    <p style='margin: 0;text-align: center;color: #000;margin-top: 7px;'>Work in progress</p>
                    <span></span>
                </div> -->

















                            <!-- <div class="compl__modules">
                    <span></span>
                    <p style="margin: 0;text-align: center;color: #000;margin-top: 7px;">Testing started</p>
                    <span></span>
                </div> -->


















                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                <li><a class='ad___minh'><i class="fa fa-thumbs-o-up"></i><?php echo $this->lang->line('subscription'); ?>
                                        (SaaS)
                                        <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu child_menu1">
                                        <li><a href="<?php echo site_url('subscription/faq/index'); ?>">
                                                <?php echo $this->lang->line('faq'); ?></a></li>
                                        <li><a href="<?php echo site_url('subscription/slider/index'); ?>"><?php echo $this->lang->line('slider'); ?></a>
                                        </li>
                                        <li><a href="<?php echo site_url('subscription/setting/index'); ?>"><?php echo $this->lang->line('subscription_setting'); ?></a>
                                        </li>
                                        <li><a href="<?php echo site_url('administrator/setting/index'); ?>">
                                                <?php echo $this->lang->line('general_setting'); ?></a></li>
                                        <li><a href="<?php echo site_url('subscription/plan/index'); ?>"><?php echo $this->lang->line('subscription_plan'); ?></a>
                                        </li>
                                        <li><a href="<?php echo site_url('subscription/index'); ?>"><?php echo $this->lang->line('subscription'); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>





                    <li><a class='ad___minh'><i class="fa fa-lock"></i><?php echo $this->lang->line('profile'); ?> <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu box_sha">
                            <li><a href="<?php echo site_url('profile/index'); ?>"><?php echo $this->lang->line('my_profile'); ?></a>
                            </li>
                            <li><a href="<?php echo site_url('profile/password'); ?>"><?php echo $this->lang->line('reset_password'); ?></a>
                            </li>
                            <?php if ($this->session->userdata('role_id') == GUARDIAN) { ?>
                                <li><a href="<?php echo site_url('guardian/invoice'); ?>"><?php echo $this->lang->line('invoice'); ?></a>
                                </li>
                                <li><a href="<?php echo site_url('guardian/feedback'); ?>"><?php echo $this->lang->line('feedback'); ?></a>
                                </li>
                            <?php } ?>
                            <?php if ($this->session->userdata('role_id') == STUDENT) { ?>
                                <li><a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('invoice'); ?></a>
                                </li>
                            <?php } ?>

                            <li><a href="<?php echo site_url('auth/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a>
                            </li>
                        </ul>
                    </li>


                    <?php if (has_permission(VIEW, 'frontend', 'frontend') || has_permission(VIEW, 'frontend', 'slider') || has_permission(VIEW, 'miscellaneous', 'award') || has_permission(VIEW, 'miscellaneous', 'todo')) { ?>
                        <li><a class='ad___minh' href="<?php echo site_url('frontend/index'); ?>"><i class="fa fa-desktop"></i><?php echo $this->lang->line('manage_frontend'); ?>
                                <!-- <span class="fa fa-chevron-down"></span> -->
                            </a>

                        </li>
                    <?php } ?>











                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>