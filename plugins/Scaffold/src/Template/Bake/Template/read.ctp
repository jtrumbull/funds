<?php
/*
 |------------------------------------------------------------------------------
 | Template\<%= $pluralName %>: Read
 |------------------------------------------------------------------------------
 */

$id = $<%= $singularVar %>;
$name = $<%= $singularVar %>-><%= $displayField %>;

$this->extend('/common/read');
$this->assign('slug', '<%= $pluralSlug %>');

$this->navbar->active('<%= $pluralSlug %>');

$this->heading->title('<%= $pluralTitle %>');
$this->heading->small('Profile');
$this->heading->icon('archive');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('<%= $pluralTitle %>', '/<%= $pluralSlug %>');
$this->breadcrumb->push($name, '/<%= $pluralSlug %>/' . $id);

?>

<?= $this->element('<%= $pluralName %>/profile') ?>

<?= $this->element('<%= $pluralName %>/modal/update') ?>
<?= $this->element('<%= $pluralName %>/modal/delete') ?>

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
echo $this->html->script('dist/<%= $pluralSlug %>');
echo $this->html->script('dist/comments');
echo $this->html->script('dist/attachments');
?>
<script>
(function(doc, App){
  
  var <%= $pluralName %> = App.<%= $pluralName %>;
  var Model = <%= $pluralName %>.Model;
  var View = <%= $pluralName %>.ReadView;
  
  var model = new Model(<?= json_encode($<%= $singularVar %>) ?>)
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>
