<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    รายงาน
    <small>ข้อมูลการซื้อ</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li class="active">รายงานข้อมูลซื้อ</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">รายงานข้อมูลซื้อ</h3>
    </div>
    <div class="box-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="80">ลำดับ</th>
            <th>ชื่องวด</th>
            <th>ประจำงวดวันที่</th>
            <th width="350"></th>
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
                <td>
                  <center>
                    <div class="btn-group">
                      <a target="_blank" href="<?php echo site_url('report/lot/'.$r->lot_id);?>" class='btn btn-default btn-sm'><i class='fa fa-send'></i> พิมพ์ทั้งหมดไม่คัด</a>

                      <a target="_blank" href="<?php echo site_url('report/lot_cut/'.$r->lot_id);?>" class='btn btn-info btn-sm'><i class='fa fa-send'></i> พิมพ์ที่คัดไว้</a>

                      <a target="_blank" href="<?php echo site_url('report/lot_send/'.$r->lot_id);?>" class='btn btn-success btn-sm'><i class='fa fa-send'></i> พิมพ์คัดส่งเจ้า</a>
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