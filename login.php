<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_POST["btnLogin"]))
{
	
	$con=  mysqli_connect('localhost','root','','hms');
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$uname=$_POST["txtUsername"];
	$pass=$_POST["txtPassword"];
	$ltype=$_POST["logType"];
	if($ltype=="Admin")
	{
		if($uname=="admin123" && $pass=="admin123")
		{
		
			$_SESSION["username"]=$uname;
			header("Location:warden/WardenHome.php");
			
		}
		else
		{
			echo "<script>alert('Username And Password Wrong!!!!!!!!!');</script>";
		}
	}	
	else if($ltype=="Parent")
	{
		$query="select * from parents_registration_master where Username='$uname' and Password='$pass'";
		if($result= $con->query($query))
		{
			if($row = $result->fetch_assoc())
			{
				$_SESSION["username"]=$uname;
				header("Location:parents/ParentsHome.php");
				
			}
			else
			{
				echo "<script>alert('Username And Password Wrong!!!!!!!!!');</script>";
			}
			
		}
	}
	
	else if($ltype=="Student")
	{
		$query="select * from student_registration_master where Username='$uname' and Password='$pass'";
		if($result= $con->query($query))
		{
			if($row = $result->fetch_assoc())
			{
				
				$_SESSION["username"]=$uname;
				header("Location:students/StudentHome.php");
				
			}
			else
			{
				echo "<script>alert('Username And Password Wrong!!!!!!!!!');</script>";
			}
			
		}
	}
	else
	{
		header("Location:login.php");
	}
	}
?>
    <head>
        
        <title>Hostel | Login</title>

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.js"></script>
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <link rel="stylesheet" href="css/animate.min.css" />
		<link rel="stylesheet" href="css/circle.css" />
        <script>wow = new WOW({}).init();</script>
        <link  type="text/css" href="css/main.css" rel="stylesheet"/>
		
        <script>
            $(document).ready(function () {
                //$("#fadeout").stop(5000);
                $("#fadeout").delay(5000).fadeOut();

            });
			
        </script>


    </head>
    <body style="background-color:#011330;">

		<div>
	
		<div class="logblock">
		<div class="container-fluid">
		
		
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 header_block">
                </div>

                <div class="col-lg-7 col-xs-0 col-sm-2 col-md-4">

                </div>
                <div class="col-lg-4 col-xs-12 col-sm-9 col-md-7">


                    <div class="login_heading wow flipInY" data-wow-delay="0.2s">
                        Login
                    </div>
                    <div class="login_main_block">

						
                        <form method="post" class="wow flipInX" data-wow-delay="0.6s" autocomplete="off">
                            <div class="form-group input_block"><br/>

                                <input type="text" class="form-control input-lg input_border" id="txtUsername" name="txtUsername" title="Please enter your username" placeholder="Username" style="color:#ff1616;" required/>
                                
                            </div>
                            <div class="form-group input_block">

                                <input type="password" class="form-control input-lg input_border" id="txtPassword" name="txtPassword" title="Please enter your password" placeholder="Password" style="color:#ff1616;" required/>
                                
                            </div>
							
							<div class="form-group input_block">

                                <select name="logType" class="form-control input_border_leave input-lg" id="logType" style="color:#c1c1c1;" required>
												<option value="" style="color:#011330;"/>--Select Type--
												<option value="Admin" style="color:#011330;"/>Admin
												<option value="Parent" style="color:#011330;"/>Parent
												<option value="Student" style="color:#011330;"/>Student
											</select>
                                
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-toolbar form-control input-lg" id="btnLogin" name="btnLogin" value="LOGIN" style="color:#c1c1c1; background-color:#ff1616;"/>
                            </div>
							
                            <div class="checkbox input_block input-lg" style="color:#ff1616;"">
                                
                                
                                <center> <br/>
                                    
									<a href="index.html" style="color:#ff1616;">Back To Home</a>
                                </center>
                            </div>
                        </form>

                    </div>
                </div>
                
            </div>
        </div>
		
	</div>
	
	
	
        <div class="container">
            <div class="container__item landing-page-container">
                <div class="content__wrapper">

                    <div class="ellipses-container">
                        
                        <h1 class="greeting elegantshd">
                            <br/>WelCome<br /><br/>Hostel<br/><br/>Of<br/><br/>Acharya</h1>
							
                        <div class="ellipses ellipses__outer--thick"></div>
						
                    </div>
					
                   
                </div>

            </div>
			 
        </div>
		 
	</div>
	
         
    </body>
</html>
