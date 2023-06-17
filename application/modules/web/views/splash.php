<!DOCTYPE html>
<html lang="en">

<head>
  <!--- Basic Page Needs  -->
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Specific Meta  -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-R32H99MSDW"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-R32H99MSDW');
  </script>




  <meta name="google-site-verification" content="XOh3XZy9ybQOuwzx_Iq6w8g9ziybPYWMYw04gC1ogFs" />

  <title><?php echo $title_for_layout; ?></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <?php if ($this->global_setting->favicon_icon) { ?>
    <link rel="icon" href="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->favicon_icon; ?>" type="image/x-icon" />
  <?php } else { ?>
    <link rel="icon" href="<?php echo IMG_URL; ?>favicon.ico" type="image/x-icon" />
  <?php } ?>

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/animate.css">
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/saas-stellarnav.min.css">

  <link rel="stylesheet" href="<?php echo CSS_URL; ?>blog_copy.css">
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>swiper-bundle.min.css">

  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/saas-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <link rel="stylesheet" href="<?php echo CSS_URL; ?>front/saas-responsive.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;700;800&display=swap" rel="stylesheet">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

  <script src="<?php echo JS_URL; ?>front/jquery-3.3.1.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/jquery-ui.js"></script>
  <script src="<?php echo JS_URL; ?>jquery.validate.js"></script>
