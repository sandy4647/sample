<?php
/*
 Template Name: Personalized_content
*/
get_header();
?>
<body>
<?php
if(isset($_POST['submit'])){
$city = $_POST['city'];
$age = $_POST['Age'];
$livingstatus = $_POST['livingstatus'];
$lifecycle_stage = $_POST['lifecycle_stage'];
$co_morbidities = $_POST['co-morbidities'];
$args = array (
	'post_type' => 'Content Data',
	//'orderby'			=> 'weight',
	'order'				=> 'ASC',
	'publish_status' => 'published',
	'posts_per_page'   => -1,
	'meta_query' => array (
	   	'relation' => 'AND',
		 array( 'key' => 'city', 'value' => $city, 'compare' => 'LIKE' ),
		 array( 'key' => 'living_status', 'value' => $livingstatus, 'compare' => 'LIKE' ),
		 array( 'key' => 'stage', 'value' => $lifecycle_stage, 'compare' => 'LIKE' ),
		 array( 'key' => 'co_morbidities', 'value' => $co_morbidities, 'compare' => 'LIKE' ),
		array( 
	    'relation' => 'OR',
		 array( 'key' => 'age_group', 'value' => $age, 'compare' => 'LIKE' ),
		 array( 'key' => 'age_group', 'value' => 'All', 'compare' => 'LIKE' )
    	)	
	)
);			
$query = new WP_Query($args);
$section = array();
if ($query->have_posts()) :
	while ($query->have_posts()) :
		$query->the_post();
		$section_name = get_field('section');
		$link = get_field('link');
		$url = get_field('url');
		$section[$section_name][$link] = $url;
	 endwhile;
endif;
} else {
	$section = array();
	$city = "";
	$age = "";
	$livingstatus = "";
	$lifecycle_stage = "";
	$co_morbidities = "";
}
?>
<?php
global $wpdb;
	$cityname = "SELECT DISTINCT meta_value 
	FROM   wp_posts p
	INNER JOIN wp_postmeta pm
	  ON (p.ID = pm.post_id) 
	WHERE p.post_type = 'contentdata' 
	AND (p.post_status = 'publish')
	AND (pm.meta_key = 'city')";
