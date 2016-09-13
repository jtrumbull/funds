<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Layout: Header
 |------------------------------------------------------------------------------
 */

$user = $this->Auth->user();
?>

<nav class="navbar navbar-default" id="header-navbar">
  <div class="container">
    
    <!-- Brand and toggle -->
    <div class="navbar-header">
      <button type="button" 
              class="navbar-toggle collapsed" 
              data-toggle="collapse" 
              data-target="#header-navbar-collapse" 
              aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= $this->url('/') ?>">
        <span class="fa fa-archive"></span>
        Fund manager
      </a>
    </div>

    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="header-navbar-collapse">
      
      <ul class="nav navbar-nav">
        
        <?= $this->navbar->nav('Funds', '/funds') ?>
        <?= $this->navbar->nav('Investors', '/investors') ?>
        <?= $this->navbar->nav('Investments', '/investments') ?>
        
      </ul>
      
      <div class="navbar-right navbar-text">
        <span class="fa fa-user fa-fw"></span>
        <?php if ($user): ?>
        <a href="<?= $this->url('/profile') ?>"><?= $this->auth->display() ?></a>
        &nbsp;|&nbsp;
        <a href="<?= $this->url('/logout') ?>">Logout</a>
        <?php else: ?>
        <a href="<?= $this->url('/login') ?>">Login</a>
        &nbsp;|&nbsp;
        <a href="<?= $this->url('/register') ?>">Register</a>
        <?php endif ?>
      </div>
      
    </div>
    
  </div>
</nav>
