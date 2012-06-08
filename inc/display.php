<?php 

	function cwlsm_change() {
	
	global $cwlsm_options;

	ob_start(); ?>
	<style type="text/css">
	
	<?php if(!empty($cwlsm_options["logo_url"])): ?>
	h1 a { background-image:url(<?php echo$cwlsm_options["logo_url"];  ?>) !important; }
	<?php endif;?>
	
	<?php if(!empty($cwlsm_options["body_bg_color"])): ?>
	body.login { background-color:<?php echo$cwlsm_options["body_bg_color"];  ?>; }
	<?php endif;?>
	

	<?php if(!empty($cwlsm_options["login_form_bg_color"])): ?>
	#loginform { background-color:<?php echo$cwlsm_options["login_form_bg_color"];  ?>; }
	<?php endif;?>
	
	<?php if(!empty($cwlsm_options["label_color"])): ?>
	#loginform label { color:<?php echo$cwlsm_options["label_color"];  ?>; }
	<?php endif;?>
	
	<?php if(!empty($cwlsm_options["text_input_color"])): ?>
	#loginform input[type="text"],#loginform input[type="password"]{ color:<?php echo$cwlsm_options["text_input_color"];  ?>; }
	<?php endif;?>
	<?php 
	if(!empty($cwlsm_options["css"])){
		echo $cwlsm_options["css"];
	}
	?>
	</style>
	
	<?php if(!empty($cwlsm_options["fav_icon_url"])): ?>
	<link rel="icon" href="<?php echo $cwlsm_options["fav_icon_url"];  ?>" type="image/x-icon" />
	<?php endif;?>
	
	<?php
		echo ob_get_clean();
	}
	add_action('login_head', 'cwlsm_change');
?>
<?php
	
	function custom_login_logo_url() {
	global $cwlsm_options;
	echo $cwlsm_options["logo_link"] ;
	}
	
	if(!empty($cwlsm_options["logo_link"])){
		add_filter( 'login_headerurl', 'custom_login_logo_url' );
	}
	
	
	function change_wp_login_title() {
		global $cwlsm_options;
		echo $cwlsm_options["logo_title"] ;
	}
	if(!empty($cwlsm_options["logo_title"])){
		add_filter('login_headertitle', 'change_wp_login_title');
	}
?>