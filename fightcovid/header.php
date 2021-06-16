<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="../styles/BwModelica-fonts.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
		crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<style>
	@font-face {
    font-family: 'BwModelicaSS02-Bold';
    src: url('<?php echo get_template_directory_uri(); ?>/assets/Bw_Modelica/woff/BwModelicaSS02-Bold.woff');
    font-weight: 100;
	}
	@font-face {
		font-family: 'BwModelicaSS01-Regular';
		src: url('<?php echo get_template_directory_uri(); ?>/assets/Bw_Modelica/woff/BwModelicaSS01-Regular.woff');
	}
	@font-face {
		font-family: 'BwModelicaSS01-Medium';
		src: url('<?php echo get_template_directory_uri(); ?>/assets/Bw_Modelica/woff/BwModelicaSS01-Medium.woff');
	}
	@font-face {
		font-family: 'BwModelicaSS01-Bold';
		src: url('<?php echo get_template_directory_uri(); ?>/assets/Bw_Modelica/woff/BwModelicaSS01-Bold.woff');
	}
	@font-face {
		font-family: 'BwModelicaSS02-BoldItalic';
		src: url('<?php echo get_template_directory_uri(); ?>/assets/Bw_Modelica/woff/BwModelicaSS02-BoldItalic.woff');
	}
	</style>
</head>

<body>
	<!-- <div class="row landingpage-header">
		<iframe src="./header.html" style="height:50px;"></iframe>
	</div> -->
	<div class="row" style="background-color: #00008C">
		<div class="col-md-3"><a href="<?php echo get_site_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/Icons and Logos/Fight Covid Logo.png" width="100%" class="fight_covid_img"></a></div>
		<div class="col-md-6"></div>
		<div class="col-md-2">
		<?php  if ( is_page('emergency-resources')) { ?>
			<button type="button" class="emg-resource-btn" id="emergencybtn" style="display:none;">Emergency Resources</button>
		<?php } else { ?>
			<button type="button" class="emg-resource-btn" id="emergencybtn">Emergency Resources</button>
		<?php } ?>
		</div>
	</div>

<script type="text/javascript">
    document.getElementById("emergencybtn").onclick = function () {
        location.href = "<?php echo get_site_url();?>/emergency-resources";
    };
</script>