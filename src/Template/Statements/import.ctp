<?php
/*
 |------------------------------------------------------------------------------
 | Template\Statements: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'statements');

$this->navbar->active('statements');

$this->heading->title('Statements');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Statements', '/statements');
$this->breadcrumb->push('Import', '/statements/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Statements/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Statements/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Statements/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Statements/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('statements-import-wizzard');
?>

<?= $this->tabs->render() ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/statements');
?>
<script>
(function(doc, App){
  
  var Statements = App.Statements;
  var View = Statements.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
