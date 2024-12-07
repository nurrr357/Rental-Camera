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

var modalupdate = document.getElementById('updateForm');

var updateModal = document.getElementById('updateModal');

var openModalBtn = document.getElementById('openModalBtn');


var openModalUpdate = document.getElementsByClassName('openupdate');

var closeSpanAdd = document.getElementsByClassName('close')[0];

var closeSpanUpdate = document.getElementsByClassName('close')[1];


openModalBtn.onclick = function() {
    modal.style.display = 'block';
}

closeSpanAdd.onclick = function(event) {
  modal.style.display = 'none';
};

document.querySelectorAll(".btn-edit").forEach((button) => {
  button.addEventListener("click", (event) => {
      event.preventDefault(); // Prevent page refresh
      const id = button.getAttribute("data-id");

      const cameraName = button.getAttribute("data-camera-name");
      const stok = button.getAttribute("data-stok");
      const paymentMethod = button.getAttribute("data-payment-method");
      const status = button.getAttribute("data-status");

      // Set nilai ke input field di modal edit
      document.getElementById("update_id").value = id;
      document.getElementById("edit_camera_name").value = cameraName;
      document.getElementById("edit_stok").value = stok;
      document.getElementById("edit_payment").value = paymentMethod;
      document.getElementById("edit_status").value = status;
      // Fetch edit data dynamically (optional if data already rendered)
      fetch(`?edit_id=${id}`)
          .then((response) => response.text())
          .then(() => {
              updateModal.style.display = "block"; // Show modal
          })
          .catch((error) => console.error("Error fetching data:", error));
  });
});
closeSpanUpdate.onclick = function(event) {
  updateModal.style.display = 'none';
};







