<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investors: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'investors');

$this->navbar->active('investors');

$this->heading->title('Investors');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investors', '/investors');
$this->breadcrumb->push('Import', '/investors/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Investors/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Investors/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Investors/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Investors/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('investors-import-wizzard');
?>

<?= $this->tabs->render() ?>

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
  var View = Investors.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
