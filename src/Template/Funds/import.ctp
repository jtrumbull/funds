<?php
/*
 |------------------------------------------------------------------------------
 | Template\Funds: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'funds');

$this->navbar->active('funds');

$this->heading->title('Funds');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Funds', '/funds');
$this->breadcrumb->push('Import', '/funds/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Funds/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Funds/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Funds/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Funds/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('funds-import-wizzard');
?>

<?= $this->tabs->render() ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/funds');
?>
<script>
(function(doc, App){
  
  var Funds = App.Funds;
  var View = Funds.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
