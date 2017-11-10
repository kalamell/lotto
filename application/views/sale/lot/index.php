<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    จัดการซื้อ
    <small>ข้อมูลการซื้อ</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li><a href='<?php echo site_url('sale');?>'>ข้อมูลการซื้อ</a></li>
    <li class='active'>ข้อมูลงวด <?php echo $f->lot_name;?> ( <?php echo thaidate($f->ondate);?> )</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">ข้อมูลงวด <?php echo $f->lot_name;?> ( <?php echo thaidate($f->ondate);?> )</h3>

      <div class="box-tools pull-right">
        <a href="javascript:" class='btn btn-sm btn-info' data-toggle="modal" data-target="#myModal"><i class='fa fa-plus'></i> เปิดบิล</a>
      </div>

    </div>
    <div class="box-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="80">ลำดับ</th>
            <th>ชื่อลูกค้า</th>
           <!-- <th>จำนวนบิล</th>-->
            <th style="text-align: right">รวมซื้อ</th>
            <th width="100">ข้อมูลเลข</th>
            <th width="100">คัดเลข</th>
            <th width="150"></th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($rs)==0):?>
            <tr><td colspan="8">  - ไม่มีข้อมูล -</td></tr>
          <?php else:?>
            <?php $no = 1; foreach($rs as $r):?>

              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $r->name;?></td>
                <td align="right"><?php echo number_format($r->sum_total);?></td>

                <td>
                  <center>
                      <a href="<?php echo site_url('sale/bill/'.$r->lot_id.'/'.$r->idsale);?>" class='btn btn-sm btn-success'><i class='fa fa-money'></i> สร้างข้อมูล</a>
                  </center>
                </td>

                <td>
                  <center>
                      <a href="<?php echo site_url('sale/cut/'.$r->lot_id.'/'.$r->idsale);?>" class='btn btn-sm btn-success'><i class='fa fa-edit'></i> คัดเลข</a>
                  </center>
                </td>

                <td>
                  <center>
                    <div class="btn-group">
                      <a href="<?php echo site_url('sale/edit/'.$r->lot_id);?>" class='btn btn-default btn-sm'><i class='fa fa-edit'></i> แก้ไข</a>
                      <a href="<?php echo site_url('sale/delete/'.$r->lot_id);?>" onclick="javascript: return confirm('ต้องการลบข้อมูลหรือไม่ ?');" class='btn btn-default btn-sm'><i class='fa fa-trash'></i> ลบ</a>
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



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open('sale/lot_create');?>
    <input type="hidden" name="lot_id" value="<?php echo $f->lot_id;?>">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">เปิดบิล</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="lot_name">ชื่อสมาชิก</label>
            <select name="customer_id" class="form-control">
              <?php foreach($customer as $cus):?>
                <option value="<?php echo $cus->id;?>"><?php echo $cus->name;?></option>
              <?php endforeach;?>

            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default">ยืนยัน</button>
      </div>
    </div>
    <?php echo form_close();?>

  </div>
</div>