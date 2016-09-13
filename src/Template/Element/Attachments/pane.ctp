<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Attachments: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'attachments';
?>

<?= $this->element('table/toolbar>', [
  'id' => $slug . '-toolbar',
  'read' => false,
  'update' => false
]) ?>
<?= $this->element('Attachments/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Attachments/modal/read') ?>
<?= $this->element('Attachments/modal/create') ?>
<?= $this->element('Attachments/modal/update') ?>
<?= $this->element('Attachments/modal/delete') ?>
