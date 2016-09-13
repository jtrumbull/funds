<%
$skip = [ 'id', 'created', 'modified', 'created_by_id', 'modified_by_id' ];
$hidden = [];
foreach ($columns as $i => $column) {
  $field = $column['field'];
  if (in_array($field, $skip)) {
    continue; 
  }
  $needle = '_id';
  if (($temp = strlen($field) - strlen($needle)) >= 0 && strpos($field, $needle, $temp) !== false) {
    $hidden[] = $field;
    unset($columns[$i]);
  }
}
%>
<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\<%= $pluralName %>\Form: Create
 |------------------------------------------------------------------------------
 */

$buttons = isset($buttons) ? $buttons : true;
?>

<form id="<%= $pluralSlug %>-create-form">
  
<%
foreach ($hidden as $field): %>
  <input type="hidden" name="<%= $field %>" />
  
<% endforeach %>
<%
foreach ($columns as $column):
  $field = $column['field'];
  $title = $column['title'];
  if (in_array($field, $skip)) {
    continue; 
  }
%>
  <div class="form-group">
    <label><%= $title %></label>
    <input type="text" class="form-control" name="<%= $field %>" placeholder="<%= $title %>" />
  </div>
  
<% endforeach %>
  <?php if ($buttons): ?>
  <button type="submit" class="btn btn-primary">
    <span class="fa fa-plus fa-fw"></span>
    Create
  </button>
  <?php endif ?>
  
  <div class="alert-container"></div>
  
</form>
