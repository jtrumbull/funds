<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    
    <title>Fund manager</title>
    
    <!-- CSS -->
    <?php
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('font-awesome.min');
    echo $this->Html->css('bootstrap-datepicker.min');
    echo $this->Html->css('styles');
    echo $this->fetch('css');
    ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <header id="header">
      <?= $this->fetch('header') ?>
    </header>
    
    <div class="container" id="content">
      <?= $this->fetch('content') ?>
    </div>
    
    <footer id="footer">
      <?= $this->fetch('footer') ?>
    </footer>
    
  </body>
</html>
