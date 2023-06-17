<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <tbody>



        <tr>
            <th><?php echo $this->lang->line('school_name'); ?></th>
            <td colspan="3"><?php echo $exam_result->school_name; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('student_name'); ?></th>
            <td><?php echo $exam_result->student_name; ?></td>
            <th><?php echo $this->lang->line('exam_title'); ?></th>
            <td><?php echo $exam_result->exam_title; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('class'); ?></th>
            <td><?php echo $exam_result->class_name; ?></td>
            <th><?php echo $this->lang->line('section'); ?></th>
            <td><?php echo $exam_result->section; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('subject'); ?></th>
            <td><?php echo $exam_result->subject; ?></td>
            <th><?php echo $this->lang->line('academic_year'); ?></th>
            <td><?php echo $exam_result->session_year; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('start_date'); ?></th>
            <td><?php echo date($this->global_setting->date_format, strtotime($exam_result->start_date)); ?></td>
            <th><?php echo $this->lang->line('end_date'); ?></th>
            <td><?php echo date($this->global_setting->date_format, strtotime($exam_result->end_date)); ?></td>
        </tr>

        <tr>
            <th><?php echo $this->lang->line('mark_type'); ?></th>
            <td><?php echo $this->lang->line($exam_result->mark_type); ?></td>
            <th><?php echo $this->lang->line('pass_mark'); ?></th>
            <td><?php echo number_format($exam_result->pass_mark); ?>
                <?php echo ($exam_result->mark_type == 'percentage') ? '%' : ''; ?></td>
        </tr>

        <tr>
            <th><?php echo $this->lang->line('total_question'); ?></th>
            <td><?php echo $exam_result->total_question; ?></td>
            <th><?php echo $this->lang->line('total_answered'); ?></th>
            <td><?php echo $exam_result->total_answer; ?></td>
        </tr>

        <tr>
            <th><?php echo $this->lang->line('total_mark'); ?></th>
            <td><?php echo $exam_result->total_mark; ?></td>
            <th><?php echo $this->lang->line('total_obtain_mark'); ?></th>
            <td><?php echo $exam_result->total_obtain_mark; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('correct_answer'); ?></th>
            <td><?php echo $exam_result->total_correct_answer; ?></td>
            <th><?php echo $this->lang->line('incorrect_answer'); ?></th>
            <td><?php echo $exam_result->total_incorrect_answer; ?></td>
        </tr>
        <tr>
            <th><?php echo $this->lang->line('obtain_mark'); ?></th>
            <td><?php echo number_format($exam_result->obtain_mark_percent, 0); ?>%</td>
            <th><?php echo $this->lang->line('result'); ?></th>
            <td><?php echo $exam_result->result_status == 'passed' ? $this->lang->line('passed') : $this->lang->line('failed'); ?>
            </td>
        </tr>

    </tbody>
</table>


<div class="col-md-12 col-sm-12 col-xs-12 online-exam-box" style="margin: 0;">
    <h3 class="head-title head-sub-title"><i class="fa fa-file-text-o"></i><small> Exam Question </small></h3>
    <div class="fn_associated_question">

    <form id="update_exam_question_attempt1233" method="post">

            <input type="hidden" name="pass_mark" value="<?php echo $exam_online_exams->pass_mark; ?>">
            <input type="hidden" name="mark_type" value="<?php echo $exam_online_exams->mark_type; ?>">
            <input type="hidden" name="total_mark" value="<?php echo $exam_result->total_mark; ?>">
        <?php

