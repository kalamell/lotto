<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lotto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/template/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/template/plugins/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/template/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/template/dist/css/skins/_all-skins.min.css">


  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/template/plugins/datepicker/datepicker3.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    .number { text-align: right; }
    .txtnum { text-align: right; }
  </style>
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">LOTTO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LOTTO</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class='fa fa-user'></i> สวัสดี <?php echo getname();?>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo site_url('me/profile');?>">แก้ไขข้อมูลส่วนตัว</a>
              </li>
              <li>
                <a onclick="javascript:return confirm('ต้องการออกจากระบบหรือไม่ ?');" href="<?php echo site_url('logout');?>">ออกจากระบบ</a>
              </li>
            </ul>
          </li>

          <li style="display: none">
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">เมนูหลัก</li>
        <li class="">
          <a href="<?php echo site_url('sale');?>">
            <i class="fa fa-money"></i> <span>จัดการซื้อ</span>
          </a>
        </li>

        <li class="">
          <a href="<?php echo site_url('customer');?>">
            <i class="fa fa-user"></i> <span>สมาชิก</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>ตั้งค่าระบบ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="<?php echo site_url('config');?>"><i class="fa fa-circle-o"></i> ราคาจ่าย</a></li>-->
            <li><a href="<?php echo site_url('config/cut');?>"><i class="fa fa-circle-o"></i> ตั้งค่าเงินคัด</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>รายงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('report');?>"><i class="fa fa-circle-o"></i> ประจำงวด</a></li>
          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
