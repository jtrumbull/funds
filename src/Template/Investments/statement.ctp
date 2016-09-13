<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investments: Statement
 |------------------------------------------------------------------------------
 */

use Cake\Core\Configure;
use Cake\Utility\Hash;

$this->layout = 'pdf';

function formatCurrency ($value) {
  if (!$value) {
    $value = '-';
  } else {
    $value = number_format($value, 2);
  }
  $html = '<span>';
  $html.= '<span>$</span> ';
  $html.= '<span>' . $value . '</span>';
  $html.= '</span>';
  return $html;
}

function formatPercent ($value) {
  if (!$value) {
    $value = '-';
  } else {
    $value = number_format($value, 3);
  }
  $html = '<span>';
  $html.= '<span>' . $value . '</span>';
  $html.= ' <span>%</span>';
  $html.= '</span>';
  return $html;
}

$date = new DateTimeImmutable($investment->date);
$maturity = $date->add(new DateInterval('P' . $investment->term . 'M'));
$investors = Hash::extract($investment->toArray(), 'account.investors.{n}.name');

$today = new DateTime();
$today->sub(new DateInterval('P1M'));

$transactionTypes = Configure::read('transactionTypes');
$transactions = [];
$balance = $investment->amount;
foreach ($investment->transactions as $transaction) {
  if ($transaction->type == 3) {
    $balance = $balance - $transaction->amount;
  }
  $transactions[] = [
    (new DateTime($transaction->date))->format('F, Y'),
    formatCurrency($transaction->amount),
    $transactionTypes[$transaction->type]
  ];
}

?>

<?php
/*
 |------------------------------------------------------------------------------
 | CSS
 |------------------------------------------------------------------------------
 */

$this->start('css');
?>

<style>
  small.pull-right {
    position: relative;
    top: 13px;
  }
  table.profile {
    width:100%;
    table-layout:fixed;
  }
  table.profile th::after {
    content: ':';
  }
  footer {
    background: #fbaf4c;
  }
  .page-header {
    border-bottom: 2px solid #fbaf4c;
  }
</style>

<?php $this->end() ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Header
 |------------------------------------------------------------------------------
 */

$this->start('header');
?>

<?php 
$this->end();

/*
 |------------------------------------------------------------------------------
 | Content
 |------------------------------------------------------------------------------
 */
?>

<h1 class="page-header">
  Investor statement
  <small class="pull-right">April, 2016</small>
</h1>

<table class="table table-bordered table-condensed profile">
  <tbody>
    
    <tr>
      <th>Fund name</th>
      <td><?= $investment->offering->fund->name ?></td>
    </tr>
    
    <tr>
      <th>Fund class</th>
      <td><?= $investment->offering->class ?></td>
    </tr>
    
    <tr>
      <th>Fund rate</th>
      <td><?= formatPercent($investment->offering->rate) ?></td>
    </tr>
    
  </tbody>
</table>

<table class="table table-bordered table-condensed profile">
  <tbody>
    
    <tr>
      <th>Investor name(s)</th>
      <td><?= implode(', ', $investors) ?></td>
    </tr>
    
    <tr>
      <th>Investor account</th>
      <td><?= $investment->account->name ?></td>
    </tr>
    
    <tr>
      <th>Accredited</th>
      <td>Yes</td>
    </tr>
    
  </tbody>
</table>

<table class="table table-bordered table-condensed profile">
  <tbody>
    
    <tr>
      <th>Investment amount</th>
      <td><?= formatCurrency($investment->amount) ?></td>
    </tr>
    
    <tr>
      <th>Investment deposit date</th>
      <td><?= $date->format('m/d/Y') ?></td>
    </tr>
    
    <tr>
      <th>Investment maturity date</th>
      <td><?= $maturity->format('m/d/Y') ?></td>
    </tr>
    
    <tr>
      <th>Investment Term</th>
      <td><?= $investment->term ?> Months</td>
    </tr>
    
  </tbody>
</table>

<table class="table table-bordered table-condensed profile">
  <tbody>
    
    <tr>
      <th>Principal balance</th>
      <td><?= formatCurrency($balance) ?></td>
    </tr>
    
    <tr>
      <th>Preferred payment this cycle</th>
      <td><?= formatCurrency(0) ?></td>
    </tr>
    
    <tr>
      <th>Total Preferred Payments</th>
      <td><?= formatCurrency(0) ?></td>
    </tr>
    
  </tbody>
</table>

<h2 class="page-header">Transaction summary</h2>

<table class="table table-bordered summary">
  <thead>
    <tr>
      <th>Period</th>
      <th>Amount</th>
      <th>Transaction type</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($transactions as $transaction): ?>
    <tr>
      <td><?= $transaction[0] ?></td>
      <td><?= $transaction[1] ?></td>
      <td><?= $transaction[2] ?></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<span class="help-block">
* If you have any questions or discrepancies please contact the Investor Relations Department by phone:<br/>
(877) 395-1290, or by email: mheineman@pprnoteco.com.
</span>

<?php
/*
 |------------------------------------------------------------------------------
 | Footer
 |------------------------------------------------------------------------------
 */

$this->start('footer');
?>

<i>www.pprnoteco.com/investors</i>

<?php $this->end() ?>