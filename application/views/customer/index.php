<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    สมาชิก
    <small>ข้อมูลสมาชิก</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li class="active">ข้อมูลสมาชิก</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">ข้อมูลสมาชิก</h3>

      <div class="box-tools pull-right">
        <a href="<?php echo site_url('customer/add');?>" class='btn btn-sm btn-info'><i class='fa fa-plus'></i> เพิ่มข้อมูล</a>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="80">ลำดับ</th>
            <th>ชื่อ</th>
            <th>เบอร์โทรศัพท์</th>
            <th width="150"></th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($rs)==0):?>
            <tr><td colspan="3">  - ไม่มีข้อมูล -</td></tr>
          <?php else:?>
            <?php $no = 1; foreach($rs as $r):?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $r->name;?></td>
                <td><?php echo $r->mobile;?></td>
                <td>
                  <div class="btn-group">
                    <a href="<?php echo site_url('customer/edit/'.$r->id);?>" class='btn btn-default btn-sm'><i class='fa fa-edit'></i> แก้ไข</a>
                    <a href="<?php echo site_url('customer/delete/'.$r->id);?>" onclick="javascript: return confirm('ต้องการลบข้อมูลหรือไม่ ?');" class='btn btn-default btn-sm'><i class='fa fa-trash'></i> ลบ</a>
                  </div>
                  
                </td>
              </tr>
            <?php $no++; endforeach;?>
          <?php endif;?>
        </tbody>
      </table>
    </div>

  </div>
</section>