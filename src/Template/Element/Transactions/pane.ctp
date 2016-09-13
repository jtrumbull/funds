<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Transactions: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'transactions';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('Transactions/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Transactions/modal/read') ?>
<?= $this->element('Transactions/modal/create') ?>
<?= $this->element('Transactions/modal/update') ?>
<?= $this->element('Transactions/modal/delete') ?>
