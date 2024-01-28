<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des brief</title>
    <link rel="stylesheet" href="../../node_modules/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../asset/css/style.css">
    <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


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
        <nav class="main-header navbar navbar-expand navbar-white navbar-light top-nav">

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
                            <a href="./index.php" class="nav-link active">
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
                            <h1 class="card-title">Detail de brief</h1>
                            <a href="./index.php" class="btn btn-primary btn-add">Retour</a>
                        </div>

                        <div class="mt-5 detail-card">

                            <div class="detail">
                                <div class="d-flex">
                                    <div class="p-4 assigne">
                                        <img src="../../img/library.webp" alt="">
                                        <div class="paraAssign elevation-2">
                                            <h1 class="card-title"><?php echo $_GET["brief"];?></h1>
                                            <p class="mt-2">Assigné</p>
                                            <div class="">
                                                <div class="d-flex">
                                                    <div class="user-icon">IB</div>
                                                    <div class="info">
                                                        <span class="ml-2 nom">Imane Bouziane</span>
                                                        <span class="ml-2 date">créé : 25/04/23</span>
                                                    </div>
                                                </div>
                                                <div class="mt-3 objectif">
                                                    <p>Il s’agit de développer une application web pour la gestion d’une
                                                        médiathèque
                                                        publique, cette médiathèque offre à ses adhérents la possibilité
                                                        de prêt
                                                        d’un grand choix d’ouvrages.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="p-4 travail">

                                    <div class="travail-card elevation-2" data-aos="fade-right">
                                        <h2>Description</h2>
                                        <p>Le directeur d'une médiathèque publique fait appel à vous pour l'aider à
                                            informatiser les opérations d'emprunt des ouvrages dans la médiathèques.
                                            C'est une grande médiathèque qui offre à ses adhérents la possibilité de
                                            prêt d’un grand choix d’ouvrages.</p>
                                        <p>Toute personne a le droit de s’adhérer à la bibliothèque et de bénéficier de
                                            ses services. On distingue plusieurs types d’adhérents : Étudiants,
                                            fonctionnaires, femmes au foyer … etc. La médiathèque possède plusieurs
                                            types d’ouvrages, on trouve par exemple des livres, des revues, des romans,
                                            des cassettes vidéo, CDs, DVDs… etc.Chaque adhérent a le droit d’emprunter
                                            au maximum trois ouvrages.</p>
                                        <h2>Référentiels</h2>
                                        <ul>
                                            <li>W3school</li>
                                        </ul>
                                        <h2>Livrable</h2>
                                        <ul>
                                            <li>
                                                Github
                                            </li>
                                            <li>
                                                Figma
                                            </li>
                                        </ul>
                                        <h2>Critères de performance</h2>
                                        <ul>
                                            <li>Code clean</li>
                                            <li>Interfaces répondant aux besoins spécifiés dans le diagramme DCU</li>
                                            <li>Respect de la planification des tâches. des taches</li>
                                        </ul>
                                    </div>


                                    <div class="competence elevation-2 ml-2" data-aos="fade-up">
                                        <div class="ul-comp">
                                            <h2>Compétences visées</h2>

                                            <ul class="mt-3">
                                                <li>Maquetter une application</li>
                                            </ul>
                                            <div class="d-flex nv">
                                                <span class="one">Niveau 1</span>
                                                <span class="two">Niveau 2</span>
                                                <span class="three">Niveau 3</span>
                                            </div>
                                            <ul class="mt-2">
                                                <li>
                                                    Réaliser une interface utilisateur web statique
                                                </li>
                                            </ul>
                                            <div class="d-flex nv">
                                                <span class="one">Niveau 1</span>
                                                <span class="one">Niveau 2</span>
                                                <span class="two">Niveau 3</span>
                                            </div>
                                        </div>

                                        <?php 

                                        if(isset($_SESSION['email']) && $_SESSION['email'] === 'user@gmail.com'){
                                        ?>
                                        <div class="d-flex justify-content-center mt-5">
                                            <div class="line"></div>

                                        </div>


                                        <?php if($_GET["brief"] === 'Gestion de bibliotheque'){
                                            ?>
                                        <div class="mt-3" data-aos="fade-up">
                                            <div>
                                                <h2>Affectation</h2>
                                                <div class="icon-group">
                                                    <i class="fa-solid fa-people-group"></i>
                                                </div>
                                            </div>
                                            <div class="app">
                                                <span class="apprenant">Yacine alami</span>
                                                <span class="apprenant">Amine ben ali</span>
                                                <span class="apprenant">Ihsan souihli</span>
                                            </div>
                                        </div>

                                        <?php
                                        }else{
                                            ?>
                                        <div class="mt-3" data-aos="fade-up">
                                            <div>
                                                <h2>Affectation</h2>
                                                <div class="icon-group">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="app">
                                                <span class="apprenant">Individual</span>
                                            </div>
                                        </div>

                                        <?php
                                        };?>

                                        <div class="d-flex justify-content-center mt-5">
                                            <div class="line"></div>

                                        </div>

                                        <div class="d-flex justify-content-center mt-5" data-aos="flip-left">
                                            <main>

                                                <div>
                                                    <h2>Date limit</h2>
                                                    <div class="icon-group">
                                                        <i class="fa-solid fa-stopwatch-20"></i>
                                                    </div>
                                                </div>
                                                <div id="countdown" class="mt-3">
                                                    <div class="countdown__container">
                                                        <div class="countdown__el">
                                                            <div class="countdown__time flip elevation-4" id="days">

                                                            </div>
                                                            <span class="countdown__label">Jours</span>
                                                        </div>
                                                        <div class="countdown__el">
                                                            <div class="countdown__time flip elevation-4" id="hours">

                                                            </div>
                                                            <span class="countdown__label">Heures</span>
                                                        </div>
                                                        <div class="countdown__el">
                                                            <div class="countdown__time flip elevation-4" id="mins">

                                                            </div>
                                                            <span class="countdown__label">Minutes</span>
                                                        </div>
                                                        <div class="countdown__el">
                                                            <div class="countdown__time flip elevation-4" id="seconds">

                                                            </div>
                                                            <span class="countdown__label">Secondes</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </main>
                                        </div>


                                        <?php
                                        }


                                        
                                        
                                        ?>









                                    </div>
                                </div>


                            </div>




                        </div>

                    </div>
                </div>
            </section>
        </div>






        <!-- Footer -->
        <?php include '../../layouts/footer.php'; ?>

    </div>


    <script src="../../node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="../../node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../node_modules/admin-lte/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../../asset/js/main.js"></script>

</body>

</html>