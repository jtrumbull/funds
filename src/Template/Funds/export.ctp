<?php
/*
 |------------------------------------------------------------------------------
 | Template\Funds: Export
 |------------------------------------------------------------------------------
 */

$this->extend('/common/export');
$this->assign('slug', 'funds');

$this->navbar->active('funds');

$this->heading->title('Funds');
$this->heading->small('Export');
$this->heading->icon('download');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Funds', '/funds');
$this->breadcrumb->push('Export', '/funds/export');

?>

<div class="list-group">
  
  <a href="#" class="list-group-item">
    <span class="fa fa-file-excel-o fa-fw"></span>
    Export CSV File
  </a>
  
  <a href="<?= $this->url('/api/funds.json') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export JSON Object
  </a>
  
  <a href="<?= $this->url('/api/funds.xml') ?>" class="list-group-item" target="_blank">
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
echo $this->html->script('dist/funds');
?>
<script>
(function(doc, App){
  
  var Funds = App.Funds;
  var View = Funds.ExportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
