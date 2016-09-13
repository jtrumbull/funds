<?php
/*
 |------------------------------------------------------------------------------
 | Template\<%= $pluralName %>: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', '<%= $pluralSlug %>');

$this->navbar->active('<%= $pluralSlug %>');

$this->heading->title('<%= $pluralTitle %>');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('<%= $pluralTitle %>', '/<%= $pluralSlug %>');
$this->breadcrumb->push('Import', '/<%= $pluralSlug %>/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => '<%= $pluralName %>/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => '<%= $pluralName %>/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => '<%= $pluralName %>/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => '<%= $pluralName %>/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('<%= $pluralSlug %>-import-wizzard');
?>

<?= $this->tabs->render() ?>

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
  var View = <%= $pluralName %>.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
