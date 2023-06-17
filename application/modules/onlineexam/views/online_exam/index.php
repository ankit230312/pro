
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-mouse-pointer"></i><small> <?php echo $this->lang->line('manage_online_exam'); ?> </small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content quick-link">
                <?php $this->load->view('quick-link'); ?>
            </div>

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">

                    <ul class="nav nav-tabs nav-tab-find bordered">
                        <li class="<?php if (isset($list)) {
                                        echo 'active';
                                    } ?>"><a href="#tab_exam_list" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if (has_permission(ADD, 'onlineexam', 'onlineexam')) { ?>
                            <?php if (isset($edit)) { ?>
                                <li class="<?php if (isset($add)) {
                                                echo 'active';
                                            } ?>"><a href="<?php echo site_url('onlineexam/add'); ?>" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>
                            <?php } else { ?>
                                <li class="<?php if (isset($add)) {
                                                echo 'active';
                                            } ?>"><a href="#tab_add_exam" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if (isset($edit)) { ?>
                            <li class="active"><a href="#tab_edit_exam" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>
                        <?php } ?>


                        <li class="li-class-list">

                            <?php $guardian_access_data = get_guardian_access_data('class');  ?>
                            <?php 
                            $teacher_access_data = get_teacher_access_data(); 
                            $teacher_access_data_subjects = get_teacher_access_data_subjects(); 
                            
                          
                            ?>

                            <?php echo form_open(site_url('onlineexam/index'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) {  ?>

                                <select class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id" id="school_id" onchange="get_class_by_school(this.value, '', '');">
                                    <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option>
                                    <?php foreach ($schools as $obj) { ?>
                                        <option value="<?php echo $obj->id; ?>" <?php if (isset($school_id) && $school_id == $obj->id) {
                                                                                    echo 'selected="selected"';
                                                                                } ?>> <?php echo $obj->school_name; ?></option>
                                    <?php } ?>
                                </select>
                                <select class="form-control col-md-7 col-xs-12" id="class_id" name="class_id" onchange="get_subject_by_class(this.value, '', '');" style="width:auto;">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                </select>
                                <select class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="subject_id" id="subject_id" style="width: auto;">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                </select>

                            <?php } else {  ?>

                                <select class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="class_id" id="class_id" onchange="get_subject_by_class(this.value, '', '');" style="width: auto;">
                                    <?php if ($this->session->userdata('role_id') != STUDENT) { ?>
                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php } ?>
                                    <?php foreach ($classes as $obj) { ?>
                                        <?php if ($this->session->userdata('role_id') == STUDENT) { ?>
                                            <?php if ($obj->id != $this->session->userdata('class_id')) {
                                                continue;
                                            } ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if (isset($class_id) && $class_id == $obj->id) {
                                                                                        echo 'selected="selected"';
                                                                                    } ?>><?php echo $obj->name; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if (isset($class_id) && $class_id == $obj->id) {
                                                                                        echo 'selected="selected"';
                                                                                    } ?>><?php echo $obj->name; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <select class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="subject_id" id="subject_id" style="width: auto;">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php foreach ($subjects as $obj) { ?>
                                        <?php if ($this->session->userdata('role_id') == STUDENT) { ?>
                                            <option value="<?php $obj->id; ?>" <?php if (isset($class_id) && $class_id == $obj->id) {
                                                                                    echo 'selected="selected"';
                                                                                } ?>><?php echo $obj->name; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            <?php } ?>

                            <input type="submit" name="find" value="<?php echo $this->lang->line('find'); ?>" class="btn btn-success btn-sm" />
                            <?php echo form_close(); ?>
                        </li>
                    </ul>
                    <br />

                    <div class="tab-content">
                        <div class="tab-pane fade in <?php if (isset($list)) {
                                                            echo 'active';
                                                        } ?>" id="tab_exam_list">
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                <th><?php echo $this->lang->line('school'); ?></th>
                                            <?php } ?>
                                            <th><?php echo $this->lang->line('exam_title'); ?></th>
                                            <th><?php echo $this->lang->line('class'); ?></th>
                                            <th><?php echo $this->lang->line('subject'); ?></th>
                                            <th><?php echo $this->lang->line('total_question'); ?></th>
                                            <th><?php echo $this->lang->line('is_publish'); ?></th>
                                            <th><?php echo 'Camera'; ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $count = 1;
                                        if (isset($online_exams) && !empty($online_exams)) { ?>
                                            <?php foreach ($online_exams as $obj) { ?>
                                                <?php
                                                if ($this->session->userdata('role_id') == GUARDIAN) {
                                                    if (!in_array($obj->class_id, $guardian_access_data)) {
                                                        continue;
                                                    }
                                                } elseif ($this->session->userdata('role_id') == STUDENT) {
                                                    if ($obj->class_id != $this->session->userdata('class_id')) {
                                                        continue;
                                                    }
                                                } elseif ($this->session->userdata('role_id') == TEACHER) {

                                                    
                                                    if (!in_array($obj->class_id, $teacher_access_data)) {
                                                        continue;
                                                    }

                                                    if (!in_array($obj->subject_id, $teacher_access_data_subjects)) {
                                                        continue;
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>
                                                        <td><?php echo $obj->school_name; ?></td>
                                                    <?php } ?>
                                                    <td><?php echo get_exam_detail_by_id($obj->title)->title; ?></td>
                                                    <td><?php echo $obj->class_name;  ?></td>
                                                    <td><?php echo $obj->subject; ?></td>
                                                    <td><?php echo count(get_exam_to_question($obj->id)); ?></td>
                                                    <td><?php echo $obj->is_publish ? $this->lang->line('yes') : $this->lang->line('no'); ?></td>
                                                    
                                                    <td><?php if($obj->capture == 'on'){ echo $this->lang->line('yes'); }else{ echo $this->lang->line('no'); } ?></td>
                                                    <td>

                                                  

                                                        <?php if (has_permission(EDIT, 'onlineexam', 'onlineexam')) { ?>
                                                            <a href="<?php echo site_url('onlineexam/edit/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                        <?php } ?>

                                                        <?php if (has_permission(VIEW, 'onlineexam', 'onlineexam')) { ?>
                                                            <a onclick="get_online_exam_modal(<?php echo $obj->id; ?>);" data-toggle="modal" data-target=".bs-online-exam-modal-lg" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(EDIT, 'onlineexam', 'onlineexam')) { ?>
                                                            <a href="<?php echo site_url('onlineexam/addquestion/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('add_question'); ?> </a>
                                                        <?php } ?>
                                                        <?php if (has_permission(DELETE, 'onlineexam', 'onlineexam')) { ?>
                                                            <a href="<?php echo site_url('onlineexam/delete/' . $obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                        <?php } ?>




                                                        <?php
                                                        if($obj->capture != 'on'){ 
                                                        if (has_permission(EDIT, 'onlineexam', 'onlineexam')) { ?>
                                                            <a target="_blank" href="<?php echo site_url('onlineexam/invigilate_capture/' . $obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> Invigilate </a>
                                                        <?php } } ?>


                                                        <!-- <?php if ($this->session->userdata('role_id') == TEACHER) {

                                                        ?>
                                                                <a href="#" onclick="javascript: return confirm_capture(<?php echo $obj->id; ?>);" class="btn btn-success btn-xs"><i class="fa-pencil-square-o fa"></i> Video Capture</a>
                                                        <?php 
                                                        } ?> -->
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade in <?php if (isset($add)) {
                                                            echo 'active';
                                                        } ?>" id="tab_add_exam">
                            <div class="x_content">
                                <?php echo form_open_multipart(site_url('onlineexam/add'), array('name' => 'online_exam_add', 'id' => 'online_exam_add', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                 

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Capture <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 sdhsdgsd">
<div class="sds7777s">
                                        <input type="radio" id="on" name="capture" required value="on">
                                          <label for="on">On</label>
										</div>
										
										<div class="sds7777s">
                                          <input type="radio" id="off" name="capture" required value="off">
                                          <label for="off">Off</label>
										</div>
                                        <div class="help-block"><?php echo form_error('exam_type_id'); ?></div>
                                    </div>
                                </div>


                                <?php $this->load->view('layout/school_list_form'); ?>

                                <!-- <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('exam'); ?> Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12 change_exam_type"  name="exam_type_id" id="add_exam_type"  required id="exam_type_id">
                                            <option value="">Select Exam Type</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('exam_type_id'); ?></div>
                                    </div>
                                </div>   

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('exam'); ?> Sub Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="exam_sub_type_id" id="add_exam_sub_type" required id="exam_sub_type_id">
                                            <option value="">Select Exam Sub Type</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('exam_sub_type_id'); ?></div>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('exam_title'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($post['title']) ?  $post['title'] : ''; ?>" placeholder="<?php echo $this->lang->line('exam_title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>  -->


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('exam_term'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" name="title" id="add_exam_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach ($exams as $obj) { ?>
                                                <option value="<?php echo $obj->id; ?>" <?php echo isset($post['title']) && $post['title'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->title; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="class_id" id="add_class_id" required="required" onchange="get_section_by_class(this.value, '', 'add_');get_subject_by_class(this.value, '', 'add_');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach ($classes as $obj) { ?>
                                                <?php
                                                if ($this->session->userdata('role_id') == TEACHER) {
                                                    if (!in_array($obj->id, $teacher_access_data)) {
                                                        continue;
                                                    }
                                                }
                                                ?>
                                                <option value="<?php echo $obj->id; ?>" <?php echo isset($post['class_id']) && $post['class_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_id"><?php echo $this->lang->line('section'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="section_id" id="add_section_id">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="subject_id" id="add_subject_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('subject_id'); ?></div>
                                    </div>
                                </div>

                                <!-- <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instruction_id"><?php echo $this->lang->line('instruction'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12  gsms-nice-select_"  name="instruction_id"  id="add_instruction_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php if (isset($instructions) && !empty($instructions)) { ?>
                                                <?php foreach ($instructions as $obj) { ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php echo isset($post['instruction_id']) && $post['instruction_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->title; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('instruction_id'); ?></div>
                                    </div>
                                </div> -->
								
								
								
								

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instruction_id"><?php echo $this->lang->line('instruction'); ?><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
<!--
                                        <input class="form-control col-md-7 col-xs-12" name="instruction_id" id="add_instruction_id" value="<?php echo isset($post['instruction_id']) ?  $post['instruction_id'] : ''; ?>" placeholder="<?php echo $this->lang->line('instruction'); ?>" type="text" autocomplete="off">
										
-->
										
										   <textarea  class="form-control col-md-7 col-xs-12"  name="instruction_id"  id="add_instruction_id" placeholder="<?php echo $this->lang->line('instruction'); ?>"><?php echo isset($post['instruction_id']) ?  $post['instruction_id'] : ''; ?></textarea>
										
										
										
                                        <div class="help-block"><?php echo form_error('instruction_id'); ?></div>
                                    </div>
                                </div>

								
								
								
								
								
								
								
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration"><?php echo $this->lang->line('duration'); ?> (Minute)<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="duration" id="add_duration" value="<?php echo isset($post['duration']) ?  $post['duration'] : ''; ?>" placeholder="<?php echo $this->lang->line('duration'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('duration'); ?></div>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date"><?php echo $this->lang->line('start_date'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="start_date" id="add_start_date" value="<?php echo isset($post['start_date']) ?  $post['start_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('start_date'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('start_date'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_date"><?php echo $this->lang->line('end_date'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="end_date" id="add_end_date" value="<?php echo isset($post['end_date']) ?  $post['end_date'] : ''; ?>" placeholder="<?php echo $this->lang->line('end_date'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('end_date'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mark_type"><?php echo $this->lang->line('mark_type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="mark_type" id="add_mark_type" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php $types = get_mark_type(); ?>
                                            <?php foreach ($types as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>" <?php echo isset($post['mark_type']) && $post['mark_type'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('mark_type'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass_mark"><?php echo $this->lang->line('pass_mark'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="pass_mark" id="add_pass_mark" value="<?php echo isset($post['pass_mark']) ?  $post['pass_mark'] : ''; ?>" placeholder="<?php echo $this->lang->line('pass_mark'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('pass_mark'); ?></div>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_publish"><?php echo $this->lang->line('is_publish'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="is_publish" id="add_is_publish">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <option value="1" <?php echo isset($post['is_publish']) && $post['is_publish'] == 1 ?  'selected="selected"' : ''; ?>><?php echo $this->lang->line('yes'); ?></option>
                                            <option value="0" <?php echo isset($post['is_publish']) && $post['is_publish'] == 0 ?  'selected="selected"' : ''; ?>><?php echo $this->lang->line('no'); ?></option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('is_publish'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exam_limit"><?php echo $this->lang->line('exam_limit_per_student'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="exam_limit" id="add_exam_limit" value="<?php echo isset($post['exam_limit']) ?  $post['exam_limit'] : ''; ?>" placeholder="<?php echo $this->lang->line('exam_limit_per_student'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('exam_limit'); ?></div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"> <?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control col-md-7 col-xs-12" name="note" id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($post['note']) ?  $post['note'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('onlineexam/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>


                        <?php if (isset($edit)) { ?>
                            <div class="tab-pane fade in active" id="tab_edit_exam">
                                <div class="x_content">
                                    <?php


                                    echo form_open_multipart(site_url('onlineexam/edit/' . $online_exam->id), array('name' => 'online_exam_edit', 'id' => 'online_exam_edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                                    <?php $this->load->view('layout/school_list_edit_form'); ?>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Capture <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12 dfgsdgsdgsd ">

                                            <input type="radio" id="on" <?php if ($online_exam->capture == 'on') {
                                                                            echo  'checked';
                                                                        }  ?> name="capture" required value="on">
                                              <label for="on">On</label>
                                              <input type="radio" id="off" <?php if ($online_exam->capture == 'off' || $online_exam->capture == '0') {
                                                                                echo  'checked';
                                                                            }  ?> name="capture" required value="off">
                                              <label for="off">Off</label>

                                            <div class="help-block"><?php echo form_error('exam_type_id'); ?></div>
                                        </div>
                                    </div>

                                    <!-- <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('exam'); ?> Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control  change_exam_type col-md-7 col-xs-12"  name="exam_type_id" id="edit_exam_type" required id="exam_type_id">
                                            <option value="">Select Exam Type</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('exam_type_id'); ?></div>
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('exam'); ?> Sub Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="exam_sub_type_id" id="edit_exam_sub_type" required id="exam_sub_type_id">
                                            <option value="">Select Exam Sub Type</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('exam_sub_type_id'); ?></div>
                                    </div>
                                </div>



                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('exam_title'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($online_exam->title) ?  $online_exam->title : ''; ?>" placeholder="<?php echo $this->lang->line('exam_title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>  -->


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exam_id"><?php echo $this->lang->line('exam_term'); ?> <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12" name="title" id="edit_exam_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach ($exams as $obj) { ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if ($obj->id == $online_exam->title) {
                                                                                                echo 'selected="selected"';
                                                                                            } ?>><?php echo $obj->title; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('exam_id'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="class_id" id="edit_class_id" required="required" onchange="get_section_by_class(this.value, '', 'edit_');get_subject_by_class(this.value, '', 'edit_');">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach ($classes as $obj) { ?>
                                                    <?php
                                                    if ($this->session->userdata('role_id') == TEACHER) {
                                                        if (!in_array($obj->id, $teacher_access_data)) {
                                                            continue;
                                                        }
                                                    }
                                                    ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if ($online_exam->class_id == $obj->id) {
                                                                                                echo 'selected="selected"';
                                                                                            } ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_id"><?php echo $this->lang->line('section'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="section_id" id="edit_section_id">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id"><?php echo $this->lang->line('subject'); ?> <span class="required">*</span> </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="subject_id" id="edit_subject_id" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('subject_id'); ?></div>
                                        </div>
                                    </div>

                                    <!-- <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instruction_id"><?php echo $this->lang->line('instruction'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12  gsms-nice-select_"  name="instruction_id"  id="edit_instruction_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php foreach ($instructions as $obj) { ?>
                                                <option value="<?php echo $obj->id; ?>" <?php echo isset($online_exam->instruction_id) && $online_exam->instruction_id == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->title; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('instruction_id'); ?></div>
                                    </div>
                                </div> -->


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instruction_id"><?php echo $this->lang->line('instruction'); ?><span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="instruction_id" id="add_instruction_id" value="<?php echo $obj->instruction_id; ?>" placeholder="<?php echo $this->lang->line('instruction'); ?>" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('instruction_id'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration"><?php echo $this->lang->line('duration'); ?> (Minute)<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="duration" id="edit_duration" value="<?php echo isset($online_exam->duration) ?  $online_exam->duration : ''; ?>" placeholder="<?php echo $this->lang->line('duration'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('duration'); ?></div>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date"><?php echo $this->lang->line('start_date'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="start_date" id="edit_start_date" value="<?php echo isset($online_exam->start_date) ?  date('d-m-Y', strtotime($online_exam->start_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('start_date'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('start_date'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_date"><?php echo $this->lang->line('end_date'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="end_date" id="edit_end_date" value="<?php echo isset($online_exam->end_date) ?  date('d-m-Y', strtotime($online_exam->end_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('end_date'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('end_date'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mark_type"><?php echo $this->lang->line('mark_type'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="mark_type" id="edit_mark_type" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $types = get_mark_type(); ?>
                                                <?php foreach ($types as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php echo isset($online_exam->mark_type) && $online_exam->mark_type == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('mark_type'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass_mark"><?php echo $this->lang->line('pass_mark'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="pass_mark" id="edit_pass_mark" value="<?php echo isset($online_exam->pass_mark) ?  $online_exam->pass_mark : ''; ?>" placeholder="<?php echo $this->lang->line('pass_mark'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('pass_mark'); ?></div>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_publish"><?php echo $this->lang->line('is_publish'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="is_publish" id="edit_is_publish">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <option value="1" <?php echo isset($online_exam->is_publish) && $online_exam->is_publish == 1 ?  'selected="selected"' : ''; ?>><?php echo $this->lang->line('yes'); ?></option>
                                                <option value="0" <?php echo isset($online_exam->is_publish) && $online_exam->is_publish == 0 ?  'selected="selected"' : ''; ?>><?php echo $this->lang->line('no'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('is_publish'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exam_limit"><?php echo $this->lang->line('exam_limit_per_student'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" name="exam_limit" id="edit_exam_limit" value="<?php echo isset($online_exam->exam_limit) ?  $online_exam->exam_limit : ''; ?>" placeholder="<?php echo $this->lang->line('exam_limit_per_student'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('exam_limit'); ?></div>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"> <?php echo $this->lang->line('note'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="form-control col-md-7 col-xs-12" name="note" id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($online_exam->note) ?  $online_exam->note : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('note'); ?></div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"><?php echo $this->lang->line('is_active'); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12  gsms-nice-select_" name="status" id="edit_status">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <option value="1" <?php echo isset($online_exam->status) && $online_exam->status == 1 ?  'selected="selected"' : ''; ?>><?php echo $this->lang->line('yes'); ?></option>
                                                <option value="0" <?php echo isset($online_exam->status) && $online_exam->status == 0 ?  'selected="selected"' : ''; ?>><?php echo $this->lang->line('no'); ?></option>
                                            </select>
                                            <div class="help-block"><?php echo form_error('is_publish'); ?></div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="hidden" value="<?php echo isset($online_exam) ? $online_exam->id : ''; ?>" name="id" />
                                            <a href="<?php echo site_url('onlineexam/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<div class="modal fade bs-online-exam-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_online_exam_data"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function get_online_exam_modal(online_exam_id) {

        $('.fn_question_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('onlineexam/get_single_online_exam'); ?>",
            data: {
                online_exam_id: online_exam_id
            },
            success: function(response) {
                if (response) {
                    $('.fn_online_exam_data').html(response);
                }
            }
        });
    }


    var edit = false;
    $("document").ready(function() {
        <?php if (isset($edit) && !empty($edit) && $this->session->userdata('role_id') != TEACHER) { ?>
            edit = true;
            $("#edit_school_id").trigger('change');
        <?php } ?>
    });

    $('.fn_school_id').on('change', function() {
       

        var school_id = $(this).val();
        var exam_id = '';
        var class_id = '';

        <?php if (isset($edit) && !empty($edit) && !empty($exam_id)) { ?>
            exam_id = '<?php echo $exam_id; ?>';
            class_id = '<?php echo $schedule->class_id; ?>';
        <?php } ?>

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line("select_school"); ?>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_exam_by_school'); ?>",
            data: {
                school_id: school_id,
                exam_id: exam_id
            },
            async: false,
            success: function(response) {
                if (response) {
                    if (edit) {
                        $('#edit_exam_id').html(response);
                    } else {
                        $('#add_exam_id').html(response);
                    }

                    get_class_by_school(school_id, class_id);
                }
            }
        });
    });


    function confirm_capture(id) {
        swal("Select Capture type", {
                buttons: {
                    catch: {
                        text: "On",
                        value: "catch",
                    },
                    defeat: {
                        text: "Off",
                        value: "catch",
                    },
                    cancel: "Cancel",

                },
            })
            .then((value) => {
                switch (value) {

                    case "defeat":
                        var type = 'off';
                        $.ajax({       
                            type   : "POST",
                            url    : "<?php echo site_url('ajax/update_capture_camera'); ?>",
                            data   : { id:id, type:type},               
                            async  : false,
                            success: function(response){                                                   
                                if(response)
                                {  
                                    swal("Update Successfully", "", "success");

                                }
                            }
                        });
                       
                        break;

                        case "catch":
                            var type = 'on';

                            $.ajax({       
                                type   : "POST",
                                url    : "<?php echo site_url('ajax/update_capture_camera'); ?>",
                                data   : { id:id,  type:type},               
                                async  : false,
                                success: function(response){                                                   
                                    if(response)
                                    {  
                                        swal("Update Successfully", "", "success");

                                    }
                                }
                            });
                        break;

                    default:
                        // swal("Got away safely!");
                }
            });


    }
</script>



<!-- Super admin js START  -->
<script type="text/javascript">
    $("document").ready(function() {
        <?php if (isset($edit) && !empty($edit)) { ?>
            $("#edit_school_id").trigger('change');
        <?php } ?>
    });

    $('.fn_school_id').on('change', function() {

        var school_id = $(this).val();
        var class_id = '';
        var instruction_id = '';
        var form = 'add_';

        <?php if (isset($edit) && !empty($edit)) { ?>
            class_id = '<?php echo $online_exam->class_id; ?>';
            instruction_id = '<?php echo $online_exam->instruction_id; ?>';
            var form = 'edit_';
        <?php } ?>

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line("select_school"); ?>');
            return false;
        }
        get_class_by_school(school_id, class_id, form);
        get_instruction_by_school(school_id, instruction_id, form);
    });
</script>
<!-- Super admin js end -->


<script type="text/javascript">
    <?php if (isset($post) && $post['school_id'] != '') { ?>
        get_class_by_school('<?php echo $post['school_id']; ?>', '<?php echo $post['class_id']; ?>', 'add_');
        get_instruction_by_school('<?php echo $post['school_id']; ?>', '', 'add_');
    <?php } ?>
    <?php if (isset($online_exam) && !empty($online_exam)) { ?>
        get_class_by_school('<?php echo $online_exam->school_id; ?>', '<?php echo $online_exam->class_id; ?>', 'edit_');
        get_instruction_by_school('<?php echo $online_exam->school_id; ?>', '', 'edit_');
    <?php } ?>

    <?php if (isset($filter_school_id) && $filter_school_id != '' && isset($filter_class_id)) { ?>
        get_class_by_school('<?php echo $filter_school_id; ?>', '<?php echo $filter_class_id; ?>', '');
        get_instruction_by_school('<?php echo $filter_school_id; ?>', '', '');
    <?php } ?>

    function get_class_by_school(school_id, class_id, form) {


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
                    $('#' + form + 'class_id').html(response);
                }
            }
        });
    }

    function get_instruction_by_school(school_id, instruction_id, form) {


        $.ajax({
            type: "POST",
            url: "<?php echo site_url('onlineexam/instruction/get_instruction_by_school'); ?>",
            data: {
                school_id: school_id,
                instruction_id: instruction_id
            },
            async: false,
            success: function(response) {
                if (response) {
                    $('#' + form + 'instruction_id').html(response);
                }
            }
        });
    }



    <?php if (isset($post) && $post['class_id'] != '') { ?>
        get_subject_by_class('<?php echo $post['class_id']; ?>', '<?php echo $post['subject_id']; ?>', 'add_');
    <?php } ?>
    <?php if (isset($online_exam) && !empty($online_exam)) {  ?>
        get_subject_by_class('<?php echo $online_exam->class_id; ?>', '<?php echo $online_exam->subject_id; ?>', 'edit_');
    <?php } ?>
    <?php if (isset($filter_class_id) && $filter_class_id != '' && isset($subject_id)) { ?>
        get_subject_by_class('<?php echo $filter_class_id; ?>', '<?php echo $subject_id; ?>', '');
    <?php } ?>

    function get_subject_by_class(class_id, subject_id, form) {

        var school_id = $('#' + form + 'school_id').val();
        if (!school_id) {
            school_id = '<?php echo $filter_school_id; ?>';
        }

        if (!school_id) {
            toastr.error('<?php echo $this->lang->line("select_school"); ?>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_subject_by_class'); ?>",
            data: {
                school_id: school_id,
                class_id: class_id,
                subject_id: subject_id
            },
            async: false,
            success: function(response) {
                if (response) {
                    $('#' + form + 'subject_id').html(response);
                }
            }
        });
    }


    <?php if (isset($post) && $post['class_id'] != '') { ?>
        get_section_by_class('<?php echo $post['class_id']; ?>', '<?php echo $post['section_id']; ?>', 'add_');
    <?php } ?>
    <?php if (isset($online_exam) && !empty($online_exam)) {  ?>
        get_section_by_class('<?php echo $online_exam->class_id; ?>', '<?php echo $online_exam->section_id; ?>', 'edit_');
    <?php } ?>

    function get_section_by_class(class_id, section_id, form) {

        var school_id = $('#' + form + 'school_id').val();

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
                    $('#' + form + 'section_id').html(response);
                }
            }
        });
    }
</script>


<!-- bootstrap-datetimepicker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet">
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

<!-- datatable with buttons -->
<script type="text/javascript">
    $('#add_start_date').datetimepicker();
    $('#edit_start_date').datetimepicker();

    $('#add_end_date').datetimepicker();
    $('#edit_end_date').datetimepicker();

    $(document).ready(function() {
        $('#datatable-responsive').DataTable({
            dom: 'Bfrtip',
            iDisplayLength: 15,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'pageLength'
            ],
            search: true,
            responsive: true
        });
    });

    $("#online_exam_add").validate();
    $("#online_exam_edit").validate();



    $('.fn_school_id').on('change', function() {
        get_exam_type_by_school();
        get_exam_by_school();
        
    });


    $("document").ready(function() {
        
        <?php if (isset($school_id) && !empty($school_id)) { ?>
          
            $(".fn_school_id").trigger('change');
           
        <?php } ?>
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
                    if (exam_type_id) {
                        $('#edit_exam_type').html(response);
                    } else {
                        $('#add_exam_type').html(response);

                    }
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
                    if (exam_sub_type_id) {
                        $('#edit_exam_sub_type').html(response);
                    } else {
                        $('#add_exam_sub_type').html(response);
                    }
                }
            }
        });
    }




       
function get_exam_by_school() {
    
       var school_id = '';
       var exam_id = '';
       var class_id = '';

       var edit = '';
       <?php if (isset($edit) && !empty($edit) && !empty($exam_id)) { ?>
           exam_id = '<?php echo $exam_id; ?>';
           edit = '1';
       <?php } ?>

       <?php if (isset($school_id) && !empty($school_id)) { ?>
           var school_id = <?php echo $school_id; ?>;
       <?php } ?>

       if (!school_id) {
           toastr.error('<?php echo $this->lang->line("select_school"); ?>');
           return false;
       }

       $.ajax({
           type: "POST",
           url: "<?php echo site_url('ajax/get_exam_by_school'); ?>",
           data: {
               school_id: school_id,
               exam_id: exam_id
           },
           async: false,
           success: function(response) {
               if (response) {
                   if (edit) {
                       $('#edit_exam_id').html(response);
                   } else {
                       $('#add_exam_id').html(response);
                   }

               }
           }
       });
    }

</script>

<style>
.col-md-6.col-sm-6.col-xs-12.sdhsdgsd .sds7777s {
    float: left;
    width: 13%;
}
	
	.sds7777s label {
    float: revert;
    width: auto;
}
</style>