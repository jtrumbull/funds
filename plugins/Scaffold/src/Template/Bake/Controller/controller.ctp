<?php
/*
 |------------------------------------------------------------------------------
 | Controller: <%= $pluralName %> controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class <%= $pluralName %>Controller extends AppController {
  
<% foreach ($actions as $action): %>
<%= "  " . trim($this->element('controller/' . $action)) . "\n  \n" %>
<% endforeach; %>
}
