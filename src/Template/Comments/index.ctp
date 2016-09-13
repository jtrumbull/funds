<?php
/*
 |------------------------------------------------------------------------------
 | Template\Comments: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'comments');

$this->navbar->active('comments');

$this->heading->title('Comments');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Comments', '/comments');

?>

<?= $this->element('Comments/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Comments/modal/create') ?>
<?= $this->element('Comments/modal/update') ?>
<?= $this->element('Comments/modal/delete') ?>

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
  var Collection = Comments.Collection;
  var View = Comments.IndexView;
  
  var collection = new Collection(<?= json_encode($comments) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>