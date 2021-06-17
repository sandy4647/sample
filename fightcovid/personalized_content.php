<?php
/*
 Template Name: Personalized_content
*/
get_header();
?>
<body>
<?php
$city = $_POST['city'];
//echo $city;
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
            <h2 class="personalised-title" style="padding-top: 35px;">Let's see</h2>
            <h2 class="personalised-title">what we have here for you!</h2>
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
					<button type="submit" class="btn btn-primary">Update Content</button>
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
                            <div class="col-md-10 padding-10">
                                <h5><?php echo $name; ?></h5>
                            </div>
							<?php foreach($urllink as $urlpath){ ?>
                            <div class="col-md-2"><a href="<?php echo $urlpath; ?>" class="btn read-btn" target="new">Read</a></div>
                            <?php } } ?>
						</div>
                    </div>
					<?php  } ?>
                </div>
            </div>
			<?php } ?>
        </div>
    </div>
    <div class="row footer-content" style="height:52px;background-color: #00008C;">
        <div class="col-md-8">
            <p class="footer-title">© 2021 Larsen & Toubro Infotech Limited</p>
        </div>
        <div class="col-md-2" style="margin-top: 15px;font-family: BwModelicaSS01-Regular">
        </div>
        <div class="col-md-2" style="margin-top: 15px;font-family: BwModelicaSS01-Regular"><a href="https://www.lntinfotech.com/privacy_policy/">Privacy Policy</a></div>
    </div>
</body>

<script type="text/javascript">
  var sections = document.getElementsByClassName("navbar-nav")[0].getElementsByTagName("li").length;
  jQuery('li.nav-item').css('width', 100/(sections-0.5)+"%");
  jQuery('li.nav-item').css('text-align', "center");
  //document.getElementsByClassName("nav-item").style.width = 100/(sections-0.5)+"px";
</script>