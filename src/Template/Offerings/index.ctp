<?php
/*
 |------------------------------------------------------------------------------
 | Template\Offerings: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'offerings');

$this->navbar->active('offerings');

$this->heading->title('Offerings');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Offerings', '/offerings');

?>

<?= $this->element('Offerings/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Offerings/modal/create') ?>
<?= $this->element('Offerings/modal/update') ?>
<?= $this->element('Offerings/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/offerings');
?>
<script>
(function(doc, App){
  
  var Offerings = App.Offerings;
  var Collection = Offerings.Collection;
  var View = Offerings.IndexView;
  
  var collection = new Collection(<?= json_encode($offerings) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>