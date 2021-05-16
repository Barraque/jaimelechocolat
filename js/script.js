function topnavManager() {
    var x = document.getElementById("mainTopNav");
    if (x.className === "topnav") {
      x.className += " responsiveNav";
    } else {
      x.className = "topnav";
    }
  }