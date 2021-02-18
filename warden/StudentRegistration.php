<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
<script>  
/***function ValidationEvent() {
// Storing Field Values In Variables
var name = document.getElementById("txtFirstName").value;
if (name != '')
{
	var myClock = document.getElementById('clock');
	var displaySetting = myClock.style.display;
	if (displaySetting == 'none') {
      // clock is visible. hide it
      myClock.style.display = 'block';
	  )
else
{
	var msg="Enter Name ............."
	var myClock = document.getElementById('clock');
	var displaySetting = myClock.style.display;
	 if (displaySetting == 'block') {
      // clock is visible. hide it
      myClock.style.display = 'none';
	document.getElementById("namemsg").innerHTML+=msg;
	//alert("Enter First Name");
}***/
function ValidationEvent() {
// Storing Field Values In Variables
//var name = document.getElementById("txtFirstName").value;

		var uname=document.getElementById("txtUsername").value;
		var fname=document.getElementById("txtFirstName").value;
		var email=document.getElementById("txtStudEmail").value;
	var contac=document.getElementById("txtStudContact").value;
	var peradd=document.getElementById("txtPermanentAddress").value;
	var poadd=document.getElementById("txtPostalAddress").value;
	var pass=document.getElementById("txtStudentPassword").value;			
	var catagory = document.getElementById("ddcategory").options[document.getElementById("ddcategory").selectedIndex].text;
	 var course=document.getElementById("ddCourse").options[document.getElementById("ddCourse").selectedIndex].text;
	var sem=document.getElementById("ddSemester").options[document.getElementById("ddSemester").selectedIndex].text;
	var gen=document.getElementById("ddGender").options[document.getElementById("ddGender").selectedIndex].text;
		var date=document.getElementById("txtDOB").value;
		if (uname == '')
			alert("Enter User name....");
		else if (fname == '')
			alert("Enter First Name....");
		else if (catagory == '--Select Category--'){
			alert("Enter Category....");
		}
		else if (course == '--Select Course--')
			alert("Enter Course....");
		else if (sem == '--Select Semester--')
			alert("Enter Sem....");
		else if (gen == '--Gender--')
			alert("Enter Gen....");
		else if(date==''){
			alert("Enter Date.....")	
		}
		else if (email == '')
			alert("Enter Email....");
		else if (contac == '')
			alert("Enter Contat....");
		else if (peradd == '')
			alert("Enter Perment Address....");
		else if (poadd == '')
			alert("Enter Postal Address....");
		else if (pass == '')
			alert("Enter Passoword....");
if (/^([A-Za-z0-9_\-\.])+\@([ahcarya])+\.(ac)+\.(in)$/. test("email"))  {
		}
		else{
			alert("Your email should be  [anything]@ahcarya.ac.in format.");
		}
}

  </script>
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
            title: "Registration Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "WardenHome.php";}
    , 10);
	});
			}
        else if(isConfirm==1 && uname=!'' && catagory=!'' &&course=!'' && sem=!'' && gen=!'' && dob=!'' && email=!'' && contac=!'' && peradd=!'' && poadd=!'' && pass=!'' && pass=!'' && rdate=!'' ) {     
            swal("Error", "Registration Not Successfull!", "error");   
            }
}        </script>
		
		
        <script>
            $(document).ready(function () {
                //$("#fadeout").stop(5000);
                $("#fadeout").delay(5000).fadeOut();

            });
			

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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Student Registration</h2><hr/>
				
                <br/>   
                <div class="tab-content">
                    <div id="applyLeave" class="tab-pane fade in active">
                        <div class="">
                            <div class="profile_block_heading">
                                <span>Add Student</span>
                            </div>
                            <div class="row background_image_block">
                                <div class="col-md-0.5 row">


                                </div>
                                <div class="login_main_block col-md-12">

                                    <form method="post"   class="wow flipInX " data-wow-delay="0.6s" autocomplete="off" onsubmit="return ValidationEvent()">
                                        <!-- start leave -->
                                        <div class="form-group input_block col-sm-4 col-xs-12">

											<input type="text" name="txtUsername" id="txtUsername" class="form-control input_border input-lg" placeholder="Student Username" title="Enter student enrollment number that is provided by University" style="color:#c1c1c1; background:transparent;" />
											
										</div>

                                        <div class="form-group input_block col-sm-4 col-xs-12">
                                            <input type="text" name="txtFirstName" id="txtFirstName" class="form-control input_border input-lg"  placeholder="Full Name" title="Enter your first name" style="color:#c1c1c1;"   />
											<b id="clock" style="color:red">*</b>
                                        </div>
										
                                        <div class="form-group input_block col-sm-4 col-xs-12">
                                            <select name="ddcategory" id="ddcategory" class="form-control input_border  input-lg" title="Select Gender" style="color:#c1c1c1;" >
												<option value="" style="color:#011330;"/>--Select Category--
												<option value="Sc" style="color:#011330;">Sc
												<option value="St" style="color:#011330;">St
												<option value="Obc" style="color:#011330;">Obc
												<option value="General" style="color:#011330;">General
											</select>
											
                                        </div>
										
										<div class="form-group col-sm-4 col-xs-12 input_block">

											<select name="ddCourse" id="ddCourse" class="form-control input_border input-lg" title="Select your course which you are pursuing" style="color:#c1c1c1;" >
												<option value=""/>--Select Course--
												<option value="Bca" style="color:#011330;">Bca
												<option value="Mca" style="color:#011330;">Mca
												<option value="Mba" style="color:#011330;">Mba
											</select>   
											   
										</div>
										<div class="form-group col-sm-4 col-xs-12 input_block">

											<select name="ddSemester" id="ddSemester" class="form-control input_border input-lg" title="Select your Semester" style="color:#c1c1c1;" >

												<option value=""/>--Select Semester--
												<option value="1" style="color:#011330;">1
												<option value="2" style="color:#011330;">2
												<option value="3" style="color:#011330;">3
												<option value="4" style="color:#011330;">4
												<option value="5" style="color:#011330;">5
												<option value="6" style="color:#011330;">6
											</select>
											   
										</div>
										
										<div class="form-group col-sm-4 col-xs-12 input_block">

											<select name="ddGender" id="ddGender" class="form-control input_border  input-lg" title="Select Gender" style="color:#c1c1c1;" >
												<option value="" style="color:#011330;"/>--Gender--
												<option value="Male" style="color:#011330;">Male
												<option value="Female" style="color:#011330;">Female
												<option value="Other" style="color:#011330;">Other
											</select>
											    
										</div>
                                        
                                        <div class="form-group col-sm-4 col-xs-12 input_block">

											<input type="text" name="txtDOB"   id="txtDOB" class="form-control input_border input-lg"  placeholder="Date of Birth (YYYY-MM-DD)" max="2000-01-01" title="Select your date of birth" style="color:#c1c1c1;" />
											   
										</div>
										<div class="form-group col-sm-4 col-xs-12  input_block">

											<input type="text" name="txtStudEmail" id="txtStudEmail" class="form-control input_border input-lg" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Student Email Address" title="Enter your registered email address" style="color:#c1c1c1;" />
											
										</div>
										<div class="form-group col-sm-4 col-xs-12  input_block">

											<input type="text" name="txtStudContact" id="txtStudContact" class="form-control input_border input-lg" pattern="^\d{10}$" placeholder="Student Contact Number" title="Enter student mobile number" style="color:#c1c1c1;" />
											
										</div>
										<div class="form-group col-sm-6 col-xs-12  input_block">

											<input type="text" name="txtPermanentAddress"id="txtPermanentAddress" class="form-control input_border input-lg" placeholder="Permanent Address" title="Enter your permanent address" style="color:#c1c1c1;" />
											 
										</div>
										
										<div class="form-group col-sm-6 col-xs-12  input_block">

											<input type="text" name="txtPostalAddress" id="txtPostalAddress" class="form-control input_border input-lg" placeholder="Postal Address" title="Enter your permanent address" style="color:#c1c1c1;" />
											 
										</div>

										<div class="form-group col-sm-6 col-xs-12 input_block">

											<input type="password" name="txtStudentPassword" id="txtStudentPassword" class="form-control input_border input-lg"  placeholder="Student Password" title="Enter your Passoword" style="color:#c1c1c1;" />
											  
										</div>
								
										<div class="form-group col-sm-6 col-xs-12">        
											<input type="submit" name="btnRegister" value="Add" class="btn btn-success input-lg" style="width:49%; background-color:#ff1616; color:#c1c1c1; border:#c1c1c1;"/>  
											<p id="namemsg" style="color:red">hj</p>
										</div>
								
                                        <!-- end leave-->
                                    </form>
                                </div>
                            </div>
								
								<?php
								if(isset($_POST["btnRegister"]))
								{
	$con=  mysqli_connect('localhost','root','','hms');
	
	
	$uname=$_POST["txtUsername"];
	$fname=$_POST["txtFirstName"];
	$catagory=$_POST["ddcategory"];
	$course=$_POST["ddCourse"];
	$sem=$_POST["ddSemester"];
	$gen=$_POST["ddGender"];
	$dob=$_POST["txtDOB"];
	$email=$_POST["txtStudEmail"];
	$contac=$_POST["txtStudContact"];
	$peradd=$_POST["txtPermanentAddress"];
	$poadd=$_POST["txtPostalAddress"];
	$pass=$_POST["txtStudentPassword"];
	$rdate=date("Y-m-d");

	try
	{
		$query="INSERT INTO `student_registration_master`(Username, Fullname, Category, PermanentAddress, PostalAddress, Contact, Semester, Course, Gender, BirthDate, EmailID, Password, RegistrstionDate) VALUES ('$uname','$fname','$catagory','$peradd','$poadd','$contac',$sem,'$course','$gen','$dob','$email','$pass','$rdate')";
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
<!--<input type="date"  min="1945-01-31" max="2021-01-31" value="1998-06-01" name="txtDOB"   id="txtDOB" class="form-control input_border input-lg"  placeholder="Date of Birth (YYYY-MM-DD)" max="2000-01-01" title="Select your date of birth" style="color:#c1c1c1;" />
-->s