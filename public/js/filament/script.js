// toggle tombol navbar mobile
// document.addEventListener("DOMContentLoaded", function () {
//     const navbarNav = document.getElementById("navbarNav");
//     const hamburger = document.getElementById("hamburger-menu");

//     // Toggle menu
//     hamburger.addEventListener("click", function () {
//         navbarNav.classList.toggle("hidden");
//     });

//     // Klik di luar menu untuk menutup
//     document.addEventListener("click", function (e) {
//         if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
//             if (!navbarNav.classList.contains("hidden")) {
//                 navbarNav.classList.add("hidden");
//             }
//         }
//     });
// });

// for home

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
    const headerHome = document.getElementById("home-header");

    // kalau elementnya ga ada, langsung stop
    if (!headerHome) return;

    if (window.scrollY > 50) {
        headerHome.classList.add("ocean-gradient", "shadow-lg");
    } else {
        headerHome.classList.remove("ocean-gradient", "shadow-lg");
    }
});

// kalau mau setiap navbar punya efek scroll
// window.addEventListener("scroll", function () {
//     const headerHome = document.getElementById("home-header");
//     const headerCatalog = document.getElementById("catalog-header");

//     if (headerHome) {
//         if (window.scrollY > 50) {
//             headerHome.classList.add("ocean-gradient", "shadow-lg");
//         } else {
//             headerHome.classList.remove("ocean-gradient", "shadow-lg");
//         }
//     }

//     if (headerCatalog) {
//         if (window.scrollY > 50) {
//             headerCatalog.classList.add("bg-white", "shadow-md");
//         } else {
//             headerCatalog.classList.remove("bg-white", "shadow-md");
//         }
//     }
// });

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

document.querySelectorAll(".tentang-box").forEach((card) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = "all 0.6s ease";
    observer.observe(card);
});

// for katalog

