<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Funds: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'funds';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('Funds/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Funds/modal/read') ?>
<?= $this->element('Funds/modal/create') ?>
<?= $this->element('Funds/modal/update') ?>
<?= $this->element('Funds/modal/delete') ?>
