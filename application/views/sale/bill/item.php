<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    จัดการซื้อ
    <small>ข้อมูลการซื้อ</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li><a href='<?php echo site_url('sale');?>'>ข้อมูลการซื้อ</a></li>
    <li><a href='<?php echo site_url('sale/lot/'.$f->lot_id);?>'>ข้อมูลงวด <?php echo $f->lot_name;?> ( <?php echo thaidate($f->ondate);?> )</a></li>
    <li class='active'>ข้อมูลบิลของ <?php echo $f->name;?></li>
  </ol>
</section>

<section class="content">
  <div class='row'>
    <div class='col-md-8'>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">กรอกตัวเลข</h3>

        </div>

        <div class="box-body">
          <ul  class="nav nav-tabs">
            <li class="active">
              <a  href="#1a" data-toggle="tab">กรอกตัวเลข</a>
            </li>
           <!-- <li><a href="#2a" data-toggle="tab">กรอกแบบด่วน</a>
            </li>-->
          </ul>

          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">

              <br>

              <!--<div class="form-group">
                <label for="lot_name">บิล :</label>
                <input type="text" class="form-control required" id="lot_name" name="lot_name" placeholder="">
              </div>-->


              <?php echo form_open('sale/save_bill', array('id' => 'frmsavebill'));?>
              <input type="hidden" name="lot_id" value="<?php echo $f->lot_id;?>" />
              <input type="hidden" name="idsale" value="<?php echo $f->idsale;?>" />
              <table class='table table-bordered table-striped'>
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
                <tbody>
                  <tr>
                    <td><input type="text" class='form-control numberinput' maxlength="3" name="no"></td>

                    <td><input type="text" class='form-control number top2' name="two_top"></td>

                    <td><input type="text" class='form-control number down2' name="two_down"></td>

                    <td><input type="text" class='form-control number top3' name="three_top"></td>

                    <td><input type="text" class='form-control number downtod' name="three_tod"></td>

                    <td><input type="text" class='form-control number down3' name="three_down"></td>

                    <td><input type="text" class='form-control number runtop' name="top_run"></td>

                    <td><input type="text" class='form-control number rundown' name="down_run"></td>

                  </tr>

                </tbody>
              </table>
              <?php echo form_close();?>


            </div>

            <div class="tab-pane" id="2a">

              <br>
              <?php echo form_open('');?>
              <div class="form-group">
                <label for="lot_name">ตัวเลข :</label>
                <textarea class="form-control" name="txt" rows="5"></textarea>
              </div>

              <p><button type="submit" class="btn btn-default">ยืนยัน</button>
                <?php echo form_close();?>


            </div>
          </div>

        </div>

      </div>


        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">สรุปการซือ</h3>
          </div>

          <div class="box-body">



            <?php echo save();?>

            <table class='table table-bordered table-striped'>
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
                  <th  style="text-align:center;">ลบ</th>
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
                    <td  style="text-align:center;"><a href='#' class='btn btn-sm btn-default' onclick="del('<?php echo $d->lot_id;?>', '<?php echo $d->idsale;?>', '<?php echo $d->idsale_detail;?>', '<?php echo $d->no;?>')">ลบ</a></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- /.box-footer-->
        </div>


    </div>

    <div class='col-md-4'>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">สรุป</h3>
        </div>

        <div class="box-body">

           <table class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>เลข</th>
                  <th>จำนวนซื้อ</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>2 ตัวบน</td>
                  <td width="100" style='text-align: right' class='top2'>0</td>
                </tr>

                <tr>
                  <td>2 ตัวล่าง</td>
                  <td width="100" style='text-align: right' class='down2'>0</td>
                </tr>

                <tr>
                  <td>3 ตัวบน</td>
                  <td width="100" style='text-align: right' class='top3'>0</td>
                </tr>

                <tr>
                  <td>3 ตัวโต๊ด</td>
                  <td width="100" style='text-align: right' class="tod3">0</td>
                </tr>

                <tr>
                  <td>3 ตัวล่าง</td>
                  <td width="100" style='text-align: right' class='down3'>0</td>
                </tr>

                <tr>
                  <td>วิ่งบน</td>
                  <td width="100" style='text-align: right' class='runtop'>0</td>
                </tr>

                <tr>
                  <td>วิ่งล่าง</td>
                  <td width="100" style='text-align: right' class='rundown'>0</td>
                </tr>
                <tr>
                  <td style="text-align: right"><strong>รวม :</strong></td>
                  <td class="total" style="text-align: right;">0</td>
                </tr>
              </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>

      </div>
    </div>
  </div>
</section>