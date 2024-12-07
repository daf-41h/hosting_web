const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");
const textSlider = document.querySelector(".text-group");

let currentIndex = 0;
const totalSlides = bullets.length;
let intervalId; // Variabel untuk menyimpan interval

document.addEventListener("DOMContentLoaded", () => {
  const hashLinks = document.querySelectorAll('a[href="#"]');

  hashLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault(); // Mencegah navigasi default
    });
  });
});

// Fungsi untuk mengganti slider berdasarkan indeks
function moveSlider(index) {
  // Update gambar
  images.forEach((img) => img.classList.remove("show"));
  images[index].classList.add("show");

  // Update teks
  textSlider.style.transform = `translateY(${-(index) * 2.2}rem)`;

  // Update bullet
  bullets.forEach((bullet) => bullet.classList.remove("active"));
  bullets[index].classList.add("active");
}

// Fungsi untuk mengatur perpindahan slide otomatis
function autoSlide() {
  currentIndex = (currentIndex + 1) % totalSlides; // Berputar melalui slide
  moveSlider(currentIndex);
}

// Set interval untuk mengganti slide setiap 3 detik
intervalId = setInterval(autoSlide, 800);

// Memungkinkan pergantian slide manual ketika bullet diklik
bullets.forEach((bullet, index) => {
  bullet.addEventListener("click", function () {
    clearInterval(intervalId); // Hentikan otomatis saat slide diklik manual
    currentIndex = index; // Perbarui indeks ke slide yang diklik
    moveSlider(currentIndex);
    intervalId = setInterval(autoSlide, 800); // Mulai otomatis lagi
  });
});

// Penanganan focus/blur untuk form input
inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

// Toggle antara mode sign-in dan sign-up
toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});
