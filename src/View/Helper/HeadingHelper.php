<?php
/*
 |------------------------------------------------------------------------------
 | View\Helper: Heading helper
 |------------------------------------------------------------------------------
 */

namespace App\View\Helper;

use Cake\View\Helper;

class HeadingHelper extends Helper {
  
  protected $_title = null;
  
  protected $_small = null;
  
  protected $_icon = null;
  
  protected $_iconPrefix = 'fa fa-';
  
  public function title ($title = null) {
    if ($title == null) {
      return $this->_title;
    }
    $this->_title = $title;
  }
  
  public function small ($small = null) {
    if ($small == null) {
      return $this->_small;
    }
    $this->_small = $small;
  }
  
  public function icon ($icon = null) {
    if ($icon == null) {
      return $this->_icon;
    }
    $this->_icon = $icon;
  }
  
  public function render () {
    $title = $this->_title;
    $small = $this->_small;
    $icon = $this->_icon;
    if (!$title) {
      return null;
    }
    $html = '<h1 class="page-header">';
    if ($icon) {
      $prefix = $this->_iconPrefix;
      $html.= '<span class="' . $prefix . $icon . '"></span> ';
    }
    $html.= $title;
    if ($small) {
      $html.= ' <small>' . $small . '</small>';
    }
    $html.= '</h1>';
    return $html;
  }
  
}