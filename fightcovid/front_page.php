<?php
/*
 Template Name: Home Page
*/
?>
<?php get_header(); ?>
	<div class="conatainer">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/Banner_Images/Main Banner.png" class="d-block w-100" alt="...">
					<div class="carousel-caption-img1 d-none d-md-block">
						<h2 class="carousel-title">Together,</h2>
						<h2 class="carousel-subtitle">We Can !</h2>
						<p class="carousel-para">
							This portal has been designed with a motive <br>
							to keep you and your loved once protected. <br>
							We have curated comprehensive and <br>
							essential information related to Covid - 19. <br><br>
							In this fight, we all are together #StaySafe
						</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/Banner_Images/Emergency info Banner.png" class="d-block w-100" alt="...">
					<div class="carousel-caption-img2 d-none d-md-block">
						<h2 class="carousel-title">Emergency</h2>
						<h2 class="carousel-subtitle">Resources</h2>
						<p class="carousel-para">
							Check this to know about emergency<br>
							resources like availability of hospital <br>
							beds, ICUs and other related resources.<br>
						</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/Banner_Images/Personalized page info Banner.png" class="d-block w-100"
						alt="...">
					<div class="carousel-caption-img3 d-none d-md-block">
						<h2 class="carousel-title">Personalise</h2>
						<h2 class="carousel-subtitle">your Content</h2>
						<p class="carousel-para">
							Not sure about what to look for? Access<br>
							useful content that will suite your need<br>
							just by answering few simple questions.<br>
						</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/Banner_Images/All resources info Banner.png" class="d-block w-100" alt="...">
					<div class="carousel-caption-img4 d-none d-md-block">
						<h2 class="carousel-title">All</h2>
						<h2 class="carousel-subtitle">Resources</h2>
						<p class="carousel-para">
							Get information content that will help you<br>
							to take care of both you & your family's<br>
							health in this pandemic.<br>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="box-overlay">
			<div class="row content-form">
				<div class="col-md-12 form-title"><b>Get Personalized View<br> of Resources</b></div>
				<div class="col-md-12 form-subtitle">You data is Safe with us. It won't be saved</div>
				<form class="col-md-12 g-3" style="margin-left: 5px;padding-right: 15px;font-size: 13px;" method="post" action="http://localhost/fightcovid/personalised-content/">
					<div class="mb-2">
						<label for="inputCity" class="form-label">City<span style="color: #FF5E5E;">*</span></label>
						<select id="inputCity" class="form-select" name="city" required>
							<option hidden value="" style="color: #233E8B;">Select your city</option>
							<option value="Bangalore">Bangalore</option>
							<option value="Chennai">Chennai</option>
							<option value="Mumbai">Mumbai</option>
						</select>
					</div>
					<!--<div class="mb-2">
						<label for="inputZip" class="form-label">Pin Code<span style="color: #FF5E5E;">*</span></label>
						<input type="text" class="form-control" id="inputZip" placeholder="Enter your Pincode"
							style="color: #233E8B;" name="pincode" required>
					</div>-->
					<div class="mb-2">
						<label for="inputAge" class="form-label">Age Group<span style="color: #FF5E5E;">*</span></label>
						<select id="inputAge" class="form-select" name="Age" required>
							<option hidden value="">Select your Age Group</option>
							<option value="18-44">18-44 Years</option>
							<option value="45-60">45-60 Years</option>
							<option value="60+">60+ Years</option>
						</select>
					</div>
					<div class="mb-2">
						<label for="inputStatus" class="form-label">Living Status<span
								style="color: #FF5E5E;">*</span></label>
						<select id="inputStatus" class="form-select" namr="livingstatus" required>
							<option hidden value="">Select your Living Status</option>
							<option value="Alone">Living Alone</option>
							<option value="Someone">Living with Someone</option>
							<option value="Kids">Household with Kids</option>
						</select>
					</div>
					<div class="mb-2">
						<label for="inputMorbidities" class="form-label">Co-morbidities<span
								style="color: #FF5E5E;">*</span></label>
						<select id="inputMorbidities" class="form-select" name="co-morbidities" required>
							<option hidden value="">Having any Co-morbidities</option>
							<option name="Yes">Yes</option>
							<option name="No">No</option>
						</select>
					</div>
					<div class="mb-2">
						<label for="inputStage" class="form-label">Covid Lifecycle Stage<span
								style="color: #FF5E5E;">*</span></label>
						<select id="inputStge" class="form-select" name="lifecycle_stage" required>
							<option hidden value="">Select your Covid Lifecycle Stage</option>
							<option value="Precaution">Precaution</option>
							<option value="Symptom Onset/Diagnosis">Symptoms Onset / Diagnosis</option>
							<option value="Home Quarantine">Home Quarantine</option>
							<option value="Recovery">Recovery</option>
						</select>
					</div>
					<div class="mb-2 get-content-btn" style="text-align: center;padding-top: 15px;">
						<button type="submit" class="btn btn-primary">Show me results</button>
					</div>
				</form>
			</div>
		</div>

		<div class="box-overlay1">
			<div class="card-container">
				<div class="row" style="margin-right: 150px !important;">
					<div class="col-md-3">
						<div class="card cardlayout">
							<a href="javascript:;">
								<h5 class="card-title"><?php echo get_field("lp_heading2")?></h5>
								<div class="card-body"></div>
								<a href="<?php echo get_field("lplink2")?>" class="svg"><object class="card-svg"
										data="<?php echo get_template_directory_uri(); ?>/assets/Icons and Logos/Stay Protected.svg" height="45"
										width="45"></object></a>
							</a>
						</div>
						<div class="card-custom-footer"><?php echo get_field("lp_dec2");?></div>
					</div>
					<div class="col-md-3">
						<div class="card cardlayout">
							<a href="javascript:;">
								<h5 class="card-title"><?php echo get_field("lp_heading3")?></h5>
								<div class="card-body"></div>
								<a href="<?php echo get_field("lplink3")?>" class="svg"><object class="card-svg"
										data="<?php echo get_template_directory_uri(); ?>/assets/Icons and Logos/Home care and protection.svg" height="45"
										width="45"></object></a>
							</a>
						</div>
						<div class="card-custom-footer"><?php echo get_field("lp_dec3");?></div>
					</div>
					<div class="col-md-3">
						<div class="card cardlayout">
							<a href="javascript:;">
								<h5 class="card-title"><?php echo get_field("lp_heading4")?></h5>
								<div class="card-body"></div>
								<a href="<?php echo get_field("lplink4")?>" class="svg"><object class="card-svg"
										data="<?php echo get_template_directory_uri(); ?>/assets/Icons and Logos/Diagnosis.svg" height="45" width="45"
										style="margin-top: 20px;"></object></a>
							</a>
						</div>
						<div class="card-custom-footer"><?php echo get_field("lp_dec4");?></div>
					</div>
				</div>

				<div class="row" style="margin-top: 35px;margin-right: 150px !important;">
					<div class="col-md-3">
						<div class="card cardlayout">
							<a href="javascript:;">
								<h5 class="card-title"><?php echo get_field("lp_heading5")?></h5>
								<div class="card-body"></div>
								<a href="<?php echo get_field("lplink5")?>" class="svg"><object class="card-svg"
										data="<?php echo get_template_directory_uri(); ?>/assets/Icons and Logos/Hospital Care.svg" height="45" width="45"
										style="margin-top:10px;"></object></a>
							</a>
						</div>
						<div class="card-custom-footer"><?php echo get_field("lp_dec5");?></div>
					</div>
					<div class="col-md-3">
						<div class="card cardlayout">
							<a href="javascript:;">
								<h5 class="card-title"><?php echo get_field("lp_heading6")?></h5>
								<div class="card-body"></div>
								<a href="<?php echo get_field("lplink6")?>" class="svg"><object class="card-svg"
										data="<?php echo get_template_directory_uri(); ?>/assets/Icons and Logos/Recovery and healing.svg" height="45"
										width="45"></object></a>
							</a>
						</div>
						<div class="card-custom-footer"><?php echo get_field("lp_dec6");?></div>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php get_footer(); ?>