<?php include '../layouts/header.php';;
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include '../layouts/navbar.php'?>

        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    <div class="p-2" id="board">
                        <div class="gif">
                            <!-- <h1 class="card-title gif wave-text">Tableau de board</h1> -->
                            <svg viewBox="0 0 1720 230">
                                <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                                    Bienvenue ! Profitez de votre expérience
                                </text>
                            </svg>
                        </div>


                        <div class="container-fluid">
                            <div class="d-flex justify-content-around">
                                <?php 

                                    if(isset($_SESSION["email"]) && $_SESSION["email"] === 'user@gmail.com'){
                                        echo ' <div>
                                        <div class="circular-progress" id="mon-taux">
                                            <div class="value-container" id="monTaux-value">0%</div>
                                        </div>
                                        <p class="data-info mt-2 elevation-4">
                                          Mon taux de réussite
                                        </p>
                                    </div>';
                                    } else if(isset($_SESSION["email"]) && $_SESSION["email"] === 'formateur@gmail.com'){
                                        echo '<div>
                                        <div class="circular-progress" id="nombreApprenant">
                                            <div class="value-container" id="nombreApprenantValue">0%</div>
                                        </div>
                                        <p class="data-info mt-2 elevation-4">
                                          Nombre des apprenants
                                        </p>
                                    </div>';
                                    }

                                ?>

                                <div>
                                    <div class="circular-progress" id="promoValue">
                                        <div class="value-container" id="promo-value">0%</div>
                                    </div>
                                    <p class="data-info mt-2 elevation-4">
                                        La réussite de promo
                                   </p>
                                </div>

                                <div>
                                    <div class="circular-progress" id="validBriefs">
                                        <div class="value-container" id="validBriefsValue">0</div>
                                    </div>
                                    <p class="data-info mt-2 elevation-4">
                                        briefs valid
                                    </p>
                                </div>

                                <div>
                                    <div class="circular-progress" id="invalidBriefs">
                                        <div class="value-container" id="invalidBriefsValue">0</div>
                                    </div>
                                    <p class="data-info mt-2 elevation-4">
                                        briefs invalid
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>
            </section>
        </div>

        <!-- Footer -->
        <?php include '../layouts/footer.php'; ?>

    </div>


    <?php include '../layouts/script.php';?>

    <script>
    var email = '<?php echo $_SESSION["email"]; ?>';

    if (annyang) {
        var lastRecognizedSpeech = "";

        var commands = {
            'naviguer sur la liste des projets': function() {
                lastRecognizedSpeech = "Naviguer sur brief";
                window.location.href = '../Pages/Brief/index.php';
            }
        };

        annyang.setLanguage('fr-FR');
        annyang.addCommands(commands);
        annyang.start({
            autoRestart: true,
            continuous: true,
            confidence: 0.7
        });

    }

    document.addEventListener('DOMContentLoaded', function() {
        const tourCompletedUser = localStorage.getItem('tourCompleted-user');
        const tourCompletedForm = localStorage.getItem('tourCompleted-form');
        const user = '<?php echo $_SESSION["email"];?>';

        if (user === 'user@gmail.com') {

            if (!tourCompletedUser) {

                const driver = window.driver.js.driver;
                const driverObj = driver({
                    showProgress: true,
                    steps: [{
                            element: '.tableauBoard',
                            popover: {
                                title: 'Tableau de board',
                                description: 'Ici, vous pouvez consulter toutes les statistiques des briefs',
                                side: "left",
                                align: 'start'
                            }
                        },
                        {
                            element: '.listBrief',
                            popover: {
                                title: 'Brief',
                                description: 'Ici, vous pouvez consulter tous les briefs affectés par votre formateur',
                                side: "left",
                                align: 'start'
                            }
                        },
                        {
                            element: '.rendusLivrable',
                            popover: {
                                title: 'Rendus de brief',
                                description: 'Ici, vous avez la possibilité de déposer votre livrable de brief',
                                side: "left",
                                align: 'start'
                            }
                        },
                        {
                            element: '.user-menu',
                            popover: {
                                title: 'Profil',
                                description: 'Ici, vous pouvez consulter votre profil, le modifier et vous déconnecter également',
                                side: "left",
                                align: 'start'
                            }
                        }
                    ]
                });

                driverObj.drive();
                localStorage.setItem('tourCompleted-user', 'true');
            }
        } else if (user === 'formateur@gmail.com') {

            if (!tourCompletedForm) {

                const driver = window.driver.js.driver;
                const driverObj = driver({
                    showProgress: true,
                    steps: [{
                            element: '.tableauBoard',
                            popover: {
                                title: 'Tableau de board',
                                description: 'Ici, vous pouvez consulter toutes les statistiques des briefs',
                                side: "left",
                                align: 'start'
                            }
                        },
                        {
                            element: '.listBriefFormateur',
                            popover: {
                                title: 'Brief',
                                description: 'Ici, vous pouvez consulter tous les briefs affectés par vous',
                                side: "left",
                                align: 'start'
                            }
                        },
                        {
                            element: '.user-menu',
                            popover: {
                                title: 'Profil',
                                description: 'Ici, vous pouvez consulter votre profil, le modifier et vous déconnecter également',
                                side: "left",
                                align: 'start'
                            }
                        }
                    ]
                });

                driverObj.drive();
                localStorage.setItem('tourCompleted-form', 'true');
            }
        }
    });
    </script>

    <script>
    let promoProgressBar = document.querySelector("#promoValue");
    let monTauxProgressBar = document.getElementById("mon-taux");
    let nombreApprenantProgressBar = document.getElementById('nombreApprenant');
    let validBriefsProgressBar = document.getElementById('validBriefs');
    let invalidBriefsProgressBar = document.getElementById('invalidBriefs');

    let monTauxValue = document.getElementById('monTaux-value');
    let nombreApprenant = document.getElementById('nombreApprenantValue');
    let promoValue = document.getElementById("promo-value");
    let validBriefsValue = document.getElementById('validBriefsValue');
    let invalidBriefsValue = document.getElementById('invalidBriefsValue');

    let promoProgressValue = 0;
    let monTauxProgressValue = 0;
    let nombreApprenantProgressValue = 0;
    let briefValidValue = 0;
    let briefInvalidValue = 0;

    let promoProgressEndValue = 75;
    let monTauxProgressEndValue = 87;
    let nombreApprenantProgressEndValue = 20;
    let brifsValidProgressEndValue = 20;
    let brifsInvalidProgressEndValue = 12;

    let finalProjectEndValue = 10;
    let speedPercent = 70;
    let speedCount = 120;

    let promoProgress = setInterval(() => {
        promoProgressValue++;
        promoValue.textContent = promoProgressValue + '%';
        promoProgressBar.style.background = `conic-gradient(
      #edd53d ${promoProgressValue * 3.6}deg, 
      #cadcff ${360 - promoProgressValue * 3.6}deg
  )`;
        if (promoProgressValue == promoProgressEndValue) {
            clearInterval(promoProgress);
        }
    }, speedPercent);

    let monTauxProgress = setInterval(() => {
        monTauxProgressValue++;
        monTauxValue.textContent = monTauxProgressValue + '%';
        monTauxProgressBar.style.background = `conic-gradient(
      #32d00a ${monTauxProgressValue * 3.6}deg, 
      #cadcff ${360 - monTauxProgressValue * 3.6}deg
  )`;
        if (monTauxProgressValue == monTauxProgressEndValue) {
            clearInterval(monTauxProgress);
        }
    }, speedPercent);

    let nombreApprenantProgress = setInterval(() => {
        nombreApprenantProgressValue++;
        nombreApprenant.textContent = nombreApprenantProgressValue;
        nombreApprenantProgressBar.style.background = `conic-gradient(
      #004953 ${nombreApprenantProgressValue * 3.6}deg, 
      #66CDAA ${360 - nombreApprenantProgressValue * 3.6}deg
  )`;
        if (nombreApprenantProgressValue == nombreApprenantProgressEndValue) {
            clearInterval(nombreApprenantProgress);
        }
    }, speedCount);


    let validBriefsProgress = setInterval(() => {
        briefValidValue++;
        validBriefsValue.textContent = briefValidValue;
        validBriefsProgressBar.style.background = `conic-gradient(
      #32d00a ${briefValidValue * 3.6}deg, 
      #ACE1AF ${360 - briefValidValue * 3.6}deg
  )`;
        if (briefValidValue == brifsValidProgressEndValue) {
            clearInterval(validBriefsProgress);
        }
    }, speedCount);

    let invalidBriefsProgress = setInterval(() => {
        briefInvalidValue++;
        invalidBriefsValue.textContent = briefInvalidValue;
        invalidBriefsProgressBar.style.background = `conic-gradient(
      #EF0107 ${briefInvalidValue * 3.6}deg, 
      #fd5c63 ${360 - briefInvalidValue * 3.6}deg
  )`;
        if (briefInvalidValue == brifsInvalidProgressEndValue) {
            clearInterval(invalidBriefsProgress);
        }
    }, speedCount);




   
    </script>

</body>

</html>