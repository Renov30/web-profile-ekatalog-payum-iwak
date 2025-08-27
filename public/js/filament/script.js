// Toggle kelas aktif untuk navbar
document.addEventListener("DOMContentLoaded", function () {
    const navbarNav = document.getElementById("navbarNav");
    const hamburger = document.getElementById("hamburger-menu");

    // Toggle menu
    hamburger.addEventListener("click", function () {
        navbarNav.classList.toggle("hidden");
    });

    // Klik di luar menu untuk menutup
    document.addEventListener("click", function (e) {
        if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
            if (!navbarNav.classList.contains("hidden")) {
                navbarNav.classList.add("hidden");
            }
        }
    });
});

// new

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

// Header background change on scroll
window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    if (window.scrollY > 50) {
        // header.style.background = "rgba(13, 110, 253, 0.95)";
        // header.style.backdropFilter = "blur(10px)";
        header.classList.add("ocean-gradient");
        header.classList.add("shadow-lg");
    } else {
        // header.style.background = "";
        // header.style.backdropFilter = "";
        header.classList.remove("ocean-gradient");
        header.classList.remove("shadow-lg");
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
document.addEventListener("DOMContentLoaded", function () {
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

document.querySelectorAll(".why-choose").forEach((card) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = "all 0.6s ease";
    observer.observe(card);
});

document.querySelectorAll(".they-said").forEach((card) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = "all 0.6s ease";
    observer.observe(card);
});

document.querySelectorAll(".contact-box").forEach((card) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = "all 0.6s ease";
    observer.observe(card);
});
