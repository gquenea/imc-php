<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?></title>
  <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <nav class="navbar nav-expand-lg navbar-light bg-dark mb-5">
    <a href="/imc-php" class="navbar-brand ms-3">Imc Php</a>

    <?php if (!isset($_SESSION['user'])) {
    ?>
      <form action="?type=user&action=signIn" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit"> Se connecter</button>
      </form>
      <a class="btn btn-info me-3" href="?type=user&action=signUp">Créer un compte</a>
      
    <?php } else { ?>
      <a class="btn btn-danger" href="?type=user&action=signOut">Se deconnecter</a>
      <a href="?type=user&action=profil"><img src="https://cdn.icon-icons.com/icons2/1769/PNG/512/4092564-about-mobile-ui-profile-ui-user-website_114033.png" alt="profil" width="50px"></a>
      <a class="btn btn-info" href="?type=imc&action=create">Calculer son IMC</a>
    <?php } ?>
    <a class="btn btn-info me-3" href="?type=imc&action=index">Voir tous les imc</a>
    

  </nav>
  <h1 class="text-center"><?= $pageTitle ?></h1>
  <div class="alert alert-warning alert-dismissible fade <?php if (isset($_GET['info'])) {
                                                            echo "show";
                                                          } ?>" role="alert">
    <?= $_GET['info'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <div class="container">
    

    <?= $pageContent ?>


  </div>





  <h1 class="mt-5">FIN DE PAGE</h1>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>