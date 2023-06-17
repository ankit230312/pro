<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa fa-calendar-check-o"></i><small> <?php echo $this->lang->line('manage_generateticket'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_generateticket_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if ($this->session->userdata('role_id') != SUPER_ADMIN && $this->session->userdata('role_id') != STUDENT && $this->session->userdata('role_id') != TEACHER) {?>
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('generateticket/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php }else{ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_generateticket"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?></a> </li>                          
                             <?php } ?>
                           
                        <?php } ?>
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_generateticket"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?></a> </li>                          
                        <?php } ?>  
                            
                        <li class="li-class-list">
                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>                                 
                            <select  class="form-control col-md-7 col-xs-12" onchange="get_generateticket_by_school(this.value);">
                                    <option value="<?php echo site_url('generateticket/index'); ?>">--<?php echo $this->lang->line('select_school'); ?>--</option> 
                                <?php foreach($schools as $obj ){ ?>
                                    <option value="<?php echo site_url('generateticket/index/'.$obj->id); ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                <?php } ?>   
                            </select>
                        <?php } ?>  
                        </li>      
                            
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_generateticket_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                         <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                            <th><?php echo $this->lang->line('school'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                        <?php } ?>
                                        <th><?php echo $this->lang->line('title'); ?></th>
                                        <th><?php echo $this->lang->line('note'); ?></th>
                                        <th>Status</th>
                                        <th><?php echo $this->lang->line('image'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php

                                   
                                    
                                    $count = 1; if(isset($generatetickets) && !empty($generatetickets)){ ?>
                                        <?php foreach($generatetickets as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                <td><?php echo $obj->school_name; ?></td>
                                                <td><?php echo $obj->username; ?></td>
                                            <?php } ?>

                                            <td><?php echo $obj->title; ?></td>
                                            <td><?php echo $obj->note; ?></td>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN ){ ?>
                                            <td>
                                                <select class="form-control col-md-7 col-xs-12 status-type gsms-nice-select_" name="approved_status" id="approved_status" onchange="update_approved_status(<?php echo $obj->generate_lis_id ?>, this.value);">
                                                    <option <?php if($obj->approved_status == 'Pending'){ echo "selected"; } ?> value="Pending">Pending</option>
                                                    <option <?php if($obj->approved_status == 'Approved'){ echo "selected"; } ?>  value="Approved">Approved</option>                                                   
                                                </select>        
                                            </td>
                                            <?php }else{ ?>
                                            <td>
                                                <?php echo $obj->approved_status; ?>
                                            </td>

                                            <?php } ?>

                                            <td>
                                                <?php  if($obj->image != ''){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/generateticket/<?php echo $obj->image; ?>" alt="" width="70" /> 
                                                <?php } ?>
                                            </td>
                                            <td>
                                            <?php if($obj->user_id == logged_in_user_id()){ ?>
                                                    <a href="<?php echo site_url('generateticket/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>

                                                <?php if($this->session->userdata('role_id') == SUPER_ADMIN || $obj->user_id == logged_in_user_id()){ ?>
                                                    <a href="<?php echo site_url('generateticket/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_generateticket">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('generateticket/generateticket/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_form'); ?> 
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($post['title']) ?  $post['title'] : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>

                               <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('image'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="image"  id="image" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('dimension'); ?>:- Max-W: 750px, Max-H: 500px</div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('image'); ?></div>
                                    </div>
                               </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note" required  id="add_note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($post['note']) ?  $post['note'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                
                               
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('generateticket/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_generateticket">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('generateticket/generateticket/edit/'.$generateticket->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_edit_form'); ?>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($generateticket->title) ?  $generateticket->title : ''; ?>" placeholder="<?php echo $this->lang->line('title'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>
                                
                                
                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('image'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $generateticket->image; ?>" />
                                        <?php if($generateticket->image){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/generateticket/<?php echo $generateticket->image; ?>" alt="" width="70" /><br/><br/>
                                        <?php } ?>
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="image"  id="image" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('dimension'); ?>:- Max-W: 750px, Max-H: 500px</div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('image'); ?></div>
                                    </div>
                                </div>
                                                         
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note" required  id="edit_note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($generateticket->note) ?  $generateticket->note : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                             
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($generateticket) ? $generateticket->id : $id; ?>" name="id" />
                                        <a href="<?php echo site_url('generateticket/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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



<div class="modal fade bs-generateticket-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
        </div>
        <div class="modal-body fn_generateticket_data">            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
        
    <?php echo $id = $this->uri->segment(4) ?>
    <?php if($id){ ?>   
        $(document).ready(function(){
          // $(".bs-generateticket-modal-lg").modal();
        });
         get_generateticket_modal('<?php echo $id; ?>');
    <?php } ?>
    
    function get_generateticket_modal(generateticket_id){
         
        $('.fn_generateticket_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('generateticket/get_single_generateticket'); ?>",
          data   : {generateticket_id : generateticket_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_generateticket_data').html(response);
             }
          }
       });
    }
</script>


<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
  $('#add_generateticket_from').datepicker();
  $('#edit_generateticket_from').datepicker();
  
  $('#add_generateticket_to').datepicker();
  $('#edit_generateticket_to').datepicker();


  
  $('.fn_school_id ').on('change', function(){
        var school_id = $(this).val();
        $.ajax({       
                type   : "POST",
                url    : "<?php echo site_url('ajax/get_roles_by_school'); ?>",
                data   : { school_id:school_id},               
                async  : false,
                success: function(response){                                                   
                if(response)
                {  
                    $('#add_role_id').html(response); 
                    
                }
                }
            });
    });


    function update_approved_status(id, approved_status){        
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('generateticket/update_approved_status'); ?>",
            data   : { id : id, approved_status : approved_status},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                   toastr.success('Data updated successfully');
                  // location.reload();
                   return false;                    
               }
            }
        });
    }
  
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
    
    $("#add").validate();     
    $("#edit").validate();  
    
    function get_generateticket_by_school(url){          
        if(url){
            window.location.href = url; 
        }
    } 
    
  </script> 