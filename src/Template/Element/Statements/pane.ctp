<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Statements: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'statements';
?>

<?= ''//$this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('Statements/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Statements/modal/read') ?>
<?= $this->element('Statements/modal/create') ?>
<?= $this->element('Statements/modal/update') ?>
<?= $this->element('Statements/modal/delete') ?>
