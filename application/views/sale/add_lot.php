<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    จัดการซื้อ
    <small>ข้อมูลการซื้อ</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li><a href="<?php echo site_url('sale');?>">ข้อมูลการซื้อ</a></li>
    <li class="active">สร้างงวด</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
     <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">เพิ่มงวด</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo form_open('sale/saveLot');?>

          <div class="box-body">

            <?php echo save();?>

            <div class="form-group">
              <label for="lot_name">ชื่องวด</label>
              <input type="text" class="form-control required" id="lot_name" name="lot_name" placeholder="">
            </div>

            <div class="form-group">
              <label for="name">ประจำวันที่</label>
               <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="ondate" id="datepicker">
                </div>
            </div>
            

            <div class="form-group">
              <label for="mobile">หมายเหตุ***</label>
              <textarea name="remark" class='form-control' rows='3'></textarea>
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