<?php
/*
 |------------------------------------------------------------------------------
 | Template\Comments: Read
 |------------------------------------------------------------------------------
 */

$id = $comment;
$name = $comment->name;

$this->extend('/common/read');
$this->assign('slug', 'comments');

$this->navbar->active('comments');

$this->heading->title('Comments');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Comments', '/comments');
$this->breadcrumb->push($name, '/comments/' . $id);

?>

<?= $this->element('Comments/profile') ?>

<?= $this->element('Comments/modal/update') ?>
<?= $this->element('Comments/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Tabs
 |------------------------------------------------------------------------------
 */

$this->tabs->push([ 'title' => 'Comments', 'icon' => 'comments', 'element' => 'comments/pane' ]);
$this->tabs->push([ 'title' => 'Attachments', 'icon' => 'paperclip fa-flip-horizontal', 'element' => 'attachments/pane' ]);
?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Comments = App.Comments;
  var Model = Comments.Model;
  var View = Comments.ReadView;
  
  var model = new Model(<?= json_encode($comment) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
