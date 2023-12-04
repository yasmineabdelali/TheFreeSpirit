function verif44(){
    var nom = document.getElementById('name').value;
    var lieu = document.getElementById('lieu').value;
    var date = document.getElementById('date').value;
    var duree = document.getElementById('duree').value;
    var prix = document.getElementById('prix').value;
    var codepostal = document.getElementById('codepostal').value;
    
    var w = /^[A-Za-z]+$/;
    var y = /^[0-9]+$/;

    document.getElementById('name-error').innerText = '';
    document.getElementById('lieu-error').innerText = '';
    document.getElementById('date-error').innerText = '';
    document.getElementById('duree-error').innerText = '';
    document.getElementById('prix-error').innerText = '';
    document.getElementById('codepostal-error').innerText = '';

    if (!w.test(nom)) {
        document.getElementById('name-error').innerText = 'Le nom doit contenir uniquement des lettres de A à Z.';
        document.getElementById('name-error').classList.add('error');
        return false;
    } else {
        document.getElementById('name-error').innerText = 'Correct';
        document.getElementById('name-error').classList.remove('error');
    }

    if (!w.test(lieu)) {
        document.getElementById('lieu-error').innerText = 'Le lieu doit contenir uniquement des lettres de A à Z.';
        document.getElementById('lieu-error').classList.add('error');
        return false;
    } else {
        document.getElementById('lieu-error').innerText = 'Correct';
        document.getElementById('lieu-error').classList.remove('error');
    }

    if (date === '') {
        document.getElementById('date-error').innerText = 'Veuillez sélectionner une date.';
        document.getElementById('date-error').classList.add('error');
        return false;
    } else {
        document.getElementById('date-error').innerText = 'Correct';
        document.getElementById('date-error').classList.remove('error');
    }

    if (!y.test(duree)) {
        document.getElementById('duree-error').innerText = 'La durée doit contenir uniquement des chiffres.';
        document.getElementById('duree-error').classList.add('error');
        return false;
    } else {
        document.getElementById('duree-error').innerText = 'Correct';
        document.getElementById('duree-error').classList.remove('error');
    }

    if (!y.test(prix)) {
        document.getElementById('prix-error').innerText = 'Le prix doit contenir uniquement des chiffres.';
        document.getElementById('prix-error').classList.add('error');
        return false;
    } else {
        document.getElementById('prix-error').innerText = 'Correct';
        document.getElementById('prix-error').classList.remove('error');
    }

    if (codepostal !== '' && !y.test(codepostal)) {
        document.getElementById('codepostal-error').innerText = 'Le code postal doit contenir uniquement des chiffres.';
        document.getElementById('codepostal-error').classList.add('error');
        return false;
    } else {
        document.getElementById('codepostal-error').innerText = 'Correct';
        document.getElementById('codepostal-error').classList.remove('error');
    }

    return true;
}


function flipBox(box) {
    const boxInner = box.querySelector('.box-inner');
    boxInner.style.transform = boxInner.style.transform === 'rotateY(180deg)' ? 'rotateY(0deg)' : 'rotateY(180deg)';
}

const blurBackground = document.getElementById('blurBackground');
const loadingCircle = document.getElementById('loadingCircle');

window.addEventListener('beforeunload', () => {
    blurBackground.style.display = 'block';
    loadingCircle.style.display = 'block';
});

const inputs = document.querySelectorAll(".input");
function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}
function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}
inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});



function dashboard(){
    
    var dash = document.getElementById("dash");
    var parking = document.getElementById("park-page");
    var users = document.getElementById("user-page");
    var reserve = document.getElementById("reserve-page");
    
    var a_link = document.getElementById("dash-a");
    var park_link = document.getElementById("parkings-a");
    var user_link =document.getElementById("users-a");
    var reserv_link = document.getElementById("reservations-a");
    
    a_link.className = "active";
    park_link.className = "not-active";
    user_link.className = "not-active";
    reserv_link.className = "not-active";
    
    dash.style.display = "block";
    parking.style.display = "none";
    users.style.display = "none";
    reserve.style.display = "none";
    localStorage.setItem('activeSection', 'dashboard');
}

