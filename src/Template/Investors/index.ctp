<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investors: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'investors');

$this->navbar->active('investors');

$this->heading->title('Investors');
$this->heading->icon('users');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investors', '/investors');

?>

<?= $this->element('Investors/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Investors/modal/create') ?>
<?= $this->element('Investors/modal/update') ?>
<?= $this->element('Investors/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/investors');
?>
<script>
(function(doc, App){
  
  var Investors = App.Investors;
  var Collection = Investors.Collection;
  var View = Investors.IndexView;
  
  var collection = new Collection(<?= json_encode($investors) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>