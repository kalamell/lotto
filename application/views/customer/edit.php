<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    สมาชิก
    <small>ข้อมูลสมาชิก</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li><a href="<?php echo site_url('customer');?>">สมาชิก</a></li>
    <li class="active">แก้ไขข้อมูลสมาชิก</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
     <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">แก้ไขข้อมูลสมาชิก</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo form_open('customer/update');?>

        <input type="hidden" name="id" value="<?php echo $r->id;?>">

          <div class="box-body">

            <?php echo save();?>

            <div class="form-group">
              <label for="name">ชื่อ</label>
              <input type="text" class="form-control required" id="name" value="<?php echo $r->name;?>" name="name" placeholder="">
            </div>
            <div class="form-group">
              <label for="mobile">เบอร์โทรศัพท์</label>
              <input type="text" class="form-control" id="mobile" name="mobile" placeholder="" value="<?php echo $r->mobile;?>">
            </div>
            
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
          </div>
        <?php echo form_close();?>
      </div>
      <!-- /.box -->

    </div>
  </div>
</section>