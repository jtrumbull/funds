<?php
/*
 |------------------------------------------------------------------------------
 | Template\Transactions: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'transactions');

$this->navbar->active('transactions');

$this->heading->title('Transactions');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Transactions', '/transactions');

?>

<?= $this->element('Transactions/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Transactions/modal/create') ?>
<?= $this->element('Transactions/modal/update') ?>
<?= $this->element('Transactions/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/transactions');
?>
<script>
(function(doc, App){
  
  var Transactions = App.Transactions;
  var Collection = Transactions.Collection;
  var View = Transactions.IndexView;
  
  var collection = new Collection(<?= json_encode($transactions) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>