$cities = $wpdb->get_results( $cityname, OBJECT );	
foreach ($cities as $value) {
    $citynames[] = $value->meta_value;
}
?>

    <div class="row personalised-container" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Banner_Images/All\ resource\ &\ personalized\ content\ Banner-common\ for\ both.png');">
        <div class="col-md-6" style="padding-top: 25px;">
            <h2 class="personalised-title" style="padding-top: 35px;">Together, We Can</h2>
            <h2 class="personalised-title">Keep you and your family safe from Covid-19</h2>
        </div>
    </div>
	<form method="post" action="<?php echo get_site_url(); ?>/personalised-content/">
		<div class="row personalised-form">
			<div class="col-md-2">
				<div class="mb-2">
					<label for="inputCity" class="form-label">City<span style="color: #FF5E5E;">*</span></label>
					<select id="inputCity" class="form-select" name="city" required>
						<option hidden value="">Select your city</option>
						<?php foreach($citynames as $value){ ?>
						<option value="<?php echo $value; ?>" <?php if($city == $value) echo "SELECTED";?> ><?php echo $value; ?></option><?php
						} ?>
					</select>
				</div>
			</div>
			<div class="col-md-1">
				<div class="mb-2">
					<label for="inputAge" class="form-label">Age Group<span style="color: #FF5E5E;">*</span></label>
					<select id="inputAge" class="form-select" name="Age" required>
						<option hidden value="">Select your Age Group</option>
						<option value="18-44" <?php if($age == "18-44") echo "SELECTED";?>>18-44</option>
						<option value="45-60" <?php if($age == "45-60") echo "SELECTED";?>>45-60</option>
						<option value="60+" <?php if($age == "60+") echo "SELECTED";?>>60+</option>
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mb-2">
					<label for="inputStatus" class="form-label">Living Status<span style="color: #FF5E5E;">*</span></label>
					<select id="inputStatus" class="form-select" name="livingstatus" required>
						<option hidden value="">Select your Living Status</option>
						<option value="Someone" <?php if($livingstatus == "Someone") echo "SELECTED";?>>Someone</option>
						<option value="Alone" <?php if($livingstatus == "Alone") echo "SELECTED";?>>Alone</option>
						<option value="Kids" <?php if($livingstatus == "Kids") echo "SELECTED";?>>Kids</option>
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<label for="inputMorbidities" class="form-label">Co-morbidities<span
						style="color: #FF5E5E;">*</span></label>
				<select id="inputMorbidities" class="form-select" name="co-morbidities" required>
					<option hidden value="">Having any Co-morbidities</option>
					 <option value="Yes" <?php if($co_morbidities == "Yes") echo "SELECTED";?>>Yes</option>
					<option value="No" <?php if($co_morbidities == "No") echo "SELECTED";?>>No</option>
				</select>
			</div>
			<div class="col-md-2">
				<label for="inputStage" class="form-label">Covid Lifecycle Stage<span
						style="color: #FF5E5E;">*</span></label>
				<select id="inputStge" class="form-select" name="lifecycle_stage" required>
					<option hidden value="">Select your Covid Lifecycle Stage</option>
					<option value="Home Quarantine" <?php if($lifecycle_stage == "Home Quarantine") echo "SELECTED";?>>Home Quarantine</option>
					<option value="Precaution" <?php if($lifecycle_stage == "Precaution") echo "SELECTED";?>>Precaution</option>
					<option value="Recovery" <?php if($lifecycle_stage == "Recovery") echo "SELECTED";?>>Recovery</option>
					<option value="Symptom Onset/Diagnosis" <?php if($lifecycle_stage == "Symptom Onset/Diagnosis") echo "SELECTED";?>>Symptom Onset/Diagnosis</option>
				</select>
			</div>
			<div class="col-md-1">
				<div class="mb-2 get-content-btn" style="text-align: center;padding-top: 30px;">
					<button type="submit" name="submit" class="btn btn-primary">Update Content</button>
				</div>
			</div>
		</div>
	</form>	
    <div class="row personalised-navigator">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="width: 100%;font-family: 'BwModelicaSS02-Bold';">
					<?php foreach($section as $key => $value){?>
						<li class="nav-item active">
							<a class="nav-link" href="#<?php echo $key; ?>-panel"><?php echo $key; ?><span
									class="sr-only"></span></a>
						</li>
					<?php  } ?>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row personalised-accordion-container">
        <div class="accordion" id="accordionPanelsStayOpen">
		<?php $links= array(); foreach($section as $key => $value){?>
            <div class="accordion-item">
                <h4 class="accordion-header" id="<?php echo $key; ?>-panel">
                    <?php echo $key; ?>
                </h4>
                <div id="<?php echo $key; ?>-collapse" class="accordion-collapse collapse show"
                    aria-labelledby="<?php echo $key; ?>-panel">
					<?php
						foreach($value as $name => $url){
							$urllink = explode(',' , $url);
					?>
                    <div class="accordion-body border-bottom" id="<?php echo $key; ?>">
                        <div class="row">
							<?php if(!empty($name) AND $urllink){ ?>
                            <div class="col-md-8 padding-10">
                                <h5><?php echo $name; ?></h5>
                            </div>
			    <div class="col-md-4 read_more_links">
			    <?php
			       	if(sizeOf($urllink) > 1) {
					$i = 1;
				}
				foreach($urllink as $urlpath){
				  if(sizeOf($urllink) > 1) {
				       $read_text = 'Read Link ' . $i;
					$i++;
				  } else {
				       $read_text = 'Read'; 
				  }?>
					  <a href="<?php echo $urlpath; ?>" class="btn read-btn" target="new"><?php echo $read_text; ?></a>
				<?php } } ?>
                            </div>
			</div>
                    </div>
					<?php  } ?>
                </div>
            </div>
			<?php } ?>
        </div>
    </div>
    <div class="row" style="background: #F2F2F2;padding-left: 80px !important;">
          <p style="color: #00008C; font-size: 13px; font-style: italic;margin-top: 10px;"><b>Disclaimer:</b> Please note
                        this content is for informational and awareness purposes only, and is not
                        intended to be a substitute for professional medical advice, diagnosis, or treatment. Always seek
                        the advice of your physician or other qualified health service providers with any questions or
                        concerns you may have regarding a medical condition. Please read the full <a class="button button1" href="#popup1">disclaimer</a> for more details.</p>
    </div>

    <div class="row footer-content" style="height:52px;background-color: #00008C;">
        <div class="col-md-8">
            <p class="footer-title">© 2021 Larsen & Toubro Infotech Limited</p>
        </div>
        <div class="col-md-2" style="margin-top: 15px;font-family: BwModelicaSS01-Regular">
        </div>
        <div class="col-md-2" style="margin-top: 15px;font-family: BwModelicaSS01-Regular"><a href="https://www.lntinfotech.com/privacy_policy/">Privacy Policy</a></div>
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

<script type="text/javascript">
  var sections = document.getElementsByClassName("navbar-nav")[0].getElementsByTagName("li").length;
  jQuery('li.nav-item').css('width', 100/(sections-0.5)+"%");
  jQuery('li.nav-item').css('text-align', "center");
  //document.getElementsByClassName("nav-item").style.width = 100/(sections-0.5)+"px";
</script>
