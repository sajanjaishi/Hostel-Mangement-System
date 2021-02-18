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
        <title>Student | Leave</title>

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
        if (isConfirm>1) 
    {   
	setTimeout(function() {
        swal({
            title: "Leave Apply Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "StudentHome.php";}
    , 10);
	});
			}
        else if(isConfirm==1) {     
            swal("Warong", "Leave Not Apply!", "error");   
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
                                <div class="collapse navbar-collapse navigation_style" id="headlink">
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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Leave module</h2>
                <hr/>
                <div class="tab-content">
                    <div id="applyComplain" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Apply Leave</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-7 row">


                                </div>
								<script>
		function ValidationEvent() {
// Storing Field Values In Variables
//var name = document.getElementById("txtFirstName").value;

			var date1=document.getElementById("date_end").value;
			var date2=document.getElementById("set_date_end").value;
			var reason=document.getElementById("reason").value;
			
			if (date1 == '')
				alert("Select The Date On Witch Leave Is Starting ....");
			else if (date2 == '')
				alert("Select The Date On Witch Leave Is Ending ....");
			else if (reason == '')
				alert("Enter Valid Reason....");
			
		}
		</script>
                                <div class="login_main_block col-md-5">

                                    <form method="post"  class="wow flipInX" data-wow-delay="0.6s" autocomplete="off" onsubmit="return ValidationEvent()">
                                        <!-- start leave -->
                                        <div class="form-group input_block"><br/>
											<?php
											@session_start();	
										?>
                                            <input type="text" readonly="" name="txtUsername" value="<?php echo $_SESSION["username"]; ?>" id="txtUsername" class="form-control input_border input-lg"  placeholder="Username" title="Enter student enrollment number that is provided by University" style="color:#c1c1c1; background:transparent;"/>
                                            <span class="validation_text" id="err_username"></span> 
                                        
										</div>

                                        <div class="form-group input_block">
                                            <input type="date" min="<?php echo date("Y-m-d"); ?>" name="txtFromDatetime" class="form-control input_border input-lg" id="date_end"  placeholder="" title="Enter from date and time" style="color:#c1c1c1;" />
                                            <span class="validation_text" id="err_fname"></span>
                                        </div>
                                        <div class="form-group input_block">
                                           
											<input type="date" name="txtToDatetime" min="<?php echo date("Y-m-d"); ?>" class="form-control input_border input-lg" id="set_date_end" placeholder="" title="Enter to date and time" style="color:#c1c1c1;" />
                                            <span class="validation_text" id="err_lname"></span>
                                        </div>
                                        <div class="form-group  input_block">
                                            <textarea name="txtReason" class="form-control input_border_leave input-lg" id="reason" rows="1" placeholder="Enter reason" title="Enter reason for leave" style="color:#c1c1c1;" ></textarea>
                                            <span class="validation_text" id="err_username"></span>
                                                
                                        </div>
                                        
                                        <div class="form-group">
											<input type="submit" class="btn btn-toolbar form-control input-lg"  name="btnapply" value="Apply" style="color:#c1c1c1; background-color:#ff1616;"/>
										</div>
										<?php
											if(isset($_POST["btnapply"]))
											{
												$from=$_POST['txtFromDatetime'];
												$to=$_POST['txtToDatetime'];
												$reason=$_POST['txtReason'];
												
												$con=  mysqli_connect('localhost','root','','hms');
												try
												{
													
													if(!empty($_SESSION["username"]))
													{
														if(!empty($from)&& !empty($to)&& !empty($reason))
														{
															$uname=$_SESSION["username"];
														$query="INSERT INTO `leave_module`(Username, FromDateTime, ToDateTime, AppliedDate, Reason, P_Status,W_Status,rejectReason) VALUES ('$uname','$from','$to',curdate(),'$reason','P','P','NULL')";
														if ($con->query($query) === TRUE) 
														{
															echo "<script>JSalert(2);</script>";
															//@header("Location:ApplyLeave.php");
														
														}
														else 
														{
															echo "<script>JSalert(1);</script>";
															//header("Location:StudentRegistration.html");
														}
														}
													}

												}
												catch(Exception $e)
												{
													echo $e;
												}

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
