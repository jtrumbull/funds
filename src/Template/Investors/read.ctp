<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investors: Read
 |------------------------------------------------------------------------------
 */

$id = $investor;
$name = $investor->name;

$this->extend('/common/read');
$this->assign('slug', 'investors');

$this->navbar->active('investors');

$this->heading->title('Investors');
$this->heading->small('Profile');
$this->heading->icon('users');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investors', '/investors');
$this->breadcrumb->push($name, '/investors/' . $id);

?>

<?= $this->element('Investors/profile') ?>

<?= $this->element('Investors/modal/update') ?>
<?= $this->element('Investors/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Tabs
 |------------------------------------------------------------------------------
 */

$this->tabs->push([ 
  'title' => 'Accounts', 
  'icon' => 'bank', 
  'element' => 'accounts/pane' 
]);

$this->tabs->push([ 
  'title' => 'Statements', 
  'icon' => 'file-pdf-o', 
  'element' => 'statements/pane' 
]);

$this->tabs->push([ 
  'title' => 'Comments', 
  'icon' => 'comments', 
  'element' => 'comments/pane' 
]);

$this->tabs->push([ 
  'title' => 'Attachments',
  'icon' => 'paperclip fa-flip-horizontal',
  'element' => 'attachments/pane' 
]);

?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/investors');
echo $this->html->script('dist/accounts');
echo $this->html->script('dist/statements');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Investors = App.Investors;
  var Accounts = App.Accounts;
  var Model = Investors.Model;
  var View = Investors.ReadView;
  
  var model = new Model(<?= json_encode($investor) ?>);
  var accounts = new Accounts.Collection(<?= json_encode($accounts) ?>);
  
  var view = new View({
    model: model,
    el: doc.getElementById('content'),
    accounts: accounts
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
