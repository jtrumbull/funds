<?php
/*
 |------------------------------------------------------------------------------
 | Template\<%= $pluralName %>: Export
 |------------------------------------------------------------------------------
 */

$this->extend('/common/export');
$this->assign('slug', '<%= $pluralSlug %>');

$this->navbar->active('<%= $pluralSlug %>');

$this->heading->title('<%= $pluralTitle %>');
$this->heading->small('Export');
$this->heading->icon('download');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('<%= $pluralTitle %>', '/<%= $pluralSlug %>');
$this->breadcrumb->push('Export', '/<%= $pluralSlug %>/export');

?>

<div class="list-group">
  
  <a href="#" class="list-group-item">
    <span class="fa fa-file-excel-o fa-fw"></span>
    Export CSV File
  </a>
  
  <a href="<?= $this->url('/api/<%= $pluralSlug %>.json') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export JSON Object
  </a>
  
  <a href="<?= $this->url('/api/<%= $pluralSlug %>.xml') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export XML Object
  </a>
  
</div>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/<%= $pluralSlug %>');
?>
<script>
(function(doc, App){
  
  var <%= $pluralName %> = App.<%= $pluralName %>;
  var View = <%= $pluralName %>.ExportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
