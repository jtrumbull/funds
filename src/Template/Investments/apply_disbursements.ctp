<?php
/*
 |------------------------------------------------------------------------------
 | Template\Investments: Index
 |------------------------------------------------------------------------------
 */

$this->extend('/common/basic');
$this->assign('slug', 'investments');

$this->navbar->active('investments');

$this->heading->title('Investments');
$this->heading->small('Apply disbursements');
$this->heading->icon('file-o');

$this->breadcrumb->push('Home', '/');
$this->breadcrumb->push('Investments', '/investments');
$this->breadcrumb->push('Apply disbursements', '/investments/apply-disbursements');

?>

<form>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">
          <input type="checkbox" />
        </th>
        <th>Client id</th>
        <th>Amount</th>
        <th>Type</th>
      </tr>
    </thead>
    
    <tbody>
    <?php foreach ($investments as $investment): ?>
      <tr>
        <td class="text-center">
          <input type="checkbox" checked />
        </td>
        <td class="text-center"><?= $investment['id'] ?></td>
        <td class="text-center">
          <input class="form-control" value="<?= $investment['preferred_payment'] ?>" />
        </td>
        <td>Preferred payment</td>
      </tr>  
    <?php endforeach ?>
    </tbody>
    
  </table>
  
</form>

<?php
/*
 |------------------------------------------------------------------------------
 | Sidebar
 |------------------------------------------------------------------------------
 */
  
$this->start('sidebar');
?>
<div class="list-group">

  <a class="list-group-item" href="<?= $this->url('/investments') ?>">
    <span class="fa fa-arrow-circle-o-left fa-fw"></span>
    Back to Index
  </a>

</div>
<?php $this->end() ?>

<?php
/*
 |------------------------------------------------------------------------------
 | Javascript
 |------------------------------------------------------------------------------
 */
  
$this->start('script');
echo $this->html->script('dist/investments');
?>
<script>
(function(doc, App){
  
  var Investments = App.Investments;
  var Collection = Investments.Collection;
  var View = Investments.IndexView;
  
  var collection = new Collection(<?= json_encode($investments) ?>);
  
  var view = new View({
    collection: collection,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(document, App));
</script>
<?php $this->end() ?>