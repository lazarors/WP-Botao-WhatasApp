<?php
/*
Plugin Name: LZD Button Float Contact
Plugin URI: http://www.lizard.net.br
Description: 
Author: Lázaro Rodrigues Soares
Version: 1.0.0
Author URI: http://lizard.net.br
*/ 



/**
 * LICENSE
 * This file is part of Button Float Contact .
 *
 * Button Float Contact is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *

 * @package    button-float-contact

 * @author     Lázaro Soares <lazaro.soares@lizard.net.br>

 * @copyright  Copyright 2019 Lázaro Rodrigues

 * @license    http://www.gnu.org/licenses/gpl.txt GPL 2.0

 * @version    1.0.0

 * @link       http://lizard.net.br/button-float-contact

 */

if ( defined('CODEMEME_TEST') ) {
	define('LZD_LZD_BUTTON_FLOAT_CONTACT', rand());
} else {
	define('LZD_BUTTON_FLOAT_CONTACT', '1.0.0');
}


class lzd_ButtonFloatContact {
	/**
	 * Return the filesystem path that the plugin lives in.
	 *
	 * @return string
	 */

	public static function getPath() {
		return dirname(__FILE__) . '/';
	}

	/**
	 * Returns the URL of the plugin's folder.
	 *

	 * @return string
	 */

	public static function getURL() {
		return WP_CONTENT_URL.'/plugins/'.basename(dirname(__FILE__)) . '/';
	}

	public static function lzd_get_version() {
		global $wp_version;
		return (float) $wp_version;
	}

	

	/**
	 * Initializes the phpFlickr object.  Called on WP's init hook.
	 *
	 */

    public static function init() {
		wp_enqueue_style('lzd-button-float-contact', lzd_ButtonFloatContact::getURL() . 'lzd-button-float-contact.css', array(), LZD_BUTTON_FLOAT_CONTACT, 'all');			
    }
    
	public static function settings_page() {
	?>
		<div class="wrap">
			<h1 class="wp-heading-inline"><?php _e('LZD Button float contact', 'lzd-button-float-contact') ?></h1>
			<form method="post" action="" id="lzd-button-float-contact">

				<table class="form-table">
					<tbody>
					<tr>
						<th>Número do Whatsapp(*)</th>
						<td>
							<input name="lzd_number_whatsapp" placeholder="11999999999" type="text" value="<?php echo get_option('lzd_number_whatsapp'); ?>" style="width: 350px;">
						</td>
					</tr>
					<tr>
						<th>Texto do box</th>
						<td>
							<input name="lzd_text_box" type="text" value="<?php echo get_option('lzd_text_box'); ?>" style="width: 350px;">
						</td>
					</tr>
					<tr>
						<th>
							<label>Posicionamento</label>
						</th>
						<td>
							<select name="lzd_position" id="lzd_position"  style="width: 350px;">
								<option value="">Selecione uma posição</option>
								<?php 
									$lzd_position = get_option('lzd_position');
								?>
								<option value="1" <?php echo $lzd_position == 1 ? 'selected="selected"' : '' ?>>Left</option>
								<option value="2" <?php echo $lzd_position == 2 ? 'selected="selected"' : '' ?>>Right</option>
							</select>	
						</td>
					</tr>
					</tbody>
				</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Atualizar"></p>
			</form>
		</div>
	<?php
		if (!empty($_POST['lzd_number_whatsapp'])) {
			update_option('lzd_number_whatsapp', $_POST['lzd_number_whatsapp']);
			update_option('lzd_position', $_POST['lzd_position']);
			update_option('lzd_text_box', $_POST['lzd_text_box']);
			
			// header('Location: '.get_admin_url().'options-general.php?page=lzd-button-float-contact%2Flzd-button-float-contact.php&s=success'); 

		}
	}

	public static function add_settings_page() {
		load_plugin_textdomain('lzd-button-float-contact', false, basename(dirname(__FILE__)) . '/i18n');
		add_options_page(__('Buttons Contact', 'lzd-button-float-contact'), __('Buttons Contact', 'lzd-button-float-contact'), 'manage_options', __FILE__, array('lzd_ButtonFloatContact', 'settings_page'));	
	}

	public static function add_whatsapp() {
		$lzd_number_whatsapp = get_option('lzd_number_whatsapp');	 
		$lzd_position 		 = get_option('lzd_position');
		$lzd_text_box 		 = get_option('lzd_text_box');

		if (!empty($lzd_number_whatsapp)) {
	?>

	<div class="what-content <?php echo $lzd_position == 1 ? 'what-left' : 'what-right' ?>">
		<div class="what-content">
			<div class="what-body">
				<div class="dialog ">
					<a class="link-whats" href="https://api.whatsapp.com/send?phone=<?php echo $lzd_number_whatsapp; ?>&amp;text=Estou navegando no seu site e fiquei com uma dúvida a respeito, pode me  ajudar?" target="_blank">
						<?php 
						if (!empty($lzd_text_box)) {
							echo $lzd_text_box;
						}else {
							echo "Olá, tem alguma dúvida?";
						}
						?>
					</a>
				</div>
				<a href="https://api.whatsapp.com/send?phone=<?php echo $lzd_number_whatsapp; ?>&amp;text=Estou navegando no seu site e fiquei com uma dúvida a respeito, pode me  ajudar?" target="_blank" class="lnk-whats">
					<svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" viewBox="0 0 32 32" class="what-fixed"><path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></svg>
				</a>
			</div>
		</div>
	</div>
	<?php	
		}

	}

}

add_action('admin_menu', array('lzd_ButtonFloatContact', 'add_settings_page'));

add_action('init', array('lzd_ButtonFloatContact', 'init'));

add_action('wp_footer', array('lzd_ButtonFloatContact', 'add_whatsapp'));

?>