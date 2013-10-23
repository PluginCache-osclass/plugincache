<?php
/*
Plugin Name: Plugin Cache
Plugin URI: http://www.osclass.org/
Description: Cache system for OSClass, make your web load faster!
Version: 2.0.3
Author: OSClass
Author URI: http://www.osclass.org/
Short Name: plugincache
Plugin update URI: plugin-cache
*/

if(!function_exists('osc_item_is_enabled')) {
function osc_item_is_enabled() {
        return (osc_item_field("b_enabled")==1);
    }
}

function recursiveRemove($dir) {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
        foreach($structure as $file) {
            if (is_dir($file)) recursiveRemove($file);
            elseif (is_file($file)) unlink($file);
        }
    }
    rmdir($dir);
}

    function plugincache_install() {
		@mkdir(osc_content_path().'uploads/cache_files/', 0777, true);

	osc_set_preference('upload_path', osc_content_path().'uploads/cache_files/', 'plugincache', 'STRING');
	osc_set_preference('main_time', '1', 'plugincache', 'INTEGER');
	osc_set_preference('search_time', '1', 'plugincache', 'INTEGER');
	osc_set_preference('item_time', '24', 'plugincache', 'INTEGER');
	osc_set_preference('static_time', '24', 'plugincache', 'INTEGER');
	osc_set_preference('main_cache', 'active', 'plugincache', 'INTEGER');
	osc_set_preference('item_cache', 'active', 'plugincache', 'INTEGER');
	osc_set_preference('search_cache', 'active', 'plugincache', 'INTEGER');
	osc_set_preference('static_cache', 'active', 'plugincache', 'INTEGER');
	osc_set_preference('posted_item_clean_cache', 'active', 'plugincache', 'INTEGER');
	osc_set_preference('item_storage_folder', 'Y-m-d', 'plugincache', 'STRING');
    }

    function plugincache_uninstall() {
	osc_delete_preference('upload_path', 'plugincache');
	osc_delete_preference('search_time', 'plugincache');
	osc_delete_preference('item_time', 'plugincache');
	osc_delete_preference('main_time', 'plugincache');
	osc_delete_preference('static_time', 'plugincache');
	osc_delete_preference('main_cache', 'plugincache');
	osc_delete_preference('item_cache', 'plugincache');
	osc_delete_preference('search_cache', 'plugincache');
	osc_delete_preference('static_cache', 'plugincache');
	osc_delete_preference('posted_item_clean_cache', 'plugincache');
	osc_delete_preference('item_storage_folder', 'plugincache');

        $dir = osc_content_path().'uploads/cache_files/'; // IMPORTANT: with '/' at the end
        recursiveRemove($dir);
    }

if(!function_exists('cache_start')) {
        function cache_start() {
if( osc_is_home_page() || osc_is_ad_page() || osc_is_search_page() || osc_is_static_page() || osc_get_osclass_location() == 'contact') {
        if(!osc_is_web_user_logged_in()) {


 if ((osc_is_ad_page())&&(osc_get_preference('item_cache', 'plugincache')== 'active')&&(!osc_item_is_spam())&&(osc_item_is_active())&&(osc_item_is_enabled())&&(!osc_show_flash_message())) {
         $ItemStorageFolder = osc_get_preference('item_storage_folder', 'plugincache') ;
         $PubbDate = osc_item_pub_date();
     $DatePubb = date_create($PubbDate);
     $cachePubbDate = date_format($DatePubb, $ItemStorageFolder);
         $cachetitle = osc_item_id();
     $cachefile = osc_get_preference('upload_path', 'plugincache')."item/".$cachePubbDate."/".$cachetitle.".html";
         $cachetime = osc_get_preference('item_time', 'plugincache')*3600;
           if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile)))
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
         exit;
      }
      ob_start(); // start the output buffer
}
// cache static pages
                elseif ((osc_is_static_page() || osc_get_osclass_location() == 'contact')&&(osc_get_preference('static_cache', 'plugincache')== 'active')&&(!osc_show_flash_message())) {
                        $cachetime = osc_get_preference('static_time', 'plugincache')*3600;

                        if(osc_get_osclass_location() == 'contact') {
                                $cachefile = osc_get_preference('upload_path', 'plugincache')."static/contact.html";
                        } else {
                                $page = Page::newInstance()->findByPrimaryKey(Params::getParam('id'));
                                $cachetitle = $page['pk_i_id'];
                                $cachefile = osc_get_preference('upload_path', 'plugincache')."static/".$cachetitle.".html";
                        }

                        if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile)))
                    {
                                include($cachefile);
                        echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
                        exit;
                    }
                        ob_start(); // start the output buffer
                }
