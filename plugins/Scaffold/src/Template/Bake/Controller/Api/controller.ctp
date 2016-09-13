<?php
/*
 |------------------------------------------------------------------------------
 | Controller\Api: <%= $pluralName %> controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller\Api;

use App\Controller\<%= $pluralName %>Controller as App<%= $pluralName %>Controller;
use Cake\Event\Event;

class <%= $pluralName %>Controller extends App<%= $pluralName %>Controller {
  
<% foreach ($actions as $action): %>
<%= "  " . trim($this->element('controller/api/' . $action)) . "\n  \n" %>
<% endforeach; %>
}
