<!-- <div class="back__colower"></div>        -->
<div class="row " style="height:10px">
    <div class="tile_count">
    <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
        <div class="count"><?php echo $total_student ? $total_student : 0; ?></div>
            <span class="count_top"><i class="fa fa-group"></i> <?php echo $this->lang->line('student'); ?></span>
        </div>
    </div>
     <?php } ?>
     
     <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
        <div class="count"><?php echo $total_guardian ? $total_guardian : 0; ?></div>
            <span class="count_top"><i class="fa fa-paw"></i> <?php echo $this->lang->line('guardian'); ?></span>

        </div>
    </div>
     <?php } ?>
     <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
        <div class="count"><?php echo $total_teacher ? $total_teacher : 0; ?></div>
            <span class="count_top"><i class="fa fa-users"></i> <?php echo $this->lang->line('teacher'); ?></span>
     
        </div>
    </div>
    <?php } ?>
    <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
        <div class="count"><?php echo $total_employee ? $total_employee :0; ?></div>
            <span class="count_top"><i class="fa fa-user-md"></i> <?php echo $this->lang->line('employee'); ?></span>
        </div>
    </div>
    <?php } ?>
    <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <div class="count green"><?php echo $total_income ? $total_income : '0.00'; ?></div>

                <span class="count_top"> 
                    <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                     <?php echo $this->lang->line('income'); ?>
                </span>
            </div>
        </div>
     <?php } ?>
     <?php if(has_permission(VIEW, 'hrm', 'employee')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <div class="count red"><?php echo $total_expenditure? $total_expenditure : '0.00'; ?></div>
            <span class="count_top">
                <?php echo isset($school_setting->currency_symbol) ? $school_setting->currency_symbol : $this->global_setting->currency_symbol;  ?> 
                 <?php echo $this->lang->line('expenditure'); ?>
            </span>
        </div>
    </div>
     <?php } ?>  
    </div>
</div>  

<style>

.center {
   margin: auto; 
    padding: 10px;
    text-align: center;
    padding: 110px 0;
}
</style>
<!-- /top tiles -->
<?php 


if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>

<div class="row " style="height:10px">
           
    <div class="col-md-12 col-sm-12 col-xs-12">            
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h4 class="head-title"><?php echo $this->lang->line('school_statistics'); ?></h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <script type="text/javascript">

                    $(function () {
                       $('#school-stats').highcharts({
                                chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: '<?php  if($this->session->userdata('role_id') != SUPER_ADMIN){ ?>
                                                    <?php echo $this->session->userdata('school_name'); ?>
                                                <?php }else{ ?>
                                                     <?php echo $this->global_setting->brand_name ? $this->global_setting->brand_name : SMS; ?>
                                                <?php } ?>'
                                    },
                                    xAxis: {
                                        categories: ['<strong><?php echo $this->lang->line('class'); ?></strong>', '<strong><?php echo $this->lang->line('student'); ?></strong>', '<strong><?php echo $this->lang->line('teacher'); ?></strong>', '<strong><?php echo $this->lang->line('employee'); ?></strong>', '<strong><?php echo $this->lang->line('income'); ?></strong>', '<strong><?php echo $this->lang->line('expenditure'); ?></strong>']
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: '<?php echo $this->lang->line('statistics'); ?>'
                                        }
                                    },
                                    tooltip: {
                                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                                        shared: true
                                    },
                                    plotOptions: {
                                        column: {
                                            stacking: 'percent'
                                        }
                                    },
                                    series: [
                                    <?php if(isset($schools) && !empty($schools)){ ?>
                                        <?php foreach($schools as $obj){ ?>
                                        {
                                            name: '<?php echo $obj->school_name; ?>',
                                            data: [<?php echo implode(',',$stats[$obj->id]); ?>]
                                        }
                                        ,                                           
                                       <?php } ?> 
                                   <?php } ?> 
                                   ],
                                credits: {
                                    enabled: false
                                }
                                });
                        });
                        
               </script>

                    <div id="school-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                </div>
            </div>            
    </div>  
   
</div>
 
<?php } ?> 

