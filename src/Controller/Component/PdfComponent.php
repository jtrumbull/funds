<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Component: Pdf component
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;

class PdfComponent extends Component {
  
  protected $_cmd = 'C:\wkhtmltopdf\bin\wkhtmltopdf';
  
  protected $_urlRoot = 'http://app/pdf/';
  
  protected $_filePath = TMP . 'pdf' . DS;
  
  protected $_template = null;
  
  protected $_data = null;
  
  protected $_head = true;
  
  protected $_foot = true;
  
  public function template ($template = null) {
    if (!$template) {
      return $this->_template;
    }
    $this->_template = $template;
  }
  
  public function data ($data = null) {
    
  }
  
  public function render () {
    
    $url = $this->_urlRoot . $this->_template;
    $file = $this->_filePath . Text::uuid() . '.pdf';
    $headUrl = null;
    $footUrl = null;
    
    if ($this->_head) {
      $headUrl = $url . DS . 'head';
    }
    
    if ($this->_foot) {
      $footUrl = $url . DS . 'head';
    }
    
    
    
  }
  
}
