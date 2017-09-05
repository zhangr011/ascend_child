<?php 
//Add your custom functions here.

/*添加中文字体到Wordpress系统*/
function custum_fontfamily($initArray){
    $initArray['font_formats'] = "微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=v erdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats";
 
    return $initArray;
}
add_filter('tiny_mce_before_init', 'custum_fontfamily');

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('wpdaxue', get_template_directory() . '/languages');
}

add_filter( 'portfolioposttype_args', 'prefix_change_portfolio_labels' );
/**
 * Change post type labels and arguments for Portfolio Post Type plugin.
 *
 * @param array $args Existing arguments.
 *
 * @return array Amended arguments.
 */
function prefix_change_portfolio_labels( array $args ) {
	$labels = array(
		'name'               => __( 'Projects', 'portfolioposttype' ),
		'singular_name'      => __( 'Project', 'portfolioposttype' ),
		'add_new'            => __( 'Add New Item', 'portfolioposttype' ),
		'add_new_item'       => __( 'Add New Project', 'portfolioposttype' ),
		'edit_item'          => __( 'Edit Project', 'portfolioposttype' ),
		'new_item'           => __( 'Add New Project', 'portfolioposttype' ),
		'view_item'          => __( 'View Item', 'portfolioposttype' ),
		'search_items'       => __( 'Search Projects', 'portfolioposttype' ),
		'not_found'          => __( 'No projects found', 'portfolioposttype' ),
		'not_found_in_trash' => __( 'No projects found in trash', 'portfolioposttype' ),
	);
	$args['labels'] = $labels;

	// Update project single permalink format, and archive slug as well.
	$args['rewrite']     = array( 'slug' => 'project' );
	$args['has_archive'] = true;
	// Don't forget to visit Settings->Permalinks after changing these to flush the rewrite rules.

	return $args;
}
