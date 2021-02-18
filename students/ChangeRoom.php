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
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.js"></script>
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="js/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="css/sweetalert.css">
        <script src="js/wow.min.js"></script>
        <link rel="stylesheet" href="css/animate.min.css" />
        <script>wow = new WOW({}).init();</script>
        <link  type="text/css" href="css/main.css" rel="stylesheet"/> 

        <script>
            $(document).ready(function () {
                //$("#fadeout").stop(5000);
                $("#fadeout").delay(5000).fadeOut();

            });
			function JSalert(isConfirm){    
        if (isConfirm==1) 
    {   
	setTimeout(function() {
        swal({
            title: "Room Change Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "StudentHome.php";
        });
    }, 10);
   }
        else if(isConfirm==2) {     
            swal("Warong", "Room Not Change", "warning");   
            }
			
		else if(isConfirm==3) {     
            setTimeout(function() {
        swal({
            title: "Sorry",
            text: "Room Not Available!",
            type: "error"
        }, function() {
            window.location = "StudentHome.php";
        });
    }, 10); 
            }
}
        </script>

    </head>
    <body style="background-color:#c1c1c1;">
	
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
                                <div class="collapse navbar-collapse navigation_style">
                                    <ul class="nav navbar-nav navbar-right navigation" >
                                        <li><a href="StudentHome.php" style="color:#c1c1c1;">Home</a></li>
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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Change Room</h2><hr/>
				
                <br/>   
                <div class="tab-content">
                    <div id="applyLeave" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Change Room</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-4 row">


                                </div>
                                <div class="login_main_block col-md-8">
<?php
$roonumber=$SeatType=$type="";	
	$con=  mysqli_connect('localhost','root','','hms');
	
	$username=$_SESSION["username"];
	$query="select * from room_detail_master,room_allocation where Student_username='$username' and room_detail_master.roomNumber=room_allocation.RoomNumber";
	if($result= $con->query($query))
							{
								if($row = $result->fetch_assoc())
								{
									$roonumber=$row["RoomNumber"];
									$SeatType=$row["seater"];
									$type=$row["roomType"];
								}
							}
?>
                                    <form method="post"  class="wow flipInX " data-wow-delay="0.6s" autocomplete="off">
                                        <!-- start leave -->
                                        <div class="form-group input_block col-sm-6 col-xs-12">
											<input type="text" readonly="" name="txtUsername" id="txtUsername" value="<?php echo $username; ?>" class="form-control input_border_leave input-lg" placeholder="Username" title="Enter student enrollment number that is provided by University" style="color:#c1c1c1; background:transparent"/>
										</div> 

										<div class="form-group input_block col-sm-6 col-xs-12">
                                            <input type="text" readonly="" name="SeatType" id="txtUsername" class="form-control input_border_leave input-lg" value="<?php echo $SeatType; ?>" placeholder="SeatType" style="color:#c1c1c1; background:transparent"/>
                                        </div>
										<div class="form-group input_block col-sm-6 col-xs-12">
											<input type="text" readonly="" name="txtUsername" id="txtUsername" class="form-control input_border_leave input-lg" value="<?php echo $roonumber;?>" placeholder="RoomNumber" title="Enter student enrollment number that is provided by University" style="color:#c1c1c1; background:transparent"/>
											
										</div>
                                        <div class="form-group input_block col-sm-6 col-xs-12">
                                            <select name="Roomnumber" class="form-control input_border_leave input-lg" id="roomType" title="Room Type" style="color:#c1c1c1;" required>
												<option value="" style="color:#011330;"/>--Select Room--
												<?php
													$query="select * from room_detail_master where roomType='$type' and seater='$SeatType' and vacantSeat>0 and roomNumber<>$roonumber";
													if($result= $con->query($query))
													{
														if(mysqli_num_rows($result)!=0)
														{
															while($row = $result->fetch_assoc())
															{	
																echo "<option value=".$row["roomNumber"]." style=color:#011330;/>".$row["roomNumber"]."";						
															}
														}
														else
														{
															echo "<script>JSalert(3);</script>";
														}
															
													}	
												?>
											</select>
                                        </div>
								
										<div class="form-group col-sm-6 col-xs-12">        
											
											<input type="submit" name="btnchange" value="Change Room" class="btn btn-warning input-lg" style="width:48.7%; background-color:#ff1616; color:#c1c1c1; border:#c1c1c1;"/>

										</div>
								<?php
								if(isset($_POST["btnchange"]))
								{
									if(!(empty($_POST["Roomnumber"]))){
									$con=  mysqli_connect('localhost','root','','hms');
									$query="update `room_detail_master` set vacantSeat=vacantSeat-1 where roomNumber='".$_POST["Roomnumber"]."'";
									$query1="update `room_detail_master` set vacantSeat=vacantSeat+1 where roomNumber='".$roonumber."'";
									$query2="update `room_allocation` set RoomNumber=".$_POST["Roomnumber"].", LastRoomChangeDate=curdate() where Student_username='".$username."'";
									if ($con->query($query) === TRUE &&$con->query($query1) === TRUE && $con->query($query2) === TRUE)
									{echo "<script>JSalert(1);</script>";
									}
								}
								else{echo "<script>JSalert(2);</script>";	}
								}
								
								?>
                                        <!-- end leave-->
                                    </form>
                                </div>
                            </div>



                        </div>
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

