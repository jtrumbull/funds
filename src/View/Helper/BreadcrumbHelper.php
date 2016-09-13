<?php
/*
 |------------------------------------------------------------------------------
 | View\Helper: Breadcrumb helper
 |------------------------------------------------------------------------------
 */

namespace App\View\Helper;

use Cake\View\Helper;

class BreadcrumbHelper extends Helper {
  
  public $helpers = [ 'Url' ];
  
  protected $_breadcrumbs = [];
  
  public function push ($title, $url = null) {
    $this->_breadcrumbs[] = [ 'title' => $title, 'url' => $url ];
  }
  
  public function render () {
    $crumbs = $this->_breadcrumbs;
    $count = count($crumbs);
    if ($count == 0) {
      return null;
    }
    $html = '<ol class="breadcrumb">';
    foreach ($crumbs as $i => $crumb) {
      $html.= '<li>';
      if ($i < $count - 1) {
        $html.= '<a href="' . $this->Url->build($crumb['url']) . '">';
        $html.= $crumb['title'];
        $html.= '</a>';
      } else {
        $html.= $crumb['title'];
      }
      $html.= '</li>';
    }
    $html.= '</ol>';
    return $html;
  }
  
}
