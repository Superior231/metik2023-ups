// Navbar
const Navbar          = document.querySelector(".navbar"),
      NavDropdownMenu = document.querySelector(".navbar_2");


window.addEventListener("scroll", () => {
    if(window.pageYOffset > 20) {
        NavDropdownMenu.classList.add("fixed-top");
        Navbar.classList.add("fixed-top", "background");
    }
    else {
        Navbar.classList.remove("fixed-top", "background");
    }
});



// Navbar Active
const menuItems = document.querySelectorAll('nav ul li a');


// jika nav items diclick
menuItems.forEach(item => {
    item.addEventListener('click', function() {
    // Menghapus kelas "active" dari semua elemen menu
    menuItems.forEach(item => {
        item.classList.remove('active', 'text-light');
    });
    
    // Menambahkan kelas "active" pada elemen menu yang diklik
    this.classList.add('active', 'text-light');
    });

});

// Navbar Active End


// Hamburger Menu
const toggleBtn     = document.querySelector(".toggle_btn"),
      toggleBtnIcon = document.querySelector(".toggle_btn i"),
      dropDownMenu  = document.querySelector(".dropdown_menu");

toggleBtn.onclick = function() {
    dropDownMenu.classList.toggle("open")
    const isOpen = dropDownMenu.classList.contains("open")

    toggleBtnIcon.classList = isOpen
    ? "fa-solid fa-xmark"
    : "fa-solid fa-bars-staggered"
}

// Hamburger Menu End
// Navbar End


// See All
const toggleButton  = document.getElementById("toggleButtonSeeAll"),
      hiddenContent = document.querySelector(".hidden-about");
      SeeContent    = document.querySelector(".about-subjudul-container");

toggleButton.addEventListener("click", function () {
    if (hiddenContent.style.display === "none" || hiddenContent.style.display === "") {
        hiddenContent.style.display = "block";
        SeeContent.style.display = "none";
        toggleButton.textContent = "Hide";
    } else {
        hiddenContent.style.display = "none";
        SeeContent.style.display= "block";
        toggleButton.textContent = "See All";
    }
});
// See All End