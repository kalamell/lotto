
<!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ตั้งค่าราคาการจ่าย
      <small>ตั้งค่าราคาการจ่าย</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
      <li class="active">ตั้งค่าราคาการจ่าย</li>
    </ol>
  </section>

  <!-- Main content -->


<section class="content">
  <div class='row'>
    <div class='col-md-6'>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">ราคาการจ่าย</h3>
        </div>
        <?php echo form_open('config/update');?>
        <div class="box-body">
          
          <?php echo save();?>

          <table class='table table-bordered table-striped'>
            <thead>
              <tr>
                <th>ชนิด</th>
                <th>จ่ายต่อบาท</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $two_top = 0;
              $two_down = 0;
              $three_top = 0;
              $three_down = 0;
              $three_tod = 0;
              $run_top = 0;
              $run_down = 0;

              if (count($r)>0) {
                $two_top = $r->two_top;
                $two_down = $r->two_down;
                $three_top = $r->three_top;
                $three_down = $r->three_down;
                $three_tod = $r->three_tod;
                $run_top = $r->run_top;
                $run_down = $r->run_down;
              }
              ?>
              <tr>
                <td>2 ตัวบน</td>
                <td width="100"><input type="text" name="two_top" value="<?php echo $two_top;?>" class='form-control number'></td>
              </tr>

              <tr>
                <td>2 ตัวล่าง</td>
                <td width="100"><input type="text" name="two_down" value="<?php echo $two_down;?>" class='form-control number'></td>
              </tr>

              <tr>
                <td>3 ตัวบน</td>
                <td width="100"><input type="text" name="three_top" value="<?php echo $three_top;?>" class='form-control number'></td>
              </tr>

              <tr>
                <td>3 ตัวล่าง</td>
                <td width="100"><input type="text" name="three_down" value="<?php echo $three_down;?>" class='form-control number'></td>
              </tr>

              <tr>
                <td>3 ตัวโต๊ด</td>
                <td width="100"><input type="text" name="three_tod" value="<?php echo $three_tod;?>" class='form-control number'></td>
              </tr>

              <tr>
                <td>วิ่งบน</td>
                <td width="100"><input type="text" name="run_top" value="<?php echo $run_top;?>" class='form-control number'></td>
              </tr>

              <tr>
                <td>วิ่งล่าง</td>
                <td width="100"><input type="text" name="run_down" value="<?php echo $run_down;?>" class='form-control number'></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class='btn btn-info'>ปรับปรุงราคา</button>
        </div>
      <?php form_close();?>
        <!-- /.box-footer-->
      </div>
    </div>
  </div>
</section>