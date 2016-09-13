<?php
/*
 |------------------------------------------------------------------------------
 | Template\Funds: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'funds');

$this->navbar->active('funds');

$this->heading->title('Funds');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Funds', '/funds');

?>

<?= $this->element('Funds/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Funds/modal/create') ?>
<?= $this->element('Funds/modal/update') ?>
<?= $this->element('Funds/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/funds');
?>
<script>
(function(doc, App){
  
  var Funds = App.Funds;
  var Collection = Funds.Collection;
  var View = Funds.IndexView;
  
  var collection = new Collection(<?= json_encode($funds) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>