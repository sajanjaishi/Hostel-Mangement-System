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
        <title>Warden | Complain</title>

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.js"></script>
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
		<script src="js/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="css/sweetalert.css">
        <link rel="stylesheet" href="css/animate.min.css" />
        <script>wow = new WOW({}).init();</script>
        <link  type="text/css" href="css/main.css" rel="stylesheet"/>

		<link rel="stylesheet" href="css/sweetalert.css">
        <link  type="text/css" href="css/main.css" rel="stylesheet"/>
		
		<script>
			function JSalert(isConfirm){    
        if (isConfirm==2) 
    {   
	setTimeout(function() {
        swal({
            title: "Complain Accpect Successfull!",
            //text: "Message!",
            type: "success"
        }, function() {
            window.location = "ViewComplain.php";}
    , 10);
	});
			}
			
        else if(isConfirm==1) {     
            swal("Error", "Leave Not Accepted", "error");   
            }
		
		
}
		</script>
    </head>
	<?php
	$id=@$_REQUEST["cid"];
			$pre=@$_REQUEST["cre"];

			$con= mysqli_connect('localhost','root','','hms');
			if( $id!=NULL && $pre!=Null )
			{	
				$query="update complain set ComplainStatus='A',Action='$pre' where ComplainID='$id'";
				if ($con->query($query) === TRUE) 
				{
					echo "<script>JSalert(2);</script>";
					//@header("Location:ViewLeave.php");
				}
				else 
				{
					echo "<script>JSalert(1);</script>";
					//@header("Location:StudentRegistration.html");
				}

			}
	?>
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
                <h2 class="heading_underline_effect_a heading_underline_effect1 text-center" style="color:#c1c1c1;">Complain module</h2><hr/>
                  
                <div class="tab-content">

                    <div class="">

                        <div class="profile_block_heading">
                            <span>Complain</span>
                        </div>

                        <div class="row">

<?php
							
								$con=  mysqli_connect('localhost','root','','hms');
								//$uname=$_SESSION["username"];
								$query="select * from complain ";
								echo "<table class='table wow flipInX' data-wow-delay='0.6s' style='color:white;'>";
								echo "<tr style='background-color:#ff1616;'><th>Index</th><th>Student Name</th><th>Reason</th><th>Complain status</th><th>Complain Date</th><th>Subject</th><th>Action</th></tr>";
								$i=0;
							if($result= $con->query($query))
							{
								while($row = $result->fetch_assoc())
								{
									$i++;
									echo "<tr><td>".$i."</td><td>".$row["username"]."</td><td>".$row["Reason"]."</td><td>".$row["ComplainStatus"]."</td><td>".$row["ComplainDate"]."</td><td>".$row["subject"]."</td>";
									$cid=$row["ComplainID"];	
									
									if($row["ComplainStatus"]=="P")
									{
								
									 echo "<td><a href='ViewComplain.php?cid=".$cid."&cre=Accepted' id='$i' value='".$cid."'>Response</a></td>";
									}
									else if($row["ComplainStatus"]=="A")
									{
										
									 echo "<td>".$row["Action"]."</td>";
									
									}
									else{echo "<td>-</td>";}
									echo "</tr>";
								}
								
							}
							?>
								</table>

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
