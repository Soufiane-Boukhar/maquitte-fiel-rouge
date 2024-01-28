<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des brief</title>
    <link rel="stylesheet" href="../../node_modules/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../asset/css/style.css">
    <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/ezwmdx19hemdu42go0w1lq60ihwp8gql72fs3usv8m64d2hv/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>



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
                            <a href="/index.php" class="nav-link active">
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
                            <h1 class="card-title">Ajouter un brief</h1>
                            <a href="./index.php" class="btn btn-primary btn-add">Retour</a>
                        </div>

                        <div class="stepper-wrapper mt-5 mb-5">
                            <div class="stepper-item actives step1">
                                <div class="step-counter">1</div>
                                <div class="step-name">Editer brief</div>
                            </div>
                            <div class="stepper-item step2">
                                <div class="step-counter">2</div>
                                <div class="step-name">Editer les compétences</div>
                            </div>
                            <div class="stepper-item step3">
                                <div class="step-counter">3</div>
                                <div class="step-name">Editer les niveaux</div>
                            </div>
                        </div>

                        <div class="brief-add elevation-4">
                            <div class="card card-light cards">

                                <form class="form">
                                    <div class="card-body">

                                        <div class="form-group" data-aos="fade-up">
                                            <label for="titre">Titre de brief</label>
                                            <input type="text" class="form-control" id="titre"
                                                value="Gestion de bibliotheque">
                                        </div>

                                        <div class="form-group" data-aos="fade-up">
                                            <label for="travail">Travail à faire</label>
                                            <input type="text" class="form-control" id="travail" value="Il s’agit de développer une application web pour la gestion d’une médiathèque
                                            publique, cette médiathèque offre à ses adhérents la possibilité de prêt
                                            d’un grand choix d’ouvrages.">
                                        </div>



                                        <div class="form-group" data-aos="fade-up">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" id="description"
                                                placeholder="Entrer la description" value=" Le directeur d'une médiathèque publique fait appel à vous pour l'aider à
                                            informatiser les opérations d'emprunt des ouvrages dans la médiathèques.
                                            C'est une grande médiathèque qui offre à ses adhérents la possibilité de
                                            prêt d’un grand choix d’ouvrages.">
                                        </div>

                                        <div class="form-group" data-aos="fade-up">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" id="image">
                                        </div>


                                        <div class="form-group" data-aos="fade-up">
                                            <label for="date_debut">Date de début</label>
                                            <input type="date" class="form-control" id="date_debut"
                                                placeholder="Entrer la date" value="2024-02-19">
                                        </div>

                                        <div class="form-group" data-aos="fade-up">
                                            <label for="date_fin">Date de fin</label>
                                            <input type="date" class="form-control" id="date_fin"
                                                placeholder="Entrer la date" value="2024-02-29">
                                        </div>

                                    </div>
                                    <div class="card-footer" data-aos="fade-up">
                                        <button type="button" onclick="formBrief()" class="btn btn-add">Suivant</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="competence-add d-none elevation-4">

                            <div class="card card-light cards">

                                <form class="form">
                                    <div class="card-body">

                                        <label for="web">Les compétences</label><span class="oblig"> *</span>

                                        <div class="radioSelect mt-3">
                                            <div class="form-group select-comp">
                                                <label for="web">Les compétences web</label>
                                                <input type="radio" class="form-control small-radio" name="competence"
                                                    value="web" id="web" onchange="toggleSelect('web')" checked>
                                            </div>


                                            <div class="form-group select-comp ml-5">
                                                <label for="mobile">Les compétences mobile</label>
                                                <input type="radio" class="form-control small-radio two-radio"
                                                    name="competence" value="web" id="mobile"
                                                    onchange="toggleSelect('mobile')">
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <div class="" id="web-list-container">
                                                <div class="form-group comp">
                                                    <label for="web-list">La liste des compétences web <span
                                                            class="oblig"> *</span></label>
                                                    <select name="web-list[]" id="web-list" class="form-control"
                                                        multiple="multiple" required>
                                                        <option value="Maquetter une application" selected>Maquetter une
                                                            application</option>
                                                        <option
                                                            value="Réaliser une interface utilisateur web statique et adaptable"
                                                            selected>
                                                            Réaliser une interface utilisateur web statique et adaptable
                                                        </option>
                                                        <option
                                                            value="Développer une interface utilisateur web dynamique">
                                                            Développer une interface utilisateur web dynamique</option>
                                                        <option
                                                            value="Réaliser une interface utilisateur avec une solution de gestion de contenu ou e- commerce">
                                                            Réaliser une interface utilisateur avec une solution de
                                                            gestion de contenu ou e- commerce</option>
                                                        <option value="Créer une base de données">Créer une base de
                                                            données</option>
                                                        <option value="Développer les composants d’accès aux données">
                                                            Développer les composants d’accès aux données</option>
                                                        <option value="Développer la partie back-end">Développer la
                                                            partie back-end</option>
                                                        <option value="Elaborer et mettre en œuvre des composants">
                                                            Elaborer et mettre en œuvre des composants</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="d-none" id="mobile-list-container">
                                                <div class="form-group comp">
                                                    <label for="mobile-list">La liste des compétences mobile <span
                                                            class="oblig"> *</span></label>
                                                    <select name="mobile-list[]" id="mobile-list" class="form-control"
                                                        multiple="multiple" required>
                                                        <option value="Maquetter une application mobile">Maquetter une
                                                            application mobile</option>
                                                        <option
                                                            value="Manipuler une base de données - perfectionnement">
                                                            Manipuler une base de données - perfectionnement</option>
                                                        <option
                                                            value="Développer la partie back-end d’une application web ou web mobile - perfectionnement">
                                                            Développer la partie back-end d’une application web ou web
                                                            mobile - perfectionnement</option>
                                                        <option
                                                            value="Collaborer à la gestion d’un projet informatique et à l’organisation de l’environnement de développement - perfectionnement">
                                                            Collaborer à la gestion d’un projet informatique et à
                                                            l’organisation de l’environnement de développement -
                                                            perfectionnement</option>
                                                        <option
                                                            value="Développer une application mobile native, avec Android et React Native">
                                                            Développer une application mobile native, avec Android et
                                                            React Native</option>
                                                        <option
                                                            value="Préparer et exécuter les plans de tests d’une application">
                                                            Préparer et exécuter les plans de tests d’une application
                                                        </option>
                                                        <option
                                                            value="Préparer et exécuter le déploiement d’une application web et mobile - perfectionnement">
                                                            Préparer et exécuter le déploiement d’une application web et
                                                            mobile - perfectionnement</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button type="button" onclick="formCompetenceprevious()"
                                            class="btn btn-secondary">Précédent</button>
                                        <button type="button" onclick="formCompetence()"
                                            class="btn btn-add">Suivant</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="niveau-add d-none elevation-4">

                            <div class="card card-light cards">

                                <form class="form">
                                    <div class="card-body">
                                        <div class="mt-2" id="niveauAffecter">


                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" onclick="formNiveaueprevious()"
                                            class="btn btn-secondary">Précédent</button>
                                        <a href="" class="btn btn-add">Editer</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php include '../../layouts/footer.php'; ?>

    </div>

    <script>
    $(document).ready(function() {
        console.log('Document ready - Select2 initialization');
        $('#web-list').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            multiple: true
        });
    });
    $(document).ready(function() {
        console.log('Document ready - Select2 initialization');
        $('#mobile-list').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            multiple: true
        });
    });

    tinymce.init({
        selector: '#description',
        height: 300,
        plugins: 'autoresize autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
            'https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css',
            'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/skins/ui/oxide/content.min.css'
        ],
        content_style: 'body { padding: 30px; }'
    });

    tinymce.init({
        selector: '#travail',
        height: 300,
        plugins: 'autoresize autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
            'https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css',
            'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/skins/ui/oxide/content.min.css'
        ],
        content_style: 'body { padding: 30px; }'
    });

    
    </script>


    <script src="../../node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="../../node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../node_modules/admin-lte/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../../asset/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        if (annyang) {
        var commands = {
            'retour': function() {
                window.location.href = './index.php';
            }
        };

        annyang.setLanguage('fr-FR');
        annyang.addCommands(commands);
        annyang.start({ autoRestart: true, continuous: true, confidence: 0.5 });
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (annyang) {
            let lastWords = '';

            annyang.addCallback('result', function(phrases) {
                const phrase = phrases[0];
                const focusedElement = document.activeElement;
                const travail = tinymce.get('travail');
                const description = tinymce.get('description');

                if (focusedElement.tagName === 'INPUT' && focusedElement.type === 'text') {
                    focusedElement.value += ' ' + phrase;
                } else if (travail) {
                    travail.setContent(lastWords + ' ' + phrase);
                } else if (description) {
                    description.setContent(lastWords + ' ' + phrase);
                }

                lastWords += ' ' + phrase;
            });

            annyang.start();
        }
    });
    </script>

</body>

</html>