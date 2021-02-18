<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.js"></script>
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <link rel="stylesheet" href="css/animate.min.css" />
        <script>wow = new WOW({}).init();</script>
        <link  type="text/css" href="css/main.css" rel="stylesheet"/> 

		<script src="js/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="css/sweetalert.css">
		
		<script>
			function JSalert(isConfirm){    
        if (isConfirm==2) 
    {   
	setTimeout(function() {
        swal({
            title: "Room Select Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "StudentHome.php";}
    , 10);
	});
			}
			
	if (isConfirm==4) 
    {   
	setTimeout(function() {
        swal({
            title: "You Already Selected Room!",
            //text: "Message!",
            type: "error"
        }, function() {
            window.location = "StudentHome.php";}
    , 10);
	});
			}
			
        else if(isConfirm==1) {     
            swal("Warong", "Room Not Select!", "error");   
            }
		
		else if(isConfirm==3) {     
            swal("Sorry", "Room Not Available!", "error");   
            }
			
}
        </script>
		
        <script>
            $(document).ready(function () {
                //$("#fadeout").stop(5000);
                $("#fadeout").delay(5000).fadeOut();
				

            });
			
        </script>
		
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
			$con=  mysqli_connect('localhost','root','','hms');
			$id=@$_REQUEST["id"];
			
							if($id!=NULL)
							{
															$username=$_SESSION["username"];
															$number=$_GET["id"];
															
															$query="update `room_detail_master` set vacantSeat=vacantSeat-1 where roomNumber='$id'";
																if ($con->query($query) === TRUE) 
																{
																		$query="INSERT INTO `room_allocation`(Student_username, RoomNumber,AllocateDate) VALUES ('$username','$number',curdate())";
																		if ($con->query($query) === TRUE) 
																		{
																			echo "<script>JSalert(2);</script>";
																				//@header("Location:WardenHome.html");
																		}
																		else 
																		{	
																			
																			$query="update `room_detail_master` set vacantSeat=vacantSeat+1 where roomNumber='$id'";
																			
																			if($con->query($query)===TRUE)
																			{
																				echo "<script>JSalert(4);</script>";
																				//@header("Location:StudentRegistration.html");
																			}
																			
																			
																		}
																		$_GET["id"]=null;
																	
																}
																else 
																{
																	echo "<script>JSalert(1);</script>";
																	//@header("Location:StudentRegistration.html");
																}
															
															

							}
							else
							{
								echo "<script>JSalert(0);</script>";
							}
			
	?>


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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Room Selection</h2><hr/>
				
                <br/>   
                <div class="tab-content">
                    <div id="applyLeave" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Room Select</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-6 row">
									
									
                                </div>
								<script>
		function ValidationEvent() {
// Storing Field Values In Variables
//var name = document.getElementById("txtFirstName").value;

			var catagory = document.getElementById("roomType").options[document.getElementById("roomType").selectedIndex].text;
			var stype = document.getElementById("SeatType").options[document.getElementById("SeatType").selectedIndex].text;
			
			if (catagory == '--Select Room Type--')
				alert("Select Room Type....");
			else if (stype == '--Select SeatType--')
				alert("Select Seat Type....");
			
		}
		</script>
                                <div class="login_main_block col-md-6">
								

                                    <form method="post"  class="wow flipInX " data-wow-delay="0.6s" autocomplete="off" onsubmit="return ValidationEvent()">
                                        <!-- start leave -->
                                        <div class="form-group input_block col-sm-6 col-xs-12">
											<input type="text" readonly="" name="txtUsername" id="txtUsername" class="form-control input_border_leave input-lg" placeholder="UserName" value="<?php 
											
											echo $_SESSION["username"];
											?>" style="color:#c1c1c1; background:transparent"/>
											
										</div>

                                        <div class="form-group input_block col-sm-6 col-xs-12">
                                            <select name="RoomType" class="form-control input_border_leave input-lg" id="roomType" title="Room Type" style="color:#c1c1c1;" >
												<option value="" style="color:#011330;"/>--Select Room Type--
												<option value="A" style="color:#011330;"/>AC
												<option value="N" style="color:#011330;"/>Non AC
											</select>
                                        </div>		
										<div class="form-group col-sm-6 col-xs-12 input_block">

											<select name="SeatType" class="input-lg input_border_leave form-control" title="SeatType" style="color:#c1c1c1;" >
												<option value="" style="color:#011330;"/>--Select SeatType--
												<option value="1" style="color:#011330;"/>1
												<option value="2" style="color:#011330;"/>2
												<option value="3" style="color:#011330;"/>3
												<option value="4" style="color:#011330;"/>4
											</select>    
										</div>								 
										<div class="form-group col-sm-6 col-xs-12">        
											<input type="submit" name="btnsearch" value="Search Room" class="btn btn-warning input-lg" style="width:100%; background-color:#ff1616; color:#c1c1c1; border:#c1c1c1;" "/>
										</div>
								
                                        <!-- end leave-->
                                    </form>
									
                                </div>
								<div>
							<?php
							//session_start();
							$con=  mysqli_connect('localhost','root','','hms');
						
							if(isset($_POST["btnsearch"]))
							{
								//$con=  mysqli_connect('localhost','root','','hms');
								$type=$_POST["RoomType"];
								$seater=$_POST["SeatType"];
								echo "<script>alert".$type."</script>";
								
									
						//		echo "<script>alert('$type $seater');</script>";
								echo $type;
								$query="select * from room_detail_master where roomType='$type' and seater='$seater' and vacantSeat>0";
								
								if($result= $con->query($query))
								{
									$i=0;
									if(mysqli_num_rows($result)!=0)
									{
										echo "<table class='table wow flipInX' data-wow-delay='0.6s' style='color:white;'>";
										echo "<tr style='background-color:#ff1616;'><th>Index Number</th><th>Room Number</th><th>Room Type</th><th>Seater</th><th>Vacant Seat</th><th>Action</th></tr>";

									}
																
									else
									{
										echo "<script>JSalert(3);</script>";
									}
									while($row = $result->fetch_assoc())
									{
										$i++;
										echo "<tr><td>".$i."</td><td>".$row["roomNumber"]."</td><td>".$row["roomType"]."</td><td>".$row["seater"]."</td><td>".$row["vacantSeat"]."</td><td><a href='RoomSelection.php?id=".$row["roomNumber"]."' name='btnbook' value=".$row["roomNumber"]."' class='btn btn-warning input-lg' style='width:100%; background-color:#ff1616; color:#c1c1c1; border:#c1c1c1;'>Book </a></td></tr>";						
									}
								}
							
							
							}
							?>
								</table>
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

