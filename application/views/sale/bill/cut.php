<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    จัดการคัดเลข
    <small>ข้อมูลการค</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
    <li><a href='<?php echo site_url('sale');?>'>ข้อมูลการคัด</a></li>
    <li><a href='<?php echo site_url('sale/lot/'.$f->lot_id);?>'>ข้อมูลงวด <?php echo $f->lot_name;?> ( <?php echo thaidate($f->ondate);?> )</a></li>
    <li class='active'>ข้อมูลบิลของ <?php echo $f->name;?></li>
  </ol>
</section>

<section class="content">
  <div class='row'>
    <div class='col-md-12'>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">ข้อมูลการคัด</h3>
            <div class='pull-right'>
              <a class="btn btn-lg btn-info" href="<?php echo site_url('sale/confirm_cut/'.$f->lot_id.'/'.$f->idsale);?>">ดำเนินการคัดบิลนี้</a>
            </div>

          </div>

          <div class="box-body">

            <ul  class="nav nav-tabs">
              <li class="active">
                <a  href="#1a" data-toggle="tab">เลขที่ซื้อทั้งหมด</a>
              </li>
              <li class="">
                <a  href="#1b" data-toggle="tab">เลขคัดไว้ทั้งหมด</a>
              </li>
              <li class="">
                <a  href="#1c" data-toggle="tab">เลขที่ส่งทั้งหมด</a>
              </li>
            </ul>

            <div class="tab-content clearfix">
              <div class="tab-pane active" id="1a">
                <br>
                <h4 class='page-title'>เลขซื้อ</h4>
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
                  <tbody id="result">
                    <?php $all_total=0;
                    foreach($detail as $d):?>
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
                    <?php
                    $all_total+=($d->two_top + $d->two_down + $d->three_top + $d->three_tod + $d->three_down + $d->top_run + $d->down_run);
                    endforeach;?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="8" style="">รวมซื้อ : <?php echo $all_total;?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>

              <div class="tab-pane" id="1b">
                <h4 class='page-title'>เลขคัด</h4>
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
                  <tbody id="result">
                    <?php $all_total = 0;
                    foreach($cut as $c):?>
                      <tr>
                        <td><?php echo $c->no;?></td>
                        <td class="txtnum"><?php echo $c->two_top==0?'&nbsp;':$c->two_top;?></td>
                        <td class="txtnum"><?php echo $c->two_down==0?'&nbsp;':$c->two_down;?></td>
                        <td class="txtnum"><?php echo $c->three_top==0?'&nbsp;':$c->three_top;?></td>
                        <td class="txtnum"><?php echo $c->three_tod==0?'&nbsp;':$c->three_tod;?></td>
                        <td class="txtnum"><?php echo $c->three_down==0?'&nbsp;':$c->three_down;?></td>
                        <td class="txtnum"><?php echo $c->top_run==0?'&nbsp;':$c->top_run;?></td>
                        <td class="txtnum"><?php echo $c->down_run==0?'&nbsp;':$c->down_run;?></td>
                      </tr>
                    <?php
                    $all_total+=($c->two_top + $c->two_down + $c->three_top + $c->three_tod + $c->three_down + $c->top_run + $c->down_run);
                    endforeach;?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="8" style="">รวมคัดรวมทั้งหมด : <?php echo $all_total;?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>

              <div class="tab-pane" id="1c">
                <h4 class='page-title'>เลขส่ง</h4>
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
                  <tbody id="result">
                    <?php $all_total=0;
                    foreach($send as $s):?>
                      <tr>
                        <td><?php echo $s->no;?></td>
                        <td class="txtnum"><?php echo $s->two_top==0?'&nbsp;':$s->two_top;?></td>
                        <td class="txtnum"><?php echo $s->two_down==0?'&nbsp;':$s->two_down;?></td>
                        <td class="txtnum"><?php echo $s->three_top==0?'&nbsp;':$s->three_top;?></td>
                        <td class="txtnum"><?php echo $s->three_tod==0?'&nbsp;':$s->three_tod;?></td>
                        <td class="txtnum"><?php echo $s->three_down==0?'&nbsp;':$s->three_down;?></td>
                        <td class="txtnum"><?php echo $s->top_run==0?'&nbsp;':$s->top_run;?></td>
                        <td class="txtnum"><?php echo $s->down_run==0?'&nbsp;':$s->down_run;?></td>
                      </tr>
                    <?php
                      $all_total+=($s->two_top + $s->two_down + $s->three_top + $s->three_tod + $s->three_down + $s->top_run + $s->down_run);
                      endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="8" style="">รวมส่งเจ้าทั้งหมด : <?php echo $all_total;?></td>
                      </tr>
                    </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- /.box-footer-->
        </div>


    </div>
  </div>
</section>