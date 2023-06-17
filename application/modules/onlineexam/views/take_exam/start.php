<style>
#my_camera {
	background: #000;
}
	
	#results {
	background: #000;
	height: 240px;
	width: 356px;
}
	
	.col-md-12.dfgdfhdh {
    position: fixed;
    bottom: 0px;
    z-index: 999;
    left: 0px;
    width: 337px;
}
	

	div#my_camera {
    width: 100%!important;
    height: 200px!important;
}
	
	
.col-md-12.dfgdfhdh {
	position: fixed;
	bottom: 7px;
	z-index: 999;
	left: 13px;
	width: 231px;
	background: #fff;
	padding: 4px;
	box-shadow: none;
	border-radius: 6px;
	height: 243px;
	box-shadow: 0px 0px 4px 5px #00000014;
}
	.liveeee.reddd p {
	margin-bottom: -19px !important;
	padding-bottom: 0px;
	padding-left: 16px;
}
	
	.instructions {
	padding: 6px;
	border-radius: 5px;
	color: #404040;
	background-color: #fff1c9;
	margin: 4px;
}
	.sdsdgs5 {
	float: left;
	margin-right: 23px;
}
	
	.sdsdgs5hf {
	
	margin-right: 20px;
}
	.col-sm-6.sgdsdgsdgds {
	float: right;
	text-align: right;
}
	
	.exam-left-section {
	border: 1px solid #d5d5d5;
	padding: 0px 19px;
	margin-bottom: 25px;
	border-radius: 6px;
}
	
	.sgdsdgsdgds .time-title {
	font-size: 17px;
	color: #000;
}
	#fn_timer_container {
	font-size: 17px;
}
	.sgdsdgsdgds .time-title {
	font-size: 17px;
	color: #000;
	text-align: right;
}
	.f5454asd {
	display: inline-block;
}
	.col-sm-6.d555 .time-title {
	font-size: 17px;
	color: #000;
}
	.sf5454 .time-clock.fn_exam_duration {
	font-size: 17px;
}
	.exam-left-section {
	border: 1px solid #d5d5d5;
	padding: 1px 10px!important;
	margin-bottom: 25px;
	border-radius: 6px;
}
	.col-sm-6.d555 .time-title {
	position: relative;
	top: 9px;
	left: 10px;
}
	.question-count {
	text-align: left!important;
	color: #000;
}
	
	.h3, h3 {
	font-size: 16px;
}
	.instructions {
	padding: 6px;
	border-radius: 5px;
	color: #404040;
	background-color: #f9d0d0;
	margin: 2px;
	margin-top: -8px;
}
	.question-title {
	font-size: 18px;
	font-weight: bold;
	padding-bottom: 10px;
	color: #000;
}
	.s__0997744441 .fa.fa-arrows-up-down-left-right {
	color: #000 !important;
	float: right;
	position: relative;
	top: 6px;
	right: 12px;
	font-size: 17px;
}

#results {
    background: #000;
    height: 240px;
    width: 356px;
    position: absolute;
    opacity: 0;
    z-index: -9;
}
</style>

<div class="row">
	
	  
	
	
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">  
<div class="col-sm-12 fn_time_section exam-left-section">
                                <div class="row">
                                    <div class="col-sm-6 d555">
                                        <h3 class="time-title"><span class="sdsdgs5"><?php echo $this->lang->line('total_time') ?> :</span>  <span class="sf5454"> 
											<h3 class="time-clock fn_exam_duration">00:00:00</h3></span></h3>
                                    </div>
                                   <div class="col-sm-6 sgdsdgsdgds">
									   <h3 class="time-title">
										   <span class="sdsdgs5hf"><?php echo  $this->lang->line('remain_time') ?> : <span class="f5454asd"><h3 id="fn_timer_container" class="time-clock"></h3></span> </span> 
										    </h3>
                                    </div>
                                </div>
                                 
                            </div>
        <div class="row">
        <?php

