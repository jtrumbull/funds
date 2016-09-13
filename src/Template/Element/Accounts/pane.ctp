<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Accounts: Pane
 |------------------------------------------------------------------------------
 */

$slug = 'accounts';
?>

<?= $this->element('table/toolbar>', [
  'id' => $slug . '-toolbar',
  'link' => true,
  'unlink' => true
]) ?>

<?= $this->element('Accounts/table') ?>
<?= $this->element('table/pager', ['id' => $slug . '-table-pager']) ?>

<?= $this->element('Accounts/modal/read') ?>
<?= $this->element('Accounts/modal/create') ?>
<?= $this->element('Accounts/modal/update') ?>
<?= $this->element('Accounts/modal/delete') ?>
<?= $this->element('Accounts/modal/link') ?>
<?= $this->element('Accounts/modal/unlink') ?>
