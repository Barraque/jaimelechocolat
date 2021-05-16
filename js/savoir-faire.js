var commentList;

var default_data = [
    {
        "prenom": "Leanne",
        "nom": "Graham",
        "mail": "Sincere@april.biz",
        "comment": "Chocolate lollipop gummies. Danish cookie lemon drops dessert. Biscuit marzipan gingerbread cake I love dragée danish. Croissant powder candy canes gingerbread powder."
    },
    {
        "prenom": "Ervin",
        "nom": "Howell",
        "mail": "Shanna@melissa.tv",
        "comment": "Lollipop sesame snaps ice cream. Wafer topping biscuit tart marzipan ice cream cotton candy sweet roll. Topping marzipan I love danish marzipan lemon drops donut chupa chups brownie."
    },
    {
        "prenom": "Clementine",
        "nom": "Bauch",
        "mail": "Nathan@yesenia.net",
        "comment": "Marshmallow carrot cake I love cotton candy. Cake chocolate bar tootsie roll jelly beans I love marshmallow. Cake carrot cake dragée caramels. Powder chocolate bar cupcake."
    },
    {
        "prenom": "Patricia",
        "nom": "Lebsack",
        "mail": "Julianne.OConner@kory.org",
        "comment": "Pastry lollipop chocolate I love sweet apple pie powder pie lollipop. Tootsie roll gummi bears caramels tiramisu oat cake. Dragée croissant I love chocolate cake gummies candy canes marshmallow caramels. Brownie oat cake lemon drops marshmallow jelly-o I love."
    },
    {
        "prenom": "Chelsey",
        "nom": "Dietrich",
        "mail": "Lucio_Hettinger@annie.ca",
        "comment": "Icing sugar plum caramels sweet roll oat cake I love. Brownie cookie bear claw. Gummies sugar plum croissant gummies I love candy canes toffee pudding."

    }
]

// Original JavaScript code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

/* slideshow comments https://www.the-art-of-web.com/css/fading-slideshow-no-jquery/ */
window.addEventListener("DOMContentLoaded", function (e) {

    var stage = document.getElementById("customerComments");
    var fadeComplete = function (e) { stage.appendChild(arr[0]); };
    var arr = stage.getElementsByTagName("blockquote");
    for (var i = 0; i < arr.length; i++) {
        arr[i].addEventListener("animationend", fadeComplete, false);
    }

}, false);


init();

/* REMPLIR div    =================================================================== */
function init() {
    if (!localStorage.getItem('commentList')) {
        populateStorage();
    }
    commentList = JSON.parse(localStorage.commentList);

    // remplir à afficher
    fillComment()
}

function populateStorage() {
    localStorage.setItem('commentList', JSON.stringify(default_data));
}

function fillComment() {
    var comments = document.getElementById("customerComments");

    for (var i in commentList) {
        var blockquote = document.createElement("blockquote");
        blockquote.innerHTML += "<p>" + commentList[i]['comment'] + "</p><small>—" + commentList[i]['prenom'] + " " + commentList[i]['nom'] + ", <cite>" + commentList[i]['mail'] + "</cite></small>";
        comments.appendChild(blockquote);
    }

}