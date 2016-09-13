<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investments: Read
 |------------------------------------------------------------------------------
 */

$id = $investment->id;
$name = $investment->name;
$name = $id;

$this->extend('/common/read');
$this->assign('slug', 'investments');

$this->navbar->active('investments');

$this->heading->title('Investments');
$this->heading->small('Profile');
$this->heading->icon('file-o');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investments', '/investments');
$this->breadcrumb->push($name, '/investments/' . $id);

?>

<?= $this->element('Investments/profile') ?>

<?= $this->element('Investments/modal/update') ?>
<?= $this->element('Investments/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Tabs
 |------------------------------------------------------------------------------
 */

$this->tabs->push([ 'title' => 'Transactions', 'icon' => 'exchange', 'element' => 'transactions/pane' ]);
$this->tabs->push([ 'title' => 'Statements', 'icon' => 'file-pdf-o', 'element' => 'statements/pane' ]);
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
echo $this->html->script('dist/investments');
echo $this->html->script('dist/transactions');
echo $this->html->script('dist/statements');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Investments = App.Investments;
  var Model = Investments.Model;
  var View = Investments.ReadView;
  
  var model = new Model(<?= json_encode($investment) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
