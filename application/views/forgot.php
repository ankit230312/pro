<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $this->lang->line('lost_your_password'). ' | ' . SMS;  ?></title>
        
         <?php if($this->global_setting->favicon_icon){ ?>
            <link rel="icon" href="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->favicon_icon; ?>" type="image/x-icon" />             
        <?php }else{ ?>
            <link rel="icon" href="<?php echo IMG_URL; ?>favicon.ico" type="image/x-icon" />
        <?php } ?>
            
        <!-- Bootstrap -->
        <link href="<?php echo VENDOR_URL; ?>bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo VENDOR_URL; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">     
        <!-- Custom Theme Style -->
        <link href="<?php echo CSS_URL; ?>custom.css" rel="stylesheet">
        
        <?php $this->load->view('layout/login-css'); ?>  
        
    </head>
    <style>
    .form.login_form.reg4 {
    display: flex;
    flex-direction: column;
    /* justify-content: space-around; */
}
h1.text-center.ju7d5ygd {
    background: transparent;
}
input.form-control.has-feedback-left.outlaw {
    padding: 20px 50px !important;
    font-size: 17px;
    
    margin-bottom: 34px;
    border-radius: 4px;
}
input.form-control.has-feedback-left.outlaw.jjh {
    margin-bottom: 0;
}
a.reset_pass.btn.btn-primary.login-button.hsi965f {
    background-color: transparent !important;
    border: none !important;
    border-bottom: 1px solid #fff !important;
    padding: 0;
    float: right;
    margin-top: 6px;
    border-radius: unset;
}
input.btn.btn-primary.login-button.jrr5fh {
    width: 100%;
    margin-top: 29px;
    border: none !important;
    padding: 7px;
    background-color: #009dc7 !important;
}
.login {
	background: linear-gradient(-45deg, #ee7752, #009dc7, #022780 , #f5901f);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100vh;
    display: flex;
    align-items: center;
}
.login_content{
    margin-top: 39px;
}
@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
.kal__aduein::before {
    content: '';
    position: absolute;
    background: transparent;
    width: 100%;
    height: 100%;
}
/* body.login::before {
    content: '';
    position: absolute;
    background: #000000c7;
    width: 100%;
    height: 100%;
} */
.form-control.has-feedback-left {
    border: .5px solid #001f67;
    padding-left: 45px !important;
}
.fa{
    color: #000 !important;
}
@media screen and (min-width:320px) and (max-width:770px){
    .login_form {

    height: 340px;
    width: 93%;
    margin: auto;
    border-radius: 10px;
}
.login_wrapper h1 {
    font-size: 25px;
}
.login_wrapper{
    padding-top:0
}
}
    </style> 

    <body class="login">     
 
        <div class="login_wrapper">
            <section>
                <center>
                    <?php  if(UPLOAD_PATH.'logo/'.$this->global_setting->brand_logo){ ?>
                        <img  src="<?php echo UPLOAD_PATH.'logo/'.$this->global_setting->brand_logo; ?>" style="max-width: 100px;" alt="">
                    <?php }else{ ?>
                        <img  width="100" height="100" src="<?php echo IMG_URL; ?>/sms-logo.png">
                    <?php } ?>
                </center>
            </section>
            <div class="form login_form">
                <section><h1 class="text-center"><?php echo $this->lang->line('reset_password'); ?></h1></section>    
                <section class="login_content">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <p class="red" style="color:#fff;"><?php echo $this->session->flashdata('error'); ?></p>
                        <p class="green" style="color:#fff;"><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                    <?php echo form_open(site_url('auth/forgotpass'), array('name' => 'login', 'id' => 'login'), ''); ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input type="text" name="username" class="form-control has-feedback-left" placeholder="<?php echo $this->lang->line('username'); ?>" autocomplete="off">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input  class="btn btn-primary login-button" type="submit" name="submit" value="<?php echo $this->lang->line('submit'); ?>"/>
                        <a class="reset_pass btn btn-primary login-button" href="<?php echo site_url('auth/login') ?>"><?php echo $this->lang->line('back_to_login'); ?></a>
                    </div>
                    <div class="clearfix"></div>                        
                    <?php echo form_close(); ?>
                </section>
            </div>
        </div>
    </body>
</html>
