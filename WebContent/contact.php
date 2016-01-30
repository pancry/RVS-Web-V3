<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./images/favicon.ico">

    <title>R V Softwares-Realize your Vision</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="./css/custom.css" rel="stylesheet">

    <!-- Bootstrap extended CSS -->
    <link rel='stylesheet prefetch' href='./css/bootstrapValidator.min.css'>
    <link rel='stylesheet prefetch' href='./css/bootstrap-theme.css'>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./js/jquery.min.js"><\/script>')</script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/modernizr.js" type="text/javascript"></script>
    <script src='./js/bootstrapvalidator.min.js'></script>

<style>
#success_message {
	display: none;
}

body {
	padding-top: 50px;
}
/* changed from 70px to 50 px */
</style>


</head>

<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$phone = $company = $name = $email = $comment = $aoinameval = $aoiname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["mail"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["mail"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   } 

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }


   if (empty($_POST["company"])) {
     $company = "";
   } else {
     $company = test_input($_POST["company"]);
   }

   if (empty($_POST["phone"])) {
     $phone = "";
   } else {
     $phone = test_input($_POST["phone"]);
   }

	$aoiname = $_POST['aoi'];
	if(isset($_POST['aoi'])) {
		//echo "You chose the following Area of Interest(s): <br>";
		//foreach ($aoiname as $aoi){
		//	$aoinameval =  $aoinameval.",".$aoi;
		//}
		foreach($aoiname as $selected){
			if(empty($aoinameval)){
				$aoinameval =  $selected;
			}else{
				$aoinameval =  $aoinameval.", ".$selected;
			}
			
		}
	}

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<script>
$(document).ready(function() {
    $('#contact_form').formValidation({
        ...
        addOns: {
            reCaptcha2: {
                element: 'captchaContainer',
                theme: 'light',
                siteKey: '6LdgOwETAAAAALA9auuNVKFeXizXcYFrKOVC_vs-',
                timeout: 120,
                message: 'The captcha is not valid'
            }
        },
        fields: {
            ...
            'g-recaptcha-response': {
                err: '#captchaMessage'
            }
        }
    });
});
</script>

<script>
	$(document)
			.ready(
					function() {
						
						 // Generate a simple captcha
					    function randomNumber(min, max) {
					        return Math.floor(Math.random() * (max - min + 1) + min);
					    }
					    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

					    
					    
						$('#contact_form')
								.bootstrapValidator(
										{
											feedbackIcons : {
												valid : 'glyphicon glyphicon-ok',
												invalid : 'glyphicon glyphicon-remove',
												validating : 'glyphicon glyphicon-refresh'
											},
											fields : {
												name : {
													validators : {
														stringLength : {
															min : 2,
														},
														notEmpty : {
															message : 'Please enter your name'
														}
													}
												},
												mail : {
													validators : {
														notEmpty : {
															message : 'Please enter your email address'
														},
														emailAddress : {
															message : 'Please enter a valid email address'
														}
													}
												},
												phone : {
													validators : {
														notEmpty : {
															message : 'Please enter your phone number'
														},
													}
												},
												captcha: {
									                validators: {
									                    callback: {
									                        message: 'Wrong answer',
									                        callback: function(value, validator, $field) {
									                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
									                            return value == sum;
									                        }
									                    }
									                }
									            },
												comment : {
													validators : {
														stringLength : {
															max : 200,
															message : 'Please enter feedback no more than 200 char'
														},
														notEmpty : {
															message : 'Please enter your feedback'
														}
													}
												}
											}
										})
								.on(
										'success.form.bv',
										function(e) {
											$('#success_message').slideDown({
												opacity : "show"
											}, "slow") // Do something ...
											$('#contact_form').data(
													'bootstrapValidator')
													.resetForm();
											// Prevent form submission
											e.preventDefault();
											// Get the form instance
											var $form = $(e.target);
											// Get the BootstrapValidator instance
											var bv = $form
													.data('bootstrapValidator');
											// Use Ajax to submit form data
											$.post($form.attr('action'), $form
													.serialize(), function(
													result) {
												console.log(result);
											}, 'json');
										});
					});
</script>

<body data-spy="scroll" data-target=".navbar" data-offset="70">

	<div class="container">

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span> 
						<span class="icon-bar"></span> <span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">
						<img src="./images/logo.png" />
					</div>
					<div class="navbar-brand">
						<img src="./images/name.png" />
					</div>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">HOME</a></li>
						<li><a href="about.html">ABOUT US</a></li>
						<li class="active"><a href="contact.php">CONTACT</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->

			</div>
		</nav>
	</div>

<img class="img-responsive" src="./images/contact.jpg"/>


	<div class="container">

		<!-- START Contact Mails -->
		<div class="row">
			<div class="col-sm-6">
				<p>&nbsp;</p>
				<h2 class="section-heading-font">Sales</h2>
				<p class="paragraph-content-font">To know about doing business
					with R V Softwares, contact our sales team.</p>
				<a href="mailto:sales@rvsoftwares.com"
					class="paragraph-content-font-maillink">sales@rvsoftwares.com</a>
				<p>&nbsp;</p>
			</div>
			<div class="col-sm-6">
				<p>&nbsp;</p>
				<h2 class="section-heading-font">Support</h2>
				<p class="paragraph-content-font">We are available 24/7 to
					support our customers. Approach us if you need any support.</p>
				<a href="mailto:support@rvsoftwares.com"
					class="paragraph-content-font-maillink">support@rvsoftwares.com</a>
				<p>&nbsp;</p>

			</div>
		</div>
		<!-- End Contact Mails -->
    </div>

