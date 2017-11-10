<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    ข้อมูลส่วนตัว
    <small>แก้ไขข้อมูลส่วนตัว</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li class="active">ข้อมูลส่วนตัว</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
     <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">แก้ไขข้อมูลส่วนตัว</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo form_open('me/update');?>

          <div class="box-body">

            <?php echo save();?>

            <div class="form-group">
              <label for="username">Username * ใช้ภาษาอังกฤษ</label>
              <input type="text" class="form-control required" id="username" name="username" value="<?php echo $r->username;?>" placeholder="">
            </div>

            <div class="form-group">
              <label for="password">เปลี่ยนรหัสผ่านใหม่</label>
              <input type="text" class="form-control" id="password" name="password" placeholder="">
            </div>


            <div class="form-group">
              <label for="name">ชื่อ</label>
              <input type="text" class="form-control required" id="name" name="name" value="<?php echo $r->name;?>" placeholder="">
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