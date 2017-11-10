
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>ระบบรวย๙๙๙</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>/template/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>/template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/template/plugins/fastclick/fastclick.js"></script>


<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>/template/plugins/datepicker/bootstrap-datepicker.js"></script>



<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/template/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/template/dist/js/demo.js"></script>

<script type="text/javascript">

$.fn.datepicker.dates['en'] = {
    days: ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์"],
    daysShort: ["อา.", "จ.", "อั.", "พ.", "พฤ.", "ศ.", "ส."],
    daysMin: ["อา.", "จ.", "อั.", "พ.", "พฤ.", "ศ.", "ส."],
    months: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
    monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    today: "วันนี้",
    clear: "ล้าง",
    format: "yyyy-mm-dd",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};




  $(function() {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $(".numberinput").focus();

    sumBill();

  });
  $('.numberinput').on('keydown', function(e) {
  })
  $(document).on('keypress', '.numberinput', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
        $('input.number').attr('disabled', 'disabled');
        if (val.val().length==0) {
          $('input.number').prop('disabled', false);
        }
        if (val.val().length==2) {
          $(".top2, .down2").prop('disabled', false);
          $(".top2").focus();
        }

        if (val.val().length==3) {
          $(".top3, .down3, .downtod").prop('disabled', false);
          $(".top3").focus();
        }

        if (val.val().length==1) {
          $(".runtop, .rundown").prop('disabled', false);
          $(".runtop").focus();
        }
        break;
    }
  });


  $(document).on('keypress', '.top2', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
        $(".down2").focus();
        break;
    }
  });


  $(document).on('keypress', '.down2', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
        insert();
        break;
    }
  });

  $(document).on('keypress', '.top3', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
      $(".downtod").focus();
        break;
    }
  });

  $(document).on('keypress', '.downtod', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
        $(".down3").focus();
        break;
    }
  });

  $(document).on('keypress', '.down3', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
        insert();
        break;
    }
  });

  $(document).on('keypress', '.runtop', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
        $(".rundown").focus();
        break;
    }
  });

  $(document).on('keypress', '.rundown', function(e) {
    var val = $(this);
    switch(e.which) {
      case 13:
        insert();
        break;
    }
  });


function del(lot_id, idsale, idsale_detail, no)
{
  var conf = confirm('ต้องการลบเลข ' + no + ' หรือไม่ ?');
  if (conf) {
    top.location.href = '<?php echo site_url('sale/delete_item/');?>' + lot_id + '/' + idsale + '/' + idsale_detail;
  }
}


function insert()
{
  $.post($("#frmsavebill").attr('action'), $("#frmsavebill").serialize(), function(res) {
    if (res.result) {
      var html = '';
      var two_top = 0, two_down = 0, three_top = 0, three_tod = 0, three_down = 0, top_run = 0, down_run = 0;
      two_top = res.data.two_top==0?'&nbsp;':res.data.two_top;
      two_down = res.data.two_down==0?'&nbsp;':res.data.two_down;
      three_top = res.data.three_top==0?'&nbsp;':res.data.three_top;
      three_tod = res.data.three_tod==0?'&nbsp;':res.data.three_tod;
      three_down = res.data.three_down==0?'&nbsp;':res.data.three_down;
      top_run = res.data.top_run==0?'&nbsp;':res.data.top_run;
      down_run = res.data.down_run==0?'&nbsp;':res.data.down_run;

      html +='<tr>';
      html +='<td class="">'+ res.data.no + '</td>';
      html +='<td class="txtnum">'+ two_top + '</td>';
      html +='<td class="txtnum">'+ two_down + '</td>';
      html +='<td class="txtnum">'+ three_top + '</td>';
      html +='<td class="txtnum">'+ three_tod + '</td>';
      html +='<td class="txtnum">'+ three_down + '</td>';
      html +='<td class="txtnum">'+ top_run + '</td>';
      html +='<td class="txtnum">'+ down_run + '</td>';
      html +='<td style="text-align:center;"><a href="#" class="btn btn-sm btn-default" onclick="del(\'' + res.data.lot_id +'\', \'' + res.data.idsale +'\', \'' + res.data.idsale_detail +'\', \'' + res.data.no +'\')">ลบ</a></td>';
      html +='</tr>';
      
      $("#result").prepend(html);

    }
    $("input[type=text]").val('');
    $("input[type=text]").prop('disabled', false);
    $(".numberinput").focus();

    sumBill();

  }, 'json');
}

function sumBill()
{
  var top2 = 0,down2 = 0, top3 = 0, tod3 = 0, down3 = 0, runtop = 0, rundown = 0;
  $("tbody#result tr").each(function() {
    $.each(this.cells, function(inx, val) {
      if (inx==1) {
        var data = parseInt($(val).text());
        if (!isNaN(data)) {
          top2 += parseInt(data);
        }
      }

      if (inx==2) {
        var data = parseInt($(val).text());
        if (!isNaN(data)) {
          down2 += parseInt(data);
        }
      }

      if (inx==3) {
        var data = parseInt($(val).text());
        if (!isNaN(data)) {
          top3 += parseInt(data);
        }
      }

      if (inx==4) {
        var data = parseInt($(val).text());
        if (!isNaN(data)) {
          tod3 += parseInt(data);
        }
      }

      if (inx==5) {
        var data = parseInt($(val).text());
        if (!isNaN(data)) {
          down3 += parseInt(data);
        }
      }

      if (inx==6) {
        var data = parseInt($(val).text());
        if (!isNaN(data)) {
          runtop += parseInt(data);
        }
      }

      if (inx==7) {
        var data = parseInt($(val).text());
        if (!isNaN(data)) {
          rundown += parseInt(data);
        }
      }

    })
  });
  $("td.top2").text(top2);
  $("td.down2").text(down2);
  $("td.top3").text(top3);
  $("td.tod3").text(tod3);
  $("td.down3").text(down3);
  $("td.runtop").text(runtop);
  $("td.rundown").text(rundown);
  var total = parseInt(top2) + parseInt(down2) + parseInt(top3) + parseInt(tod3) + parseInt(down3) + parseInt(runtop) + parseInt(rundown);
  $("td.total").text(total);
}
</script>
</body>
</html>
