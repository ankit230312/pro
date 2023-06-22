<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title no-print">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('manage_cbse_result_card'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content quick-link no-print">
                <!-- <?php // $this->load->view('quick-link-exam'); 
                        ?> -->
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


                            <?php if (has_permission(VIEW, 'mark', 'resultcard')) { ?>
                                <a class="nav-link1 active" href="<?php echo site_url('exam/resultcard/index'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
                            <?php } ?>
                            <?php if (has_permission(VIEW, 'mark', 'resultcard')) { ?>
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
            </div>

            <div class="x_content no-print">
                <?php echo form_open_multipart(site_url('exam/resultcard/school_check_result_col'), array('name' => 'resultcard', 'id' => 'resultcard', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row no_boorrr">
                    <input type="hidden" name="main" value="1">
                    <?php $this->load->view('layout/school_list_filter'); ?>

                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="item form-group">
                            <div><?php echo $this->lang->line('academic_year'); ?> <span class="required">*</span></div>
                            <select class="form-control col-md-7 col-xs-12" name="academic_year_id" id="academic_year_id" required="required">
                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                <?php foreach ($academic_years as $obj) {

                                ?>
                                    <?php $running = $obj->is_running ? ' [' . $this->lang->line('running_year') . ']' : ''; ?>
                                    <option value="<?php echo $obj->id; ?>" <?php if (isset($academic_year_id) && $academic_year_id == $obj->id) {
                                                                                echo 'selected="selected"';
                                                                            } ?>><?php echo $obj->session_year;
                                                                                    echo $running; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>




                    <?php if ($this->session->userdata('role_id') != STUDENT) { ?>
                        <!-- <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('exam'); ?> Mode <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="exam_mode_id" id="exam_mode_id" required="required" >                                
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <option <?php if ($exam_mode_id == '0') {
                                            echo 'selected';
                                        } ?>  value="0">Online</option>
                                <option <?php if ($exam_mode_id == '1') {
                                            echo 'selected';
                                        } ?>  value="1">Offline</option>
                                <option <?php if ($exam_mode_id == '2') {
                                            echo 'selected';
                                        } ?>   value="2">Both</option>
                            </select>
                            <div class="help-block"><?php echo form_error('exam_mode_id'); ?></div>
                        </div>
                     </div>   -->


                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group">
                                <div><?php echo $this->lang->line('exam'); ?> Type </div>
                                <select class="form-control col-md-7 col-xs-12 change_exam_type" name="exam_type_id" id="add_exam_type" id="exam_type_id">
                                    <option value="">Select Exam Type</option>
                                </select>
                                <div class="help-block"><?php echo form_error('exam_type_id'); ?></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group">
                                <div><?php echo $this->lang->line('exam'); ?> Sub Type </div>
                                <select class="form-control col-md-7 col-xs-12" name="exam_sub_type_id" id="add_exam_sub_type" id="exam_sub_type_id">
                                    <option value="">Select Exam Sub Type</option>
                                </select>
                                <div class="help-block"><?php echo form_error('exam_sub_type_id'); ?></div>
                            </div>
                        </div>


                        <div class="examlist">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                    <div><?php echo $this->lang->line('exams'); ?> </div>
                                    <div id="all_exam_list"></div>
                                    <div class="help-block"><?php echo form_error('exam_list_id'); ?></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group">
                                <?php $teacher_student_data = get_teacher_access_data('student'); ?>
                                <?php $guardian_class_data = get_guardian_access_data('class'); ?>
                                <div><?php echo $this->lang->line('class'); ?> <span class="required">*</span></div>
                                <select class="form-control col-md-7 col-xs-12" name="class_id" id="class_id" required="required" onchange="get_section_by_class(this.value,'');">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php foreach ($classes as $obj) { ?>
                                        <?php if ($this->session->userdata('role_id') == TEACHER && !in_array($obj->id, $teacher_student_data)) {
                                            continue;  ?>
                                        <?php } elseif ($this->session->userdata('role_id') == GUARDIAN && !in_array($obj->id, $guardian_class_data)) {
                                            continue;
                                        } ?>
                                        <option value="<?php echo $obj->id; ?>" <?php if (isset($class_id) && $class_id == $obj->id) {
                                                                                    echo 'selected="selected"';
                                                                                } ?>><?php echo $obj->name; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block"><?php echo form_error('class_id'); ?></div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="item form-group">
                                <div><?php echo $this->lang->line('section'); ?> <span class="required">*</span></div>
                                <select class="form-control col-md-7 col-xs-12" name="section_id" id="section_id" required="required" onchange="get_student_by_section(this.value,'');">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                </select>
                                <div class="help-block"><?php echo form_error('section_id'); ?></div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="item form-group">
                                <div><?php echo $this->lang->line('student'); ?> <span class="required">*</span></div>
                                <select class="form-control col-md-7 col-xs-12" name="student_id" id="student_id" required="required">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                </select>
                                <div class="help-block"><?php echo form_error('student_id'); ?></div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-md-1 col-sm-1 col-xs-12">
                        <div class="form-group"><br />
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>




            <?php if (isset($student) && !empty($student)) { ?>

                <div class="x_content result_card">
                    <div class="row my-2">
                        <div class="col-sm-12 col-xs-12 layout-box">
                            <div class="row">
                                <div class="col-md-4 result_card_logo_block">
                                    <div class="result_card_logo">
                                        <?php if (isset($school)) { ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="">
                                        <?php } ?>


                                    </div>
                                </div>
                                <div class="col-md-4 result_card_school_block">
                                    <h1><?php echo $this->lang->line('result_card'); ?></h1>

                                    <?php if (isset($school)) {; ?>
                                        <h3><?php echo $school->school_name; ?></h3>

                                        <p> <?php echo $school->address; ?></p>

                                    <?php } ?>


                                </div>
                                <div class="col-md-4 result_card_student_details">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-pic">
                                                <?php if ($student->photo != '') { ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/student-photo/<?php echo $student->photo; ?>" alt="" width="80" />
                                                <?php } else { ?>
                                                    <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="45" />
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="">
                                                <p> <?php echo $this->lang->line('name'); ?> : <?php echo $student->name; ?><br /></p>
                                                <p> <?php echo $this->lang->line('class'); ?> : <?php echo $student->class_name; ?><br></p>
                                                <p> <?php echo $this->lang->line('roll_no'); ?> : <?php echo $student->roll_no; ?><br></p>
                                                <p> <?php echo $this->lang->line('section'); ?> : <?php echo $student->section; ?></p>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 layout-box student_details_card1">
                            <table id="datatable-responsive" class="table table-striped_ table-bordered dt-responsive nowrap student_details_card" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <p> <?php echo $this->lang->line('name'); ?> : <?php echo $student->name; ?><br /></p>
                                        </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $this->lang->line('class'); ?> & <?php echo $this->lang->line('section'); ?> : <?php echo $student->class_name; ?> & <?php echo $student->section; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $this->lang->line('adm_no'); ?> : <?php echo $student->admission_no; ?></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <p><?php echo $this->lang->line('father_name'); ?> : <?php echo $student->father_name; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $this->lang->line('birth_date'); ?> : <?php echo $student->dob; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $this->lang->line('roll_no'); ?> : <?php echo $student->roll_no; ?></p>
                                    </td>

                                </tr>
                                <tr>

                                    <td>
                                        <p><?php echo $this->lang->line('father_name'); ?> : <?php echo $student->mother_name; ?></p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>

                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            <?php } ?>

            <div class="boorrrr">
                <div class="x_content result_card_borrr ">
                    <table id="datatable-responsive" class="table table-striped_ table-bordered dt-responsive nowrap result_card_marks" cellspacing="0" width="100%">
                        <thead class="cbse_result_card">

                            <tr>
                                <th rowspan="2" class="S_l">#SL</th>
                                <th rowspan="2" colspan="3 " class="sub">Subject</th>


                                <?php
                                if (isset($exams) && !empty($exams)) { ?>

                                    <?php foreach ($exams as $ex) {

                                    ?>

                                        <th colspan="3"><?php echo $ex->title; ?></th>

                                    <?php } ?>
                                <?php } ?>
                                <!-- <th colspan="3">pd1</th>
                            <th colspan="3">Half Yearly</th>
                            <th colspan="3">pd2</th>
                            <th colspan="3">Annual</th>
                            <th colspan="2">Overall Total</th> -->

                            </tr>



                            <tr>

                                <?php
                                if (isset($exams) && !empty($exams)) {
                                ?>

                                    <?php foreach ($exams as $ex) {
                                    ?>
                                        <th>Max Mark</th>
                                        <th colspan="2">Obtain Marks</th>



                                    <?php } ?>
                                <?php } ?>





                                <!-- <th colspan = "">Max Mark</th>
                            <th colspan="2">Obtain Marks</th>
                           

                           

                            <th>Max Mark</th>
                            <th>Obtain Marks</th> -->

                            </tr>
                        </thead>

                        <tbody id="fn_mark">
                            <?php
                            if (isset($exams) && !empty($exams)) {
                            ?>
                                <?php foreach ($exams as $ex) {  ?>
                                    <?php
                                    $exam_subjects = get_subject_list($school_id, $academic_year_id, $ex->id, $class_id, $section_id, $student_id);
                                    $exam_subjects_online = get_subject_list_online($school_id, $academic_year_id, $ex->id, $class_id, $section_id, $student_id);

                                    $count = 1;
                                    if ((isset($exam_subjects) && !empty($exam_subjects) || isset($exam_subjects_online) && !empty($exam_subjects_online))) {
                                    ?>

                                        <?php foreach ($exam_subjects as $obj) { ?>
                                            <?php $exam = get_exam_result($school_id, $ex->id, $student_id, $academic_year_id, $class_id, $section_id); ?>
                                            <?php if ($exam->name == '') {
                                                continue;
                                            }
                                            ?>

                                            <?php $lh = get_lowet_height_mark($school_id, $academic_year_id, $ex->id, $class_id, $section_id, $obj->subject_id); ?>
                                            <?php $position = get_position_in_subject($school_id, $academic_year_id, $ex->id, $class_id, $section_id, $obj->subject_id, $obj->obtain_total_mark); ?>
                                            <tr>

                                                <td><?php echo $count++;  ?></td>
                                                <td colspan="3"><?php echo ucfirst($obj->subject); ?> </td>
                                                <td><input type="text"></td>
                                                <td colspan="2"><input type="text"></td>
                                                <td><input type="text"></td>
                                                <td colspan="2"><input type="text"></td>
                                                <td><input type="text"></td>
                                                <td colspan="2"><input type="text"></td>
                                                <td><input type="text"></td>
                                                <td colspan="2"><input type="text"></td>
                                                <?php
                                                ?>



                                            </tr>
                                        <?PHP } ?>
                                    <?PHP } ?>


                                <?PHP } ?>
                            <?PHP } ?>
                            <?php  echo "School Id =". $school_id;
                          ?> 
                            <?php
                            foreach ($data_marks->result() as $dm) {
                                echo $dm;
                            } ?>

                            <tr>
                                <td colspan="4">Total</td>

                                <td><input type="text"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td colspan="4">Percentage (%)</td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="4">Grade</td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                                <td colspan="3"></td>
                            </tr>


                    </table>

                    <div class="row ">
                        <div class="col-md-4">
                            <table id="datatable-responsive" class="table table-striped_ table-bordered dt-responsive nowrap result_curriculam" cellspacing="0" width="100%">
                                <thead class="cbse_result_card">

                                    <tr>
                                        <th colspan="2">
                                            Co-Curriculam
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Activity</th>
                                        <th>Annual Exam</th>
                                    </tr>
                                    <tr>
                                        <td>Physical Health</td>

                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td>ART / Craft</td>

                                        <td></td>
                                    </tr>


                                </thead>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table id="datatable-responsive" class="table table-striped_ table-bordered dt-responsive nowrap result_curriculam" cellspacing="0" width="100%">
                                <thead class="cbse_result_card">

                                    <tr>
                                        <th colspan="2">
                                            Personal & Social Qualities
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Qualities</th>
                                        <th>Annual Exam</th>
                                    </tr>
                                    <tr>
                                        <td>Discipline</td>

                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Uniform</td>

                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Punctuality</td>

                                        <td></td>
                                    </tr>


                                </thead>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table id="datatable-responsive" class="table table-striped_ table-bordered dt-responsive nowrap result_curriculam" cellspacing="0" width="100%">
                                <thead class="cbse_result_card">

                                    <tr>
                                        <th colspan="2">
                                            Attendance (Regularity)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Attendance</th>
                                        <th>Annual </th>
                                    </tr>
                                    <tr>
                                        <td>No. of Working Days</td>

                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>No. of Attendance</td>

                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>% of Attendance</td>

                                        <td></td>
                                    </tr>


                                </thead>
                            </table>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table id="datatable-responsive" class="table table-striped_ table-bordered dt-responsive nowrap final_result_card_tb" cellspacing="0">
                                <thead class="final_result_card">
                                    <tr>
                                        <th colspan="3"> Final Result</th>
                                        <th> <span></span> Passed</th>
                                        <th> <span></span> Promoted</th>
                                        <th> <span></span> NOT PROMOTED</th>
                                        <th> <span></span> FAILED</th>
                                    </tr>

                                </thead>
                                <tr>
                                    <td colspan="3" rowspan="2">Remarks</td>
                                    <td colspan="4" rowspan="2"></td>
                                </tr>

                                <tr>


                                </tr>
                                <tr>
                                    <td colspan="3">School Opening On: 27-03-2023 </td>
                                    <td colspan="2"> <span></span></td>
                                    <td colspan="2">Issue Date: 22-03-2023</td>

                                </tr>

                            </table>
                        </div>

                    </div>


                </div>

                <?php if (isset($student) && !empty($student)) { ?>

                <?php } ?>

                <div class="set_layout result_card_borrr1">
                    <div class="rowt ">
                        <div class="col-lg-12">&nbsp;</div>
                    </div>
                    <div class="rowt ">
                        <div class="col-xs-4 text-center signature">
                            <?php echo $this->lang->line('principal'); ?>
                        </div>
                        <div class="col-xs-2 text-center">
                            &nbsp;
                        </div>
                        <div class="col-xs-4 text-center signature">
                            <?php echo $this->lang->line('class_teacher'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ass_pro_ass_pro">
                            <div>
                                <h2 class="ass_pro">Assessment & Promotion</h2>
                            </div>
                            <ul class="ass_pro_list">
                                <li>
                                    <p>1. Promotion is granted on the basis of the whole year's performance of the pupil</p>
                                </li>
                                <li>
                                    <p>2. There is no provision for "Re-examination", "Promotion or trial basis" or "Double Promotion".</p>
                                </li>
                                <li>
                                    <p>3. A Student fails in two consecutive classes will be asked to withdraw.</p>
                                </li>
                                <li>
                                    <p>4. In matters regarding promotion the Principal's decision will be final.</p>
                                </li>
                                <li>
                                    <p>5. Fraudulent or unauthenticated erasure invalidated this document.</p>
                                </li>
                                <li>
                                    <p>6. The Final Marks consist of equal percentage of all tests and exams.</p>
                                </li>
                                <li>
                                    <p>7. Grades are not awarded if student remained absent in any examination.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="datatable-responsive" class="table table-striped_ table-bordered dt-responsive nowrap result_grade_sys" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Grade A+ </th>
                                        <th>Grade A</th>
                                        <th>Grade B+</th>
                                        <th>Grade B</th>
                                        <th>Grade C+</th>
                                        <th>Grade C</th>
                                        <th>Grade D</th>
                                        <th>AB</th>
                                        <th>ML</th>
                                    </tr>

                                </thead>
                                <tr>
                                    <td>(90-100%) </td>
                                    <td>(80-89%)</td>
                                    <td>(70-79%)</td>
                                    <td>(60-69%)</td>
                                    <td>(50-59%)</td>
                                    <td>(40-49%)</td>
                                    <td>(0-39%)</td>
                                    <td>Absent</td>
                                    <td>Medical</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12">
                <div class="text-center"><?php // echo 'Copyright © ' . date('Y') . ' Generated By Educlouds'; 
                                            ?> </div>


                <div class="row no-print">
                    <div class="col-xs-12 text-right">
                        <button class="btn btn-default " onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 no-print">
                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('mark_sheet_instruction'); ?></div>
                </div>
            </div>

        </div>
    </div>



    <!-- Super admin js START  -->
    <script type="text/javascript">
        $("document").ready(function() {
            <?php if (isset($school_id) && !empty($school_id) &&  $this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                $(".fn_school_id").trigger('change');
            <?php } ?>
        });

        $('.fn_school_id').on('change', function() {

            var school_id = $(this).val();
            var academic_year_id = '';
            var class_id = '';

            <?php if (isset($school_id) && !empty($school_id)) { ?>
                academic_year_id = '<?php echo $academic_year_id; ?>';
                class_id = '<?php echo $class_id; ?>';
            <?php } ?>

            if (!school_id) {
                toastr.error('<?php echo $this->lang->line("select_school"); ?>');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_academic_year_by_school'); ?>",
                data: {
                    school_id: school_id,
                    academic_year_id: academic_year_id
                },
                async: false,
                success: function(response) {
                    if (response) {
                        $('#academic_year_id').html(response);
                        get_class_by_school(school_id, class_id);
                    }
                }
            });
        });

        function get_class_by_school(school_id, class_id) {

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_class_by_school'); ?>",
                data: {
                    school_id: school_id,
                    class_id: class_id
                },
                async: false,
                success: function(response) {
                    if (response) {
                        $('#class_id').html(response);
                    }
                }
            });
        }
    </script>
    <!-- Super admin js end -->


    <script type="text/javascript">
        <?php if (isset($class_id) && isset($section_id)) { ?>
            get_section_by_class('<?php echo $class_id; ?>', '<?php echo $section_id; ?>');
        <?php } ?>

        function get_section_by_class(class_id, section_id) {

            var school_id = $('.fn_school_id').val();

            if (!school_id) {
                toastr.error('<?php echo $this->lang->line("select_school"); ?>');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_section_by_class'); ?>",
                data: {
                    school_id: school_id,
                    class_id: class_id,
                    section_id: section_id
                },
                async: false,
                success: function(response) {
                    if (response) {
                        $('#section_id').html(response);
                    }
                }
            });
        }

        <?php if (isset($class_id) && isset($section_id)) { ?>
            get_student_by_section('<?php echo $section_id; ?>', '<?php echo $student_id; ?>');
        <?php } ?>

        function get_student_by_section(section_id, student_id) {

            var school_id = $('#school_id').val();
            if (!school_id) {
                toastr.error('<?php echo $this->lang->line("select_school"); ?>');
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_student_by_section'); ?>",
                data: {
                    school_id: school_id,
                    section_id: section_id,
                    student_id: student_id
                },
                async: false,
                success: function(response) {
                    if (response) {
                        $('#student_id').html(response);
                    }
                }
            });
        }

        $("#resultcard").validate();
        $("#marksheet").validate();





        $('.fn_school_id').on('change', function() {
            get_exam_type_by_school();

            var exam_type_id = $('.change_exam_type').find(":selected").val();
            var exam_mode_id = $('#exam_mode_id').find(":selected").val();
            var exam_sub_type_id = $(this).find(":selected").val();
            get_exam_list(exam_type_id, exam_sub_type_id, exam_mode_id);
        });


        $("document").ready(function() {
            <?php if (isset($school_id) && !empty($school_id)) { ?>
                $(".fn_school_id").trigger('change');
            <?php } ?>
            get_exam_list();
        });



        function get_exam_type_by_school() {
            var exam_type_id = '';
            <?php if (isset($school_id) && !empty($school_id)) { ?>
                exam_type_id = '<?php echo $exam_type_id; ?>';
            <?php } ?>

            var school_id = $('.fn_school_id').val();
            if (!school_id) {
                toastr.error('<?php echo $this->lang->line("select_school"); ?>');
                $('#role_id').prop('selectedIndex', 0);
                $('#user_id').prop('selectedIndex', 0);
                $('#class_id').prop('selectedIndex', 0);
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_exam_type_by_school'); ?>",
                data: {
                    school_id: school_id,
                    exam_type_id: exam_type_id
                },
                async: false,
                success: function(response) {
                    if (response) {
                        $('#add_exam_type').html(response);
                    }
                }
            });
        }


        $('#exam_mode_id').on('change', function() {
            var exam_type_id = $('.change_exam_type').find(":selected").val();
            var exam_mode_id = $(this).find(":selected").val();
            var exam_sub_type_id = $('#add_exam_sub_type').find(":selected").val();

            get_exam_list(exam_type_id, exam_sub_type_id, exam_mode_id);
        });


        $('.change_exam_type').on('change', function() {
            var exam_type_id = $(this).find(":selected").val();
            var exam_mode_id = $('#exam_mode_id').find(":selected").val();
            var exam_sub_type_id = $('#add_exam_sub_type').find(":selected").val();
            get_exam_list(exam_type_id, exam_sub_type_id, exam_mode_id);
        });


        $('#add_exam_sub_type').on('change', function() {
            var exam_type_id = $('.change_exam_type').find(":selected").val();
            var exam_mode_id = $('#exam_mode_id').find(":selected").val();
            var exam_sub_type_id = $(this).find(":selected").val();
            get_exam_list(exam_type_id, exam_sub_type_id, exam_mode_id);
        });


        function get_exam_list(exam_type_id, exam_sub_type_id, exam_mode_id) {

            var exam_list_online = '';
            var exam_list = '';
            <?php if (isset($exam_list) && !empty($exam_list) || isset($exam_list_online) && !empty($exam_list_online)) { ?>
                exam_list_online = '<?php echo json_encode($exam_list_online); ?>';
                exam_list = '<?php echo json_encode($exam_list); ?>';
                console.log(exam_list);
            <?php } ?>

            var school_id = $('.fn_school_id').val();
            if (!school_id) {
                toastr.error('<?php echo $this->lang->line("select_school"); ?>');
                $('#role_id').prop('selectedIndex', 0);
                $('#user_id').prop('selectedIndex', 0);
                $('#class_id').prop('selectedIndex', 0);
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_exam_list'); ?>",
                data: {
                    school_id: school_id,
                    exam_mode_id: exam_mode_id,
                    exam_type_id: exam_type_id,
                    exam_sub_type_id: exam_sub_type_id,
                    exam_list_online: exam_list_online,
                    exam_list: exam_list
                },
                async: false,
                success: function(response) {
                    if (response) {
                        $('#all_exam_list').html(response);
                    }
                }
            });
        }





        $('.change_exam_type').on('change', function() {
            get_exam_sub_type_by_exam();
        });





        $("document").ready(function() {
            <?php if (isset($school_id) && !empty($school_id)) { ?>
                $(".change_exam_type").trigger('change');
            <?php } ?>
        });


        function get_exam_sub_type_by_exam() {
            var exam_sub_type_id = '';
            var exam_type_id = $('.change_exam_type').val();

            <?php if (isset($school_id) && !empty($school_id)) { ?>
                exam_sub_type_id = '<?php echo $exam_sub_type_id; ?>';
                exam_type_id = '<?php echo $exam_type_id; ?>';
            <?php } ?>

            var school_id = $('.fn_school_id').val();
            if (!school_id) {
                toastr.error('<?php echo $this->lang->line("select_school"); ?>');
                $('#role_id').prop('selectedIndex', 0);
                $('#user_id').prop('selectedIndex', 0);
                $('#class_id').prop('selectedIndex', 0);
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_exam_sub_type_by_exam'); ?>",
                data: {
                    school_id: school_id,
                    exam_type_id: exam_type_id,
                    exam_sub_type_id: exam_sub_type_id
                },
                async: false,
                success: function(response) {
                    if (response) {
                        $('#add_exam_sub_type').html(response);
                    }
                }
            });
        }
    </script>
    <style>
        .table>thead>tr>th,
        .table>tbody>tr>td {
            padding: 2px;
        }
    </style>