<?php
/*
 |------------------------------------------------------------------------------
 | Template\Accounts: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'accounts');

$this->navbar->active('accounts');

$this->heading->title('Accounts');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Accounts', '/accounts');

?>

<?= $this->element('Accounts/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Accounts/modal/create') ?>
<?= $this->element('Accounts/modal/update') ?>
<?= $this->element('Accounts/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/accounts');
?>
<script>
(function(doc, App){
  
  var Accounts = App.Accounts;
  var Collection = Accounts.Collection;
  var View = Accounts.IndexView;
  
  var collection = new Collection(<?= json_encode($accounts) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>