// Products Database
const products = [
    // Sabun
    {
        id: 1,
        name: "Sabun Natural Sea Salt",
        category: "sabun",
        price: 25000,
        originalPrice: 30000,
        image: "https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/03816622-3985-4b59-b991-f266eb9b6af7.png",
        imageAlt:
            "Handcrafted sea salt soap bar with natural white color and embedded sea salt crystals, photographed on driftwood with seashells and ocean background",
        rating: 4.9,
        reviews: 156,
        badge: "bestseller",
        description:
            "Sabun alami dengan garam laut yang membersihkan dan melembabkan kulit secara mendalam.",
        ingredients: [
            "Garam Laut",
            "Minyak Kelapa",
            "Shea Butter",
            "Essential Oil",
        ],
        benefits: [
            "Membersihkan mendalam",
            "Melembabkan kulit",
            "Menghilangkan sel kulit mati",
            "Aroma menenangkan",
        ],
    },
    {
        id: 2,
        name: "Sabun Seaweed Detox",
        category: "sabun",
        price: 28000,
        originalPrice: 35000,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Green seaweed detox soap bar with visible seaweed flakes, arranged on dark volcanic rocks with fresh seaweed and ocean mist background",
        rating: 4.8,
        reviews: 98,
        badge: "organic",
        description:
            "Sabun detox dengan ekstrak rumput laut untuk membersihkan dan menyegarkan kulit.",
        ingredients: ["Rumput Laut", "Charcoal", "Tea Tree Oil", "Aloe Vera"],
        benefits: [
            "Detoksifikasi kulit",
            "Mengontrol minyak",
            "Anti bakteri",
            "Menyegarkan",
        ],
    },
    {
        id: 3,
        name: "Sabun Honey Oat",
        category: "sabun",
        price: 30000,
        originalPrice: null,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Golden honey oat soap bar with visible oat flakes and honey drizzle, surrounded by honeycomb, oats, and wildflowers on rustic wooden surface",
        rating: 4.9,
        reviews: 203,
        badge: "new",
        description:
            "Sabun madu dan oat untuk kulit sensitif dengan formula lembut dan bergizi.",
        ingredients: ["Madu Murni", "Oat", "Minyak Zaitun", "Chamomile"],
        benefits: [
            "Cocok kulit sensitif",
            "Nutrisi kulit",
            "Anti inflamasi",
            "Melembabkan",
        ],
    },

    // Body Scrub
    {
        id: 4,
        name: "Coffee Sea Salt Scrub",
        category: "body-scrub",
        price: 35000,
        originalPrice: 42000,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Luxurious coffee and sea salt body scrub in a clear glass jar with wooden lid, surrounded by coffee beans, sea salt crystals, and tropical palm leaves",
        rating: 4.8,
        reviews: 134,
        badge: "bestseller",
        description:
            "Scrub kopi dan garam laut untuk mengangkat sel kulit mati dan meningkatkan sirkulasi.",
        ingredients: [
            "Kopi Arabika",
            "Garam Laut",
            "Coconut Oil",
            "Brown Sugar",
        ],
        benefits: [
            "Eksfoliasi sempurna",
            "Meningkatkan sirkulasi",
            "Anti selulit",
            "Kulit halus",
        ],
    },
    {
        id: 5,
        name: "Sugar Vanilla Scrub",
        category: "body-scrub",
        price: 32000,
        originalPrice: null,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Sweet vanilla sugar scrub with brown sugar crystals in elegant amber jar, decorated with vanilla beans, cinnamon sticks, and soft cream fabric",
        rating: 4.7,
        reviews: 87,
        badge: "organic",
        description:
            "Scrub gula vanilla yang lembut dengan aroma manis yang menenangkan.",
        ingredients: [
            "Brown Sugar",
            "Vanilla Extract",
            "Jojoba Oil",
            "Vitamin E",
        ],
        benefits: [
            "Eksfoliasi lembut",
            "Aroma menenangkan",
            "Melembabkan",
            "Anti aging",
        ],
    },
    {
        id: 6,
        name: "Green Tea Mint Scrub",
        category: "body-scrub",
        price: 38000,
        originalPrice: null,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Refreshing green tea mint scrub with visible green tea leaves and mint flakes, displayed with fresh mint leaves and green tea powder on bamboo mat",
        rating: 4.9,
        reviews: 165,
        badge: "new",
        description:
            "Scrub teh hijau dan mint yang menyegarkan dengan antioksidan tinggi.",
        ingredients: ["Green Tea", "Peppermint", "Sea Salt", "Almond Oil"],
        benefits: [
            "Antioksidan tinggi",
            "Menyegarkan",
            "Detoks kulit",
            "Aromaterapi",
        ],
    },

    // Body Butter
    {
        id: 7,
        name: "Coconut Paradise Butter",
        category: "body-butter",
        price: 45000,
        originalPrice: 55000,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Rich coconut body butter in elegant white jar with gold accents, surrounded by fresh coconut halves, tropical flowers, and palm fronds on sandy beach background",
        rating: 4.9,
        reviews: 289,
        badge: "bestseller",
        description:
            "Body butter kelapa yang kaya nutrisi untuk kulit kering dan sensitif.",
        ingredients: [
            "Virgin Coconut Oil",
            "Shea Butter",
            "Cocoa Butter",
            "Vitamin E",
        ],
        benefits: [
            "Hidrasi intensif",
            "Repair kulit",
            "Anti aging",
            "Aroma tropis",
        ],
    },
    {
        id: 8,
        name: "Lavender Dreams Butter",
        category: "body-butter",
        price: 48000,
        originalPrice: null,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Creamy lavender body butter in purple-tinted glass jar with silver lid, arranged with fresh lavender sprigs, dried lavender, and soft purple silk fabric",
        rating: 4.8,
        reviews: 176,
        badge: "organic",
        description:
            "Body butter lavender untuk relaksasi dan kelembaban maksimal.",
        ingredients: [
            "Lavender Essential Oil",
            "Mango Butter",
            "Argan Oil",
            "Chamomile",
        ],
        benefits: [
            "Relaksasi",
            "Melembabkan intensif",
            "Anti stress",
            "Aromaterapi",
        ],
    },
    {
        id: 9,
        name: "Rose Gold Luxury Butter",
        category: "body-butter",
        price: 52000,
        originalPrice: null,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Luxurious rose gold body butter in premium rose gold container with elegant rose petals, gold leaf details, and soft pink silk on marble surface",
        rating: 5.0,
        reviews: 143,
        badge: "new",
        description:
            "Body butter premium dengan ekstrak mawar untuk kulit mewah dan bercahaya.",
        ingredients: [
            "Rose Extract",
            "24K Gold",
            "Jojoba Oil",
            "Hyaluronic Acid",
        ],
        benefits: [
            "Anti aging premium",
            "Glowing skin",
            "Luxury treatment",
            "Hidrasi mendalam",
        ],
    },

    // Lip Balm
    {
        id: 10,
        name: "Tropical Fruit Lip Balm Set",
        category: "lip-balm",
        price: 45000,
        originalPrice: 60000,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Set of colorful tropical fruit lip balms in sleek tubes with mango, strawberry, and coconut flavors, displayed with fresh tropical fruits and flowers",
        rating: 4.7,
        reviews: 234,
        badge: "bestseller",
        description:
            "Set 3 lip balm rasa buah tropis untuk bibir lembut dan terlindungi.",
        ingredients: ["Beeswax", "Coconut Oil", "Fruit Extracts", "SPF 15"],
        benefits: [
            "Melembabkan bibir",
            "SPF Protection",
            "3 rasa berbeda",
            "Tahan lama",
        ],
    },
    {
        id: 11,
        name: "Mint Fresh Lip Balm",
        category: "lip-balm",
        price: 18000,
        originalPrice: null,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Single mint fresh lip balm in clear tube with green tint, surrounded by fresh mint leaves and ice crystals on cool blue background",
        rating: 4.6,
        reviews: 98,
        badge: "organic",
        description:
            "Lip balm mint yang menyegarkan dengan sensasi dingin alami.",
        ingredients: ["Peppermint Oil", "Menthol", "Shea Butter", "Vitamin E"],
        benefits: [
            "Sensasi fresh",
            "Melembabkan",
            "Aroma mint",
            "Natural cooling",
        ],
    },
    {
        id: 12,
        name: "Honey Vanilla Lip Balm",
        category: "lip-balm",
        price: 20000,
        originalPrice: null,
        image: "https://placehold.co/400x300",
        imageAlt:
            "Golden honey vanilla lip balm in elegant amber tube with honey dripping effect, decorated with vanilla pods, honeycomb, and warm golden lighting",
        rating: 4.9,
        reviews: 167,
        badge: "new",
        description:
            "Lip balm madu vanilla dengan formula bergizi untuk bibir sehat.",
        ingredients: [
            "Raw Honey",
            "Vanilla Extract",
            "Cocoa Butter",
            "Almond Oil",
        ],
        benefits: [
            "Nutrisi bibir",
            "Aroma manis",
            "Healing properties",
            "Long lasting",
        ],
    },
];

