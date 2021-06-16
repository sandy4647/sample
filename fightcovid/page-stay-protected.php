<?php get_header();?>
<body>
<?php $args = array(
					'post_type'      => 'page',
					'p'              => 78,
					'publish_status' => 'published',
					);			 
				    $query = new WP_Query($args);
				    if($query->have_posts()) :
					    while($query->have_posts()) :		 
							$query->the_post() ;
							$fields = get_fields();
					    endwhile;  
				    endif;    		 
?>      
    <div class="row stay-protected-container" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Banner_Images/All\ resource\ &\ personalized\ content\ Banner-common\ for\ both.png');">
        <div class="col-md-6" style="padding-top: 25px;">
            <h2 class="stay-protected-title" style="padding-top: 60px;font-family: 'BwModelicaSS02-Bold';">Stay Protected</h2>
            <h6 style="padding-top: 15px;font-family: BwModelicaSS01-Regular;">From virus myths, symptoms, vaccination details to<br> covid protocols</h6>
        </div>
    </div>

    <div class="row stay-protected-navigator">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="width: 100%;font-family: 'BwModelicaSS02-Bold';font-size: 16px;">
                    <?php foreach( $fields as $name => $value ): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="#<?php echo $name; ?>-panel">
						<?php $section_name_toplink = str_replace('_', ' ', $name);
						$section_name = ucwords($section_name_toplink);
						echo $section_name; ?>
						<span class="sr-only"></span></a>
                    </li>
					<?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>

    <div class="accordion accordion-container" id="accordionPanelsStayOpen">
		<?php foreach( $fields as $name => $value ): ?>
        <div class="accordion-item">
            <h4 class="accordion-header" id="<?php echo $name; ?>-panel">
                <?php $section_name_toplink = str_replace('_', ' ', $name);
					  $section_name = ucwords($section_name_toplink);
				      echo $section_name; ?>
            </h4>
            <div id="<?php echo $name; ?>-collapse" class="accordion-collapse collapse show"
                aria-labelledby="<?php echo $name; ?>-panel">
                <div class="accordion-body border-bottom" id="<?php echo $name; ?>">
                    <!--<div class="row">
                        <h5 style="color:black; margin-top: 10px;font-family: 'BwModelicaSS02-Bold';">DOs</h5>
                    </div>-->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12 padding-10">
                            <!--<h6 style="font-family: 'BwModelicaSS01-Bold';">Sanitization</h6>-->
                            <p style="font-size: 14px;font-family: 'BwModelicaSS01-Regular';"><?php echo $value; ?></p>
                        </div>
                        <!--<div class="col-md-6">
                            <p style="font-size: 14px;font-family: 'BwModelicaSS01-Regular';"></p>
                        </div>-->
                    </div>
                    <div class="row accordian-read-more" tabindex="1"><span>Read More</span>
                    </div>
                    <div class="row" id="expand-read-more">
                        <p>more text goes here....
                        </p>
                    </div>
                </div>
            </div>
        </div><br>
        <?php endforeach; ?>
    </div>

    <div class="row footer-content" style="height:52px;background-color: #00008C;">
        <div class="col-md-8">
            <p class="footer-title">© 2021 Larsen & Toubro Infotech Limited</p>
        </div>
        <div class="col-md-2" style="margin-top: 15px;font-family: BwModelicaSS01-Regular"><a href="https://www.lntinfotech.com/privacy_policy/">Privacy Policy</a></div>
        <div class="col-md-2" style="margin-top: 15px;font-family: BwModelicaSS01-Regular"><a href="<?php echo get_site_url();?>/terms-of-service">Terms of Service</a></div>
    </div>
</body>

<script type="text/javascript">
//console.log('Hi');
  var sections = document.getElementsByClassName("navbar-nav")[0].getElementsByTagName("li").length;
  jQuery('li.nav-item').css('width', 100/(sections-0.5)+"%");
  jQuery('li.nav-item').css('text-align', "center");
  //document.getElementsByClassName("nav-item").style.width = 100/(sections-0.5)+"px";
</script>
