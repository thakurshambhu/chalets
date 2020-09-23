<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <?= $this->Html->meta('icon') ?>

   
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('admin/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/nprogress.css') ?>
    <?= $this->Html->css('admin/custom.min.css') ?>
  </head>

<body class="login">
    
    <?= $this->Flash->render() ?>
       
            <?= $this->fetch('content') ?>
   
</body>
</html>
