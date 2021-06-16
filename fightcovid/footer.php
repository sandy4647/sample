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
				<p style="font-family: BwModelicaSS01-Medium;font-size: 12px;">Be a helping hand by creating to the
					Covid patients in various roles.</p><br>
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
			concerns you may have regarding a medical condition. Please read the for more details.</p>
	</div>
	<div class="row landingpage-footer-content"
		style="background: #00008C;margin-top: 0px !important;padding-top: 10px;">
		<div class="col-md-8">
			<p style="font-size: 14px;color: white;font-family: BwModelicaSS01-Regular">2021 Fight Covid Portal. All
				rights are reserved.</p>
		</div>
		<div class="col-md-2" style="font-family: BwModelicaSS01-Regular"><a href="https://www.lntinfotech.com/privacy_policy/">Privacy Policy</a></div>
		<div class="col-md-2" style="font-family: BwModelicaSS01-Regular"><a href="<?php echo get_site_url();?>/terms-of-service">Terms of Service</a></div>
	</div>
</body>

</html>

<script type="text/javascript">
    document.getElementById("volunteer-button").onclick = function () {
        location.href = "<?php echo get_site_url();?>/#";
    };
</script>
