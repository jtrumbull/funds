<?php
/*
 |------------------------------------------------------------------------------
 | View: App view
 |------------------------------------------------------------------------------
 */

namespace App\View;

use Cake\View\View;

class AppView extends View {

  public function initialize () {
  }
  
  public function url ($url = null, $full = false) {
    return $this->Url->build($url, $full);
  }
  
}
