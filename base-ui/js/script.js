// lama
// // toggle kelas aktif
// const navbarNav = document.querySelector(".navbar-nav");
// // ketika hamburger menu di klik
// document.querySelector("#hamburger-menu").onclick = () => {
//   navbarNav.classList.toggle("active");
// };

// // klik diluar sidebar untuk menghilangkan nav
// const hamburger = document.querySelector("#hamburger-menu");

// document.addEventListener("click", function (e) {
//   if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
//     navbarNav.classList.remove("active");
//   }
// });

// baru
// Toggle kelas aktif untuk navbar
const navbarNav = document.querySelector(".navbar-nav");
const hamburger = document.querySelector("#hamburger-menu");

hamburger.addEventListener("click", function (e) {
  e.preventDefault(); // Mencegah kembali ke atas
  navbarNav.classList.toggle("active");
});

// Klik di luar navbar untuk menutupnya
document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

const toggleViewBtn = document.getElementById("toggleViewBtn");
const cardView = document.getElementById("cardView");
const tableView = document.getElementById("tableView");

toggleViewBtn.addEventListener("click", () => {
  cardView.classList.toggle("hidden");
  tableView.classList.toggle("hidden");
  if (cardView.classList.contains("hidden")) {
    toggleViewBtn.id = "toggleViewBtnTable";
    toggleViewBtn.innerHTML = '<i data-feather="image"></i>&nbsp;Table View';
  } else {
    toggleViewBtn.id = "toggleViewBtn";
    toggleViewBtn.innerHTML = '<i data-feather="table"></i>&nbsp;Card View';
  }
  feather.replace();
});

function openLightbox(src) {
  document.getElementById("lightbox-img").src = src;
  document.getElementById("lightbox").style.display = "flex";
  document.getElementById("nav").style.zIndex = "0";
}

function closeLightbox() {
  document.getElementById("lightbox").style.display = "none";
  document.getElementById("nav").style.zIndex = "9999";
}

function toggleGallery() {
  const gallery = document.getElementById("gallery");
  gallery.classList.toggle("rows");
  const showMoreText = document.querySelector(".show-more");
  if (gallery.classList.contains("rows")) {
    showMoreText.textContent = "Show Less";
  } else {
    showMoreText.textContent = "Show More";
  }
}
