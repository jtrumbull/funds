<?php
/*
 |------------------------------------------------------------------------------
 | Template\Attachments: Read
 |------------------------------------------------------------------------------
 */

$id = $attachment;
$name = $attachment->name;

$this->extend('/common/read');
$this->assign('slug', 'attachments');

$this->navbar->active('attachments');

$this->heading->title('Attachments');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Attachments', '/attachments');
$this->breadcrumb->push($name, '/attachments/' . $id);

?>

<?= $this->element('Attachments/profile') ?>

<?= $this->element('Attachments/modal/update') ?>
<?= $this->element('Attachments/modal/delete') ?>

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
echo $this->html->script('dist/attachments');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Attachments = App.Attachments;
  var Model = Attachments.Model;
  var View = Attachments.ReadView;
  
  var model = new Model(<?= json_encode($attachment) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
