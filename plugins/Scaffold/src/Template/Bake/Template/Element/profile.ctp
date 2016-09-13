<%
$skip = ['id', 'created', 'modified', 'created_by_id', 'modified_by_id'];
%>
<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\<%= $pluralName %>: Profile
 |------------------------------------------------------------------------------
 */
?>

<table class="table table-condensed profile" id="<%= $pluralSlug %>-profile">
  
  <tbody>
    
<%
foreach ($columns as $column):
  $field = $column['field'];
  $title = $column['title'];
  if (in_array($field, $skip)) {
    continue;
  }
  $needle = '_id';
  if (($temp = strlen($field) - strlen($needle)) >= 0 && strpos($field, $needle, $temp) !== false) {
    $field = substr($field, 0, -3);
    $title = substr($title, 0, -3);
  }
%>
    <tr>
      <th><%= $title %></th>
      <td>
        <span data-field="<%= $field %>"></span>
      </td>
    </tr>
    
<% endforeach %>
  </tbody>
  
</table>
