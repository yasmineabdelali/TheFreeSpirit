<?php 
    include "../controller/eventC.php";
    $c = new eventC();
    $tab = $c->tab_event();
    $cc=new eventC();
    
    $liste=$cc->tab_codepostal();
    if (isset($_POST["submit"])) {
        $codepostal = $_POST["jointure"];
        $tab = $cc->jointure($codepostal);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style_dash.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https:/kit.fontawesome.com/c4254e24a8.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <title>Dashboard</title>
</head>
<body class="body " onload="onLoad(),loadMode(),top_5_users()" id="body">
    <div class="container" id="container">
        
        <aside class="light " id="aside">
            <!-- Sidebar here  -->
            <div class="sidebar">
                <div class="logo-nav-light dark" id="logo_img">
                    <img class="logo">
                </div>
                <a class="active" id="dash-a" >
                    <i class="fa-brands fa-windows"></i>
                    <h3>Dashboard</h3>
                </a>
                
                <a class="not-active" id="parkings-a">
                    <i class="fa-solid fa-p"></i>
                    <h3>Evenement</h3>
                </a>
                
                <a class="not-active" id="users-a">
                    <i class="fa-solid fa-user"></i>
                    <h3>Commande</h3>
                </a>
                
                <a class="not-active" id="reservations-a">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <h3>Produit</h3>
                </a>

                <a class="not-active" id="reservations-a">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <h3>Cours</h3>
                </a>

                <a class="not-active" id="reservations-a">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <h3>Utilisateur</h3>
                </a>
            
                <div class="logout">
                    <a href="/logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <h3>Logout</h3>
                    </a>
                </div>
            </div><!-- end of aside sidebar here-->
        </aside>
        <!-- main content starts here-->
        <main>
            <div class="blur-background" id="blurBackground"></div>
            <div class="loading-circle" id="loadingCircle"></div>
            <!-- dashboard starts here-->
            <div class="dash" id="dash">
                <!-- hello, admin profile -->
                <div class="profile">
                    <p class="hello-word">Salut,<b id="emailDisplay">mahmoud@gmail.com</b></p>
                    <p class="admin-word">Admin</p>
                    <img class="avatar" src="./assets/not_enhanced">
                </div>
                
            <h1 class="title-light dark" id="dash_h1">Dashboard</h1>

            <div class="date-light dark" id="date">
                Date start:
                <input type="date" id="datetime-input">
            </div>

            <div class="date-light dark" id="date-end">
                Date end:
                <input type="date" id="datetime-input-end">
            </div>
            

            <!--boxes start here -->
            <div class="recent-boxes">
                
                <div class="reservations dark" id="box_res">
                    <div class="box-inner">
                        <div class="box-front" onclick="flipBox2(this),total_reservation_per_day(),total_reservation_per_parking_name()">
                            <img src="./assets/reserv.PNG.png">
                            <h2>Commande</h2>
                            <b class="B_statistic" id="reservation_B">0</b>
                        </div>
                        <div class="box-back dark" id="boxreserv">
                            <canvas id="lineChart" width="400" height="200"></canvas>
                            <canvas id="reservationBarChart" width="400" height="200"></canvas>
                            <!-- Add a button in the back to flip it -->
                            <button onclick="flipBack(this.parentElement.parentElement)" class="back-button">Flip Back</button>
                            <button onclick="expandBox_res()" id="expand-button" class="back-button">Expand</button>
                            <button onclick="compressBox_res()" id="compress-button" class="back-button">compress</button>
                        </div>
                    </div>
                </div>
            
                <div class="users dark" id="box_user" onclick="flipBox(this),top_5_users()">
                    <div class="box-inner">
                        <div class="box-front">
                            <img src="./assets/users.PNG">
                            <h2>Utilisateur</h2>
                            <b class="B_statistic" id="users_B">0</b>
                        </div>
                        <div class="box-back dark" id="boxuser">    
                            <div class="section-spacing"></div>
                            <div class="medals">
                                
                                <table id="top_users">
                                    <h1 class="top5-users">Top 3 Utilisateur</h1>
                                    <thead>
                                        <tr>
                                            <th><div class="place_user">Nom</div></th>
                                            <th><div class="email_adress">Email</div></th>
                                            <th><div class="total_reserv">Achat Totale en DT</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="line_user_places">
                                            <td class="medal gold">1st :</td>
                                            <td class="email_places_user num1" id="slot_email1"></td>
                                            <td class="total_res_users num1" id="slot_total_reservation1"></td>
                                        </tr>
                                        <tr class="line_user_places">
                                            <td class="medal silver">2nd :</td>
                                            <td class="email_places_user num2" id="slot_email2"></td>
                                            <td class="total_res_users num2" id="slot_total_reservation2"></td>
                                        </tr>
                                        <tr class="line_user_places">
                                            <td class="medal bronze">3rd :</td>
                                            <td class="email_places_user num3" id="slot_email3"></td>
                                            <td class="total_res_users num3" id="slot_total_reservation3"></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="parkings dark" id="box_park" onclick="flipBox(this)">
                    <div class="box-inner">
                        <div class="box-front">
                            <img src="./assets/parking.PNG.png">
                            <h2>Produit</h2>
                            <b class="B_statistic" id="parking_B">0</b>
                        </div>
                        <div class="box-back dark" id="boxpark">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
             <!-- recent boxes end here -->

            </div>
            <!-- dash ends here -->
        
            <!-- event page starts here -->
            <div class="parkings-page" id="park-page">
                <h1 class="title-light dark" id="park_h1">Evenement</h1>
                
                
                <p id="filter_parking" class="filter-parking dark">Filtrer:</p>
                <!-- <<=========================  filter ==================================>> -->
                <div class="select-container">
                        <form action="" method="POST">
                            <select class="select-box" name="filtre" >
                                <option hidden><?= $filtre ?></option>
                                <option value="Selectionner un filtre">Selectionner un filtre</option>
                                <option value="Nom Asc">Nom Asc</option>
                                <option value="Nom Desc">Nom Desc</option>
                                <option value="Propriete Asc">Lieu Asc</option>
                                <option value="Propriete Desc">Lieu Desc</option>
                                <option value="lieu galerie Asc">Date Asc</option>
                                <option value="lieu galerie Desc">Date Desc</option>
                                <option value="lieu galerie Asc">Heure debut Asc</option>
                                <option value="lieu galerie Desc">Heure debut Desc</option>
                                <option value="lieu galerie Asc">prix Asc</option>
                                <option value="lieu galerie Desc">prix Desc</option>
                            </select>
                            <input type="submit" class="appliquer" name="filtre_boutton" value="filtrer">
                        </form>
                    </div>
                    <!-- <<=========================  filter fin ==================================>> -->
                <form action="" method="POST">
                    <select name="jointure">
                    <?php
                    
                    foreach ($liste as $event_joint) {
                        echo "<option value='" . $event_joint["codepostal"] . "'>" . $event_joint["codepostal"] . "</option>";
                    }
                        ?>
                    </select>
                    <input type="submit" name="submit" value="afficher">
                    </form>
                       
                
                
                <center>
                    <h2>
                        <a href="addevent.php">Ajouter evenement</a>
                    </h2>
                </center>
                <table  class="table-light ">
                    <tr>
                        <th>Id d'evenement</th>
                        <th>Nom d'evenement</th>
                        <th>Lieu d'evenement</th>
                        <th>Date d'evenement</th>
                        <th>Heure du debut d'evenement</th>
                        <th>prix d'entré</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    foreach ($tab as $event) {
                    ?>
                    <tr>
                        <td><?= $event['id'];   ?></td>
                        <td><?= $event['nom'];  ?></td>
                        <td><?= $event['lieu']; ?></td>
                        <td><?= $event['datee']; ?></td>
                        <td><?= $event['duree']; ?></td>
                        <td><?= $event['prix']; ?></td>
                        <td align="center">
                            <a href="updateevent.php?id=<?php echo $event['id'];?>">Update</a>
                        </td>
                        <td><a href="deleteevent.php?id=<?php echo $event['id'];?>">Delete</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <!-- parking page ends here-->

        <!-- users page starts here-->
        <div class="users-page" id="user-page">
            <h1 class="title-light dark" id="user_h1">Users</h1>
            <p id="filter_p_user" class="filter-p dark">Filter:</p>
            <div class="filter_user">
                <div class="filter-btn_user">
                    <span class="sBtn-text_user">Select your option</span>
                    <i id="filter_i_user" class="bx bx-chevron-down"></i>
                </div>
                <ul class="options_user">
                    <li class="option_users">
                        <span class="option-text_user">No filter</span>
                    </li>
                    <li class="option_users">
                        <span class="option-text_user">Email,  A to Z</span>
                    </li>
                    <li class="option_users">
                        <span class="option-text_user">Email,  Z to A</span>
                    </li>

                    <li class="option_users">
                        <span class="option-text_user">Car</span>
                    </li>
                    <li class="option_users">
                        <span class="option-text_user">Moto</span>
                    </li>
                </ul>
            </div>
            <table class="table-light dark" id="user_table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Car type</th>
                        <th>Matricule </th>
                    </tr>
                    <tbody>
                    </tbody>
                </thead>
              </table>
        </div>
        <!-- users page ends here-->

        <!-- reservations page starts here-->
        <div class="reservations-page" id="reserve-page">
            <h1 class="title-light dark" id="reserv_h1">Reservations</h1>


        <div class="filtering-system">
            <p id="filter_p" class="filter-p dark">Filter:</p>

            <div class="filter">
                <div class="filter-btn">
                    <span class="sBtn-text">Select your option</span>
                    <i id="filter_i" class="bx bx-chevron-down"></i>
                </div>
                <ul class="options">
                    <li class="option">
                        <span class="option-text">No filter</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Nom, A to Z</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Nom, Z to A</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Lieu, A to Z</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Lieu , Z to A</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Prix Ascendant</span>
                    </li>
                    <li class="option">
                        <span class="option-text">Prix Descendant</span>
                    </li>
                </ul>
            </div>
            <p id="filter_date-p" class="filter-date dark">Date:</p>
            <div class="filter-date"><div class="filter-date-input dark">
                    <h3 class="start-date-word">Start:</h3>
                    <input type="date" name="start-date" id="start_date">
                    <h3 class="end-date-word">End:</h3>
                    <input type="date" name="end-date" id="end_date">
                </div>
            </div>
        </div>

            <table class="table-light dark" id="reservation_table">
                <thead>
                    <tr>
                        <th>User Email</th>
                        <th>Parking name</th>
                        <th>Date </th>
                        <th>Start hour</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        </div>
        </main>
        <!-- light dark modes -->
        <div class="dark-light-mode">
            <div class="moon actif" id="moonDiv">
                <i class="fa-regular fa-moon"></i>
            </div>
            <div class="sun" id="sunDiv">
                <i class="fa-regular fa-sun"></i>
            </div>
        </div>
    </div>
    

    <div class="update-formulaire" id="update_formulaire">
    <form>
        <div class="inputs-update">
            <h2>Name</h2>
            <input type="text" name="name_client_update" id="name_update" required autocomplete="off">
            <h2>Adresse</h2>
            <input type="text" name="adresse_update" id="adresse_update" required autocomplete="off">
            <h2>Parking type</h2>
            <input type="text" name="parking_type_update" id="parking_type_update" required autocomplete="off">
            <h2>Floors</h2>
            <input type="text" name="Floor_update" id="floors_update" required autocomplete="off">
            <h2>Places</h2>
            <input type="text" name="Place_update" id="places_update" required autocomplete="off">
            <h2>Available places</h2>
            <input type="text" name="available_places_update" id="Avaible_places_update" required autocomplete="off">
            <h2>Price</h2>
            <input type="text" name="prices_update" id="price_update" required autocomplete="off">
        </div>
        <input type="submit" id="updateButton" class="update" value="Save">
        <input type="reset" value="Cancel" class="cancel_update" onclick="cancel_update()">
    </form>
</div>

    <script type="text/javascript" src="../public/index.js"></script>
    <script>

        const optionMenuparking = document.querySelector(".filter_parking");
        const selectBtnparking = document.querySelector(".filter-btn-parking");
        const optionsparking = document.querySelectorAll(".option_parking");
        const sBtn_textparking = document.querySelector(".sBtn-text-parking");
        selectBtnparking.addEventListener("click",()=> optionMenuparking.classList.toggle("active"));
        
        optionsparking.forEach(optionparking => {
            optionparking.addEventListener("click", ()=>{
                let selectedOptionparking = optionparking.querySelector(".option-text_parking").innerHTML;
                sBtn_textparking.innerHTML = selectedOptionparking;
                optionMenuparking.classList.remove("active");
            })
        });


        const optionMenuuser = document.querySelector(".filter_user");
        const selectBtnuser = document.querySelector(".filter-btn_user");
        const optionsuser = document.querySelectorAll(".option_users");
        const sBtn_textuser = document.querySelector(".sBtn-text_user");
        selectBtnuser.addEventListener("click",()=> optionMenuuser.classList.toggle("active"));
        
        optionsuser.forEach(optionuser => {
            optionuser.addEventListener("click", ()=>{
                let selectedOptionuser = optionuser.querySelector(".option-text_user").innerHTML;
                sBtn_textuser.innerHTML = selectedOptionuser;
                optionMenuuser.classList.remove("active");
            })
        });



        const optionMenu = document.querySelector(".filter");
        const selectBtn = document.querySelector(".filter-btn");
        const options = document.querySelectorAll(".option");
        const sBtn_text = document.querySelector(".sBtn-text");
        selectBtn.addEventListener("click",()=> optionMenu.classList.toggle("active"));
        
        options.forEach(option => {
            option.addEventListener("click", ()=>{
                let selectedOption = option.querySelector(".option-text").innerHTML;
                sBtn_text.innerHTML = selectedOption;
                optionMenu.classList.remove("active");
                updateDateRange();
            })
        });
        
        
    </script>
    </body>
</html>