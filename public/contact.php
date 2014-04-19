<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="cssreset.css">
<link rel="stylesheet" type="text/css" href="cssforall.css">
<link rel="stylesheet" type="text/css" href="contactus.css">
<title>Dixie Street Storage - Contact Page</title>
</head>
<body>
<!--Contact Form-->
	<form name="contact" action="mailto:foreverb90@hotmail.com" method="post" enctype="text/plain">
		<fieldset>
			<legend>Contact us&#58;</legend>
			<div class="dss">
			<img id="dssunits" src="dixie_street_storage.jpg" alt="Dixie Street Storage Units">
			</div>
			<p id="firstname">
				<label for="firstname">First Name&#58;</label><br>
				<input type="text" name="firstname" class="formfield" id="firstname" placeholder="Enter first name here&hellip;" required>
			</p>
			<p>
				<label for="lastname">Last Name&#58;</label><br>
				<input type="text" name="lastname" class="formfield" id="lastname" placeholder="Enter last name here&hellip;">
			</p>
			<p>
				<label for="email">&#42;E&#150;mail&#58;</label><br>
				<input type="email" name="email" class="formfield" id="email" placeholder="Enter e&#150;mail here&hellip;" required>
			</p>
			<p>
				<label for="phone">&#42;Phone Number&#58;</label><br>
				<input type="tel" name="phone" class="formfield" id="phone" placeholder="Example&#58; 555-555-5555">
			</p>
			<p id="message">
				<label for="message">Message&#58;</label><br>
				<textarea rows="5" cols="60" placeholder="Please enter a brief message here&hellip;" required></textarea>
			</p>
			<div id="submit">
				<input type="submit" value="Submit">
			</div>
			<p id="disclaimer">&#42;Dixie Street Storage does not sell or share your information with outside vendors and only uses your personal information for the purpose of contacting you regarding our services.</p>
		</fieldset>
	</form>
</body>
</html>