function evenement() {
    var dash = document.getElementById("dash");
    var parking = document.getElementById("park-page");
    var users = document.getElementById("user-page");
    var reserve = document.getElementById("reserve-page");

    var a_link = document.getElementById("dash-a");
    var park_link = document.getElementById("parkings-a");
    var user_link =document.getElementById("users-a");
    var reserv_link = document.getElementById("reservations-a");

    a_link.className = "not-active";
    park_link.className = "active";
    user_link.className = "not-active";
    reserv_link.className = "not-active";
    
    dash.style.display = "none"
    parking.style.display = "block";
    users.style.display = "none";
    reserve.style.display = "none";
    localStorage.setItem('activeSection', 'parkings');
}

function utilisateur(){
    var dash = document.getElementById("dash");
    var parking = document.getElementById("park-page");
    var users = document.getElementById("user-page");
    var reserve = document.getElementById("reserve-page");

    var a_link = document.getElementById("dash-a");
    var park_link = document.getElementById("parkings-a");
    var user_link =document.getElementById("users-a");
    var reserv_link = document.getElementById("reservations-a");

    a_link.className = "not-active";
    park_link.className = "not-active";
    user_link.className = "active";
    reserv_link.className = "not-active";

    dash.style.display = "none"
    parking.style.display = "none";
    users.style.display = "block";
    reserve.style.display = "none";
    localStorage.setItem('activeSection', 'users');
}

function produit(){
    var dash = document.getElementById("dash");
    var parking = document.getElementById("park-page");
    var users = document.getElementById("user-page");
    var reserve = document.getElementById("reserve-page");

    var a_link = document.getElementById("dash-a");
    var park_link = document.getElementById("parkings-a");
    var user_link =document.getElementById("users-a");
    var reserv_link = document.getElementById("reservations-a");

    a_link.className = "not-active";
    park_link.className = "not-active";
    user_link.className = "not-active";
    reserv_link.className = "active";

    dash.style.display = "none"
    parking.style.display = "none";
    users.style.display = "none";
    reserve.style.display = "block";
    localStorage.setItem('activeSection', 'reservations');
}

function cours(){
    var dash = document.getElementById("dash");
    var parking = document.getElementById("park-page");
    var users = document.getElementById("user-page");
    var reserve = document.getElementById("reserve-page");

    var a_link = document.getElementById("dash-a");
    var park_link = document.getElementById("parkings-a");
    var user_link =document.getElementById("users-a");
    var reserv_link = document.getElementById("reservations-a");

    a_link.className = "not-active";
    park_link.className = "not-active";
    user_link.className = "not-active";
    reserv_link.className = "active";

    dash.style.display = "none"
    parking.style.display = "none";
    users.style.display = "none";
    reserve.style.display = "block";
    parking.style.display = "none";
    users.style.display = "none";
    localStorage.setItem('activeSection', 'reservations');
}

function commande(){
    var dash = document.getElementById("dash");
    var parking = document.getElementById("park-page");
    var users = document.getElementById("user-page");
    var reserve = document.getElementById("reserve-page");

    var a_link = document.getElementById("dash-a");
    var park_link = document.getElementById("parkings-a");
    var user_link =document.getElementById("users-a");
    var reserv_link = document.getElementById("reservations-a");

    a_link.className = "not-active";
    park_link.className = "not-active";
    user_link.className = "not-active";
    reserv_link.className = "active";

    dash.style.display = "none"
    parking.style.display = "none";
    users.style.display = "none";
    reserve.style.display = "block";
    localStorage.setItem('activeSection', 'reservations');
}

function onLoad() {
    const activeSection = localStorage.getItem('activeSection');
    if (activeSection === 'parkings') {
        evenement();
    } else if (activeSection === 'users') {
        utilisateur();
    } else if (activeSection === 'reservations') {
        produit();
    } else if (activeSection === 'produit') {
        cours();
    } else if (activeSection === 'produit') {
        commande();
    } else {
        dashboard();
    }
}
document.getElementById('dash-a').addEventListener('click', function() {
    dashboard();
});

