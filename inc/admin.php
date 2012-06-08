<?php

function cwlsm_options_page() {

	global $cwlsm_options;

	ob_start(); ?>
	<div class="wrap">
		<h2>Logn Screen Manager</h2>
		<?php
			$input = array(
				"logo_url" => "Logo Image URL",
				"logo_title" => "Logo Title",
				"logo_link" => "Logo Link",
				"fav_icon_url" => "Fav Icon URL",
				"body_bg_color" => "Body Background Color",
				"login_form_bg_color" => "Login Form Background Color",
				"text_input_color" => "Input Color",
				"label_color" => "Label Color"
			);
		?>
		<form method="post" action="options.php">
			<?php settings_fields('cwlsm_settings_group'); ?>
			<table>
				<?php foreach ($input as $name => $text) : ?>
				<tr>
					<td style="text-align:;"><label class="description" for="cwlsm_settings[<?php echo $name; ?>]"><?php _e($text, 'cwlsm_domain'); ?></label></td>
					<td><input id="cwlsm_settings[<?php echo $name; ?>]" size="45" name="cwlsm_settings[<?php echo $name; ?>]" type="text" value="<?php echo $cwlsm_options[$name]; ?>"/></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td><label class="description" for="cwlsm_settings[css]"><?php _e("Custom Css", 'cwlsm_domain'); ?></label></td>
					<td><textarea id="cwlsm_settings[css]" style="height:250px;width:400px;"  name="cwlsm_settings[css]" type="text"><?php echo $cwlsm_options["css"]; ?></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Options', 'cwlsm_domain'); ?>" /></td>
				</tr>
			</table>
		</form>
		
	</div>
	<?php
	echo ob_get_clean();
}

function cwlsm_add_options_link() {
	add_options_page('Login Screen Manager', 'Login Screen', 'manage_options', 'cwlsm-options', 'cwlsm_options_page');
}
add_action('admin_menu', 'cwlsm_add_options_link');

function cwlsm_register_settings() {
	register_setting('cwlsm_settings_group', 'cwlsm_settings');
}
add_action('admin_init', 'cwlsm_register_settings');