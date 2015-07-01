<?php 
add_action( 'admin_menu', 'p_init' );

function p_init(){
add_menu_page('post_types', "Articles", "manage_options", "article", "article",get_template_directory_uri( ).'/post_type/img/icon.png',"3");
//add_submenu_page( 'artical', 'Add text Artical', 'text', 'manage_options','text','text_type');
//add_submenu_page( 'artical', 'Add Image Artical', 'Image', 'manage_options','Image','image_type');
}
wp_enqueue_script( 'custom-post-type', get_template_directory_uri() . '/post_type/js/custom-post-type.js', array(), '1.0.0', true );
wp_enqueue_script( 'fileuploadmulti', get_template_directory_uri() . '/post_type/js/jquery.fileuploadmulti.min.js', array(), '1.0.0', true );
wp_enqueue_style( 'uploadfilemulti', get_template_directory_uri() . '/post_type/css/uploadfilemulti.css');

add_action( 'init', 'text_type' );
function text_type() {
  register_post_type( 'atext',
    array(
      'labels' => array(
       'name' => __( 'text articles' ),
       'singular_name' => __( 'text artical' )
      ),
      'public' => true,
      'publicly_queryable' => true,
      'has_archive' => true,
      'show_ui' => true,
      'show_in_menu'=>'article',
      'capability_type'     => 'post',
      'query_var'           => true,     
      'taxonomies'          => array( 'category'),
      'supports' => array( 'title' ,'thumbnail', 'editor','excerpt', 'comments', 'author'),
     )
   );
 }

add_action( 'init', 'image_type' );
function image_type() {
  register_post_type( 'aimage',
    array(
      'labels' => array(
       'name' => __( 'image articles' ),
       'singular_name' => __( 'image artical' )
      ),
      'public' => true,
      'publicly_queryable' => true,
      'has_archive' => true,
      'show_ui' => true,
      'show_in_menu'=>'article',
      'capability_type'     => 'post',
      'taxonomies'          => array( 'category'),
      'query_var'           => true,     
      'supports' => array( 'title' ,'editor','thumbnail','excerpt', 'comments', 'author'),
     )
   );
 }

add_action( 'init', 'kklibrary' );
function kklibrary() {
  register_post_type( 'kklibrary',
    array(
      'labels' => array(
       'name' => __( 'kklibrary' ),
       'singular_name' => __( 'kklibrary' )
      ),
      'public' => true,
      'publicly_queryable' => true,
      'has_archive' => true,
      'show_ui' => true,
      'show_in_menu'=>'artical',
      'capability_type'     => 'post',
      //'taxonomies'          => array( 'category'),
      'query_var'           => true,     
      'supports' => array( 'title' ,'thumbnail'),
     )
   );
 }

add_action ( 'manage_posts_custom_column',	'atext_columns_data',	10,	2);
add_filter ( 'manage_edit-atext_columns','atext_columns_display');

function atext_columns_data( $column, $post_id ) {

	switch ( $column ) {

	case 'modified':
		$m_orig		= get_post_field( 'post_modified', $post_id, 'raw' );
		$m_stamp	= strtotime( $m_orig );
		$modified	= date('n/j/y @ g:i a', $m_stamp );

	       	$modr_id	= get_post_meta( $post_id, '_edit_last', true );
	       	$auth_id	= get_post_field( 'post_author', $post_id, 'raw' );
	       	$user_id	= !empty( $modr_id ) ? $modr_id : $auth_id;
	       	$user_info	= get_userdata( $user_id );
	
	       	echo '<p class="mod-date">';
	       	echo '<em>'.$modified.'</em><br />';
	       	echo 'by <strong>'.$user_info->display_name.'<strong>';
	       	echo '</p>';

		break;

	// end all case breaks
	}

}
function atext_columns_display( $columns ) {
	$columns['modified']	= 'Last Modified';
	return $columns;
}

if ( current_user_can('editor') && !current_user_can('upload_files') )
add_action('admin_init', 'allow_editor_uploads');
function allow_editor_uploads() {
    $contributor = get_role('editor');
    $contributor->add_cap('upload_files');
}

add_filter( 'media_view_strings', 'custom_media_uploader' );
function custom_media_uploader( $strings ) {
    $url = explode('?', 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    $ID = url_to_postid($url[0]);
    if($ID==1395):
    //unset( $strings['selected'] ); //Removes Upload Files & Media Library links in Insert Media tab
    unset( $strings['insertMediaTitle'] ); //Insert Media
    //unset( $strings['uploadFilesTitle'] ); //Upload Files
    //unset( $strings['mediaLibraryTitle'] ); //Media Library
    //unset( $strings['createGalleryTitle'] ); //Create Gallery
    unset( $strings['setFeaturedImageTitle'] ); //Set Featured Image
    unset( $strings['insertFromUrlTitle'] ); //Insert from URL
    else:
    //unset( $strings['createGalleryTitle'] ); //Create Gallery
    unset( $strings['insertMediaTitle'] ); //Insert Media
    unset( $strings['insertFromUrlTitle'] ); //Insert from URL
     endif;
    return $strings;
}
add_action('pre_get_posts','ml_restrict_media_library');
function ml_restrict_media_library( $wp_query_obj ) {
    global $current_user, $pagenow;
    if( !is_a( $current_user, 'WP_User') )
        return;
    if( 'admin-ajax.php' != $pagenow || $_REQUEST['action'] != 'query-attachments' )
        return;
    if( !current_user_can('update_core') )
        $wp_query_obj->set('author', $current_user->ID );
            return;
}
