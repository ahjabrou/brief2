<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Formulaire de publication</title>
</head>

<body>
    <?php 
       if(isset($_GET['error'])): ?>
         <p><?php echo $_GET['error']; ?></p>
         <?php endif ?>


  <form action="uploadtodb.php" method="POST" enctype="multipart/form-data"style="margin-top: 30px; margin-left: 250px;">
    <div class="card col-sm-4 mb-6 m-auto" style="width: 45rem; box-shadow: 0 1px 3px 1px rgba(201, 201, 201, 0.5);">
      <div class="card-body col-sm-4 mb-6 m-auto" style="width: 45rem">
        <h1 style="text-align:center">Publication</h1>
        <div class="col-sm-4 mb-6 m-auto" style="width: 20rem">
          <label for="name" class="form-label">Titre de la publication</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="écrivez le nom" maxlength="100">
        </div>
        <div class="col-sm-4 mb-6 m-auto" style="width: 20rem">
          <label for="choice" class="form-label">Type de la publication</label>
          <select class="form-select" aria-label="Default select example" name="choice">
            <option selected>Choisissez...</option>
            <option>Restaurant</option>
            <option>Conseil</option>
            <option>Recette</option>
            <option>Retour d'expérience</option>
          </select>
        </div>
        <div class="col-sm-4 mb-6 m-auto" style="width: 20rem">
          <label for="file" class="form-label">image</label>
          <input class="form-control" type="file" name="image" id="file" data-maxFilesize="60">
        </div>
        <div class="col-sm-4 mb-6 m-auto" style="width: 20rem">
          <label for="text" class="form-label">Corps du message</label>
          <textarea class="form-control" id="text" rows="5" name="message" maxlength="500"></textarea>
        </div>
        <br>
        <div class="col-sm-4 mb-6 m-auto" style="width: 20rem ">
          <button type="submit" name="submit" class="btn btn-outline-info">Soumettre</button>
        </div>
      </div>
    </div>
  </form>
</body>

</html>