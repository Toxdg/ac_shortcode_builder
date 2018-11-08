<?php
/*
Plugin Name: AC Shortcode builder
Plugin URI: http://tox.ovh
Description: Shortcode filling content
Author: Tomasz Gołkowski
Version: 1.0
Author URI: http://tox.ovh
*/


//admin js
function ac_shortcode_js_build() {
    $plugins_url = plugins_url();
    $screen = get_current_screen();
    wp_register_script('ac_shortcode_build', $plugins_url.'/ac_shortcode_builder/js/script.js', array('jquery') );
    wp_enqueue_script('ac_shortcode_build');	
    wp_enqueue_style('ac_shortcode_build-style', $plugins_url.'/ac_shortcode_builder/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'ac_shortcode_js_build' );


add_action("admin_init", "ac_shortcode_builder_init");
function ac_shortcode_builder_init() {
    $post_list = array('page', 'post');
    add_meta_box("ac-shortcode_builder",  __( 'Generator shortcode:', 'wi_back_pl') , "ac_shortcode_builder", $post_list, "side", "low"); 
}

function ac_shortcode_builder(){
    echo ac_shortcode_html_gen();
}

function ac_shortcode_html_gen(){
    ob_start();
    ?>
    <div id="ac_shortcode_builder"> 
        <select id="ac_shortcode_builder_select">
            
        </select>
        <br><hr>
        <div class="ac_shortcode_builder_tab">
            <?php
                ac_shortcode_load_modules('/modules/');
            ?>
        </div>
        <br>
        <hr>
        Shortcode for use is below:
        <textarea id="output" class="output" style="width:99%"></textarea>
    </div>
    <?php
    $out = ob_get_contents();
    ob_end_clean();
    return $out;   
}

if (!function_exists('ac_shortcode_load_modules')) {
	ac_shortcode_load_modules('/modules/');
	function ac_shortcode_load_modules($dir = null, $extensions = array(), $exclude = array()){
		$dir = __DIR__.$dir;
		$files = scandir($dir);
		$extensions[] = "php";
		$exclude[] = basename(__FILE__);
		$tab_plikow = array();
		foreach ($files as $filename) {		
			$filepath = $dir.'/'.$filename;
			if(is_file($filepath)) {
				$ext = ac_shortcode_getFileExtension($filename);			
				if (in_array($ext,$extensions) && !in_array($filename,$exclude)) {
					include($dir.'/'.$filename);
				}
			}
		}
	}
} else {
    ac_shortcode_load_modules('/modules/');
}

function ac_shortcode_getFileExtension($filename){
	$path_info = pathinfo($filename);
	return $path_info['extension'];
}