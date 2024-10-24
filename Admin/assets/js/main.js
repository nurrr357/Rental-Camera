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

var openModalBtn = document.getElementById('openModalBtn');

var closeSpan = document.getElementsByClassName('close')[0];

var closeModalBtn = document.getElementById('closeModalBtn');

openModalBtn.onclick = function() {
    modal.style.display = 'block';
    function showMessage() {
      alert("Ini adalah pesan yang ditampilkan setelah 3 detik!");
    }
    
    setTimeout(showMessage, 3000);
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


