
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

<nav class="navbar nav-expand-lg navbar-light bg-info mb-5"><a href="/hb_php/baseFramework" class="navbar-brand">BASE FRAMEWORK</a>

<!-- crée un lien "bouton" qui permet de céer un velo --> -->
      <a href="?type=velo&action=new" class="btn btn-danger">Créer un velo</a>

<!-- crée un lien "bouton" qui permet de voir toutes les informations -->
    <!-- <a href="?type=info&action=index" class="btn btn-success">Voir nos informations</a> -->

<!-- crée un lien "bouton" qui permet de créer une information -->
    <!-- <a href="?type=info&action=new" class="btn btn-warning">Créer une nouvelle information</a> -->

</nav>

<div class="alert alert-warning alert-dismissible fade <?php if($_GET['info']=='errDel'){ echo"show";}?>" role="alert">
  <strong>ERREUR</strong> Vélo non supprimer car n'existe pas 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="container">
            

            <?=  $pageContent ?>


</div>
        


<h1 class="mt-5" >FIN DE PAGE</h1>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>