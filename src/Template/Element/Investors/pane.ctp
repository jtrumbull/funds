<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Investors: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'investors';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('Investors/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Investors/modal/read') ?>
<?= $this->element('Investors/modal/create') ?>
<?= $this->element('Investors/modal/update') ?>
<?= $this->element('Investors/modal/delete') ?>
