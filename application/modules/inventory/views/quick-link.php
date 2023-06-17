<div class="tabbable">

  <div class="quick_left_arrow">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
    </svg>

  </div>

  <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
    <?php if (has_permission(VIEW, 'inventory', 'supplier')) { ?>
      <a class="nav-link1 active" href="<?php echo site_url('inventory/supplier/index'); ?>"><?php echo $this->lang->line('supplier'); ?></a>
    <?php } ?>

    <?php if (has_permission(VIEW, 'inventory', 'warehouse')) { ?>
      <a class="nav-link1" href="<?php echo site_url('inventory/warehouse/index'); ?>"><?php echo $this->lang->line('warehouse'); ?></a>
    <?php } ?>

    <?php if (has_permission(VIEW, 'inventory', 'category')) { ?>
      <a class="nav-link1" href="<?php echo site_url('inventory/category/index'); ?>"><?php echo $this->lang->line('category'); ?></a>
    <?php } ?>

    <?php if (has_permission(VIEW, 'inventory', 'product')) { ?>
      <a class="nav-link1" href="<?php echo site_url('inventory/product/index'); ?>"><?php echo $this->lang->line('product'); ?></a>
    <?php } ?>

    <?php if (has_permission(VIEW, 'inventory', 'purchase')) { ?>
      <a class="nav-link1" href="<?php echo site_url('inventory/purchase/index'); ?>"><?php echo $this->lang->line('purchase'); ?></a>
    <?php } ?>

    <?php if (has_permission(VIEW, 'inventory', 'sale')) { ?>
      <a class="nav-link1" href="<?php echo site_url('inventory/sale/index'); ?>"><?php echo $this->lang->line('sale'); ?></a>
    <?php } ?>

    <?php if (has_permission(VIEW, 'inventory', 'issue')) { ?>
      <a class="nav-link1" href="<?php echo site_url('inventory/issue/index'); ?>"> <?php echo $this->lang->line('issue'); ?> </a>
    <?php } ?>
  </ul>
  <div class="quick_right_arrow active">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
    </svg>


  </div>
</div>