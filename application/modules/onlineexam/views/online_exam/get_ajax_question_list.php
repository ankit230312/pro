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