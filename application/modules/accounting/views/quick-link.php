<div class="tabbable">

    <div class="quick_left_arrow">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>

    </div>

    <ul class="nav nav-tabs1" id="nav-tab" role="tablist">
        <?php if (has_permission(VIEW, 'accounting', 'discount')) { ?>
            <a class="nav-link1 active" href="<?php echo site_url('accounting/discount/index'); ?>"><?php echo $this->lang->line('discount'); ?></a>
        <?php } ?>

        <?php if (has_permission(VIEW, 'accounting', 'feetype')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/feetype/index'); ?>"><?php echo $this->lang->line('fee_type'); ?></a>
        <?php } ?>

        <?php if (has_permission(VIEW, 'accounting', 'invoice')) { ?>

            <?php if ($this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == GUARDIAN) { ?>
                <a class="nav-link1" href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>
            <?php } else { ?>
                <a class="nav-link1" href="<?php echo site_url('accounting/invoice/add'); ?>"><?php echo $this->lang->line('fee_collection'); ?></a>
                <a class="nav-link1" href="<?php echo site_url('accounting/invoice/index'); ?>"><?php echo $this->lang->line('manage_invoice'); ?></a>
                <a class="nav-link1" href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>
            <?php } ?>
        <?php } ?>

        <?php if (has_permission(VIEW, 'accounting', 'receipt')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/receipt/duereceipt'); ?>"><?php echo $this->lang->line('due_receipt'); ?></a>
            <a class="nav-link1" href="<?php echo site_url('accounting/receipt/paidreceipt'); ?>"><?php echo $this->lang->line('paid_receipt'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'accounting', 'duefeeemail')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/duefeeemail/index'); ?>"><?php echo $this->lang->line('due_fee_email'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'accounting', 'duefeesms')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/duefeesms/index'); ?>"><?php echo $this->lang->line('due_fee_sms'); ?></a>
        <?php } ?>

        <?php if (has_permission(VIEW, 'accounting', 'incomehead')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/incomehead/index'); ?>"><?php echo $this->lang->line('income_head'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'accounting', 'income')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/income/index'); ?>"><?php echo $this->lang->line('income'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'accounting', 'exphead')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/exphead/index'); ?>"><?php echo $this->lang->line('expenditure_head'); ?></a>
        <?php } ?>
        <?php if (has_permission(VIEW, 'accounting', 'expenditure')) { ?>
            <a class="nav-link1" href="<?php echo site_url('accounting/expenditure/index'); ?>"><?php echo $this->lang->line('expenditure'); ?></a>
        <?php } ?>

    </ul>
    <div class="quick_right_arrow active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>


    </div>
</div>