document.getElementById('parkings-a').addEventListener('click', function() {
    evenement();
});
document.getElementById('users-a').addEventListener('click', function() {
    utilisateur();
});

document.getElementById('reservations-a').addEventListener('click', function() {
    produit();
});

document.getElementById('reservations-a').addEventListener('click', function() {
    cours();
});

document.getElementById('reservations-a').addEventListener('click', function() {
    commande();
});


function add(){
    var formu=document.getElementById("formulaire");
    var container = document.getElementById("container");

    container.style.filter = 'blur(10px)';
    container.style.pointerEvents = "none";
    container.style.userSelect = "none";
    
    formu.style.display = 'block';
    
    formu.style.filter = "none";
    formu.style.pointerEvents = "all";
    formu.style.userSelect = "auto";
}

function cancel(){
    var formu=document.getElementById("formulaire");
    var container = document.getElementById("container");

    container.style.filter = 'initial';
    container.style.pointerEvents = "all";
    container.style.userSelect = "auto";

    formu.style.display = 'none';
}

function update(){
    var formu=document.getElementById("update_formulaire");
    var container = document.getElementById("container");

    container.style.filter = 'blur(10px)';
    container.style.pointerEvents = "none";
    container.style.userSelect = "none";
    
    formu.style.display = 'block';
    
    formu.style.filter = "none";
    formu.style.pointerEvents = "all";
    formu.style.userSelect = "auto";
}

function cancel_update(){
    var formu=document.getElementById("update_formulaire");
    var container = document.getElementById("container");

    container.style.filter = 'initial';
    container.style.pointerEvents = "all";
    container.style.userSelect = "auto";

    formu.style.display = 'none';
}

function save(){
    var container = document.getElementById("container");
    var formu=document.getElementById("formulaire");
    formu.style.display = 'none';
    container.style.filter = 'initial';
    container.style.pointerEvents = "all";
    container.style.userSelect = "auto";
    parkings();
}



