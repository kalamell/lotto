<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    จัดการซื้อ
    <small>ข้อมูลการซื้อ</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li class="active">ข้อมูลการซื้อ</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">ข้อมูลการซื้อ</h3>

      <div class="box-tools pull-right">
        <a href="<?php echo site_url('sale/add');?>" class='btn btn-sm btn-info'><i class='fa fa-plus'></i> สร้างงวดใหม่</a>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="80">ลำดับ</th>
            <th>ชื่องวด</th>
            <th>ประจำงวดวันที่</th>
            <th>จำนวจบิล</th>
            <th width="100"></th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($rs)==0):?>
            <tr><td colspan="5">  - ไม่มีข้อมูล -</td></tr>
          <?php else:?>
            <?php $no = 1; foreach($rs as $r):?>
              <tr>
                <td><?php echo $no;?></td>
                <td><a href="<?php echo site_url('sale/lot/'.$r->lot_id);?>"><?php echo $r->lot_name;?></a></td>
                <td><a href="<?php echo site_url('sale/lot/'.$r->lot_id);?>"><?php echo thaidate($r->ondate);?></a></td>
                <td><?php echo $r->c;?></td>
                <td>
                  <center>
                    <div class="btn-group">
                      <a href="<?php echo site_url('sale/lot/'.$r->lot_id);?>" class='btn btn-default btn-sm'><i class='fa fa-send'></i> ดูข้อมูล</a>
                      <!--<a href="<?php echo site_url('sale/edit/'.$r->lot_id);?>" class='btn btn-default btn-sm'><i class='fa fa-edit'></i> แก้ไข</a>
                      <a href="<?php echo site_url('sale/delete/'.$r->lot_id);?>" onclick="javascript: return confirm('ต้องการลบข้อมูลหรือไม่ ?');" class='btn btn-default btn-sm'><i class='fa fa-trash'></i> ลบ</a>-->
                    </div>
                  </center>

                </td>
              </tr>
            <?php $no++; endforeach;?>
          <?php endif;?>
        </tbody>
      </table>
    </div>

  </div>
</section>