<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

?>
<div class="landingpage-footer">
		<div class="row landingpage-footer-content">
			<div class="col-md-8">
				<h4 style="padding-top: 20px; color: #00008C; font-family: BwModelicaSS02-Bold">Would You like to become
					a Volunteer?</h4>
				<p style="font-family: BwModelicaSS01-Medium;font-size: 12px;">Lend a helping hand in our efforts.</p><br>
				<button type="button" class="coming_soon" id="volunteer-button">Coming Soon</button><br><br>
			</div>
			<div class="col-md-3" style="margin-top: -115px;">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/Banner_Images/Bottom Illustration.png">
			</div>
		</div>
	</div>
	<div class="row" style="background: #F2F2F2;padding-left: 80px !important;">
		<p style="color: #00008C; font-size: 13px; font-style: italic;margin-top: 10px;"><b>Disclaimer:</b> Please note
			this content is for informational and awareness purposes only, and is not
			intended to be a substitute for professional medical advice, diagnosis, or treatment. Always seek
			the advice of your physician or other qualified health service providers with any questions or
			concerns you may have regarding a medical condition. Please read the full <a class="button button1" href="#popup1">disclaimer</a> for more details.</p>
	</div>
	<div class="row landingpage-footer-content"
		style="background: #00008C;margin-top: 0px !important;padding-top: 10px;">
		<div class="col-md-8">
			<p style="font-size: 14px;color: white;font-family: BwModelicaSS01-Regular">2021 Fight Covid Portal. All
				rights are reserved.</p>
		</div>
		<div class="col-md-2" style="font-family: BwModelicaSS01-Regular"></div>
		<div class="col-md-2" style="font-family: BwModelicaSS01-Regular"><a href="https://www.lntinfotech.com/privacy_policy/">Privacy Policy</a></div>
	</div>


<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Disclaimer</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<p>LTI’s Fight Covid project has put together a comprehensive list of Covid19 resources to help you stay informed, get most reliable emergency resources and take necessary precautions for safety during this pandemic.</p>

<p>LTI’s Fight Covid Portal (the “Site”) is for general informational purposes and is created with the intention to try and help you get reliable and accurate information related to emergency medical facilities in your area.</p>

<p>The information contained herein has been obtained from sources believed to be reliable. All information on the Site is provided in good faith, however, we make no representation or warranty of any kind, express or implied, regarding the accuracy, availability or completeness of any information on the Site.</p>

<p>Under no circumstance shall we have any liability to you for any loss or damage of any kind incurred as a result of the use of the site or reliance on any information provided on the site.</p>

<p>This website cannot and does not contain medical/legal/fitness/health advice. The legal/medical/fitness/health information is provided for general informational and educational purposes only and is not a substitute for professional advice.</p>

<p>The Site may contain, or you may be sent through the Site - links to other websites or content belonging to or originating from third parties or links to websites and features in banners or other advertising. Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability or completeness by us.</p>

<p>We do not warrant, endorse, guarantee, or assume responsibility for the accuracy or reliability of any information offered by third-party websites linked through the site or any website or feature linked in any banner or other advertising. We will not be a party to, or in any way be responsible for monitoring any transaction between you and third-party providers of products or services.</p>

<p>Please be also aware that when you leave our website, other sites may have different privacy policies and terms which are beyond our control. Please be sure to check the Privacy Policies of these sites as well as their “Terms of Service” before engaging in any business or uploading any information.</p>

<p>By using our website, you hereby consent to our disclaimer and agree to its <a class='terms' target='_blank' href="https://www.lntinfotech.com/privacy_policy/">terms</a> and our privacy policy.</p>
		</div>
                <div class='content_button'> <a class="close_ok" href="#">Okay</a> </div>
	</div>
</div>

</body>

</html>

<script type="text/javascript">
    document.getElementById("volunteer-button").onclick = function () {
        location.href = "<?php echo get_site_url();?>/#";
    };
</script>