// cache home page
        elseif ((osc_is_home_page())&&(osc_get_preference('main_cache', 'plugincache')== 'active')&&(!osc_show_flash_message())) {
          $cachefile = osc_get_preference('upload_path', 'plugincache')."main/cache.html";
      $cachetime = osc_get_preference('main_time', 'plugincache')*3600;
         if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile)))
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
         exit;
      }
      ob_start(); // start the output buffer
}
// cache search page
          elseif ((osc_is_search_page())&&(osc_get_preference('search_cache', 'plugincache')== 'active')&&(!osc_show_flash_message())) {
                  function t(&$a, &$d) {
    $a = osc_search_region();
  //  $b = osc_search_city();
//        $c = osc_search_pattern();
        $dcat = osc_search_category();
        foreach($dcat as $dca) {
                $d = osc_category_name();}
}
t($a,$d);

if ($a == ''){
$cachetitle = $d ;
          } elseif ($d == '') {
                  $cachetitle = $a ;
          } else {
                  $cachetitle = $a.'_'.$d ;
          }
          if ($cachetitle != '') {

      $cachefile = osc_get_preference('upload_path', 'plugincache')."search/".$cachetitle.".html";
          $cachetime = osc_get_preference('search_time', 'plugincache')*3600;

          // Serve from the cache if it is younger than $cachetime
      if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile)))
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
         exit;
      }
      ob_start(); // start the output buffer
                      }
                   }
               }
               }
            }
     }

if(!function_exists('cache_end')) {
function cache_end() {
if( osc_is_home_page() || osc_is_ad_page() || osc_is_search_page() || osc_is_static_page() || osc_get_osclass_location() == 'contact' ) {
        if(!osc_is_web_user_logged_in()) {

         if ((osc_is_ad_page())&&(osc_get_preference('item_cache', 'plugincache')== 'active')&&(!osc_item_is_spam())&&(osc_item_is_active())&&(osc_item_is_enabled())&&(!osc_show_flash_message())) {
			$ItemStorageFolder = osc_get_preference('item_storage_folder', 'plugincache') ;
			$PubbDate = osc_item_pub_date();
			$DatePubb = date_create($PubbDate);
			$cachePubbDate = date_format($DatePubb, $ItemStorageFolder);
			$cachetitle = osc_item_id();
			$cachefile = osc_get_preference('upload_path', 'plugincache')."item/".$cachePubbDate."/".$cachetitle.".html";
			$cachetime = osc_get_preference('item_time', 'plugincache')*3600;
          if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile)))
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
         exit;
      }
          @mkdir(osc_get_preference('upload_path', 'plugincache')."item/".$cachePubbDate."/", 0777, true);
       // open the cache file for writing
       $fp = fopen($cachefile, 'w');


       // save the contents of output buffer to the file
     fwrite($fp, ob_get_contents());

  // close the file

        fclose($fp);

  // Send the output to the browser
        ob_end_flush();
          }
// cache static pages
          elseif ((osc_is_static_page() || osc_get_osclass_location() == 'contact')&&(osc_get_preference('static_cache', 'plugincache')== 'active')&&(!osc_show_flash_message())) {
                        $cachetime = osc_get_preference('static_time', 'plugincache')*3600;

                        if(osc_get_osclass_location() == 'contact') {
                                $cachefile = osc_get_preference('upload_path', 'plugincache')."static/contact.html";
                        } else {
                                $page = Page::newInstance()->findByPrimaryKey(Params::getParam('id'));
                                $cachetitle = $page['pk_i_id'];
                                $cachefile = osc_get_preference('upload_path', 'plugincache')."static/".$cachetitle.".html";
                        }

                        if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile)))
                        {
                                include($cachefile);
                                echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
                                exit;
                        }

                        @mkdir(osc_get_preference('upload_path', 'plugincache')."static/", 0777, true);
                        // open the cache file for writing
                        $fp = fopen($cachefile, 'w');


                // save the contents of output buffer to the file
                fwrite($fp, ob_get_contents());

  // close the file

        fclose($fp);

  // Send the output to the browser
        ob_end_flush(); }
