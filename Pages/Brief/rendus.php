<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des brief</title>
    <link rel="stylesheet" href="../../node_modules/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../asset/css/style.css">
    <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION = array();
    header('Location: ../../index.php');
    exit();
}
?>
        <div id="loading-overlay">
            <div class="lds-default">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light elevation-4 top-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa-solid fa-chevron-down"></i>
                        <span class="d-none d-md-inline">
                            <?php 
                    if(isset($_SESSION['email']) && $_SESSION['email'] === 'user@gmail.com') {
                        echo 'Ahmed ben ali';
                    } else {
                        echo 'Formateur';
                    }
                ?>

                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-footer">
                            <form id="logout-form" action="" method="POST">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <input type="submit" name="logout" value="Déconnexion"
                                    class="btn btn-default btn-flat float-right logout">
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4 side-menu">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                    <img src="../../img/solicode.png" class="img-circle elevation-2 logo" alt="">
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <?php 
                    if(isset($_SESSION['email']) && $_SESSION['email'] === 'user@gmail.com') {
                        ?>
                        <li class="nav-item">
                            <a href="../dashboard.php" class="nav-link">
                                <i class="fa-solid fa-house"></i>

                                <p>Table de board</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link">
                                <i class="fa-solid fa-list-check"></i>

                                <p>Briefs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa-solid fa-download"></i>

                                <p>Rendus</p>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a href="../dashboard.php" class="nav-link">
                                <i class="fa-solid fa-house"></i>

                                <p>Table de board</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link active">
                                <i class="fa-solid fa-list-check"></i>

                                <p>Brief</p>
                            </a>
                        </li>
                        <?php
                    }
                ?>
                    </ul>
                </nav>

            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    <div class="p-4">
                        <div class="board d-flex justfiy-content-around briefs">
                            <?php if($_SESSION['email'] && $_SESSION['email'] === 'user@gmail.com'){
                                echo '<h1 class="card-title">Mes rendus</h1>';
                            }else{
                              ?>
                            <h1 class="card-title"><?php echo $_GET["brief"];?></h1>
                            <a href="./index.php" class="btn btn-primary btn-add">Retour</a>

                            <?php
                            }
                            ?>
                        </div>

                        <div class="card mt-5 tableau-card elevation-2">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <?php 
                                                if(isset($_SESSION["email"]) && $_SESSION["email"]==="formateur@gmail.com"){
                                                   echo '<th>Nom</th>
                                                   <th>prenom</th>';
                                                   
                                                }else if(isset($_SESSION["email"]) && $_SESSION["email"]==="user@gmail.com"){
                                                    echo '<th>Nom de brief</th>';
                                                }
                                            ?>
                                            <th>Livrable</th>
                                            <?php
                                            if(isset($_SESSION["email"]) && $_SESSION["email"]==="formateur@gmail.com"){
                                                echo '<th>Etat de validation</th>
                                                ';
                                                
                                             }
                                            ?>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        if(isset($_SESSION["email"]) && $_SESSION["email"]==="formateur@gmail.com"){
                                            ?>
                                        <tr>
                                            <td>Ahmed</td>
                                            <td>Ben ali</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-google-drive"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-solid fa-link"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="validation">Valid</span>
                                            </td>

                                            <td class='actions'>
                                                <?php 

                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                                    echo '<a href="./rendus.php" class="btn btn-edit" data-toggle="modal"
                                                    data-target="#modal-remarque">
                                                      <i class="fa-solid fa-plus"></i>
                                                      Remarque
                                                     </a>';
                                                    echo '<a href="./rendus.php" class="btn btn-cor" data-toggle="modal"
                                                    data-target="#modal-default">
                                                    Valider les compétences
                                                     </a>';
                                                     echo '<a href="#" class="btn btn-cor disabled-link">Valider le brief</a>';
                                                     echo '<a href="" class="btn btn-supp">
                                                      Invalid
                                                    </a>';
                                                    
                                                }
                                                
                                                
                                                ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Younes</td>
                                            <td>Slimani</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-google-drive"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-solid fa-link"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="validation">Valid</span>
                                            </td>

                                            <td class='actions'>
                                                <?php 

                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                                    echo '<a href="./rendus.php" class="btn btn-edit" data-toggle="modal"
                                                    data-target="#modal-remarque">
                                                      <i class="fa-solid fa-plus"></i>
                                                      Remarque
                                                     </a>';
                                                     echo '<a href="./rendus.php" class="btn btn-cor" data-toggle="modal"
                                                     data-target="#modal-default">
                                                     Valider les compétences
                                                      </a>';
                                                      echo '<a href="#" class="btn btn-cor disabled-link">Valider le brief</a>';
                                                       echo '<a href="" class="btn btn-supp">
                                                       Invalid
                                                     </a>';
                                                }
                                                
                                                
                                                ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Amal</td>
                                            <td>ben charki</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-google-drive"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i>
                                                </a>
                                                <a href="">
                                                    <i class="fa-solid fa-link"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <span>-</span>
                                            </td>

                                            <td class='actions'>
                                                <?php 

                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                                    echo '<a href="./rendus.php" class="btn btn-edit" data-toggle="modal"
                                                    data-target="#modal-remarque">
                                                      <i class="fa-solid fa-plus"></i>
                                                      Remarque
                                                     </a>';
                                                     echo '<a href="./rendus.php" class="btn btn-cor" data-toggle="modal"
                                                     data-target="#modal-default">
                                                     Valider les compétences
                                                      </a>';
                                                      echo '<a href="#" class="btn btn-cor" 
                                                      >
                                                      Valider le brief
                                                       </a>';
                                                       echo '<a href="" class="btn btn-supp">
                                                         Invalid
                                                       </a>';
                                                }
                                                
                                                
                                                ?>

                                            </td>
                                        </tr>
                                        <?php
                                        }else if(isset($_SESSION["email"]) && $_SESSION["email"] === 'user@gmail.com'){
                                            ?>
                                        <tr>
                                            <td class="nom-brief">Gestion de bibliotheque</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i>
                                                </a>
                                                <!-- <a href="">
                                                    <i class="fa-brands fa-google-drive"></i>
                                                </a> -->
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i>
                                                </a>
                                                <!-- <a href="">
                                                    <i class="fa-solid fa-link"></i>
                                                </a> -->
                                            </td>

                                            <td class='actions'>
                                                <a href="#" class="btn btn-cor" data-toggle="modal"
                                                    data-target="#modal-edit">
                                                    Editer
                                                </a>
                                                <a href="#" class="btn btn-edit disabled-link" data-toggle="modal"
                                                    data-target="#modal-ajouter">
                                                    Ajouter
                                                </a>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="nom-brief">Gestion une agence d'immeuble</td>
                                            <td class="rendus">
                                                <a href="">
                                                    <i class="fa-brands fa-github"></i>
                                                </a>
                                                <!-- <a href="">
                                                    <i class="fa-brands fa-google-drive"></i>
                                                </a> -->
                                                <a href="">
                                                    <i class="fa-brands fa-figma"></i>
                                                </a>
                                                <!-- <a href="">
                                                    <i class="fa-solid fa-link"></i>
                                                </a> -->
                                            </td>

                                            <td class='actions'>
                                                <a href="#" class="btn btn-cor" data-toggle="modal"
                                                    data-target="#modal-edit">
                                                    Editer
                                                </a>
                                                <a href="#" class="btn btn-edit disabled-link" data-toggle="modal"
                                                    data-target="#modal-ajouter">
                                                    Ajouter
                                                </a>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="nom-brief">Syndic</td>
                                            <td class="rendus">
                                               -
                                            </td>

                                            <td class='actions'>
                                                <a href="#" class="btn btn-cor disabled-link" data-toggle="modal"
                                                    data-target="#modal-edit">
                                                    Editer
                                                </a>

                                                <a href="#" class="btn btn-edit" data-toggle="modal"
                                                    data-target="#modal-ajouter">
                                                    Ajouter
                                                </a>

                                            </td>
                                        </tr>


                                        <?php
                                        }
                                        
                                        
                                        ?>






                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer paginate">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $_GET["brief"]; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Compétence</th>
                                    <th>Niveau</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maquetter une application</td>
                                    <td>Adapter</td>


                                    <td class='actions'>

                                        <a href="#" class="btn btn-cor">
                                            Valid
                                        </a>
                                        <a href="#" class="btn btn-supp">
                                            Invalid
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Réaliser une interface utilisateur web statique et adaptable</td>
                                    <td>Adapter</td>

                                    <td class='actions'>

                                        <a href="#" class="btn btn-cor">
                                            Valid
                                        </a>

                                        <a href="#" class="btn btn-supp">
                                            Invalid
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
                    </div>
                </div>

            </div>

        </div>




        <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editer livrable de Gestion de bibliotheque</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group comp">
                            <label for="livrable-edit">Saisir le livrable</label>
                            <select name="livrable[]" id="livrable-edit" class="form-control" multiple="multiple"
                                required>
                                <option value="https://github.com/Ahmed-ben-ali/Gestion_de_bibliotheque" selected>
                                    https://github.com/Ahmed-ben-ali/Gestion_de_bibliotheque</option>
                                <option value="https://www.figma.com/file/zv1iVm5gS1A0EaNT8lVGS1/" selected>
                                    https://www.figma.com/file/zv1iVm5gS1A0EaNT8lVGS1/</option>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
                        <button type="button" class="btn btn-primary">Editer</button>
                    </div>
                </div>

            </div>

        </div>

        <div class="modal fade" id="modal-ajouter" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter livrable de Gestion de bibliotheque</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group comp">
                            <label for="livrable-add">Saisir le livrable</label>
                            <select name="livrable[]" id="livrable-add" class="form-control" multiple="multiple"
                                required>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
                        <button type="button" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>

            </div>

        </div>


        <div class="modal fade" id="modal-remarque" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Donner une remarque</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="form">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="remarque">Remarque</label>
                                    <input type="text" class="form-control" id="remarque"
                                        placeholder="Entrer le remarque">
                                </div>


                            </div>

                        </form>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
                        <button type="button" class="btn btn-primary">Donner</button>
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer -->
        <?php include '../../layouts/footer.php'; ?>

    </div>




    <script src="../../node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="../../node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../node_modules/admin-lte/dist/js/adminlte.min.js"></script>
    <script src="../../asset/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        console.log('Document ready - Select2 initialization');
        $('#livrable-add').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            multiple: true
        });
    });
    $(document).ready(function() {
        console.log('Document ready - Select2 initialization');
        $('#livrable-edit').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            multiple: true
        });
    });
    </script>


</body>

</html>