</head>
<style>
  @font-face {
    font-family: Poppins;
    src: url("https://makemaya.co.in/educlouds/assets/fonts/Poppins.eot?") format("eot"), url("https://makemaya.co.in/educlouds/assets/fonts/Poppins.ttf") format("truetype");
  }

  html {
    overflow-x: hidden !important;
  }

  body {
    overflow-x: hidden;
  }

  p.sd__smallll {
    line-height: 20px;
    font-size: 13px;
    margin-top: -39px;
    margin-bottom: 32px;
  }

  #clouds {



    padding: 193px 0px;
    background: #c9dbe9;
    background: -webkit-linear-gradient(top, #c9dbe9 0%, #fff 100%);
    background: -linear-gradient(top, #c9dbe9 0%, #fff 100%);
    background: -moz-linear-gradient(top, #c9dbe9 0%, #fff 100%);
  }

  p.sd__smallll.dfdf {
    color: #000;
  }

  /*Time to finalise the cloud shape*/
  .cloud {
    width: 200px;
    height: 60px;
    background: #fff;

    border-radius: 200px;
    -moz-border-radius: 200px;
    -webkit-border-radius: 200px;

    position: relative;
  }

  .cloud:before,
  .cloud:after {
    content: '';
    position: absolute;
    background: #fff;
    width: 100px;
    height: 80px;
    position: absolute;
    top: -15px;
    left: 10px;

    border-radius: 100px;
    -moz-border-radius: 100px;
    -webkit-border-radius: 100px;

    -webkit-transform: rotate(30deg);
    transform: rotate(30deg);
    -moz-transform: rotate(30deg);
  }

  .cloud:after {
    width: 120px;
    height: 120px;
    top: -55px;
    left: auto;
    right: 15px;
  }

  /*Time to animate*/
  .x1 {
    -webkit-animation: moveclouds 30s linear infinite;
    -moz-animation: moveclouds 30s linear infinite;
    -o-animation: moveclouds 30s linear infinite;
  }

  /*variable speed, opacity, and position of clouds for realistic effect*/
  .x2 {
    right: 200px;

    -webkit-transform: scale(0.6);
    -moz-transform: scale(0.6);
    transform: scale(0.6);
    opacity: 0.6;
    /*opacity proportional to the size*/

    /*Speed will also be proportional to the size and opacity*/
    /*More the speed. Less the time in 's' = seconds*/
    -webkit-animation: moveclouds 45s linear infinite;
    -moz-animation: moveclouds 45s linear infinite;
    -o-animation: moveclouds 45s linear infinite;
  }

  .x3 {
    right: -250px;
    top: -200px;

    -webkit-transform: scale(0.8);
    -moz-transform: scale(0.8);
    transform: scale(0.8);
    opacity: 0.8;
    /*opacity proportional to the size*/

    -webkit-animation: moveclouds 30s linear infinite;
    -moz-animation: moveclouds 30s linear infinite;
    -o-animation: moveclouds 30s linear infinite;
  }

  .x4 {
    right: 670px;
    top: -250px;

    -webkit-transform: scale(0.75);
    -moz-transform: scale(0.75);
    transform: scale(0.75);
    opacity: 0.75;
    /*opacity proportional to the size*/

    -webkit-animation: moveclouds 18s linear infinite;
    -moz-animation: moveclouds 18s linear infinite;
    -o-animation: moveclouds 18s linear infinite;
  }

  section.benediitss {
    background: #1fa3cf;
  }

  .x5 {
    left: -150px;
    top: -150px;

    -webkit-transform: scale(0.2);
    -moz-transform: scale(0.2);
    transform: scale(0.2);
    opacity: 0.8;
    /*opacity proportional to the size*/

    -webkit-animation: moveclouds 40s linear infinite;
    -moz-animation: moveclouds 40s linear infinite;
    -o-animation: moveclouds 40s linear infinite;
  }

  @-webkit-keyframes moveclouds {
    0% {
      margin-left: 1000px;
    }

    100% {
      margin-left: -1000px;
    }
  }

  @-moz-keyframes moveclouds {
    0% {
      margin-right: 1000px;
    }

    100% {
      margin-right: -1000px;
    }
  }

  @-o-keyframes moveclouds {
    0% {
      margin-right: 1000px;
    }

    100% {
      margin-right: -1000px;
    }
  }


  section.hero__sectionss {
    float: left;
    width: 100%;
    height: 100ch;
  }

  .sd__uyuyulogoo {
    text-align: center;
    margin-top: -352px;
  }

  .logo__cemters img {
    width: 378px;
  }



  .sd__uyuyulogoo {
    text-align: center;
    margin-top: -525px;
    /* display: inline-block; */
    position: relative;
    top: -68px;
  }

  h1.s_7744sddff {
    font-size: 48px;
    width: 43%;
    margin-left: auto;
    margin-right: auto;
    line-height: 52px;
    font-family: Poppins;
    /* text-transform: uppercase; */
    margin-top: 30px;
  }

  #clouds {
    padding: 193px 0;
    background: #c9dbe9;
    background: -webkit-linear-gradient(top, #0398c9 0%, #fff 100%);
    background: -linear-gradient(top, #c9dbe9 0%, #fff 100%);
    background: -moz-linear-gradient(top, #c9dbe9 0%, #fff 100%);
  }

  header {
    background: rgba(255, 255, 255, 0.5);
    position: fixed;
    z-index: 90;
    left: 0;
    right: 0;
    transition: 0.3s;
    background: transparent;
    opacity: 70%;
  }

  header {
    display: none;
  }




  .topheader {
    /* float: left; */
    width: 100%;
    background: #8f75be;
  }

  .topheader ul {
    float: right;
  }

  .topheader ul li {
    display: inline-block;
    margin-left: 15px;
    color: #fff;
    font-size: 15px;
    border-right: 1px solid #fff9;
    padding-right: 21px;
    /* height: 18px; */
    /* position: relative; */
    /* top: 10px; */
    line-height: 3px;
  }

  .topheader ul li:last-child {
    padding-right: 0px;
    border: none;
  }

  .icon img {
    width: 20px;
    /* margin-left: 13px; */
  }

  .icon {
    margin-right: 5px;
  }

  .eds img {
    width: 20px;
    position: relative;

    top: -3px;
  }

  .topheader {
    padding: 6px;
  }

  .logo_sec {
    display: flex;
    justify-content: center;
  }

  .logo_sec img {
    width: 30%;
    margin-top: 19px;
    margin-bottom: 25px;
    height: 60%;
    display: flex;
    margin-left: auto;
    margin-right: auto;
  }

  .login_signup {
    float: right;
  }

  .login_signup ul li {
    display: inline-block;
  }

  .login_signup a {
    background: #193958;
    width: 100px;
    display: inline-block;
    text-align: center;
    padding: 3px;
    color: #fff;
    margin-left: 13px;
  }

  .login_signup {
    float: right;
    margin-top: 22px;
    margin-right: -11px !important;
  }

  .login_signup .fa {
    margin-right: 2px;
    font-size: 15px;
  }

  .menus_ection li {
    display: inline-block;
    margin-left: 9px;
    margin-right: 9px;
    border-right: 1px solid #fff9;
    line-height: 15px;
    padding-right: 33px;
  }

  .menus_ection li:last-child {
    border-right: none;
  }

  .menu_menues {
    margin-top: 10px;
  }

  .mainheader_second {
    /* border-bottom: 1px solid rgba(56,64,80,.14); */
    padding-bottom: 3px;
    float: left;
    width: 100%;
  }

  .scolor a {
    background: #339618;
    padding: 3px;
    border-radius: 4px;
    /* margin-top: -14px; */
    position: relative;
    top: -2px;
  }

  .cilo a {
    color: #000;
    border: ;
    background: transparent;
    line-height: -14px;
    position: relative;
    top: -3px;
  }

  .menu_header {
    /* float: left; */
    /* width: 100%; */
    background: #193958;
    padding: 8px;
  }

  .menus_ection a {
    color: #384050;
    font-size: 16px;
    margin-top: 2px !important;
    display: inline-block;
  }

  .one_two {
    float: left;
    margin-right: 33px;
    margin-bottom: 19px;
    margin-top: 10px;
    text-transform: capitalize;
  }

  /*the container must be positioned relative:*/
  .custom-select {
    position: relative;
    font-family: Arial;
  }

  .custom-select select {
    display: none;
    /*hide original SELECT element:*/
  }

  .select-selected {
    background-color: transparent;
    border: 1px solid hsla(240, 3%, 63%, 0.3) !important;
    padding: 11px !important;
    padding-left: 15px !important;
  }

  /*style the arrow inside the select element:*/
  .select-selected::after {
    position: absolute;
    content: "";
    top: 24px;
    right: 10px;
    width: 0;
    height: 0;
    border: 6px solid transparent;
    border-color: #384050 transparent transparent transparent;
  }

  /*point the arrow upwards when the select box is open (active):*/
  .select-selected.select-arrow-active::after {
    border-color: transparent transparent #384050 transparent;
    top: 24px;
  }

  /*style the items (options), including the selected item:*/
  .select-items div,
  .select-selected {
    color: #384050;
    padding: 8px 16px;
    border: 1px solid transparent;
    border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
    cursor: pointer;
  }

  /*style items (options):*/
  .select-items {
    position: absolute;
    background-color: #fff;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 99;
    box-shadow: 0px 2px 3px -1px #000;
  }

  /*hide the items when the select box is closed:*/
  .select-hide {
    display: none;
  }

  .select-items div:hover,
  .same-as-selected {
    background-color: rgba(0, 0, 0, 0.1);
  }

  .custom-select {
    float: left;
    width: 100%;
    text-align: left;
    margin-bottom: 19px;
  }

  .font-bold.text-normal.text-secondary.text-center.m-t-16 {
    margin-top: 25px !important;
    margin: 0px;
  }

  .signupsection {
    display: none;
  }

  .text-bluehover__linkd {
    font-size: 17px;
    color: #000;
  }

  #fw_al_003 {
    position: relative;
    background: #000;
    float: left;
    width: 100%;
  }

  .left__side_city__menus {
    background: #1407ae;
    color: #fff;
    margin-top: 21px;
  }

  .bannnner-head h1 {
    /* font-family: Soehne; */
    font-style: normal;
    font-weight: bold;
    font-size: 48px;
    line-height: 50px;
    padding-top: 20px;
    padding-bottom: 50px;
    color: #00a6cf;
    width: 86%;
  }

  .bannnner-head {
    padding-top: 50px;
  }

  .bannnner-head small {
    font-size: 18px;
    color: #f5901f;
    font-weight: 600;
    /* font-family: Soehne; */
  }

  .bannnner-head a {
    color: #fff;
    border: 1px solid #f5901f;
    border-radius: 7px !important;
    padding: 10px 20px;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    background: #f5901f;
  }

  .bannnner-head a:hover {
    background: #00a6cf;
    border: 1px solid #00a6cf;
    color: #000;
  }

  .side-svv {
    height: 23vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 35px 0px;
    border: 2px solid #ededed;
    border-radius: 10px;
    margin: 10px 0;
  }

  .side-svv img {
    height: 80%;
    width: 100%;
  }

  .sososi {
    width: 90%;
    margin-left: auto;
    margin-right: auto;
  }

  .bannnner-head .col-md-4 {
    padding-left: 7px;
    padding-right: 7px;
  }

  .heehehad {

    padding-bottom: 120px;
  }

  .runnns-head {
    padding-top: 100px;
  }

  .runnns-head h2 {
    font-weight: 500;
    font-size: 35px;
    text-align: center;
    line-height: 45px;
    color: #000;
  }

  .caared-headdd-one {
    padding-bottom: 15px;
    height: 15vh;
    display: flex;
    align-items: center;
    padding-left: 10px;
  }

  .caared-headdd-two {
    padding-bottom: 15px;
    height: 15vh;
    display: flex;
    align-items: center;
    padding-top: 20px;
    padding-left: 10px;
  }

  .caared-headdd-three {
    padding-bottom: 15px;
    height: 15vh;
    display: flex;
    align-items: center;
    padding-top: 20px;
    padding-left: 10px;
  }

  .caared-headdd-four {
    padding-bottom: 15px;
    height: 15vh;
    display: flex;
    align-items: center;
    padding-top: 20px;
    padding-left: 10px;
  }

  .boorder {
    height: 4px;
    background-image: linear-gradient(270deg, #8975ff, #ce85df 50%, #b3a2fd);
  }

  .boorderr {
    height: 4px;
    background-image: linear-gradient(90deg, #f9bd49, #f1b78a 50%, #e47b74);
  }

  .boorderrr {
    height: 4px;
    background-image: linear-gradient(90deg, #92e5a9, #89dec2 50%, #73abb7);
  }

  .boorderrrr {
    height: 4px;
    background-image: linear-gradient(270deg, #ababab, #c3c3c3 50%, #8d8d8d);
  }

  .runnss-inf {
    padding-top: 20px;
  }

  .runnss-inf h3 {
    font-size: 24px;
    font-weight: 600;
  }

  .back-oone {
    background: linear-gradient(90deg, #e2ddff, #f3e1f7 50%, #ece8fe);
    border-radius: 40px;
  }

  .back-ttwo {
    background: linear-gradient(45deg, #f8dfdc, #fbede2 50%, #f8dfdc);
    border-radius: 40px;
  }

  .back-tthree {
    background: linear-gradient(45deg, #e4f8eb, #e1f6ef 50%, #dcebed);
    border-radius: 40px;
  }

  .back-ffour {
    background: linear-gradient(90deg, #e5e5e5, #f0f0f0 50%, #e7e7e7);
    border-radius: 40px;
  }

  .innner-back {
    width: 90%;
    margin-left: auto;
    margin-right: auto;
  }

  .abbot-runnss p {
    color: #1d1d1d;
    font-size: 16px;
    line-height: 30px;
    font-weight: 400;
    font-family: Soehne;
    padding-bottom: 75px;
    padding-top: 25px;
  }

  .aarrw {
    display: flex;
    justify-content: end;
    margin-right: 20px;
    padding-bottom: 30px;
  }

  .runnnos-coolom .col-md-3 {
    padding-left: 7px;
    padding-right: 7px;
  }

  .school-runns {
    height: auto;
    padding-bottom: 50px;
  }

  .aday {
    background: #fff;
    height: 530px;
    overflow: hidden;
  }

  .aadayy-lloo {
    text-align: center;
  }

  .aadayy-lloo svg {
    position: relative;
    left: 0;
    top: -200px;
    width: 60% !important;
  }

  .aadday-innffffo h3 {
    color: #000;
    font-size: 38px;
    line-height: 1.1em;
    font-weight: 500;
    position: relative;
    top: 198px;
    text-align: center;
    z-index: 9999;
  }

  .aadday-innffffo {
    text-align: center;
  }

  .aadday-innffffo a {
    color: #fff;
    font-size: 15px;
    line-height: 1.1em;
    font-weight: 500;
    position: relative;
    top: 305px;
    text-align: center;
    z-index: 9999;
    border: 2px solid #f5901f;
    border-radius: 10px;
    padding: 8px 20px;
    text-decoration: none;
    background: #f5901f;
  }

  .aadday-innffffo a:hover {
    background: #00a6cf;
    color: #000;
    border: 1px solid #00a6cf;
  }

  .aadday-innffffo h3 span img {
    width: 4%;
  }

  .beene-head h2 {
    width: 71%;
    margin-bottom: 75px;
    text-align: center;
    color: #000;
    font-size: 54px;
    line-height: 1em;
    font-weight: 500;
    margin-left: auto;
    margin-right: auto;
    font-family: Poppins;
    padding-top: 100px;
  }

  .bene-check {
    display: flex;
    width: 92%;
    margin-left: auto;
    margin-right: auto;
    padding-top: 30px;
  }

  .checkk-inddo {
    margin-left: 13px;
    text-align: center;
  }

  .checckk i {
    font-size: 25px;
  }

  .checkk-inddo h4 {
    color: #fff;
    font-size: 18px;
    line-height: 1.2em;
    font-weight: 600;
  }

  .checkk-inddo p {
    color: #fff;
    font-size: 16px;
    line-height: 1.25em;
    font-weight: 400;
  }

  .bennfi-coolun .col-md-4 {
    height: 30vh;
  }

  .col-md-3.ckeccc-borr {
    border-left: 2px dashed #ccc;
    border-right: 2px dashed #ccc;
  }


  .ckeccc-borrwee {
    border-right: 2px dashed #ccc;
  }

  .benediitss {
    height: auto;
    padding-bottom: 70px;
  }

  .caard-one {
    background: linear-gradient(45deg, #efd3ce, #fbf0e0 50%, #fee8bd);
    border-radius: 18px;
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 80px;
  }

  .oonee-headdd {
    padding-top: 50px;
  }

  .oonee-headdd small {
    color: #fe9687;
    font-size: 18px;
    line-height: 1em;
    font-weight: 600;
  }

  .oonee-headdd h4 {
    color: #000;
    font-size: 32px;
    line-height: 1.15em;
    font-weight: 500;
    padding-top: 20px;
    width: 40%;
  }

  .oone-con {
    width: 90%;
    margin-left: auto;
    margin-right: auto;
  }

  .fade {
    opacity: 1;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background: linear-gradient(45deg,
        #f9bd49,
        #f3c795 33%,
        #eb9e78 66%,
        #e37a74) !important;
    color: #fff !important;
    border-radius: 30px;
    padding: 10px 30px;
  }

  .nav-link {
    color: #000 !important;
    font-size: 18px !important;
  }

  .ooone-inffo {
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .nav-pills .nav-link {
    display: flex;
    text-align: left;
    margin-bottom: 20px;
    padding: 10px 30px;
  }

  .nav-pills .nav-link span {
    margin-right: 15px;
  }

  div#v-pills-tab {
    padding-top: 50px;
  }

  .ooone-buttoo {
    text-align: center;
    background: linear-gradient(90deg,
        #e37a74,
        #eb9e78 33%,
        #f3c795 66%,
        #f9bd49);

    border-bottom-left-radius: 18px;
    border-bottom-right-radius: 18px;
    padding: 13px 0;
  }

  .ooone-buttoo a {
    color: #fff;
    font-size: 18px;
    text-decoration: none;
  }

  .caard-two {
    background: linear-gradient(45deg, #ddffd1, #d6f9e8 50%, #dafbed);
    border-radius: 18px;
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 80px;
  }

  .caard-three {
    background: linear-gradient(45deg, #ebdfff, #f2e1f5 50%, #dfe2ff);
    border-radius: 18px;
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 80px;
  }

  .caard-two .ooone-buttoo {
    text-align: center;
    background: linear-gradient(90deg,
        #72aab6,
        #7cd9b2 33%,
        #93e0ce 66%,
        #92e4a9);

    border-bottom-left-radius: 18px;
    border-bottom-right-radius: 18px;
    padding: 13px 0;
  }

  .caard-three .ooone-buttoo {
    text-align: center;
    background: linear-gradient(90deg, #8975ff, #ce85df 50%, #b3a2fd);

    border-bottom-left-radius: 18px;
    border-bottom-right-radius: 18px;
    padding: 13px 0;
  }

  .caard-two .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background: linear-gradient(45deg,
        #92e4a9,
        #93e0ce 33%,
        #7cd9b2 66%,
        #72aab6) !important;
    color: #fff !important;
    border-radius: 30px;
    padding: 10px 30px;
  }

  .caard-three .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background: linear-gradient(45deg, #b3a2fd, #ce85df 50%, #8975ff) !important;
    color: #fff !important;
    border-radius: 30px;
    padding: 10px 30px;
  }

  .deesss-check {
    width: 70%;
    margin-left: auto;
    margin-right: auto;
  }

  .deess {
    display: flex;
    font-size: 18px;
    align-items: center;
  }

  .deess i {
    margin-right: 15px;
    font-size: 30px;
  }

  .deess h4 {
    /* margin-right: 15px; */
    font-size: 35px;
  }

  .ddess-inddo p {
    font-size: 18px;
  }

  .desssigned {
    height: auto;
    padding-bottom: 100px;
  }

  .sollutions {
    background: #0196c1;
    height: 562px;
    overflow: hidden;
    /* padding-bottom: 50px; */
  }

  .ddi-one {
    height: 30vh;
    background: linear-gradient(45deg,
        #1437b9,
        #93abe0 33%,
        #292b74 66%,
        #061870);
    border-bottom-left-radius: 18px;
    border-bottom-right-radius: 18px;
    margin-bottom: 20px;
  }

  .ddi-two {
    background: #fff;
    border-radius: 18px;
    padding: 10px 10px;
    /* border-image: linear-gradient(45deg, #92e4a9, #93e0ce 33%, #7cd9b2 66%, #92e4a9); */
    border: 2px solid #7cd9b2;
  }

  .ddi-two p {
    font-size: 18px;
  }

  .ddi-three {
    height: 300px;
    background: linear-gradient(45deg,
        #1437b9,
        #93abe0 33%,
        #292b74 66%,
        #061870);
    border-top-left-radius: 18px;
    border-top-right-radius: 18px;
    margin-top: 56px;
  }

  .didi-one {
    height: 10vh;
    background: linear-gradient(45deg,
        #1437b9,
        #93abe0 33%,
        #292b74 66%,
        #061870);
    border-bottom-left-radius: 18px;
    border-bottom-right-radius: 18px;
    margin-bottom: 20px;
  }

  .coll-oonee {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
    margin-right: 10px;
  }

  .collumnnss {
    display: flex;
  }

  .diddi-one {
    height: 30vh;
    background: linear-gradient(45deg,
        #1437b9,
        #93abe0 33%,
        #292b74 66%,
        #061870);
    border-top-left-radius: 18px;
    border-bottom-left-radius: 18px;
    margin-bottom: 20px;
  }

  .diddi-two {
    height: 30vh;
    background: linear-gradient(45deg,
        #1437b9,
        #93abe0 33%,
        #292b74 66%,
        #061870);
    border-top-left-radius: 18px;
    border-bottom-left-radius: 18px;
    margin-bottom: 20px;
  }

  .diddi-three {
    height: 19vh;
    background: linear-gradient(45deg,
        #1437b9,
        #93abe0 33%,
        #292b74 66%,
        #061870);
    border-top-left-radius: 18px;
    border-bottom-left-radius: 18px;
  }

  .didi-two {
    margin-bottom: 20px;
  }

  .sooll-headd {
    padding-top: 57px;
    width: 92%;
    margin-left: auto;
    margin-right: auto;
  }

  .ttwo-innff {
    float: left;
    margin-top: 43px;
  }

  .sooll-headd small {
    color: #139c8e;
    font-size: 18px;
    font-weight: bold;
  }

  .sooll-headd h2 {
    font-size: 40px;
    width: 88%;
    font-weight: bold;
    padding-top: 30px;
  }

  .puurrrppoo {
    background: #000;
    border-radius: 18px;
    height: 4px;
    margin-top: 50px;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
  }

  .purrpose .row {
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    padding-top: 80px;
  }

  .puurpo-loggo {
    text-align: center;
    padding-top: 50px;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
  }

  /* .puurpo-loggo img {
  width: 38%;
  margin-left: auto;
  margin-right: auto;
} */

  .porrr small {
    color: #838383;
    font-size: 18px;
    padding-top: 50px;
    font-weight: bold;
  }

  .porrr h4 {
    margin-top: 20px;
    margin-bottom: 40px;
    /* font-family: Soehne, sans-serif; */
    color: #000;
    font-size: 42px;
    line-height: 1em;
    font-weight: 500;
  }

  .porrr a {
    color: #fff;
    text-decoration: none;
    border: 1px solid #f5901f;
    border-radius: 18px;
    font-size: 18px;
    padding: 6px 20px;
    background: #f5901f;
  }

  .porrr a:hover {
    background: #00a6cf;
    color: #000;
    border: 1px solid #00a6cf;
  }

  .purrpose {
    height: auto;
    padding-bottom: 100px;
  }

  .logggos {
    height: auto;
    padding-bottom: 50px;
  }

  .logggos p {
    font-size: 18px;
    width: 43%;
    margin-left: auto;
    margin-right: auto;
    color: #cccccc;
  }

  .immo {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ededed;
    padding: 0px 21px;
    border-radius: 18px;

  }



  .pupuup {
    border-top: 2px dashed #ccc;
    border-bottom: 2px dashed #ccc;
    width: 95%;
    margin-left: auto !important;
    margin-right: auto !important;
  }

  .uppup {
    padding-top: 30px;
    padding-bottom: 30px;
    display: flex;
    align-items: center;
  }

  .coonnt {
    height: auto;
    padding-bottom: 50px;
  }

  .bbacckk {
    background-image: url(assets/images/dreeee.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    height: 88vh;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 18px;
  }

  .coont-ques {
    padding: 4px 30px;
    background: #ffffffe6;
    width: 91%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 18px;
    float: left;
  }

  .coont-ques h2 {
    font-size: 45px;
    padding-bottom: 50px;
  }

  .coonnt .col-md-7 {
    padding-top: 120px;
  }

  .coont-ques a {
    font-size: 18px;
    color: #ffff;
    text-decoration: none;
    padding: 10px 21px;
    border: 1px solid #f5901f;
    border-radius: 18px;
    background: #f5901f;
  }

  .coont-ques a:hover {
    background: #00a6cf;
    border: 1px solid #00a6cf;
    color: #000;
  }

  .footer___p {
    height: auto;
  }

  .footer___p .footto {
    width: 90%;
    margin-left: auto;
    margin-right: auto;
  }

  .immmgg {
    margin-bottom: 30px;
    width: 50%;
  }

  .heehehado {
    padding-top: 20px;
  }

  .foot-hhea h4 {
    font-size: 25px;
    font-weight: bold;
    text-align: center;
  }

  .foot-indd {
    margin-left: 80px;
  }

  .foot-indd ul li {
    font-size: 20px;
    /* font-weight: bold;  */
    /* color: #ccc; */
    margin-bottom: 10px;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
  }

  .ooff-foot {
    padding-top: 20px;
  }

  .ooff-foot ul li {
    font-size: 20px;
    font-weight: bold;
    border-bottom: 2px solid #000;
    margin-bottom: 10px;
    padding-bottom: 10px;
  }

  .bboorr {
    border-top: 2px solid #000;
  }

  .runnnos-coolom {
    padding-top: 50px;
  }

  .marquee div {
    /* display: inline-block; */
    /* width: 300%;
  height: 40px; */

    /* position: absolute; */
    overflow: hidden;

    animation: marquee 80s linear infinite;
  }

  @keyframes marquee {
    0% {
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
    }

    100% {
      -webkit-transform: translate3d(0, -100%, 0);
      transform: translate3d(0, -100%, 0);
    }
  }

  @media screen and (min-width: 320px) and (max-width: 767px) {
    .sososi {
      width: 100%;
      padding-top: 50px;
    }

    .runnnos-coolom .col-md-3 {
      padding-left: 15px;
      padding-right: 15px;
      margin-bottom: 20px;
    }

    .aadayy-lloo svg {
      display: none;
    }

    .aadday-innffffo h3 {
      top: 211x;
    }

    .aadday-innffffo a {
      top: 237px;
    }

    .beene-head h2 {
      width: 100%;
    }

    .bennfi-coolun .col-md-4 {
      height: 16vh;
    }

    .caard-one {
      width: 90%;
    }

    .oonee-headdd h4 {
      width: 90%;
    }

    .d-flex {
      flex-direction: column;
    }

    .ooone-inffo {
      padding-top: 0;
    }

    .caard-two {
      width: 90%;
    }

    .caard-three {
      width: 90%;
    }

    .collumnnss {
      display: none;
    }

    .sooll-headd {
      width: 80%;
      padding-top: 60px;
    }

    .sollutions {
      height: 400px;
    }

    .sooll-headd h2 {
      width: 100%;
    }

    .puurpo-loggo {
      width: 100%;
    }

    .purrpose .row {
      width: 100%;
    }

    .porrr {
      padding-top: 50px;
      text-align: center;
    }

    .uppup {
      flex-direction: column;
    }

    .immo {
      margin-bottom: 20px;
    }

    .coont-ques {
      padding: 25px 42px;
      background: #fff;
      width: 91%;
      margin-left: auto;
      margin-right: auto;
      border-radius: 18px;
    }

    .bbacckk {
      height: 56vh;
    }

    .coont-ques h2 {
      font-size: 40px;
      padding-bottom: 20px;
    }

    .footto .col-md-3 {
      text-align: center;
    }

    .foot-indd {
      margin-left: 0;
    }

    .bannnner-head h1 {
      font-size: 76px;
      line-height: 77px;
    }

    .mmed {
      width: 80% !important;
      margin-left: auto;
      margin-right: auto;
    }

    .aadday-innffffo h3 span img {
      width: 10%;
    }
  }


  .s_sd_logod li {
    list-style: none;
    text-decoration: none;
  }

  .s_sd_logod li::before {
    display: none;
  }

  .s_sd_logod li {
    display: inline-block;
    margin-right: 7px;
  }

  .s_sd_logod li {
    display: inline-block;
    margin-right: 7px;
    width: 13.5%;
  }

  .s__headingss {
    float: left;
    width: 100%;
    text-align: center;
  }

  .s__headingss h3 {
    font-size: 43px;
    margin-bottom: 39px;
    font-family: Poppins;
  }

  section.logggos {
    float: left;
    width: 100%;
    margin-top: -100px;
  }

  .col-md-6.mmed {
    padding-top: 22px;
  }


  .col-md-6.mmed {
    padding-top: 100px;
  }

  .col-md-6.mmed h1 {
    color: #000;
    font-family: Poppins;
  }

  .bannnner-head a {
    color: #fff;
    border: 1px solid #0096c1;
    border-radius: 18px;
    padding: 10px 20px;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    background: #0096c1;
  }

  .sososi {
    width: 100%;

  }

  .row.sososi {
    margin-top: 33px;
  }

  /* Start Gallery CSS */
  .thumb {
    margin-bottom: 15px;
  }

  .thumb:last-child {
    margin-bottom: 0;
  }

  .thumb figure img {
    -webkit-filter: grayscale(0%);
    filter: grayscale(0%);
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
  }

  .thumb figure:hover img {
    -webkit-filter: grayscale(0);
    filter: grayscale(0);
  }

  .row.gallery .s__774qws {
    float: left;
    width: 20%;
  }

  /*
	.row.gallery .s__774qws{
		display: none;
	}
	
*/
  .row.gallery .s__774qws:nth-child(1) {
    display: block;
  }

  .row.gallery .s__774qws:nth-child(2) {
    display: block;
  }

  .row.gallery .s__774qws:nth-child(3) {
    display: block;
  }

  .row.gallery .s__774qws:nth-child(4) {
    display: block;
  }

  .row.gallery .s__774qws:nth-child(5) {
    display: block;
  }

  .img__gallerys .row.gallery {
    margin: 0px;
  }

  section.img__gallerys .container-fluid {
    border-top: 2px dashed #ccc;
    border-bottom: 2px dashed #ccc;
    width: 94%;
    padding-bottom: 40px;
  }

  section.clouds__imdf {
    float: left;
    width: 100%;
    background: #fff;
  }

  section.clouds__imdf {
    padding-top: 77px;
    padding-bottom: 77px;
  }

  .imagesdd {
    text-align: center;
  }

  .imagesdd img {
    width: 50%;
    margin-top: -46px;
    margin-bottom: -26px;
  }

  h3.con__sff {
    text-align: center;
    color: #fff;
    font-size: 58px;
    text-transform: capitalize;
    padding-bottom: 80px;
    letter-spacing: 3px;
    font-family: Poppins;
  }

  section.img__gallerys {
    float: left;
    width: 100%;
  }

  section.benediitss {
    float: left;
    width: 100%;
  }

  section.caards {
    float: left;
    width: 100%;
  }

  footer {
    background: #000;
    color: #ffffff;
    padding: 100px 0 0;
  }

  .footer-widget ul li::before {
    display: none;
  }

  .footer-widget ul li a {
    color: #000;
    font-size: 14px;
    opacity: 0.8;
  }


  footer .col-xl-4.col-sm-6.col-12:nth-child(2) {
    padding-right: 20px;
  }

  footer .col-xl-4.col-sm-6.col-12:nth-child(2) {
    padding-left: 131px;
  }

  .footer-widget .info li {
    color: #000;
    opacity: 0.8;
    font-size: 14px;
  }

  .footer-widget p {
    color: #000;
    font-size: 15px;
    line-height: 26px;
    opacity: 0.8;
  }

  .footer-widget ul li {
    color: #000;
    margin-bottom: 5px;
  }

  ul.social li a {
    background: #009dc738;
    color: #000 !important;
    width: 30px;
    height: 30px;
    display: inline-block;
    text-align: center;
    border-radius: 35px;
    line-height: 34px;
  }

  ul.social {
    margin-top: -24px;
  }

  .footer-widget {
    margin-top: -34px;
  }

  .footer-widget .title {
    color: #000;
    font-size: 17px;
    line-height: 28px;
    margin: 0 0 35px;
    letter-spacing: 1px;
  }

  .beene-head h2 {
    width: 70%;
    margin-bottom: 75px;
    text-align: center;
    color: #000;
    font-size: 48px;
    line-height: 1em;

    margin-left: auto;
    margin-right: auto;
    font-family: 'Poppins';
    padding-top: 100px;
  }

  .social.sdds li::before {

    display: none;
  }

  ul.social.sdds li {
    display: inline-block;
    margin-right: 4px;
  }

  .email__and__phone li {
    display: inline-block;
    margin-left: 35px;
  }

  .email__and__phone {
    float: right;
  }

  ul.social.sdds {
    margin-top: 0px;
  }

  .top_header__s {
    position: absolute;
    width: 100%;
    top: 12px;
    border-bottom: 1px solid #ffffff40;
  }

  .top_header__s .container-fluid {
    width: 94%;
  }

  .top_header__s {
    position: absolute;
    width: 100%;
    top: 5px;
    border-bottom: 1px solid #ffffff40;
    padding-bottom: 4px;
  }

  .email__and__phone a {
    font-size: 14px;
    color: #fff;
  }

  .email__and__phone li {
    display: inline-block;
    margin-left: 10px;
  }

  .email__and__phone li:first-child {
    border-left: none;
  }

  .email__and__phone li {
    border-left: 1px solid #ffffff5e;
    padding-left: 12px;
  }

  .email__and__phone span.icon {
    color: #ffffffd1;
    position: relative;
    top: 2px;
  }

  ul.social.sdds a {
    border: 1px solid #ffffffa3;
    font-size: 13px;
    line-height: 24px;
    width: 25px;
    height: 25px;
  }

  .sooll-headd h2 {
    font-size: 63px;
    width: 88%;
    font-weight: 600 !important;
    padding-top: 25px;
    font-family: Poppins;
    line-height: 53px;
  }

  .ttwo-innff {
    float: left;
  }

  section.img__gallerys .container-fluid {
    border-top: none;
    border-bottom: none;
    width: 94%;
    padding-bottom: 40px;
  }

  .row.gallery .s__774qws {

    padding: 7px;
  }

  h1.my-4.text-center.text-lg-center {
    font-family: 'Poppins';
    font-size: 45px;
  }

  section.img__gallerys {
    float: left;
    width: 100%;
    padding-top: 41px;
    padding-bottom: 22px;
  }

  section.school-runns {
    float: left;
    width: 100%;
  }

  .runnns-head h2 {
    font-weight: 500;
    font-size: 50px;
    text-align: center;
    line-height: 45px;
    color: #000;
    font-family: 'Poppins';
  }

  .runnns-head {
    padding-bottom: 35px;
  }

  .abbot-runnss p {
    color: #1d1d1d;
    font-size: 16px;
    line-height: 30px;
    font-weight: 400;
    font-family: arial;
    padding-bottom: 16px;
    padding-top: 25px;
  }

  .purrpose .row {
    width: 81%;
    margin-left: auto;
    margin-right: auto;
    padding-top: 80px;
  }

  .porrr h4 {
    margin-top: 20px;
    margin-bottom: 40px;
    font-family: 'Poppins';
    color: #000;
    font-size: 58px;
    line-height: 1em;
    font-weight: 500;
  }

  .puurpo-loggo {
    text-align: center;
    padding-top: 13px;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
  }

  .benediitss .container {
    border-bottom: none;
    margin-bottom: 15px;
    padding-bottom: 45px;
    margin-bottom: -88px;
  }

  .coont-ques h2 {
    font-size: 45px;
    font-family: 'Poppins';
    padding-bottom: 50px;
    line-height: 45px;
  }

  .aday {
    float: left;
    width: 100%;
  }

  .heding__Dfe h2 {
    text-align: center;
    font-family: 'Poppins';
    font-size: 53px;
    padding-top: 84px;
    padding-bottom: 88px;
    text-transform: capitalize;
  }

  .copyright {
    border-top: 1px solid #f3f3f347;
    padding: 18px 0;
  }

  .school-runns .runnns-head {
    padding-top: 0px;
  }

  .img__gallerys .container {
    width: 83%;
    max-width: 83%;
  }

  .row.gallery .col-md-3 {
    padding: 4px;
  }

  .row.gallery .col-md-6 {
    padding: 4px;
  }

  .row.gallery .col-md-2 {
    padding: 4px;
  }

  .row.gallery .col-md-5 {
    padding: 4px;
  }

  .s__listingg {
    height: 260px;
    overflow: hidden;
  }

  .s__listingg img.img-fluid.img-thumbnail {
    height: auto;
    width: 100%;
  }

  .img-thumbnail {
    padding: 0px;
    background-color: transparent;
    border: 0px;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
  }

  .side-svvsss img {
    width: 83%;
  }

  section.bannnner-head {
    float: left;
    width: 100%;
    padding-top: 0px;
  }

  section.bannnner-head.ad__99dd {
    background: #fff;
  }

  section.bannnner-head.ad__99dd .side-svvsss img {
    width: 72%;
  }

  section.bannnner-head.ad__99dd .heehehad {
    padding-bottom: 43px;
  }

  section.bannnner-head.ad__99dd .col-md-6.mmed h1 {
    color: #000;
    font-size: 48px;
    line-height: 59px;
  }

  section.bannnner-head.ad__99dd a {
    border: 1px solid #ffffff85;
  }

  section.bannnner-head.sw__00999we .side-svvsss {
    padding-top: 48px;
  }

  section.bannnner-head.sw__00999 .side-svvsss {
    padding-top: 31px;
    margin-bottom: -73px;
  }

  .sollutions {
    float: left;
    width: 100%;
  }

  section.hero__sectionss {
    float: left;
    width: 100%;
    height: 100ch;
    margin-top: -56px;
  }

  .ddi-one {
    margin-bottom: 9px;
    float: left;
    width: 100%;
  }

  .s__listingg {

    border-radius: 11px;
  }







  .testim .wrap {
    position: relative;
    width: 100%;
    max-width: 1020px;
    padding: 40px 20px;
    margin: auto;
  }

  .testim .arrow {
    display: block;
    position: absolute;
    color: #333;
    cursor: pointer;
    font-size: 2em;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    -webkit-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    padding: 5px;
    z-index: 22222222;
  }

  .testim .arrow:before {
    cursor: pointer;
  }

  .testim .arrow:hover {
    color: #ea830e;
  }


  .testim .arrow.left {
    left: 10px;
  }

  .testim .arrow.right {
    right: 10px;
  }

  .testim .dots {
    text-align: center;
    position: absolute;
    width: 100%;
    bottom: 60px;
    left: 0;
    display: block;
    z-index: 3333;
    height: 12px;
  }

  .testim .dots .dot {
    list-style-type: none;
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 1px solid #eee;
    margin: 0 10px;
    cursor: pointer;
    -webkit-transition: all .5s ease-in-out;
    -ms-transition: all .5s ease-in-out;
    -moz-transition: all .5s ease-in-out;
    -o-transition: all .5s ease-in-out;
    transition: all .5s ease-in-out;
    position: relative;
  }

  .testim .dots .dot.active,
  .testim .dots .dot:hover {
    background: #ea830e;
    border-color: #ea830e;
  }

  .testim .dots .dot.active {
    -webkit-animation: testim-scale .5s ease-in-out forwards;
    -moz-animation: testim-scale .5s ease-in-out forwards;
    -ms-animation: testim-scale .5s ease-in-out forwards;
    -o-animation: testim-scale .5s ease-in-out forwards;
    animation: testim-scale .5s ease-in-out forwards;
  }

  .testim .cont {
    position: relative;
    overflow: hidden;
  }

  .testim .cont>div {
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    padding: 0 0 70px 0;
    opacity: 0;
  }

  .testim .cont>div.inactive {
    opacity: 1;
  }


  .testim .cont>div.active {
    position: relative;
    opacity: 1;
  }


  .testim .cont div .img img {
    display: block;
    width: 100px;
    height: 100px;
    margin: auto;
    border-radius: 50%;
  }

  .testim .cont div h2 {
    color: #ea830e;
    font-size: 1em;
    margin: 15px 0;
  }

  .testim .cont div p {
    font-size: 1.15em;
    color: #000;
    width: 80%;
    margin: auto;
  }

  .testim .cont div.active .img img {
    -webkit-animation: testim-show .5s ease-in-out forwards;
    -moz-animation: testim-show .5s ease-in-out forwards;
    -ms-animation: testim-show .5s ease-in-out forwards;
    -o-animation: testim-show .5s ease-in-out forwards;
    animation: testim-show .5s ease-in-out forwards;
  }

  .testim .cont div.active h2 {
    -webkit-animation: testim-content-in .4s ease-in-out forwards;
    -moz-animation: testim-content-in .4s ease-in-out forwards;
    -ms-animation: testim-content-in .4s ease-in-out forwards;
    -o-animation: testim-content-in .4s ease-in-out forwards;
    animation: testim-content-in .4s ease-in-out forwards;
  }

  .testim .cont div.active p {
    -webkit-animation: testim-content-in .5s ease-in-out forwards;
    -moz-animation: testim-content-in .5s ease-in-out forwards;
    -ms-animation: testim-content-in .5s ease-in-out forwards;
    -o-animation: testim-content-in .5s ease-in-out forwards;
    animation: testim-content-in .5s ease-in-out forwards;
  }

  .testim .cont div.inactive .img img {
    -webkit-animation: testim-hide .5s ease-in-out forwards;
    -moz-animation: testim-hide .5s ease-in-out forwards;
    -ms-animation: testim-hide .5s ease-in-out forwards;
    -o-animation: testim-hide .5s ease-in-out forwards;
    animation: testim-hide .5s ease-in-out forwards;
  }

  .testim .cont div.inactive h2 {
    -webkit-animation: testim-content-out .4s ease-in-out forwards;
    -moz-animation: testim-content-out .4s ease-in-out forwards;
    -ms-animation: testim-content-out .4s ease-in-out forwards;
    -o-animation: testim-content-out .4s ease-in-out forwards;
    animation: testim-content-out .4s ease-in-out forwards;
  }

  .testim .cont div.inactive p {
    -webkit-animation: testim-content-out .5s ease-in-out forwards;
    -moz-animation: testim-content-out .5s ease-in-out forwards;
    -ms-animation: testim-content-out .5s ease-in-out forwards;
    -o-animation: testim-content-out .5s ease-in-out forwards;
    animation: testim-content-out .5s ease-in-out forwards;
  }

  @-webkit-keyframes testim-scale {
    0% {
      -webkit-box-shadow: 0px 0px 0px 0px #eee;
      box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
      -webkit-box-shadow: 0px 0px 10px 5px #eee;
      box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
      -webkit-box-shadow: 0px 0px 10px 5px #ea830e;
      box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
      -webkit-box-shadow: 0px 0px 0px 0px #ea830e;
      box-shadow: 0px 0px 0px 0px #ea830e;
    }
  }

  @-moz-keyframes testim-scale {
    0% {
      -moz-box-shadow: 0px 0px 0px 0px #eee;
      box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
      -moz-box-shadow: 0px 0px 10px 5px #eee;
      box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
      -moz-box-shadow: 0px 0px 10px 5px #ea830e;
      box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
      -moz-box-shadow: 0px 0px 0px 0px #ea830e;
      box-shadow: 0px 0px 0px 0px #ea830e;
    }
  }

  @-ms-keyframes testim-scale {
    0% {
      -ms-box-shadow: 0px 0px 0px 0px #eee;
      box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
      -ms-box-shadow: 0px 0px 10px 5px #eee;
      box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
      -ms-box-shadow: 0px 0px 10px 5px #ea830e;
      box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
      -ms-box-shadow: 0px 0px 0px 0px #ea830e;
      box-shadow: 0px 0px 0px 0px #ea830e;
    }
  }

  @-o-keyframes testim-scale {
    0% {
      -o-box-shadow: 0px 0px 0px 0px #eee;
      box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
      -o-box-shadow: 0px 0px 10px 5px #eee;
      box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
      -o-box-shadow: 0px 0px 10px 5px #ea830e;
      box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
      -o-box-shadow: 0px 0px 0px 0px #ea830e;
      box-shadow: 0px 0px 0px 0px #ea830e;
    }
  }

  @keyframes testim-scale {
    0% {
      box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
      box-shadow: 0px 0px 10px 5px #eee;
    }

    70% {
      box-shadow: 0px 0px 10px 5px #ea830e;
    }

    100% {
      box-shadow: 0px 0px 0px 0px #ea830e;
    }
  }

  @-webkit-keyframes testim-content-in {
    from {
      opacity: 0;
      -webkit-transform: translateY(100%);
      transform: translateY(100%);
    }

    to {
      opacity: 1;
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }
  }

  @-moz-keyframes testim-content-in {
    from {
      opacity: 0;
      -moz-transform: translateY(100%);
      transform: translateY(100%);
    }

    to {
      opacity: 1;
      -moz-transform: translateY(0);
      transform: translateY(0);
    }
  }

  @-ms-keyframes testim-content-in {
    from {
      opacity: 0;
      -ms-transform: translateY(100%);
      transform: translateY(100%);
    }

    to {
      opacity: 1;
      -ms-transform: translateY(0);
      transform: translateY(0);
    }
  }

  @-o-keyframes testim-content-in {
    from {
      opacity: 0;
      -o-transform: translateY(100%);
      transform: translateY(100%);
    }

    to {
      opacity: 1;
      -o-transform: translateY(0);
      transform: translateY(0);
    }
  }

  @keyframes testim-content-in {
    from {
      opacity: 0;
      transform: translateY(100%);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @-webkit-keyframes testim-content-out {
    from {
      opacity: 1;
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }

    to {
      opacity: 0;
      -webkit-transform: translateY(-100%);
      transform: translateY(-100%);
    }
  }

  @-moz-keyframes testim-content-out {
    from {
      opacity: 1;
      -moz-transform: translateY(0);
      transform: translateY(0);
    }

    to {
      opacity: 0;
      -moz-transform: translateY(-100%);
      transform: translateY(-100%);
    }
  }

  @-ms-keyframes testim-content-out {
    from {
      opacity: 1;
      -ms-transform: translateY(0);
      transform: translateY(0);
    }

    to {
      opacity: 0;
      -ms-transform: translateY(-100%);
      transform: translateY(-100%);
    }
  }

  @-o-keyframes testim-content-out {
    from {
      opacity: 1;
      -o-transform: translateY(0);
      transform: translateY(0);
    }

    to {
      opacity: 0;
      transform: translateY(-100%);
      transform: translateY(-100%);
    }
  }

  @keyframes testim-content-out {
    from {
      opacity: 1;
      transform: translateY(0);
    }

    to {
      opacity: 0;
      transform: translateY(-100%);
    }
  }

  @-webkit-keyframes testim-show {
    from {
      opacity: 0;
      -webkit-transform: scale(0);
      transform: scale(0);
    }

    to {
      opacity: 1;
      -webkit-transform: scale(1);
      transform: scale(1);
    }
  }

  @-moz-keyframes testim-show {
    from {
      opacity: 0;
      -moz-transform: scale(0);
      transform: scale(0);
    }

    to {
      opacity: 1;
      -moz-transform: scale(1);
      transform: scale(1);
    }
  }

  @-ms-keyframes testim-show {
    from {
      opacity: 0;
      -ms-transform: scale(0);
      transform: scale(0);
    }

    to {
      opacity: 1;
      -ms-transform: scale(1);
      transform: scale(1);
    }
  }

  @-o-keyframes testim-show {
    from {
      opacity: 0;
      -o-transform: scale(0);
      transform: scale(0);
    }

    to {
      opacity: 1;
      -o-transform: scale(1);
      transform: scale(1);
    }
  }

  @keyframes testim-show {
    from {
      opacity: 0;
      transform: scale(0);
    }

    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  @-webkit-keyframes testim-hide {
    from {
      opacity: 1;
      -webkit-transform: scale(1);
      transform: scale(1);
    }

    to {
      opacity: 0;
      -webkit-transform: scale(0);
      transform: scale(0);
    }
  }

  @-moz-keyframes testim-hide {
    from {
      opacity: 1;
      -moz-transform: scale(1);
      transform: scale(1);
    }

    to {
      opacity: 0;
      -moz-transform: scale(0);
      transform: scale(0);
    }
  }

  @-ms-keyframes testim-hide {
    from {
      opacity: 1;
      -ms-transform: scale(1);
      transform: scale(1);
    }

    to {
      opacity: 0;
      -ms-transform: scale(0);
      transform: scale(0);
    }
  }

  @-o-keyframes testim-hide {
    from {
      opacity: 1;
      -o-transform: scale(1);
      transform: scale(1);
    }

    to {
      opacity: 0;
      -o-transform: scale(0);
      transform: scale(0);
    }
  }

  @keyframes testim-hide {
    from {
      opacity: 1;
      transform: scale(1);
    }

    to {
      opacity: 0;
      transform: scale(0);
    }
  }

  @media all and (max-width: 300px) {
    body {
      font-size: 14px;
    }
  }

  @media all and (max-width: 500px) {
    .testim .arrow {
      font-size: 1.5em;
    }

    .testim .cont div p {
      line-height: 25px;
    }

  }

  section.s___etestimonilss {
    float: left;
    width: 100%;
  }

  #testim ul li::before {
    display: none;
  }

  h3.quottss {
    text-align: center;
    color: #000;
    font-size: 40px;
    padding-top: 36px;
  }

  .testim .cont div h2 {
    color: #ea830e;
    font-size: 1em;
    margin: 0px 0;
  }

  .testim .cont div h2 {
    color: #000;
    font-size: 35px;
    margin: 0px 0;
    width: 100%;
  }

  .sooll-headd {
    padding-top: 103px;
    width: 92%;
    margin-left: auto;
    margin-right: auto;
  }

  section.logggos.dffgg {
    margin-top: 54px;
  }

  .single-subscription.text-right input#submit {
    width: 100%;
    background: #0096c1;
    border: none;
    color: #fff;
    border-radius: 5px;
    font-size: 19px;
    letter-spacing: 1px;
  }

  .single-subscription select,
  .single-subscription input[type="text"],
  .single-subscription input[type="email"],
  .single-subscription input[type="number"],
  .single-subscription textarea {
    border: 1px solid #22222240;
    height: 56px;
    border-radius: 5px;
    padding: 0 20px;
    font-size: 16px;
    height: 42px;
    width: 100%;
    background: #ffffff;
  }

  section.school-runns {
    padding-top: 54px;
    padding-bottom: 73px;
  }

  section.aday {
    margin-top: 68px;
  }

  section {
    float: left;
    width: 100%;
  }

  footer {
    background: #000;
    color: #ffffff;
    padding: 100px 0 0;
    float: left;
    width: 100%;
  }

  .testim .cont div h2 {
    color: #000;
    font-size: 35px;
    margin: 0px 0;
    width: 100%;
    margin-bottom: 0px !important;
    padding-bottom: 12px;
  }

  .ddi-two p {
    font-size: 15px;
    line-height: 21px;
    padding-top: 19px;
    transition: .6s;
  }

  .sollutions .container-fluid {
    padding-right: 0px;
  }

  section.sollutions .col-md-7 {
    padding-right: 0px;
  }

  .sooll-headd.ddffe h2 {
    color: #fff;
    margin-bottom: 28px;
  }

  .sooll-headd.ddffe p {
    color: #fff;
    width: 82%;
    line-height: 28px;
  }

  .sooll-headd.ddffe {
    padding-left: 79px;
  }

  section.sollutions {
    margin-top: 81px;
  }

  .checkk-inddo p {
    line-height: 17px;
    font-size: 13px;
    margin-top: 15px;
  }

  p.s__788744 {
    position: relative;
    z-index: 999;
    font-size: 15px;
    margin-top: 26px;
    margin-bottom: 23px;
  }

  span.s__000 {
    background: #fff;
    padding: 7px 19px;
    border-radius: 37px;
    font-weight: 600;
    font-size: 14px;
    color: #444;
  }

  ul.s_sd_logod {
    width: 100%;
  }

  .immo {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ededed;
    padding: 15px 1px;
    border-radius: 18px;
    height: auto;
    width: 100%;
  }

  .immo img {
    height: auto;
  }

  .immo img {
    height: auto;
    padding: 17px;
  }

  .s_sd_logod li {
    display: inline-block;
    margin-right: 7px;
    width: 13.5%;
    margin-bottom: 26px;
  }

  section.coonnt {
    margin-top: 92px;
    margin-bottom: 42px;
  }

  footer {
    background: #fff;
    color: #000;

  }

  .copyright p {
    color: #000;
    font-size: 15px;
    line-height: 24px;
    text-align: center;
  }

  .copyright {
    border-top: 1px solid #2222223d;
  }

  .footer-widget .logo img {
    height: auto;
    width: 42%;
  }

  .top_header__s li a i {
    color: #fff !important;
  }

  #testim-content h2 {
    font-size: 24px;
  }

  .clients__logos img {
    border-radius: 65%;
    width: 150px;
    margin-bottom: 19px;
  }

  .side-svvsss img {
    width: 74%;
  }
</style>

<body>

  <style>
    .slider {

      position: relative;
      width: 100%;

      display: grid;
      place-items: center;
      overflow: hidden;
    }

    .slider::before {
      left: 0;
      top: 0;
    }

    .slider::after {
      right: 0;
      top: 0;
      transform: rotateZ(180deg);
    }

    /*  IMPORTANT CODE BELOW */

    .slide-track {
      width: calc(150px * 20);
      display: flex;
      animation: scroll 20s linear infinite;
      justify-content: space-between;
    }

    .slide-track2 {
      width: calc(150px * 15);
      display: flex;
      animation: scroll2 15s linear infinite;
      justify-content: space-between;
    }

    .slide {


      display: grid;
      place-items: center;
      transition: 0.5s;
      cursor: pointer;
    }


    @keyframes scroll {
      0% {
        transform: translateX(0px);
      }

      100% {
        transform: translateX(calc(-150px * 10));
      }
    }

    @keyframes scroll2 {
      0% {
        transform: translateX(0px);
      }

      100% {
        transform: translateX(calc(-150px * 5));
      }
    }

    @media screen and (max-width: 768px) {
      .slide-track {
        width: calc(80px * 20);
      }

      .slide-track2 {
        width: calc(80px * 15);
      }

      .slide {
        width: auto;
      }

      .immo img {
        height: auto;
        width: 100%;
      }

      @keyframes scroll {
        0% {
          transform: translateX(0px);
        }

        100% {
          transform: translateX(calc(-80px * 10));
        }
      }

      @keyframes scroll2 {
        0% {
          transform: translateX(0px);
        }

        100% {
          transform: translateX(calc(-80px * 5));
        }
      }
    }

    .s___slider__sdd .container {
      width: 90%;
      max-width: 90%;
    }

    section.s___slider__sdd {
      margin-top: -96px;
    }

    .slide {
      padding: 8px;
    }

    .immo img {
      height: auto;
      padding: 8px;
    }

    .s__00887744 p {
      width: 100%;
      text-align: center;
      width: 67%;
      margin-left: auto;
      margin-right: auto;
      line-height: 21px;
      font-size: 16px;
      position: relative;
      top: -30px;
      margin-bottom: 45px;
    }

    h3.con__sff {
      color: #fff;
      font-size: 51px;
    }

    .floating__img {
      position: relative;
      right: -46px;
    }

    span.sdd {
      position: relative;
      top: -146px;
      left: 288px;
      color: #fff;
      background: #1fa3cf;
      font-size: 16px;
      padding: 5px 17px;
      border-radius: 29px;
    }

    span.sddsss {
      position: relative;
      left: 344px;
      top: 197px;
      color: #fff;
      background: #1fa3cf;
      font-size: 16px;
      padding: 5px 17px;
      border-radius: 29px;
    }

    span.sddsssssteach {
      position: relative;
      top: -65px;
      left: -91px;
      background: #1fa3cf;
      font-size: 16px;
      padding: 5px 17px;
      border-radius: 29px;
      color: #fff;
    }

    span.sddsssssadmin {
      position: relative;
      left: -163px;
      top: 40px;
      background: #1fa3cf;
      font-size: 16px;
      padding: 5px 17px;
      border-radius: 29px;
      color: #fff;
    }

    section.benediitss {
      padding-bottom: 125px;
    }

    .s__077444s h2 {
      padding-top: 0px;
      color: #fff;
      padding-bottom: 0px;
      margin-bottom: 0px;
    }

    .s__077444s p {
      color: #fff;
      width: 100%;
      text-align: center;
      width: 61%;
      margin-left: auto;
      margin-right: auto;
      line-height: 23px;
      margin-top: 26px;
      margin-bottom: 75px;
      font-weight: normal;
      font-size: 14px;
    }

    section.benediitss {
      padding-top: 64px;
      /* display: none; */
    }

    .s__077444s h5 {
      text-align: center;
      color: #ffeebee0;
      position: relative;
      top: -11px;
    }

    .s__077444s h5 {
      text-align: center;
      color: #ffffffe0;
    }

    section.img__gallerys {
      background: #fff;
      margin-top: 41px;
      padding-bottom: 40px;
    }

    section.aday {
      margin-top: 0px;
    }

    section#_subscription {
      background: #0196c1;
    }

    .single-subscription input {
      background: transparent !important;
      border: none !important;
      color: #000 !important;
      border-bottom: 1px solid #939393 !important;
      border-radius: 0px !important;
      padding-left: 0px !important;
    }

    .single-subscription textarea#address {
      background: transparent;
      border: none;
      border-bottom: 1px solid #fff;
      border-radius: 0px;
      height: 85px;
      padding-left: 0px;
      color: #fff;
    }



    .subscription-area ::placeholder {
      /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: #fff;
      opacity: 1;
      /* Firefox */
    }

    .subscription-area :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: #fff;
    }

    .subscription-area ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: #fff;
    }

    .single-subscription.text-right input#submit {
      background: #0196c1 !important;
      color: #fff !important;
      border-radius: 35px !important;
    }

    .logo_sd img {
      width: 83%;
    }

    section#_subscription {
      padding-top: 60px;
    }

    .s__sdsjk i {
      color: #fff;
      font-size: 26px;
      margin-bottom: 31px;
      border: 1px solid #ffffff57;
      width: 80px;
      height: 80px;
      text-align: center;
      line-height: 47px;
      border-radius: 41px;
      font-size: 37px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: auto;
      margin-right: auto;
    }

    .ddi-two {
      margin-bottom: 15px;
    }

    .collumnnss.marquee {
      position: relative;
      left: 104px;
    }

    .as___7744455 {
      text-align: center;
      margin-bottom: 48px;
    }

    .as___7744455 {
      text-align: center;
      margin-bottom: 48px;
      color: #fff;
    }

    .as___7744455 small {
      font-size: 16px;
    }

    .as___7744455 h1 {
      color: #fff;
      margin-top: 11px;
      margin-bottom: 23px;
      display: inline-block;
      width: 100%;
    }



    @media screen and (min-width:320px) and (max-width:770px) {
      .social__medias {
        display: flex;
        justify-content: center;
      }

      .top_header__s .container-fluid {
        width: 100%;
      }

      .email__and__phone {
        float: unset;
      }

      .logo__cemters img {
        width: 200px;
      }

      h1.s_7744sddff {
        font-size: 27px;
        width: 100%;
        line-height: 35px;
        /* text-transform: uppercase; */
        margin-top: 23px;
      }

      .sd__uyuyulogoo {
        text-align: center;
        margin-top: -457px;
      }

      span.s__000 {
        font-size: 10px;
      }

      .bannnner-head h1 {
        font-size: 26px;
        line-height: 35px;
      }

      .row.sososi {
        margin-top: 1px;
      }

      .bannnner-head a {
        padding: 7px 16px;
        font-size: 14px;
      }

      .col-md-6.mmed {
        width: 92% !important;
      }

      section.bannnner-head.sw__00999 .row:nth-child(1) {
        flex-direction: column-reverse;
      }

      section.bannnner-head.sw__00999we .row {
        flex-direction: column-reverse;
      }

      .side-svvsss img {
        width: 93%;
      }

      section.bannnner-head.ad__99dd .side-svvsss img {
        width: 86%;
      }

      section.bannnner-head.ad__99dd .col-md-6.mmed h1 {
        color: #000;
        font-size: 31px;
        line-height: 36px;
      }

      .heehehad {
        padding-bottom: 51px;
        border-bottom: 1px solid #686868;
      }

      .beene-head h2 {
        width: 100%;
        margin-bottom: 75px;
        font-size: 32px;
      }

      .s__077444s p {
        width: 95%;
        margin-top: 21px;
        font-size: 14px;
        margin-bottom: 21px;

      }

      .checkk-inddo {
        margin-left: 0;
      }

      h3.con__sff {
        color: #000;
        font-size: 33px;
      }

      .s__00887744 p {
        width: 100%;
        text-align: center;
        width: 99%;
      }

      .imagesdd img {
        width: 90%;
      }

      h1.my-4.text-center.text-lg-center {
        font-family: 'Poppins';
        font-size: 30px;
        padding-bottom: 11px;
      }

      .s__listingg {
        height: auto;
      }

      section.img__gallerys {
        margin-top: 0;
      }

      .sooll-headd.ddffe {
        padding-left: 15px;
        padding-bottom: 38px;
      }

      .sooll-headd {
        padding-top: 45px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
      }

      .coont-ques {
        padding: 8px 18px;
        background: #fff;
        width: 97%;

        margin-left: 4px;

      }

      .testim .wrap {

        max-width: 1020px;
        padding: 23px 1px;
        margin: auto;
      }

      .coonnt .col-md-7 {
        padding-top: 0;
      }

      .clients__logos img {
        border-radius: 65%;
        width: 86px;
        margin-bottom: 10px;
      }

      #testim-content h2 {
        font-size: 21px;
        line-height: 29px;
      }

      .testim .cont>div {

        padding: 0 0 51px 0;
      }

      .testim .arrow.right {
        right: 0px;
      }

      .testim .arrow.right {
        right: 0px;
      }

      form#subscription .col-md-8 {
        margin-left: 0 !important;
      }

      .as___7744455 h1 {
        color: #fff;
        font-size: 28px;
        margin-top: 2px;
        margin-bottom: 10px;
        display: inline-block;
        width: 100%;
      }

      .sooll-headd h2 {
        font-size: 32px;
      }

      span.sddsssssteach {
        position: relative;
        top: -139px;
        left: 184px;
        background: #1fa3cf;
        font-size: 13px;
        padding: 4px 7px;
        padding: 5px 10px;
        border-radius: 29px;
        color: #fff;
      }

      span.sddsssssadmin {
        position: relative;
        left: 120px;
        top: -17px;
        background: #1fa3cf;
        font-size: 14px;
        padding: 4px 14px;
        border-radius: 29px;
        color: #fff;
      }

      span.sdd {
        position: relative;
        top: -1px;
        left: -17px;
        color: #fff;
        background: #1fa3cf;
        font-size: 14px;
        padding: 3px 11px;
        border-radius: 29px;
      }

      span.sddsss {
        position: relative;
        left: -177px;
        top: 158px;
        color: #fff;
        background: #1fa3cf;
        font-size: 14px;
        padding: 3px 14px;
        border-radius: 29px;
      }

      span.s__000 {
        background: #fff;
        padding: 7px 10px;
      }

      .email__and__phone li {
        padding-left: 8px;
      }

      .email__and__phone li {
        margin-left: 1px;
      }
    }


/* 
    .loader {
      position: fixed;
      background: #000;
      width: 100%;
      height: 100%;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
    } */




    .feat__eteop p {
      font-size: 16px;
      line-height: 24px;
      padding-top: 20px;
      color: #000000;
      text-align: center;
      /* font-family: 'Poppins'; */
      /* font-weight: 700; */
    }

    .feat__eteop h1 {
      color: black;
      font-family: 'Poppins';
      font-size: 45px;
    }

    .feat__eteop {
      text-align: center;
      width: 44%;
      margin: auto;
      margin-top: 73px;
      margin-bottom: 25px;
    }

    .cloud__feats2 {
      height: 673px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      width: 85%;
      margin: auto;
      margin-top: 70px;
    }

    .feat__uressss {
      position: absolute;
      width: 336px;
      box-shadow: rgb(25 164 208 / 20%) 0px 2px 5px 0px, rgb(31 155 194) 0px 1px 1px 0px;
      border-radius: 23px;
      padding: 12px 5px;
      height: 225px;
      overflow: hidden;
    }

    .hover_absssss {
      position: absolute;
      top: -64px;
      right: -58px;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: #1fa3cf;
      z-index: -1;
      transition: .6s;
    }

    .feat__uressss:hover .hover_absssss {
      top: -20px;
      right: -18px;
      width: 138%;
      height: 300px;
      border-radius: unset;
    }

    .feat__uressss:hover .ddi-two p {
      color: #fff;
    }

    .feat__uressss:hover .ttwo-innff.fsa___7s6 p p {
      color: #fff;
    }

    .feat__uressss.feat_ures111 {
      top: 0;
      right: 65px;
    }

    .feat__uressss.feat_ures112 {
      bottom: 0;
      right: 65px;
    }

    .feat__uressss.feat_ures113 {
      bottom: 0;
      left: 50px;
    }

    .feat__uressss.feat_ures114 {
      top: 0;
      left: 50px;
    }

    .cluds__wf3 img {
      height: 150px;
    }

    .ttwo-innff.fsa___7s6 {
      margin: 0;
      width: 100%;
    }

    .feat__uressss .ddi-two {
      border: none;
      position: relative;
      z-index: 0;
    }

    .ttwo-innff.fsa___7s6 p {
      font-size: 24px;
      line-height: 31px;
      padding-top: 0;
      margin-bottom: 16px;
      transition: .6s;
    }

    .line111 {
      position: absolute;
      width: 198px;
      height: 1px;
      background: #19a4d080;
      transform: rotate(-25deg);
      top: 262px;
      right: 390px;
    }

    .line112 {
      position: absolute;
      width: 220px;
      height: 1px;
      background: #19a4d080;
      transform: rotate(25deg);
      top: 262px;
      left: 374px;
    }

    .line113 {
      position: absolute;
      width: 195px;
      height: 1px;
      background: #19a4d080;
      transform: rotate(-25deg);
      bottom: 262px;
      left: 371px;
    }

    span.s__sdsjk {
      margin: auto;
      float: unset;
      display: inline-block;
      width: 100%;
      text-align: center;
    }

    .line114 {
      position: absolute;
      width: 191px;
      height: 1px;
      background: #19a4d080;
      transform: rotate(25deg);
      bottom: 262px;
      right: 383px;
    }

    ul.info {
      margin-bottom: 31px;
    }

    .col-md-6.d-flex.align-items-center.fsf__ss {
      background: #1fa3cf;
      border-radius: 50%;
    }

    .s__00887744 p {
      margin-bottom: 0;
      color: #fff;
    }

    @media screen and (min-width:1100px) and (max-width:1400px) {
      .line111 {
        position: absolute;
        width: 156px;
        height: 1px;
        background: #19a4d080;
        transform: rotate(-25deg);
        top: 253px;
        right: 390px;
      }

      .line112 {
        position: absolute;
        width: 183px;
        height: 1px;
        background: #19a4d080;
        transform: rotate(25deg);
        top: 258px;
        left: 374px;
      }

      .line113 {
        position: absolute;
        width: 144px;
        height: 1px;
        background: #19a4d080;
        transform: rotate(-25deg);
        bottom: 253px;
        left: 371px;
      }

      .line114 {
        position: absolute;
        width: 140px;
        height: 1px;
        background: #19a4d080;
        transform: rotate(25deg);
        bottom: 253px;
        right: 383px;
      }
    }


    @media screen and (min-width:320px) and (max-width:770px) {
      .feat__eteop {
        width: 93%;
      }

      .feat__eteop p {
        font-size: 16px;
        line-height: 21px;
      }

      .cloud__feats2 {
        width: 95%;
      }

      .feat__uressss {
        position: relative;
        width: 100%;
        top: 0 !important;
        right: 0;
        bottom: 0;
        left: 0 !important;
        margin-bottom: 15px;
      }

      .cloud__feats2 {
        flex-direction: column;
        height: auto;
      }

      .cluds__wf3 {
        display: none;
      }

      .floating__img {
        right: 0;
      }

      .col-md-6.d-flex.align-items-center.fsf__ss {
        height: 384px;
        width: 384px;
        margin: auto;
      }

      h3.con__sff {
        color: #fff;
      }

      .s__00887744 {
        margin-top: 65px;
      }
    }
  </style>
  <!-- <div id="preloader"></div>
  <div class="loader" id="preloader"> <img src="assets/images/hh.gif" alt=""></div> -->

  <div class="top_header__s">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="social__medias">
            <ul class="social sdds">
              <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>

              <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>

              <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>

              <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>

              <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>

              <li><a href="https://www.pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>

            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="email__and__phone">


            <li>
              <span class="icon"><i class="far fa-envelope"></i></span>
              <a href="mailto:office@educlouds.co.in">office@educlouds.co.in</a>
            </li>

            <li><span class="icon"><i class="fas fa-phone"></i></span><a href="tel:+91 9990280968">+91 9990280968</a>

            </li>

            <li><a href="<?php echo site_url('auth/login'); ?>" target="_blank"><i class="fas fa-user"></i> <?php echo $this->lang->line('login'); ?></a></li>

          </div>

        </div>

      </div>


    </div>

  </div>
  <header>
    <div class="container container-big">
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-6">
          <div class="logo">
            <a href="<?php echo base_url(); ?>">
              <?php if (isset($setting->brand_logo_header)) { ?>
                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $setting->brand_logo_header; ?>" alt="" />
              <?php } elseif (isset($this->global_setting->logo)) { ?>
                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->logo; ?>" alt="" />
              <?php } else { ?>
                <img src="<?php echo IMG_URL; ?>default-front-logo.png" alt="" />
              <?php } ?>
            </a>
          </div>
        </div>
        <div class="col-xl-10 col-lg-10 col-6">
          <div class="stellarnav">
            <ul>
              <li><a class="smoothscroll" href="#_about"><?php echo $this->lang->line('about_brand'); ?></a></li>
              <li><a class="smoothscroll" href="#_video"><?php echo $this->lang->line('demo_video'); ?></a></li>
              <li><a class="smoothscroll" href="#_faq"><?php echo $this->lang->line('faq'); ?></a></li>
              <li><a class="smoothscroll" href="#_pricing"><?php echo $this->lang->line('pricing_plan'); ?></a></li>
              <li><a class="smoothscroll" href="#_subscription"><?php echo $this->lang->line('subscription'); ?></a></li>
              <li><a class="smoothscroll" href="#_feature"><?php echo $this->lang->line('features'); ?></a></li>
              <li><a class="smoothscroll" href="#_contact"><?php echo $this->lang->line('contact'); ?></a></li>
              <?php if (isset($school) && !empty($school)) { ?>
                <li><a class="visit-school" href="<?php echo site_url($school->school_url); ?>"><?php echo $this->lang->line('visit_school'); ?></a></li>
              <?php } ?>
              <?php if (logged_in_user_id()) { ?>
                <li><a href="<?php echo site_url('auth/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a></li>
              <?php } else { ?>
                <li><a href="<?php echo site_url('auth/login'); ?>" target="_blank"><?php echo $this->lang->line('login'); ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
          <?php $this->load->view('layout/message'); ?>
        </div>
      </div>
    </div>
  </header>

  <section class="hero__sectionss">
    <div class="containersdd">

      <div id="clouds">
        <div class="cloud x1"></div>

        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
        <div class="cloud x1"></div>





      </div>

      <div class="sd__uyuyulogoo">

        <div class="logo__cemters">
          <img src="assets/images/eee.png" />

        </div>

        <h1 class="s_7744sddff">World's First Digital Ecosystem of Education</h1>
        <p class="s__788744"><span class="s__000">SCHOOL ERP + LMS + ANTI-CHEATING EXAM SOLUTION + ONLINE CLASS</span></p>
      </div>


      <div class="cloud x1"></div>

      <div class="cloud x2"></div>
      <div class="cloud x3"></div>
      <div class="cloud x4"></div>
      <div class="cloud x5"></div>

    </div>
  </section>



  <section class="s___slider__sdd">
    <div class="container">

      <div class="slider">
        <div class="slide-track">
          <div class="slide bg-red-500">
            <div class="immo">
              <img src="assets/images/www1.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-purple-500">
            <div class="immo">
              <img src="assets/images/www2.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-blue-500">
            <div class="immo">
              <img src="assets/images/www3.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-indigo-500">
            <div class="immo">
              <img src="assets/images/www4.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-pink-500">
            <div class="immo">
              <img src="assets/images/www5.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-green-500">
            <div class="immo">
              <img src="assets/images/www6.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-yellow-500">
            <div class="immo">
              <img src="assets/images/www7.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-red-500">
            <div class="immo">
              <img src="assets/images/www8.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-gray-500 text-white">
            <div class="immo">
              <img src="assets/images/www9.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-blue-800">
            <div class="immo">
              <img src="assets/images/www10.jpg" alt="">
            </div>
          </div>
          <!-- same 9 slides doubled (duplicate) -->
          <div class="slide bg-red-500">
            <div class="immo">
              <img src="assets/images/www11.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-purple-500">
            <div class="immo">
              <img src="assets/images/www12.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-blue-500">
            <div class="immo">
              <img src="assets/images/www13.jpg" alt="">
            </div>
          </div>
          <div class="slide bg-indigo-500">
            <div class="immo">
              <img src="assets/images/www14.jpg" alt="">
            </div>
          </div>

        </div>
      </div>
    </div>


  </section>


  <!--
		<section class="logggos">
		<div class="container-fluid">
			

			<div class="row pupuup">
				<div class="uppup">
					
					<ul class="s_sd_logod">
					<li>
						<div class="immo">
									<img src="assets/images/www1.jpg" alt="">
								</div>
						</li>
						
						<li>
						<div class="immo">
									<img src="assets/images/www2.jpg" alt="">
								</div>
						</li>
						<li>
						<div class="immo">
								<img src="assets/images/www3.jpg" alt="">
								</div>
						</li>	
						<li>
						<div class="immo">
							<img src="assets/images/www4.jpg" alt="">
								</div>
						</li>
						
						<li>
						<div class="immo">
									<img src="assets/images/www5.jpg" alt="">
								</div>
						</li>
						
						<li>
						<div class="immo">
									<img src="assets/images/www6.jpg" alt="">
								</div>
						</li>
						
						
						<li>
						<div class="immo">
									<img src="assets/images/www7.jpg" alt="">
								</div>
						</li>
							<li>
						<div class="immo">
									<img src="assets/images/www8.jpg" alt="">
								</div>
						</li>
						<li>
						<div class="immo">
									<img src="assets/images/www9.jpg" alt="">
								</div>
						</li>
						
						<li>
						<div class="immo">
									<img src="assets/images/www10.jpg" alt="">
								</div>
						</li>
						<li>
						<div class="immo">
									<img src="assets/images/www11.jpg" alt="">
								</div>
						</li>
							<li>
						<div class="immo">
									<img src="assets/images/www12.jpg" alt="">
								</div>
						</li>
						<li>
						<div class="immo">
									<img src="assets/images/www13.jpg" alt="">
								</div>
						</li>
						<li>
						<div class="immo">
									<img src="assets/images/www14.jpg" alt="">
								</div>
						</li>
						
					
					</ul>
				
				
				</div>
			</div>
		</div>
	</section>
-->

  <section class="bannnner-head sw__00999">
    <div class="container">
      <div class="heehehad">
        <div class="row">
          <div class="col-md-6 mmed">
            <small>A 360 degree platform</small>
            <h1>Education ERP</h1>
            <p class="sd__smallll">EduCloud's management system is a complete solution developed with the aim of impacting Learning Outcomes by automating learning. </p>
            <div class="bobobk">
              <a href="">Book a demo</a>
            </div>

          </div>
          <div class="col-md-6">
            <div class="row sososi">
              <div class="col-md-12">
                <div class="side-svvsss">
                  <img src="assets/images/dfff.png" alt="">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bannnner-head ad__99dd">
    <div class="container">

      <div class="heehehad">
        <div class="row">

          <div class="col-md-6">
            <div class="row sososi">
              <div class="col-md-12">
                <div class="side-svvsss">
                  <img src="assets/images/main-image.png" alt="">
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6 mmed">
            <small>A 360 degree platform</small>
            <h1>Learning Management</h1>
            <p class="sd__smallll dfdf">Enables active communication to improve student learning and providing student with overall development.
            </p>
            <div class="bobobk">
              <a href="">Book a demo</a>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>


  <section class="bannnner-head sw__00999we">
    <div class="container">

      <div class="heehehad">
        <div class="row">
          <div class="col-md-6 mmed">
            <small>A 360 degree platform</small>
            <h1>Online Examination/Classroom</h1>
            <p class="sd__smallll">Interactive online classroom is an engaging teaching-learning environment, creating experiential learning.

            </p>
            <div class="bobobk">
              <a href="">Book a demo</a>
            </div>

          </div>
          <div class="col-md-6">
            <div class="row sososi">
              <div class="col-md-12">
                <div class="side-svvsss">
                  <img src="assets/images/dfggg.png" alt="">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>




  <section class="benediitss">
    <div class="container">
      <div class="beene-head">
        <div class="s__077444s">
          <h5>Features of Educlouds Management System</h5>
          <h2>Why Choose Us?</h2>
          <p>Educlouds is the World’s first Digital Ecosystem of Education that combines the usability of School ERP + LMS + Online Exam Solution + Online Classroom

          </p>
        </div>
      </div>
      <div class="bennfi-coolun">
        <div class="row">
          <div class="col-md-3">
            <div class="bene-check">
              <div class="checckk">

              </div>
              <div class="checkk-inddo">
                <span class="s__sdsjk"><i aria-hidden="true" class="fa fa-laptop"></i></span>
                <h4>Best ERP Solution for School</h4>
                <p>We have developed the Perfect ERP Solution that covers all managerial aspects of day-to-day activities in a school


                </p>
              </div>

            </div>
          </div>
          <div class="col-md-3 ckeccc-borr">
            <div class="bene-check">
              <div class="checckk">

              </div>
              <div class="checkk-inddo">
                <span class="s__sdsjk"><i aria-hidden="true" class="fa fa-book"></i></span>

                <h4>User Friendly LMS</h4>
                <p>Our LMS becomes a medium of interaction between the most important people in the school: teachers, parents & students


                </p>
              </div>

            </div>
          </div>
          <div class="col-md-3 ckeccc-borrwee">
            <div class="bene-check">
              <div class="checckk">
                <i class="bi bi-check-circle"></i>
              </div>
              <div class="checkk-inddo">

                <span class="s__sdsjk"><i class="fa fa-calendar"></i></span>
                <h4>Anti-Cheating Exam Solution
                </h4>
                <p>Our system clicks a photograph of the student every 3 seconds, thus creating an Anti-Cheating Online Exam Environment


                </p>
              </div>

            </div>
          </div>

          <div class="col-md-3">
            <div class="bene-check">
              <div class="checckk">
                <i class="bi bi-check-circle"></i>
              </div>
              <div class="checkk-inddo">

                <span class="s__sdsjk"><i class="fa fa-user"></i></span>
                <h4>Online Classroom
                </h4>
                <p>We integrate zoom with your school time-table, allowing you to seamlessly conduct online classes


                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="clouds__imdf">

    <div class="container">

      <div class="row">
        <div class="col-md-6 d-flex align-items-center fsf__ss">
          <div class="s__00887744">
            <h3 class="con__sff">Connecting</h3>
            <p>ERP solutions developed by EduClouds teams for education businesses increase the efficiency of planning, designing and operating academic resources. The implementation of an ERP system can help improve the effectiveness of various education processes and enhance communication between teachers, students, admin and parents.</p>

          </div>
        </div>

        <div class="col-md-6">
          <div class="floating__img">
            <svg class="animated" id="freepik_stories-uploading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
              <style>
                svg#freepik_stories-uploading:not(.animated) .animable {
                  opacity: 0;
                }

                svg#freepik_stories-uploading.animated #freepik--background-complete--inject-2 {
                  animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) fadeIn;
                  animation-delay: 0s;
                }

                svg#freepik_stories-uploading.animated #freepik--Files--inject-2 {
                  animation: 1.5s Infinite linear floating;
                  animation-delay: 0s;
                }

                svg#freepik_stories-uploading.animated #freepik--Cloud--inject-2 {
                  animation: 1.5s Infinite linear floating;
                  animation-delay: 0s;
                }

                svg#freepik_stories-uploading.animated #freepik--Character--inject-2 {
                  animation: 1.5s Infinite linear floating;
                  animation-delay: 0s;
                }

                @keyframes fadeIn {
                  0% {
                    opacity: 0;
                  }

                  100% {
                    opacity: 1;
                  }
                }

                @keyframes floating {
                  0% {
                    opacity: 1;
                    transform: translateY(0px);
                  }

                  50% {
                    transform: translateY(-10px);
                  }

                  100% {
                    opacity: 1;
                    transform: translateY(0px);
                  }
                }
              </style>
              <g id="freepik--background-complete--inject-2" class="animable" style="transform-origin: 250px 228.23px;">
                <rect y="382.4" width="500" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 250px 382.525px;" id="elfrfu9wkjnxa" class="animable"></rect>
                <rect x="416.78" y="398.49" width="33.12" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 433.34px 398.615px;" id="elzd1mswhpa6" class="animable"></rect>
                <rect x="322.53" y="401.21" width="8.69" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 326.875px 401.335px;" id="el7f9w8dz8auq" class="animable"></rect>
                <rect x="396.59" y="389.21" width="19.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 406.185px 389.335px;" id="elzf3pp19q69h" class="animable"></rect>
                <rect x="52.46" y="390.89" width="43.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 74.055px 391.015px;" id="elf7k0per3dx" class="animable"></rect>
                <rect x="104.56" y="390.89" width="6.33" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 107.725px 391.015px;" id="elc7x3zs974o" class="animable"></rect>
                <rect x="131.47" y="395.11" width="93.68" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 178.31px 395.235px;" id="el97s22fnhv5" class="animable"></rect>
                <path d="M237,337.8H43.91a5.71,5.71,0,0,1-5.7-5.71V60.66A5.71,5.71,0,0,1,43.91,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.91,55.2a5.46,5.46,0,0,0-5.45,5.46V332.09a5.46,5.46,0,0,0,5.45,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z" style="fill: rgb(235, 235, 235); transform-origin: 140.46px 196.4px;" id="el0tmcpn7oij" class="animable"></path>
                <path d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z" style="fill: rgb(235, 235, 235); transform-origin: 356.75px 196.4px;" id="elcsponuil8uh" class="animable"></path>
                <rect x="316.8" y="138.61" width="130.44" height="6.7" style="fill: rgb(224, 224, 224); transform-origin: 382.02px 141.96px;" id="elvf0b4mrxuhp" class="animable"></rect>
                <rect x="322.8" y="113.91" width="5.75" height="24.7" style="fill: rgb(235, 235, 235); transform-origin: 325.675px 126.26px;" id="el4qr4iw404k9" class="animable"></rect>
                <rect x="350.59" y="113.91" width="5.75" height="24.7" style="fill: rgb(235, 235, 235); transform-origin: 353.465px 126.26px;" id="el0uoh1ftcpqa" class="animable"></rect>
                <g id="elfurqz9yx7o">
                  <rect x="384.28" y="113.6" width="5.75" height="24.7" style="fill: rgb(235, 235, 235); transform-origin: 387.155px 125.95px; transform: rotate(-9.78deg);" class="animable"></rect>
                </g>
                <rect x="329.92" y="117.17" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 332.795px 127.895px;" id="elgkvl2ph6o6" class="animable"></rect>
                <rect x="343.13" y="117.17" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 346.005px 127.895px;" id="elqvenfjlowzg" class="animable"></rect>
                <rect x="376.47" y="117.17" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 379.345px 127.895px;" id="el3jsajxp2rs1" class="animable"></rect>
                <g id="elvqebxjctd8">
                  <rect x="360.53" y="116.8" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 363.405px 127.525px; transform: rotate(-12.53deg);" class="animable"></rect>
                </g>
                <rect x="337.77" y="112.68" width="2.87" height="25.93" style="fill: rgb(235, 235, 235); transform-origin: 339.205px 125.645px;" id="elpiv3e0onxz" class="animable"></rect>
                <rect x="371.95" y="112.68" width="2.87" height="25.93" style="fill: rgb(235, 235, 235); transform-origin: 373.385px 125.645px;" id="elqo2jcesitp" class="animable"></rect>
                <rect x="406.72" y="119.06" width="28" height="19.33" style="fill: rgb(235, 235, 235); transform-origin: 420.72px 128.725px;" id="elr1k317sy88i" class="animable"></rect>
                <g id="el3354ca2s24v">
                  <rect x="316.8" y="188.65" width="130.44" height="6.7" style="fill: rgb(224, 224, 224); transform-origin: 382.02px 192px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="elylimmwh47n">
                  <rect x="435.49" y="163.94" width="5.75" height="24.7" style="fill: rgb(235, 235, 235); transform-origin: 438.365px 176.29px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="elnat4rkycc5">
                  <rect x="407.7" y="163.94" width="5.75" height="24.7" style="fill: rgb(235, 235, 235); transform-origin: 410.575px 176.29px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="elsa5uebc8mm">
                  <rect x="374.02" y="163.63" width="5.75" height="24.7" style="fill: rgb(235, 235, 235); transform-origin: 376.895px 175.98px; transform: rotate(-170.22deg);" class="animable"></rect>
                </g>
                <g id="elmnevh1fnayd">
                  <rect x="428.37" y="167.2" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 431.245px 177.925px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="elil9e28jmvgj">
                  <rect x="415.16" y="167.2" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 418.035px 177.925px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="ele2ijfs0jlxd">
                  <rect x="381.82" y="167.2" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 384.695px 177.925px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="el7ngpmd88gyy">
                  <rect x="397.76" y="166.83" width="5.75" height="21.45" style="fill: rgb(235, 235, 235); transform-origin: 400.635px 177.555px; transform: rotate(-167.47deg);" class="animable"></rect>
                </g>
                <g id="eldxjukje0n26">
                  <rect x="423.4" y="162.72" width="2.87" height="25.93" style="fill: rgb(235, 235, 235); transform-origin: 424.835px 175.685px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="elns6rb779vte">
                  <rect x="389.22" y="162.72" width="2.87" height="25.93" style="fill: rgb(235, 235, 235); transform-origin: 390.655px 175.685px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="elx3gz8f7ti9">
                  <rect x="329.32" y="169.09" width="28" height="19.33" style="fill: rgb(235, 235, 235); transform-origin: 343.32px 178.755px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <polygon points="53 266 53 383 59 383 59 278 165 278 165 383 172 383 172 266 53 266" style="fill: rgb(224, 224, 224); transform-origin: 112.5px 324.5px;" id="elx167z9by2cf" class="animable"></polygon>
                <polygon points="119 266 119 383 125 383 125 278 231 278 231 383 238 383 238 266 119 266" style="fill: rgb(245, 245, 245); transform-origin: 178.5px 324.5px;" id="el892maafdvj9" class="animable"></polygon>
                <path d="M156.88,222.4c-1.34-2.2-3.54-.28-3.54-.28.31-4.23-3.57-7.11-3.57-7.11s4.51,0,5.14-4.31-1.57-2.3-3.64-2.33-4.23,6-1.5,9.4,2,9.2-4.3,14.77a12.36,12.36,0,0,0-3.29,5.13c.48-5.12.75-12.34-.76-17.15-2.56-8.19,2.32-10.39,3.73-14.48s-3.73-7.56-3.73-7.56,4.84-2.2,2.47-4.72-7.23-2.18-7.23,1.12,3.3,4.55,3.3,4.55,3.78,3.93,3.78,6-3.78,6.45-3.78,6.45,1.73-3.77-1.73-3.93-4.57,4.4-3.15,6.45,3.78.31,3.78.31a39.44,39.44,0,0,0,1.08,7.08c.35,1.18.19,5.8-.11,10.6a12,12,0,0,0-3.07-4.55c-6.29-5.57-7-11.37-4.3-14.77s.57-9.43-1.5-9.4-4.27-2-3.64,2.33,5.14,4.31,5.14,4.31-3.88,2.88-3.56,7.11c0,0-2.21-1.92-3.55.28-2.38,3.94,3.15,6.38,4.08,4.44,0,0,11.74,8.31,8.91,20.27l.66,1c-.09,1-.14,1.55-.14,1.55l.92-.39,1,1.54a36,36,0,0,0,.27,5.2l2.8-4.15c-2.83-12,8.91-20.27,8.91-20.27C153.73,228.78,159.27,226.34,156.88,222.4Z" style="fill: rgb(224, 224, 224); transform-origin: 141.117px 221.707px;" id="elfe6ltaf3ier" class="animable"></path>
                <polygon points="149.77 266 145.98 244.31 147.05 238 135.12 238 136.19 244.31 132.41 266 149.77 266" style="fill: rgb(235, 235, 235); transform-origin: 141.09px 252px;" id="elzwbhy9ejbhr" class="animable"></polygon>
              </g>
              <g id="freepik--Shadow--inject-2" class="animable" style="transform-origin: 250px 416.24px;">
                <ellipse id="freepik--path--inject-2" cx="250" cy="416.24" rx="193.89" ry="11.32" style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px;" class="animable"></ellipse>
              </g>
              <g id="freepik--Files--inject-2" class="animable" style="transform-origin: 182.884px 102.173px;">
                <g id="elcjwf44sjhgn">
                  <rect x="256.95" y="96.24" width="35.01" height="45.72" style="fill: rgb(64, 123, 255); transform-origin: 274.455px 119.1px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="el494jz1esv4a">
                  <rect x="256.95" y="96.24" width="35.01" height="45.72" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 274.455px 119.1px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="eljtmca0x72ea">
                  <rect x="269.37" y="104.54" width="24.56" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 281.65px 105.775px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="eltgekh5mwfa">
                  <rect x="267.32" y="108.35" width="24.56" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 279.6px 109.585px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="elubjkg4r21q">
                  <rect x="265.26" y="112.15" width="24.56" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 277.54px 113.385px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="elytrk94a6pnn">
                  <rect x="263.2" y="115.96" width="24.56" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 275.48px 117.195px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="el5nyec13o1xw">
                  <rect x="261.15" y="119.76" width="24.56" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 273.43px 120.995px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="elkwm6dn8zfx">
                  <rect x="259.09" y="123.57" width="24.56" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 271.37px 124.805px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="elrouy155kwid">
                  <rect x="257.04" y="127.37" width="24.56" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 269.32px 128.605px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <g id="elhmzmtg2lrf6">
                  <rect x="255.5" y="129.12" width="15.9" height="2.47" style="fill: rgb(64, 123, 255); transform-origin: 263.45px 130.355px; transform: rotate(28.37deg);" class="animable"></rect>
                </g>
                <path d="M218.89,107.59a22.15,22.15,0,1,1,24.29-19.78A22.18,22.18,0,0,1,218.89,107.59Z" style="fill: rgb(64, 123, 255); transform-origin: 221.145px 85.5537px;" id="elysovr7padso" class="animable"></path>
                <g id="elsw74cbsr6gi">
                  <circle cx="221.15" cy="85.55" r="20.21" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 221.15px 85.55px; transform: rotate(-4.4deg);" class="animable"></circle>
                </g>
                <path d="M228,79c-2.33-1.65-5.58-7.29-5.58-7.32l-2.1,20.44c.05-.46-1.77-.93-3-1-2.93-.31-5.4,1.07-5.6,3s2,3.85,5,4.15,5.37-1.08,5.58-3.06c0-.3-.21-.62-.18-.89l1.61-15.75a13.26,13.26,0,0,0,4.34,3.29c2.21,1,3,4.07,3,4.07A7.92,7.92,0,0,0,228,79Z" style="fill: rgb(255, 255, 255); transform-origin: 221.402px 84.9955px;" id="el2azuy8dll07" class="animable"></path>
                <g id="elydg6g3qxf4n">
                  <ellipse cx="218.82" cy="80.9" rx="15.94" ry="13.21" style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 218.82px 80.9px; transform: rotate(-27.41deg);" class="animable"></ellipse>
                </g>
                <g id="el3f7cvzijp59">
                  <rect x="131.56" y="58.69" width="47.75" height="35.75" style="fill: rgb(64, 123, 255); transform-origin: 155.435px 76.565px; transform: rotate(-4.65deg);" class="animable"></rect>
                </g>
                <g id="el7oflfvnamax">
                  <rect x="133.99" y="61" width="43" height="31" style="fill: rgb(64, 123, 255); transform-origin: 155.49px 76.5px; transform: rotate(-4.65deg);" class="animable"></rect>
                </g>
                <g id="el1xs0e74mvmz">
                  <rect x="133.99" y="61" width="43" height="31" style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 155.49px 76.5px; transform: rotate(-4.65deg);" class="animable"></rect>
                </g>
                <polygon points="177.84 86 178.18 90.2 135.32 93.69 134.1 78.67 142.31 70.21 156.48 81.94 163.02 76.31 177.84 86" style="fill: rgb(64, 123, 255); transform-origin: 156.14px 81.95px;" id="el6dwzuz6mh92" class="animable"></polygon>
                <g id="el5kzsek1w65">
                  <polygon points="177.84 86 178.18 90.2 135.32 93.69 134.1 78.67 142.31 70.21 156.48 81.94 163.02 76.31 177.84 86" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 156.14px 81.95px;" class="animable"></polygon>
                </g>
                <path d="M169.19,68a3.46,3.46,0,1,1-3.73-3.17A3.46,3.46,0,0,1,169.19,68Z" style="fill: rgb(64, 123, 255); transform-origin: 165.741px 68.2786px;" id="elbnynqnjais" class="animable"></path>
                <g id="elatmxzls57f4">
                  <path d="M169.19,68a3.46,3.46,0,1,1-3.73-3.17A3.46,3.46,0,0,1,169.19,68Z" style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 165.741px 68.2786px;" class="animable"></path>
                </g>
                <path d="M86.39,98.87l-1.84-1.13a2.45,2.45,0,0,0-2.2-.19L74.18,101a2.14,2.14,0,0,0-1.31,1.66l-.3,2a2.08,2.08,0,0,1-1.3,1.65l-4.88,2a2.15,2.15,0,0,0-1.09,3l13,26.64a2.46,2.46,0,0,0,3.11,1.19L120.07,123a2.14,2.14,0,0,0,1.1-3l-13-26.63a2.46,2.46,0,0,0-3.11-1.2L88.59,99.06A2.45,2.45,0,0,1,86.39,98.87Z" style="fill: rgb(64, 123, 255); transform-origin: 93.2362px 115.656px;" id="elpk0ny8vngc" class="animable"></path>
                <path d="M110,93.16,74.59,108a3.21,3.21,0,0,0-1.8,3.87l7.75,24.53A2.6,2.6,0,0,0,84.09,138l35.42-14.82a3.23,3.23,0,0,0,1.8-3.87l-7.76-24.53A2.59,2.59,0,0,0,110,93.16Z" style="fill: rgb(64, 123, 255); transform-origin: 97.0479px 115.579px;" id="elsdqycutv7j" class="animable"></path>
                <g id="elb8xaj3cobua">
                  <path d="M110,93.16,74.59,108a3.21,3.21,0,0,0-1.8,3.87l7.75,24.53A2.6,2.6,0,0,0,84.09,138l35.42-14.82a3.23,3.23,0,0,0,1.8-3.87l-7.76-24.53A2.59,2.59,0,0,0,110,93.16Z" style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 97.0479px 115.579px;" class="animable"></path>
                </g>
              </g>
              <g id="freepik--Cloud--inject-2" class="animable" style="transform-origin: 183.34px 172.499px;">
                <path d="M238.48,152a30.13,30.13,0,0,0,.66-6.28,29.82,29.82,0,0,0-29.82-29.82,30.36,30.36,0,0,0-5.51.51c-.76-.14-1.53,0-2.32-.09A34.92,34.92,0,0,0,169.5,96h-11a35,35,0,0,0-35.17,34.92c0,.26,0,.39,0,.65a29.44,29.44,0,0,0,5.4,58.43h108a19,19,0,0,0,1.73-38Z" style="fill: rgb(64, 123, 255); transform-origin: 177.809px 143.009px;" id="el6b7euhedqno" class="animable"></path>
                <g id="elesrkytpfduh">
                  <path d="M238.48,152a30.13,30.13,0,0,0,.66-6.28,29.82,29.82,0,0,0-29.82-29.82,30.36,30.36,0,0,0-5.51.51c-.76-.14-1.53,0-2.32-.09A34.92,34.92,0,0,0,169.5,96h-11a35,35,0,0,0-35.17,34.92c0,.26,0,.39,0,.65a29.44,29.44,0,0,0,5.4,58.43h108a19,19,0,0,0,1.73-38Z" style="fill: rgb(255, 255, 255); opacity: 0.5; isolation: isolate; transform-origin: 177.809px 143.009px;" class="animable"></path>
                </g>
                <g id="elo9sambj053">
                  <path d="M238.48,152a30.13,30.13,0,0,0,.66-6.28,29.82,29.82,0,0,0-29.82-29.82,30.36,30.36,0,0,0-5.51.51c-.76-.14-1.53,0-2.32-.09A34.92,34.92,0,0,0,169.5,96h0a35,35,0,0,0-35.17,34.92c0,.26,0,.39,0,.65a29.44,29.44,0,0,0,5.4,58.43h97a19,19,0,0,0,1.73-38Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 183.309px 143.009px;" class="animable"></path>
                </g>
                <path d="M267.67,239H234a50.06,50.06,0,0,1-50-50V179H174v10a60.07,60.07,0,0,0,60,60h33.67Z" style="fill: rgb(64, 123, 255); transform-origin: 220.835px 214px;" id="eljles6hu373" class="animable"></path>
                <polygon points="178.88 172.34 170.21 181 187.54 181 178.88 172.34" style="fill: rgb(64, 123, 255); transform-origin: 178.875px 176.67px;" id="elyjtg36oxkm" class="animable"></polygon>
              </g>
              <g id="freepik--Stuff--inject-2" class="animable" style="transform-origin: 126.248px 369.952px;">
                <path d="M104.28,367.33l-6-18.33A26.16,26.16,0,0,1,120,343.17l5,17.16Z" style="fill: rgb(64, 123, 255); transform-origin: 111.64px 355.034px;" id="eltkumuvq8t9d" class="animable"></path>
                <g id="elk49l0g6tqkn">
                  <path d="M104.28,367.33l-6-18.33A26.16,26.16,0,0,1,120,343.17l5,17.16Z" style="fill: rgb(255, 255, 255); opacity: 0.7; isolation: isolate; transform-origin: 111.64px 355.034px;" class="animable"></path>
                </g>
                <g id="elchznyvbt2l">
                  <g style="opacity: 0.2; isolation: isolate; transform-origin: 111.655px 355.353px;" class="animable">
                    <path d="M101.14,353.33a16.21,16.21,0,0,1,2.37-2.17,21.28,21.28,0,0,1,2.78-1.82c.53-.28,1.09-.58,1.68-.84s1.18-.51,1.81-.7a17.92,17.92,0,0,1,1.87-.52l.93-.21.93-.11c.3,0,.6-.09.89-.11h.86a9,9,0,0,1,1.58.05c.48.05.92.09,1.31.16l1,.23.85.22s-.33,0-.88,0l-1-.05-1.3,0a13.89,13.89,0,0,0-1.51.12,14.68,14.68,0,0,0-1.67.25l-.88.16-.88.23a16.45,16.45,0,0,0-1.78.53c-.61.16-1.18.43-1.76.64s-1.12.48-1.65.73-1,.5-1.52.77-.93.5-1.34.74c-.82.48-1.5.89-2,1.21Z" id="el7cwglbfpdnr" class="animable" style="transform-origin: 110.57px 350.083px;"></path>
                    <path d="M101.67,355s.23-.2.67-.51,1.06-.76,1.85-1.22a30.1,30.1,0,0,1,2.77-1.48c1-.5,2.19-.94,3.34-1.36.59-.17,1.18-.37,1.76-.53s1.17-.3,1.74-.39,1.12-.22,1.65-.26,1-.11,1.49-.12a17.22,17.22,0,0,1,2.22.08l.84.1s-.31.05-.84.1c-.26,0-.58,0-.94.1l-1.22.19c-.45.07-.92.2-1.43.29s-1,.26-1.57.38-1.1.32-1.67.46-1.13.37-1.7.55c-2.28.76-4.51,1.68-6.18,2.39-.83.37-1.54.65-2,.88Z" id="el6dz67r5i12o" class="animable" style="transform-origin: 110.835px 352.061px;"></path>
                    <path d="M103.08,358.42a7,7,0,0,1,.62-.55c.4-.33,1-.8,1.72-1.31a26,26,0,0,1,2.63-1.59,27.87,27.87,0,0,1,3.21-1.47,23.91,23.91,0,0,1,3.4-1,14.11,14.11,0,0,1,1.62-.24c.52,0,1-.11,1.46-.1l1.23.05c.37,0,.68.09.94.12l.81.14s-.3,0-.82.05c-.26,0-.57,0-.92.06l-1.2.16c-.43.05-.89.17-1.39.25s-1,.26-1.53.37-1.06.33-1.61.48-1.09.38-1.64.57-1.09.41-1.62.64-1.06.43-1.55.67c-1,.45-1.93.91-2.72,1.3s-1.46.73-1.91,1Z" id="ell7r8im4x36" class="animable" style="transform-origin: 111.9px 355.29px;"></path>
                    <path d="M103.92,360.75a16.32,16.32,0,0,1,2.25-1.86,22.54,22.54,0,0,1,2.58-1.54c.5-.24,1-.48,1.55-.7s1.09-.43,1.66-.59a17.16,17.16,0,0,1,1.71-.44,12.88,12.88,0,0,1,1.69-.27,11,11,0,0,1,1.6-.09,9.3,9.3,0,0,1,1.42.06l1.2.16.9.22c.49.13.77.22.77.22s-.3,0-.8,0l-.91,0-1.17,0A11.28,11.28,0,0,0,117,356a14.55,14.55,0,0,0-1.52.21c-.52.07-1,.22-1.6.34s-1.08.29-1.62.45a31.35,31.35,0,0,0-3.14,1.14c-1,.42-1.89.85-2.66,1.23s-1.41.72-1.85,1Z" id="el9doyerrhih" class="animable" style="transform-origin: 112.585px 358.002px;"></path>
                    <path d="M105.08,363.87a6.85,6.85,0,0,1,.59-.55c.39-.33.94-.8,1.65-1.31a24.45,24.45,0,0,1,2.53-1.59c.47-.27,1-.53,1.5-.77s1.07-.45,1.61-.69,1.11-.38,1.66-.55,1.11-.29,1.66-.39a15.44,15.44,0,0,1,1.57-.21c.51,0,1-.08,1.43-.06l1.2.08c.35,0,.66.12.91.16l.78.18-.8,0c-.25,0-.56,0-.9,0l-1.16.11c-.42.05-.88.16-1.35.22s-1,.24-1.49.34-1,.32-1.57.46-1.06.36-1.59.56-1.06.4-1.57.63-1,.43-1.5.67c-1,.45-1.85.91-2.62,1.3s-1.41.72-1.84,1Z" id="eltxoc2iwb4x" class="animable" style="transform-origin: 113.625px 360.808px;"></path>
                  </g>
                </g>
                <path d="M101.68,367.46,114,358.12a1.33,1.33,0,0,1,1.07-.25l14.07,2.67a1.35,1.35,0,0,1,.39,2.52l-11.61,6.29a1.46,1.46,0,0,1-.61.16l-14.8.38A1.35,1.35,0,0,1,101.68,367.46Z" style="fill: rgb(64, 123, 255); transform-origin: 115.693px 363.867px;" id="el7qsau35o55g" class="animable"></path>
                <path d="M123.89,373s18.94-45.83,22.28-48.67,24.5,9.47,24.5,9.47l-18.84,48.37Z" style="fill: rgb(64, 123, 255); transform-origin: 147.28px 353.037px;" id="el7b9ksihx472" class="animable"></path>
                <g id="el1wyrtjrbp3d">
                  <path d="M129.33,372.67s18.14-43.78,20.84-45.67,18.16,6.17,18.16,6.17-16.11-9.84-21.05-8.17-21.78,46.67-21.78,46.67Z" style="opacity: 0.2; isolation: isolate; transform-origin: 146.915px 348.74px;" class="animable"></path>
                </g>
                <rect x="87.06" y="368.5" width="80.44" height="47.5" style="fill: rgb(38, 50, 56); transform-origin: 127.28px 392.25px;" id="el3f0afiapncx" class="animable"></rect>
                <g id="elf53u3h51v66">
                  <rect x="87.06" y="368.5" width="80.44" height="47.5" style="fill: rgb(255, 255, 255); opacity: 0.2; isolation: isolate; transform-origin: 127.28px 392.25px;" class="animable"></rect>
                </g>
                <g id="elkfzs77j98x">
                  <rect x="117.56" y="368.5" width="49.94" height="47.5" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 142.53px 392.25px;" class="animable"></rect>
                </g>
                <polygon points="117.56 369 136.5 353.75 178.75 356.63 167.5 369 117.56 369" style="fill: rgb(38, 50, 56); transform-origin: 148.155px 361.375px;" id="elg1b8kw9guhn" class="animable"></polygon>
                <polygon points="117.56 369 103.25 352.5 73 355.75 87.06 368.5 117.56 369" style="fill: rgb(38, 50, 56); transform-origin: 95.28px 360.75px;" id="elcrb7xml60co" class="animable"></polygon>
                <g id="elzbvi3n5frj">
                  <polygon points="117.56 369 103.25 352.5 73 355.75 87.06 368.5 117.56 369" style="fill: rgb(255, 255, 255); opacity: 0.1; isolation: isolate; transform-origin: 95.28px 360.75px;" class="animable"></polygon>
                </g>
                <g id="eli0p2n733la8">
                  <polygon points="117.56 369 136.5 353.75 178.75 356.63 167.5 369 117.56 369" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 148.155px 361.375px;" class="animable"></polygon>
                </g>
                <path d="M152.27,390.36a12.78,12.78,0,1,0,12.78,12.78A12.78,12.78,0,0,0,152.27,390.36Zm0,17.87a5.1,5.1,0,1,1,5.1-5.09A5.09,5.09,0,0,1,152.27,408.23Z" style="fill: rgb(64, 123, 255); transform-origin: 152.27px 403.14px;" id="elbhzjdbvko3c" class="animable"></path>
                <g id="elykig612s8wn">
                  <path d="M163.79,397.59a12.38,12.38,0,0,0-.78-1.37,11.39,11.39,0,0,0-1.28-1.67,12.64,12.64,0,0,0-8.47-4.14,8.21,8.21,0,0,0-1-.05,12.79,12.79,0,0,0-12.39,15.88,10.48,10.48,0,0,0,.46,1.44,11.51,11.51,0,0,0,1,2,12.75,12.75,0,0,0,9.84,6.15c.37,0,.74.05,1.11.05a12.79,12.79,0,0,0,11.52-18.32Zm-11.52,10.64a3.87,3.87,0,0,1-.48,0,5.07,5.07,0,0,1-4.23-3.13,5.53,5.53,0,0,1-.28-.9,5.41,5.41,0,0,1-.07-.58,3.4,3.4,0,0,1,0-.45,5.09,5.09,0,0,1,5.09-5.1,2.17,2.17,0,0,1,.36,0,5.06,5.06,0,0,1,2.87,1.12,4.85,4.85,0,0,1,.56.55,3.9,3.9,0,0,1,.4.51,5,5,0,0,1,.91,2.9A5.09,5.09,0,0,1,152.27,408.23Z" style="fill: rgb(255, 255, 255); opacity: 0.7; isolation: isolate; transform-origin: 152.274px 403.12px;" class="animable"></path>
                </g>
                <g id="elytb52a041c">
                  <path d="M151.79,408.2l-.63,7.66a12.75,12.75,0,0,1-9.84-6.15l6.24-4.64A5.07,5.07,0,0,0,151.79,408.2Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 146.555px 410.465px;" class="animable"></path>
                </g>
                <g id="elb2totzt7p1v">
                  <path d="M161.73,394.55l-6.23,4.63a5.06,5.06,0,0,0-2.87-1.12l.63-7.65A12.64,12.64,0,0,1,161.73,394.55Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 157.18px 394.795px;" class="animable"></path>
                </g>
                <g id="elhfef8oy0iza">
                  <path d="M147.28,404.17l-6.94,3.51a10.48,10.48,0,0,1-.46-1.44l7.33-2.65A5.41,5.41,0,0,0,147.28,404.17Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 143.58px 405.635px;" class="animable"></path>
                </g>
                <g id="eld6fnz6b4tmr">
                  <path d="M163.79,397.59l-7.33,2.65a3.9,3.9,0,0,0-.4-.51l6.95-3.51A12.38,12.38,0,0,1,163.79,397.59Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 159.925px 398.23px;" class="animable"></path>
                </g>
                <path d="M161.6,393.91c-7,0-10.83,4.93-8.43,11s10.05,11,17.1,11,10.84-4.92,8.44-11S168.66,393.91,161.6,393.91Zm6.07,15.39a7.76,7.76,0,0,1-6.82-4.39c-1-2.42.55-4.39,3.36-4.39a7.78,7.78,0,0,1,6.82,4.39C172,407.33,170.48,409.3,167.67,409.3Z" style="fill: rgb(64, 123, 255); transform-origin: 165.942px 404.91px;" id="elsxgz4s4vgti" class="animable"></path>
                <g id="eld91sh7u1sfv">
                  <path d="M175.57,400.13c-.39-.4-.8-.8-1.24-1.18a17.8,17.8,0,0,0-1.85-1.43,19.87,19.87,0,0,0-9.87-3.57c-.35,0-.68,0-1,0-7,0-10.83,4.92-8.43,11a13,13,0,0,0,1.43,2.67,12,12,0,0,0,1,1.24,16.14,16.14,0,0,0,1.67,1.75,20.4,20.4,0,0,0,11.92,5.3c.38,0,.76,0,1.13,0,7.06,0,10.84-4.93,8.45-11A15.14,15.14,0,0,0,175.57,400.13Zm-7.91,9.17-.49,0a8.16,8.16,0,0,1-5.29-2.69,6.06,6.06,0,0,1-.58-.78,4.82,4.82,0,0,1-.27-.5,3.39,3.39,0,0,1-.18-.39c-1-2.43.55-4.39,3.36-4.39a2.17,2.17,0,0,1,.36,0,7.69,7.69,0,0,1,3.25,1,7.34,7.34,0,0,1,.75.48,4.81,4.81,0,0,1,.57.44,6.28,6.28,0,0,1,1.9,2.49C172,407.33,170.48,409.3,167.66,409.3Z" style="fill: rgb(255, 255, 255); opacity: 0.1; isolation: isolate; transform-origin: 165.98px 404.93px;" class="animable"></path>
                </g>
                <g id="el1capbfzksoc">
                  <path d="M167.17,409.27l2,6.6a20.4,20.4,0,0,1-11.92-5.3l4.66-4A8.16,8.16,0,0,0,167.17,409.27Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 163.21px 411.22px;" class="animable"></path>
                </g>
                <g id="el1uv9tbomd3i">
                  <path d="M172.48,397.52l-4.66,4a7.69,7.69,0,0,0-3.25-1l-2-6.59A19.87,19.87,0,0,1,172.48,397.52Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 167.525px 397.725px;" class="animable"></path>
                </g>
                <g id="elflbtzr6lsp4">
                  <path d="M161.3,405.8l-5.75,3a12,12,0,0,1-1-1.24L161,405.3A4.82,4.82,0,0,0,161.3,405.8Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 157.925px 407.05px;" class="animable"></path>
                </g>
                <g id="elnff0lms4z8">
                  <path d="M175.57,400.13l-6.43,2.29a4.81,4.81,0,0,0-.57-.44l5.76-3C174.77,399.33,175.18,399.73,175.57,400.13Z" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 172.07px 400.7px;" class="animable"></path>
                </g>
              </g>
              <g id="freepik--Chair--inject-2" class="animable" style="transform-origin: 377.105px 369.155px;">
                <polygon points="372.4 330 372.76 345.57 374.4 416 379.81 416 381.44 345.57 381.8 330 372.4 330" style="fill: rgb(64, 123, 255); transform-origin: 377.1px 373px;" id="elrn1x3vqj27q" class="animable"></polygon>
                <g id="elqewf4mi1rb">
                  <polygon points="372.4 330 372.76 345.57 374.4 416 379.81 416 381.44 345.57 381.8 330 372.4 330" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 377.1px 373px;" class="animable"></polygon>
                </g>
                <g id="elwnky3l7ng8m">
                  <polygon points="372.4 330 372.76 346 381.44 346 381.8 330 372.4 330" style="opacity: 0.2; isolation: isolate; transform-origin: 377.1px 338px;" class="animable"></polygon>
                </g>
                <polygon points="343.02 415.75 348.02 331.1 356.19 331.1 349.19 415.75 343.02 415.75" style="fill: rgb(64, 123, 255); transform-origin: 349.605px 373.425px;" id="elgtpqf2wevp6" class="animable"></polygon>
                <g id="el6d1046i7rfx">
                  <polygon points="349.21 415.75 343.03 415.75 347.57 338.7 348.02 331 356.19 331 355.56 338.7 349.21 415.75" style="fill: rgb(255, 255, 255); opacity: 0.5; isolation: isolate; transform-origin: 349.61px 373.375px;" class="animable"></polygon>
                </g>
                <g id="el04avrc124zz6">
                  <polygon points="356.19 331 355.56 339 347.57 339 348.02 331 356.19 331" style="opacity: 0.2; isolation: isolate; transform-origin: 351.88px 335px;" class="animable"></polygon>
                </g>
                <polygon points="405.02 415.75 398.02 331.1 406.19 331.1 411.19 415.75 405.02 415.75" style="fill: rgb(64, 123, 255); transform-origin: 404.605px 373.425px;" id="elmj92c9gafre" class="animable"></polygon>
                <g id="elgmc8ktj13d">
                  <polygon points="405 415.75 398.65 338.7 398.02 331 406.19 331 406.64 338.7 411.18 415.75 405 415.75" style="fill: rgb(255, 255, 255); opacity: 0.5; isolation: isolate; transform-origin: 404.6px 373.375px;" class="animable"></polygon>
                </g>
                <g id="el0vkbp95j71rr">
                  <polygon points="398.02 331 398.65 339 406.64 339 406.19 331 398.02 331" style="opacity: 0.2; isolation: isolate; transform-origin: 402.33px 335px;" class="animable"></polygon>
                </g>
                <g id="eldj174fghhsp">
                  <path d="M343.65,322.33h66.92a0,0,0,0,1,0,0V329a5,5,0,0,1-5,5H348.65a5,5,0,0,1-5-5v-6.69A0,0,0,0,1,343.65,322.33Z" style="fill: rgb(64, 123, 255); transform-origin: 377.11px 328.155px; transform: rotate(180deg);" class="animable"></path>
                </g>
                <g id="elqv2u6cbsaz9">
                  <rect x="340.44" y="328.18" width="73.33" height="5.84" rx="2.01" style="fill: rgb(64, 123, 255); transform-origin: 377.105px 331.1px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <g id="elkfwn5nkkuwm">
                  <rect x="340.44" y="328.18" width="73.33" height="5.84" rx="2.01" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 377.105px 331.1px; transform: rotate(180deg);" class="animable"></rect>
                </g>
              </g>
              <g id="freepik--Character--inject-2" class="animable" style="transform-origin: 331.173px 286.096px;">
                <g id="freepik--group--inject-2" class="animable" style="transform-origin: 331.173px 286.096px;">
                  <path d="M353.09,227.5s-.28.76-.79,2-1.29,3.13-2.24,5.19c-2.3,5-5.64,11.36-9.13,14.79a9.4,9.4,0,0,1-3.1,2.16c-3.72,1.43-13.05,1.69-21.38,1.61s-15.45-.5-15.45-.5v-6.31l27.39-7.3s14.44-26.06,23-29.92Z" style="fill: rgb(38, 50, 56); transform-origin: 327.045px 231.242px;" id="el5zdqu06t455" class="animable"></path>
                  <g id="elc7387r2kgbj">
                    <path d="M352.3,229.51c-.52,1.3-1.29,3.13-2.24,5.19-2.3,5-5.64,11.36-9.13,14.79-3.55-13.08,9.58-25.53,9.58-25.53Z" style="opacity: 0.2; isolation: isolate; transform-origin: 346.311px 236.725px;" class="animable"></path>
                  </g>
                  <polygon points="348.76 408.78 340.79 407.69 339.69 388.75 347.64 389.85 348.76 408.78" style="fill: rgb(235, 179, 118); transform-origin: 344.225px 398.765px;" id="elhgfcl70b7sm" class="animable"></polygon>
                  <g id="elpuzos29l2f">
                    <polygon points="347.64 389.85 339.69 388.76 340.32 399.58 348.27 400.28 347.64 389.85" style="opacity: 0.2; isolation: isolate; transform-origin: 343.98px 394.52px;" class="animable"></polygon>
                  </g>
                  <path d="M348.44,297.46l1.94-12.18L395,282.61s4.75,25.34,1.1,32.09c-6.51,12.05-41.61,6-51.89,7.15C350.39,347,349.79,396,349.79,396l-14.67,1.12s-11.28-52.87-13.57-78C320,302.2,334.06,302.62,348.44,297.46Z" style="fill: rgb(64, 123, 255); transform-origin: 359.456px 339.865px;" id="elbfeevjpug8" class="animable"></path>
                  <polygon points="351.51 396.73 333.88 397.88 332.37 390.33 351.74 389.44 351.51 396.73" style="fill: rgb(64, 123, 255); transform-origin: 342.055px 393.66px;" id="el59whc61q2jb" class="animable"></polygon>
                  <polygon points="330.38 401.71 322.36 402.3 317.34 384.01 325.35 383.43 330.38 401.71" style="fill: rgb(235, 179, 118); transform-origin: 323.86px 392.865px;" id="elkx2acks1zq" class="animable"></polygon>
                  <path d="M321.28,402.57l-.14,0h0c0-.12-.41-2.37-1.38-2.9a.9.9,0,0,0-.8,0,.7.7,0,0,0-.49.73,3,3,0,0,0,1.18,1.63,3.21,3.21,0,0,0-2.24.06.71.71,0,0,0-.28.63,1,1,0,0,0,.51.94,2.15,2.15,0,0,0,1.56,0,10,10,0,0,0,2-.84h.07s0,0,0-.06A.16.16,0,0,0,321.28,402.57Zm-2.41-2.24c0-.11,0-.25.27-.35l.09,0a.5.5,0,0,1,.43.05c.58.31,1,1.53,1.17,2.26l-.18-.05C319.86,401.77,318.94,400.87,318.87,400.33Zm-1.05,2.94a.71.71,0,0,1-.31-.61.36.36,0,0,1,.13-.31c.46-.34,1.92-.05,3,.27C319.31,403.28,318.29,403.52,317.82,403.27Z" style="fill: rgb(64, 123, 255); transform-origin: 319.217px 401.691px;" id="el225pckutjpx" class="animable"></path>
                  <g id="elhkq1g6zvp8a">
                    <polygon points="325.35 383.43 317.34 384.02 320.21 394.47 328.13 393.5 325.35 383.43" style="opacity: 0.2; isolation: isolate; transform-origin: 322.735px 388.95px;" class="animable"></polygon>
                  </g>
                  <path d="M314.62,393.18,328.74,389s-8.43-47.58-17-64.08c.64-.21,1.49-.48,2.54-.79,1.89-.57,4.4-1.28,7.35-2.1,20.52-5.69,62.11-16.36,62.11-16.36l-19-17.73s-75.68,11.54-77.25,31.48C286.76,329,314.62,393.18,314.62,393.18Z" style="fill: rgb(64, 123, 255); transform-origin: 335.608px 340.56px;" id="elifrgvok5bc" class="animable"></path>
                  <polygon points="330.56 389.34 313.56 394.15 310.51 387.08 329.27 382.17 330.56 389.34" style="fill: rgb(64, 123, 255); transform-origin: 320.535px 388.16px;" id="elszacifm1kxe" class="animable"></polygon>
                  <g id="elw7981tg4tab">
                    <path d="M314.3,324.16c1.89-.57,4.4-1.28,7.35-2.1-.59-4.84-.6-10.39,1.73-13.22,4.63-5.64,16.54-8.95,23.32-10.15,5.67-1,24.72-3,24.72-3s-24.72-2.37-50,5C308.94,304.35,311.37,316.56,314.3,324.16Z" style="opacity: 0.2; isolation: isolate; transform-origin: 341.68px 309.743px;" class="animable"></path>
                  </g>
                  <path d="M397.52,295.34c3-2.29.12-23.59,1.65-44.54,2.33-31.9,0-42.15-2.35-43.14a90.4,90.4,0,0,0-13.13-1.3,168.12,168.12,0,0,0-19.31.42,84.74,84.74,0,0,0-13,2.64s-10.52,33.5-3.8,81.75Z" style="fill: rgb(38, 50, 56); transform-origin: 372.736px 250.796px;" id="elq3ictn9xlc" class="animable"></path>
                  <g id="el5va2q3oza6d">
                    <path d="M400,234.38s0,0,0,0c-.13,4.69-.41,10.13-.87,16.41-1.53,20.95,1.33,42.25-1.65,44.54l-49.95-4.17a225.22,225.22,0,0,1-.05-63.15c4.06-6.34,11.94-13.57,15.56-16.74a7.52,7.52,0,0,0,4.6,2.39c3.89.76,8.33-1,12-3.24,2.9,2.89,8.4,8.74,10.81,13.67a15.72,15.72,0,0,1,.67,1.57c1.53,4.28,6.2-1,8.58-7.88A149,149,0,0,1,400,234.38Z" style="fill: rgb(255, 255, 255); opacity: 0.8; transform-origin: 372.693px 252.875px;" class="animable"></path>
                  </g>
                  <path d="M381.32,184.71c-1.09,6.24-2.06,17.64,2.37,21.7a20,20,0,0,1-14,6.36c-8,.35-5.3-6-5.3-6,6.9-1.8,6.6-6.94,5.29-11.74Z" style="fill: rgb(235, 179, 118); transform-origin: 373.821px 198.747px;" id="elk2qsh9x4nan" class="animable"></path>
                  <g id="el1q211k4x181">
                    <path d="M376.57,188.94l-6.89,6.14a19.78,19.78,0,0,1,.67,3.41c2.64-.43,6.21-3.42,6.44-6.2A9.22,9.22,0,0,0,376.57,188.94Z" style="opacity: 0.2; isolation: isolate; transform-origin: 373.267px 193.715px;" class="animable"></path>
                  </g>
                  <path d="M366.19,168.56c3.45,2.34,1.88,6.3-5.92,12.51C357.11,177,356.58,169,359.1,167S363.19,166.53,366.19,168.56Z" style="fill: rgb(38, 50, 56); transform-origin: 362.715px 173.567px;" id="elkqgej262fte" class="animable"></path>
                  <path d="M381,175c-.37,8.43-.17,13.37-4.34,17.77-6.28,6.61-16.74,2.93-18.89-5.44-1.92-7.52-1-20,7.19-23.53A11.49,11.49,0,0,1,381,175Z" style="fill: rgb(235, 179, 118); transform-origin: 368.971px 179.511px;" id="elydjftx5zsmp" class="animable"></path>
                  <path d="M368.49,177.5c0,.69-.34,1.25-.79,1.26s-.81-.54-.82-1.23.33-1.24.78-1.25S368.43,176.83,368.49,177.5Z" style="fill: rgb(38, 50, 56); transform-origin: 367.685px 177.52px;" id="el4ep59ni6qqq" class="animable"></path>
                  <path d="M360.7,177.65c0,.68-.34,1.24-.79,1.25s-.82-.53-.83-1.23.34-1.25.79-1.25S360.69,177,360.7,177.65Z" style="fill: rgb(38, 50, 56); transform-origin: 359.89px 177.66px;" id="elqa0dvho7aja" class="animable"></path>
                  <path d="M363.25,177.93a24.39,24.39,0,0,1-3.17,5.91,4,4,0,0,0,3.28.56Z" style="fill: rgb(213, 135, 69); transform-origin: 361.72px 181.232px;" id="el782dgov2yb" class="animable"></path>
                  <path d="M370.58,175a.36.36,0,0,0,.25-.06.4.4,0,0,0,.08-.56,4,4,0,0,0-3.31-1.61.38.38,0,0,0-.36.41v0a.41.41,0,0,0,.43.36h0a3.18,3.18,0,0,1,2.6,1.3A.44.44,0,0,0,370.58,175Z" style="fill: rgb(38, 50, 56); transform-origin: 369.114px 173.886px;" id="elv8mhd3temnk" class="animable"></path>
                  <path d="M357.11,175.08a.41.41,0,0,0,.37-.23,3.17,3.17,0,0,1,2.23-1.86.41.41,0,0,0,.34-.46.4.4,0,0,0-.45-.34,4,4,0,0,0-2.85,2.32.4.4,0,0,0,.19.53h0A.32.32,0,0,0,357.11,175.08Z" style="fill: rgb(38, 50, 56); transform-origin: 358.383px 173.633px;" id="el52sj5ewnmm6" class="animable"></path>
                  <path d="M377.54,167.58c-3.91,1.42-3.35,5.65,2.69,13.57,4.08-3.21,6.55-10.82,4.58-13.37S381,166.35,377.54,167.58Z" style="fill: rgb(38, 50, 56); transform-origin: 380.277px 173.696px;" id="eltst06lh69fs" class="animable"></path>
                  <path d="M385.15,181.65a8,8,0,0,1-3.73,4.86c-2.45,1.38-4.34-.65-4.23-3.3.11-2.4,1.51-6,4.24-6.3S385.81,179.13,385.15,181.65Z" style="fill: rgb(235, 179, 118); transform-origin: 381.24px 181.921px;" id="elmc73llosnp" class="animable"></path>
                  <path d="M369.68,185.79a5.88,5.88,0,0,1-5.54,2.63" style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.526291px; transform-origin: 366.91px 187.121px;" id="elynttxl1rceb" class="animable"></path>
                  <path d="M369,166.24s1.26,8.44,9.39,9,9.87-4.49,9.87-4.49a15.54,15.54,0,0,1-2,.16s2.38-4.09,0-8-10.48-8.09-16.49-6a14.27,14.27,0,0,0-11.38,1.1c-5.63,3.27-4.63,10.4-4.63,10.4s-.25-4.33,2.38-5.54c0,0-3.25,8.91,1.62,11.29C357.75,174.13,358.23,165.36,369,166.24Z" style="fill: rgb(38, 50, 56); transform-origin: 370.976px 165.744px;" id="el6tivk4w11au" class="animable"></path>
                  <path d="M355.17,246s-29-.66-30.64-.82-8.51-4-10-4.21-5.38,6-5.87,7.44,11,5.34,12.11,5.17a20.69,20.69,0,0,0,3.73-1.39l29.6,3.81Z" style="fill: rgb(235, 179, 118); transform-origin: 331.907px 248.482px;" id="eljezz08d64u" class="animable"></path>
                  <path d="M271,252v2.65c0,.79,1.36,1.35,2.15,1.35h61.79c.8,0,2.06-.56,2.06-1.35V252Z" style="fill: rgb(38, 50, 56); transform-origin: 304px 254px;" id="elsgu6q13t1qi" class="animable"></path>
                  <g id="elu5ndfwafsuc">
                    <path d="M271,252v2.65c0,.79,1.36,1.35,2.15,1.35h61.79c.8,0,2.06-.56,2.06-1.35V252Z" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 304px 254px;" class="animable"></path>
                  </g>
                  <g id="elaawl89dpzj">
                    <path d="M271,252v2.65c0,.79,1.36,1.35,2.15,1.35H313.9c.8,0,2.1-.56,2.1-1.35V252Z" style="opacity: 0.2; isolation: isolate; transform-origin: 293.5px 254px;" class="animable"></path>
                  </g>
                  <path d="M261.09,219.51,268.45,253a2.61,2.61,0,0,0,2.39,2H311a1.74,1.74,0,0,0,1.51-2.24l-7.35-33.12a2.3,2.3,0,0,0-2.39-1.64H262.61C261.53,218,260.85,218.42,261.09,219.51Z" style="fill: rgb(38, 50, 56); transform-origin: 286.814px 236.496px;" id="eleajsj011iiq" class="animable"></path>
                  <g id="el02zf72lyrjff">
                    <path d="M261.09,219.51,268.45,253a2.61,2.61,0,0,0,2.39,2H311a1.74,1.74,0,0,0,1.51-2.24l-7.35-33.12a2.3,2.3,0,0,0-2.39-1.64H262.61C261.53,218,260.85,218.42,261.09,219.51Z" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 286.814px 236.496px;" class="animable"></path>
                  </g>
                  <g id="el3tyoyporkxz">
                    <path d="M261.09,219.51,268.45,253a2.61,2.61,0,0,0,2.39,2h38.81a1.75,1.75,0,0,0,1.52-2.24l-7.35-33.12a2.3,2.3,0,0,0-2.39-1.64H262.61C261.53,218,260.85,218.42,261.09,219.51Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 286.142px 236.496px;" class="animable"></path>
                  </g>
                  <g id="eldcjsvyjg9nc">
                    <path d="M284.73,241c-1.87,0-3.79-2-4.28-4.48S281.09,232,283,232a2.91,2.91,0,0,1,1,.2,5.74,5.74,0,0,0,3.19,4.09,1.46,1.46,0,0,1,.05.2C287.74,239,286.61,241,284.73,241Z" style="opacity: 0.2; isolation: isolate; transform-origin: 283.847px 236.5px;" class="animable"></path>
                  </g>
                  <g id="elh5tzr55h6rg">
                    <path d="M400,234.38s0,0,0,0c-4.31,7-10.34,14.45-16.35,14.1-6.29-.37.05-13.21,6.81-24.39a15.72,15.72,0,0,1,.67,1.57c1.53,4.28,6.2-1,8.58-7.88A149,149,0,0,1,400,234.38Z" style="opacity: 0.2; isolation: isolate; transform-origin: 390.588px 233.136px;" class="animable"></path>
                  </g>
                  <path d="M396.82,207.66c14.83,5.34-11.2,45.5-19.29,49.64s-29.35-.63-29.35-.63l1.32-12.41s16.83,1.14,20.18.29,11.31-18,15.89-26.05A25.84,25.84,0,0,1,396.82,207.66Z" style="fill: rgb(38, 50, 56); transform-origin: 374.742px 233.325px;" id="elkk5083rdmnf" class="animable"></path>
                  <g id="elrgg2h1xlcje">
                    <polygon points="351.51 396.73 333.88 397.88 332.37 390.33 351.74 389.44 351.51 396.73" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 342.055px 393.66px;" class="animable"></polygon>
                  </g>
                  <g id="elyslbogzt85">
                    <polygon points="330.56 389.34 313.56 394.15 310.51 387.08 329.27 382.17 330.56 389.34" style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 320.535px 388.16px;" class="animable"></polygon>
                  </g>
                  <path d="M321.58,401.48l8.68-2.42a.58.58,0,0,1,.72.36h0l2.35,6.76a1.43,1.43,0,0,1-1,1.75c-3.05.79-4.54,1-8.37,2.06-2.35.65-6.93,2.15-10.28,2.53s-3.63-2.94-2.25-3.39c3.28-1.1,7.21-4.52,8.91-6.84A2.27,2.27,0,0,1,321.58,401.48Z" style="fill: rgb(38, 50, 56); transform-origin: 322.015px 405.792px;" id="elt7sjmr8doe" class="animable"></path>
                  <path d="M340,407.7h0c0-.14-.14-2.41-1-3.13a1.16,1.16,0,0,0-.9-.21.77.77,0,0,0-.68.6,2.89,2.89,0,0,0,.79,1.84,3.31,3.31,0,0,0-2.22-.41.74.74,0,0,0-.41.56,1,1,0,0,0,.3,1,2.13,2.13,0,0,0,1.52.3,9.31,9.31,0,0,0,2.1-.42.08.08,0,0,0,.07,0l0-.06s.19,0,.2-.07.17,0,.17,0ZM337.79,405c0-.11.07-.25.33-.3h.09a.51.51,0,0,1,.41.15c.51.42.65,1.69.68,2.45l-.16-.09A3.78,3.78,0,0,1,337.79,405Zm-1.64,2.65A.7.7,0,0,1,336,407a.33.33,0,0,1,.2-.27c.51-.24,1.88.35,2.85.88C337.61,408,336.55,408,336.15,407.69Z" style="fill: rgb(64, 123, 255); transform-origin: 337.773px 406.312px;" id="elyv06fs34pr" class="animable"></path>
                  <path d="M340.19,406.73l9-.56a.56.56,0,0,1,.63.5h0l.88,7.1a1.4,1.4,0,0,1-1.31,1.5c-3.14.15-4.65.06-8.61.28-2.43.14-7.22.66-10.58.33s-2.94-3.63-1.49-3.79c3.43-.39,8-2.91,10.13-4.83A2.24,2.24,0,0,1,340.19,406.73Z" style="fill: rgb(38, 50, 56); transform-origin: 339.166px 411.077px;" id="elgnf11oi609u" class="animable"></path>
                </g>
              </g>
              <g id="freepik--Table--inject-2" class="animable" style="transform-origin: 303.17px 335.795px;">
                <polygon points="300.11 416 306.23 416 307.24 262.75 299.11 262.75 300.11 416" style="fill: rgb(64, 123, 255); transform-origin: 303.175px 339.375px;" id="elrmr544qynif" class="animable"></polygon>
                <g id="eld236j0crxd">
                  <polygon points="299.1 263 299.26 287.73 300.1 416 306.23 416 307.07 287.73 307.23 263 299.1 263" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 303.165px 339.5px;" class="animable"></polygon>
                </g>
                <g id="eloql3u6oc6ti">
                  <polygon points="299.1 263 299.26 288 307.07 288 307.23 263 299.1 263" style="opacity: 0.2; isolation: isolate; transform-origin: 303.165px 275.5px;" class="animable"></polygon>
                </g>
                <polygon points="235.07 416 241.19 416 252.2 262.75 244.07 262.75 235.07 416" style="fill: rgb(64, 123, 255); transform-origin: 243.635px 339.375px;" id="elf7ufxbrgcrc" class="animable"></polygon>
                <g id="elg0l6crls3n">
                  <polygon points="235.06 416 241.19 416 251.66 270.37 252.2 263 244.07 263 243.63 270.37 235.06 416" style="fill: rgb(255, 255, 255); opacity: 0.5; isolation: isolate; transform-origin: 243.63px 339.5px;" class="animable"></polygon>
                </g>
                <g id="elgw08tj5kf3">
                  <polygon points="243.63 270 251.66 270 252.2 263 244.07 263 243.63 270" style="opacity: 0.2; isolation: isolate; transform-origin: 247.915px 266.5px;" class="animable"></polygon>
                </g>
                <polygon points="365.15 416 371.27 416 362.27 262.75 354.14 262.75 365.15 416" style="fill: rgb(64, 123, 255); transform-origin: 362.705px 339.375px;" id="ellw8q3za3tjp" class="animable"></polygon>
                <g id="el9t7btfqr309">
                  <polygon points="354.14 263 354.68 270.37 365.15 416 371.27 416 362.71 270.37 362.27 263 354.14 263" style="fill: rgb(255, 255, 255); opacity: 0.5; isolation: isolate; transform-origin: 362.705px 339.5px;" class="animable"></polygon>
                </g>
                <g id="eliycg2n7wqd">
                  <polygon points="362.27 263 354.14 263 354.68 270 362.71 270 362.27 263" style="opacity: 0.2; isolation: isolate; transform-origin: 358.425px 266.5px;" class="animable"></polygon>
                </g>
                <g id="elbb9x8p4qyki">
                  <path d="M239.79,258.92H366.55a2.16,2.16,0,0,1,2.16,2.16v5.51a0,0,0,0,1,0,0H237.63a0,0,0,0,1,0,0v-5.51A2.16,2.16,0,0,1,239.79,258.92Z" style="fill: rgb(64, 123, 255); transform-origin: 303.17px 262.755px; transform: rotate(180deg);" class="animable"></path>
                </g>
                <g id="el0os6sgchj6l">
                  <path d="M239.79,258.92H366.55a2.16,2.16,0,0,1,2.16,2.16v5.51a0,0,0,0,1,0,0H237.63a0,0,0,0,1,0,0v-5.51A2.16,2.16,0,0,1,239.79,258.92Z" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 303.17px 262.755px; transform: rotate(180deg);" class="animable"></path>
                </g>
                <g id="elnfpduuokjfs">
                  <rect x="237.63" y="258.92" width="131.08" height="3.84" style="opacity: 0.2; isolation: isolate; transform-origin: 303.17px 260.84px; transform: rotate(180deg);" class="animable"></rect>
                </g>
                <path d="M233.83,259.92H372.51a2.17,2.17,0,0,0,2.16-2.17h0a2.16,2.16,0,0,0-2.16-2.16H233.83a2.16,2.16,0,0,0-2.16,2.16h0A2.17,2.17,0,0,0,233.83,259.92Z" style="fill: rgb(64, 123, 255); transform-origin: 303.17px 257.755px;" id="eljur8f0a47ro" class="animable"></path>
                <g id="elmfe0bp8ew3">
                  <path d="M233.83,259.92H372.51a2.17,2.17,0,0,0,2.16-2.17h0a2.16,2.16,0,0,0-2.16-2.16H233.83a2.16,2.16,0,0,0-2.16,2.16h0A2.17,2.17,0,0,0,233.83,259.92Z" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 303.17px 257.755px;" class="animable"></path>
                </g>
              </g>
              <defs>
                <filter id="active" height="200%">
                  <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                  <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                  <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                  <feMerge>
                    <feMergeNode in="OUTLINE"></feMergeNode>
                    <feMergeNode in="SourceGraphic"></feMergeNode>
                  </feMerge>
                </filter>
                <filter id="hover" height="200%">
                  <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                  <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                  <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                  <feMerge>
                    <feMergeNode in="OUTLINE"></feMergeNode>
                    <feMergeNode in="SourceGraphic"></feMergeNode>
                  </feMerge>
                  <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>
                </filter>
              </defs>
            </svg>
          </div>
        </div>
      </div>
      <!-- <div class="s__00887744">
			<h3 class="con__sff">Connecting</h3>
<p>ERP solutions developed by EduClouds teams for education businesses increase the efficiency of planning, designing and operating academic resources. The implementation of an ERP system can help improve the effectiveness of various education processes and enhance communication between teachers, students, admin and parents.</p>

				</div>
			<div class="imagesdd">
				<span class="sdd">Students</span>
				<span class="sddsss">Parents</span>
			<img src="assets/images/cloud-computing.gif" />
			<span class="sddsssssteach">Teachers</span>
			<span class="sddsssssadmin">Admin</span>
			</div> -->

    </div>

  </section>

  <section class="img__gallerys">
    <div class="container">
      <h1 class="my-4 text-center text-lg-center" style="    padding-bottom: 36px;">Photo Gallery</h1>
      <div class="row gallery">
        <div class="col-md-3">
          <div class="s__listingg">
            <a href="assets/images/sweee.jpg">
              <figure><img class="img-fluid img-thumbnail" src="assets/images/sweee.jpg" alt=""></figure>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="s__listingg">
            <a href="assets/images/wer11.jpg">
              <figure><img class="img-fluid img-thumbnail" src="assets/images/wer11.jpg" style="height: 263px;" alt=""></figure>
            </a>
          </div>
        </div>

        <div class="col-md-6">
          <div class="s__listingg">
            <a href="assets/images/swwqq.jpg">
              <figure><img class="img-fluid img-thumbnail" src="assets/images/swwqq.jpg" alt=""></figure>
            </a>
          </div>
        </div>

        <div class="col-md-5">
          <div class="s__listingg">
            <a href="assets/images/weerr.jpg">
              <figure><img class="img-fluid img-thumbnail" src="assets/images/weerr.jpg" alt=""></figure>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="s__listingg">
            <a href="assets/images/qawss.jpg">
              <figure><img class="img-fluid img-thumbnail" src="assets/images/qawss.jpg" alt=""></figure>
            </a>
          </div>
        </div>

        <div class="col-md-2">
          <div class="s__listingg">
            <a href="assets/images/qweee.jpg">
              <figure><img class="img-fluid img-thumbnail" src="assets/images/qweee.jpg" style="height: 264px;" alt=""></figure>
            </a>
          </div>
        </div>

        <div class="col-md-2">
          <div class="s__listingg">
            <a href="assets/images/1sw1.jpg">
              <figure><img class="img-fluid img-thumbnail" src="assets/images/1sw1.jpg" style="    width: 168%;
    max-width: 159%;" alt=""></figure>
            </a>
          </div>

        </div>

        <!--
		<div class="s__774qws">
			<a href="https://picsum.photos/940/650?random=7">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=7" alt="Random Image"></figure>
			</a>
		</div>

		<div class="s__774qws">
			<a href="https://picsum.photos/940/650?random=8">
				<figure><img class="img-fluid img-thumbnail" src="https://picsum.photos/940/650?random=8" alt="Random Image"></figure>
			</a>
		</div>
-->
      </div>
    </div>
  </section>

  <!--
	<section class="school-runns">
		<div class="container">
			<div class="runnns-head">
				<h2>When your school runs <br> on lorem, everybody wins.</h2>
			</div>

			<div class="runnnos-coolom">
				<div class="row">
					<div class="col-md-3 ">
						<div class="back-oone">
							<div class="innner-back">
								<div class="caared-headdd-one">
									<img src="assets/images/icn_student.svg" alt="">

								</div>
								<div class="boorder"></div>
								<div class="runnss-inf">
									<h3>Students</h3>
									<div class="abbot-runnss">
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sit officiis
											praesentium maxime at soluta?</p>
									</div>
								</div>

								<div class="aarrw">
									<img src="assets/images/Arrow col.svg" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 ">
						<div class="back-ttwo">
							<div class="innner-back">
								<div class="caared-headdd-two">
									<img src="assets/images/parent.svg" alt="">
								</div>
								<div class="boorderr"></div>
								<div class="runnss-inf">
									<h3>Parents</h3>
									<div class="abbot-runnss">
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sit officiis
											praesentium maxime at soluta?</p>
									</div>
								</div>
								<div class="aarrw">
									<img src="assets/images/Arrow col.svg" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 ">
						<div class="back-tthree">
							<div class="innner-back">
								<div class="caared-headdd-three">
									<img src="assets/images/teacher.svg" alt="">
								</div>
								<div class="boorderrr"></div>
								<div class="runnss-inf">
									<h3>Teachers</h3>
									<div class="abbot-runnss">
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sit officiis
											praesentium maxime at soluta?</p>
									</div>
								</div>
								<div class="aarrw">
									<img src="assets/images/Arrow col.svg" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 ">
						<div class="back-ffour">
							<div class="innner-back">
								<div class="caared-headdd-four">
									<img src="assets/images/admin.svg" alt="">
								</div>
								<div class="boorderrrr"></div>
								<div class="runnss-inf">
									<h3>Principals</h3>
									<div class="abbot-runnss">
										<p>Study smarter, get better grades, and fulfill your true potential by learning
											in
											the
											way that makes sense for you.</p>
									</div>
								</div>
								<div class="aarrw">
									<img src="assets/images/Arrow col.svg" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
-->

  <!--
	<section class="aday">
		<div class="container">
			
			<div class="heding__Dfe">
			<h2>india's first education acceptor</h2>
			</div>
			<div class="aadday-innffffo">
				<h3>A day in a life <br> of an <span><img src="assets/images/avatarschool.jpg" alt=""></span> Lorem. <br>
					student</h3>
				<a href=""> Start Experience</a>
			</div>
			<div class="aadayy-lloo">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 740 740" width="740" height="740"
					preserveAspectRatio="xMidYMid meet"
					style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px);">
					<defs>
						<clipPath id="__lottie_element_114">
							<rect width="740" height="740" x="0" y="0"></rect>
						</clipPath>
					</defs>
					<g clip-path="url(#__lottie_element_114)">
						<g transform="matrix(2,0,0,2,18,18)" opacity="1" style="display: block;">
							<g opacity="0.9275930379999991" transform="matrix(1,0,0,1,0,0)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M175.75399780273438,55.507999420166016 C175.75399780273438,55.507999420166016 175.75399780273438,0 175.75399780273438,0">
								</path>
							</g>
							<g opacity="1" transform="matrix(1,0,0,1,249.7480010986328,47.57899856567383)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M-13.87600040435791,24.035999298095703 C-13.87600040435791,24.035999298095703 13.87600040435791,-24.035999298095703 13.87600040435791,-24.035999298095703">
								</path>
							</g>
							<g opacity="1" transform="matrix(1,0,0,1,303.91900634765625,101.74199676513672)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M-24.03499984741211,13.878999710083008 C-24.03499984741211,13.878999710083008 24.034000396728516,-13.878999710083008 24.034000396728516,-13.878999710083008">
								</path>
							</g>
							<g opacity="1" transform="matrix(1,0,0,1,323.7539978027344,175.73300170898438)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M-27.753999710083008,0.004000000189989805 C-27.753999710083008,0.004000000189989805 27.753999710083008,-0.004000000189989805 27.753999710083008,-0.004000000189989805">
								</path>
							</g>
							<g opacity="1" transform="matrix(1,0,0,1,303.94000244140625,249.72999572753906)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M-24.038000106811523,-13.873000144958496 C-24.038000106811523,-13.873000144958496 24.038000106811523,13.873000144958496 24.038000106811523,13.873000144958496">
								</path>
							</g>
							<g opacity="0.36203481000000465"
								transform="matrix(1,0,0,1,249.78399658203125,303.9079895019531)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M-13.881999969482422,-24.033000946044922 C-13.881999969482422,-24.033000946044922 13.883000373840332,24.033000946044922 13.883000373840332,24.033000946044922">
								</path>
							</g>
							<g opacity="0" transform="matrix(1,0,0,1,175.79600524902344,323.7539978027344)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M-0.00800000037997961,-27.753999710083008 C-0.00800000037997961,-27.753999710083008 0.00800000037997961,27.753999710083008 0.00800000037997961,27.753999710083008">
								</path>
							</g>
							<g opacity="0" transform="matrix(1,0,0,1,101.7969970703125,303.95001220703125)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M13.869000434875488,-24.040000915527344 C13.869000434875488,-24.040000915527344 -13.869000434875488,24.040000915527344 -13.869000434875488,24.040000915527344">
								</path>
							</g>
							<g opacity="0.12759303799999913"
								transform="matrix(1,0,0,1,47.61000061035156,249.802001953125)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M24.0310001373291,-13.88599967956543 C24.0310001373291,-13.88599967956543 -24.0310001373291,13.88599967956543 -24.0310001373291,13.88599967956543">
								</path>
							</g>
							<g opacity="0.3275930379999991"
								transform="matrix(1,0,0,1,27.753999710083008,175.81700134277344)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M27.753999710083008,-0.012000000104308128 C27.753999710083008,-0.012000000104308128 -27.753999710083008,0.012000000104308128 -27.753999710083008,0.012000000104308128">
								</path>
							</g>
							<g opacity="0.527593037999999"
								transform="matrix(1,0,0,1,47.54800033569336,101.81500244140625)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M24.04199981689453,13.864999771118164 C24.04199981689453,13.864999771118164 -24.04199981689453,-13.864999771118164 -24.04199981689453,-13.864999771118164">
								</path>
							</g>
							<g opacity="0.7275930379999992"
								transform="matrix(1,0,0,1,101.68800354003906,47.619998931884766)">
								<path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0"
									stroke-miterlimit="10" stroke="rgb(174,126,238)" stroke-opacity="1" stroke-width="1"
									d=" M13.890000343322754,24.027999877929688 C13.890000343322754,24.027999877929688 -13.888999938964844,-24.027999877929688 -13.888999938964844,-24.027999877929688">
								</path>
							</g>
						</g>
					</g>
				</svg>
			</div>

		</div>
	</section>
-->







  <section class="s___etestimonilss">







  </section>




  <!--
	<section class="caards">
		<div class="container">
			<div class="caard-one">
				<div class="oone-con">
					<div class="oonee-headdd">
						<small>Learning enhancement</small>
						<h4>Help your students get better grades.</h4>
					</div>

					<div class="ooone-inffo">
						<div class="d-flex align-items-start">
							<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
								aria-orientation="vertical">
								<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
									aria-selected="true">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>
								<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-profile" type="button" role="tab"
									aria-controls="v-pills-profile" aria-selected="false">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>

								<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-messages" type="button" role="tab"
									aria-controls="v-pills-messages" aria-selected="false">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>

							</div>
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
									aria-labelledby="v-pills-home-tab" tabindex="0">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat sed blanditiis
									fugit totam numquam ipsum quod ea illum veritatis minus?
								</div>
								<div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
									aria-labelledby="v-pills-profile-tab" tabindex="0">
									Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur totam minima
									voluptatibus veniam consequuntur consequatur quisquam sit voluptatem dolorum enim.
								</div>

								<div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
									aria-labelledby="v-pills-messages-tab" tabindex="0">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae id ullam tempora
									commodi delectus quia doloribus facere, nulla rerum tenetur!
								</div>

							</div>
						</div>
					</div>


				</div>
				<div class="ooone-buttoo">
					<a href="">See all learning features <span><i class="bi bi-arrow-right"></i></span></a>
				</div>
			</div>
			<div class="caard-two">
				<div class="oone-con">
					<div class="oonee-headdd">
						<small>Learning enhancement</small>
						<h4>Help your students get better grades.</h4>
					</div>

					<div class="ooone-inffo">
						<div class="d-flex align-items-start">
							<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
								aria-orientation="vertical">
								<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
									aria-selected="true">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>
								<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-profile" type="button" role="tab"
									aria-controls="v-pills-profile" aria-selected="false">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>

								<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-messages" type="button" role="tab"
									aria-controls="v-pills-messages" aria-selected="false">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>

							</div>
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
									aria-labelledby="v-pills-home-tab" tabindex="0">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quos eum
									repellendus dolorem deleniti. Quis repudiandae aspernatur reiciendis dicta harum!
								</div>
								<div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
									aria-labelledby="v-pills-profile-tab" tabindex="0">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab molestiae est accusamus
									perspiciatis earum optio similique porro magnam sed obcaecati?
								</div>

								<div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
									aria-labelledby="v-pills-messages-tab" tabindex="0">
									Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo, a laborum hic
									voluptatibus voluptate officia. Perferendis aliquam placeat odio exercitationem!
								</div>

							</div>
						</div>
					</div>


				</div>
				<div class="ooone-buttoo">
					<a href="">See all learning features <span><i class="bi bi-arrow-right"></i></span></a>
				</div>
			</div>
			<div class="caard-three">
				<div class="oone-con">
					<div class="oonee-headdd">
						<small>Learning enhancement</small>
						<h4>Help your students get better grades.</h4>
					</div>

					<div class="ooone-inffo">
						<div class="d-flex align-items-start">
							<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
								aria-orientation="vertical">
								<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
									aria-selected="true">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>
								<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-profile" type="button" role="tab"
									aria-controls="v-pills-profile" aria-selected="false">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>

								<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
									data-bs-target="#v-pills-messages" type="button" role="tab"
									aria-controls="v-pills-messages" aria-selected="false">
									<span><i class="bi bi-ticket-detailed"></i></span> Lorem ipsum dolor sit amet consectetur.
								</button>

							</div>
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
									aria-labelledby="v-pills-home-tab" tabindex="0">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est aspernatur explicabo
									quas atque perspiciatis ipsa amet impedit non dolorem excepturi.
								</div>
								<div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
									aria-labelledby="v-pills-profile-tab" tabindex="0">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident corrupti
									temporibus, aliquid soluta impedit quo atque? Unde reiciendis ad alias?
								</div>

								<div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
									aria-labelledby="v-pills-messages-tab" tabindex="0">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, tenetur architecto vel
									animi adipisci temporibus nihil! Inventore eum est delectus.
								</div>

							</div>
						</div>
					</div>


				</div>
				<div class="ooone-buttoo">
					<a href="">See all learning features <span><i class="bi bi-arrow-right"></i></span></a>
				</div>
			</div>
		</div>

	</section>
-->

  <!--

	<section class="desssigned">
		<div class="container">
			<div class="beene-head">
				<h2>Designed to cover every major board in India.</h2>
			</div>
			<div class="bennfi-coolun">
				<div class="row">
					<div class="col-md-4">
						<div class="deesss-check">
							<div class="deess">
								<i class="bi bi-check-circle"></i>
								<h4>Boards</h4>
							</div>
							<div class="ddess-inddo">

								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, a.
								</p>
							</div>

						</div>
					</div>
					<div class="col-md-4 ckeccc-borr">
						<div class="deesss-check">
							<div class="deess">
								<i class="bi bi-check-circle"></i>
								<h4>Grades</h4>
							</div>
							<div class="ddess-inddo">

								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, a.
								</p>
							</div>

						</div>
					</div>
					<div class="col-md-4">
						<div class="deesss-check">
							<div class="deess">
								<i class="bi bi-check-circle"></i>
								<h4>Subjects</h4>
							</div>
							<div class="ddess-inddo">

								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, a.
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
-->


  <section class="sollutions" style="display: none;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">
          <div class="sooll-headd ddffe">
            <h2>Features</h2>
            <p>The robust, feature-rich, analytics-equipped, user-friendly EduClouds ERP - built on a cutting-edge and flexible architecture - enables
              educational institutions to automate & streamline their functions and processes for both learning and administration.</p>
          </div>
        </div>
        <div class="col-md-7">
          <div class="collumnnss marquee">
            <div class="coll-oonee">

              <div class="ddi-two">
                <p>This analysis provides an introspective capability of the individual and motivating them to achieve more thereby improving them in the best possible way.
                </p>

                <div class="ttwo-innff">
                  <p>STUDENT, FACULTY PERFORMANCE ANALYSIS</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

              <div class="ddi-two">
                <p>The deep learning helps in decision making based on students' interests. This will give an insight to the parents on their children's strengths.

                </p>

                <div class="ttwo-innff">
                  <p>DEEP LEARNINGS</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

              <div class="ddi-two">
                <p>Say goodbye to the old and tedious way of tracking attendance. Simplify attendance and gain clarity on employee’s attendance in real-time.

                </p>

                <div class="ttwo-innff">
                  <p>ATTENDANCE MANAGEMENT</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

              <div class="ddi-two">
                <p>EduClouds ERP Software is a flexible solution which provides for smooth configuration and customization as per institutional needs.


                </p>

                <div class="ttwo-innff">
                  <p>SUPERIOR FLEXIBILITY
                  </p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

            </div>
            <div class="coll-oonee">

              <div class="ddi-two">
                <p>This analysis provides an introspective capability of the individual and motivating them to achieve more thereby improving them in the best possible way.
                </p>

                <div class="ttwo-innff">
                  <p>STUDENT, FACULTY PERFORMANCE ANALYSIS</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

              <div class="ddi-two">
                <p>The deep learning helps in decision making based on students' interests. This will give an insight to the parents on their children's strengths.

                </p>

                <div class="ttwo-innff">
                  <p>DEEP LEARNINGS</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

              <div class="ddi-two">
                <p>Say goodbye to the old and tedious way of tracking attendance. Simplify attendance and gain clarity on employee’s attendance in real-time.

                </p>

                <div class="ttwo-innff">
                  <p>ATTENDANCE MANAGEMENT</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

              <div class="ddi-two">
                <p>EduClouds ERP Software is a flexible solution which provides for smooth configuration and customization as per institutional needs.


                </p>

                <div class="ttwo-innff">
                  <p>SUPERIOR FLEXIBILITY
                  </p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

            </div>
            <div class="coll-oonee">

              <div class="didi-two ddi-two">
                <p>The deep learning helps in decision making based on students' interests. This will give an insight to the parents on their children's strengths.

                </p>

                <div class="ttwo-innff">
                  <p>DEEP LEARNINGS</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>
              <div class="didi-three ddi-two">
                <p>Say goodbye to the old and tedious way of tracking attendance. Simplify attendance and gain clarity on employee’s attendance in real-time.

                </p>

                <div class="ttwo-innff">
                  <p>ATTENDANCE MANAGEMENT</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>

              <div class="didi-two ddi-two">
                <p>Say goodbye to the old and tedious way of tracking attendance. Simplify attendance and gain clarity on employee’s attendance in real-time.

                </p>

                <div class="ttwo-innff">
                  <p>ATTENDANCE MANAGEMENT</p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>
              <div class="ddi-two">
                <p>EduClouds ERP Software is a flexible solution which provides for smooth configuration and customization as per institutional needs.


                </p>

                <div class="ttwo-innff">
                  <p>SUPERIOR FLEXIBILITY
                  </p>
                  <!-- <small>Principal</small> -->
                </div>
              </div>
              <!-- 		<div class="didi-three ddi-two">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum doloribus temporibus,
									nobis quidem fugit, sint animi similique harum consequatur inventore ratione impedit
									libero ipsam porro magnam fugiat in reprehenderit esse!
								</p>

								<div class="ttwo-innff">
									<p>Pari Basumatary</p>
									<small>Principal</small>
								</div>
							</div>
							
							
							<div class="didi-two ddi-two">
								<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta voluptatibus, minus
									id blanditiis quidem ut amet? Autem, sapiente? Libero maxime reiciendis doloribus
									officia alias molestias, sit voluptate obcaecati fuga dolor.
								</p>

								<div class="ttwo-innff">
									<p>Pari Basumatary</p>
									<small>Principal</small>
								</div>
							</div>
							<div class="didi-three ddi-two">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum doloribus temporibus,
									nobis quidem fugit, sint animi similique harum consequatur inventore ratione impedit
									libero ipsam porro magnam fugiat in reprehenderit esse!
								</p>

								<div class="ttwo-innff">
									<p>Pari Basumatary</p>
									<small>Principal</small>
								</div>
							</div>
							
							<div class="didi-two ddi-two">
								<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta voluptatibus, minus
									id blanditiis quidem ut amet? Autem, sapiente? Libero maxime reiciendis doloribus
									officia alias molestias, sit voluptate obcaecati fuga dolor.
								</p>

								<div class="ttwo-innff">
									<p>Pari Basumatary</p>
									<small>Principal</small>
								</div>
							</div>
							<div class="didi-three ddi-two">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum doloribus temporibus,
									nobis quidem fugit, sint animi similique harum consequatur inventore ratione impedit
									libero ipsam porro magnam fugiat in reprehenderit esse!
								</p>

								<div class="ttwo-innff">
									<p>Pari Basumatary</p>
									<small>Principal</small>
								</div>
							</div>
						</div> -->
              <div class="coll-oonee" style="width: 50%;">

              </div>
            </div>

          </div>
        </div>
      </div>
  </section>







  <section class="feat__Ewsd">
    <div class="container-fluid">
      <div class="feat__eteop">
        <h1>Features</h1>
        <p>The robust, feature-rich, analytics-equipped, user-friendly EduClouds ERP - built on a cutting-edge and flexible architecture - enables
          educational institutions to automate & streamline their functions and processes for both learning and administration.</p>
      </div>


      <div class="cloud__feats2">
        <div class="cluds__wf3">
          <img src="assets/images/cloud-computing.png" alt="" class="">
        </div>
        <div class="line111"></div>
        <div class="line112"></div>
        <div class="line113"></div>
        <div class="line114"></div>

        <div class="feat__uressss feat_ures111">
          <div class="ddi-two">
            <div class="ttwo-innff fsa___7s6">
              <p>STUDENT, FACULTY PERFORMANCE ANALYSIS</p>
            </div>
            <p>This analysis provides an introspective capability of the individual and motivating them to achieve more thereby improving them in the best possible way.
            </p>

            <div class="hover_absssss"></div>
          </div>
        </div>
        <div class="feat__uressss feat_ures112">
          <div class="ddi-two">
            <div class="ttwo-innff fsa___7s6">
              <p>DEEP LEARNINGS</p>
            </div>
            <p>The deep learning helps in decision making based on students' interests. This will give an insight to the parents on their children's strengths.
            </p>
            <div class="hover_absssss"></div>
          </div>
        </div>
        <div class="feat__uressss feat_ures113">
          <div class="ddi-two">
            <div class="ttwo-innff fsa___7s6">
              <p>ATTENDANCE MANAGEMENT</p>
            </div>
            <p>EduClouds ERP Software is a flexible solution which provides for smooth configuration and customization as per institutional needs.
            </p>
            <div class="hover_absssss"></div>
          </div>
        </div>
        <div class="feat__uressss feat_ures114">
          <div class="ddi-two">
            <div class="ttwo-innff fsa___7s6">
              <p>SUPERIOR FLEXIBILITY</p>
            </div>
            <p>EduClouds ERP Software is a flexible solution which provides for smooth configuration and customization as per institutional needs.

            </p>
            <div class="hover_absssss"></div>
          </div>
        </div>
      </div>

    </div>
  </section>





  <section class="feat__Ewsd">
    <div class="container-fluid">
      <div class="feat__eteop">
        <h1>Latest Blogs</h1>
        <!-- <p>The robust, feature-rich, analytics-equipped, user-friendly EduClouds ERP - built on a cutting-edge and flexible architecture - enables
          educational institutions to automate & streamline their functions and processes for both learning and administration.</p> -->
      </div>

      <div class="row">

        <div class="col-md-12 text-center">
          <!--  -->
          <div class="slide-container swiper">
            <div class="slide-content">
              <div class="cards-wrapper swiper-wrapper">

                <?php
                define("WP_USE_THEMES",false);
                require("../appmain1/blog/wp-load.php");
                $Blog_post = new WP_Query("showpost");
                if ($Blog_post->have_posts()) :
                  while ($Blog_post->have_posts()) : $Blog_post->the_post();

                ?>
                    <div class="cards swiper-slide">
                      <!-- <div class="image-content">
                        <span class="overlay"></span>
                        <div class="cards-image">
                          <img src="<?php //get_the_post_thumbnail() ?>" alt="" class="card-img">
                        </div>
                      </div> -->

                      <div class="cards-content">
                    
                        <h1 class="name"> <?Php the_title();  ?>
                        </h1>
                        <hr>
                        <p class="description"><?Php the_content(); ?></p>

                      <a class="view_more" href=""> <button class="button">View More</button></a> 
                      </div>
                    </div>
                <?php

                  endwhile;
                endif;


                ?>
              </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <!-- <div class="swiper-pagination"></div> -->
          </div>









          <!--  -->











        </div>

      </div>




    </div>
  </section>


  <!--
			<section class="logggos dffgg">
		<div class="container-fluid">
			
			<div class="s__headingss">
			<h3>News Logos</h3>
			</div>
			<div class="row pupuup">
				<div class="uppup">
					
					<ul class="s_sd_logod">
					<li>
						<div class="immo">
									<img src="assets/images/h-logo1.png" alt="">
								</div>
						</li>
						
						<li>
						<div class="immo">
									<img src="assets/images/h-logo2.png" alt="">
								</div>
						</li>
						<li>
						<div class="immo">
								<img src="assets/images/h-logo3.png" alt="">
								</div>
						</li>	
						<li>
						<div class="immo">
							<img src="assets/images/h-logo4.png" alt="">
								</div>
						</li>
						
						<li>
						<div class="immo">
									<img src="assets/images/h-logo1.png" alt="">
								</div>
						</li>
						
						<li>
						<div class="immo">
									<img src="assets/images/h-logo2.png" alt="">
								</div>
						</li>
						
						
						<li>
						<div class="immo">
									<img src="assets/images/h-logo1.png" alt="">
								</div>
						</li>
						
					
					</ul>
				
				
				</div>
			</div>
		</div>
	</section>
-->
  <!--
	<section class="purrpose" style="">
		<div class="container-fluid">
			<div class="puurrrppoo"></div>
			<div class="row">
				<div class="col-md-5">
					<div class="puurpo-loggo">
						<img src="assets/images/eee.png" alt="">
					</div>

				</div>
				<div class="col-md-7">
					<div class="porrr">
						<small>The Lorem. vision</small>
						<h4>Purpose-built technology for all Indian schools.</h4>
						<a href="">About Lorem.</a>
					</div>

				</div>
			</div>
		</div>
	</section>
-->



  <section class="coonnt">
    <div class="container-fluid">
      <div class="bbacckk">
        <div class="row">
          <div class="col-md-5"></div>
          <div class="col-md-7">
            <div class="coont-ques">
              <section id="testim" class="testim">
                <!--<h3 class="quottss">Quots </h3>-->
                <div class="wrap">

                  <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                  <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                  <ul id="testim-dots" class="dots">
                    <li class="dot active"></li><!--
                    -->
                    <li class="dot"></li><!--
                    -->
                    <li class="dot"></li><!--
                    -->
                    <li class="dot"></li><!--
                    -->
                  </ul>
                  <div id="testim-content" class="cont">

                    <div class="active">
                      <div class="clients__logos"><img src="assets/images/chief.jpg" /></div>
                      <h2>Ho'nble Former Chief Justice of India</h2>
                      <p>“We should all congratulate and support the young visionary, the Founder of Educlouds, who is one a mission to digitalise the entire education system of India”.</p>
                    </div>

                    <div>
                      <div class="clients__logos"><img src="assets/images/ff2.jpg" /></div>
                      <h2>Ho'nble Former Education Minister of India</h2>
                      <p>“I would like to congratulate Educlouds for making the commendable effort of bringing teachers, students and parents to one common platform”</p>
                    </div>

                    <div>
                      <div class="clients__logos"><img src="assets/images/ff3.jpg" /></div>
                      <h2>Ho'nble Former Joint Director of CBSE</h2>
                      <p>“I highly appreciate the endeavours of Educlouds towards the upliftment and digitalisation of our Education System ”</p>
                    </div>

                    <div>
                      <div class="clients__logos"><img src="assets/images/ff4.jpg" /></div>
                      <h2>Google</h2>
                      <p>“Educlouds is a Google Partner for Education and is now recognized as an Education Expert for Global Public Sector under the Google Cloud Partner Program ”</p>
                    </div>



                  </div>

                </div>
                <!--         </div> -->
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="footer___p">


  </section>

  <!--
        <section class="hero-area hero-carousel owl-carousel" id="_hero">
            <?php if (isset($sliders) && !empty($sliders)) { ?>
                <?php foreach ($sliders as $obj) { ?>
                    <div class="single-carousel">
                        <div class="img"><img src="<?php echo UPLOAD_PATH; ?>slider/<?php echo $obj->image; ?>" alt=""></div>
                        <div class="content">
                            <h2 class="title"><?php echo $obj->title; ?></h2>
                        </div>
                    </div>  
                <?php } ?>
            <?php } else { ?>
                <div class="single-carousel">
                    <div class="img"><img src="<?php echo IMG_URL; ?>front/default-saas-hero.jpg" alt=""></div>
                    <div class="content">
                        <h2 class="title"><?php echo $title_for_layout; ?></h2>
                    </div>
                </div> 
            <?php } ?>
            
        </section>
-->

  <!--
        <section class="about-area" id="_about">
            <div class="container container-big">
                <div class="row justify-content-center d-flex flex-lg-row flex-md-column-reverse">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                        <div class="about-banner mt-lg-0 mt-md-5 mt-5">
                            <img src="<?php echo UPLOAD_PATH; ?>/about/<?php echo $setting->about_image; ?>" alt=""  />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                        <div class="about-content">
                            <div class="section-title">
                                <h2><?php echo $this->global_setting->brand_title; ?></h2>
                            </div>
                        </div>
                        <p>
                           <?php echo nl2br($setting->about_brand); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
-->

  <!--
        <section class="video-area" id="_video">
            <div class="container container-big">
                <div class="section-title center">
                    <h2><?php echo $this->lang->line('demo_video'); ?></h2>
                </div>
                
                 <?php if ($setting->demo_video == 'youtube' && $setting->video_id != '') { ?>
                    <iframe class="youtube-player" type="text/html" style="width:100%; height:550px;" height="550"
                       src="https://www.youtube.com/embed/<?php echo $setting->video_id; ?>" frameborder="0">
                    </iframe>
               <?php } else if ($setting->demo_video == 'vimeo' && $setting->video_id != '') { ?>
                    
                    <iframe src="https://player.vimeo.com/video/<?php echo $setting->video_id; ?>" style="width:100%; height:550px;" height="550" 
                            frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <script src="https://player.vimeo.com/api/player.js"></script>
               <?php } else { ?>                      
                    <iframe class="youtube-player" style="width:100%; height:550px;" height="550"
                            src="https://www.youtube.com/embed/zER53gdu74w" frameborder="0">                               
                    </iframe>
               <?php } ?>     
            </div>
        </section>
-->

  <!--
        <section class="faq-area" id="_faq">
            <div class="container container-big">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10 col-10">
                        <div class="faq-content">
                            <div class="section-title center mb-2">
                                <h2><?php echo $this->lang->line('faq'); ?></h2>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <?php if (isset($faqs) && !empty($faqs)) { ?>
                                    <?php foreach ($faqs as $obj) { ?>
                                
                                        <div class="card">
                                            <div class="card-header" id="heading<?php echo $obj->id; ?>">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $obj->id; ?>" aria-expanded="true" aria-controls="collapseOne"><?php echo $obj->title; ?></button>
                                                </h2>
                                            </div>

                                            <div id="collapse<?php echo $obj->id; ?>" class="collapse" aria-labelledby="heading<?php echo $obj->id; ?>" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>
                                                        <?php echo nl2br($obj->description); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div> 

                                    <?php } ?>
                                <?php } ?>                           
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </section>
-->

  <!--
        <section class="pricing-area" id="_pricing">
            <div class="container container-big">
                <div class="section-title center mb-2">
                    <h2><?php echo $this->lang->line('subscription_plan'); ?></h2>
                </div>
                 <div class="row">                    
                        
                    <?php if (isset($plans) && !empty($plans)) { ?>
                        <?php foreach ($plans as $obj) { ?>
                        <div class="col-xl-4 col-md-4 col-12">
                            <div class="single-pricing">
                                <h3 class="title"><?php echo $this->lang->line($obj->plan_name);  ?></h3>
                               <ul>
                                    <li><?php echo $this->lang->line('price'); ?>: <span><?php echo $this->global_setting->currency_symbol; ?><?php echo $obj->plan_price; ?></span></li>                                    
                                    <li><?php echo $this->lang->line('student_limit'); ?>: <span><?php echo $obj->student_limit; ?></span></li>                                    
                                    <li><?php echo $this->lang->line('guardian_limit'); ?>: <span><?php echo $obj->guardian_limit; ?></span></li>                                    
                                    <li><?php echo $this->lang->line('teacher_limit'); ?>: <span><?php echo $obj->teacher_limit; ?></span></li>                                    
                                    <li><?php echo $this->lang->line('employee_limit'); ?>: <span><?php echo $obj->employee_limit; ?></span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_frontend'); ?> <span><?php echo $obj->is_enable_frontend ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                     <li><?php echo $this->lang->line('is_enable_theme'); ?> <span><?php echo $obj->is_enable_theme ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                     
                                    <li><?php echo $this->lang->line('is_enable_language'); ?> <span><?php echo $obj->is_enable_language ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_report'); ?> <span><?php echo $obj->is_enable_report ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </li>                                    
                                    <li><?php echo $this->lang->line('is_enable_inventory'); ?> <span><?php echo $obj->is_enable_inventory ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_lesson_plan'); ?> <span><?php echo $obj->is_enable_lesson_plan ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_online_exam'); ?> <span><?php echo $obj->is_enable_online_exam ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_live_class'); ?> <span><?php echo $obj->is_enable_live_class ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_payment_gateway'); ?> <span><?php echo $obj->is_enable_payment_gateway ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_sms_gateway'); ?> <span><?php echo $obj->is_enable_sms_gateway ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_attendance'); ?> <span><?php echo $obj->is_enable_attendance ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_exam_mark'); ?> <span><?php echo $obj->is_enable_exam_mark ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_accounting'); ?> <span><?php echo $obj->is_enable_accounting ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_payroll'); ?> <span><?php echo $obj->is_enable_payroll ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_asset_management'); ?> <span><?php echo $obj->is_enable_asset_management ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                    <li><?php echo $this->lang->line('is_enable_promotion'); ?> <span><?php echo $obj->is_enable_promotion ? '<i class="fas fa-check"></i>' : '<i class="fa fa-times-circle"></i>'; ?> </span></li>                                    
                                </ul>
                                <a href="#_subscription"><?php echo $this->lang->line('subscribe'); ?></a>
                            </div>
                        </div>
                        <?php } ?>
                    <?php } ?>
                   
                </div>
            </div>
        </section>
-->

  <section class="subscription-area" id="_subscription" style="display: none;">
    <!--
            <div class="container container-big">
				
				
                <div class="section-title center mb-2">
                    <h2><?php echo $this->lang->line('subscription'); ?></h2>
                </div>
                <div class="section-title center mb-2">
                    <?php $this->load->view('layout/message'); ?>
                </div>
            </div>           
-->


    <?php echo form_open(site_url(), array('name' => 'subscription', 'id' => 'subscription', 'class' => 'form-horizontal form-label-left'), ''); ?>
    <div class="container ">
      <div class="row">
        <!--
						<div class="col-md-5">   
						<div class="logo_sd">
							<img src="assets/images/eee.png"/>
							</div>
						</div>
-->
        <div class="col-md-8 offset-2">

          <div class="as___7744455">
            <small>A 360 degree platform</small>
            <h1>Enquire us</h1>
            <!--						<p class="sd__smallllsdd">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>-->


          </div>
          <div class="row">
            <!--
                        <div class="col-xl-6 col-12">
                            <div class="single-subscription">
                                <select  class="form-control col-md-12 col-xs-12"  name="subscription_plan_id"  id="subscription_plan_id"  required="required">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>*--</option>    
                                    <?php if (isset($plans) && !empty($plans)) { ?>
                                        <?php foreach ($plans as $obj) { ?>
                                            <option value="<?php echo $obj->id; ?>"><?php echo $this->lang->line($obj->plan_name); ?></option>                                           
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
-->
            <div class="col-xl-6 col-12">
              <div class="single-subscription">
                <input name="name" id="name" type="text" required="required" placeholder="<?php echo $this->lang->line('name'); ?>*">
              </div>
            </div>
            <div class="col-xl-6 col-12">
              <div class="single-subscription">
                <input name="email" id="email" type="email" required="required" placeholder="<?php echo $this->lang->line('email'); ?>*">
              </div>
            </div>
            <div class="col-xl-6 col-12">
              <div class="single-subscription">
                <input name="phone" id="phone" type="number" required="required" placeholder="<?php echo $this->lang->line('phone'); ?>*">
              </div>
            </div>
            <div class="col-xl-6 col-12">
              <div class="single-subscription">
                <input name="school_name" id="school_name" type="text" required="required" placeholder="<?php echo $this->lang->line('school_name'); ?>*">
              </div>
            </div>
            <div class="col-xl-12 col-12">
              <div class="single-subscription">
                <textarea name="address" id="address" type="text" required="required" placeholder="<?php echo $this->lang->line('address'); ?>*"></textarea>
              </div>
            </div>

            <div class="col-12">
              <div class="single-subscription text-right">
                <input name="submit" id="submit" type="submit" value="<?php echo $this->lang->line('subscribe'); ?>">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php echo form_close(); ?>


  </section>

  <!--
        <section class="feature-area" id="_feature">
            <div class="container container-big">
                <div class="section-title center mb-2">
                    <h2><?php echo $this->lang->line('features'); ?></h2>
                </div>
                <?php

                $features = array(

                  'language' => '<i class="fa fa-language"></i>',
                  'administrator' => '<i class="fa fa-user"></i>',
                  'subscription' => '<i class="fa fa-thumbs-up"></i>',
                  'manage_school' => '<i class="fa fa-home"></i>',
                  'general_setting' => '<i class="fa fa-edit"></i>',
                  'payment_setting' => '<i class="fa fa-dollar-sign"></i>',
                  'sms_setting' => '<i class="fa fa-mobile"></i>',
                  'email_setting' => '<i class="fa fa-envelope"></i>',
                  'academic_year' => '<i class="fa fa-calendar"></i>',
                  'role_permission' => '<i class="fa fa-unlock-alt"></i>',
                  'front_office' => '<i class="fa fa-tty"></i>',
                  'human_resource' => '<i class="fa fa-user-md"></i>',
                  'teacher' => '<i class="fa fa-users"></i>',
                  'manage_leave' => '<i class="fa fa-bell"></i>',
                  'academic' => '<i class="fa fa-address-book"></i>',
                  'live_class' => '<i class="fa fa-headphones"></i>',
                  'assignment' => '<i class="fa fa-file-word"></i>',
                  'lesson_plan' => '<i class="fa fa-bars"></i>',
                  'class_routine' => '<i class="fa fa-clock"></i>',
                  'guardian' => '<i class="fa fa-paw"></i>',
                  'student' => '<i class="fa fa-users"></i>',
                  'online_admission' => '<i class="fa fa-male"></i>',
                  'attendance' => '<i class="fa fa-times-circle"></i>',
                  'generate_card' => '<i class="fa fa-barcode"></i>',
                  'online_exam' => '<i class="fa fa-mouse-pointer"></i>',
                  'manage_exam' => '<i class="fa fa-graduation-cap"></i>',
                  'exam_mark' => '<i class="fa fa-clipboard"></i>',
                  'promotion' => '<i class="fa fa-forward"></i>',
                  'accounting' => '<i class="fa fa-calculator"></i>',
                  'fee_collection' => '<i class="fa fa-dollar-sign"></i>',
                  'report' => '<i class="fa fa-chart-bar"></i>',
                  'inventory' => '<i class="fa fa-users"></i>',
                  'asset_management' => '<i class="fa fa-users"></i>',
                  'certificate' => '<i class="fa fa-certificate"></i>',
                  'library' => '<i class="fa fa-book"></i>',
                  'transport' => '<i class="fa fa-bus"></i>',
                  'hostel' => '<i class="fa fa-hospital"></i>',
                  'message' => '<i class="far fa-envelope"></i>',
                  'template' => '<i class="fa fa-tags"></i>',
                  'complain' => '<i class="fa fa-comment"></i>',
                  'announcement' => '<i class="fa fa-bullhorn"></i>',
                  'scholarship' => '<i class="fa fa-users"></i>',
                  'event' => '<i class="fa fa fa-calendar"></i>',
                  'media_gallery' => '<i class="fa fa-image"></i>',
                  'manage_frontend' => '<i class="fa fa-desktop"></i>',
                  'mail_and_sms' => '<i class="fa fa-envelope"></i>',
                  'miscellaneous' => '<i class="fa fa-image"></i>',

                );

                ?>
                
                <div class="row single-feature-row">
                    
                    <?php $counter = 01;
                    foreach ($features as $key => $value) { ?>
                    <div class="col-xl-2 col-md-2 col-sm-4 col-12 single-feature-col">
                        <div class="single-feature">
                            <div class="box-inner">
                                <div class="icon">
                                    <span class="box"><?php echo $value; ?></span>
                                </div>
                                <h3 class="title"><?php echo $this->lang->line($key); ?></h3>
                                <h3 class="count"><?php echo $counter++; ?></h3>
                            </div>
                        </div>
                    </div>                      
                    <?php } ?>                    
                </div>               
            </div>
        </section>
-->

  <!--
        <section class="contact-area" id="_contact">
            <div class="container container-big">
                <div class="section-title center mb-2">
                    <h2><?php echo $this->lang->line('contact_us'); ?></h2>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                        <div class="contact-info">
                            <h4 class="title"><?php echo $this->lang->line('get_in_touch'); ?></h4>
                            <ul class="info">
                                <li>
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <?php echo $this->lang->line('address'); ?>:
                                    <?php if (isset($setting->address)  && !empty($setting->address)) { ?>
                                        <?php echo $setting->address; ?>
                                    <?php } ?>
                                </li>
                                <li>
                                    <span class="icon"><i class="far fa-clock"></i></span>
                                    <?php echo $this->lang->line('opening_hour'); ?>: 
                                    <?php if (isset($setting->opening_hour)  && !empty($setting->opening_hour)) { ?>
                                        <?php echo $setting->opening_hour; ?>
                                    <?php } ?>  
                                </li>
                                <li>
                                    <span class="icon"><i class="far fa-calendar-alt"></i></span>
                                    <?php echo $this->lang->line('opening_day'); ?>: 
                                    <?php if (isset($setting->opening_day)  && !empty($setting->opening_day)) { ?>
                                        <?php echo $setting->opening_day; ?>
                                    <?php } ?> 
                                </li>
                                <li>
                                    <span class="icon"><i class="fas fa-phone"></i></span>
                                     <?php echo $this->lang->line('phone'); ?>:
                                    <?php if (isset($setting->phone)  && !empty($setting->phone)) { ?>
                                        <a href="tel:<?php echo $setting->phone; ?>"><?php echo $setting->phone; ?></a>
                                    <?php } ?> 
                                </li>
                                <li>
                                    <span class="icon"><i class="far fa-envelope"></i></span>
                                    <?php echo $this->lang->line('email'); ?>:
                                    <?php if (isset($setting->email)  && !empty($setting->email)) { ?>
                                        <a href="mailto:<?php echo $setting->email; ?>"><?php echo $setting->email; ?></a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                        <?php if (isset($setting->our_location)  && !empty($setting->our_location)) { ?>
                        <?php echo $setting->our_location; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
-->

  <footer>
    <div class="container container-big">
      <div class="row">
        <div class="col-xl-6 col-sm-6 col-12">
          <div class="footer-widget">
            <div class="logo">
              <?php if (isset($setting->brand_logo_footer)) { ?>
                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $setting->brand_logo_footer; ?>" alt="" />
              <?php } elseif (isset($this->global_setting->logo)) { ?>
                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->logo; ?>" alt="" />
              <?php } else { ?>
                <img src="<?php echo IMG_URL; ?>default-front-logo.png" alt="" />
              <?php } ?>
            </div>
            <p>

              Educlouds (trademark owned by LJ Clouds Private Limited) is an Education Aggregator, based in India, dedicated towards digitally enhancing the teaching-learning experience by creating a Digital Ecosystem of all Education Resources needed for School Education
              <!--                                <?php echo nl2br($setting->footer_note); ?>-->
            </p>
          </div>
          <div class="footer-widget">
            <ul class="info">
              <!--
                                                            <li>
                                                                <span class="icon"><i class="far fa-clock"></i></span>
                                                                <?php echo $this->lang->line('opening_hour'); ?>: 
                                                                <?php if (isset($setting->opening_hour)  && !empty($setting->opening_hour)) { ?>
                                                                    <?php echo $setting->opening_hour; ?>
                                                                <?php } ?>                                    
                                                            </li>
                                                            <li>
                                                                <span class="icon"><i class="far fa-calendar-alt"></i></span>
                                                                <?php echo $this->lang->line('opening_day'); ?>: 
                                                                <?php if (isset($setting->opening_day)  && !empty($setting->opening_day)) { ?>
                                                                    <?php echo $setting->opening_day; ?>
                                                                <?php } ?>  
                                                            </li>
                            -->
              <li>
                <span class="icon"><i class="fas fa-phone"></i></span>
                <?php echo $this->lang->line('phone'); ?>:
                <?php if (isset($setting->phone)  && !empty($setting->phone)) { ?>
                  <a href="tel:<?php echo $setting->phone; ?>">+91 9990280968</a>
                <?php } ?>
              </li>
              <li>
                <span class="icon"><i class="far fa-envelope"></i></span>
                <?php echo $this->lang->line('email'); ?>:
                <?php if (isset($setting->email)  && !empty($setting->email)) { ?>
                  <a href="mailto:<?php echo $setting->email; ?>">office@educlouds.co.in</a>
                <?php } ?>
                <br>
           
               
                <?php if (isset($setting->email)  && !empty($setting->email)) { ?>
                  <a class="secem" href="mailto:<?php echo $setting->email; ?>">educloudsoffice@gmail.com</a>
                <?php } ?>
                <p class="fraud_com">Fraudulent communications from Educlouds 
                  <br> using different email addresses or phone numbers should be reported immediately</p>
              </li>
              <!--
                                                            <li>
                                                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                                                <?php echo $this->lang->line('address'); ?>:
                                                                <?php if (isset($setting->address)  && !empty($setting->address)) { ?>
                                                                    <?php echo $setting->address; ?>
                                                                <?php } ?>
                                                            </li>
                            -->
            </ul>
            <h4 class="title"><?php echo $this->lang->line('social_link'); ?></h4>
            <ul class="social">
              <?php if (isset($setting->facebook_url) && !empty($setting->facebook_url)) { ?>
                <li><a href="<?php echo $setting->facebook_url; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <?php } ?>
              <?php if (isset($setting->twitter_url)  && !empty($setting->twitter_url)) { ?>
                <li><a href="<?php echo $setting->twitter_url; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <?php } ?>

              <?php if (isset($setting->youtube_url)  && !empty($setting->youtube_url)) { ?>
                <li><a href="<?php echo $setting->youtube_url; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
              <?php } ?>
              <?php if (isset($setting->instagram_url)  && !empty($setting->instagram_url)) { ?>
                <li><a href="<?php echo $setting->instagram_url; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <?php } ?>
              <?php if (isset($setting->pinterest_url)  && !empty($setting->pinterest_url)) { ?>
                <li><a href="<?php echo $setting->pinterest_url; ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-xl-2 col-sm-2 col-12">
          <!--
                        <div class="footer-widget">
                            <h4 class="title"><?php echo $this->lang->line('quick_link'); ?></h4>
                            <ul>
                                <li><a class="smoothscroll" href="#_about"><?php echo $this->lang->line('about_brand'); ?></a></li>
                                <li><a class="smoothscroll" href="#_video"><?php echo $this->lang->line('demo_video'); ?></a></li>
                                <li><a class="smoothscroll" href="#_faq"><?php echo $this->lang->line('faq'); ?></a></li>
                                <li><a class="smoothscroll" href="#_pricing"><?php echo $this->lang->line('pricing_plan'); ?></a></li>
                                <li><a class="smoothscroll" href="#_subscription"><?php echo $this->lang->line('subscription'); ?></a></li>
                                <li><a class="smoothscroll" href="#_feature"><?php echo $this->lang->line('features'); ?></a></li>
                                <li><a class="smoothscroll" href="#_contact"><?php echo $this->lang->line('contact_us'); ?></a></li>
                                <?php if (isset($school) && !empty($school)) { ?>
                                    <li><a href="<?php echo site_url($school->school_url); ?>"><?php echo $this->lang->line('visit_school'); ?></a></li>
                                <?php } ?>
                                <?php if (logged_in_user_id()) { ?>     
                                    <li><a href="<?php echo site_url('auth/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a></li>
                                <?php } else { ?> 
                                    <li><a href="<?php echo site_url('auth/login'); ?>" target="_blank"><?php echo $this->lang->line('login'); ?></a></li>
                                <?php } ?>     
                            </ul>
                        </div>
-->
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
          <div class="footer-widget">
            <h4 class="title"><?php echo $this->lang->line('contact_us'); ?></h4>
            <div class="row">
              <!--
                                                      <div class="col-xl-6 col-12">
                                                          <div class="single-subscription">
                                                              <select  class="form-control col-md-12 col-xs-12"  name="subscription_plan_id"  id="subscription_plan_id"  required="required">
                                                                  <option value="">--<?php echo $this->lang->line('select'); ?>*--</option>    
                                                                  <?php if (isset($plans) && !empty($plans)) { ?>
                                                                      <?php foreach ($plans as $obj) { ?>
                                                                          <option value="<?php echo $obj->id; ?>"><?php echo $this->lang->line($obj->plan_name); ?></option>                                           
                                                                      <?php } ?>
                                                                  <?php } ?>
                                                              </select>
                                                          </div>
                                                      </div>
                              -->
              <div class="col-xl-6 col-12">
                <div class="single-subscription">
                  <input name="name" id="name" type="text" required="required" placeholder="<?php echo $this->lang->line('name'); ?>*">
                </div>
              </div>
              <div class="col-xl-6 col-12">
                <div class="single-subscription">
                  <input name="email" id="email" type="email" required="required" placeholder="<?php echo $this->lang->line('email'); ?>*">
                </div>
              </div>
              <div class="col-xl-6 col-12">
                <div class="single-subscription">
                  <input name="phone" id="phone" type="number" required="required" placeholder="<?php echo $this->lang->line('phone'); ?>*">
                </div>
              </div>
              <div class="col-xl-6 col-12">
                <div class="single-subscription">
                  <input name="school_name" id="school_name" type="text" required="required" placeholder="<?php echo $this->lang->line('school_name'); ?>*">
                </div>
              </div>
              <div class="col-xl-12 col-12">
                <div class="single-subscription">
                  <textarea name="address" id="address" type="text" required="required" placeholder="<?php echo $this->lang->line('address'); ?>*"></textarea>
                </div>
              </div>

              <div class="col-12">
                <div class="single-subscription text-right">
                  <input name="submit" id="submit" type="submit" value="<?php echo $this->lang->line('subscribe'); ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="copyright">
            <p> <span class='hu7hf5'>Made By Makemaya</span>
              <?php if (isset($this->global_setting->brand_footer)) { ?>
                <?php echo $this->global_setting->brand_footer; ?>
              <?php } ?>
            </p>


          </div>
        </div>
      </div>

    </div>
  </footer>

  <!-- Scripts -->
  <script src="<?php echo JS_URL; ?>front/owl.carousel.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/jquery.counterup.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/countdown.js"></script>
  <script src="<?php echo JS_URL; ?>front/stellarnav.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/jquery.scrollUp.js"></script>
  <script src="<?php echo JS_URL; ?>front/jquery.waypoints.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/isotope.pkgd.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/jquery.fancybox.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/popper.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/bootstrap.min.js"></script>
  <script src="<?php echo JS_URL; ?>front/saas-theme.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="<?php echo JS_URL; ?>blog-copy.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

  <script>
    // vars
    'use strict'
    var testim = document.getElementById("testim"),
      testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
      testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
      testimLeftArrow = document.getElementById("left-arrow"),
      testimRightArrow = document.getElementById("right-arrow"),
      testimSpeed = 4500,
      currentSlide = 0,
      currentActive = 0,
      testimTimer,
      touchStartPos,
      touchEndPos,
      touchPosDiff,
      ignoreTouch = 30;;

    window.onload = function() {

      // Testim Script
      function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
          testimContent[k].classList.remove("active");
          testimContent[k].classList.remove("inactive");
          testimDots[k].classList.remove("active");
        }

        if (slide < 0) {
          slide = currentSlide = testimContent.length - 1;
        }

        if (slide > testimContent.length - 1) {
          slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
          testimContent[currentActive].classList.add("inactive");
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;

        clearTimeout(testimTimer);
        testimTimer = setTimeout(function() {
          playSlide(currentSlide += 1);
        }, testimSpeed)
      }

      testimLeftArrow.addEventListener("click", function() {
        playSlide(currentSlide -= 1);
      })

      testimRightArrow.addEventListener("click", function() {
        playSlide(currentSlide += 1);
      })

      for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function() {
          playSlide(currentSlide = testimDots.indexOf(this));
        })
      }

      playSlide(currentSlide);

      // keyboard shortcuts
      document.addEventListener("keyup", function(e) {
        switch (e.keyCode) {
          case 37:
            testimLeftArrow.click();
            break;

          case 39:
            testimRightArrow.click();
            break;

          case 39:
            testimRightArrow.click();
            break;

          default:
            break;
        }
      })

      testim.addEventListener("touchstart", function(e) {
        touchStartPos = e.changedTouches[0].clientX;
      })

      testim.addEventListener("touchend", function(e) {
        touchEndPos = e.changedTouches[0].clientX;

        touchPosDiff = touchStartPos - touchEndPos;

        console.log(touchPosDiff);
        console.log(touchStartPos);
        console.log(touchEndPos);


        if (touchPosDiff > 0 + ignoreTouch) {
          testimLeftArrow.click();
        } else if (touchPosDiff < 0 - ignoreTouch) {
          testimRightArrow.click();
        } else {
          return;
        }

      })
    }
  </script>

  <!--		<script src="https://use.fontawesome.com/1744f3f671.js"></script>-->

  <script>
    $(document).ready(function() {
      $(".gallery").magnificPopup({
        delegate: "a",
        type: "image",
        tLoading: "Loading image #%curr%...",
        mainClass: "mfp-img-mobile",
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
      });
    });
  </script>
  <style type="text/css">
    .location-btn-mobile,
    .call-btn-mobile {
      display: none !important;
    }

    .close-menu {
      border: 0px !important;
    }

    .stellarnav.mobile.light li a {
      padding: 15px 10px 22px !important;
    }
  </style>

  <script type="text/javascript">
    jQuery.extend(jQuery.validator.messages, {
      required: "<?php echo $this->lang->line('required_field'); ?>",
      email: "<?php echo $this->lang->line('enter_valid_email'); ?>"
    });

    $('#subscription').validate();
  </script>
  <script>
    $(window).on('load', function() {
      $('.loader').fadeout('slow', function() {
        $(this).remove();
      })
    })
  </script>
</body>

</html>