function moonIconClicked() {
    var box_reserv= document.getElementById("boxreserv");
    var box_usere = document.getElementById("boxuser");
    var box_parke = document.getElementById("boxpark");
    var filter_parking_p = document.getElementById("filter_parking");
    var filter_date = document.getElementById("filter_date-p");
    var filter_p_user = document.getElementById("filter_p_user");
    var filter_p = document.getElementById("filter_p");
    var res_table = document.getElementById("reservation_table");
    var user_table = document.getElementById("user_table");
    var table = document.getElementById("the-table");
    var logo = document.getElementById("logo_img");
    var date = document.getElementById("date");
    var date_end = document.getElementById("date-end");
    var email = document.getElementById("emailDisplay");
    var aside = document.getElementById("aside");

    var sunDiv = document.getElementById("sunDiv");
    var moonIcon = document.getElementById("moonDiv");

    var body = document.getElementById("body");
    var dash_title = document.getElementById("dash_h1");
    var park_title = document.getElementById("park_h1")
    var user_title = document.getElementById("user_h1");
    var reserv_title = document.getElementById("reserv_h1");

    
    var box_res = document.getElementById("box_res");
    var box_user = document.getElementById("box_user");
    var box_park = document.getElementById("box_park");


    box_res.className = "reservations dark";
    box_user.className = "users dark";
    box_park.className = "parkings dark";


    box_reserv.className = "box-back dark";
    box_usere.className = "box-back dark";
    box_parke.className = "box-back dark";


    res_table.className = "table-light dark";
    user_table.className = "table-light dark";
    table.className = "table-light dark";
    logo.className = "logo-nav-light dark";

    date.className = "date-light dark";
    date_end.className = "date-light dark";
    email.style.color = "white";

    filter_parking_p.className = "filter-parking dark";
    filter_date.className = "filter-date dark"
    filter_p.className ="filter-p dark";
    filter_p_user.className ="filter-p dark";


    
    user_title.className = "title-light dark";
    reserv_title.className ="title-light dark";
    park_title.className = "title-light dark";
    dash_title.className = "title-light dark";
    body.className = "body dark";
    aside.className = "light dark";
    moonIcon.className = "moon actif";
    sunDiv.className = "sun";
    localStorage.setItem('mode', 'dark');
}
const moonDiv = document.getElementById("moonDiv");
moonDiv.addEventListener("click", function() {
    moonIconClicked();
});
function sunClicked() {
    var box_reserv= document.getElementById("boxreserv");
    var box_usere = document.getElementById("boxuser");
    var box_parke = document.getElementById("boxpark");
    var filter_parking_p = document.getElementById("filter_parking");
    var filter_date = document.getElementById("filter_date-p");
    var filter_p = document.getElementById("filter_p");
    var filter_p_user = document.getElementById("filter_p_user");

    var res_table = document.getElementById("reservation_table");
    var user_table = document.getElementById("user_table");
    var table = document.getElementById("the-table");
    var logo = document.getElementById("logo_img");
    var date = document.getElementById("date");
    var date_end = document.getElementById("date-end");
    var email = document.getElementById("emailDisplay");
    var aside = document.getElementById("aside");

    var sunIcon = document.getElementById("sunDiv");
    var moonIcon = document.getElementById("moonDiv");

    var body = document.getElementById("body");
    var dash_title = document.getElementById("dash_h1");
    var park_title = document.getElementById("park_h1")
    var user_title = document.getElementById("user_h1");
    var reserv_title = document.getElementById("reserv_h1");

    

    var box_res = document.getElementById("box_res");
    var box_user = document.getElementById("box_user");
    var box_park = document.getElementById("box_park");
    

    logo.className = "logo-nav-light";
    date.className = "date-light";
    date_end.className = "date-light";
    box_res.className = "reservations";
    box_user.className = "users";
    box_park.className = "parkings";


    box_reserv.className = "box-back";
    box_usere.className = "box-back";
    box_parke.className = "box-back";


    filter_parking_p.className = "filter-parking";
    filter_date.className = "filter-date"
    filter_p.className ="filter-p";
    filter_p_user.className ="filter-p";


    res_table.className = "table-light";
    user_table.className = "table-light";
    table.className = "table-light";
    email.style.color = "black";
    
    user_title.className = "title-light";
    reserv_title.className ="title-light";
    park_title.className = "title-light";
    dash_title.className = "title-light";
    body.className = "body";
    aside.className = "light";
    moonIcon.className = "moon";
    sunIcon.className = "sun actif";
    localStorage.setItem('mode', 'light');
}
const sunDiv = document.getElementById("sunDiv");
sunDiv.addEventListener("click", function() {
    sunClicked();
});
function loadMode() {
    const storedMode = localStorage.getItem('mode');
    if (storedMode === 'dark') {
        moonIconClicked();
    } else {
        sunClicked();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const defaultfilterparking = "No filter";
    displayParking(defaultfilterparking);
    const filterOptionsparking = document.querySelectorAll('.options_parkings .option_parking');
    filterOptionsparking.forEach(option_parking => {
        option_parking.addEventListener('click', () => {
            const selectedOption = option_parking.querySelector('.option-text_parking').textContent;
            console.log(selectedOption);
            displayParking(selectedOption);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const defaultFilterOption = 'No filter';
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;
    displayReservations(defaultFilterOption,startDate,endDate);
    const filterOptions = document.querySelectorAll('.options .option');
    filterOptions.forEach(option => {
        option.addEventListener('click', () => {
            const selectedOption = option.querySelector('.option-text').textContent;
            displayReservations(selectedOption, startDate, endDate)
            updateDateRange();
        });
    });
    const startInput = document.getElementById('start_date');
    const endInput = document.getElementById('end_date');
    startInput.addEventListener('change', updateDateRange);
    endInput.addEventListener('change', updateDateRange);
});

document.addEventListener('DOMContentLoaded', function() {
    const defaultFilteruser = 'No filter';
    displayUsers(defaultFilteruser);
    const filterOptionsusers = document.querySelectorAll('.options_user .option_users');
    filterOptionsusers.forEach(option_user => {
        option_user.addEventListener('click', () => {
            const selectedOption = option_user.querySelector('.option-text_user').textContent;
            displayUsers(selectedOption);
        });
    });
});