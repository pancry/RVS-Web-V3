<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="You can provide your valuable feedback here by filling a simple online form or by mailing us at contact@rvsoftwares.com">
    <meta name="author" content="">
    <link rel="icon" href="./images/favicon.ico">

    <title>RV Softwares-Help us Serve you better</title>

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
	<script src='https://www.google.com/recaptcha/api.js'></script>	
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


<script type="text/javascript" language="javascript">
function enableBtn(){
	$('button').prop('disabled', false);
}
</script>
<script type="text/javascript" language="javascript">
function validateform(){
	
	var captcha_response = grecaptcha.getResponse();
	if(captcha_response.length == 0)
	{
       // document.getElementById('help-block').innerHTML="You can't leave Captcha Code empty"; 
	    return false;
	}
	else
	{ 
        //document.getElementById('help-block').innerHTML="Captcha completed";
	    return true;
	}
}

</script>

<script>
	$(document)
			.ready(
					function() {
						
					    
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


<a id="Feedback">&nbsp;</a>

<div class="container">
<div class="col-sm-2"><p>&nbsp;</p></div>
<div class="col-sm-8">

  <form class="well form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateform();" method="post" id="contact_form">

    <fieldset>

		<!-- Form Name -->
		<legend class="section-heading-font">Feedback!!</legend>
		<h5 class="paragraph-content-font" style="margin-bottom: 20px">Thanks for choosing to share your valuable feedbacks with us.</h5>

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
			<label class="col-md-4 control-label"></label>
			<div class="col-md-4 inputGroupContainer">
				<div class="g-recaptcha" data-sitekey="6LeZ3RYTAAAAACoQg6MRcxH930-egrO3VLQE3Dmz" data-callback="enableBtn" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
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
				<button  type="submit" class="btn btn-warning">
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

<!-- Start Semi Footer -->
<div class="panel-footer">
    <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs" align="left">
             <h5 class="semifooter-heading-font">Quick Links</h5>
                <a href="feedback.php" class="semifooter-font">FEEDBACK</a>
				<span class="semifooter-font">&nbsp;&nbsp;</span>
                <a href="contact.php" class="semifooter-font">ENQUIRY</a>
				<span class="semifooter-font">&nbsp;&nbsp;</span>
                <a href="careers.html" class="semifooter-font">CAREERS</a>
         </div>
         <div class="hidden-lg hidden-md hidden-sm col-xs-12" align="center">
             <h5 class="semifooter-heading-font">Quick Links</h5>
                <a href="feedback.html" class="semifooter-font">FEEDBACK</a>
				<span class="semifooter-font">&nbsp;&nbsp;</span>
                <a href="contact.php" class="semifooter-font">ENQUIRY</a>
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
            <a href="https://www.linkedin.com/in/pankaj-kumar-0ba582114" target="_blank"><img src="./images/linkedin.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="https://www.facebook.com/RV-Softwares-233764473629696/?view_public_for=233764473629696" target="_blank"><img src="./images/fb.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="https://twitter.com/RVSoftwares" target="_blank"><img src="./images/twitter.png" width="25px" height="25px"/></a>
         </div>
         <div class="hidden-lg hidden-md hidden-sm col-xs-12" align="center">
          <h5 class="semifooter-heading-font">Stay Connected</h5>
            <a href="https://www.linkedin.com/in/pankaj-kumar-0ba582114" target="_blank"><img src="./images/linkedin.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="https://www.facebook.com/RV-Softwares-233764473629696/?view_public_for=233764473629696" target="_blank"><img src="./images/fb.png" width="25px" height="25px"/></a>
			<span class="semifooter-font">&nbsp;&nbsp;</span>
            <a href="https://twitter.com/RVSoftwares" target="_blank"><img src="./images/twitter.png" width="25px" height="25px"/></a>
         </div>

       </div>
    </div>
</div>
<!-- End Semi Footer -->

<!-- Start Footer -->
<footer class="footer-custom">
  <div class="container">
    <p class="copyright" align="center">&copy; 2016 <a href="http://www.rvsoftwares.com">RV Softwares</a> All rights reserved.</p>
  	<p class="footer-font" align="center">This website is best experienced on Chrome 31, Firefox 26, Safari 6 or Internet Explorer 9; or later versions of these browsers.</p>
  </div>  
</footer>
<!-- Start Footer -->

<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$phone = $company = $name = $email = $comment = "";
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


	
	$to = "contact@rvsoftwares.com";
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
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>



</body>
</html>