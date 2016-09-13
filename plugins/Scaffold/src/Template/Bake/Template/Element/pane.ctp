<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\<%= $pluralName %>: Pane
 |------------------------------------------------------------------------------
 */

$slug = '<%= $pluralSlug %>';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('<%= $pluralName %>/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('<%= $pluralName %>/modal/read') ?>
<?= $this->element('<%= $pluralName %>/modal/create') ?>
<?= $this->element('<%= $pluralName %>/modal/update') ?>
<?= $this->element('<%= $pluralName %>/modal/delete') ?>
