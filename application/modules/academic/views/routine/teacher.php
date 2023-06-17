    <style>
        .teachperrr{
            width: 16%;
    margin: 14px 15px;
        }
        .teachperrr-head{
            width: 100%;
    text-align: center;
    position: relative;
        }
        .teachperrr-butto{
            width: 100%;
    padding: 6px !important;
    padding-top: 36px !important;
        }
        .roomss{
            margin:0;
        }
        .teachperrr-head p {
    background: #0ab5ef;
    color: #fff;
    padding: 6px 13px;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
    position: absolute;
    z-index: 99;
    top: -10px;
    left: 59px;
}
    </style>
    
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title no-print">
                <h3 class="head-title"><i class="fa fa-clock-o"></i><small>
                        <?php echo $this->lang->line('manage_routine'); ?>
                    </small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link no-print">
                <?php $this->load->view('quick-link');?>
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">

                    <ul class="nav nav-tabs bordered  no-print">
                        <li class="<?php if (isset($list)) {echo 'active';}?>"><a href="#tab_routine_list" role="tab"
                                data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i>
                                <?php echo $this->lang->line('list'); ?>
                            </a> </li>


                        <?php if (has_permission(ADD, 'academic', 'routine')) {?>
                        <li class="<?php if (isset($add)) {echo 'active';}?>"><a
                                href="<?php echo site_url('academic/routine/add'); ?>" aria-expanded="false"><i
                                    class="fa fa-plus-square-o"></i>
                                <?php echo $this->lang->line('add'); ?>
                            </a> </li>

                        <?php }?>
                     



                        <li class="li-class-list">
                            <?php if ($this->session->userdata('role_id') != SUPER_ADMIN) {?>
                            <select class="form-control col-md-7 col-xs-12" onchange="get_subject_by_class(this.value);">
                                <?php if ($this->session->userdata('role_id') != STUDENT) {?>
                                <option value="<?php echo site_url('academic/routine/index'); ?>">
                                    --
                                    <?php echo $this->lang->line('select'); ?>--
                                </option>
                                <?php }?>

                                <?php $guardian_class_data = get_guardian_access_data('class');?>
                                <?php foreach ($class_list as $obj) {?>
                                <?php if ($this->session->userdata('role_id') == STUDENT) {?>
                                <?php if ($obj->id != $this->session->userdata('class_id')) {continue;}?>
                                <option value="<?php echo site_url('academic/routine/index/' . $obj->id); ?>" <?php if
                                    (isset($class_id) && $class_id==$obj->id) {echo 'selected="selected"';}?>>
                                    <?php echo $obj->name; ?>
                                </option>
                                <?php } elseif ($this->session->userdata('role_id') == GUARDIAN) {?>
                                <?php if (!in_array($obj->id, $guardian_class_data)) {continue;}?>
                                <option value="<?php echo site_url('academic/routine/index/' . $obj->id); ?>" <?php if
                                    (isset($class_id) && $class_id==$obj->id) {echo 'selected="selected"';}?>>
                                    <?php echo $obj->name; ?>
                                </option>
                                <?php } else {?>
                                <option value="<?php echo site_url('academic/routine/index/' . $obj->id); ?>" <?php if
                                    (isset($class_id) && $class_id==$obj->id) {echo 'selected="selected"';}?>>
                                    <?php echo $obj->name; ?>
                                </option>
                                <?php }?>
                                <?php }?>
                            </select>
                            <?php } else {?>

                            <?php echo form_open(site_url('academic/routine/index'), array('name' => 'filter', 'id' => 'filter', 'class' => 'form-horizontal form-label-left'), ''); ?>
                            <select class="form-control col-md-7 col-xs-12" style="width:auto;" name="school_id"
                                onchange="get_class_by_school(this.value, '');">
                                <option value="">--
                                    <?php echo $this->lang->line('select_school'); ?>--
                                </option>
                                <?php foreach ($schools as $obj) {?>
                                <option value="<?php echo $obj->id; ?>" <?php if (isset($filter_school_id) &&
                                    $filter_school_id==$obj->id) {echo 'selected="selected"';}?>>
                                    <?php echo $obj->school_name; ?>
                                </option>
                                <?php }?>
                            </select>
                            <select class="form-control col-md-7 col-xs-12" id="filter_class_id" name="class_id"
                                style="width:auto;" onchange="this.form.submit();">
                                <option value="">--
                                    <?php echo $this->lang->line('class'); ?>--
                                </option>
                                <?php if (isset($class_list) && !empty($class_list)) {?>
                                <?php foreach ($class_list as $obj) {?>
                                <option value="<?php echo $obj->id; ?>">
                                    <?php echo $obj->name; ?>
                                </option>
                                <?php }?>
                                <?php }?>
                            </select>
                            <?php echo form_close(); ?>

                            <?php }?>
                        </li>
                    </ul>
                    <br />

                    <?php if (isset($sections) && !empty($sections)) {?>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6  col-sm-offset-3 col-xs-offset-3 layout-box">

                                <div><img class="logo-identifier"
                                        src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt=""
                                        width="70" /></div>
                                <h4>
                                    <?php echo $school->school_name; ?>
                                </h4>
                                <p>
                                    <?php echo $school->address; ?>
                                </p>
                                <h4>
                                    <?php echo $this->lang->line('class_routine'); ?>
                                </h4>
                                <h4>
                                    <?php echo $this->lang->line('class'); ?> -
                                <?php echo $single_class->name; ?>
                                </h4>
                                

                             
                            </div>
                        </div>
                    </div>
                    <?php }?>


                    <div class="tab-content">
                        <div class="tab-pane fade in <?php if (isset($list)) {echo 'active';}?>" id="tab_routine_list">
                            <div class="x_content">
                                <div class="" data-example-id="togglable-tabs">
                                    <?php $guardian_section_data = get_guardian_access_data('section');?>
                                    <?php if (isset($sections) && !empty($sections)) {?>
                                    <ul class="nav nav-tabs bordered sub-tabs no-print sagasf__6sy7gs">
                                        <?php foreach ($sections as $key => $obj) {?>

                                        <li class="<?php if ($key == 0) { echo 'active'; }?>"><a
                                                href="#tab_section_<?php echo $obj->id; ?>" role="tab" data-toggle="tab"
                                                aria-expanded="true"><i class="fa fa-list"> </i>
                                                <?php echo $this->lang->line('section'); ?> :
                                                <?php echo $obj->name; ?>
                                            </a> </li>
                                        <?php }?>
                                    </ul>
                                    <?php }?>

                                    <div class="tab-content">

                                        <?php if (isset($sections) && !empty($sections)) {?>
                                        <?php $active = '';
                                            $other = false;
                                            $count = 0;
                                            
                                            foreach ($sections as $key => $obj) { ?>

                                        <div class="tab-pane fade in <?php if ($key == 0) { echo 'active'; }?>"
                                            id="tab_section_<?php echo $obj->id; ?>">
                                            <div class="x_content">
                                                <?php $periods = get_period_routines($obj->class_id, $obj->id);
                                                  
                                                
                                                ?>


                                                <table id="datatable-responsive uiwe___34er4d"
                                                    class="table table-striped table-bordered dt-responsive nowrap"
                                                    cellspacing="0" width="100%">
                                                    <tbody>


                                                        <tr>
                                                            <!-- <th>
                                                                Periods
                                                            </th> -->
                                                            <?php foreach ($periods as $periodvaluekey => $periodvalue) {?>
                                                            <!-- <th>

                                                                <div class="btn-group new__2324ffh7">
                                                                    <span class="btn btn-default ">
                                                                        <?php echo $periodvalue->period; ?>
                                                                    </span>
                                                                </div>





                                                            </th> -->
                                                            <?php }?>
                                                        </tr>

                                                        <input type="hidden" name="post_school_id" id="post_school_id"
                                                            value="<?php if (isset($filter_school_id)) {echo $filter_school_id;}?>">



                                                        <?php $days = get_week_days();?>

                                                        <?php foreach ($days as $daykey => $day) {?>
                                                        <tr>
                                                            <td width="100">
                                                                <?php echo $day; ?>
                                                            </td>

                                                            <td>

                                                                <?php
                                                               
                                                                
                                                                $routines = get_routines_by_day($daykey, $obj->class_id, $obj->id);
                                                                // $routines = [];
                                                               
                                                                ?>



                                                                <?php
                                                                if (count($routines) > 0) {
                                                                 
                                                                foreach ($routines as $rokeys => $ro) {
                                                                $filter_school_id1 = '22000';
                                                                if (isset($filter_school_id)) {
                                                                    $filter_school_id1 = $filter_school_id;
                                                                }

                                                                $subjects = $this->db->get_where('subjects', ['school_id' => $filter_school_id1])->result();
                                                                $teachers = $this->db->get_where('teachers', ['school_id' => $filter_school_id1])->result();
                                                                $rooms = $this->db->get_where('rooms', ['school_id' => $filter_school_id1])->result();
                                                                
                                                                ?>
                                                                <div class="btn-group periodssandalldtai periodssandalldtai teachperrr <?php echo $rokeys; ?>">
                                                                       
                                                                  
                                                                        <div class="periodss periodss teachperrr-head <?php echo $rokeys; ?>">
                                                                            <p>
                                                                                <?php echo  $ro->period; ?>
                                                                            </p>
                                                                        </div>
                                                                    <button class="btn btn-default otherdetailshere otherdetailshere teachperrr-butto <?php echo $rokeys; ?>   routine-text">
                                                                        <p>
                                                                            <?php echo $ro->start_time . ' - ' . $ro->end_time; ?>
                                                                        </p>
                                                                        <?php foreach ($subjects as $keysubject => $subject) { ?>
                                                                        <?php if ($ro->subject_id == $subject->id) { ?>
                                                                        <p>
                                                                            <?php echo  $subject->name; ?>
                                                                        </p>


                                                                        <?php  } ?>


                                                                        <?php }?>
                                                                        
                                                                        <br />


                                                                        <br />
                                                                        <?php if ($ro->class_type == 'offline') { ?>
                                                                        <p class="roomss">Room Number - <?php echo  $ro->room_no ?></p>


                                                                        <?php } else{ ?>
                                                                            <a class="btn btn-success btn-small"  target="_blank" href="<?php echo  $ro->online_class_link; ?>">Start Class </a>

                                                                        <?php  } ?>
                                                                    </button>


                                                                </div>
                                                                <?php } }else{ ?>

                                                                <div class="btn-group">

                                                                    <button class="btn btn-default  routine-text">
                                                                        ---
                                                                    </button>


                                                                </div>

                                                                <?php } ?>

                                                            </td>

                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>





                                                
                                            </div>
                                        </div>
                                        <?php }?>
                                        <?php } else {?>
                                        <div class="text-center">
                                            <?php echo $this->lang->line('no_data_found'); ?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="row no-print">
                                <div class="col-xs-12 text-right">
                                    <button class="btn btn-default " onclick="window.print();"><i
                                            class="fa fa-print"></i>
                                        <?php echo $this->lang->line('print'); ?>
                                    </button>
                                </div>
                            </div>

                        </div>



                        <div class="tab-pane fade in <?php if (isset($add)) {echo 'active';}?>" id="tab_add_routine">
                            <div class="x_content">
                                <?php echo form_open(site_url('academic/routine/add'), array('name' => 'add', 'id' => 'add', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <!-- <div class="col-md-12">
                                    <a href="javascript:void(0);" class="add_button btn btn-sm btn-info"
                                        title="Add field">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div> -->
                                <?php $this->load->view('layout/school_list_form');?>




                                <div class="item form-group ">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_duration">
                                        <?php echo 'Duration Name'; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="name_duration"
                                            id="name_duration"
                                            value="<?php echo isset($post['name_duration']) ? $post['name_duration'] : ''; ?>"
                                            placeholder="<?php echo $this->lang->line('name_duration'); ?>" type="text"
                                            autocomplete="off">
                                        <div class="help-block">
                                            <?php echo form_error('name_duration'); ?>
                                        </div>
                                        <div class="col-md-12 m-auto">
                                            <div class="add__asdas">
                                                <a href="javascript:void(0);" class="add_button btn btn-sm btn-info"
                                                    title="Add field">
                                                    <!-- <i class="fa fa-plus"></i> -->
                                                    Add period
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <div class="col-sm-12">
                                    <div class="field_wrapper">

                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('academic/routine/index/' . $class_id); ?>"
                                            class="btn btn-primary">
                                            <?php echo $this->lang->line('cancel'); ?>
                                        </a>
                                        <button id="send" type="submit" class="btn btn-success">
                                            <?php echo $this->lang->line('submit'); ?>
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('add_routine_instruction'); ?></div> -->
                                </div>
                            </div>
                        </div>

                        <?php if (isset($edit)) {?>
                        <div class="tab-pane fade in <?php if (isset($edit)) {echo 'active';}?>" id="tab_edit_routine">
                            <div class="x_content">
                                <?php echo form_open(site_url('academic/routine/edit'), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>
                                <!-- <div class="col-md-12">
                                    <a href="javascript:void(0);" class="edit_button btn btn-sm btn-info"
                                        title="edit field">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div> -->



                                <div class="classchooledit">
                                    <?php $this->load->view('layout/school_list_form');?>
                                </div>

                                <?php $periods = get_period_routines_by_school($mainschool_id); ?>

                                <?php if ($mainschool_id) {?>
                                <div class="item form-group ">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_duration">
                                        <?php echo 'Duration Name'; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="name_duration"
                                            id="name_duration" value="<?php echo $periods[0]->name_duration; ?>"
                                            placeholder="<?php echo $this->lang->line('name_duration'); ?>" type="text"
                                            autocomplete="off">
                                        <div class="help-block">
                                            <?php echo form_error('name_duration'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>



                                <div class="col-sm-9">
                                    <div class="field_wrapper_edit">
                                        <?php foreach ($periods as $key => $value) { ?>

                                        <div>
                                            <div class="item form-group ">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="period">
                                                    <?php echo 'Period'; ?> <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input class="form-control col-md-7 col-xs-12 period"
                                                        name="period[]" id="period"
                                                        value="<?php echo $value->period; ?>"
                                                        placeholder="<?php echo $this->lang->line('period'); ?>"
                                                        required="required" type="text" autocomplete="off">
                                                    <div class="help-block">
                                                        <?php echo form_error('period'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <?php echo $this->lang->line('start_time'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input class="form-control col-md-7 col-xs-12 add_start_time"
                                                        name="start_time[]" id="add_start_time"
                                                        value="<?php echo $value->start_time; ?>"
                                                        placeholder="<?php echo $this->lang->line('start_time'); ?>"
                                                        required="required" type="text" autocomplete="off">
                                                    <div class="help-block">
                                                        <?php echo form_error('start_time'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    <?php echo $this->lang->line('end_time'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input class="form-control col-md-7 col-xs-12 add_end_time"
                                                        name="end_time[]" id="add_end_time"
                                                        value="<?php echo $value->end_time; ?>"
                                                        placeholder="<?php echo $this->lang->line('end_time'); ?>"
                                                        required="required" type="text" autocomplete="off">
                                                    <div class="help-block">
                                                        <?php echo form_error('end_time'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-1"><a href="javascript:void(0);"
                                                    class="remove_button btn btn-sm btn-danger"><i
                                                        class="fa fa-minus"></i></a></div> -->
                                        </div>
                                        <?php 
                                  }

                                  ?>
                                    </div>
                                </div>



                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('academic/routine/index/' . $class_id); ?>"
                                            class="btn btn-primary">
                                            <?php echo $this->lang->line('cancel'); ?>
                                        </a>
                                        <button id="send" type="submit" class="btn btn-success">
                                            <?php echo $this->lang->line('submit'); ?>
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                </div>
                            </div>
                        </div>
                        <?php }?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .btn-group .btn {
        padding: 2px 6px;
    }
</style>
<link href="<?php echo VENDOR_URL; ?>timepicker/timepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>timepicker/timepicker.js"></script>


<script type="text/javascript">
    var edit = false; <?php
    if (isset($edit)) {
        ?>
            edit = true; 
    <?php  } ?>

        $("document").ready(function () {
        <?php 
        if (isset($routine) && !empty($routine)) {
            ?>
            if (!edit) {
                    $("#add_school_id").trigger('change');

                } <?php
        } ?>
    });


    if (edit) {
        $('.fn_school_id').on('change', function () {
            var school_id = $(this).val();
            var url = "<?php echo site_url('academic/routine/edit/'); ?>" + school_id;
            window.location.href = url;
        });
    }

    $('.fn_school_id').on('change', function () {

        var school_id = $(this).val();
        var class_id = '';
        var teacher_id = '';

        <?php 
        if (isset($routine) && !empty($routine)) {  ?>
            class_id = '<?php echo $routine->class_id; ?>';
            teacher_id = '<?php echo $routine->teacher_id; ?>'; <?php
        } ?>

        if (!school_id) {
            //    toastr.error('<?php echo $this->lang->line("select_school"); ?>');
            //    return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data: {
                school_id: school_id,
                class_id: class_id
            },
            async: false,
            success: function (response) {
                if (response) {
                    if (edit) {
                        $('#edit_class_id').html(response);
                    } else {
                        $('#add_class_id').html(response);
                    }

                    get_teacher_by_school(school_id, teacher_id);
                }
            }
        });
    });


    function get_teacher_by_school(school_id, teacher_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ajax/get_teacher_by_school'); ?>",
            data: {
                school_id: school_id,
                teacher_id: teacher_id
            },
            async: false,
            success: function (response) {
                if (response) {
                    if (edit) {
                        $('#edit_teacher_id').html(response);
                    } else {
                        $('#add_teacher_id').html(response);
                    }
                }
            }
        });
    }


    $('.common_change').change(function () {


        var type = $(this).find(':selected').data('type');
        var update_id = $(this).find(':selected').data('id');
        var vals = $(this).find(':selected').val();

        // var type = $(this).data('type');
        // var update_id = $(this).data('id');
        // var vals = $(this).val();


        if (type == 'class_type') {
            if (vals == 'offline') {
                $('.roomselect' + update_id).css('display', 'block')
                $('.linkselect' + update_id).css('display', 'none')
            } else {
                $('.roomselect' + update_id).css('display', 'none')
                $('.linkselect' + update_id).css('display', 'block')
            }
        }



        change_teacher_subject_rooms(type, vals, update_id);
    })



    $('.common_changeroom_change').change(function () {


        // var type = $(this).find(':selected').data('type');
        // var update_id = $(this).find(':selected').data('id');
        // var vals = $(this).find(':selected').val();

        var type = $(this).data('type');
        var update_id = $(this).data('id');
        var vals = $(this).val();


        // if(type == 'class_type'){
        //     if(vals == 'offline'){
        //         $('.roomselect'+update_id).css('display', 'block')
        //         $('.linkselect'+update_id).css('display', 'none')
        //     }else{
        //         $('.roomselect'+update_id).css('display', 'none')
        //         $('.linkselect'+update_id).css('display', 'block')
        //     }
        // }



        change_teacher_subject_rooms(type, vals, update_id);
    })

    $('.common_change_input').change(function () {
        var type = $(this).data('type');
        var update_id = $(this).data('id');
        var vals = $(this).val();

        change_teacher_subject_rooms(type, vals, update_id);
    })


    function change_teacher_subject_rooms(type, vals, update_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('academic/routine/change_teacher_subject_rooms'); ?>",
            data: {
                type: type,
                vals: vals,
                update_id: update_id
            },
            async: false,
            success: function (response) {
                if (response) {
                    $('.messgess').val('Update Successfully')
                }
            }
        });
    }
</script>



<script type="text/javascript">
    $('.add_start_time').timepicker();
    $('.add_end_time').timepicker();
    $('.edit_start_time').timepicker();
    $('.edit_end_time').timepicker();


        <?php if (isset($edit)) {?>
        get_section_subject_by_class('<?php echo $routine->class_id; ?>', '<?php echo $routine->section_id; ?>', '<?php echo $routine->subject_id; ?>');
        <?php }?>


        function get_section_subject_by_class(class_id, section_id, subject_id) {

            if (edit) {
                var school_id = $('#edit_school_id').val();
            } else {
                var school_id = $('#add_school_id').val();
            }
            //    if(!school_id){
            //        toastr.error('<?php echo $this->lang->line("select_school"); ?>');
            //        return false;
            //     }

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_section_by_class'); ?>",
                data: { school_id: school_id, class_id: class_id, section_id: section_id },
                async: false,
                success: function (response) {
                    if (response) {
                        if (edit) {
                            $('#edit_section_id').html(response);
                        } else {
                            $('#add_section_id').html(response);
                        }
                    }
                }
            });

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_subject_by_class'); ?>",
                data: { school_id: school_id, class_id: class_id, subject_id: subject_id },
                async: false,
                success: function (response) {
                    if (response) {
                        if (edit) {
                            $('#edit_subject_id').html(response);
                        } else {
                            $('#add_subject_id').html(response);
                        }
                    }
                }
            });

        }

    function get_subject_by_class(url) {
        if (url) {
            window.location.href = url;
        }
    }
    $("#add").validate();
    $("#edit").validate();


         <?php if (isset($filter_class_id)) {?>
        get_class_by_school('<?php echo $filter_school_id; ?>', '<?php echo $filter_class_id; ?>');
         <?php }?>

        function get_class_by_school(school_id, class_id) {


            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/get_class_by_school'); ?>",
                data: { school_id: school_id, class_id: class_id },
                async: false,
                success: function (response) {
                    if (response) {
                        $('#filter_class_id').html(response);
                    }
                }
            });
        }






    $(document).ready(function () {
        var maxField = 200; //Input fields increment limitation
        var addButton = $('.edit_button'); //Add button selector
        var wrapper = $('.field_wrapper_edit'); //Input field wrapper
        var fieldHTML =
            '<div>' +
            '<div class="item form-group ">' +
            '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period"> Period <span class="required">*</span>' +
            '</label>' +
            '<div class="col-md-6 col-sm-6 col-xs-12">' +
            '<input  class="form-control col-md-7 col-xs-12 period"  name="period[]"  id="period" value="" placeholder="<?php echo $this->lang->line('period'); ?>" required="required" type="text" autocomplete="off">' +
                '<div class="help-block"><?php echo form_error('period '); ?></div>' +
                    '</div>' +
                    '</div> ' +
                    '<div class="item form-group">' +
                    '<label class="control-label col-md-3 col-sm-3 col-xs-12"> start time<span class="required">*</span>' +
                    '</label>' +
                    '<div class="col-md-6 col-sm-6 col-xs-12">' +
                    '<input  class="form-control col-md-7 col-xs-12 add_start_time"  name="start_time[]"  id="add_start_time" value="" placeholder="<?php echo $this->lang->line('start_time '); ?>" required="required" type="text" autocomplete="off">' +
                        '<div class="help-block"><?php echo form_error('start_time '); ?></div>' +
                            '</div>' +
                            '</div> ' +
                            '<div class="item form-group">' +
                            '<label class="control-label col-md-3 col-sm-3 col-xs-12"> End Time<span class="required">*</span>' +
                            '</label>' +
                            '<div class="col-md-6 col-sm-6 col-xs-12">' +
                            '<input  class="form-control col-md-7 col-xs-12 add_end_time"  name="end_time[]"  id="add_end_time" value="" placeholder="<?php echo $this->lang->line('end_time '); ?>" required="required" type="text" autocomplete="off">' +
                                '<div class="help-block"><?php echo form_error('end_time '); ?></div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="col-sm-1"><a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger"><i class="fa fa-minus"></i></a></div>' +
                                    '</div>';
        var x = 1; //Initial field counter is 1
        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html

                $('.add_start_time').timepicker();
                $('.add_end_time').timepicker();
                $('.edit_start_time').timepicker();
                $('.edit_end_time').timepicker();

            }
        });
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });



    $(document).ready(function () {
        var maxField = 200; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML =
            '<div>' +
            '<div class="item form-group ">' +
            '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period"><?php echo 'Period '; ?> <span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-6 col-sm-6 col-xs-12">' +
                '<input  class="form-control col-md-7 col-xs-12 period"  name="period[]"  id="period" value="" placeholder="period" required="required" type="text" autocomplete="off">' +
                '<div class="help-block"><?php echo form_error('period '); ?></div>' +
                    '</div>' +
                    '</div> ' +
                    '<div class="item form-group">' +
                    '<label class="control-label col-md-3 col-sm-3 col-xs-12">Start Time <span class="required">*</span>' +
                    '</label>' +
                    '<div class="col-md-6 col-sm-6 col-xs-12">' +
                    '<input  class="form-control col-md-7 col-xs-12 add_start_time"  name="start_time[]"  id="add_start_time" value="" placeholder="Start Time" required="required" type="text" autocomplete="off">' +
                    '<div class="help-block"><?php echo form_error('start_time '); ?></div>' +
                        '</div>' +
                        '</div> ' +
                        '<div class="item form-group">' +
                        '<label class="control-label col-md-3 col-sm-3 col-xs-12">End Time<span class="required">*</span>' +
                        '</label>' +
                        '<div class="col-md-6 col-sm-6 col-xs-12">' +
                        '<input  class="form-control col-md-7 col-xs-12 add_end_time"  name="end_time[]"  id="add_end_time" value="" placeholder="End Time" required="required" type="text" autocomplete="off">' +
                        '<div class="help-block"><?php echo form_error('end_time '); ?></div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-sm-1"><a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger"><i class="fa fa-minus"></i></a></div>' +
                            '</div>';
        var x = 1; //Initial field counter is 1
        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html

                $('.add_start_time').timepicker();
                $('.add_end_time').timepicker();
                $('.edit_start_time').timepicker();
                $('.edit_end_time').timepicker();

            }
        });
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>