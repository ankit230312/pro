<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">

<?php if(has_permission(VIEW, 'lessonplan', 'lesson')){ ?>
    <a class="nav-link1 active" href="<?php echo site_url('lessonplan/lesson/index'); ?>"><?php echo $this->lang->line('lesson'); ?></a>  
<?php } ?> 
<?php if(has_permission(VIEW, 'lessonplan', 'topic')){ ?>    
     <a class="nav-link1" href="<?php echo site_url('lessonplan/topic/index'); ?>"><?php echo $this->lang->line('topic'); ?></a>  
<?php } ?> 
<?php if(has_permission(VIEW, 'lessonplan', 'timeline')){ ?>    
     <a class="nav-link1" href="<?php echo site_url('lessonplan/timeline'); ?>"><?php echo $this->lang->line('lesson_time_line'); ?></a>  
<?php } ?>                                
 <?php if(has_permission(VIEW, 'lessonplan', 'status')){ ?>    
    <a class="nav-link1" href="<?php echo site_url('lessonplan/status'); ?>"><?php echo $this->lang->line('lesson_status'); ?></a>  
<?php } ?>                                    
 <?php if(has_permission(VIEW, 'lessonplan', 'lessonplan')){ ?>    
     <a class="nav-link1" href="<?php echo site_url('lessonplan/index'); ?>"><?php echo $this->lang->line('lesson_plan'); ?></a>  
<?php } ?>  
</ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>