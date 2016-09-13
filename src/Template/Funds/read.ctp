<?php
/*
 |------------------------------------------------------------------------------
 | Template\Funds: Read
 |------------------------------------------------------------------------------
 */

$id = $fund;
$name = $fund->name;

$this->extend('/common/read');
$this->assign('slug', 'funds');

$this->navbar->active('funds');

$this->heading->title('Funds');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Funds', '/funds');
$this->breadcrumb->push($name, '/funds/' . $id);

?>

<?= $this->element('Funds/profile') ?>

<?= $this->element('Funds/modal/update') ?>
<?= $this->element('Funds/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Tabs
 |------------------------------------------------------------------------------
 */

$this->tabs->push([ 'title' => 'Offerings', 'icon' => 'folder', 'element' => 'offerings/pane' ]);
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
echo $this->html->script('dist/funds');
echo $this->html->script('dist/offerings');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Funds = App.Funds;
  var Model = Funds.Model;
  var View = Funds.ReadView;
  
  var model = new Model(<?= json_encode($fund) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
