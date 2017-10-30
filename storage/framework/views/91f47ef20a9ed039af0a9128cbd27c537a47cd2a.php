<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <style>
    .c{
    	float: right;
    }
    .g {//ul
        list-style-type: none;
        margin: 0px;
        padding: 5px;
        overflow: hidden;
        background-color: #98cee0;
        font-size: 15px;

    }
    li a {
        display: block;
        color: black;
        text-align: center;
        padding: 14px 30px;
        text-decoration: none;
    }
    .k {
        float: left;
    }
    li a:hover {
        background-color: #ddeff5;
    }
    .a{
      margin-top: 50px;
      margin-right: 80px;
      float: center;
    }
      .b{
        margin-top: 100px;
      }
      .f{//div
         margin-top: 0px;
         color: black;
         font-size:50px;
      	 background-color: white;
      }
    </style>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
  <br><br><br><br><br><br><br><br>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="f">
            <left> <img src="<?php echo e(url('Logo_Corumba.jpg')); ?>" alt="logo" width="100" height="100"> </left>
            <img class="c" src="<?php echo e(url('selosim.jpg')); ?>" alt="logo" width="100" height="100">
            Aaaaaaaaaaaaaaaa
          </div>
          <ul class="g">
            <li class="k"><a href="#">Relatórios</a></li>
            <li class="k"><a href="<?php echo e(route('organizations.index')); ?>">Empresas</a></li>
            <?php if(!Auth::guest()): ?>
              <li class="k"><a href="/auth/logout">Logout</a></li>
            <?php endif; ?>
          </ul>



        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
