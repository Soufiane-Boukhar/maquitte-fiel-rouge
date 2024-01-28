<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des brief</title>
    <link rel="stylesheet" href="../../node_modules/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../asset/css/style.css">
    <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css" />
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
                            <a href="#" class="nav-link active">
                                <i class="fa-solid fa-list-check"></i>

                                <p>Briefs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./rendus.php" class="nav-link">
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
                            <h1 class="card-title">Briefs</h1>
                            <?php 
                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                    echo '<a href="create.php" class="btn btn-primary btn-add">Ajouter</a>';
                                }
                            ?>

                        </div>

                        <div class="card mt-5 tableau-card elevation-2">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search"
                                            class="form-control searchINP float-right" placeholder="Search">
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
                                            <th>Ordre</th>
                                            <th>Titre</th>
                                            <?php 
                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'user@gmail.com'){
                                                    echo '<th>Etat de validation</th>
                                                    ';
                                                    echo '<th>Remarque de formateur</th>
                                                    ';
                                                }
                                            ?>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="nom-brief">Gestion de bibliotheque</td>
                                            <?php 
                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'user@gmail.com'){
                                                    echo ' <td>
                                                    <span class="validation">Valid</span>
                                                    </td>
                                                    ';
                                                    echo '<td>
                                                    <a href="" class="btn btn-show remarqueBTN" data-toggle="modal"
                                                    data-target="#modal-remarque">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    </td>
                                                    ';
                                                }
                                            ?>

                                            <td class='actions'>
                                                <a href="./detail.php?brief=Gestion de bibliotheque"
                                                    class="btn btn-show detailBTN">
                                                    Detail
                                                </a>
                                                <?php 

                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                                    echo '<a href="./rendus.php?brief=Gestion de bibliotheque" class="btn btn-cor">
                                                    Corrigé
                                                     </a>';
                                                     echo '<a href="./edit.php" class="btn btn-edit">
                                                       <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>';
                                                    echo '<a href="" class="btn btn-supp">
                                                       <i class="fa-solid fa-trash"></i>
                                                    </a>';
                                                }
                                                
                                                
                                                ?>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td class="nom-brief">Gestion une agence d'immeuble</td>

                                            <?php 
                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'user@gmail.com'){
                                                    echo ' <td>
                                                    <span class="invalid">Invalid</span>
                                                    </td>
                                                    ';
                                                    echo '<td>
                                                    <a href="" class="btn btn-show" data-toggle="modal"
                                                    data-target="#modal-remarque">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    </td>
                                                    ';
                                                }
                                            ?>

                                            <td class='actions'>
                                                <a href="./detail.php?brief=Gestion une agence d'immeuble"
                                                    class="btn btn-show">
                                                    Detail
                                                </a>
                                                <?php 

                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                                    echo '<a href="./rendus.php?brief=Gestion une agence d\'immeuble" class="btn btn-cor">
                                                    Corrigé
                                                     </a>';
                                                     echo '<a href="./edit.php" class="btn btn-edit">
                                                     <i class="fa-solid fa-pen-to-square"></i>
                                                      </a>';
                                                     echo '<a href="" class="btn btn-supp">
                                                     <i class="fa-solid fa-trash"></i>
                                                     </a>';
                                                }
                                                
                                                
                                                ?>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td class="nom-brief">Syndic</td>

                                            <?php 
                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'user@gmail.com'){
                                                    echo '  <td>
                                                    <span class="validation">Valid</span>
                                                    </td>
                                                    ';
                                                    echo '<td>
                                                    <a href="" class="btn btn-show" data-toggle="modal"
                                                    data-target="#modal-remarque">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    </td>
                                                    ';
                                                }
                                            ?>


                                            <td class='actions'>
                                                <a href="./detail.php?brief=Syndic" class="btn btn-show">
                                                    Detail
                                                </a>
                                                <?php 

                                                if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                                    echo '<a href="./rendus.php?brief=Syndic" class="btn btn-cor">
                                                    Corrigé
                                                     </a>';
                                                     echo '<a href="./edit.php" class="btn btn-edit">
                                                     <i class="fa-solid fa-pen-to-square"></i>
                                                     </a>';
                                                     echo '<a href="" class="btn btn-supp">
                                                     <i class="fa-solid fa-trash"></i>
                                                     </a>';
                                                }
                                                
                                                
                                                ?>


                                            </td>
                                        </tr>



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

        <div class="modal fade" id="modal-remarque" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Remarque</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="form">
                            <div class="card-body">

                                <div class="form-group">
                                    <p>Bonne travail ahmed mais il faut changer le titre du document (la balise title)
                                    </p>
                                </div>


                            </div>

                        </form>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
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
    <script>
    if (annyang) {
        var commands = {
            'naviguer sur ajouter': function() {
                window.location.href = './create.php';
            },

            'naviguer sur modifier': function() {
                window.location.href = './edit.php';
            },

            'naviguer sur le détail': function() {
                window.location.href = './detail.php';
            },

            'naviguer sur rendus': function() {
                window.location.href = './rendus.php';
            },
            'naviguer sur tableau de board': function() {
                window.location.href = '../dashboard.php';
            }
        };

        annyang.setLanguage('fr-FR');

        
        annyang.start({
            autoRestart: true,
            continuous: true,
            confidence: 1.0
        });
        annyang.addCommands(commands);
    }

    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const tourCompletedUser = localStorage.getItem('tourCompletedUser-2');
            const tourCompletedForm = localStorage.getItem('tourCompletedForm-2');
            var user = '<?php echo $_SESSION["email"];?>';


            if (user === 'user@gmail.com') {
                if (!tourCompletedUser) {
                    const driver = window.driver.js.driver;
                    const driverObj = driver({
                        showProgress: true,
                        steps: [{
                                element: '.detailBTN',
                                popover: {
                                    title: 'Detail',
                                    description: 'Ici, vous pouvez consulter le détail de brief',
                                    side: "left",
                                    align: 'start'
                                }
                            },
                            {
                                element: '.remarqueBTN',
                                popover: {
                                    title: 'Remarque',
                                    description: 'Ici, vous pouvez consulter la remarque de votre formateur',
                                    side: "left",
                                    align: 'start'
                                }
                            }
                        ]
                    });

                    driverObj.drive();
                    localStorage.setItem('tourCompletedUser-2', 'true');
                }
            } else if (user === 'formateur@gmail.com') {
                if (!tourCompletedForm) {
                    const driver = window.driver.js.driver;
                    const driverObj = driver({
                        showProgress: true,
                        steps: [{
                                element: '.detailBTN',
                                popover: {
                                    title: 'Detail',
                                    description: 'Ici, vous pouvez consulter le détail de brief',
                                    side: "left",
                                    align: 'start'
                                }
                            },
                            {
                                element: '.btn-edit',
                                popover: {
                                    title: 'Brief',
                                    description: 'Ici, vous pouvez modifier le brief',
                                    side: "left",
                                    align: 'start'
                                }
                            },
                            {
                                element: '.btn-supp',
                                popover: {
                                    title: 'Brief',
                                    description: 'Ici, vous pouvez supprimer le brief',
                                    side: "left",
                                    align: 'start'
                                }
                            },
                            {
                                element: '.btn-cor',
                                popover: {
                                    title: 'Brief',
                                    description: 'Ici, vous pouvez corriger le brief',
                                    side: "left",
                                    align: 'start'
                                }
                            },
                            {
                                element: '.searchINP',
                                popover: {
                                    title: 'Brief',
                                    description: 'Ici, vous pouvez effectuer une recherche pour trouver le brief',
                                    side: "left",
                                    align: 'start'
                                }
                            },
                            {
                                element: '.btn-add',
                                popover: {
                                    title: 'Brief',
                                    description: 'Ici, vous pouvez ajouter un nouveau brief',
                                    side: "left",
                                    align: 'start'
                                }
                            }
                        ]
                    });

                    driverObj.drive();
                    localStorage.setItem('tourCompletedForm-2', 'true');
                }

            }
        }, 3000);
    });
    </script>

</body>

</html>