<a id="QuickContact">&nbsp;</a>

<div class="container">
<div class="col-sm-2"><p>&nbsp;</p></div>
<div class="col-sm-8">

  <form class="well form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 	method="post" id="contact_form">

    <fieldset>

		<!-- Form Name -->
		<legend class="section-heading-font">Quick Contact !!</legend>
		<h5 class="paragraph-content-font" style="margin-bottom: 20px">Want	us to contact you? Please fill the below form.</h5>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">Name</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon">
					  <i class="glyphicon glyphicon-user"></i>
					</span> 
					<input name="name" placeholder="Name" class="form-control" type="text" value="<?php echo $name;?>"/>
				</div>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">E-Mail</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon">
					  <i class="glyphicon glyphicon-envelope"></i>
     			    </span> 
					<input name="mail" placeholder="E-Mail Address" class="form-control" type="text" value="<?php echo $email;?>"/>
				</div>
			</div>
		</div>


		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">Phone #</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon">
					  <i class="glyphicon glyphicon-earphone"></i>
				    </span> 
				    <input name="phone"	placeholder="Phone Number" class="form-control" type="text" value="<?php echo $phone;?>"/>
				</div>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label">Company Name</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon">
					  <i class="glyphicon glyphicon-home"></i>
					</span> 
					<input name="company" placeholder="Company Name" class="form-control" type="text" value="<?php echo $company;?>" />
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Area of Interest</label>
			<div class="col-md-8">
		    	<div class="checkbox">
			    	<label class="checkbox-inline col-md-8">
						<input type="checkbox" name="aoi[]" id="aoi" value="E-Commerce"> E-Commerce
					</label>
					<br>
					<label class="checkbox-inline col-md-8">
					  	<input type="checkbox" name="aoi[]" id="aoi" value="BI & DWH"> BI & DWH
					</label>
					<br>
					<label class="checkbox-inline col-md-8">
					  	<input type="checkbox" name="aoi[]" id="aoi" value="Big Data, Cloud & Analytics"> Big Data, Cloud & Analytics
					</label>
					<br>
					<label class="checkbox-inline col-md-8">
					  	<input type="checkbox" name="aoi[]"  id="aoi" value="Location Based Services"> Location Based Services
					</label>
					<br>
					<label class="checkbox-inline col-md-8">
					  	<input type="checkbox" name="aoi[]" id="aoi" value="Mobile App Development"> Mobile App Development
					</label>
					<br>
					<label class="checkbox-inline col-md-8">
					  	<input type="checkbox" name="aoi[]" id="aoi" value="Others"> Others
					</label>
		    	</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-4 control-label">Feedback</label>
			<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="glyphicon glyphicon-pencil"></i>
					</span>
					<textarea class="form-control" name="comment" placeholder="Feedback" value="<?php echo $comment;?>"></textarea>
				</div>
			</div>
		</div>


		 <div class="form-group">
		        <label class="col-md-4 control-label" id="captchaOperation"></label>
		        <div class="col-md-4 inputGroupContainer">
		            <input type="text" class="form-control" name="captcha" />
		        </div>
		    </div>
		    
		<!-- Success message -->
		<div class="alert alert-success" role="alert" id="success_message">
			Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.
		</div>

		<!-- Button -->
		<div class="form-group">
			<label class="col-md-4 control-label"></label>
			<div class="col-md-4">
				<button type="submit" class="btn btn-warning">
					Send 
					<span class="glyphicon glyphicon-send"></span>
				</button>
			</div>
		</div>

	</fieldset>
  </form>
</div>
<div class="col-sm-2"><p>&nbsp;</p></div>
</div>
<!-- /.container -->

	<div class="container">
		<div class="section-header">
			<h2 class="section-heading-font">Our Locations</h2>
		</div>
		<div class="section-header">
			<h3 class="section-heading-font">United States</h3>
		</div>

  <div class="row">
    <div class="col-sm-6">
	    <p>&nbsp;</p>
	    <h3 class="section-heading-font">Florida</h3>
		<p class="paragraph-content-font"><b>R V Softwares Inc.</b></p>
		<p class="paragraph-content-font">5261 NW 90th Terrace, Coral Springs, FL - 33067</p>
		<p class="paragraph-content-font">Office Phone: +1 (954)-507-6098</p>
	</div>
    <div class="col-sm-6">
        <iframe align="right" src="contact_1.html" width="400px" height="250px">
           <p>Your browser does not support iframes, please update!</p>
        </iframe>
	</div>  
  </div>

  <div class="section-header">
    <h3 class="section-heading-font">India</h3>
  </div>
  <div class="row">
    <div class="col-sm-6">
	    <p>&nbsp;</p>
	    <h3 class="section-heading-font">Bangalore</h3>
		<p class="paragraph-content-font"><b>R V Softwares Pvt. Ltd.</b></p>
		<p class="paragraph-content-font">#24, 1st Cross, Near SGR Dental College, Munekolala, Marathalli, Bangalore - 560037</p>
		<p class="paragraph-content-font">Office Phone: +91 (80)-32-92-1792</p>
	</div>
    <div class="col-sm-6">
        <iframe align="right" src="contact_2.html" width="400px" height="250px">
           <p>Your browser does not support iframes, please update!</p>
        </iframe>
	</div>
    <span class="paragraph-content-font">&nbsp;</span>
  </div>

