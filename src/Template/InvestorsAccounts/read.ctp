<?php
/*
 |------------------------------------------------------------------------------
 | Template\InvestorsAccounts: Read
 |------------------------------------------------------------------------------
 */

$id = $investorsAccount;
$name = $investorsAccount->id;

$this->extend('/common/read');
$this->assign('slug', 'investors-accounts');

$this->navbar->active('investors-accounts');

$this->heading->title('Investors accounts');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investors accounts', '/investors-accounts');
$this->breadcrumb->push($name, '/investors-accounts/' . $id);

?>

<?= $this->element('InvestorsAccounts/profile') ?>

<?= $this->element('InvestorsAccounts/modal/update') ?>
<?= $this->element('InvestorsAccounts/modal/delete') ?>

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
echo $this->html->script('dist/investors-accounts');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var InvestorsAccounts = App.InvestorsAccounts;
  var Model = InvestorsAccounts.Model;
  var View = InvestorsAccounts.ReadView;
  
  var model = new Model(<?= json_encode($investorsAccount) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
