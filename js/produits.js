var productList;
var productListNotSorted;

var categories = ["Les tablettes", "Les ballotins", "Les plateaux", "Fruits et chocolat"];
var default_data = [
    {
        "nom": "Tablette Chocolat Noir 65% origine Madagascar - 90g",
        "image": "data/produits/Tablette-Chocolat-Noir-65-origine-Madagascar-90g.jpg",
        "prix": 5.70,
        "categorie": "tablette"
    },
    {
        "nom": "Tablette Chocolat Lait 50% origine Madagascar - 90g",
        "image": "data/produits/Tablette-Chocolat-Lait-50-origine-Madagascar-90g.jpg",
        "prix": 5.70,
        "categorie": "tablette"
    },
    {
        "nom": "Tablette Chocolat blanc 29% de cacao - 100g",
        "image": "data/produits/Tablette-de-chocolat-blanc-29-de-cacao-100g.jpg",
        "prix": 4.50,
        "categorie": "tablette"
    },
    {
        "nom": "Ballotin de chocolats fins - 375g",
        "image": "data/produits/Ballotin 375g de chocolats fins.jpg",
        "prix": 35.80,
        "categorie": "ballotin"
    },
    {
        "nom": "Ballotin assortis 3 chocolats - 250g",
        "image": "data/produits/Ballotin-Chocolats.jpg",
        "prix": 19.20,
        "categorie": "ballotin"
    },
    {
        "nom": "Ballotin noir de chocolats - 500g",
        "image": "data/produits/product_9391963b.jpg",
        "prix": 40,
        "categorie": "ballotin"
    },
    {
        "nom": "Plateau de 24 petits fours chocolat",
        "image": "data/produits/Petits-fours-choco.png",
        "prix": 26.20,
        "categorie": "plateau"
    },
    {
        "nom": "Assortiment de chocolats, de truffes et de pâtes de fruits - 300g",
        "image": "data/produits/c700x420.jpg",
        "prix": 22,
        "categorie": "plateau"
    },
    {
        "nom": "4 Choc' assortiment 3 chocolats - Chocolat à casser",
        "image": "data/produits/4-choc-assortiment-3-chocolats-chocolat-a-casser.jpg",
        "prix": 22,
        "categorie": "plateau"
    },
    {
        "nom": "Fraise au chocolat",
        "image": "data/produits/brochette_fruit_choco11.jpg",
        "prix": 6.30,
        "categorie": "fruit et chocolat"
    },
    {
        "nom": "Brochettes de fruits au chocolat",
        "image": "data/produits/42931881.jpg",
        "prix": 12.90,
        "categorie": "fruit et chocolat"
    },
    {
        "nom": "Bouchées de chocolat aux fruits et noix",
        "image": "data/produits/bouchees-de-chocolat-aux-fruits-et-noix.jpg",
        "prix": 8.60,
        "categorie": "fruit et chocolat"
    }
]

init();

/* REMPLIR TABLEAU =================================================================== */
function init() {
    if (!localStorage.getItem('productList')) {
        populateStorage();
    }
    productList = JSON.parse(localStorage.productList);
    productListNotSorted = JSON.parse(JSON.stringify(productList)); /* copy productList to productListNotSorted */

    // remplir le tableau à afficher
    fillProdutsTable(1);
}

function populateStorage() {
    localStorage.setItem('productList', JSON.stringify(default_data));
}

function fillProdutsTable(showCategorie) {
    let productTable = document.getElementById("produits");
    productRow = productTable.insertRow(0);

    let j = 0;

    while (j != categories.length) {
        let categorie_prev_product = "";

        for (var i in productList) {

            // vérification si changement de catégorie
            if (categorie_prev_product != productList[i].categorie) {
                categorie_prev_product = productList[i].categorie;

                // Afficher les sticky title si on veut
                if (showCategorie === 1) {
                    // création cellule titre
                    let title_cell = document.createElement('th');
                    let empty_div = document.createElement('div');
                    title_cell.appendChild(empty_div);
                    let title = document.createElement('h2');
                    title.textContent = categories[j];
                    title_cell.appendChild(title);

                    // ajout dans colonne du tableau
                    productRow.appendChild(title_cell);

                    j++;
                }
            }

            // création cellule dans table
            let cell = document.createElement('td');
            cell.className = "responsive gallery";

            // création et ajout image cliquable dans cellule
            let link = document.createElement('a');
            link.target = "_blank"; link.href = productList[i].image;
            let image = document.createElement('img');
            image.src = productList[i].image;
            link.appendChild(image);
            cell.appendChild(link);

            // ajout description produit
            let description = document.createElement('div');
            description.className = "desc";
            description.innerHTML = "<b>" + productList[i].nom + "</b> - " + productList[i].prix.toFixed(2) + "&nbsp€";
            cell.appendChild(description);

            // ajout cellule dans la colonne de table
            productRow.appendChild(cell);

        }

        // bourrage de j si on ne veut pas afficher les sticky title
        j = categories.length;
    }
}

/* FILTRER TABLEAU ==================================================================== */
function filterProduct() {
    // Declare variables
    var input, filter, table, td, i, txtValue;
    input = document.getElementById("inputSearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("produits");
    td = table.querySelectorAll("td, th");

    // Loop through all table cells, and hide those who don't match the search query
    for (i = 0; i < td.length; i++) {
        txtValue = td[i].children[1].textContent; /* obtenir la desciption du produit (2ème élément de td) */
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            td[i].style.display = "";
        } else {
            td[i].style.display = "none";
        }
    }
}

/* SORT JSON ======================================================================== */
function sortByPrice(direct) {

    productList.sort(function (a, b) {
        a = a["prix"];
        b = b["prix"];
            
        return ((a < b) ? -1 * direct : ((a > b) ? 1 * direct : 0));
    });
}

function sortByPropertyTable(prop, direction) {
    // effacer champ recherche
    input = document.getElementById("inputSearch");
    input.value = '';

    // supprimer affichage tableau
    var table = document.getElementById("produits");
    table.deleteRow(0);
    console.log("Tableau supprimé !");

    // sort le Json array des produits
    if (prop !== "categorie") {
        sortByPrice(direction); /* modify productList */
        console.log("produits triés");
    } else {
        productList = JSON.parse(JSON.stringify(productListNotSorted)); /* copy productListNotSorted to productList */
    }
    
    // Réactualiser la vue tableau
    let aff_categorie = (prop === "categorie") ? 1 : 0;
    fillProdutsTable(aff_categorie);
}