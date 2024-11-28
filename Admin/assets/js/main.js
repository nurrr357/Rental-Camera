// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

var modal = document.getElementById('myModal');

var updateModal = document.getElementById('updateModal');

var openModalBtn = document.getElementById('openModalBtn');

var openModalBtn = document.getElementById('openupdate');

var closeSpan = document.getElementsByClassName('close')[0];


openModalBtn.onclick = function() {
    modal.style.display = 'block';
}

closeSpan.onclick = function() {
    modal.style.display = 'none';
}

closeModalBtn.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

document.addEventListener("DOMContentLoaded", function() {

  if (successMessage) {
      // Show the message
      successMessage.style.display = "block";

      // Hide the message after 3 seconds
      setTimeout(() => {
          successMessage.style.display = "none";
      }, 3000);
  }
});




