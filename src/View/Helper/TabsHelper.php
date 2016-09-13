<?php
/*
 |------------------------------------------------------------------------------
 | View\Helper: Tabs helper
 |------------------------------------------------------------------------------
 */

namespace App\View\Helper;

use Cake\Utility\Inflector;
use Cake\View\Helper;

class TabsHelper extends Helper {
  
  protected $_active = null;
  
  protected $_tabs = [];
  
  protected $_id = null;
  
  protected $_classNames = [ 'tabs' ];
  
  public function active ($slug) {
    $this->_active = $this->_slug($slug);
  }
  
  public function id ($id = null) {
    if ($id == null) {
      return $this->_id;
    }
    $this->_id = $id;
  }
  
  public function addClassName ($className) {
    $this->_classNames[] = $className;
  }
  
  public function push ($tab) {
    if (!array_key_exists('title', $tab)) {
      $tab['title'] = 'Tab ' . count($this->_tabs);
    }
    if (!array_key_exists('slug', $tab)) {
      $tab['slug'] = $this->_slug($tab['title']);
    }
    $this->_tabs[] = $tab;
  }
  
  public function render () {
    
    $View = $this->_View;
    $tablist = [];
    $content = [];
    $activeTab = $this->_active;
    
    foreach ($this->_tabs as $i => $tab) {
      
      if (!$activeTab && $i == 0) {
        $activeTab = $tab['slug'];
      }
      
      $slug = $tab['slug'];
      $active = $activeTab == $slug;
      $paneId = $slug . '-pane';
      
      // Nav
      $nav = '<li' . ($active ? ' class="active"' : '') . ' role="presentation">';
      $nav.= '<a href="#' . $paneId . '" aria-controls="' . $paneId . '" role="tab" data-toggle="tab">';
      if (array_key_exists('icon', $tab)) {
        $nav.= '<span class="fa fa-' . $tab['icon'] . ' fa-fw"></span> ';
      }
      $nav.= $tab['title'];
      $nav.= '</a>';
      $nav.= '</li>';
      
      // Pane
      $pane = '<div role="tabpanel" class="tab-pane' . ($active ? ' active' : '') . '" id="' . $paneId . '">';
      if (array_key_exists('content', $tab)) {
        $pane.= $tab['content'];
      }
      if (array_key_exists('element', $tab)) {
        $pane.= $View->element($tab['element']);
      }
      $pane.= '</div>';
      
      $tablist[] = $nav;
      $content[] = $pane;
      
    }
    
    $classNames = implode(' ', $this->_classNames);
    $id = $this->_id ? ' id="' . $this->_id . '"' : '';
    
    $html = '<div class="' . $classNames . '"'. $id .'>';
    $html.= '<ul class="nav nav-tabs" role="tablist">';
    $html.= implode('', $tablist);
    $html.= '</ul>';
    $html.= '<div class="tab-content">';
    $html.= implode('', $content);
    $html.= '</div>';
    $html.= '</div>';
    
    return $html;
    
  }
  
  protected function _slug ($slug) {
    return strtolower(Inflector::slug(Inflector::underscore($slug)));
  }
  
}