let currentProducts = [...products];
let cart = JSON.parse(localStorage.getItem("cart")) || [];
let currentPage = 1;
const productsPerPage = 8;

// Initialize page
document.addEventListener("DOMContentLoaded", function () {
    displayProducts();
    updateCartBadge();
    setupSearch();
});

// Display products
function displayProducts() {
    const grid = document.getElementById("productsGrid");
    const loading = document.getElementById("loading");
    const noProducts = document.getElementById("noProducts");

    loading.classList.add("active");

    setTimeout(() => {
        loading.classList.remove("active");

        if (currentProducts.length === 0) {
            grid.innerHTML = "";
            noProducts.classList.remove("hidden");
            return;
        }

        noProducts.classList.add("hidden");

        const startIndex = (currentPage - 1) * productsPerPage;
        const endIndex = startIndex + productsPerPage;
        const productsToShow = currentProducts.slice(startIndex, endIndex);

        grid.innerHTML = productsToShow
            .map((product) => createProductCard(product))
            .join("");
        updatePagination();
    }, 500);
}

// Create product card HTML
function createProductCard(product) {
    const discountPercentage = product.originalPrice
        ? Math.round(
              ((product.originalPrice - product.price) /
                  product.originalPrice) *
                  100
          )
        : 0;

    const badgeClass = {
        new: "badge-new",
        bestseller: "badge-bestseller",
        organic: "badge-organic",
    };

    return `
                <div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100" data-category="${
                    product.category
                }">
                    <div class="relative group">
                        <img src="${product.image}" alt="${
        product.imageAlt
    }" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500"/>
                        
                        ${
                            product.badge
                                ? `
                            <div class="absolute top-4 left-4">
                                <span class="${
                                    badgeClass[product.badge]
                                } text-white px-3 py-1 rounded-full text-sm font-semibold capitalize">
                                    ${
                                        product.badge === "bestseller"
                                            ? "Best Seller"
                                            : product.badge
                                    }
                                </span>
                            </div>
                        `
                                : ""
                        }
                        
                        ${
                            discountPercentage > 0
                                ? `
                            <div class="absolute top-4 right-4">
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                                    -${discountPercentage}%
                                </span>
                            </div>
                        `
                                : ""
                        }
                        
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                            <button onclick="openProductModal(${
                                product.id
                            })" class="bg-white text-blue-600 px-4 py-2 rounded-full font-semibold opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                <i class="fas fa-eye mr-2"></i>Lihat Detail
                            </button>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-blue-600 font-medium capitalize">${product.category.replace(
                                "-",
                                " "
                            )}</span>
                            <button onclick="toggleWishlist(${
                                product.id
                            })" class="text-gray-400 hover:text-red-500 transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-blue-600 cursor-pointer" onclick="openProductModal(${
                            product.id
                        })">${product.name}</h3>
                        
                        <p class="text-gray-600 mb-4 text-sm line-clamp-2">${
                            product.description
                        }</p>
                        
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 text-sm">
                                ${generateStars(product.rating)}
                            </div>
                            <span class="text-sm text-gray-500 ml-2">(${
                                product.rating
                            }) • ${product.reviews} ulasan</span>
                        </div>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-2xl font-bold text-blue-600">Rp ${product.price.toLocaleString()}</span>
                                ${
                                    product.originalPrice
                                        ? `
                                    <span class="text-sm text-gray-400 line-through">Rp ${product.originalPrice.toLocaleString()}</span>
                                `
                                        : ""
                                }
                            </div>
                        </div>
                        
                        <div class="flex space-x-2">
                            <button onclick="addToCart(${
                                product.id
                            })" class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                                <i class="fas fa-cart-plus mr-2"></i>Tambah
                            </button>
                            <button onclick="buyNow(${
                                product.id
                            })" class="px-4 py-3 border-2 border-blue-600 text-blue-600 rounded-xl font-semibold hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fas fa-bolt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
}

// Generate star rating
function generateStars(rating) {
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 !== 0;
    let stars = "";

    for (let i = 0; i < fullStars; i++) {
        stars += '<i class="fas fa-star"></i>';
    }

    if (hasHalfStar) {
        stars += '<i class="fas fa-star-half-alt"></i>';
    }

    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
    for (let i = 0; i < emptyStars; i++) {
        stars += '<i class="far fa-star"></i>';
    }

    return stars;
}

// Filter products
function filterProducts(category) {
    // Update active button
    document.querySelectorAll(".filter-button").forEach((btn) => {
        btn.classList.remove("active");
    });
    event.target.classList.add("active");

    // Filter products
    if (category === "all") {
        currentProducts = [...products];
    } else {
        currentProducts = products.filter(
            (product) => product.category === category
        );
    }

    currentPage = 1;
    displayProducts();
}

// Sort products
function sortProducts() {
    const sortValue = document.getElementById("sortSelect").value;

    switch (sortValue) {
        case "price-low":
            currentProducts.sort((a, b) => a.price - b.price);
            break;
        case "price-high":
            currentProducts.sort((a, b) => b.price - a.price);
            break;
        case "name":
            currentProducts.sort((a, b) => a.name.localeCompare(b.name));
            break;
        case "rating":
            currentProducts.sort((a, b) => b.rating - a.rating);
            break;
        default:
            currentProducts = [...products];
    }

    currentPage = 1;
    displayProducts();
}

// Search functionality
function setupSearch() {
    const searchInput = document.getElementById("searchInput");
    const suggestions = document.getElementById("searchSuggestions");

    if (!searchInput) return;

    searchInput.addEventListener("input", function () {
        const query = this.value.toLowerCase().trim();

        if (query.length === 0) {
            currentProducts = [...products];
            suggestions.classList.remove("active");
            displayProducts();
            return;
        }

        // Filter products based on search
        currentProducts = products.filter(
            (product) =>
                product.name.toLowerCase().includes(query) ||
                product.description.toLowerCase().includes(query) ||
                product.category.toLowerCase().includes(query)
        );

        // Show suggestions
        if (query.length > 0) {
            const suggestionProducts = currentProducts.slice(0, 5);
            suggestions.innerHTML = suggestionProducts
                .map(
                    (product) => `
                        <div class="p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-b-0" onclick="selectProduct(${
                            product.id
                        })">
                            <div class="flex items-center space-x-3">
                                <img src="${product.image}" alt="${
                        product.imageAlt
                    }" class="w-10 h-10 object-cover rounded"/>
                                <div>
                                    <div class="font-medium text-sm">${
                                        product.name
                                    }</div>
                                    <div class="text-xs text-gray-500">Rp ${product.price.toLocaleString()}</div>
                                </div>
                            </div>
                        </div>
                    `
                )
                .join("");
            suggestions.classList.add("active");
        } else {
            suggestions.classList.remove("active");
        }

        currentPage = 1;
        displayProducts();
    });

    // Close suggestions when clicking outside
    document.addEventListener("click", function (e) {
        if (
            !searchInput.contains(e.target) &&
            !suggestions.contains(e.target)
        ) {
            suggestions.classList.remove("active");
        }
    });
}

// Select product from suggestions
function selectProduct(productId) {
    document.getElementById("searchSuggestions").classList.remove("active");
    openProductModal(productId);
}

// Pagination
function updatePagination() {
    const pagination = document.getElementById("pagination");
    const totalPages = Math.ceil(currentProducts.length / productsPerPage);

    if (totalPages <= 1) {
        pagination.innerHTML = "";
        return;
    }

    let paginationHTML = "";

    // Previous button
    if (currentPage > 1) {
        paginationHTML += `<button onclick="changePage(${
            currentPage - 1
        })" class="px-3 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors"><i class="fas fa-chevron-left"></i></button>`;
    }

    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
        if (i === currentPage) {
            paginationHTML += `<button class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold">${i}</button>`;
        } else {
            paginationHTML += `<button onclick="changePage(${i})" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">${i}</button>`;
        }
    }

    // Next button
    if (currentPage < totalPages) {
        paginationHTML += `<button onclick="changePage(${
            currentPage + 1
        })" class="px-3 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors"><i class="fas fa-chevron-right"></i></button>`;
    }

    pagination.innerHTML = paginationHTML;
}

