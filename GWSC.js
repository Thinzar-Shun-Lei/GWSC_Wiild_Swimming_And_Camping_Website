
//Hamburger Menu
const hamburgerMenu = document.querySelector(".hamburger");
const dropdownMenu = document.querySelector(".dropdown-menu");

hamburgerMenu.addEventListener("click", (e) => {
  e.stopPropagation();
  if (dropdownMenu.style.display === "block") {
    dropdownMenu.style.display = "none";
  } else {
    dropdownMenu.style.display = "block";
  }
});

document.addEventListener( 'click', function() {
  dropdownMenu.style.display = 'none';
});

// Payment rdo
const cardBox = document.getElementsByClassName("paymentCardBox")[0];
const digitalBox = document.getElementsByClassName("paymentDigitalBox")[0];
function cardBoxVisible() {
  cardBox.classList.remove("hidden");
  digitalBox.classList.add("hidden");
   
}
function digitalBoxVisible() {
  cardBox.classList.add("hidden");
  digitalBox.classList.remove("hidden");
}

// Google translator
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}

// Modal Box
const modalBox = document.getElementById("modalBox");
const btnCancel = document.querySelector(".modalCancel");
const originalHeight = document.body.getBoundingClientRect().height;
const requiredHeight = originalHeight * 0.7;

function scrollHandler() {
if(window.scrollY > requiredHeight) {
  modalBox.style.display = "block";
  window.removeEventListener("scroll", scrollHandler);
}
}
window.addEventListener("scroll", scrollHandler);

function cancelBtn() {
if(modalBox.style.display === "block") {
  modalBox.style.display = "none";
}
else if(modalCBox.style.display === "block") {
  modalCBox.style.display = "none";
}
};

// Cookie Consent
const modalCBox = document.getElementById("modalCBox");
const cookieFun = () => {
    modalCBox.style.display = "block";
}
window.addEventListener("load", cookieFun);