</div>


<!-- Start Semi Footer -->
<div class="panel-footer">
    <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs" align="left">
             <h5 class="semifooter-heading-font">Quick Links</h5>
                <a href="feedback.html" class="semifooter-font">FEEDBACK</a>
				<span class="semifooter-font">&nbsp;&nbsp;</span>
                <a href="contact.html#QuickContact" class="semifooter-font">ENQUIRY</a>
				<span class="semifooter-font">&nbsp;&nbsp;</span>
                <a href="careers.html" class="semifooter-font">CAREERS</a>
         </div>
         <div class="hidden-lg hidden-md hidden-sm col-xs-12" align="center">
             <h5 class="semifooter-heading-font">Quick Links</h5>
                <a href="feedback.html" class="semifooter-font">FEEDBACK</a>
				<span class="semifooter-font">&nbsp;&nbsp;</span>
                <a href="contact.html#QuickContact" class="semifooter-font">ENQUIRY</a>
				<span class="semifooter-font">&nbsp;&nbsp;</span>
                <a href="careers.html" class="semifooter-font">CAREERS</a>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs" align="center">
             <h5 class="semifooter-heading-font">Call us on:</h5>
	         <span class="semifooter-font">+1 (954)-507-6098</span>
         </div>
         <div class="hidden-lg hidden-md hidden-sm col-xs-12" align="center">
             <h5 class="semifooter-heading-font">Call us on:</h5>
	         <span class="semifooter-font">+1 (954)-507-6098</span>
         </div>
         
         <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs" align="right">
          <h5 class="semifooter-heading-font">Stay Connected</h5>
            <a href="#"><img src="./images/linkedin.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="#"><img src="./images/fb.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="#"><img src="./images/twitter.png" width="25px" height="25px"/></a>
         </div>
         <div class="hidden-lg hidden-md hidden-sm col-xs-12" align="center">
          <h5 class="semifooter-heading-font">Stay Connected</h5>
            <a href="#"><img src="./images/linkedin.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="#"><img src="./images/fb.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="#"><img src="./images/twitter.png" width="25px" height="25px"/></a>
         </div>

       </div>
    </div>
</div>
<!-- End Semi Footer -->

<!-- Start Footer -->
<footer class="footer-custom">
  <div class="container">
    <p class="copyright" align="center">&copy; 2016 <a href="http://www.rvsoftwares.com">R V Softwares</a> All rights reserved.</p>
  	<p class="footer-font" align="center">This website is best experienced on Chrome 31, Firefox 26, Safari 6 or Internet Explorer 9; or later versions of these browsers.</p>
  </div>  
</footer>
<!-- Start Footer -->


<?php

$to = "pancry@gmail.com";
$subject = "Contact Us";


$message =  "<html>
<head>
<title>Contact Us</title>
</head>
<body>	
<div style=\"font-family:sans-serif,Arial,Verdana,'Trebuchet MS';font-size:13px;color:rgb(51,51,51);background-color:rgb(255,255,255);margin-top:20px;margin-right:20px;margin-bottom:20px;margin-left:20px;line-height:1.6em\">
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">Dear Admin,</span></span></span></div>
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\">&nbsp;</div>
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">You got a mail from Customer $name !!!</span></span></span></div>
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\">&nbsp;</div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\">&nbsp;</div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\"><strong><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">Area of Interest</span></span></span></strong></div>
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">$aoinameval <br>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\">&nbsp;</div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\"><strong><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">Comment</span></span></span></strong></div>
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">$comment <br>
</span></span></span></div>
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\">&nbsp;</div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\">&nbsp;</div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">Thanks&nbsp;</span></span></span></div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">$name</span></span></span></div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">Phone: $phone</span></span></span></div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">EmailId: $email</span></span></span></div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">Company: $company</span></span></span></div>
<div style=\"margin-bottom:0.0001pt;line-height:19.2pt;background-image:initial;background-color:white\">&nbsp;</div>
<div style=\"line-height:19.2pt;background-image:initial;background-color:white\"><span style=\"color:rgb(34,34,34)\"><span style=\"font-family:arial,sans-serif\"><span style=\"font-size:11.5pt\">This mail is sent via RV Softwares</span></span></span></div>
<div>&nbsp;</div>
</div>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <contactus@rvsoftwares.com>' . "\r\n";
//$headers .= "From: <$email>" . "\r\n";

mail($to,$subject, $message ,$headers);

?>



</body>
</html>