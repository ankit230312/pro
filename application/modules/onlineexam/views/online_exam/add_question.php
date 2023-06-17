<style>



.tab_add_question_for_this_close i.fa.fa-times {
    color: #000 !important;
}

li.tab_add_question_for_this {
    padding: 6px 20px;
    border-radius: 4px;
    color: #000;
    border: 1px solid #d6d6d6
}

li.active.tab_add_question_for_this {
        background: #0795d4;
        color: #fff;
    }
	
	li.active.tab_add_question_for_this {
    background: #0795d4;
    color: #fff;
    cursor: pointer;
}
	
	li.active.tab_add_question_for_this:hover {
    background: #000;
    color: #fff;
    cursor: pointer;
}
	
	.form-horizontal .control-label {
    padding-top: 8px;
    font-size: 12px;
    text-align: left;
}
	
	.form-horizontal .control-label {
    padding-top: 8px;
    font-size: 13px;
    text-align: left;
    color: #000;
    letter-spacing: 0.5px;
    padding-bottom: 3px;
}
	
	form#addquestionsamepage .item.form-group {
    float: left;
    width: 20%;
}
	.btn.btn-default.btn-file {
    width: 100%;
    text-align: left;
}
	
	.text-info {
    font-size: 11px;
    color: #000;
    line-height: 10px;
    margin-top: 8px;
}
	
	.btn.btn-default.btn-file {
    width: 100%;
    text-align: left;
    background: #eee;
}
	
	i.fa.fa-paperclip {
    color: #000!important;
}
	
	.form-control {
    border-radius: 3px;
    box-shadow: none;
    border: 1px solid #e0e0e0;
    font-size: 12px;
    background: #e8e8e8;
    padding: 0px 10px !important;
    border-radius: 4px;
}
	
	.form-group.dh45454545 .col-md-2.col-md-offset-10 {
    margin-top: -33px;
    position: relative;
    left: 51px;
}
	form#addquestionsamepage {
    border: 1px solid #00000030;
    float: left;
    width: 100%;
    padding: 12px 5px;
    border-radius: 9px;
    /* background: #fff5f5; */
}
	span.tab_add_question_for_this_close {
    left: 20px;
    position: relative;
    top: 8px;
}
	   .tab_add_question_for_this {
    background: transparent!important;
    color: #000!important;
}
	i.fa.fa-pencil-square-o {
    color: #000!important;
}
	
	i.fa.fa-plus-square-o {
    color: #000!important;
}
	
	i.fa.fa-list-ol {
    color: #000!important;
}
	
	.ln_solid {
    border-top: transparent;
    color: #ffffff;
    background-color: #ffffff;
    height: 1px;
    margin: 20px 0;
}
.neww-texxx{
    width:100% !important;
}
.disssso{
    display: flex;
    flex-wrap: wrap;
    float: left;
    padding-top: 26px;
}
.disss-labbe{
    padding: 0;
    width: 38%;
    font-size: 13px !important;
}
</style>

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
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class=""><a href="<?php echo site_url('onlineexam/index'); ?>"  aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'onlineexam', 'onlineexam')){ ?>
                                <li  class=""><a href="<?php echo site_url('onlineexam/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                        <?php } ?>                
                        <?php if(isset($add_question)){ ?>
                            <!-- <li class="active"><a href="#tab_add_question"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('add_question'); ?></a> </li>                           -->
                            <li class="active tab_add_question_for_this"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('add_question'); ?> </li>                          
                            <span class="tab_add_question_for_this_close" style="display:none;"><i class="fa fa-times"></i>  </span>                         
                        
                           
                        <?php } ?>                
                                                    
                            <li class="li-class-list"> 
                                
                                <?php $guardian_class_data = get_guardian_access_data('class'); ?>
                                <?php $teacher_access_data = get_teacher_access_data(); ?>  

                                <?php echo form_open(site_url('onlineexam/addquestion'), array('name' => 'filter', 'id' => 'filter', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>
                                    
                                    <select  class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id" id="filter_school_id" onchange="get_class_by_school(this.value, '', '');">
                                            <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                        <?php foreach($schools as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                        <?php } ?>   
                                    </select> 
                                 
                                 <?php } ?>
                                    <select  class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="class_id" id="filter_class_id" onchange="get_subject_by_class(this.value, '', '');" style="width: auto;">
                                        <?php if($this->session->userdata('role_id') != STUDENT){ ?>
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                        <?php } ?>  
                                        <?php foreach($classes as $obj ){ ?>
                                            <?php if($this->session->userdata('role_id') == STUDENT ){ ?>
                                                <?php if ($obj->id != $this->session->userdata('class_id')){ continue; } ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_class_id) && $filter_class_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                <?php }elseif($this->session->userdata('role_id') == GUARDIAN){ ?>                                            
                                                     <?php if (!in_array($obj->id, $guardian_class_data)) { continue; } ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_class_id) && $filter_class_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                <?php }elseif($this->session->userdata('role_id') == TEACHER){ ?>                                            
                                                     <?php if (!in_array($obj->id, $teacher_access_data)) { continue; } ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_class_id) && $filter_class_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_class_id) && $filter_class_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                <?php } ?>                                           
                                        <?php } ?>                                            
                                    </select> 
                                    <select  class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="subject_id" id="filter_subject_id" onchange="get_online_exam_by_subject(this.value, '', '`');" style="width: auto;">                                
                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    </select> 
                                    <select  class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="online_exam_id" id="filter_online_exam_id" style="width: auto;"> 
                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                   
                                    </select> 
                                  <input type="submit" name="find" value="<?php echo $this->lang->line('find'); ?>"  class="btn btn-success btn-sm"/>
                                <?php echo form_close(); ?>                                        
                        </li>
                    </ul>
                    <br/>
                    
                    <div class="tab-content">  
                                                    
                     <!-- Add new questions  -->

                     <div  class="tab-pane fade in" id="tab_add_question_for_this">
                            <div class="x_content"> 
                                
                               <?php echo form_open_multipart(site_url('onlineexam/question/add'), array('name' => 'add', 'id' => 'addquestionsamepage', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <input type="hidden" name="school_id" id="add_school_id" value="<?php echo $online_exam->school_id; ?>">                   
                                <input type="hidden" name="class_id" value="<?php echo $online_exam->class_id; ?>">                   
                                <input type="hidden" name="section_id" value="<?php echo $online_exam->section_id; ?>">                   
                                <input type="hidden" name="subject_id" value="<?php echo $online_exam->subject_id; ?>">                   
                                <input type="hidden" name="maintype" value="singlepage">                   
                                    
                                
                                <div class="item form-group neww-texxx">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="question"><?php echo $this->lang->line('question'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input  class="form-control col-md-12 col-xs-12"  name="question"  id="add_question" value="<?php echo isset($post['question']) ?  $post['question'] : ''; ?>" placeholder="<?php echo $this->lang->line('question'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('question'); ?></div>
                                    </div>
                                </div>  

                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="question_level"><?php echo $this->lang->line('question_lebel'); ?> <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12  gsms-nice-select_"  name="question_level"  id="add_question_level" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php $labels = get_question_label(); ?>
                                            <?php foreach($labels as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php echo isset($post['question_level']) && $post['question_level'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('question_level'); ?></div>
                                    </div>
                                </div>
                                
                              
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12"><?php echo $this->lang->line('image'); ?> </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="image"  id="add_image" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_doc'); ?></div>
                                        <div class="help-block"><?php echo form_error('image'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="mark"><?php echo $this->lang->line('mark'); ?> <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="mark"  id="add_mark" value="<?php echo isset($post['mark']) ?  $post['mark'] : ''; ?>" placeholder="<?php echo $this->lang->line('mark'); ?>" required="required" type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('mark'); ?></div>
                                    </div>
                                </div> 
                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="question_type"><?php echo $this->lang->line('question_type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12  gsms-nice-select_"  name="question_type"  id="add_question_type" required="required" onchange="get_question_type(this.value, 'add_');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php $types = get_question_type(); ?>
                                            <?php foreach($types as $key=>$value){ ?>
                                                <option value="<?php echo $key; ?>" <?php echo isset($post['question_type']) && $post['question_type'] == $key ?  'selected="selected"' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('question_type'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group display fn_add_total_option">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="total_option"><?php echo $this->lang->line('total_option'); ?> </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12  gsms-nice-select_"  name="total_option"  id="add_total_option" onchange="get_question_option(this.value, '', 'add_');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php for($i = 1; $i<=6; $i++){ ?>
                                                <option value="<?php echo $i; ?>" <?php echo isset($post['total_option']) && $post['total_option'] == $i ?  'selected="selected"' : ''; ?>><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('total_option'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="fn_add_question_option_block disssso">                                                                      
                                </div>
                                
                                
                                <div class="ln_solid"></div>
                                <div class="form-group dh45454545">
                                    <div class="col-md-2 col-md-offset-10">
                                        <a href="<?php echo site_url('onlineexam/question/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>                                
                            </div>
                        </div>  

                        <div  class="tab-pane fade in active" id="tab_add_question">
                            <div class="x_content">
                                
                                <div class="col-md-9 col-sm-9 col-xs-12 " >
                                    <div class="row"> 
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin: 0; padding: 0;">
                                        <h3 class="head-title head-sub-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('question_bank'); ?> </small></h3>
                                        <table id="datatable-responsive_" class="table table-striped table-bordered dt-responsive nowrap tableajaxquestions" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('sl_no'); ?></th> 
                                                     <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                        <th><?php echo $this->lang->line('school'); ?></th>
                                                    <?php } ?>
                                                    <th><?php echo $this->lang->line('question_type'); ?></th>
                                                    <th><?php echo $this->lang->line('question_lebel'); ?></th>
                                                    <th><?php echo $this->lang->line('question'); ?></th>
                                                    <th><?php echo $this->lang->line('action'); ?></th>                                            
                                                </tr>
                                            </thead>
                                            <tbody>                                      
                                                <?php $count = 1; if(isset($questions) && !empty($questions)){ ?>
                                                    <?php foreach($questions as $obj){ ?>                                  
                                                    <tr>
                                                        <td><?php echo $count++; ?></td>  
                                                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                            <td><?php echo $obj->school_name; ?></td>
                                                        <?php } ?>
                                                         <td><?php echo get_question_type($obj->question_type);  ?></td>
                                                        <td><?php echo $this->lang->line($obj->question_level); ?></td>
                                                        <td><?php echo $obj->question; ?></td>
                                                        <td>
                                                            <?php if(has_permission(ADD, 'onlineexam', 'question')){ ?>
                                                            <a href="javascript:void(0);" onclick="add_question_to_exam('<?php echo $obj->id; ?>');" class="btn btn-info btn-xs"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add_to_exam'); ?> </a>
                                                            <?php } ?>

                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12 online-exam-box" style="margin: 0;">
                                            <input type="hidden" name="school_id" id="school_id" value="<?php echo $school_id; ?>"  />
                                            <input type="hidden" name="online_exam_id" id="online_exam_id" value="<?php echo $online_exam_id; ?>"  />
                                            <h3 class="head-title head-sub-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('exam_question'); ?> </small></h3>
                                            <div class="fn_associated_question">
                                                <?php if(isset($exam_questions) && !empty($exam_questions)){ ?>
                                                    <?php foreach($exam_questions AS $key=>$obj){ ?>
                                                        <?php echo get_question_detail( $obj->online_exam_id, $obj->question_id, $key+1); ?>                                                            
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <?php
                               // print_r($online_exam);
                                
                                ?>
                                   
                                <div class="col-md-3 col-sm-3 col-xs-12 " >   
                                    <div class="online-exam-box" >
                                        <h3 class="head-title head-sub-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('online_exam'); ?> </small></h3>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('exam_title'); ?> :</span><?php echo get_exam_detail_by_id($online_exam->title)->title; ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('class'); ?> :</span><?php echo $online_exam->class_name; ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('section'); ?> :</span><?php echo $online_exam->section; ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('subject'); ?> :</span><?php echo $online_exam->subject; ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('instruction'); ?> :</span><?php echo $online_exam->ins_title; ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('duration'); ?> :</span><?php echo $online_exam->duration; ?> (Minute)
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('start_date'); ?> :</span><?php echo date('d-m-Y h:i', strtotime($online_exam->start_date)); ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('end_date'); ?> :</span><?php echo date('d-m-Y h:i', strtotime($online_exam->end_date)); ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('mark_type'); ?> :</span><?php echo $this->lang->line($online_exam->mark_type); ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('pass_mark'); ?> :</span><?php echo $online_exam->pass_mark; ?>
                                        </div>                                        
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('is_publish'); ?> :</span><?php echo $online_exam->is_publish ? $this->lang->line('yes') : $this->lang->line('no'); ?>
                                        </div>                                       
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('is_active'); ?> :</span><?php echo $online_exam->status ? $this->lang->line('yes') : $this->lang->line('no'); ?>
                                        </div>
                                        <div class="online-exam-info">
                                            <span><?php echo $this->lang->line('note'); ?> :</span><?php echo $online_exam->note; ?>
                                        </div>
                                    </div>
                                </div>                                    
                               
                            </div>             
                        </div>
                     </div>    
                </div>
            </div>
        </div>
    </div>
</div>


 <script type="text/javascript">   
 
 

    $('#addquestionsamepage').submit(function(e){
        e.preventDefault();
        var form = $("#addquestionsamepage");
        var url = form.attr('action');
        var formData = new FormData(this);

        console.log(formData);
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            cache:false,
             contentType: false,
             processData: false,
            success: function (data) {
                 
                var data = JSON.parse(data);
                console.log(data); 
                if (data.status == '1') {
                    toastr.success('<?php echo $this->lang->line('question_added_success'); ?>');
                    // $('#addquestionsamepage').trigger("reset");
                    $('.tableajaxquestions').html(data.html)
                    add_question_to_exam(data.question_id)
                }else{
                    toastr.error('<?php echo $this->lang->line('question_added_failed'); ?>');

                }        
                
            },
            error: function(data) {
                toastr.error('<?php echo $this->lang->line('question_added_failed'); ?>');
            }
        });
    });


    function add_question_to_exam(question_id){
        
        var school_id = $('#school_id').val();
        var online_exam_id = $('#online_exam_id').val();
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('onlineexam/add_question_to_exam'); ?>",
            data   : {school_id:school_id, online_exam_id : online_exam_id, question_id:question_id},               
            async  : false,
            success: function(response){                                                   
               if(response == 1){
                   toastr.error('<?php echo $this->lang->line('question_added_failed'); ?>');                                     
               }else if(response == 2){                   
                   toastr.error('<?php echo $this->lang->line('question_already_added'); ?>');
               }else{
                   toastr.success('<?php echo $this->lang->line('question_added_success'); ?>'); 
                   $('.fn_associated_question').append(response); 
               }
            }
        });  
    }


    
    function remove_exam_question(online_exam_id,question_id, obj){
        
        var school_id = $('#school_id').val();
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('onlineexam/remove_question_from_exam'); ?>",
            data   : {school_id:school_id, online_exam_id : online_exam_id, question_id:question_id},               
            async  : false,
            success: function(response){ 
                console.log(response);
               if(response){
                   toastr.success('<?php echo $this->lang->line('delete_success'); ?>'); 
                   $(obj).parents('.question-container').remove(); 
               }else{
                   toastr.error('<?php echo $this->lang->line('delete_failed'); ?>');                   
               }
            }
        });  
    }

 </script>
 
 
 <script type="text/javascript">

    <?php if(isset($filter_school_id) && $filter_school_id != '' && isset($filter_class_id)){ ?>
        get_class_by_school('<?php echo $filter_school_id; ?>', '<?php echo $filter_class_id; ?>');
    <?php } ?>    
    
    function get_class_by_school(school_id, class_id){       
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id : school_id, class_id : class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                     $('#filter_class_id').html(response);                    
               }
            }
        });       
    }
     

    <?php if(isset($filter_class_id) && $filter_class_id != '' && isset($filter_subject_id)){ ?>
        get_subject_by_class('<?php echo $filter_class_id; ?>', '<?php echo $filter_subject_id; ?>');
    <?php } ?>
        
    function get_subject_by_class(class_id, subject_id){       
           
        var school_id = $('#filter_school_id').val();       
        if(!school_id){
            school_id = '<?php echo $school_id; ?>';
        }  
        
        if(!school_id){
           toastr.error('<?php echo $this->lang->line("select_school"); ?>');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_subject_by_class'); ?>",
            data   : {school_id:school_id, class_id : class_id , subject_id : subject_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {                  
                   $('#filter_subject_id').html(response);                  
               }
            }
        });
   }
   

    <?php if(isset($filter_subject_id) && $filter_subject_id != '' && isset($online_exam_id)){ ?>
        get_online_exam_by_subject('<?php echo $filter_subject_id; ?>', '<?php echo $online_exam_id; ?>');
    <?php } ?>
    
    function get_online_exam_by_subject(subject_id, online_exam_id){       
         
        var school_id = $('#filter_school_id').val();      
        if(!school_id){
            school_id = '<?php echo $school_id; ?>';
        }  
        
        if(!school_id){
           toastr.error('<?php echo $this->lang->line("select_school"); ?>');
           return false;
        }
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('onlineexam/get_online_exam_by_subject'); ?>",
            data   : {school_id:school_id, subject_id : subject_id, online_exam_id : online_exam_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   $('#filter_online_exam_id').html(response);
               }
            }
        }); 
   }

   $('.tab_add_question_for_this, .tab_add_question_for_this_close').click(function(){
        $('#tab_add_question_for_this').toggle()
        $('.tab_add_question_for_this_close').toggle()
   })


   
   <?php if(isset($post) && $post['class_id'] != ''){ ?>       
        get_question_type('<?php echo $post['question_type']; ?>', 'add_');
    <?php } ?>
    <?php if(isset($question) && !empty($question)){  ?>
        get_question_type('<?php echo $question->question_type; ?>', 'edit_');
    <?php } ?>   
    function get_question_type(q_type, form){
    
        $('.fn_'+form+'question_option_block').html('');  
        $('#'+form+'total_option').prop('selectedIndex', 0);
        
        if(q_type == 'single' || q_type == 'multi'){
            
            $('.fn_'+form+'total_option').show(); 
            
        }else if(q_type == 'boolean'){
            
            $('.fn_'+form+'total_option').hide(); 
            if(form = 'add_'){
                get_question_option(2, '', form);   
            }
            
        }else if(q_type == 'blank'){
            
            $('.fn_'+form+'total_option').hide(); 
            if(form = 'add_'){
                get_question_option(1, '', form);   
            }
            
        }else{
            $('.fn_'+form+'total_option').hide();            
        }
    }
    
    
    
    <?php if(isset($post) && $post['class_id'] != ''){ ?>       
        get_question_option('<?php echo $post['total_option']; ?>','', 'add_');
    <?php } ?>
    <?php if(isset($question) && !empty($question)){  ?>
        get_question_option('<?php echo $question->total_option; ?>', '<?php echo $question->id; ?>', 'edit_');
    <?php } ?> 
    
    
    function get_question_option(total_option, question_id, form){
       
       var school_id = $('#'+form+'school_id').val();       
             
        if(!school_id){
           toastr.error('<?php echo $this->lang->line("select_school"); ?>');
           return false;
        }
       var question_type = $('#'+form+'question_type').val();
       
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('onlineexam/question/get_question_option'); ?>",
            data   : {school_id:school_id, question_id : question_id, question_type : question_type, total_option : total_option},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   $('#'+form+'total_option').prop('selectedIndex', total_option);
                   $('.fn_'+form+'question_option_block').html(response);                  
               }
            }
        });   
    }
    
    
    function set_single_radio(obj){
        $('.fn_single_hidden').val(0);
        $(obj).siblings('.fn_single_hidden').val(1);
    };
    
    function set_single_checkbox(obj){
        if ($(obj).is(':checked')) {
            $(obj).siblings('.fn_single_hidden').val(1);
        }else{
            $(obj).siblings('.fn_single_hidden').val(0);
        }
    };

</script>

 <!-- datatable with buttons -->
 <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable-responsive').DataTable( {
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
    
</script>
 