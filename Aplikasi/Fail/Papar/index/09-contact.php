<?php
//include('config.php');
$url = URL . 'sumber/rangka-dawai/w3-event-venue/';
include 'atasbawah/diatas.php';
echo "\n";
?>
<!-- banner -->
<div class="banner">
<!-- start header -------------------------------------------------------------------------- -->
	<div class="header">
		<div class="container">
			<div class="header-left">
				<div class="w3layouts-logo">
					<h1><a href="index.php">Booth <span>Convocation</span></a></h1>
				</div>
			</div>
			<div class="top-nav"><?php
echo "\n"; include 'atasbawah/menubar.php'; echo "\n"; ?></div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- end header -------------------------------------------------------------------------- -->
<!-- start agileinfo-top-heading-------------------------------------------------------- -->
	<div class="agileinfo-top-heading">
		<h2>CONTACT US</h2>
	</div>
</div><!-- //banner -->

<!-- start - section body ----------------------------------------------------------------------- -->
	<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="agile-contact-form">
				<div class="col-md-6 contact-form-left">
					<div class="w3layouts-contact-form-top">
						<h3>Contact Us</h3>
						<p>For more information or feedback can be send information below</p>
					</div>
					<div class="agileits-contact-address">
						<ul>
							<li><i class="fa fa-phone" aria-hidden="true"></i> <span>+60192781290</span></li>
							<li><i class="fa fa-phone fa-envelope" aria-hidden="true"></i> <span>
							<a href="mailto:example@email.com">mail@example.com</a></span></li>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i> <span>
							Taman Putra Height, Damansara</span></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 contact-form-right">
					<div class="contact-form-top">
						<h3>Send us a message</h3>
					</div>
					<div class="agileinfo-contact-form-grid">
						<form action="#" method="post">
							<input type="text" name="Name" placeholder="Name" required="">
							<input type="email" name="Email" placeholder="Email" required="">
							<input type="text" name="Telephone" placeholder="Telephone" required="">
							<textarea name="Message" placeholder="Message" required=""></textarea>
							<button class="btn1">Submit</button>
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			
			<div class="w3agile-map">
				<h3>Find us here</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.717825589151!2d102.62432101431064!3d5.753696395830199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b6faab905b2ca7%3A0xa81ba1f9f9407ce8!2sUniSZA+Kampus+Tembila+%2C+Besut.!5e0!3m2!1sen!2smy!4v1530584860853" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div
	<!-- //contact -->
<!-- ended - section body ----------------------------------------------------------------------- -->

<!-- footer -->
<?php
include 'atasbawah/footer.php'; echo "\n";
include 'atasbawah/dibawah.php';
