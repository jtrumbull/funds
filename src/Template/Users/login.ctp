<?php
/*
 |----------------------------------------------------------------------------
 | Template\Users: Login
 |----------------------------------------------------------------------------
 */
?>

<div class="row center-box">
  
  <div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-default">
      
      <div class="panel-heading">
        <h3 class="panel-title">
          <span class="fa fa-user"></span>
          Login
        </h3>
      </div>
      
      <div class="panel-body">
        <?= $this->element('users/form/login') ?>
      </div>
      
      <div class="panel-footer">
        <a href="<?= $this->url('/register') ?>">Not an existing user?</a>
      </div>
      
    </div>
    
  </div>
  
</div>

<?php
/*
 |----------------------------------------------------------------------------
 | Javascript
 |----------------------------------------------------------------------------
 */

$this->start('script');
echo $this->html->script('dist/users');
?>
<script>
(function(win, doc, App){
  
  var Users = App.Users;
  var Model = Users.Model;
  var View = Users.LoginView;
  
  var model = new Model(<?= json_encode($user) ?>);
  
  var view = new View({
    model: model,
    el: doc.getElementById('content')
  });
  
  view.render();
  
}(window, document, App));
</script>
<?php $this->end() ?>
