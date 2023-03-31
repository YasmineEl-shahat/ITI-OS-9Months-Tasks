<div class="bottom-footer">
	<div class="container">
		<!-- social links area -->
		<?php
		if( !get_theme_mod( 'disable_footer_social_links', false ) && kortez_has_social() ){
			echo '<div class="social-profile">';
				kortez_social();
			echo '</div>'; 
		}
		?><!-- social links area -->
		<div class="copyright-wrap">
			<div class="row align-items-center">
				<?php
				if ( has_nav_menu( 'menu-2' ) && !get_theme_mod( 'disable_footer_menu', false ) ){
					$footer_class = 'col-md-7';
				}else{
					$footer_class = 'col-lg-12 text-center';
				}
				?>
				<div class="<?php echo esc_attr( $footer_class ); ?>">
					<?php get_template_part( 'template-parts/site', 'info' ); ?>
				</div>
				<?php if ( has_nav_menu( 'menu-2' ) && !get_theme_mod( 'disable_footer_menu', false ) ){ ?>
					<div class="col-md-5">
						<div class="footer-menu"><!-- Footer Menu-->
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu',
								'depth'          => 1,
							) );
							?>
						</div><!-- footer Menu-->
					</div>
				<?php } ?>
			</div>
		</div>
	</div> 
</div>