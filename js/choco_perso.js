/* REMPLISSAGE TABLEAU COMMANDE ========================================== */
function ajouter_type() {
    // récupérer value select
    let select_type = document.getElementById("type_chocolat");
    let type = select_type.value;

    let table = document.getElementById("tabCommande");
    let cell = table.rows[0].getElementsByTagName("td")[0];
    cell.textContent = type;
}

function ajouter_forme() {
    // récupérer value select
    let select_type = document.getElementById("forme_chocolat");
    let forme = select_type.value;

    let table = document.getElementById("tabCommande");
    let cell = table.rows[1].getElementsByTagName("td")[0];
    cell.textContent = forme;
}

function ajouter_supplement() {
    // récupérer value select
    let select_type = document.getElementById("supplement");
    let supplement = select_type.value;

    let table = document.getElementById("tabCommande");
    let cell = table.rows[2].getElementsByTagName("td")[0];
    cell.textContent = supplement;
}

function ajouter_boite() {
    // récupérer value select
    let select_type = document.getElementById("boite");
    let boite = select_type.value;

    let table = document.getElementById("tabCommande");
    let cell = table.rows[3].getElementsByTagName("td")[0];
    cell.textContent = boite;
}

function commander() {
    window.scrollTo({ top: 0 });

    document.getElementById("error").style.display = "block";
    document.getElementById("error").className += " element-bounce";
}

/* GESTION STEP DU FORME ================================================= */

/* https://www.w3schools.com/howto/howto_js_form_steps.asp */

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    x[n].className += " fade";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }

    if (n == x.length -1) {
        document.getElementById("nextBtn").textContent = "OK";
    } else {
        document.getElementById("nextBtn").textContent = "Suivant";
    }
    
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");

    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    if (currentTab + n < x.length) {
        currentTab = currentTab + n;
    }
    
    // Otherwise, display the correct tab:
    showTab(currentTab);

    // maj tableau commande
    ajouter_type();
    ajouter_forme();
    ajouter_supplement();
    ajouter_boite();

}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}