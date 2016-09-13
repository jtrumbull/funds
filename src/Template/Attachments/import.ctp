<?php
/*
 |------------------------------------------------------------------------------
 | Template\Attachments: Import
 |------------------------------------------------------------------------------
 */

$this->extend('/common/import');
$this->assign('slug', 'attachments');

$this->navbar->active('attachments');

$this->heading->title('Attachments');
$this->heading->small('Import');
$this->heading->icon('upload');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Attachments', '/attachments');
$this->breadcrumb->push('Import', '/attachments/import');

?>

<?php
$this->tabs->push([ 'title' => 'Select file', 'element' => 'Attachments/wizzard/select' ]);
$this->tabs->push([ 'title' => 'Map fields', 'element' => 'Attachments/wizzard/map' ]);
$this->tabs->push([ 'title' => 'Review', 'element' => 'Attachments/wizzard/review' ]);
$this->tabs->push([ 'title' => 'Summary', 'element' => 'Attachments/wizzard/summary' ]);
$this->tabs->addClassName('wizzard');
$this->tabs->id('attachments-import-wizzard');
?>

<?= $this->tabs->render() ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var Attachments = App.Attachments;
  var View = Attachments.ImportView;
  
  var view = new View({
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
