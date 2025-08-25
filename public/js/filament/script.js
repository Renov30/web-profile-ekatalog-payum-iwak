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
        toggleViewBtn.innerHTML = '<i data-feather="table"></i>';
    } else {
        toggleViewBtn.id = "toggleViewBtn";
        toggleViewBtn.innerHTML = '<i data-feather="image"></i>';
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

// Smooth scrolling functions
function scrollToProducts() {
    document.getElementById("products").scrollIntoView({
        behavior: "smooth",
    });
}

function scrollToAbout() {
    document.getElementById("about").scrollIntoView({
        behavior: "smooth",
    });
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Header background change on scroll
window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    if (window.scrollY > 100) {
        header.style.background = "rgba(13, 110, 253, 0.95)";
        header.style.backdropFilter = "blur(10px)";
    } else {
        header.style.background = "";
        header.style.backdropFilter = "";
    }
});

// Add to cart functionality (placeholder)
document.querySelectorAll("button").forEach((button) => {
    if (button.textContent.includes("Pesan Sekarang")) {
        button.addEventListener("click", function () {
            // Simple alert for demo purposes
            const productName =
                this.closest(".product-card").querySelector("h3").textContent;
            alert(
                `Terima kasih! ${productName} telah ditambahkan ke keranjang. Untuk pemesanan lebih lanjut, silakan hubungi kami melalui WhatsApp.`
            );

            // In real implementation, this would add to cart
            console.log(`Added ${productName} to cart`);
        });
    }
});

// Heart icon toggle
document.querySelectorAll(".fa-heart").forEach((heart) => {
    heart.addEventListener("click", function () {
        this.classList.toggle("text-red-500");
        this.classList.toggle("text-gray-400");

        if (this.classList.contains("text-red-500")) {
            console.log("Added to wishlist");
        } else {
            console.log("Removed from wishlist");
        }
    });
});

// Animate elements on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

// Observe product cards for animation
document.querySelectorAll(".product-card").forEach((card) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = "all 0.6s ease";
    observer.observe(card);
});

// Mobile menu toggle (placeholder)
document
    .querySelector('button[class*="md:hidden"]')
    .addEventListener("click", function () {
        console.log("Mobile menu toggled");
        // In real implementation, this would toggle mobile menu
    });
