<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investors: Export
 |------------------------------------------------------------------------------
 */

$this->extend('/common/export');
$this->assign('slug', 'investors');

$this->navbar->active('investors');

$this->heading->title('Investors');
$this->heading->small('Export');
$this->heading->icon('download');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investors', '/investors');
$this->breadcrumb->push('Export', '/investors/export');

?>

<div class="list-group">
  
  <a href="#" class="list-group-item">
    <span class="fa fa-file-excel-o fa-fw"></span>
    Export CSV File
  </a>
  
  <a href="<?= $this->url('/api/investors.json') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export JSON Object
  </a>
  
  <a href="<?= $this->url('/api/investors.xml') ?>" class="list-group-item" target="_blank">
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
echo $this->html->script('dist/investors');
?>
<script>
(function(doc, App){
  
  var Investors = App.Investors;
  var View = Investors.ExportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
