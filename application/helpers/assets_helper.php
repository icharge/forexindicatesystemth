<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
/**
 * Asset URL
 * 
 * Create a local URL to your assets based on your basepath.
 * 
 * @Modified iCharge
 * @author  https://github.com/jenssegers/codeigniter-simple-assets
 * @access	public
 * @param   string
 * @return	string
 */

if (!function_exists('asset_url')) {

  function asset_url($uri = '', $group = FALSE) {
    if (startsWith($uri, 'http')) {
        return $uri;
    }
    $CI = & get_instance();

    if (!$dir = $CI->config->item('assets_path')) {
      $dir = 'assets/';
    }

    if ($group) {
      return $CI->config->base_url($dir . $group . '/' . $uri);
    } else {
      return $CI->config->base_url($dir . $uri);
    }
  }

}

if (!function_exists('getasset_url')) {

  function getasset_url() {
    $CI = & get_instance();
    return $CI->config->base_url('assets/').'/';
  }

}

if (!function_exists('css_asset')) {

  function css_asset($uri = '', $media = NULL) {
    $html = '<link rel="stylesheet" type="text/css" href="' . asset_url($uri, 'css') . '"';
    if ($media !== NULL) {
      $html .= ' media="' . $media . '"';
    }
    $html .= '>';
    echo $html;
  }

}

if (!function_exists('js_asset')) {

  function js_asset($uri = '') {
    $html = '<script type="text/javascript" src="' . asset_url($uri, 'js') . '"></script>';
    echo $html;
  }

}


/* End of file url_helper.php */
/* Location: ./application/helpers/url_helper.php */