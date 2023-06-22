<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-home"></i><small> <?php



                                                                            echo $this->lang->line('result_card_format'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content quick-link">
                <?php $this->load->view('quick-link'); ?>
            </div>

            <div class="x_content">
                <div class="tab-pane fade in <?php if (isset($add)) {
                                                    echo 'active';
                                                } ?>" id="tab_add_school">
                    <div class="x_content">
                        <?php ?>
                        <!--  echo form_open_multipart(site_url('exam/resultcard/insert_col_update')); -->

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="column-title"><strong><?php echo $this->lang->line('result_card_columns'); ?>:</strong></h5>
                            </div>
                        </div>
                        <div class="tab-content">
                            <!-- <div class="tab-pane fade in <?php if (isset($list)) {
                                                                    echo 'active';
                                                                } ?>" id="tab_role_list">
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th><?php echo $this->lang->line('role'); ?>/ <?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('note'); ?></th>
                                            <th><?php echo $this->lang->line('is_default'); ?></th>
                                            <th><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1;
                                        if (isset($roles) && !empty($roles)) { ?>
                                            <?php foreach ($roles as $obj) { ?>

                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo ucfirst($obj->name); ?> <?php if ($obj->school_id != 0) {
                                                                                                echo '(' . $this->db->get_where('schools', ['id' => $obj->school_id])->row()->school_name . ')';
                                                                                            }
                                                                                            ?></td>
                                                    <td><?php echo $obj->note; ?></td>
                                                    <td><?php echo $obj->is_default ? $this->lang->line('yes') : $this->lang->line('no'); ?></td>
                                                    <td>
                                                        <?php if (has_permission(EDIT, 'administrator', 'permission')) { ?>
                                                            <a href="<?php echo site_url('administrator/permission/index/' . $obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-folder-open-o"></i> <?php echo $this->lang->line('role_permission'); ?> <?php echo $this->lang->line('setting'); ?> </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->

                            <?php if (!isset($permission)) {
                            ?>
                                <div class="tab-pane pade active" id="tab_perimission">

                                    <div class="x_content">
                                        <div class="col-md-12">
                                            <!-- <p><?php echo $this->lang->line('role_permission'); ?> : <?php echo $role->name; ?></p>  -->
                                        </div>
                                    </div>
                                    <div class="x_content" style=" overflow-y: auto; overflow-y: hidden;">
                                        <?php  ?>
                                        <!-- echo form_open(site_url('exam/resultcard/insert_col_update')); -->

                                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('sl_no'); ?></th>
                                                    <th class="role-text" width=""><?php echo $this->lang->line('result_column'); ?></th>
                                                    <!-- <th class="role-text"><?php echo $this->lang->line('function_name'); ?></th> -->
                                                    <th ><?php echo $this->lang->line('status'); ?>
                                                    <th><?php echo $this->lang->line('action'); ?>
                                                        <!-- &nbsp; <input type="checkbox" id="fn_view" class="role-check" value="1" />  -->
                                                    </th>
                                                    <!-- <th><?php echo $this->lang->line('add'); ?> &nbsp;<input type="checkbox" id="fn_add" class="role-check" value="1" /></th>
                                                <th><?php echo $this->lang->line('edit'); ?> &nbsp;<input type="checkbox" id="fn_edit" class="role-check" value="1" /></th>
                                                <th><?php echo $this->lang->line('delete'); ?> &nbsp; <input type="checkbox" id="fn_delete" class="role-check" value="1" /></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                // print_r($fetch);
                                                if (isset($fetch)) {

                                                    foreach ($fetch->result() as $row) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row->result_col_name ?></td>
                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                            <td> <input type="checkbox" class="update_yes" name="update_yes" value="<?php echo $row->id; ?>"> &nbsp; Yes</td>
                                                            <!-- <td> <input type="checkbox" class="update_no" name="update_no[]" value="<?php echo $row->id; ?>"> &nbsp; No</td> -->
                                                            <!-- <td><input type="checkbox" id="no<?php echo $row->id ?>" class="present_" name="no[]" value="0" id="">&nbsp<?php echo "No" ?></td> -->
                                                            <td>
                                                                <a class="btn btn-info btn-xs" href="<?php echo site_url('exam/resultcard/result_card_format_edit/') . $row->id ?>"><span class="fa fa-pencil-square-o"></span> Edit</a>
                                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('exam/resultcard/result_card_format_delete/') . $row->id ?>"><span class="ffa fa-trash-o"></span> Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>


                                            </tbody>

                                        </table>

                                        <div class="ln_solid"></div>
                                        <!-- <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="hidden" name="role_id" id="role_id" value="<?php //echo $role_id;; 
                                                                                                    ?>" />
                                            <a href="<?php echo site_url('administrator/role/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>

                                             <?php if (has_permission(EDIT, 'administrator', 'permission')) { ?>
                                                <?php if ($role_id == 1) { ?>
                                                    <button  type="button" disabled="disabled" class="btn btn-success"><?php echo $this->lang->line('update'); ?> <?php echo $this->lang->line('role_permission'); ?></button>
                                                    <button type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?> <?php echo $this->lang->line('role_permission'); ?></button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?> <?php echo $this->lang->line('role_permission'); ?></button>
                                                <?php } ?>
                                            <?php } ?> 
                                        </div>
                                    </div> -->
                                        <?php  ?>
                                        <!-- echo form_close(); -->
                                    </div>
                                </div>
                            <?php } ?>

                        </div>



                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('exam/resultcard/result_card_format'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                <button id="send" type="click" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                            </div>
                        </div>
                        <?php  ?>
                        <!-- echo form_close(); -->
                    </div>
                </div>

                <?php if (isset($edit)) { ?>
                    <div class="tab-pane fade in active" id="tab_edit_school">
                        <div class="x_content">
                            <?php echo form_open_multipart(site_url('administrator/school/edit/' . $school->id), array('name' => 'edit', 'id' => 'edit', 'class' => 'form-horizontal form-label-left'), ''); ?>

                            <?php
                            //echo  $school->subscription_id;
                            $planid = '';
                            $mainsubscriptionids = $this->db->get_where('saas_subscriptions', ['id' => $school->subscription_id])->row();
                            if ($mainsubscriptionids) {
                                $planid = $mainsubscriptionids->subscription_plan_id;
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="column-title"><strong><?php echo $this->lang->line('basic_information'); ?>:</strong></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="item form-group">
                                        <label for="school_url"><?php echo $this->lang->line('school_url'); ?> <span class="required">*</span></label>
                                        <input class="form-control col-md-7 col-xs-12" name="school_url" id="school_url" value="<?php echo isset($school) ? $school->school_url : ''; ?>" placeholder="<?php echo $this->lang->line('school_url'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="text-info"><?php echo $this->lang->line('school_url_format'); ?></div>
                                        <div class="help-block"><?php echo form_error('school_url'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="item form-group">
                                        <label for="subscription_id"><?php echo $this->lang->line('subscription'); ?> <span class="required">*</span></label>
                                        <select required class="form-control col-md-7 col-xs-12" name="subscription_id" id="subscription_edit">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach ($subscriptions as $sp) { ?>
                                                <option value="<?php echo $sp->id; ?>" <?php echo $sp->id == $planid ?  'selected="selected"' : ''; ?>><?php echo $sp->plan_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('subscription_id'); ?></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="school_code"><?php echo $this->lang->line('school_code'); ?></label>
                                        <input class="form-control col-md-7 col-xs-12" name="school_code" id="school_code" value="<?php echo isset($school) ? $school->school_code : ''; ?>" placeholder="<?php echo $this->lang->line('school_code'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('school_code'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="school_name"><?php echo $this->lang->line('school_name'); ?> <span class="required">*</span></label>
                                        <input class="form-control col-md-7 col-xs-12" name="school_name" id="school_name" value="<?php echo isset($school) ? $school->school_name : ''; ?>" placeholder="<?php echo $this->lang->line('school_name'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('school_name'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="address"><?php echo $this->lang->line('address'); ?> <span class="required">*</span></label>
                                        <input class="form-control col-md-7 col-xs-12" name="address" id="address" value="<?php echo isset($school) ? $school->address : ''; ?>" placeholder="<?php echo $this->lang->line('address'); ?> " required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('address'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                        <input class="form-control col-md-7 col-xs-12" name="phone" id="phone" value="<?php echo isset($school) ? $school->phone : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="registration_date"><?php echo $this->lang->line('registration_date'); ?></label>
                                        <input class="form-control col-md-7 col-xs-12" name="registration_date" id="edit_registration_date" value="<?php echo isset($school) ? $school->registration_date : ''; ?>" placeholder="<?php echo $this->lang->line('registration_date'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('registration_date'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                        <input class="form-control col-md-7 col-xs-12" name="email" id="email" value="<?php echo isset($school) ? $school->email : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?> " required="required" type="email" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>


                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="school_fax"><?php echo $this->lang->line('school_fax'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="school_fax" id="school_fax" value="<?php echo isset($school) ? $school->school_fax : ''; ?>" placeholder="<?php echo $this->lang->line('school_fax'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('school_fax'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="footer"><?php echo $this->lang->line('footer'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="footer" id="footer" value="<?php echo isset($school) ? $school->footer : ''; ?>" placeholder="<?php echo $this->lang->line('footer'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('footer'); ?></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="column-title"><strong><?php echo $this->lang->line('setting_information'); ?>:</strong></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="currency"><?php echo $this->lang->line('currency'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="currency" id="currency" value="<?php echo isset($school) ? $school->currency : ''; ?>" placeholder="<?php echo $this->lang->line('currency'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('currency'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="currency_symbol"><?php echo $this->lang->line('currency_symbol'); ?> <span class="required">*</span></label>
                                        <input class="form-control col-md-7 col-xs-12" name="currency_symbol" id="currency_symbol" value="<?php echo isset($school) ? $school->currency_symbol : ''; ?>" placeholder="<?php echo $this->lang->line('currency_symbol'); ?> " required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('currency_symbol'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="enable_frontend"><?php echo $this->lang->line('enable_frontend'); ?> <span class="required">*</span></label>
                                        <select class="form-control col-md-7 col-xs-12" name="enable_frontend" required="required">
                                            <option value="1" <?php if (isset($school) && $school->enable_frontend == 1) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('yes'); ?></option>
                                            <option value="0" <?php if (isset($school) && $school->enable_frontend == 0) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('no'); ?></option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('enable_frontend'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="final_result_type"><?php echo $this->lang->line('exam_final_result'); ?> <span class="required">*</span></label>
                                        <select class="form-control col-md-7 col-xs-12" name="final_result_type" required="required">
                                            <option value="0" <?php if (isset($school) && $school->final_result_type == 0) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('avg_of_all_exam'); ?> </option>
                                            <option value="1" <?php if (isset($school) && $school->final_result_type == 1) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('only_of_fianl_exam'); ?> </option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('final_result_type'); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="language"><?php echo $this->lang->line('language'); ?> <span class="required">*</span></label>
                                        <select class="form-control col-md-7 col-xs-12" name="language" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach ($fields as $field) { ?>
                                                <?php if ($field == 'id' || $field == 'label') {
                                                    continue;
                                                } ?>
                                                <option value="<?php echo $field; ?>" <?php if (isset($school) && $school->language == $field) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>><?php echo ucfirst($field); ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('language'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="theme_name"><?php echo $this->lang->line('theme'); ?> <span class="required">*</span></label>
                                        <select class="form-control col-md-7 col-xs-12" name="theme_name">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                            <?php foreach ($themes as $obj) { ?>
                                                <option style="color: #FFF;background-color: <?php echo $obj->color_code; ?>;" value="<?php echo $obj->slug; ?>" <?php if (isset($school) && $school->theme_name == $obj->slug) {
                                                                                                                                                                        echo 'selected="selected"';
                                                                                                                                                                    } ?>><?php echo $obj->name; ?> </option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('theme_name'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="enable_online_admission"><?php echo $this->lang->line('online_admission'); ?> <span class="required">*</span></label>
                                        <select class="form-control col-md-7 col-xs-12" name="enable_online_admission" id="enable_online_admission" required="required">
                                            <option value="0" <?php if (isset($school) && $school->enable_online_admission == 0) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('no'); ?></option>
                                            <option value="1" <?php if (isset($school) && $school->enable_online_admission == 1) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('yes'); ?></option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('enable_online_admission'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="enable_rtl"><?php echo $this->lang->line('enable_rtl'); ?> </label>
                                        <select class="form-control col-md-7 col-xs-12" name="enable_rtl" required="required">
                                            <option value="0" <?php if (isset($school) && $school->enable_rtl == 0) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('no'); ?></option>
                                            <option value="1" <?php if (isset($school) && $school->enable_rtl == 1) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('yes'); ?></option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('enable_rtl'); ?></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="zoom_api_key"><?php echo $this->lang->line('zoom_api_key'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="zoom_api_key" id="zoom_api_key" value="<?php echo isset($school) ? $school->zoom_api_key : ''; ?>" placeholder="<?php echo $this->lang->line('zoom_api_key'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('zoom_api_key'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="zoom_secret"><?php echo $this->lang->line('zoom_secret'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="zoom_secret" id="zoom_secret" value="<?php echo isset($school) ? $school->zoom_secret : ''; ?>" placeholder="<?php echo $this->lang->line('zoom_secret'); ?> " type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('zoom_secret'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="item form-group">
                                        <label for="google_map"><?php echo $this->lang->line('google_map'); ?> </label>
                                        <textarea class="form-control col-md-6 col-xs-12 textarea-4column" name="google_map" id="google_map" placeholder="<?php echo $this->lang->line('google_map'); ?>"><?php echo isset($school) ?  $school->google_map : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('google_map'); ?></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="column-title"><strong><?php echo $this->lang->line('social_information'); ?>:</strong></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="facebook_url"><?php echo $this->lang->line('facebook_url'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="facebook_url" id="facebook_url" value="<?php echo isset($school) ? $school->facebook_url : ''; ?>" placeholder="<?php echo $this->lang->line('facebook_url'); ?> " type="url" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('facebook_url'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="twitter_url"><?php echo $this->lang->line('twitter_url'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="twitter_url" id="twitter_url" value="<?php echo isset($school) ? $school->twitter_url : ''; ?>" placeholder="<?php echo $this->lang->line('twitter_url'); ?> " type="url" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('twitter_url'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="linkedin_url"><?php echo $this->lang->line('linkedin_url'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="linkedin_url" id="linkedin_url" value="<?php echo isset($school) ? $school->linkedin_url : ''; ?>" placeholder="<?php echo $this->lang->line('linkedin_url'); ?> " type="url" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('linkedin_url'); ?></div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="youtube_url"><?php echo $this->lang->line('youtube_url'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="youtube_url" id="youtube_url" value="<?php echo isset($school) ? $school->youtube_url : ''; ?>" placeholder="<?php echo $this->lang->line('youtube_url'); ?> " type="url" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('youtube_url'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="instagram_url"><?php echo $this->lang->line('instagram_url'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="instagram_url" id="instagram_url" value="<?php echo isset($school) ? $school->instagram_url : ''; ?>" placeholder="<?php echo $this->lang->line('instagram_url'); ?> " type="url" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('instagram_url'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="pinterest_url"><?php echo $this->lang->line('pinterest_url'); ?> </label>
                                        <input class="form-control col-md-7 col-xs-12" name="pinterest_url" id="pinterest_url" value="<?php echo isset($school) ? $school->pinterest_url : ''; ?>" placeholder="<?php echo $this->lang->line('pinterest_url'); ?> " type="url" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('pinterest_url'); ?></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5 class="column-title"><strong><?php echo $this->lang->line('other_information'); ?>:</strong></h5>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="logo"><?php echo $this->lang->line('frontend_logo'); ?></label>
                                        <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input class="form-control col-md-7 col-xs-12" name="frontend_logo" id="frontend_logo" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('dimension'); ?>:- Max-W: 150px, Max-H: 90px</div>
                                        <div class="help-block"><?php echo form_error('frontend_logo'); ?></div>
                                        <?php if ($school->frontend_logo) { ?>
                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->frontend_logo; ?>" alt="" width="80" /><br /><br />
                                            <input name="frontend_logo_prev" value="<?php echo isset($school) ? $school->frontend_logo : ''; ?>" type="hidden">
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="logo"><?php echo $this->lang->line('admin_logo'); ?> </label>
                                        <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input class="form-control col-md-7 col-xs-12" name="logo" id="logo" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('dimension'); ?>:- Max-W: 100px, Max-H: 110px</div>
                                        <div class="help-block"><?php echo form_error('logo'); ?></div>
                                        <?php if ($school->logo) { ?>
                                            <img class="logo-identifier" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="80" /><br /><br />
                                            <input name="logo_prev" value="<?php echo isset($school) ? $school->logo : ''; ?>" type="hidden">
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="item form-group">
                                        <label for="status"><?php echo $this->lang->line('status'); ?></label>
                                        <select class="form-control col-md-7 col-xs-12" name="status">
                                            <option value="1" <?php if (isset($school) && $school->status == 1) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('active'); ?></option>
                                            <option value="0" <?php if (isset($school) && $school->status == 0) {
                                                                    echo 'selected="selected"';
                                                                } ?>><?php echo $this->lang->line('in_active'); ?></option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('status'); ?></div>
                                    </div>
                                </div>


                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="hidden" value="<?php echo isset($school) ? $school->id : '' ?>" name="id" />
                                    <a href="<?php echo site_url('administrator/school/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                    <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-school-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $this->lang->line('detail_information'); ?></h4>
            </div>
            <div class="modal-body fn_school_data">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function get_school_modal(school_id) {

        $('.fn_school_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loader.gif" /></p>');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('administrator/school/get_single_school'); ?>",
            data: {
                school_id: school_id
            },
            success: function(response) {
                if (response) {
                    $('.fn_school_data').html(response);
                }
            }
        });
    }
</script>



<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script type="text/javascript">
    function update_subscription_status(school_id, subscription_id) {

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('administrator/school/update_subscription_status'); ?>",
            data: {
                school_id: school_id,
                subscription_id: subscription_id
            },
            async: false,
            success: function(response) {
                if (response) {
                    toastr.success('<?php echo $this->lang->line('update_success'); ?>');
                    return false;
                } else {
                    toastr.error('<?php echo $this->lang->line('already_associated_with_a_school'); ?>');
                    return false;
                }
            }
        });
    }

    // function status_chnage() {


    //         $('input[name="present_<?php echo $row->id ?>"]').click(function(e) {

    //             var status = $(this).val();
    //             console.log(status);


    //         });

    // }
    // $('.present_').click(function(e) {

    //     var gender = $(this).val(); 
    //    alert(gender);
    //    console.log(gender);

    // });


    $('#add_registration_date').datepicker();
    $('#edit_registration_date').datepicker();

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

    $("#add").validate();
    $("#edit").validate();
</script>
<script>
    $(document).ready(function() {
        // Get the checkbox values 
        var yes = []
        
        var dataString = JSON.stringify(yes);
        $(".update_yes").on("change", function() {
            
            $('input[name="update_yes"]:checked').each(function(index, obj) {
            yes.push($(this).val())
               console.log(yes)

        });
        
            //  console.log(val)
                $.ajax({
                url: "<?php echo site_url('exam/resultcard/insert_col_update'); ?>",
                type: 'POST',
                data: {
                    id: yes,
                   
                                    },
                 dataType: 'json',
                success: function(response) {
                    if (response) {
                        alert("ok ");
                      
                    } else {
                        alert("Data added to the Result card");
                    }
                }
            });
           
        })




        // alert(checkedValues)
        // Send an Ajax request to update the database
        // function send_data(val) {
          
        // }

    });
</script>