<?php
/*
 |------------------------------------------------------------------------------
 | Template\Accounts: Export
 |------------------------------------------------------------------------------
 */

$this->extend('/common/export');
$this->assign('slug', 'accounts');

$this->navbar->active('accounts');

$this->heading->title('Accounts');
$this->heading->small('Export');
$this->heading->icon('download');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Accounts', '/accounts');
$this->breadcrumb->push('Export', '/accounts/export');

?>

<div class="list-group">
  
  <a href="#" class="list-group-item">
    <span class="fa fa-file-excel-o fa-fw"></span>
    Export CSV File
  </a>
  
  <a href="<?= $this->url('/api/accounts.json') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export JSON Object
  </a>
  
  <a href="<?= $this->url('/api/accounts.xml') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export XML Object
  </a>
  
</div>

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
  var View = Accounts.ExportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
