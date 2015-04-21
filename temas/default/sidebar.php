<?php do_action( 'bp_before_sidebar' ) ?>

<div id="sidebar">
	<div class="padder">
    	<div id="twitt_blog"><a href="<?php bloginfo('rss_url'); ?>" title="RSS deste Blog"><img src="<? bloginfo('stylesheet_directory')?>/_inc/imgs/twitter.png"/>  RSS deste Blog</a></div>
	<?php do_action( 'bp_inside_before_sidebar' ) ?>

	<?php if ( is_user_logged_in() ) : ?>

		<?php do_action( 'bp_before_sidebar_me' ) ?>

		<div id="sidebar-me"><!--sidebar-me-->
			<div id="avatarlogout"><a href="<?php echo bp_loggedin_user_domain() ?>"><?php bp_loggedin_user_avatar( 'type=thumb&width=40&height=40' ) ?></a>
            </div>

			<div id="avatarlogout2">
				<div class="texto"><?php bp_loggedinuser_link() ?></div>
				<a class="button logout" href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>"><?php _e( 'Log Out', 'buddypress' ) ?></a>

			<?php do_action( 'bp_sidebar_me' ) ?>
            </div><!--avatarlogout-->
		</div><!--sidebar-me-->

		<?php do_action( 'bp_after_sidebar_me' ) ?>

		<?php if ( function_exists( 'bp_message_get_notices' ) ) : ?>
			<?php bp_message_get_notices(); /* Site wide notices to all users */ ?>
		<?php endif; ?>

	<?php else : ?>

		<?php do_action( 'bp_before_sidebar_login_form' ) ?>

		<p id="login-text" class="formularios">
			<?php _e( 'To start connecting please log in first.', 'buddypress' ) ?>
		</p>

		<form name="login-form" id="sidebar-login-form" class="standard-form formularios" action="<?php echo site_url( 'wp-login.php', 'login_post' ) ?>" method="post">
			<label><?php _e( 'Username', 'buddypress' ) ?><br />
			<input type="text" name="log" id="sidebar-user-login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" /></label>

			<label><?php _e( 'Password', 'buddypress' ) ?><br />
			<input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" /></label>

			<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" /> <?php _e( 'Remember Me', 'buddypress' ) ?></label></p>

			<?php do_action( 'bp_sidebar_login_form' ) ?>
			<input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e('Log In'); ?>" tabindex="100" />
			<input type="hidden" name="testcookie" value="1" />
		</form>
		
		<?php if ( bp_get_signup_allowed() ) : ?>
			<p class="texto" style="margin-top: 3px;">
				<?php printf('<a href="%s" title="Criar uma conta">Criar uma conta</a>', site_url( BP_REGISTER_SLUG . '/' ) ) ?>
			</p>
		<?php endif; ?>

		<?php do_action( 'bp_after_sidebar_login_form' ) ?>

	<?php endif; ?>
	
	<?php /* Show forum tags on the forums directory */
	if ( get_bloginfo('name') == "Redação Ctea" ) : ?>
	<form class="FeedBurner" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=redacaoctea', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
		<p>Newsletter deste Blog:</p>
		<p>
			<input type="text" class="texto" style="width:140px" name="email" value="digite seu e-mail" onfocus="if (value == 'digite seu e-mail') value = ''" onblur="if (value == '') value = 'digite seu e-mail'"/>
		</p>
			<input type="hidden" value="redacaoctea" name="uri"/>
			<input type="hidden" name="loc" value="pt_BR"/>
			<input type="submit" value="Enviar" />
	</form>
	<?php endif; ?>
	
	<?php /* Show forum tags on the forums directory */
	if ( BP_FORUMS_SLUG == bp_current_component() && bp_is_directory() ) : ?>
		<div id="forum-directory-tags" class="widget tags">

			<h3 class="widgettitle"><?php _e( 'Forum Topic Tags', 'buddypress' ) ?></h3>
			<?php if ( function_exists('bp_forums_tag_heat_map') ) : ?>
				<div id="tag-text"><?php bp_forums_tag_heat_map(); ?></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php dynamic_sidebar( 'sidebar' ) ?>

	<?php do_action( 'bp_inside_after_sidebar' ) ?>

	</div><!-- .padder -->
</div><!-- #sidebar -->

<?php do_action( 'bp_after_sidebar' ) ?>