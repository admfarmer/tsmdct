<?php

	$DEPART1=$_SESSION["DEPART"];
	$IDCARD1=$_SESSION["IDCARD"];
	
	$strSQLNAV = "SELECT * FROM person WHERE idcard = '$IDCARD1' ";
	$objQueryNAV = mysql_query($strSQLNAV);
	$objResultNAV = mysql_fetch_array($objQueryNAV);

?>

	<body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                 ระบบรายงาน
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-left">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="active">
                            <a href="../main.php">
                                <span>Home</span>
                            </a>
                        </li>
                    </ul>
                </div>                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>ระบบรายงาน <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
										<td><?=$objResultNAV['title']?><?=$objResultNAV['name']?>  <?=$objResultNAV['lastname']?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
      
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="../password.php" class="btn btn-default btn-flat">เปลี่ยนรหัสผ่าน</a>
                                    </div>
                                    <div class="pull-right">
                                        <a  href="../logout.php" class="btn btn-default btn-flat">ออกจากระบบ</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
   						<li class="active">
                            <a href="index.php">
                                <i class="glyphicon glyphicon-home"></i> <span>หน้าแรก</span>
                            </a>
                        </li>
                        <li class="treeview" >
                            <a href="#">
                                <i class="fa fa-warning"></i> <span>รายงานทั่วไป</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
							    <li><a href="today.php"><i class="fa fa-bar-chart-o fa-fw"></i> สรุปข้อมูลวันนี้ </a></li>  
                                <li><a href="report_pttype.php"><i class="fa fa-angle-double-right"></i> สิทธิ์ผู้มารับบริการปัจจุบัน</a></li>
                                <li><a href="frm_reportpt.php"><i class="fa fa-angle-double-right"></i> 20 อันดับโรค</a></li>
                                <li><a href="frm_revisiter.php"><i class="fa fa-angle-double-right"></i> Revisit ER</a></li>
                                <!--
								<li><a href="frm_ncddm.php"><i class="fa fa-angle-double-right"></i> NCD เบาหวาน ในเขต รพ.</a></li>
                                <li><a href="frm_ncdht.php"><i class="fa fa-angle-double-right"></i> NCD ความดัน ในเขต รพ.</a></li>
                                <li><a href="frm_ncddmht.php"><i class="fa fa-angle-double-right"></i> NCD เบาหวาน+ความดัน ในเขต รพ.</a></li> 
								-->
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> -</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>