// cache home page
        elseif ((osc_is_home_page())&&(osc_get_preference('main_cache', 'plugincache')== 'active')&&(!osc_show_flash_message())) {
          $cachefile = osc_get_preference('upload_path', 'plugincache')."main/cache.html";
      $cachetime = osc_get_preference('main_time', 'plugincache')*3600;
          if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile)))
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
         exit;
      }
          @mkdir(osc_get_preference('upload_path', 'plugincache')."main/", 0777, true);
       // open the cache file for writing
       $fp = fopen($cachefile, 'w');


       // save the contents of output buffer to the file
     fwrite($fp, ob_get_contents());

  // close the file

        fclose($fp);

  // Send the output to the browser
        ob_end_flush(); }
// cache search page
          elseif ((osc_is_search_page())&&(osc_get_preference('search_cache', 'plugincache')== 'active')&&(!osc_show_flash_message())) {
                  if(!function_exists('t')) {
                  function t(&$a, &$d) {
    $a = osc_search_region();
  //  $b = osc_search_city();
//        $c = osc_search_pattern();
        $dcat = osc_search_category();
        foreach($dcat as $dca) {
                $d = osc_category_name();}
}}
t($a,$d);
if ($a == ''){
$cachetitle = $d ;
          } elseif ($d == '') {
                  $cachetitle = $a ;
          } else {
                  $cachetitle = $a.'_'.$d ;
          }
            if ($cachetitle != '') {
      $cachefile = osc_get_preference('upload_path', 'plugincache')."search/".$cachetitle.".html";
          $cachetime = osc_get_preference('search_time', 'plugincache')*3600;
          if (file_exists($cachefile) && (time() - $cachetime
         < filemtime($cachefile)))
      {
         include($cachefile);
         echo "<!-- Cached ".date('jS F Y H:i', filemtime($cachefile))." -->";
         exit;
      }
          @mkdir(osc_get_preference('upload_path', 'plugincache')."search/", 0777, true);
       // open the cache file for writing
       $fp = fopen($cachefile, 'w');


       // save the contents of output buffer to the file
     fwrite($fp, ob_get_contents());

  // close the file

        fclose($fp);

  // Send the output to the browser
        ob_end_flush(); }}


      // Serve from the cache if it is younger than $cachetime
          }
                }
         }
  }

        function plugincache_add_comment($item) {
                $ItemStorageFolder = osc_get_preference('item_storage_folder', 'plugincache') ;
                $PubbDate = osc_item_pub_date($item);
     $DatePubb = date_create($PubbDate);
     $cachePubbDate = date_format($DatePubb, $ItemStorageFolder);
                $IdItem = osc_item_id($item);
       $files = rglob(osc_get_preference('upload_path', 'plugincache')."item/".$cachePubbDate."/".$IdItem.".html");
        foreach($files as $f) {
            @unlink($f);
        }
    }

 function plugincache_item_edit_post($item) {
         $ItemStorageFolder = osc_get_preference('item_storage_folder', 'plugincache') ;
         $PubbDate = osc_item_pub_date($item);
     $DatePubb = date_create($PubbDate);
     $cachePubbDate = date_format($DatePubb, $ItemStorageFolder);
                        $IdItem = osc_item_id($item);
       $files = rglob(osc_get_preference('upload_path', 'plugincache')."item/".$cachePubbDate."/".$IdItem.".html");
        foreach($files as $f) {
            @unlink($f);
        }
        }

        function plugincache_delete_item($id) {
                $ItemStorageFolder = osc_get_preference('item_storage_folder', 'plugincache') ;
                $PubbDate = osc_item_pub_date($id);
     $DatePubb = date_create($PubbDate);
     $cachePubbDate = date_format($DatePubb, $ItemStorageFolder);
                $files = rglob(osc_get_preference('upload_path', 'plugincache')."item/".$cachePubbDate."/".$id.".html");
        foreach($files as $f) {
            @unlink($f);
        }
                $files = rglob(osc_get_preference('upload_path', 'plugincache')."search/*");
        foreach($files as $f) {
            @unlink($f);
        }
                $files = rglob(osc_get_preference('upload_path', 'plugincache')."main/*");
        foreach($files as $f) {
            @unlink($f);
           }
                }

                function plugincache_posted_item(){
                        $files = rglob(osc_get_preference('upload_path', 'plugincache')."search/*");
        foreach($files as $f) {
            @unlink($f);
        }
                $files = rglob(osc_get_preference('upload_path', 'plugincache')."main/*");
        foreach($files as $f) {
            @unlink($f);
        }
        }

                function plugincache_clear_item() {
        $files = rglob(osc_get_preference('upload_path', 'plugincache')."item/");
        foreach($files as $f) {
             recursiveRemove($f);
        }
    }

        function plugincache_clear_static() {
        $files = rglob(osc_get_preference('upload_path', 'plugincache')."static/*");
        foreach($files as $f) {
            @unlink($f);
        }
    }

        function plugincache_clear_search() {
        $files = rglob(osc_get_preference('upload_path', 'plugincache')."search/*");
        foreach($files as $f) {
            @unlink($f);
        }
    }

                function plugincache_clear_main() {
        $files = rglob(osc_get_preference('upload_path', 'plugincache')."main/*");
        foreach($files as $f) {
            @unlink($f);
        }
    }

	            function plugincache_clear_all() {
				plugincache_clear_item();
				plugincache_clear_static();
				plugincache_clear_search();
				plugincache_clear_main();
		}

        function plugincache_edit_comment($id) {
                $conn = getConnection();
        $ItemIds = $conn->osc_dbFetchResult("SELECT fk_i_item_id FROM %st_item_comment WHERE pk_i_id = %d", DB_TABLE_PREFIX, $id);
                $ItemId = $ItemIds['fk_i_item_id'];
                $PubbDate = osc_item_pub_date($ItemId['fk_i_item_id']);
     $DatePubb = date_create($PubbDate);
     $cachePubbDate = date_format($DatePubb, 'Y-m-d');
         $files = rglob(osc_get_preference('upload_path', 'plugincache')."item/".$cachePubbDate."/".$ItemId.".html");
        foreach($files as $f) {
            @unlink($f);
           }
                }
                
    function plugincache_admin_menu() {
        echo '<h3><a href="#">Plugin Cache</a></h3>
        <ul>
            <li><a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'admin/conf.php') . '">&raquo; ' . __('Settings', 'plugincache') . '</a></li>
            <li><a href="' . osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'admin/help.php') . '">&raquo; ' . __('Help', 'plugincache') . '</a></li>
        </ul>';
    }
    
    function plugincache_admin_menu_320() {
		osc_add_admin_submenu_divider( 'plugins', 'Plugin Cache', 'plugincache', $capability = null);
		osc_admin_menu_plugins( __('Settings', 'plugincache'), osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'admin/conf.php'), 'plugincache-setings', $capability = null, $icon_url = null );
		osc_admin_menu_plugins( __('Help', 'plugincache'), osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'admin/help.php'), 'plugincache-help', $capability = null, $icon_url = null );
	}

	function plugincache_admin_configure() {
		osc_admin_render_plugin(osc_plugin_path(osc_plugin_folder(__FILE__)) . 'admin/conf.php') ;
	}

	/**
	 * ADD HOOKS
	 */
	osc_register_plugin(osc_plugin_path(__FILE__), 'plugincache_install');
	osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'plugincache_admin_configure');
	osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'plugincache_uninstall');
	osc_add_hook(osc_plugin_path(__FILE__) . "_disable", 'plugincache_clear_all');

        // hooks for create cache
        osc_add_hook('before_html', 'cache_start');
        osc_add_hook('after_html', 'cache_end');

        // clear cahe after item actions
        if(osc_version()<320) {
                osc_add_hook('item_edit_post', 'plugincache_item_edit_post');
         } else {
        osc_add_hook('edited_item', 'plugincache_item_edit_post');
            }

        if (osc_get_preference('posted_item_clean_cache', 'plugincache')== 'active') {
                if(osc_version()<320) {
                osc_add_hook('item_form_post', 'plugincache_posted_item');
                } else {
                        osc_add_hook('posted_item', 'plugincache_posted_item');
        	}
	}

	osc_add_hook('activate_item', 'plugincache_delete_item');
	osc_add_hook('deactivate_item', 'plugincache_delete_item');
	osc_add_hook('enable_item', 'plugincache_delete_item');
	osc_add_hook('disable_item', 'plugincache_delete_item');
	osc_add_hook('delete_item', 'plugincache_delete_item');
	osc_add_hook('item_spam_on', 'plugincache_delete_item');
	osc_add_hook('item_spam_off', 'plugincache_delete_item');

	// clear cache after comment
	osc_add_hook('add_comment', 'plugincache_add_comment');
	osc_add_hook('activate_comment', 'plugincache_edit_comment');
	osc_add_hook('deactivate_comment', 'plugincache_edit_comment');
	osc_add_hook('enable_comment', 'plugincache_edit_comment');
	osc_add_hook('disable_comment', 'plugincache_edit_comment');
	osc_add_hook('delete_comment', 'plugincache_edit_comment');

	// FANCY MENU
	if(osc_version()<320) {
		osc_add_hook('admin_menu', 'plugincache_admin_menu');
	} else {
        	osc_add_hook('admin_menu_init', 'plugincache_admin_menu_320');
	}

?>
