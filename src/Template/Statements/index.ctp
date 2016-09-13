<?php
/*
 |------------------------------------------------------------------------------
 | Template\Statements: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'statements');

$this->navbar->active('statements');

$this->heading->title('Statements');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Statements', '/statements');

?>

<?= $this->element('Statements/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Statements/modal/create') ?>
<?= $this->element('Statements/modal/update') ?>
<?= $this->element('Statements/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/statements');
?>
<script>
(function(doc, App){
  
  var Statements = App.Statements;
  var Collection = Statements.Collection;
  var View = Statements.IndexView;
  
  var collection = new Collection(<?= json_encode($statements) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>