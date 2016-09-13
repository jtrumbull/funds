<?php
/*
 |------------------------------------------------------------------------------
 | Template\Transactions: Read
 |------------------------------------------------------------------------------
 */

$id = $transaction;
$name = $transaction->name;

$this->extend('/common/read');
$this->assign('slug', 'transactions');

$this->navbar->active('transactions');

$this->heading->title('Transactions');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Transactions', '/transactions');
$this->breadcrumb->push($name, '/transactions/' . $id);

?>

<?= $this->element('Transactions/profile') ?>

<?= $this->element('Transactions/modal/update') ?>
<?= $this->element('Transactions/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Tabs
 |------------------------------------------------------------------------------
 */

$this->tabs->push([ 'title' => 'Comments', 'icon' => 'comments', 'element' => 'comments/pane' ]);
$this->tabs->push([ 'title' => 'Attachments', 'icon' => 'paperclip fa-flip-horizontal', 'element' => 'attachments/pane' ]);
?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/transactions');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Transactions = App.Transactions;
  var Model = Transactions.Model;
  var View = Transactions.ReadView;
  
  var model = new Model(<?= json_encode($transaction) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
