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
        <title>Hostel | Student</title>

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
            title: "Complain Apply Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "StudentHome.php";}
    , 10);
	});
			}
        else if(isConfirm==1) {     
            swal("Warong", "Complain Apply Unsuccessfull!", "error");   
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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Complain module</h2>
                
                <hr/>
                <div class="tab-content">
                    <div id="applyComplain" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Complain</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-7 row">


                                </div>
								<script>
		function ValidationEvent() {
// Storing Field Values In Variables
//var name = document.getElementById("txtFirstName").value;

			var var1 = document.getElementById("txtSubject_S").options[document.getElementById("txtSubject_S").selectedIndex].text;
			var var2=document.getElementById("txtUserReason").value;
			
			
			if (var1 == '--Select Subject--')
				alert("Select Subject....");
			else if (var2 == '')
				alert("Enter Complain Reason ....");
			
			
		}
		</script>
                                <div class="login_main_block col-md-5">

                                    <form method="post"  class="wow flipInX" data-wow-delay="0.6s" autocomplete="off" onsubmit="return ValidationEvent()">
                                        <!-- start leave -->
                                        <div class="form-group input_block"><br/>
										<?php
											@session_start();	
										?>
											<input type="text" class="form-control input-lg input_border" id="txtUsername" name="txtUsername" value="<?php echo $_SESSION["username"]; ?>" title="Please enter your username" placeholder="Username" readonly style="color:#c1c1c1; background:transparent;"/>
											
										</div>

                                        <div class="form-group input_block">
                                            <select name="txtSubject_S" class="form-control input-lg input_border" id="txtSubject_S" style="color:#c1c1c1;"  >
                                                <option value="" style="color:#011330;"/>--Select Subject--
                                                <option value="room" style="color:#011330;"/>Room
                                                <option value="washroom" style="color:#011330;"/>Washroom
                                                <option value="food" style="color:#011330;"/>Food
                                                <option value="other" style="color:#011330;"/>Other
                                            </select>
                                            <span class="validation_text" id="err_subject"></span>
                                        </div>
                                        
										
										<div class="form-group input_block">

											<input type="text" class="form-control input-lg input_border" id="txtUserReason" name="txtUserReason" title="Please enter your username" placeholder="Reason" style="color:#c1c1c1; background:transparent;" />
											<span class="validation_text" id="err_username"></span>
										</div>
										
                                        
										
										
                                        
                                        <div class="form-group">
											<input type="submit" class="btn btn-toolbar form-control input-lg"  name="btnapply" value="Apply" style="color:#c1c1c1; background-color:#ff1616;"/>
										</div>
                                        <!-- end leave-->
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2">
						<?php				
							if(isset($_POST['btnapply']))
							{
							$subject=$_POST['txtSubject_S'];
							//$reason=$_POST['txtReason_S'];
							$reason_text=$_POST['txtUserReason'];			
							$con=  mysqli_connect('localhost','root','','hms');
	try
	{
		
		if(!empty($_SESSION["username"]))
		{
			if(!empty($subject)&& !empty($reason_text))
														{
			$uname=$_SESSION["username"];
			$query="INSERT INTO `complain`(username, Reason, ComplainStatus, ComplainDate, usertype, subject) VALUES ('$uname','$reason_text','P',curdate(),'S','$subject')";
			if ($con->query($query) === TRUE) 
			{
				echo "<script>JSalert(2);</script>";	
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
