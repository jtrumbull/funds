<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investments: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'investments');

$this->navbar->active('investments');

$this->heading->title('Investments');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investments', '/investments');
$this->breadcrumb->push('Import', '/investments/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Investments/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Investments/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Investments/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Investments/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('investments-import-wizzard');
?>

<?= $this->tabs->render() ?>

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
  var View = Investments.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
