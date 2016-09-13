<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Investments: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'investments';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('Investments/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Investments/modal/read') ?>
<?= $this->element('Investments/modal/create') ?>
<?= $this->element('Investments/modal/update') ?>
<?= $this->element('Investments/modal/delete') ?>
