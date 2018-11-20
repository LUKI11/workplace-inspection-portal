<?php
include('UQname.php');
?>
	    <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <span style="color:white" id="roleType" class="bolding">
                            <?php
                            echo "$userrole"
                            ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php"><img src="templateStyle/images/dashboard_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="inspection.php"><img src="templateStyle/images/inspection_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="report.php"><img src="templateStyle/images/report_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="cap.php"><img src="templateStyle/images/cap_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="contact.php"><img src="templateStyle/images/contact_icon.png" height="25"></a>
                </li>
                <li>
                    <a style="color:white" href="settingPage.php">Settings</a>
                </li>
                <li style="color:white" id="linkAPI"><a onclick="linkAPI()">Link iAuditor</li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Right Content
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <nav>
                            <div class="row">
                                <div class="col-md-10" style="">
                                    <a href="#menu-toggle" id="menu-toggle"><img src="templateStyle/images/menu.png" height="25">
                                    </a><img src="templateStyle/images/inspection.png" height="40"></div>
                                <div class="col-md-2">
                                    Welcome,&nbsp;
                                    <span id="welcomeName" class="bolding"></span>
                                    <img src="templateStyle/images/icon.jpeg" width="30px" height="30px">
                                </div>
                            </div>
                        </nav>

                        -->