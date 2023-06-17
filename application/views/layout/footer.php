<script>

function clickreadnotification() {
    $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/clickreadnotification'); ?>",
            data   : { },               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                 
               }
            }
        });        
    }


function clickreadnotificationguardian() {
    $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/clickreadnotificationguardian'); ?>",
            data   : { },               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                 
               }
            }
        });        
    }
</script>

<footer class="footer no-print">
    <div class="pull-right">
        <p class="white">
             <?php if(isset($this->school_setting->footer) && $this->school_setting->footer != ''){ ?>
                <?php echo $this->school_setting->footer; ?>
             <?php }else{ ?>
                <?php echo $this->global_setting->brand_footer ? $this->global_setting->brand_footer : 'Copyright © '. date('Y').' <a target="_blank" href="https://codecanyon.net/user/makemaya">makemaya Team.</a> All rights reserved.'; ?> 
             <?php } ?>
        </p>       
    </div>
    <div class="clearfix"></div>
</footer>