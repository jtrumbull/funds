<?php
/*
 |------------------------------------------------------------------------------
 | Template\Statements: Read
 |------------------------------------------------------------------------------
 */

$id = $statement;
$name = $statement->name;

$this->extend('/common/read');
$this->assign('slug', 'statements');

$this->navbar->active('statements');

$this->heading->title('Statements');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Statements', '/statements');
$this->breadcrumb->push($name, '/statements/' . $id);

?>

<?= $this->element('Statements/profile') ?>

<?= $this->element('Statements/modal/update') ?>
<?= $this->element('Statements/modal/delete') ?>

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
echo $this->html->script('dist/statements');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Statements = App.Statements;
  var Model = Statements.Model;
  var View = Statements.ReadView;
  
  var model = new Model(<?= json_encode($statement) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