if ($online_exam->capture == 'on') {
?>

            <div class="col-md-12 dfgdfhdh icandrag" id="box-1">
            <div id="my_camera"></div>
            <div class="liveeee reddd">
                <p><i class="fa-solid fa-video"></i> live video <span class="s__0997744441"><i class="fa fa-arrows-up-down-left-right"></i></span></p>
            </div>
            </div>


            <div class="col-md-6">
            <div id="results"></div>
            <div class="liveeee">
            <p><i class="fa-solid fa-camera"></i> last image preview</p>
            </div>
      
            </div>

            <?php }else{ ?>

            
                <div class="col-md-12 dfgdfhdh icandrag" id="box-1" style="opacity: 0">
                    <div id="my_camera"></div>
                    <div class="liveeee reddd">
                        <p><i class="fa-solid fa-video"></i> live video <span class="s__0997744441"><i class="fa fa-arrows-up-down-left-right"></i></span></p>
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div id="results"></div>
                    <div class="liveeee">
                    <p><i class="fa-solid fa-camera"></i> last image preview</p>
                    </div>
            
                    </div>
              
                <!-- <div class="nocameramodal" id="nocamera" style="display:none;" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close nocamerano" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Allow Access.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary nocamerayes" data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-primary nocamerano">No</button>
                        </div>
                        </div>
                    </div>
                </div> -->
            <?php } ?>

          

        </div>
