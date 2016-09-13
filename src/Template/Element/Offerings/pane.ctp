<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Offerings: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'offerings';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('Offerings/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Offerings/modal/read') ?>
<?= $this->element('Offerings/modal/create') ?>
<?= $this->element('Offerings/modal/update') ?>
<?= $this->element('Offerings/modal/delete') ?>
