<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION = array();
    header('Location: ../index.php');
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
            <img src="../img/solicode.png" class="img-circle elevation-2 logo" alt="">
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php 
                    if(isset($_SESSION['email']) && $_SESSION['email'] === 'user@gmail.com') {
                        ?>
                <li class="nav-item">
                    <a href="#" class="nav-link active tableauBoard">
                        <i class="fa-solid fa-house"></i>
                        <p>Table de board</p>
                    </a>
                </li>

                

                
                <li class="nav-item">
                    <a href="../Pages/Brief/index.php" class="nav-link listBrief">
                        <i class="fa-solid fa-list-check"></i>
                        <p>Briefs</p>
                        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Pages/Brief/rendus.php" class="nav-link rendusLivrable">
                        <i class="fa-solid fa-download"></i>
                        <p>Rendus</p>
                    </a>
                </li>
                <?php
                    } else {
                        ?>
                <li class="nav-item">
                    <a href="#" class="nav-link active tableauBoard">
                        <i class="fa-solid fa-house"></i>
                        <p>Table de board</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Pages/Brief/index.php" class="nav-link listBriefFormateur">
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