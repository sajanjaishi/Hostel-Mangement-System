<!DOCTYPE html>
<html>
<?php 
session_start();
			$data=$_SESSION["username"];
			if(!empty($data))
			{
				
			//echo "<h1>".$data."</h1>";
		
			}
			else
			{
					header("Location:../login.php");
			}
			
	?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Warden | Search Student</title>

        <link rel="shortcut icon" href="../images/aj_logo1.png" type="image/png">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../jquery-3.1.1.js"></script>
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/wow.min.js"></script>
        <link rel="stylesheet" href="../css/animate.min.css" />
        <script>wow = new WOW({}).init();</script>
        <link  type="text/css" href="../css/main.css" rel="stylesheet"/>
		
		
		<script>
		
		function ValidationEvent() {
// Storing Field Values In Variables
//var name = document.getElementById("txtFirstName").value;

			var suname=document.getElementById("txtUsername").value;
			
			
			if (suname == '')
				alert("Enter Student name....");
			
		}
		
		</script>

    </head>
    <body class="main_body">

		<div class="section_navigation animated fadeInDown wow">
                <nav class="navbar">
                    <div class="container navigation_block">
                        <div class="row">
                            <div class="col-xs-4">
                                <div>
                                    <h1 style="padding-left:5%;">Hostel Of Acharya</h1>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <br/>
                                <div class="collapse navbar-collapse navigation_style" id="headlink">
                                    <ul class="nav navbar-nav navbar-right navigation" >
                                        <li><a href="WardenHome.php" style="color:#c1c1c1;">Home</a></li>
                                        <li><a href="../logout.php" style="color:#c1c1c1;">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>    
            </div>
			
			

        <div class="container apply_leave_block">
            <div>
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Student detail Module</h2><hr/>
                 
                <div class="tab-content">

                    <div class="">

                        <div class="profile_block_heading">
                            <span>Students</span>
                        </div>
                        <div class="row">
                        <form method="post" class="" autocomplete="off" onsubmit="return ValidationEvent()">
                            <!-- start leave -->
                            <div class="form-group input_block col-xs-12 col-sm-3">
                                <input type="text" name="txtUsername" id="txtUsername" class="form-control input_border input-lg" placeholder="Enter Student Name"  style="color:#c1c1c1;"/>
                                <span class="validation_text" id="err_username"></span> 
                            </div>

                            
                            <div class="form-group input_block col-xs-12 col-sm-4">
                                <input type="submit" name="btnRoomSearch" value="Search" title="Search Room" class="btn btn-warning input-lg" style="width:50%; background-color:#ff1616; color:#c1c1c1;">
                            </div>
                            <!-- end leave-->
                        </form>

                    </div>
                    <div class="row">
					<?php
$con=  mysqli_connect('localhost','root','','hms');
						
							if(isset($_POST["btnRoomSearch"]))
							{
								//$con=  mysqli_connect('localhost','root','','hms');
								$username=$_POST["txtUsername"];
						//		echo "<script>alert('$type $seater');</script>";
								$query="select * from room_detail_master,room_allocation,student_registration_master,parents_registration_master where parents_registration_master.Student_username=student_registration_master.Username and student_registration_master.Username=room_allocation.Student_username and room_allocation.RoomNumber=room_detail_master.roomNumber and student_registration_master.Username='".$username."'";
								echo "<table class='table wow flipInX' data-wow-delay='0.6s' style='color:white;'>";
								echo "<tr style='background-color:#ff1616;'><th>Fullname</th><th>Gender</th><th>Permanent Address</th><th>Contact Number</th><th>Course</th><th>Parents Details</th><th>RoomNumber</th><th>Seater</th></tr>";
								
							if($result= $con->query($query))
							{
								//echo "<pre>";
								//print_r($result->fetch_assoc());
								while($row = $result->fetch_assoc())
								{
									
									echo "<tr><td>".$row["Fullname"]."</td><td>".$row["Gender"]."</td><td>".$row["PermanentAddress"]."</td><td>".$row["Contact"]."</td><td>".$row["Course"]."(".$row["Semester"]." Semester)</td><td>".$row["ParentsName"]."(".$row["Contact"].")</td><td>".$row["RoomNumber"]."</td><td>".$row["seater"]."</td></tr>";						
									
								}
							}
						
							
							}
								echo "</table>";
                        ?>
                    </div>



                    </div>
                </div>
            </div>
        </div>

		<div class="container link_to_amara_map" style="background-color:#ff1616;">
                <h1 class="glyphicon glyphicon-map-marker wow bounceInRight" data-wow-delay="0.8s" style="color:#c1c1c1;"></h1>
                <h1 class="wow bounceInLeft find_me" data-wow-delay="1s" style="color:#c1c1c1;">Find Hostel Of Acharya</h1>
            </div>
			
		<div class="container section_footer">
                <div class="row text-justify">
                    <div class="col-md-4 col-xs-12 animated fadeInDown wow" data-wow-delay="0.2s">
                        <h5 style="color:#ff1616;">About Hostel</h5>
                        <p style="color:#c1c1c1;">With over many year our hostel's real focus on student satisfaction. We provide a good service for all the students. Students also feel lucky too stay here with us.</p>
                    </div>
                    <div class="col-md-4 col-xs-12 animated fadeInDown wow" data-wow-delay="0.4s">
                        <h5 style="color:#ff1616;">Contact Info</h5>
                        <span style="color:#c1c1c1;"><i class="glyphicon glyphicon-map-marker"></i> C-81, Main Road-395009, Surat,Gujarat-India. </span><br/><br/>
                        <span style="color:#c1c1c1;"><i class="glyphicon glyphicon-phone-alt"></i> +91 1234567890</span><br/><br/>
                        <span style="color:#c1c1c1;"><i class="glyphicon glyphicon-envelope"></i> warden.hms@gmail.com</span>
                    </div>
                    <div class="col-md-4 col-xs-12 animated fadeInDown wow" data-wow-delay="0.6s">
                        <h5 style="color:#ff1616;">Our Service</h5>
                        <ul class="nav text-left">
                            <li style="color:#c1c1c1;">Free Wi-Fi</li>
                            <li style="color:#c1c1c1;">LED TV</li>
                            <li style="color:#c1c1c1;">24/7 service</li>
                        </ul>
                    </div>
                </div>

            </div>
		
		<div class="container footer_Links "><hr/>
                <div>
                    <div class="col-md-3 text-center wow fadeInLeft" data-wow-delay="0.3s" style="width:35%">
                        <h3><small class="block" style="color:#c1c1c1;">&copy; 2019 &nbsp; Hostel Of Acharya. All Rights Reserved.</small></h3> 
                    </div>
                </div>
            </div>
			
			
    </body>
</html>
