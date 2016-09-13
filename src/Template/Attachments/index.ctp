<?php
/*
 |------------------------------------------------------------------------------
 | Template\Attachments: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'attachments');

$this->navbar->active('attachments');

$this->heading->title('Attachments');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Attachments', '/attachments');

?>

<?= $this->element('Attachments/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Attachments/modal/create') ?>
<?= $this->element('Attachments/modal/update') ?>
<?= $this->element('Attachments/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Attachments = App.Attachments;
  var Collection = Attachments.Collection;
  var View = Attachments.IndexView;
  
  var collection = new Collection(<?= json_encode($attachments) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>