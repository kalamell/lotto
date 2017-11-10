<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> รายงาน <?php echo $f->lot_name;?>
          <small class="pull-right">Date: <?php echo thaidate($f->ondate);?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>


    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class='table table-striped'>
          <thead>
            <tr>
              <th>ตัวเลข</th>
              <th>2 ตัวบน</th>
              <th>2 ตัวล่าง</th>
              <th>3 ตัวบน</th>
              <th>3 ตัวโต๊ด</th>
              <th>3 ตัวล่าง</th>
              <th>วิ่งบน</th>
              <th>วิ่งล่าง</th>
            </tr>
          </thead>
          <tbody id="result">
            <?php foreach($detail as $d):?>
              <tr>
                <td><?php echo $d->no;?></td>
                <td class="txtnum"><?php echo $d->two_top==0?'&nbsp;':$d->two_top;?></td>
                <td class="txtnum"><?php echo $d->two_down==0?'&nbsp;':$d->two_down;?></td>
                <td class="txtnum"><?php echo $d->three_top==0?'&nbsp;':$d->three_top;?></td>
                <td class="txtnum"><?php echo $d->three_tod==0?'&nbsp;':$d->three_tod;?></td>
                <td class="txtnum"><?php echo $d->three_down==0?'&nbsp;':$d->three_down;?></td>
                <td class="txtnum"><?php echo $d->top_run==0?'&nbsp;':$d->top_run;?></td>
                <td class="txtnum"><?php echo $d->down_run==0?'&nbsp;':$d->down_run;?></td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