// Change page
function changePage(page) {
    currentPage = page;
    displayProducts();
    window.scrollTo({ top: 0, behavior: "smooth" });
}

// Open product modal
function openProductModal(productId) {
    const product = products.find((p) => p.id === productId);
    const modal = document.getElementById("productModal");
    const modalContent = document.getElementById("modalContent");

    modalContent.innerHTML = `
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2">
                        <img src="${product.image}" alt="${
        product.imageAlt
    }" class="w-full h-96 object-cover"/>
                    </div>
                    <div class="lg:w-1/2 p-8">
                        <button onclick="closeProductModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl">
                            <i class="fas fa-times"></i>
                        </button>
                        
                        <div class="mb-4">
                            ${
                                product.badge
                                    ? `<span class="badge-${product.badge} text-white px-3 py-1 rounded-full text-sm font-semibold capitalize mb-2 inline-block">${product.badge}</span>`
                                    : ""
                            }
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">${
                                product.name
                            }</h2>
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400">${generateStars(
                                    product.rating
                                )}</div>
                                <span class="text-gray-500 ml-2">(${
                                    product.rating
                                }) • ${product.reviews} ulasan</span>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <div class="flex items-center space-x-4 mb-4">
                                <span class="text-3xl font-bold text-blue-600">Rp ${product.price.toLocaleString()}</span>
                                ${
                                    product.originalPrice
                                        ? `<span class="text-xl text-gray-400 line-through">Rp ${product.originalPrice.toLocaleString()}</span>`
                                        : ""
                                }
                            </div>
                            <p class="text-gray-600 leading-relaxed">${
                                product.description
                            }</p>
                        </div>
                        
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-2">Bahan Utama:</h4>
                            <div class="flex flex-wrap gap-2">
                                ${product.ingredients
                                    .map(
                                        (ingredient) =>
                                            `<span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">${ingredient}</span>`
                                    )
                                    .join("")}
                            </div>
                        </div>
                        
                        <div class="mb-8">
                            <h4 class="font-bold text-gray-800 mb-2">Manfaat:</h4>
                            <ul class="space-y-1">
                                ${product.benefits
                                    .map(
                                        (benefit) =>
                                            `<li class="flex items-center text-gray-600"><i class="fas fa-check-circle text-green-500 mr-2"></i>${benefit}</li>`
                                    )
                                    .join("")}
                            </ul>
                        </div>
                        
                        <div class="flex space-x-4">
                            <button onclick="addToCart(${
                                product.id
                            })" class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold">
                                <i class="fas fa-cart-plus mr-2"></i>Tambah ke Keranjang
                            </button>
                            <button onclick="buyNow(${
                                product.id
                            })" class="px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-xl font-semibold hover:bg-blue-600 hover:text-white transition-all">
                                Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            `;

    modal.classList.add("active");
    document.body.style.overflow = "hidden";
}

// Close product modal
function closeProductModal() {
    const modal = document.getElementById("productModal");
    modal.classList.remove("active");
    document.body.style.overflow = "auto";
}

// Add to cart
function addToCart(productId) {
    const product = products.find((p) => p.id === productId);
    const existingItem = cart.find((item) => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartBadge();
    updateCartDisplay();

    // Show success message
    showNotification(
        `${product.name} berhasil ditambahkan ke keranjang!`,
        "success"
    );
}

// Update cart badge
function updateCartBadge() {
    const badge = document.getElementById("cartBadge");
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    badge.textContent = totalItems;
    badge.style.display = totalItems > 0 ? "flex" : "none";
}

// Toggle cart sidebar
function toggleCart() {
    const sidebar = document.getElementById("cartSidebar");
    const overlay = document.getElementById("cartOverlay");

    if (sidebar.classList.contains("translate-x-0")) {
        sidebar.classList.remove("translate-x-0");
        sidebar.classList.add("translate-x-full");
        overlay.classList.add("hidden");
        document.body.style.overflow = "auto";
    } else {
        sidebar.classList.remove("translate-x-full");
        sidebar.classList.add("translate-x-0");
        overlay.classList.remove("hidden");
        document.body.style.overflow = "hidden";
        updateCartDisplay();
    }
}

// Update cart display
function updateCartDisplay() {
    const cartItems = document.getElementById("cartItems");
    const cartTotal = document.getElementById("cartTotal");

    if (cart.length === 0) {
        cartItems.innerHTML = `
                    <div class="text-center text-gray-500 py-20">
                        <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                        <p>Keranjang masih kosong</p>
                    </div>
                `;
        cartTotal.textContent = "Rp 0";
        return;
    }

    const total = cart.reduce(
        (sum, item) => sum + item.price * item.quantity,
        0
    );

    cartItems.innerHTML = cart
        .map(
            (item) => `
                <div class="flex items-center space-x-4 mb-4 pb-4 border-b border-gray-200">
                    <img src="${item.image}" alt="${
                item.imageAlt
            }" class="w-16 h-16 object-cover rounded-lg"/>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-800 text-sm">${
                            item.name
                        }</h4>
                        <p class="text-blue-600 font-semibold">Rp ${item.price.toLocaleString()}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="updateCartQuantity(${item.id}, ${
                item.quantity - 1
            })" class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-minus text-xs"></i>
                        </button>
                        <span class="w-8 text-center font-medium">${
                            item.quantity
                        }</span>
                        <button onclick="updateCartQuantity(${item.id}, ${
                item.quantity + 1
            })" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center">
                            <i class="fas fa-plus text-xs"></i>
                        </button>
                    </div>
                    <button onclick="removeFromCart(${
                        item.id
                    })" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </div>
            `
        )
        .join("");

    cartTotal.textContent = `Rp ${total.toLocaleString()}`;
}

// Update cart quantity
function updateCartQuantity(productId, newQuantity) {
    if (newQuantity <= 0) {
        removeFromCart(productId);
        return;
    }

    const item = cart.find((item) => item.id === productId);
    if (item) {
        item.quantity = newQuantity;
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartBadge();
        updateCartDisplay();
    }
}

// Remove from cart
function removeFromCart(productId) {
    cart = cart.filter((item) => item.id !== productId);
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartBadge();
    updateCartDisplay();
}

// Buy now
function buyNow(productId) {
    addToCart(productId);
    toggleCart();
}

// Checkout
function checkout() {
    if (cart.length === 0) {
        showNotification("Keranjang masih kosong!", "error");
        return;
    }

    const total = cart.reduce(
        (sum, item) => sum + item.price * item.quantity,
        0
    );
    const message = `Halo, saya ingin memesan:\n\n${cart
        .map(
            (item) =>
                `${item.name} x${item.quantity} = Rp ${(
                    item.price * item.quantity
                ).toLocaleString()}`
        )
        .join("\n")}\n\nTotal: Rp ${total.toLocaleString()}`;

    const whatsappUrl = `https://wa.me/6281234567890?text=${encodeURIComponent(
        message
    )}`;
    window.open(whatsappUrl, "_blank");
}

// Toggle wishlist
function toggleWishlist(productId) {
    // This is a placeholder function
    event.target.classList.toggle("text-red-500");
    event.target.classList.toggle("text-gray-400");
}

// Show notification
function showNotification(message, type = "success") {
    const notification = document.createElement("div");
    notification.className = `fixed top-20 right-6 z-50 p-4 rounded-lg shadow-lg text-white font-medium transform translate-x-full transition-transform duration-300 ${
        type === "success" ? "bg-green-500" : "bg-red-500"
    }`;
    notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="fas fa-${
                        type === "success"
                            ? "check-circle"
                            : "exclamation-circle"
                    }"></i>
                    <span>${message}</span>
                </div>
            `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.remove("translate-x-full");
    }, 100);

    setTimeout(() => {
        notification.classList.add("translate-x-full");
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Close modal when clicking outside
document.getElementById("productModal").addEventListener("click", function (e) {
    if (e.target === this) {
        closeProductModal();
    }
});

// Mobile menu toggle (placeholder)
function toggleMobileMenu() {
    console.log("Mobile menu toggled");
}
