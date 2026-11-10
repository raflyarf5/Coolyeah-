// JavaScript minimal: hanya untuk dropdown "Informasi" dan pop up di halaman Layanan.
// Halaman lain murni HTML + CSS.

// ---------- Dropdown Informasi ----------
var tombolInfo = document.getElementById("tombol-informasi");
var menuInfo = document.getElementById("menu-informasi");

if (tombolInfo && menuInfo) {
  tombolInfo.addEventListener("click", function (e) {
    e.stopPropagation();
    menuInfo.classList.toggle("buka");
  });

  // klik di luar menu: tutup
  document.addEventListener("click", function () {
    menuInfo.classList.remove("buka");
  });
}

// ---------- Pop up Layanan ----------
var kartuLayanan = document.querySelectorAll("[data-popup]");
var semuaModal = document.querySelectorAll(".modal-latar");

function tutupSemuaModal() {
  semuaModal.forEach(function (m) {
    m.classList.remove("buka");
  });
}

kartuLayanan.forEach(function (kartu) {
  kartu.addEventListener("click", function () {
    var modal = document.getElementById(kartu.getAttribute("data-popup"));
    if (modal) modal.classList.add("buka");
  });
});

semuaModal.forEach(function (modal) {
  // klik tombol X
  var tombolX = modal.querySelector(".modal-tutup");
  if (tombolX) tombolX.addEventListener("click", tutupSemuaModal);

  // klik area gelap di luar kotak pop up
  modal.addEventListener("click", function (e) {
    if (e.target === modal) tutupSemuaModal();
  });
});

// tombol Esc
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") tutupSemuaModal();
});
