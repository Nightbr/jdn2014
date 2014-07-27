<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login to JDN Web App</h1>
      <?php echo Form::open(array('action' => 'UserController@login')); ?>
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me" style="display: none;">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
        <?php echo Form::token(); ?>
      <?php echo Form::close() ?>
    </div>

    <div class="login-help"  style="display: none;">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>
  </section>
  <section class="about">
    <p class="about-author">
      &copy; 2014 - jdn 
  </section>
</body>
</html>
