var categories = ["nom", "horaires", "adresse", "map_id"];
var data = [
    {
        "nom": "choc'efrei EFREI",
        "horaires": "24h/24 7j/7",
        "adresse": "30 - 32 Avenue de la République, Villejuif, France",
        "map_id": "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4420.84060519758!2d2.3618660993316043!3d48.78861856760469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e673e24e04a9c3%3A0xc55cb3e676f95321!2sEfrei%20Paris!5e0!3m2!1sfr!2sfr!4v1591612020875!5m2!1sfr!2sfr"
    },
    {
        "nom": "choc'efrei Kyoto",
        "horaires": "10 AM - 10 PM",
        "adresse": "58-2 Kisshōin Nagatachō, Japon",
        "map_id": "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2311.9997169463486!2d135.73513749379484!3d34.965095519833355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600105e6d0f1cf99%3A0x33b93add014b20fe!2s58-2%20Kissh%C5%8Din%20Nagatach%C5%8D%2C%20Minami-ku%2C%20Kyoto%2C%20601-8362%2C%20Japon!5e0!3m2!1sfr!2sfr!4v1591611839426!5m2!1sfr!2sfr"
    },
    {
        "nom": "choc'efrei Ouagadougou",
        "horaires": "09 AM - 07 PM",
        "adresse": "rue 15.293, Ouagadougou, Burkina Faso",
        "map_id": "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3277.7662650310385!2d-1.5114452874743773!3d12.319625932596509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebded56b5b389%3A0x8e6e1c53591aac13!2srue%2015.293%2C%20Ouagadougou%2C%20Burkina%20Faso!5e0!3m2!1sfr!2sfr!4v1591808474149!5m2!1sfr!2sfr"
    }
];

fill_tab();

/* ================================================================== */

function fill_tab() {
    tab = document.getElementById('adress_tab');
    for (i in data) {
        row = tab.insertRow(i);

        let map_button = document.createElement('button');
        let map_id = data[i]['map_id'];
        map_button.onclick = function () { change_adress(map_id); };
        map_button.innerHTML = "<h3>" + data[i]['nom'] + "</h3><p>" + data[i]['adresse'] + "</p><p>" + data[i]['horaires'] + "</p>";

        row.appendChild(map_button);
    }
}

function remove_adress() {
    let carte = document.getElementById('carte');
    carte.innerHTML = "";
}

function change_adress(src_adress) {

    let carte = document.createElement('iframe');
    carte.src = src_adress;
    carte.style.width = "100%";
    carte.style.height = "100%";
    remove_adress();
    document.getElementById('carte').appendChild(carte);

}
// exemple d'adresse: src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7434.90843458179!2d2.361469167218458!3d48.78881833956394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e673e24e04a9c3%3A0xc55cb3e676f95321!2sEfrei%20Paris!5e0!3m2!1sfr!2sfr!4v1591270072266!5m2!1sfr!2sfr"