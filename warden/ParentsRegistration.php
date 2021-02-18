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
		
		function ValidationEvent() {
// Storing Field Values In Variables
//var name = document.getElementById("txtFirstName").value;

			var suname=document.getElementById("txtsuname").value;
			var puname=document.getElementById("txtpuname").value;
			var pname=document.getElementById("txtpname").value;
			var pno=document.getElementById("pno").value;
			var email=document.getElementById("email").value;
			var pass=document.getElementById("pass").value;
			
			if (suname == '')
				alert("Enter Student User name....");
			else if (puname == '')
				alert("Enter Parent User Name....");
			else if (pname == '')
				alert("Enter Parent Name....");
			else if (pno == '')
				alert("Enter Valid Phone Number....");
			else if (email == '')
				alert("Enter Valid Email....");
			else if (pass == '')
				alert("Enter Valid Password....");
			
		}
		
		
		
		
		
			function JSalert(isConfirm){    
        if (isConfirm==2) 
    {   
	setTimeout(function() {
        swal({
            title: "Registration Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "WardenHome.php";}
    , 10);
	});
			}
        else if(isConfirm==1) {     
            swal("Error", "Enter Valid Student Username or try to Re-Registration!", "error");   
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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Parents Registration</h2><hr/>
				
                <br/>   
                <div class="tab-content">
                    <div id="applyLeave" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Add Parents</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-5 row">


                                </div>
                                <div class="login_main_block col-md-7">

                                    <form method="post"  class="wow flipInX " data-wow-delay="0.6s" autocomplete="off" onsubmit="return ValidationEvent()">
                                        <!-- start leave -->
                                        <div class="form-group input_block col-sm-6 col-xs-12">

											<input type="text" name="txtstuduname" tabindex="1" class="form-control input_border input-lg" id="txtsuname" placeholder="Student Username" title="Enter Guardian first name" style="color:#c1c1c1; background:transparent;"/>
											
										</div>
										
										<div class="form-group col-sm-6 col-xs-12 input_block">

											<input type="text" name="txtPUname" tabindex="2" class="form-control input_border input-lg" id="txtpuname" placeholder="Parents Username" title="Again enter your password" style="color:#c1c1c1;"/>
											    
										</div>

                                        <div class="form-group input_block col-sm-6 col-xs-12">
                                            <input type="text" name="txtParentName" tabindex="3" class="form-control input_border input-lg" id="txtpname" placeholder="Parents Name"  title="Enter Guardian Last name" style="color:#c1c1c1;"/>
											
                                        </div>
										
                                        <div class="form-group input_block col-sm-6 col-xs-12">
                                            <input type="text" name="txtContact" tabindex="4" class="form-control input_border input-lg" id="pno" placeholder="Contact Number" title="Enter guardian mobile number" style="color:#c1c1c1;"/>
											
                                        </div>
										
										<div class="form-group col-sm-6 col-xs-12 input_block">

											<input type="text" name="txtEmail" tabindex="5" class="form-control input_border input-lg" id="email" placeholder="Email Address" title="Enter guardian email address" style="color:#c1c1c1;"/>
											   
										</div>
										<div class="form-group col-sm-6 col-xs-12 input_block">

											<input type="password" name="txtPassword" tabindex="6" class="form-control input_border input-lg" id="pass" placeholder="Enter Password" title="Enter your Passoword" style="color:#c1c1c1;"/>
											  
										</div>
                                        
                                       <div class="form-group col-sm-6 col-xs-12 input_block">
  
										</div>
								
										<div class="form-group col-sm-6 col-xs-12">        
											<input type="submit" name="btnFinish" value="Add" tabindex="7" class="btn btn-success" style="width:100%; background-color:#ff1616; color:#c1c1c1;"/>&nbsp;
											
										</div>
								
                                        <!-- end leave-->
                                    </form>
                                </div>
                            </div>
							
							<?php
							if(isset($_POST["btnFinish"]))
							{
							$con=  mysqli_connect('localhost','root','','hms');
							
							$sname=$_POST["txtstuduname"];
							$puname=$_POST["txtPUname"];
							$pname=$_POST["txtParentName"];
							
							$email=$_POST["txtEmail"];
							$contac=$_POST["txtContact"];
							
							$pass=$_POST["txtPassword"];
							
							
							
							try
							{
								$query="INSERT INTO `parents_registration_master`(Student_username, Username, ParentsName, Emaild, Contact, Password) VALUES ('$sname','$puname','$pname','$email','$contac','$pass')";
								if ($con->query($query) === TRUE) 
								{
									echo "<script>JSalert(2);</script>";
									//header("Location:WardenHome.html");
								}
								else 
								{
									
									echo "<script>JSalert(1);</script>";
									//header("Location:StudentRegistration.html");
								}

							}
							catch(Exception $e)
							{
								//echo "<script>JSalert(0);</script>";
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
