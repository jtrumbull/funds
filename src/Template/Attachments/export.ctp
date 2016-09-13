<?php
/*
 |------------------------------------------------------------------------------
 | Template\Attachments: Export
 |------------------------------------------------------------------------------
 */

$this->extend('/common/export');
$this->assign('slug', 'attachments');

$this->navbar->active('attachments');

$this->heading->title('Attachments');
$this->heading->small('Export');
$this->heading->icon('download');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Attachments', '/attachments');
$this->breadcrumb->push('Export', '/attachments/export');

?>

<div class="list-group">
  
  <a href="#" class="list-group-item">
    <span class="fa fa-file-excel-o fa-fw"></span>
    Export CSV File
  </a>
  
  <a href="<?= $this->url('/api/attachments.json') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export JSON Object
  </a>
  
  <a href="<?= $this->url('/api/attachments.xml') ?>" class="list-group-item" target="_blank">
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
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Attachments = App.Attachments;
  var View = Attachments.ExportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
