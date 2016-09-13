<?php
/*
 |------------------------------------------------------------------------------
 | Template\InvestorsAccounts: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'investors-accounts');

$this->navbar->active('investors-accounts');

$this->heading->title('Investors accounts');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investors accounts', '/investors-accounts');
$this->breadcrumb->push('Import', '/investors-accounts/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'InvestorsAccounts/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'InvestorsAccounts/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'InvestorsAccounts/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'InvestorsAccounts/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('investors-accounts-import-wizzard');
?>

<?= $this->tabs->render() ?>

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
  var View = InvestorsAccounts.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
