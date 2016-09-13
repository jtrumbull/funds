<?php
/*
 |------------------------------------------------------------------------------
 | View\Helper: Navbar helper
 |------------------------------------------------------------------------------
 */

namespace App\View\Helper;

use Cake\Utility\Inflector;
use Cake\View\Helper;

class NavbarHelper extends Helper {
  
  public $helpers = [ 'Url' ];
  
  protected $_active = null;
  
  public function active ($slug = null) {
    if ($slug == null) {
      return $this->_active;
    }
    $this->_active = $this->_slug($slug);
  }
  
  public function nav ($title, $url = '#', $slug = null) {
    $slug = $slug ? $this->_slug($slug) : $this->_slug($title);
    $active = $this->_active == $slug;
    $html = '<li' . ($active ? ' class="active"' : '') . '>';
    $html.= '<a href="' . $this->Url->build($url) . '">';
    $html.= $title;
    if ($active) {
      $html.= '<span class="sr-only">(current)</span>';
    }
    $html.= '</a>';
    $html.= '</li>';
    return $html;
  }
  
  protected function _slug ($slug) {
    return strtolower(Inflector::slug(Inflector::underscore($slug)));
  }
  
}
