<%
$hidden = ['id', 'created', 'modified', 'created_by_id', 'modified_by_id'];
%>
<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\<%= $pluralName %>: Table
 |------------------------------------------------------------------------------
 */
?>

<table class="table table-bordered table-hover" id="<%= $pluralSlug %>-table">
  
  <thead>
    <tr>
<%
foreach ($columns as $column):
  $field = $column['field'];
  $title = $column['title'];
  $visible = '';
  if (in_array($field, $hidden)) {
    $visible = ' data-visible="false"';
  }
  $needle = '_id';
  if (($temp = strlen($field) - strlen($needle)) >= 0 && strpos($field, $needle, $temp) !== false) {
    $field = substr($field, 0, -3);
    $title = substr($title, 0, -3);
  }
%>
      <th data-field="<%= $field %>"<%= $visible %>><%= $title %></th>
<% endforeach %>
    </tr>
  </thead>
  
  <tbody>
  
  </tbody>
  
  <tfoot>
  
  </tfoot>
  
</table>
