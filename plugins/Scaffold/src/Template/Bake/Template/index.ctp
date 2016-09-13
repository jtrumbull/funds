<?php
/*
 |------------------------------------------------------------------------------
 | Template\<%= $pluralName %>: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', '<%= $pluralSlug %>');

$this->navbar->active('<%= $pluralSlug %>');

$this->heading->title('<%= $pluralTitle %>');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('<%= $pluralTitle %>', '/<%= $pluralSlug %>');

?>

<?= $this->element('<%= $pluralName %>/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('<%= $pluralName %>/modal/create') ?>
<?= $this->element('<%= $pluralName %>/modal/update') ?>
<?= $this->element('<%= $pluralName %>/modal/delete') ?>

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
  var Collection = <%= $pluralName %>.Collection;
  var View = <%= $pluralName %>.IndexView;
  
  var collection = new Collection(<?= json_encode($<%= $pluralVar %>) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>