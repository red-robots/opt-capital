<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );

/* Browser Detection Class */
function custom_body_classes($classes) {
    // the list of WordPress global browser checks
    // https://codex.wordpress.org/Global_Variables#Browser_Detection_Booleans
    $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
    // check the globals to see if the browser is in there and return a string with the match
    $classes[] = join(' ', array_filter($browsers, function ($browser) {
        return $GLOBALS[$browser];
    }));
    return $classes;
}
add_filter('body_class', 'custom_body_classes');


add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
    return true;
}

function shortenText($text, $chars = 120) {
    if(strlen($text) > $chars) {
        $text = $text.' ';
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text ,' '));
        $text = $text.'...';
    }
    return $text;
}

function ge_social_fields() {
    $social = array(
        array(
            'field'=>'linkedin_link',
            'icon'=> 'fab fa-linkedin',
            'att'=>''
        ),
        array(
            'field'=>'twitter_link',
            'icon'=> 'fab fa-twitter-square',
            'att'=>''
        ),
        array(
            'field'=>'email',
            'icon'=> 'fa fa-envelope',
            'att'=>'mailto'
        )
    );
    return $social;
}

function friendly_string($string) {
    $string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "_", $string);
    return $string;
}

function get_the_teams() {
    global $wpdb;
    $taxonomy = 'team_categories';
    $tax_terms = get_terms($taxonomy, array('hide_empty' => false));
    $prefix = $wpdb->prefix;
    $records = array();
    if($tax_terms) {
        foreach($tax_terms as $t) {
            $term_id = $t->term_id;
            $term_name = $t->name;
            $query = "SELECT rel.term_taxonomy_id as term_id,p.ID as post_id,p.post_title FROM ".$prefix."term_relationships as rel,".$prefix."posts as p
                      WHERE rel.object_id=p.ID AND rel.term_taxonomy_id=".$term_id." ORDER BY p.menu_order ASC";
            $results = $wpdb->get_results( $query, OBJECT );
            $items = ($results) ? $results : '';
            $args = array(
                    'term_id'=>$term_id,
                    'term_name'=>$term_name,
                    'members'=>$items
                );
            $records[] = $args;
        }
    }
     
    return $records;
}

/* Custom Sitemap */
function generate_sitemap() {
    global $wpdb;
    $lists = array();
    $menus = wp_get_nav_menu_items('main-menu');
    $news_ID = 0;
    $cat_args = array('hide_empty' => 1, 'parent' => 0);
    $menu_orders = array();
    $menu_with_children = array();
    if($menus) {
        $i=0;
        foreach($menus as $m) {
            $page_id = $m->object_id;
            $menu_title = $m->title;
            $page_url = $m->url;
            $post_parent = $m->post_parent;
            $submenu = array();
            if($post_parent) {
                $submenu = array(
                        'id'=>$page_id,
                        'title'=>$menu_title,
                        'url'=>$page_url
                    );
                $menu_with_children[$post_parent][$page_id] = $submenu;
            } else {
                $menu_orders[$page_id] = $menu_title;
            } 
            $i++;
        }
    }
    
    $results = $wpdb->get_results( "SELECT ID,post_title FROM {$wpdb->prefix}posts WHERE post_type = 'page' AND post_status='publish' AND post_parent=0 ORDER BY post_title ASC", OBJECT );
    $childPages = $wpdb->get_results( "SELECT ID,post_title,post_parent as parent_id FROM {$wpdb->prefix}posts WHERE post_type = 'page' AND post_status='publish' AND post_parent>0 ORDER BY post_title ASC", OBJECT );
    $childrenList = array();
    $childrenAll = array();
    /* child pages */
    if($childPages) {
        foreach($childPages as $cp) {
            $pId = $cp->parent_id;
            $iD = $cp->ID;
            $childrenAll[$iD] = array(
                                'id'=>$cp->ID,
                                'title'=>$cp->post_title,
                                'url'=>get_permalink($iD)
                            );
            $childrenList[$pId][] = array(
                                'id'=>$cp->ID,
                                'title'=>$cp->post_title,
                                'url'=>get_permalink($cp->ID)
                            );
        }
    }

    if($results) {
        foreach($results as $row) {
            $id = $row->ID;
            $page_title = $row->post_title;
            $page_link = get_permalink($id);
            if(array_key_exists($id,$menu_orders)) {
                $page_title = $menu_orders[$id];
            }
            
            $lists[$id]['parent_id'] = $id;
            $lists[$id]['parent_title'] = $page_title;
            $lists[$id]['parent_url'] = $page_link;
            
            if($menu_with_children) {

                $ii_childrens = array();
                if(array_key_exists($id,$menu_with_children)) {
                    $ii_childrens = $menu_with_children[$id];
                    $lists[$id]['children'] = $ii_childrens;
                }

                /* Show children page even if does not exist on Menu dropdown */
                if($childrenList && array_key_exists($id, $childrenList)) {
                    $cc_children = $childrenList[$id];
                    $exist_children = $lists[$id]['children'];
                    
                    foreach($cc_children as $cd) {
                        $x_id = $cd['id'];
                        if(!array_key_exists($x_id, $ii_childrens)) {
                            $addon[$x_id] = $cd;
                            $exist_children[$x_id] = $cd;
                        }
                    } 

                    $lists[$id]['children'] = $exist_children;
                }

            } else {
                if($childrenList && array_key_exists($id, $childrenList)) {
                    $c_obj = $childrenList[$id];
                    $lists[$id]['children'] = $c_obj;
                }
            }



            
            if($id == $news_ID) {
                $lists[$id]['categories'] = get_categories($cat_args);
            }
        }
    }
    
    return $lists;
    
}
