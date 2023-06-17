<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
<?php if(has_permission(VIEW, 'asset', 'vendor')){ ?>
 <a class="nav-link1 active" href="<?php echo site_url('asset/vendor/index'); ?>"><?php echo $this->lang->line('vendor'); ?></a>
<?php } ?>

<?php if(has_permission(VIEW, 'asset', 'store')){ ?>
 <a class="nav-link1" href="<?php echo site_url('asset/store/index'); ?>"><?php echo $this->lang->line('store'); ?></a>
<?php } ?>

<?php if(has_permission(VIEW, 'asset', 'category')){ ?>
 <a class="nav-link1" href="<?php echo site_url('asset/category/index'); ?>"><?php echo $this->lang->line('category'); ?></a>
<?php } ?>

 <?php if(has_permission(VIEW, 'asset', 'item')){ ?>
  <a class="nav-link1" href="<?php echo site_url('asset/item/index'); ?>"><?php echo $this->lang->line('item'); ?></a>
<?php } ?>

 <?php if(has_permission(VIEW, 'asset', 'purchase')){ ?>
 <a class="nav-link1" href="<?php echo site_url('asset/purchase/index'); ?>"><?php echo $this->lang->line('purchase'); ?></a>
<?php } ?>

<?php if(has_permission(VIEW, 'asset', 'issue')){ ?>
  <a class="nav-link1" href="<?php echo site_url('asset/issue/index'); ?>"><?php echo $this->lang->line('issue'); ?></a>
<?php } ?>

</ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>