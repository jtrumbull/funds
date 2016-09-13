<?php
/*
 |------------------------------------------------------------------------------
 | Template\InvestorsAccounts: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'investors-accounts');

$this->navbar->active('investors-accounts');

$this->heading->title('Investors accounts');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investors accounts', '/investors-accounts');

?>

<?= $this->element('InvestorsAccounts/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('InvestorsAccounts/modal/create') ?>
<?= $this->element('InvestorsAccounts/modal/update') ?>
<?= $this->element('InvestorsAccounts/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/investors-accounts');
?>
<script>
(function(doc, App){
  
  var InvestorsAccounts = App.InvestorsAccounts;
  var Collection = InvestorsAccounts.Collection;
  var View = InvestorsAccounts.IndexView;
  
  var collection = new Collection(<?= json_encode($investorsAccounts) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>