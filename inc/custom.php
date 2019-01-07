<?php
/**
 * Custom functions
 */

/*
* Tag Shortcode
* Usage: [tag type="span" class="myClass" id="firstSpan"]Lorem ipsum dolor sit amet[/tag]
*/
function tag_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'class' => 'shortcode_class',
    'id' => '',
    'type' => 'div',
    'style' => '',
    'href' => '',
    'target' => '',
    'other' => ''
  ), $atts ) );
  $output = '<' . esc_attr($type);
  if(strlen($href) > 0){
    $output .= ' href="' . esc_attr($href) . '" target="' . esc_attr($target) . '"';
  }
  return $output . ' id="' . esc_attr($id) . '" class="' . esc_attr($class) . '" style="' . esc_attr($style) . '" ' . $other . '>' . do_shortcode($content) . '</' . esc_attr($type) . '>';
}
add_shortcode( 'tag', 'tag_shortcode' );

/*
*  Return ID of last ancestor of a page
*/
function get_post_last_ancestor_id( $post_id, $post_type ){
  $parents = get_ancestors($post_id, $post_type);
  return $parents[count($parents)-1];
}

/*
*  Return ID or slug of last ancestor of a page
*/
function get_post_last_ancestor( $return_id = true ){
  $output = '';
    if( is_page() ) {
      global $post;
      /* Get an array of Ancestors and Parents if they exist */
      $parents = get_post_ancestors( $post->ID );
      /* Get the top Level page->ID count base 1, array base 0 so -1 */
      $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
      /* Get the parent and set the $class with the page slug (post_name) */
      $parent = get_page( $id );
      $output = $return_id ? $post->ID : $parent->post_name;
    }
    return $output;
}

/**
 * Get ID of the first child post in the menu order
 * @param post object or id
 * @param string post type
 * @return post id
 */
function get_first_child_post_id($_post, $post_type){
  $_id = $_post;
  if(is_object($_post)){
    $_id = $_post->ID;
  }
  $query_args = array (
    'post_type'              => $post_type,
    'posts_per_page'         => '1',
    'order'                  => 'ASC',
    'orderby'                => 'menu_order',
    'post_parent'            => $_id // only top level pages
  );
  $query = new WP_Query($query_args);
  if( is_array($query->posts) ) {
    return $query->posts[0]->ID;
  }
  return 0;
}

/**
 * Replaced tokens in string with Wordpress variables
 * @param string with tokens like %%home_url%%
 * @return string with replaced tokens
 */
function replace_tokens( $string ) {

  $tokenized_string = $string;

  $tokens = array(
    '%%home_url%%' => home_url(),
    '%%template_url%%' => get_bloginfo('template_url'),
  );

  foreach( $tokens as $token => $replacement ){
    $tokenized_string = str_ireplace($token, $replacement, $tokenized_string);
  }

  return $tokenized_string;

}

/**
 * Truncate string to supplied length
 * http://stackoverflow.com/a/80066
 * @param string
 * @param length in characters
 * @return truncated string
 */
function truncate_string($string, $length) {
  if (strlen($string) > $length) {
    return preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length));
  }
  return $string;
}

/**
 * replace all non letters or digits with replacement token, lowercase
 * @param string
 * @param replacement token
 * @return slugified string
 */
function slugify ($str, $replace="-") {
  $str = preg_replace('/\W+/', $replace, $str);
  $str = strtolower(trim($str, $replace));
  return $str;
}

/**
 * Add post/page slug to body tag
 */
function slug_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    $classes[] = basename(get_permalink());
  }

  return $classes;
}
add_filter('body_class', 'slug_body_class');

/**
 * Prefix for jump links in the navbar
 * @return nothing if it's the homepage, or the homepage url if it's not
 */
function jump_link_prefix() {
  global $post;
  if (is_front_page() || is_page('b')) {
    return '';
  }
  return get_bloginfo('url') . '/';
}