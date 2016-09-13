<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investments: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/index');
$this->assign('slug', 'investments');

$this->navbar->active('investments');

$this->heading->title('Investments');
$this->heading->icon('file-o');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investments', '/investments');

?>

<?= $this->element('Investments/table') ?>
<?= $this->element('table/pager') ?>

<?= $this->element('Investments/modal/create') ?>
<?= $this->element('Investments/modal/update') ?>
<?= $this->element('Investments/modal/delete') ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Sidebar
 |------------------------------------------------------------------------------
 */
  
$this->start('sidebar');
?>
<div class="list-group">

  <a class="list-group-item" href="<?= $this->url('/investments/apply-disbursements') ?>">
    <span class="fa fa-usd fa-fw"></span>
    Apply disbursements
  </a>

  <a class="list-group-item" href="<?= $this->url('/') ?>">
    <span class="fa fa-file-pdf-o fa-fw"></span>
    Draft statements
  </a>

</div>
<?php $this->end() ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/investments');
?>
<script>
(function(doc, App){
  
  var Investments = App.Investments;
  var Collection = Investments.Collection;
  var View = Investments.IndexView;
  
  var collection = new Collection(<?= json_encode($investments) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>