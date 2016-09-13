<?php
/*
 |------------------------------------------------------------------------------
 | Template\Transactions: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'transactions');

$this->navbar->active('transactions');

$this->heading->title('Transactions');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Transactions', '/transactions');
$this->breadcrumb->push('Import', '/transactions/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Transactions/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Transactions/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Transactions/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Transactions/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('transactions-import-wizzard');
?>

<?= $this->tabs->render() ?>

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
  var View = Transactions.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
