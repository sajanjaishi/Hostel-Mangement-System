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
            window.location = "StudentHome.php";}
    , 10);
	});
			}
        else if(isConfirm==1) {     
            swal("Warong", "Enter Passoword and Re-password is must be Same!", "error");   
            }
		
		else if(isConfirm==0) {     
            swal("Warong", "Profile Not Update Successfull!", "error");   
            }
}
        </script>

        <script>
            $(document).ready(function () {
                //$("#fadeout").stop(5000);
                $("#fadeout").delay(5000).fadeOut();

            });
        </script>
		
		
		

    </head>
	
        <?php 
			
			$data=$_SESSION["username"];
			
			if(!empty($data))
			{
				
			
			$con=  mysqli_connect('localhost','root','','hms');
								$uname=$_SESSION["username"];
								$query="select * from student_registration_master where username='$uname'";
								
							if($result= $con->query($query))
							{
								
								$res_data=$result->fetch_assoc();
								
								
							
	?>
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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">My Profile</h2><hr/>
				
                <br/>   
                <div class="tab-content">
                    <div id="applyLeave" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Personal Profile</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-0.5 row">


                                </div>
                                <div class="login_main_block col-md-12">

                                    <form method="post"  class="wow flipInX " data-wow-delay="0.6s" autocomplete="off">
                                        <!-- start leave -->
                                        <div class="form-group input_block col-sm-4 col-xs-12">

											<input type="text" value="<?php echo $res_data['Username']; ?>" name="txtUsername" id="txtUsername" class="form-control input_border input-lg" placeholder="Student Enrollment Number" title="Enter student enrollment number that is provided by University" style="color:#c1c1c1; background:transparent;" readonly />
											
										</div>

                                        <div class="form-group input_block col-sm-4 col-xs-12">
                                            <input type="text" value="<?php echo explode(" ",$res_data['Fullname'])[0]; ?>" name="txtFirstName" class="form-control input_border input-lg"  placeholder="First Name" title="Enter your first name" style="color:#c1c1c1; background:transparent;" readonly />
											
                                        </div>
										
                                        <div class="form-group input_block col-sm-4 col-xs-12">
                                            <input type="text" value="<?php echo explode(" ",$res_data['Fullname'])[1]; ?>"name="txtLastName" class="form-control input_border input-lg"  placeholder="Last Name" title="Enter your surname" style="color:#c1c1c1; background:transparent;" readonly />
											
                                        </div>
										
										<div class="form-group col-sm-4 col-xs-12 input_block">

											<input type="text" value="<?php echo $res_data['Course']; ?>" name="txtCourse" class="form-control input_border input-lg"  placeholder="Course" title="Enter your Course" style="color:#c1c1c1; background:transparent;" readonly />  
											
										</div>
										<div class="form-group col-sm-4 col-xs-12 input_block">

											<input type="text" value="<?php echo $res_data['Semester']; ?>" name="txtSemester" class="form-control input_border input-lg"  placeholder="Semester" title="Enter your Semester" style="color:#c1c1c1; background:transparent;" readonly />
											
										</div>
										
										<div class="form-group col-sm-4 col-xs-12 input_block">

											<input type="text" value="<?php echo $res_data['Gender']; ?>" name="txtGender" class="form-control input_border input-lg"  placeholder="Gender" title="Enter your Gender" style="color:#c1c1c1; background:transparent;" readonly />
											
										</div>
                                        
                                        <div class="form-group col-sm-4 col-xs-12 input_block">

											<input type="text" name="txtDOB" value="<?php echo $res_data['BirthDate']; ?>"  id="txtDOB" class="form-control input_border input-lg"  placeholder="Date of birth" max="2000-01-01" title="Select your date of birth" style="color:#c1c1c1; background:transparent;" readonly />
											
										</div>
										<div class="form-group col-sm-4 col-xs-12  input_block">

											<input type="email" name="txtStudEmail" id="email" value="<?php echo $res_data['EmailID']; ?>" class="form-control input_border input-lg"  placeholder="Student Email address" title="Enter your registered email address" style="color:#c1c1c1; background:transparent;"/>
											
										</div>
										<div class="form-group col-sm-4 col-xs-12  input_block">

											<input type="text" name="txtStudContact" id="pno" value="<?php echo $res_data['Contact']; ?>" class="form-control input_border input-lg"  placeholder="Student Contact number" min="10" max="10" title="Enter student mobile number" style="color:#c1c1c1; background:transparent;"/>
											
										</div>
										<div class="form-group col-sm-6 col-xs-12  input_block">

											<input type="text" name="txtPermanentAddress" id="add" value="<?php echo $res_data['PermanentAddress']; ?>" class="form-control input_border input-lg" placeholder="Permanent address" title="Enter your permanent address" style="color:#c1c1c1; background:transparent;" />
											
										</div>

										<div class="form-group col-sm-6 col-xs-12 input_block">

											<input type="password" name="txtStudentPassword"id="cpass" value="<?php echo $res_data['Password']; ?>" class="form-control input_border input-lg"  placeholder="Student Password" title="Enter your Passoword" style="color:#c1c1c1; background:transparent;" />
											
										</div>
										<div class="form-group col-sm-6 col-xs-12 input_block">

											<input type="password" name="txtStudentCPassword" id="rpass" value="<?php echo $res_data['Password']; ?>" class="form-control input_border input-lg"  placeholder="Re-Enter password" title="Again enter your password" style="color:#c1c1c1; background:transparent;" />
											
										</div>
								
										<div class="form-group col-sm-6 col-xs-12">        
											<input type="submit" name="btnRegister" value="Update" class="btn btn-success input-lg" style="width:49%; background-color:#ff1616; color:#c1c1c1; border:#c1c1c1;"/>&nbsp;  
										</div>
										<?php 
											if(isset($_POST['btnRegister']))
											{
												//echo "<script>alert('Passoword and re-enter password is must be same..');</script>";
												$email=$_POST['txtStudEmail'];
												$contact=$_POST['txtStudContact'];
												$address=$_POST['txtPermanentAddress'];
												$password=$_POST['txtStudentPassword'];
												$repassword=$_POST['txtStudentCPassword'];
												if(!empty($password) && !empty($repassword))
												{
													if($password!=$repassword)
													{
														echo "<script>JSalert(1);</script>";
														//echo "<script>alert('Please enter passoword and re-password is must be same..');</script>";	
													}
													else if(empty($email)||empty($contact)||empty($address)||empty($password)||empty($repassword))
													{
														if (empty($email))
															echo "<script>alert(Enter Email....);</script>";
														else if (empty($contact))
															echo "<script>alert(Enter Contat....);</script>";
														else if (empty($address))
															echo "<script>alert(Enter Perment Address....);</script>";
														else if (empty($password))
															echo "<script>alert(Enter Current Passoword....);</script>";
														else if (empty($repassword))
															echo "<script>alert(Enter Reenter Passoword....);</script>";
													}
													else {
														$con=  mysqli_connect('localhost','root','','hms');
													try
													{
														$query="update `student_registration_master` set PermanentAddress='$address',EmailID='$email',Contact='$contact',Password='$password' where Username='".$_POST['txtUsername']."'";
														if ($con->query($query) === TRUE) 
														{
															echo "<script>JSalert(2);</script>";
															//@header("Location:profile.php");
														}
														else 
														{
															echo "<script>JSalert(0);</script>";
															//@header("Location:StudentRegistration.html");
														}
													}
												catch(Exception $e)
													{
															echo $e;
													}
													}
													
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
<?php	
							}
			}
			else
			{
					header("Location:../login.html");
			}
		//	session_destroy();
	?>
    
</html>