<!--    
	 <input type=button value="Configure" onClick="configure()">
	<input type=button value="Take Snapshot" onClick="take_snapshot()">
	<input type=button value="Save Snapshot" onClick="saveSnap()"> -->
	



            <div class="x_content"> 

                <div class="row instructions sfas___fssshah">
                    <div class="col-md-6 col-sm-6 col-xs-6 theme-color"><i class="fa fa-check"></i> <?php echo $this->lang->line('warning'); ?></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 theme-color"><i class="fa fa-check"></i> <?php echo $this->lang->line('do_not_press_back'); ?></div>
                </div>                
                <div class="ln_solid"></div>                                                                        

                <div class="row">
                    
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        
                        <div class="box wizard" data-initialize="wizard" id="fn_question_wizard">                            
                            <div class="steps-container">
                                <ul class="steps hidden" style="margin-left: 0">
                                    <?php
                                    $total_mark = 0;                                    
                                    $total_question = count($questions);
                                    foreach (range(1, $total_question) as $value) {
                                    $total_mark +=  $value->mark;    
                                    ?>
                                        <li data-step="<?= $value ?>" class="<?= $value == 1 ? 'active' : '' ?>"></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
              

                            <form id="fn_online_exam_form" method="post">
                                <div class="step-content">
                                    <input type="hidden" id="online_exam_id_get" name="online_exam_id" value="<?php echo $online_exam->id; ?>" />
                                    <input type="hidden" id="exam_taken_exams_id_session" name="exam_taken_exams_id_session" value="" />
                                    <input type="hidden" id="school_id_get" name="school_id" value="<?php echo $online_exam->school_id; ?>" />
                                    <?php
                                    if ($total_question) {
                                        foreach ($questions as $key => $question) {
                                            
                                            if (!empty($question)) {  ?>
                                    
                                                <div class="clearfix step-pane sample-pane_ <?php echo $key == 0 ? 'active' : '' ?>" data-questionID="<?= $question->id ?>" data-step="<?php echo $key + 1 ?>">
                                                    <div class="question-section">
                                                        <div class="question-count big__tyre">
                                                            <?php echo $this->lang->line('question') ?>  <?php echo $key + 1 ?> <?php echo $this->lang->line('of') ?> <?php echo $total_question ?> <?php echo $this->lang->line('total') ?>
                                                            <span><?php echo $question->mark != "" ? $this->lang->line('mark') .': '. $question->mark : '' ?> </span>
                                                        </div>
                                                        <div class="question-title"> <?php echo $question->question; ?></div>
                                                        
                                                        <?php if (!is_null($question->image) && $question->image != "") { ?>                                                                              
                                                            <img src="<?php echo UPLOAD_PATH; ?>/question/<?php echo $question->image; ?>" alt="" style="max-width: 100%;" /><br/>
                                                        <?php } ?>
                                                        <input type="hidden" name="question_mark[<?php echo $question->id; ?>]" value="<?php echo $question->mark; ?>" />    
                                                    </div>

                                                    <div class="answer-section" id="step<?php echo $key + 1; ?>">
                                                        <table class="table">
                                                            <tr>
                                                                <?php
                                                                
                                                                $tdCount = 0;
                                                                $options = get_option_by_questoin_id($question->id);
                                                                
                                                                if($question->question_type == 'single' || $question->question_type == 'boolean' || $question->question_type == 'multi'){
                                                                    foreach ($options as $option) {

                                                                    ?>
                                                                        <td>
                                                                            <input id="option<?php echo $option->id; ?>" value="<?php echo $option->id; ?>" name="answer[<?php echo $question->question_type; ?>][<?php echo $question->id; ?>][]" type="<?php echo ($question->question_type == 'single' || $question->question_type == 'boolean') ? 'radio' : 'checkbox' ?>">
                                                                            <label for="option<?php echo $option->id; ?>"><span ><?php echo $option->option ?></span></label>
                                                                        </td>
                                                                        <?php
                                                                        $tdCount++;
                                                                        if ($tdCount == 2) {$tdCount = 0; echo "</tr><tr>";}
                                                                    }
                                                                }

                                                                if ($question->question_type == 'blank') {
                                                                    // foreach ($questions as $ans_key => $answer) {
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <!-- <input type="button" value="<?php echo $ans_key + 1 ?>" class="answer-text-button">  -->
                                                                                <input class="answer-text-field" id="option<?php echo $option->id; ?>" name="answer[<?php echo $question->question_type; ?>][<?php echo $question->id; ?>][]" value="" type="text">
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    // }
                                                                }
                                                            ?>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php
                                                
                                            $total_mark += $question->mark;    
                                            }
                                        }
                                    } else {
                                        echo "<p class='text-center'>" . $this->lang->line('no_data_found') . "</p>";
                                    }
                                    ?>
                                    
                                    
                                    <div class="question-answer-button">
                                        <button class="btn btn-prev btn-success gsms-toe-btn-answered " type="button"  id="gsms-prevbutton" disabled>
                                            <i class="fa fa-angle-left"></i> <?php echo $this->lang->line('previous') ?>
                                        </button>
                                        <button class="btn btn-success gsms-toe-btn-not-visited" type="button" id="gsms-reviewbutton">
                                            <?php echo $this->lang->line('mark_review') ?>
                                        </button>
                                        <button class="btn btn-next  btn-success gsms-toe-btn-answered" type="button"  id="gsms-nextbutton" data-last="<?php echo $this->lang->line('completed') ?>">
                                            <?php echo $this->lang->line('next'); ?>&nbsp;<i class="fa fa-angle-right"></i>
                                        </button>
                                        <button class="btn btn-success gsms-toe-btn-not-visited" type="button" id="gsms-clearbutton">
                                            <?php echo $this->lang->line('reset_answer') ?>
                                        </button>
                                        <button class="btn btn-success gsms-toe-btn-notanswered" type="button" id="gsms-finishedbutton" onclick="gsms_finished()">
                                            <?php echo $this->lang->line('completed') ?>
                                        </button>
                                    </div>
                                    
                                </div>
                                <input type="hidden" value="<?php echo $total_mark; ?>"  name="total_mark" />
                                <input type="hidden" value="<?php echo $total_question; ?>"  name="total_question" />
                                <input type="hidden" value="0"  name="total_answer" id="fn_total_answer"/>                                
                            </form>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="row">                                                      
                            <div class="col-sm-12 fn_time_section exam-left-section">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="time-title">
                                            <?php echo $this->lang->line('exam_title') ?> : 
                                            <?php echo  get_exam_detail_by_id($online_exam->title)->title;
                                            ?>   </h3>
                                    </div>                                    
                                </div>
                            </div>
                          
                            <div class="col-sm-12 exam-left-section">                                
                                <h3 class="section-title">
                                    <?php echo $this->lang->line('total_question') ?> : <?php echo $online_exam->title; ?>                                               
                                </h3>                                     
                                <ul class="exam-question-box fn_question_statistics">
                                    <?php foreach ($questions as $q_key => $q_obj) { ?>
                                        <li><a class="gsms-not-visited deafault-bg" id="question<?php echo $q_key + 1 ?>" href="javascript:void(0);" onclick="gsms_jump_question(<?php echo $q_key + 1 ?>)"><?php echo $q_key + 1 ?></a></li>
                                    <?php } ?>
                                </ul>
                                    
                            </div>
                            
                            <div class="col-sm-12 exam-left-section">
                                <h3 class="section-title"><?php echo $this->lang->line('exam_statistics') ?></h3>
                                <ul class="exam_statistics">
                                    <li><a class="gsms-answered" id="gsms_summary_answered" href="#">0</a> <?php echo $this->lang->line('total_answered') ?></li>
                                    <li><a class="gsms-marked" id="gsms_summary_marked" href="#">0</a> <?php echo $this->lang->line('total_mark_review') ?></li>
                                    <li><a class="gsms-not-answered" id="gsms_summary_not_answered" href="#">0</a> <?php echo $this->lang->line('total_not_answer') ?></li>
                                    <li><a class="gsms-not-visited" id="gsms_summary_not_visited" href="#">0</a><?php echo $this->lang->line('total_not_visited') ?></li>
                                </ul>
                            </div> 
                            
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<style>
    .question-section{padding: 10px 0px;margin-bottom: 20px;}    
    .question-count{font-size: 20px;font-weight: bold;background: #fff1c9;text-align: center;padding: 10px;border-radius: 6px;margin-bottom: 20px;}
    .question-title{font-size: 18px;font-weight: bold;padding-bottom: 10px;}    
    .question-count span{background: #00660d;padding: 5px;border-radius: 6px;color: #fff;font-size: 14px;float: right;}    
    .table>tbody>tr>td{border: 0px;}
    .table    label{width: auto;}    
    .answer-text-button{padding: 6px 12px;border-radius: 100%;border: 0;background: #747474;color: #fff;}
    .answer-text-field{width: 80%;padding: 6px;border: 1px solid #cecece;}    
    .exam-left-section{border: 1px solid #d5d5d5;padding: 20px;margin-bottom: 25px;border-radius: 6px;}
    .section-title{  padding-bottom: 20px;}
    .exam-question-box li{list-style: none;display: inline-block; }
    .exam-question-box li a{color: #FFF; padding: 12px 16px;border-radius: 100%;cursor: pointer;font-weight: bold;float: left;width: 40px;text-align: center;}
    .deafault-bg{background:  #9F134E}    
    .gsms-not-answered{background: red;}
    .gsms-answered{ background: green;}    
    .gsms-marked{background: purple; }
    .gsms-not-visited{background: blue;}    
    .exam_statistics li{list-style: none;display: block;width: 100%;padding-bottom: 20px;font-size: 18px;margin-bottom: 5px;}
    .exam_statistics li a{color: #FFF;padding: 10px 15px;border-radius: 100%;font-weight: bold;margin-right: 10px;float: left;width: 50px;text-align: center;}
    .step-pane{display:none;}
    .active{display:block;}
    .liveeee p {
    font-size: 14px;
    padding: 5px 0;
}
.liveeee.reddd p {
    color: #e21111;
    font-size: 14px;
    padding: 5px 0;
}
</style>

<script type="text/javascript" src="<?php echo VENDOR_URL; ?>fuelux/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo VENDOR_URL; ?>fuelux/fuelux.min.js"></script>

<script type="text/javascript">

    var time_duration = parseInt(<?php echo $online_exam->duration; ?>+50)
    var total_question = parseInt(<?php echo count($questions); ?>);
    var seconds = 1;
    var minutes = -1;
    var hours = 0;
    var current_step = 1;
    var num_marked = 0;    
    time_counting_update();
    
    $('.fn_exam_duration').html(time_counting());
    
    $('.fn_time_section').hide();
    if(time_duration > 0) {
        $('.fn_time_section').show();
        time_counter();
    }
    
    exam_statistics();

    if(total_question == 1) {
        $('#gsms-nextbutton').removeClass('gsms-toe-btn-answered');
        $('#gsms-nextbutton').addClass('gsms-toe-btn-not-answered');
        $('#gsms-nextbutton i').remove();
        $('#gsms-finishedbutton').hide();
    }
      
    $('#gsms-reviewbutton').on('click', function () {
        num_marked = 1;
        $('#fn_question_wizard').wizard('next');
    });

    $('#gsms-clearbutton').on('click', function () {
        gsms_clear_answer();
    });

    $('#fn_question_wizard').on('actionclicked.fu.wizard', function (evt, data) {

        total_question = parseInt(total_question);
        var steps = 0;
        if(data.direction == "next") {
            steps = data.step+1;
        } else {
            steps = data.step-1;
        }
        if(steps == total_question) {
            $('#gsms-nextbutton').removeClass('gsms-toe-btn-answered');
            $('#gsms-nextbutton').addClass('gsms-toe-btn-not-answered');
            $('#gsms-nextbutton i').remove();
            $('#gsms-finishedbutton').hide();
        } else if(steps == total_question+1) {
            gsms_finished();
        } else {
            $('#gsms-nextbutton').removeClass('gsms-toe-btn-not-answered');
            $('#gsms-nextbutton').addClass('gsms-toe-btn-answered');
            $('#gsms-nextbutton i').remove();
            $('#gsms-nextbutton').append(' <i class="fa fa-angle-right"></i>');
            $('#gsms-finishedbutton').show();
        }
        current_step = steps;

        gsms_change_color(data.step);
        exam_statistics();
        
    });


    function gsms_change_color(gsms_step_id) {
        list = $('#fn_online_exam_form #step'+gsms_step_id+' input ');
        var have = 0;
        var result = $.each( list, function() {
            elementType = $(this).attr('type');
            if(elementType == 'radio' || elementType == 'checkbox') {
                if($(this).prop('checked')) {
                    have = 1;
                    return have;
                }
            } else if(elementType == 'text') {
                if($(this).val() != '') {
                    have = 1;
                    return have;
                }
            }
        });
        
        if(have) {
            $('#question'+gsms_step_id).removeClass('gsms-not-visited');
            $('#question'+gsms_step_id).removeClass('gsms-not-answered');
            $('#question'+gsms_step_id).removeClass('gsms-marked');
            $('#question'+gsms_step_id).addClass('gsms-answered');
        } else {
            $('#question'+gsms_step_id).removeClass('gsms-not-visited');
            $('#question'+gsms_step_id).removeClass('gsms-answered');
            if($('#question'+gsms_step_id).attr('class') != 'gsms-marked') {
                $('#question'+gsms_step_id).addClass('gsms-not-answered');
            }
        }

        if(num_marked) {
            num_marked = 0;
            if($('#question'+gsms_step_id).attr('class') != 'gsms-answered') {
                $('#question'+gsms_step_id).removeClass('gsms-not-visited');
                $('#question'+gsms_step_id).removeClass('gsms-not-answered');
                $('#question'+gsms_step_id).addClass('gsms-marked');
            }
        }
    }

    function gsms_jump_question(gsms_question_number) {
        gsms_change_color(current_step);
        current_step = gsms_question_number;
        $('#fn_question_wizard').wizard('selectedItem', {
            step: gsms_question_number
        });
        gsms_change_color(gsms_question_number);
        if(gsms_question_number == total_question) {
            $('#gsms-nextbutton').removeClass('gsms-toe-btn-answered');
            $('#gsms-nextbutton').addClass('gsms-toe-btn-not-answered');
            $('#gsms-nextbutton i').remove();
            $('#gsms-finishedbutton').hide();
        } else {
            $('#gsms-nextbutton').removeClass('gsms-toe-btn-not-answered');
            $('#gsms-nextbutton').addClass('gsms-toe-btn-answered');
            $('#gsms-nextbutton i').remove();
            $('#gsms-nextbutton').append(' <i class="fa fa-angle-right"></i>');
            $('#gsms-finishedbutton').show();
        }
        
        exam_statistics();
    }

    function gsms_clear_answer() {
        list = $('#fn_online_exam_form #step'+current_step+' input ');
        $.each( list, function() {
            elementType = $(this).attr('type');
            switch(elementType) {
                case 'radio': $(this).prop('checked', false); break;
                case 'checkbox': $(this).attr('checked', false); break;
                case 'text': $(this).val(''); break;
            }
        });
        if($('#question'+current_step).attr('class') == 'gsms-marked') {
            $('#question'+current_step).removeClass('gsms-marked');
            $('#question'+current_step).addClass('gsms-not-answered');
        }
    }


    // done
    function gsms_finished() {
       $('#fn_online_exam_form').submit();
    }


    //  done
    function time_counter() {
        setInterval(function() {
            time_counting_update();
            $('#fn_timer_container').html( ((hours < 10) ? '0' + hours : hours) + ':' + ((minutes < 10) ? '0' + minutes : minutes) + ':' + ((seconds < 10) ? '0' + seconds : seconds ));
            time_duration = (hours*60)+minutes;
        }, 1000);
    }

   // done
    function time_counting_update() {
        hours = 0;
        minutes = time_duration;
        if(minutes > 60) {
            hours = parseInt(time_duration/60, 10);
            minutes = time_duration % 60;
        }
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if(minutes < 0 && hours != 0) {
            --hours;
            minutes = 59;
        }
        if(hours < 0) {
            hours = 0;
        }
        seconds = (seconds < 0) ? 59 : seconds;
        if (minutes < 0 && hours == 0) {
            minutes = 0;
            seconds = 0;
            gsms_finished();
            clearInterval(interval);
        }
    }


  
    // done
    function exam_statistics() {
        
        var gsms_summary_not_visited = $('.fn_question_statistics li .gsms-not-visited').length;
        var gsms_summary_answered = $('.fn_question_statistics li .gsms-answered').length;
        var gsms_summary_marked = $('.fn_question_statistics li .gsms-marked').length;
        var gsms_summary_not_answered = $('.fn_question_statistics li .gsms-not-answered').length;
        
        $('#gsms_summary_not_visited').html(gsms_summary_not_visited);
        $('#gsms_summary_answered').html(gsms_summary_answered);
        $('#gsms_summary_marked').html(gsms_summary_marked);
        $('#gsms_summary_not_answered').html(gsms_summary_not_answered);
        
        $('#fn_total_answer').val(gsms_summary_answered);
    }

    // done
    function time_counting() {
        return ((hours < 10) ? '0' + hours : hours) + ':' + ((minutes < 10) ? '0' + minutes : minutes) + ':' + ((seconds < 10) ? '0' + seconds : seconds );
    }   
  
    $('.navbar-right').on('click', function(){
        $('.fn_for_online_exam').toggleClass('open');
    });
    
    /*
    function disableF5(e) {
        if ( ( (e.which || e.keyCode) == 116 ) || ( e.keyCode == 82 && e.ctrlKey ) ) {
            e.preventDefault();
        }
    }
    $(document).bind("keydown", disableF5);

    function Disable(event) {
        if (event.button == 2)
        {
            window.oncontextmenu = function () {
                return false;
            }
        }
    }
    document.onmousedown = Disable;
    */
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/webcam/webcam.js"></script>
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		
		// Configure a few settings and attach camera
			Webcam.set({
				width: 320,
				height: 240,
				image_format: 'jpeg',
				jpeg_quality: 90
			});
			Webcam.attach( '#my_camera' );
	
		// A button for taking snaps
		

		// preload shutter audio clip
		// var shutter = new Audio();
		// shutter.autoplay = false;
		// shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
        var timer = null;
		function take_snapshot() {
			// play sound effect
			// shutter.play();

			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<img id="imageprev" src="'+data_uri+'"/>';
			} );
            
			// Webcam.reset();
		}

            setInterval(() => {
                if (!timer) {
                    take_snapshot();                
                    timer =  setInterval(() => {
                            take_snapshot();  
                    }, 2000);                
                }
            }, 4000);
			
		
            // function stop_snapping() {
            //     if (timer) {
            //         clearTimeout( timer );
            //         timer = null;
            //     }
            // }

  
            setInterval(() => {
                saveSnap();
            }, 3000);

		function saveSnap(){
			// Get base64 value from <img id='imageprev'> source
			var base64image =  document.getElementById("imageprev").src;
            var online_exam_id = $('#online_exam_id_get').val();
            var school_id = $('#school_id_get').val();
                var url = "<?php echo base_url(); ?>onlineexam/takeexam/upload_image?online_exam_id="+online_exam_id+"&school_id="+school_id+""
			 Webcam.upload( base64image, url, function(code, text) {
				 console.log(text);
                 $('#exam_taken_exams_id_session').val(text)
				 //console.log(text);
            });

		}
	</script>



  <script type="text/javascript" charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    setTimeout(() => {
        $('#nocamera').show()
    }, 10000);


    $('.nocamerayes').click(function(){
        $('#nocamera').hide()
    })
    $('.nocamerano').click(function(){
        $('#nocamera').hide()
    })
$(function(){
  $('.icandrag').draggable({ scroll: true, cursor: "move"});
});
</script>

<style>
#nocamera .modal-dialog {
    box-shadow: 1px 0px 0px 905px #0000005e;
    position: fixed;
    z-index: 999999;
    width: 30%;
    left: 34%;
}

</style>