<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Lojin</title>
</head>

<body class="text-center">

  <main class="form-signin">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>
    <form method="post" action="<?= base_url(); ?>/login/process">
      <?= csrf_field(); ?>
      <h1 class="h3 mb-3 fw-normal">Login</h1>
      <input type="text" name="username" id="username" placeholder="Username" class="form-control" required autofocus>
      <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
      <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
    </form>
  </main>



</body>

</html>