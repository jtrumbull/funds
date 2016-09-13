<?php
/*
 |------------------------------------------------------------------------------
 | Template\Offerings: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'offerings');

$this->navbar->active('offerings');

$this->heading->title('Offerings');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Offerings', '/offerings');
$this->breadcrumb->push('Import', '/offerings/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Offerings/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Offerings/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Offerings/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Offerings/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('offerings-import-wizzard');
?>

<?= $this->tabs->render() ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/offerings');
?>
<script>
(function(doc, App){
  
  var Offerings = App.Offerings;
  var View = Offerings.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