$counter = 0;
foreach ($allExamQuestions as $mainkey => $mainvalue) {

    $counter++;
    $question_id = $mainvalue->question_id;
    $exam_taken_id = $exam_result->id;
    $exam_id = $exam_result->exam_id;

    $this->db->select('EQ.*');
    $this->db->from('exam_questions AS EQ');
    $this->db->where('EQ.id', $question_id);
    $question = $this->db->get()->row();

    $this->db->select('QA.*');
    $this->db->from('exam_answers AS QA');
    $this->db->where('QA.question_id', $question_id);
    $options = $this->db->get()->result();

    $this->db->select('EQA.*');
    $this->db->from('exam_question_attempt AS EQA');
    $this->db->where('EQA.question_id', $question_id);
    $this->db->where('EQA.exam_taken_id', $exam_taken_id);
    $this->db->where('EQA.exam_id', $exam_id);
    $attempts = $this->db->get()->row();


//  echo $this->db->last_query();
//   print_r($attempts);
// 
    ?>

            


                <div class="question-container">
                    <div class="row question-title">
                        <div class="col-md-9 col-sm-9 col-xs-9"> <?php echo $counter . '. ' . $question->question ?>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
                            <?php echo $this->lang->line('mark') . ': ' . $question->mark; ?>
                        </div>
                    </div>

                    <?php if ($question->image) {?>
                    <div class="row question-title">
                        <div class="col-md-12 col-sm-12 col-xs-12"><img
                                src="<?php echo UPLOAD_PATH . '/question/' . $question->image; ?> " alt=""
                                style="width: auto;" />
                        </div>
                    </div>
                    <?php }?>

                    <div class="row">
                        <?php if ($question->question_type == 'single') {

                    foreach ($options as $obj) {
                        $answer = $obj->is_correct ? 'checked="checked"' : '';
                        ?>

                        <div class="col-md-6 col-sm-6 col-xs-12" style="display:inline-table">
                            <input id="<?php echo $obj->id; ?>" type="radio" name="singleans<?php echo $obj->id; ?>[]"
                                value="1" <?php echo $answer ?> disabled="disabled"> <?php echo $obj->option ?>
                        </div>




                        <?php }
                    } else if ($question->question_type == 'multi') {

                        foreach ($options as $obj) {

                            $answer = $obj->is_correct ? 'checked="checked"' : ''?>

                        <div class="col-md-6 col-sm-6 col-xs-12" style="display:inline-table">
                            <input type="checkbox" name="ans<?php echo $obj->id; ?>[]" value="1" <?php echo $answer ?>
                                disabled="disabled"> '.
                            <?php echo $obj->option ?>
                        </div>
                        <?php }

                    } else if ($question->question_type == 'boolean') {

                        foreach ($options as $obj) {

                            $answer = $obj->is_correct ? 'checked="checked"' : ''?>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="display:inline-table">
                            <input type="radio" name="ans[]" value="1" <?php echo $answer ?> disabled="disabled">
                            <?php echo $obj->option ?>
                        </div>
                        <?php }
                    } else if ($question->question_type == 'blank') {

                        foreach ($options as $key => $obj) {

                            $answer = $obj->is_correct ? 'checked="checked"' : ''?>

                        <div class="col-md-12" style="display:inline-table">
                            <?php echo ($key + 1) . '. ' . $obj->option ?>
                        </div>
                        <?php }
                    }?>

                    <?php if ($attempts) {
                        if ($question->question_type == 'single') { ?>
                        <div class="col-md-12">
                            <?php $attemptsanswer = $this->db->get_where('exam_answers', ['id' => $attempts->answer_id])->row();?>
                            <div class="anserwers">
                                <div class="ansertext">
                                    <p>Answer : <?php echo $attemptsanswer->option; ?></p>
                                </div>

                                <div class="ansermarks">
                                    <input type="hidden" name="attempt_mark_id[]" value="<?php echo $attempts->id; ?>">
                                    <input type="hidden" name="exam_taken_id[]"
                                        value="<?php echo $attempts->exam_taken_id; ?>">
                                    <p>Obtain Mark : <input type="text" name="attempt_mark[]" id=""
                                            value="<?php echo $attempts->obtain_mark; ?>"></p>
                                </div>
                            </div>
                        </div>

                        <?php } else if ($question->question_type == 'multi') {?>

                        <div class="col-md-12">
                            <?php 
                             $attemptsid = [];
                            if ($attempts->answer_id) {
                                $attemptsid = json_decode($attempts->answer_id);

                            }
                        ?>

                            <div class="anserwers">
                                <div class="ansertext">
                                    <p>Answer :
                                        <?php 
                                if(count($attemptsid) > 0){
                                    foreach ($attemptsid as $key => $value) {
                                ?>
                                        <?php $attemptsanswer = $this->db->get_where('exam_answers', ['id' => $value])->row();?>
                                        <span><?php echo $attemptsanswer->option; ?>, </span>

                                        <?php  } }  ?>
                                    </p>
                                </div>

                                <div class="ansermarks">
                                    <input type="hidden" name="attempt_mark_id[]" value="<?php echo $attempts->id; ?>">
                                    <input type="hidden" name="exam_taken_id[]"
                                        value="<?php echo $attempts->exam_taken_id; ?>">
                                    <p>Obtain Mark : <input type="text" name="attempt_mark[]" id=""
                                            value="<?php echo $attempts->obtain_mark; ?>"></p>
                                </div>
                            </div>
                        </div>


                        <?php } else if ($question->question_type == 'boolean') {?>

                        <div class="col-md-12">
                            <?php $attemptsanswer = $this->db->get_where('exam_answers', ['id' => $attempts->answer_id])->row();?>
                            <div class="anserwers">
                                <div class="ansertext">
                                    <p>Answer : <?php echo $attemptsanswer->option; ?></p>
                                </div>

                                <div class="ansermarks">
                                    <input type="hidden" name="attempt_mark_id[]" value="<?php echo $attempts->id; ?>">
                                    <input type="hidden" name="exam_taken_id[]"
                                        value="<?php echo $attempts->exam_taken_id; ?>">
                                    <p>Obtain Mark : <input type="text" name="attempt_mark[]" id=""
                                            value="<?php echo $attempts->obtain_mark; ?>"></p>
                                </div>
                            </div>
                        </div>


                        <?php } else if ($question->question_type == 'blank') {?>
                        <div class="col-md-12">
                            <?php $attemptsanswer = $this->db->get_where('exam_answers', ['id' => $attempts->answer_id])->row();?>
                            <div class="anserwers">
                                <div class="ansertext">
                                    <p>Answer : <?php echo $attempts->answer_id; ?></p>
                                </div>

                                <div class="ansermarks">
                                    <input type="hidden" name="attempt_mark_id[]" value="<?php echo $attempts->id; ?>">
                                    <input type="hidden" name="exam_taken_id[]"
                                        value="<?php echo $attempts->exam_taken_id; ?>">
                                    <p>Obtain Mark : <input type="text" name="attempt_mark[]" id=""
                                            value="<?php echo $attempts->obtain_mark; ?>"></p>
                                </div>
                            </div>

                            <?php }}?>


                        </div>
                        <div class="col-md-12">
                            <hr />
                        </div>
                    </div>

                    <?php } ?>

                </div>

              
    </div>

    <input type="submit" value="Update" class="btn btn-primary btn-small btnudpatss">
            </form>

    