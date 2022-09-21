<!doctype html>
<html lang="zxx">

<head>
  <link rel="stylesheet" href="bootstrap.css">
  <?php
  require_once('database/Connect_dataBase.php');
  // include('old/layout/head.php')
  ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-sm-2" type="text" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>


  <!------Tableau---------------->

  <div class="tableau mt-5">
    <div class="container">
      
      <div class="d-flex justify-content-between">
        <h4>Liste des produits</h4>
        <button class="btn btn-primary" id="btnadd" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Ajouter
        </button>

        <!-- Modal -->
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enregistrer un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
             
              <form action="traitements/produits/ajout.php" method="POST">
              <div class="modal-body">
                <!----------Formulaire-------------->
              
                <div class="form-group">
                  <label class="col-form-label mt-4" for="inputDefault">Libelle</label>
                  <input type="text" class="form-control" name="libelle" placeholder="Nom du Produit" id="inputDefault">
                  <label class="col-form-label mt-4" for="inputDefault">Code</label>
                  <input type="text" class="form-control" name="code" placeholder="Code du produit" id="inputDefault">

                  <div class="form-group">
                    <label class="form-label mt-4">Prix</label>
                    <input type="text" class="form-control" name="prix" placeholder="saisir prix du produit" id="inputDefault">
                    <label for="exampleTextarea" class="form-label mt-4"  >Description</label>
                    <textarea class="form-control"  name="description" id="exampleTextarea"  rows="3"></textarea>
                  </div>
                </div>

                <!-------End Formulaire----------------->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="add_produit" class="btn btn-primary">save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

      </div>

      <table class="table" id="matable">
        <thead>

          <tr>
            <th scope="col"> ID</th>
            <th scope="col">Libelle</th>
            <th scope="col">Code</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php

          $sql = ' SELECT * FROM produit';
          $result = $conn->query($sql);
          if ($result !== false) {
            foreach ($result as $item) {
          ?>

              <tr>
                <th scope="row"><?= $item['ID']; ?></th>
                <td> <?= $item['libelle']; ?></td>
                <td> <?= $item['code']; ?></td>
                <td> <?= $item['prix']; ?></td>
                <td> <?= $item['description']; ?></td>
                <td><a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalUptadte<?= $item['ID']; ?>">Uptade</a>
                <a href="" class="btn btn-danger">Delete</a>
              </td>

              <!---- Uptade modal-------->
                <div class="modal fade" id="exampleModalUptadte<?= $item['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier un produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    
                      <form action="traitements/produits/update.php" method="POST">
                      <div class="modal-body">
                        <!----------Formulaire-------------->
                      
                        <div class="form-group">
                          <label class="col-form-label mt-4" for="inputDefault">Libelle</label>
                          <input type="text" class="form-control" value="<?= $item['libelle']; ?>" name="libelle" placeholder="Nom du Produit" id="inputDefault">
                          <label class="col-form-label mt-4" for="inputDefault">Code</label>
                          <input type="text" class="form-control" value="<?= $item['code']; ?>" name="code" placeholder="Code du produit" id="inputDefault">

                          <div class="form-group">
                            <label class="form-label mt-4">Prix</label>
                            <input type="text" class="form-control" value="<?= $item['prix']; ?>" name="prix" placeholder="saisir prix du produit" id="inputDefault">
                            <input type="hidden" value="<?= $item['ID']; ?>" name="id">
                            <label for="exampleTextarea" class="form-label mt-4"  >Description</label>
                            <textarea class="form-control"   name="description" id="exampleTextarea"  rows="3"><?= $item['description']; ?></textarea>
                          </div>
                        </div>

                        <!-------End Formulaire----------------->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_produit" class="btn btn-primary">Save</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

              </tr>
          <?php                     }
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>

  <script src="js/js/bootstrap.js"></script>
</body>

</html>