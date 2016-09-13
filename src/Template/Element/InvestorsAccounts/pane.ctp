<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\InvestorsAccounts: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'investors-accounts';
?>

<?= $this->element('table/toolbar>', ['id' => $slug . '-toolbar']) ?>
<?= $this->element('InvestorsAccounts/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('InvestorsAccounts/modal/read') ?>
<?= $this->element('InvestorsAccounts/modal/create') ?>
<?= $this->element('InvestorsAccounts/modal/update') ?>
<?= $this->element('InvestorsAccounts/modal/delete') ?>
