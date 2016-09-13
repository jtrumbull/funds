<?php
/*
 |------------------------------------------------------------------------------
 | Template\Comments: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'comments');

$this->navbar->active('comments');

$this->heading->title('Comments');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Comments', '/comments');
$this->breadcrumb->push('Import', '/comments/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Comments/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Comments/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Comments/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Comments/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('comments-import-wizzard');
?>

<?= $this->tabs->render() ?>

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
  var View = Comments.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
