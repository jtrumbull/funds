<?php
/*
 |------------------------------------------------------------------------------
 | Template\Offerings: Read
 |------------------------------------------------------------------------------
 */

$id = $offering;
$name = $offering->name;

$this->extend('/common/read');
$this->assign('slug', 'offerings');

$this->navbar->active('offerings');

$this->heading->title('Offerings');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Offerings', '/offerings');
$this->breadcrumb->push($name, '/offerings/' . $id);

?>

<?= $this->element('Offerings/profile') ?>

<?= $this->element('Offerings/modal/update') ?>
<?= $this->element('Offerings/modal/delete') ?>

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
echo $this->html->script('dist/offerings');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Offerings = App.Offerings;
  var Model = Offerings.Model;
  var View = Offerings.ReadView;
  
  var model = new Model(<?= json_encode($offering) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
