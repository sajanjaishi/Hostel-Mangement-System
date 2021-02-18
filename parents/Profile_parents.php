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
            title: "Profile Update Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "ParentsHome.php";}
    , 10);
	});
			}
        else if(isConfirm==1) {     
            swal("Warong", "Profile Not Update!", "error");   
            }
}
        </script>
		
        <script>
            $(document).ready(function () {
                //$("#fadeout").stop(5000);
                $("#fadeout").delay(5000).fadeOut();

            });
        </script>
		
		
		<script>
		
		function ValidationEvent() {
// Storing Field Values In Variables
//var name = document.getElementById("txtFirstName").value;

			var oldpass=document.getElementById("txtUserOldPassword").value;
			var newpass=document.getElementById("txtUserNewPassword").value;
			var repass=document.getElementById("txtUserRePassword").value;
			
			
			if (oldpass == '')
				alert("Enter Old Password....");
			else if (newpass == '')
				alert("Enter New Password....");
			else if (repass == '')
				alert("Enter Re-Enter New Password....");
			
			
		}
		</script>

    </head>
    <body style="background-color:#c1c1c1;">
	
<?php 
			
			$data=$_SESSION["username"];
			if(!empty($data))
			{
				$con=  mysqli_connect('localhost','root','','hms');
								$uname=$_SESSION["username"];
								$query="select * from parents_registration_master where Username='$uname'";
								
							if($result= $con->query($query))
							{
								
								$res_data=$result->fetch_assoc();
							}
			}
							
	?>	
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
                                        <li><a href="ParentsHome.php" style="color:#c1c1c1;">Home</a></li>
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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Profile</h2><hr/>
                <br/>   
                <div class="tab-content">
                    <div id="applyLeave" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Personal Profile</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-7 row">


                                </div>
                                <div class="login_main_block col-md-5">

                                    <form method="post"  class="wow flipInX" data-wow-delay="0.6s" autocomplete="off"">
                                        <!-- start leave -->
                                        <div class="form-group input_block"><br/>

											<input type="text" class="form-control input-lg input_border" readonly id="txtUsername" name="txtUsername" value="<?php echo $res_data['Username']; ?>" readonly="" placeholder="User Name" style="color:#c1c1c1; background:transparent;"/>
											
										</div>
								
										<div class="form-group input_block"><br/>

											<input type="text" class="form-control input-lg input_border" readonly id="txtname" name="txtname" value="<?php echo $res_data['ParentsName']; ?>" placeholder="Name" style="color:#c1c1c1; background:transparent;"/>
											
										</div>
										
                                        <div class="form-group input_block">
                                            <input type="email" class="form-control input-lg input_border" name="txtemail"  value="<?php echo $res_data['Emaild']; ?>" placeholder="Contact Number" style="color:#c1c1c1;" />
											
                                        </div>
                                        <div class="form-group input_block">
                                            <input type="text" class="form-control input-lg input_border" name="txtcontact" min="10" max="10" value="<?php echo $res_data['Contact']; ?>" placeholder="Email Id" style="color:#c1c1c1;" />
                                            
                                        </div>
                                        
                                        <div class="form-group">
											<input type="submit" class="btn btn-toolbar form-control input-lg"  name="btnchange" value="Update" style="color:#c1c1c1; background-color:#ff1616;"/>
										</div>
								
                                        <!-- end leave-->
                                    </form>
                                </div>
                            </div>
								<?php 
											if(isset($_POST['btnchange']))
											{
												//echo "<script>alert('Passoword and re-enter password is must be same..');</script>";
												
												$email=$_POST['txtemail'];
												$contact=$_POST['txtcontact'];
												$con=  mysqli_connect('localhost','root','','hms');
													try
													{
														if(empty($email)||empty($contact))
													{
														if (empty($email))
															echo "<script>alert(Enter Email....);</script>";
														else if (empty($contact))
															echo "<script>alert(Enter Contat....);</script>";
														
													}
													else{$query="update `parents_registration_master` set Emaild='$email',Contact='$contact' where Username='".$_POST['txtUsername']."'";
														if ($con->query($query) === TRUE) 
														{
															echo "<script>JSalert(2);</script>";
															//@header("Location:Profile_parents.php");
														}
														else 
														{
															echo "<script>JSalert(1);</script>";
															//@header("Location:StudentRegistration.html");
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
