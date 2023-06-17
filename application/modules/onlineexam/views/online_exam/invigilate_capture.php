<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-mouse-pointer"></i><small> Capture Images </small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-12">

            
            <input type="hidden" id="school_id" value="<?php echo $school_id; ?>" class="school_id" name="school_id">
            <input type="hidden" id="academic_year_id" value="<?php echo $academic_year_id; ?>" class="academic_year_id" name="academic_year_id">
            <input type="hidden" id="class_id" value="<?php echo $class_id; ?>" class="class_id" name="class_id">
            <input type="hidden" id="subject_id" value="<?php echo $subject_id; ?>" class="subject_id" name="subject_id">        
            <input type="hidden" id="filter_school_id" value="<?php echo $filter_school_id; ?>" class="filter_school_id" name="filter_school_id">
            <input type="hidden" id="filter_class_id" value="<?php echo $filter_class_id; ?>" class="filter_class_id" name="filter_class_id">
            <input type="hidden" id="exam_sub_type_id" value="<?php echo $exam_sub_type_id; ?>" class="exam_sub_type_id" name="exam_sub_type_id">
            <input type="hidden" id="exam_type_id" value="<?php echo $exam_type_id; ?>" class="exam_type_id" name="exam_type_id">
            <input type="hidden" id="exam_id" value="<?php echo $exam_id; ?>" class="exam_id" name="exam_id">

           
            <select class="form-control col-md-7 col-xs-12" name="student_id" id="student_id" onchange="get_image_by_student()"  style="width: auto;">
            <option value="">Select</option>
                <?php foreach ($allstudents as $obj) { ?>
                    
                <option value="<?php echo  $obj->id; ?>"><?php echo $obj->name; ?></option>

                <?php } ?>

            </select>
            </div>
           
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    <br />
                    <div class="tab-content">    
                            <div class="tab-pane fade in active" id="tab_edit_exam">                                
                                <div class="x_content">
                                    <div class="fn_result_data"></div>
                                </div>
                            </div>
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

  

    setInterval(() => {
        get_image_by_student();
    }, 3000);



    function get_image_by_student() {

        var student_id  = $( "#student_id option:selected" ).val();
        var school_id  = $( "#school_id" ).val();
        var academic_year_id  = $( "#academic_year_id" ).val();
        var class_id  = $( "#class_id" ).val();
        var subject_id  = $( "#subject_id" ).val();
        var exam_id  = $( "#exam_id" ).val();
        var exam_sub_type_id  = $( "#exam_sub_type_id" ).val();
        var exam_type_id  = $( "#exam_type_id" ).val();
    

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('onlineexam/get_image_by_online_exam'); ?>",
            data: {
                student_id: student_id,
                school_id: school_id,
                academic_year_id: academic_year_id,
                class_id: class_id,
                subject_id: subject_id,
                exam_id: exam_id,
                exam_type_id: exam_type_id,
                exam_sub_type_id: exam_sub_type_id
            },
            success: function(response) {
                if (response) {
                    $('.fn_result_data').html(response);
                }
            }
        });
    }



</script>




<!-- bootstrap-datetimepicker -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>

<!-- datatable with buttons -->
<script type="text/javascript">
    $('#add_start_date').datepicker();
    $('#edit_start_date').datepicker();

    $('#add_end_date').datepicker();
    $('#edit_end_date').datepicker();

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
    });






</script>