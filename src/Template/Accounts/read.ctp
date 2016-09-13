<?php
/*
 |------------------------------------------------------------------------------
 | Template\Accounts: Read
 |------------------------------------------------------------------------------
 */

$id = $account;
$name = $account->name;

$this->extend('/common/read');
$this->assign('slug', 'accounts');

$this->navbar->active('accounts');

$this->heading->title('Accounts');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Accounts', '/accounts');
$this->breadcrumb->push($name, '/accounts/' . $id);

?>

<?= $this->element('Accounts/profile') ?>

<?= $this->element('Accounts/modal/update') ?>
<?= $this->element('Accounts/modal/delete') ?>

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
echo $this->html->script('dist/accounts');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Accounts = App.Accounts;
  var Model = Accounts.Model;
  var View = Accounts.ReadView;
  
  var model = new Model(<?= json_encode($account) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
