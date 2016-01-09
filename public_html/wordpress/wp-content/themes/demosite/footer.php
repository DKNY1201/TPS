</div><!-- /.main -->

			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="footer-ribon">
							<span>Get in Touch</span>
						</div>
						<?php
                        	if(function_exists('dynamic_sidebar') && is_active_sidebar('newsletter-form')):
								dynamic_sidebar('newsletter-form');
							endif;
						?>
						<div class="span3">
							<h4>Latest Tweet</h4>
							<div id="tweet" class="twitter" data-account-id="crivosthemes">
								<p>Please wait...</p>
							</div>
						</div>
						<div class="span4">
							<div class="contact-details">
								<h4>Contact Us</h4>
								<ul class="contact">
									<li><p><i class="icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
									<li><p><i class="icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
									<li><p><i class="icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
								</ul>
							</div>
						</div>
						<div class="span2">
							<h4>Follow Us</h4>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
									<li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
									<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="span1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" src="img/logo-footer.png">
								</a>
							</div>
							<div class="span7">
								<p>© Copyright 2013 by Crivos. All Rights Reserved.</p>
							</div>
							<div class="span4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Libs -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery.js"><\/script>')</script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery.easing.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery.appear.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery.cookie.js"></script>
		<!-- <script src="master/style-switcher/style.switcher.js"></script> Style Switcher -->
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/selectnav.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/twitterjs/twitter.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/revolution-slider/js/jquery.themepunch.plugins.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/revolution-slider/js/jquery.themepunch.revolution.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/flexslider/jquery.flexslider.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery.validate.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>

		<!-- Current Page Scripts -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/views/view.home.js"></script>

		<!-- Theme Initializer -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>

		<!-- Custom JS -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->
	<?php wp_footer(); ?>
	</body>
</html>
