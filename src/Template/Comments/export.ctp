<?php
/*
 |------------------------------------------------------------------------------
 | Template\Comments: Export
 |------------------------------------------------------------------------------
 */

$this->extend('/common/export');
$this->assign('slug', 'comments');

$this->navbar->active('comments');

$this->heading->title('Comments');
$this->heading->small('Export');
$this->heading->icon('download');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Comments', '/comments');
$this->breadcrumb->push('Export', '/comments/export');

?>

<div class="list-group">
  
  <a href="#" class="list-group-item">
    <span class="fa fa-file-excel-o fa-fw"></span>
    Export CSV File
  </a>
  
  <a href="<?= $this->url('/api/comments.json') ?>" class="list-group-item" target="_blank">
    <span class="fa fa-file-code-o fa-fw"></span>
    Export JSON Object
  </a>
  
  <a href="<?= $this->url('/api/comments.xml') ?>" class="list-group-item" target="_blank">
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
echo $this->html->script('dist/comments');
?>
<script>
(function(doc, App){
  
  var Comments = App.Comments;
  var View = Comments.ExportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
