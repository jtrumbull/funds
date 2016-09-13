<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Comments: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'comments';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('Comments/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Comments/modal/read') ?>
<?= $this->element('Comments/modal/create') ?>
<?= $this->element('Comments/modal/update') ?>
<?= $this->element('Comments/modal/delete') ?>
