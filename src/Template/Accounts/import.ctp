<?php
/*
 |------------------------------------------------------------------------------
 | Template\Accounts: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'accounts');

$this->navbar->active('accounts');

$this->heading->title('Accounts');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Accounts', '/accounts');
$this->breadcrumb->push('Import', '/accounts/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Accounts/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Accounts/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Accounts/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Accounts/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('accounts-import-wizzard');
?>

<?= $this->tabs->render() ?>

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
  var View = Accounts.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
