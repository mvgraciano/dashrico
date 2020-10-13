<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ricoshops - Login</title>
  <link href="<?= theme("/assets/images/logo.svg") ?>" rel="shortcut icon">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="<?= theme("/assets/css/login.css") ?>" />
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <h4 class="mt-2 text-info">Ricoshops</h4>
      <?php if ($message): ?>
        <div class="alert alert-danger mx-1" role="alert">
          <?= $message ?>
        </div>
      <?php endif; ?>
      <form method="post" action="<?= url("/entrar"); ?>">
        <!-- < ?= flash(); ?> -->
        <?= csrf_input(); ?>
        <input type="text" id="email" class="fadeIn second" name="email" placeholder="E-mail">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Senha">
        <input type="submit" class="fadeIn fourth" value="Entrar">
      </form>
    </div>
  </div>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>