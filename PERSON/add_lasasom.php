<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['PERSON'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
	$idcard=$_GET['idcard'];
	$strSQL = "SELECT * FROM person WHERE idcard = '$idcard' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
    <script>
		function validate() {
		if(document.frmMain.la_date.value == "")
		{	alert('เลือกวันที่ลา');	
					document.frmMain.la_date.focus();
					return false;
		} 

		if(document.frmMain.latype.value == "")
		{	alert(' เลือกประเภทการลา ');	
					document.frmMain.latype.focus();
					return false;
		} 

		if(document.frmMain.dsum.value == "")
		{	alert(' ใส่จำนวนวันลา ');	
					document.frmMain.dsum.focus();
					return false;
		} 	
		}
	</script>

	<script language="javascript">
		function CheckNum(){
				if (event.keyCode < 46 || event.keyCode > 57){
					  event.returnValue = false;
					}
			}
	</script>
    </head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?>
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกวันลา</a></li>
                        <li class="active"><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกวันลา</h3>
                                </div>
                                
                                <div class="box-body">
                                <p align="left"><img  src="http://www.wkhospital.go.th/2557/registry/person/output/<?=$objResult["idcard"];?>.png"
                                    width="104" height="140" class="img-thumbnail"/></p>
                                    <p> ชื่อ <code><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></code>
                                     เลขบัตรประชาชน <code><?=$objResult["idcard"];?></code></p>
                                    <p> เริ่มทำงานวันที่ <code><?=LongThaiDate($objResult["workdate"])?></code></p>	                                    <p> จำนวนวันลาพักผ่อนที่เหลือ <code><?=$objResult["lasasom"];?></code></p>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <!-- Date and time range -->
                                    <form action="save_lasasom.php" method="post" enctype="multipart/form-data" name="frmMain" onSubmit="JavaScript:return validate();">
                                        <div class="form-group">
                                            <div class="input-group">
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar-o"> เพิ่มจำนวนวันลาพักผ่อนอีก</i>
                                                </div>
                                                <input name="lasasom" type="text" class="form-control" onKeyPress="CheckNum()" 
                                                value="<?=$objResult["lasasom"];?> ">
                                                <input name="idcard" type="hidden" class="form-control"  
                                                value="<?=$objResult["idcard"];?>" >												
                                                <div class="input-group-addon">
                                                    <i class="fa "> วัน</i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
    
                                        <div class="form-group">
                                            <input name="idcard" type="hidden" class="form-control"  value="<?=$idcard?>">
                                            <button name="btnSubmit" type="submit" class="btn btn-primary">Save วันลาพักผ่อน</button> 
                                            <button type="button" class="btn btn-success" onclick="window.location.href='person_detail.php?idcard=<?=$objResult["idcard"];?>'" >กลับ</button>
                                        </div><!-- /.form group -->
                                    </form>	
                                </div> <!-- /.box-footer -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        <script src="../includes/bootstrap/js/jquery.min.js"></script>
        <script src="../includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

		<!-- InputMask -->
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        
        <!-- DATA TABES SCRIPT -->
        <script src="../includes/bootstrap/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        
        <!-- date-range-picker -->
        <script src="../includes/bootstrap/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        
		<!-- bootstrap color picker -->
        <script src="../includes/bootstrap/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        
		<!-- bootstrap time picker -->
        <script src="../includes/bootstrap/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
       
		<!-- AdminLTE App -->
        <script src="../includes/bootstrap/js/AdminLTE/app.js" type="text/javascript"></script>
        
		<!-- AdminLTE for demo purposes -->
        <script src="../includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>

        <script src="../includes/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>
        
		<!-- fullCalendar -->
        <script src="../includes/bootstrap/js/moment.min.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/fullcalendar.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>

        <!-- Page script -->
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker({format: 'YYYY-MM-DD'});
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: false, timePickerIncrement: 30, format: 'YYYY-MM-DD'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
        
		<!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
    </body>
</html>
