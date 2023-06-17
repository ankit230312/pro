<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-mouse-pointer"></i><small> <?php echo $this->lang->line('manage_exam_result'); ?> </small></h3>
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
                    
                    <ul  class="nav nav-tabs nav-tab-find bordered">
                   
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="<?php echo site_url('onlineexam/takeexam/index'); ?>"  aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                                    
                        <li class="li-class-list">
                            
                            <?php $guardian_class_data = get_guardian_access_data('class'); ?>
                            <?php $teacher_access_data = get_teacher_access_data(); ?>  

                            <?php echo form_open(site_url('onlineexam/takeexam/result'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
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
                                    <select  class="form-control col-md-7 col-xs-12 gsms-nice-select_" name="subject_id" id="filter_subject_id" style="width: auto;">                                
                                        <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    </select>  
                                   <?php if($this->session->userdata('role_id') != SUPER_ADMIN){ ?>  
                                         <input type="hidden" name="school_id" id="filter_school_id" value="<?php echo $filter_school_id; ?>" />
                                   <?php } ?>
                                  <input type="submit" name="find" value="<?php echo $this->lang->line('find'); ?>"  class="btn btn-success btn-sm"/>
                            <?php echo form_close(); ?>
                                  
                        </li>
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_exam_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>   
                                        <th><?php echo $this->lang->line('student_name'); ?></th>
                                        <th><?php echo $this->lang->line('exam_title'); ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('section'); ?></th>
                                        <th><?php echo $this->lang->line('subject'); ?></th>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>  
                                    
                                    <?php $count = 1; if(isset($exam_results) && !empty($exam_results)){ ?>
                                        <?php foreach($exam_results as $obj){ 
                                            // print_r($obj);
                                            // die;
                                            
                                            ?>                                        
                                        <tr>
                                            <td><?php echo $count++; ?></td>                                           
                                            <td><?php echo $obj->student_name; ?></td>
                                            <td><?php echo get_exam_detail_by_id(get_exam_online_exams_detail_by_id($obj->exam_id)->title)->title; ?></td>
                                            <td><?php echo $obj->class_name; ?></td>
                                            <td><?php echo $obj->section; ?></td>
                                            <td><?php echo $obj->subject; ?></td>
                                            <td><?php echo $obj->result_status == 'passed' ? $this->lang->line('passed') : $this->lang->line('failed'); ?></td>
                                            <td><?php echo $obj->created_at; ?></td>
                                            <td>
                                                <?php if(has_permission(VIEW, 'onlineexam', 'takeexam')){ ?>
                                                    <a  onclick="get_result_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-result-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                <?php } ?> 

                                                <?php 
                                                if($this->session->userdata('role_id') != STUDENT ){
                                                if(has_permission(VIEW, 'onlineexam', 'takeexam')){ ?>
                                                    <a  onclick="get_exam_result_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-result-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> Test Paper </a>
                                                <?php } } ?> 
                                                
                                                <?php 
                                                if($this->session->userdata('role_id') != STUDENT ){
                                                    if(has_permission(VIEW, 'onlineexam', 'takeexam')){ ?>
                                                        <span 
                                                        data-id="<?php echo $obj->id; ?>" 
                                                        data-school="<?php echo $obj->school_id; ?>" 
                                                        data-student="<?php echo $obj->student_id; ?>" 
                                                        data-exam="<?php echo $obj->exam_id; ?>" 
                                                        data-subject="<?php echo $obj->subject_id; ?>" 
                                                        data-academic="<?php echo $obj->academic_year_id; ?>" 
                                                        data-class="<?php echo $obj->class_id; ?>" 
                                                        data-status="<?php echo $obj->approve_status; ?>" 
                                                        class="approvedexams<?php echo $obj->id; ?> changeall<?php echo $obj->school_id; ?><?php echo $obj->student_id; ?><?php echo $obj->subject_id; ?>  approvedexams <?php if($obj->approve_status == '1'){ ?> btn btn-success btn-xs <?php }else{ ?>btn btn-danger btn-xs <?php } ?>"> <?php if($obj->approve_status == '1'){ ?> Approved <?php }else{ ?> Pending <?php } ?> </span>
                                                    
                                                    <?php } 
                                                    } ?>


                                                <?php if(has_permission(VIEW, 'onlineexam', 'takeexam')){ ?>
                                                    <a  onclick="get_result_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-result-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Edit </a>
                                                <?php } ?>  
                                                <?php if($this->session->userdata('role_id') != STUDENT ){ ?>
                                                <?php if(has_permission(VIEW, 'onlineexam', 'takeexam')){ ?>
                                                    <a  onclick="get_images_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-result-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> Images</a>
                                                <?php } } ?> 


                                            </td>
                                        </tr>
                                        
                                        <?php } ?>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                            </div>
                        </div>                                               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-result-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
        </div>
        <div class="modal-body fn_result_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_result_modal(result_id){
         
        $('.fn_result_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
            $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('onlineexam/takeexam/get_single_result'); ?>",
            data   : {result_id : result_id},  
            success: function(response){                                                   
                if(response)
                {
                    $('.fn_result_data').html(response);
                }
            }
        });
    }
    function get_images_modal(result_id){
         
        $('.fn_result_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
            $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('onlineexam/takeexam/get_single_images'); ?>",
            data   : {result_id : result_id},  
            success: function(response){                                                   
                if(response)
                {
                    $('.fn_result_data').html(response);
                }
            }
        });
    }


    function get_exam_result_modal(result_id){
         
        $('.fn_result_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('onlineexam/takeexam/get_exam_result_modal'); ?>",
          data   : {result_id : result_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_result_data').html(response);
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


   $('.approvedexams').click(function(){

  
    var id =  $(this).data('id');
    var school =  $(this).data('school');
    var classid =  $(this).data("class");
    var student =  $(this).data('student');
    var exam =  $(this).data('exam');
    var subject =  $(this).data('subject');
    var academic =  $(this).data('academic');
    var status =  $(this).data('status');


    
    $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('onlineexam/takeexam/updateexamstatus'); ?>",
            data   : {id:id, school : school , class : classid, student:student,subject : subject, exam : exam , academic : academic,status:status},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                if (status == 0) {                    
                    $('.changeall'+school+student+subject).addClass('btn-success')
                    $('.changeall'+school+student+subject).removeClass('btn-danger')

                    $('.changeall'+school+student+subject).text('Pending')

                    $('.approvedexams'+id).text('Approved')
                    $('.approvedexams'+id).addClass('btn-success')
                    $('.approvedexams'+id).removeClass('btn-danger')

                    $('.approvedexams'+id).data('status', 1)
                    
                }else{
                    $('.changeall'+school+student+subject).text('Pending')

                    $('.changeall'+school+student+subject).addClass('btn-success')
                    $('.changeall'+school+student+subject).removeClass('btn-danger')
                    $('.approvedexams'+id).data('status', 0)
                    $('.approvedexams'+id).text('Pending')
                    $('.approvedexams'+id).removeClass('btn-success')

                    $('.approvedexams'+id).addClass('btn-danger')

                }


               }
            }
        });

   });
 
</script>


<script>
    $(function() {

        $('body').on('click','.btnudpatss',  function(e) {  
            e.preventDefault();
            var formdata = $('#update_exam_question_attempt1233').serialize();
            var url = "<?php echo base_url(); ?>onlineexam/takeexam/update_exam_question_attempt";
            $.ajax({
                type: 'post',
                url:  url,
                data: formdata,
                success: function() {
                    alert('Updated');
                }
            });

        });


        // $('body').on('submit','#update_exam_question_attempt1233',  function(e) {
        //     e.preventDefault();
        //     alert('submit');
        //     var url = "<?php echo base_url(); ?>onlineexam/takeexam/update_exam_question_attempt";
        //     $.ajax({
        //         type: 'post',
        //         url:  url,
        //         data: $('#update_exam_question_attempt1233').serialize(),
        //         success: function() {
        //             alert('Updated');
        //         }
        //     });
        // });

    });
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
<style type="text/css">
    .nav-tabs>li {
        margin-bottom: -6px;
    }
</style>
 