<div class="row hjsu7vh_h">
    <div class="col-md-8 col-sm-8 col-xs-12">   
        
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0">
            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h3 class="head-title"><?php echo $this->lang->line('calendar'); ?></h3>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="calendar"></div>
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/lib/cupertino/jquery-ui.min.css' />
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.css' />
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/jquery-ui.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/moment.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.min.js'></script> 
                    <script type="text/javascript">
                        $(function () {
                            $('#calendar').fullCalendar({
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay'
                                },
                                buttonText: {
                                    today: 'today',
                                    month: 'month',
                                    week: 'week',
                                    day: 'day'
                                },

                                //events and holidays
                                events: [
                                    <?php if(isset($events) && !empty($events)){ ?>
                                        <?php foreach($events as $obj){ ?>
                                        {
                                            title: "<?php echo $obj->title; ?>",
                                            start: '<?php echo date('Y-m-d', strtotime($obj->event_from)); ?>T<?php echo date('H:i:s', strtotime($obj->event_from)); ?>',
                                            end: '<?php echo date('Y-m-d', strtotime($obj->event_to)); ?>T<?php echo date('H:i:s', strtotime($obj->event_to)); ?>',
                                            backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                            url: '<?php echo site_url('event/index/0/'.$obj->id); ?>', //red
                                            color: '#ffffff' //red
                                        },
                                        <?php } ?> 
                                    <?php } ?> 
                                    <?php if(isset($holidays) && !empty($holidays)){ ?>
                                        <?php foreach($holidays as $obj){ ?>
                                        {
                                            title: "<?php echo $obj->title; ?>",
                                            start: '<?php echo date('Y-m-d', strtotime($obj->date_from)); ?>T<?php echo date('H:i:s', strtotime($obj->date_from)); ?>',
                                            end: '<?php echo date('Y-m-d', strtotime($obj->date_to)); ?>T<?php echo date('H:i:s', strtotime($obj->date_to)); ?>',
                                            backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                            url: '<?php echo site_url('announcement/holiday/index/0/'.$obj->id); ?>', //red
                                            color: '#ffffff' //red
                                        },
                                        <?php } ?> 
                                    <?php } ?>                                     
                                ]
                            });
                        });
                    </script>

                </div>                
            </div>          
        </div>          

        <?php if(isset($news) && !empty($news)){ ?>
            <div class="col-md-6 col-sm-4 col-xs-12">
                <div class="x_panel tile overflow_hidden">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('latest_news'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul  class="list-unstyled msg_list">                        
                                <?php foreach($news as $obj ){ ?>
                                <li>
                                    <a href="<?php echo site_url('announcement/news/view/'.$obj->id); ?>">
                                        <span class="image">
                                        <?php  if($obj->image != ''){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/news/<?php echo $obj->image; ?>" alt="" width="70" /> 
                                                <?php }else{ ?>
                                                <img src="<?php echo IMG_URL; ?>default-user.png" alt="Profile Image" />
                                        <?php } ?>
                                        </span>
                                        <span>
                                            <span><?php echo $obj->title; ?></span>
                                            <span class="message"></span>
                                            <span class="time"><?php echo get_nice_time($obj->created_at); ?></span>
                                        </span>                                        
                                    </a>
                                </li>
                                <?php } ?>                       
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        
        
        <?php if(isset($notices) && !empty($notices)){ ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel tile overflow_hidden">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('latest_notice'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul  class="list-unstyled msg_list">

                                <?php foreach($notices as $obj ){ ?>
                                <li>
                                    <a href="<?php echo site_url('announcement/notice/view/'.$obj->id); ?>">                                       
                                        <span>
                                            <span><?php echo $obj->title; ?></span>
                                            <span>&nbsp;</span>
                                            <span class="time"><?php echo get_nice_time($obj->created_at); ?></span>
                                        </span>                                        
                                    </a>
                                </li>
                                <?php } ?>                       
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        
    </div>


    <?php
    if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">To-do List</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('sl_no'); ?></th>                           
                                <th><?php echo $this->lang->line('title'); ?></th>                                          
                                <th><?php echo $this->lang->line('status'); ?></th>                                          
                                <th><?php echo $this->lang->line('date'); ?></th>                                          
                                <th>Created By</th>                                          
                                <th><?php echo $this->lang->line('action'); ?></th>                                          
                            </tr>
                        </thead>
                        <tbody>   
                            <?php 

                            

                            $todos = $this->db->limit(3)->get_where('todos')->result();
                            // echo $this->db->last_query();
                            $count = 1; 
                            if(isset($todos) && !empty($todos)){ ?>
                                <?php foreach($todos as $obj){ ?>                                       
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $obj->title; ?></td>
                                    <td><?php echo $obj->work; ?></td>
                                    <td><?php echo $obj->date; ?></td>
                                    <td><?php  $user = get_user_by_id($obj->created_by); if($user){ echo $user->name; } ?></td>
                                    <td><a class="text-success" href="<?php echo base_url('miscellaneous/todo/index'); ?>">View</a></td>
                                    
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>



    <?php
    if($this->session->userdata('role_id') != SUPER_ADMIN){ ?>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">To-do List</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('sl_no'); ?></th>                           
                                <th><?php echo $this->lang->line('title'); ?></th>                                          
                                <th><?php echo $this->lang->line('status'); ?></th>                                          
                                <th><?php echo $this->lang->line('date'); ?></th>    
                                <th>Created By</th>                                       
                                <th><?php echo $this->lang->line('action'); ?></th>                                          
                            </tr>
                        </thead>
                        <tbody>   
                            <?php 

                            

                            $todos = $this->db->limit(3)->get_where('todos', ['user_id'=>$this->session->userdata('user_id')])->result();
                            // echo $this->db->last_query();
                            $count = 1; 
                            if(isset($todos) && !empty($todos)){ ?>
                                <?php foreach($todos as $obj){ ?>                                       
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $obj->title; ?></td>
                                    <td><?php echo $obj->work; ?></td>
                                    <td><?php echo $obj->date; ?></td>
                                    <td><?php  $user = get_user_by_id($obj->created_by); if($user){ echo $user->name; } ?></td>
                                    <td><a class="text-success" href="<?php echo base_url('miscellaneous/todo/index'); ?>">View</a></td>
                                    
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>



        
    <?php if (has_permission(VIEW, 'student', 'activity') && !has_permission(VIEW, 'administrator', 'setting') && !has_permission(ADD, 'student', 'activity')) { ?>
    

        
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">Pending Work</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="private-messages" class="center" style=" width: 99%; vertical-align: center; height: 260px;">Data to be shown soon</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">Attendance Statistics</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="private-messages" class="center" style=" width: 99%; vertical-align: center; height: 260px;">Data to be shown soon</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">Mark Statistics</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="private-messages" class="center" style=" width: 99%; vertical-align: center; height: 260px;">Data to be shown soon</div>
                </div>
            </div>
        </div>
    </div>


    <?php } ?> 


    <!-- for teachers -->

    <?php if (!has_permission(VIEW, 'administrator', 'setting') && has_permission(ADD, 'student', 'activity') ) { ?>
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">To-do List</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="private-messages" class="center" style=" width: 99%; vertical-align: center; height: 260px;">Data to be shown soon</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">Attendance Statistics</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="private-messages" class="center" style=" width: 99%; vertical-align: center; height: 260px;">Data to be shown soon</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">Mark Statistics</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="private-messages" class="center" style=" width: 99%; vertical-align: center; height: 260px;">Data to be shown soon</div>
                </div>
            </div>
        </div>
    </div>



    <?php } ?>
    <!-- for super admin -->
    <?php

if(has_permission(VIEW, 'administrator', 'setting')){ ?>
  



    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h4 class="head-title">Mark Statistics</h4>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="private-messages" class="center" style=" width: 99%; vertical-align: center; height: 260px;">Data to be shown soon</div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
        
        <!-- <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('message'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">
                            $(function () {
                                $('#private-message').highcharts({
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: ''
                                    },
                                    xAxis: {
                                        type: 'category'
                                    },
                                    yAxis: {
                                        title: {
                                            text: '<?php echo $this->lang->line('private_messaging'); ?>'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    plotOptions: {
                                        series: {
                                            borderWidth: 0,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                                    },
                                    series: [{
                                            name: '<?php echo $this->lang->line('message'); ?>',
                                            colorByPoint: true,
                                            data: [{
                                                    name: '<?php echo $this->lang->line('new'); ?>',
                                                    y: <?php echo count($new); ?>,
                                                    drilldown: null
                                                },{
                                                    name: '<?php echo $this->lang->line('inbox'); ?>',
                                                    y: <?php echo count($inboxs); ?>,
                                                    drilldown: null
                                                },{
                                                    name: '<?php echo $this->lang->line('send'); ?>',
                                                    y: <?php echo count($sents); ?>,
                                                    drilldown: null
                                                }, {
                                                    name: '<?php echo $this->lang->line('draft'); ?>',
                                                    y: <?php echo count($drafts); ?>,
                                                    drilldown: null
                                                }, {
                                                    name: '<?php echo $this->lang->line('trash'); ?>',
                                                    y: <?php echo count($trashs); ?>,
                                                    drilldown: null
                                                }]
                                        }],
                                    credits: {
                                        enabled: false
                                    }
                                });
                            });
                        </script>
                        <div id="private-message" style=" width: 99%; vertical-align: top;height: 260px;"></div>

                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel teenso">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('user_type'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">

                            $(function () {
                                $('#system-users').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45
                                        }
                                    },
                                    title: {
                                        text: ''
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            innerSize: 100,
                                            depth: 30,
                                            dataLabels: {
                                                format: '<b>{point.name}</b>'
                                            }
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    series: [{
                                            name: '<?php echo $this->lang->line('user'); ?>',
                                            data: [
                                                <?php if(isset($users) && !empty($users)){ ?>
                                                    <?php foreach($users as $obj){ ?>
                                                    ['<?php echo $obj->name; ?>', <?php echo $obj->total_user; ?>],
                                                    <?php } ?>
                                                <?php } ?>
                                            ]
                                        }]
                                });
                            });

                        </script>
                        <div id="system-users" style=" width: 100%; vertical-align: top; height:260px; "></div>
                    </div>
                </div>
            </div>
        </div>  -->

    </div>
</div>

<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts-3d.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/modules/exporting.js"></script>

<style type="text/css">
    .fc-time{display: none;}
</style>