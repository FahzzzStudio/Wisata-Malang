// ===================================
// MOBILE MENU TOGGLE
// ===================================
document.addEventListener("DOMContentLoaded", () => {
const menuToggle = document.getElementById("menuToggle")
const navMenu = document.getElementById("navMenu")

if (menuToggle && navMenu) {
    menuToggle.addEventListener("click", function () {
    navMenu.classList.toggle("active")

    // Animasi hamburger menu
    this.classList.toggle("active")
    })

    // Tutup menu saat link diklik (untuk mobile)
    const navLinks = navMenu.querySelectorAll(".nav-links a")
    navLinks.forEach((link) => {
    link.addEventListener("click", () => {
        navMenu.classList.remove("active")
        menuToggle.classList.remove("active")
    })
    })
}
})

// ===================================
// FAVORITE TOGGLE
// ===================================
function toggleFavorite(element, wisataId) {
element.classList.toggle("active")

// Animasi saat diklik
element.style.transform = "scale(1.3)"
setTimeout(() => {
    element.style.transform = "scale(1)"
}, 200)

// Simpan ke localStorage (untuk simulasi tanpa backend)
let favorites = JSON.parse(localStorage.getItem("favorites") || "[]")

if (element.classList.contains("active")) {
    if (!favorites.includes(wisataId)) {
    favorites.push(wisataId)
    }
    showNotification("Ditambahkan ke favorite!")
} else {
    favorites = favorites.filter((id) => id !== wisataId)
    showNotification("Dihapus dari favorite!")
}

localStorage.setItem("favorites", JSON.stringify(favorites))
}

// ===================================
// NOTIFICATION HELPER
// ===================================
function showNotification(message) {
// Buat elemen notifikasi
const notification = document.createElement("div")
notification.className = "notification"
notification.textContent = message
notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: var(--primary-color);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        z-index: 9999;
        animation: slideIn 0.3s ease;
    `

document.body.appendChild(notification)

// Hapus setelah 3 detik
setTimeout(() => {
    notification.style.animation = "slideOut 0.3s ease"
    setTimeout(() => {
    notification.remove()
    }, 300)
}, 3000)
}

// Tambahkan animasi CSS untuk notifikasi
const style = document.createElement("style")
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`
document.head.appendChild(style)

// ===================================
// PASSWORD TOGGLE
// ===================================
function togglePassword(inputId) {
const input = document.getElementById(inputId)
const icon = event.target

if (input.type === "password") {
    input.type = "text"
    icon.classList.remove("fa-eye-slash")
    icon.classList.add("fa-eye")
} else {
    input.type = "password"
    icon.classList.remove("fa-eye")
    icon.classList.add("fa-eye-slash")
}
}

// ===================================
// SMOOTH SCROLL
// ===================================
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
    target.scrollIntoView({
        behavior: "smooth",
        block: "start",
    })
    }
})
})

// ===================================
// LOAD FAVORITES ON PAGE LOAD
// ===================================
window.addEventListener("DOMContentLoaded", () => {
const favorites = JSON.parse(localStorage.getItem("favorites") || "[]")

// Tandai card yang sudah difavorite
favorites.forEach((wisataId) => {
    const favoriteBtn = document.querySelector(`[data-wisata-id="${wisataId}"]`)
    if (favoriteBtn) {
    favoriteBtn.classList.add("active")
    }
})
})

// ===================================
// SEARCH & FILTER (untuk halaman kategori)
// ===================================
function filterDestinations() {
const searchInput = document.getElementById("searchInput")
const categoryFilter = document.getElementById("categoryFilter")

if (!searchInput || !categoryFilter) return

const searchTerm = searchInput.value.toLowerCase()
const selectedCategory = categoryFilter.value

const cards = document.querySelectorAll(".destination-card")

cards.forEach((card) => {
    const title = card.querySelector(".card-title").textContent.toLowerCase()
    const category = card.querySelector(".card-category").textContent.toLowerCase()

    const matchesSearch = title.includes(searchTerm)
    const matchesCategory = selectedCategory === "" || category.includes(selectedCategory.toLowerCase())

    if (matchesSearch && matchesCategory) {
    card.style.display = "block"
    } else {
    card.style.display = "none"
    }
})
}

// ===================================
// FORM VALIDATION
// ===================================
function validateForm(formId) {
const form = document.getElementById(formId)
if (!form) return false

const inputs = form.querySelectorAll("input[required]")
let isValid = true

inputs.forEach((input) => {
    if (!input.value.trim()) {
    isValid = false
    input.style.borderColor = "red"

    // Reset border setelah user mulai mengetik
    input.addEventListener("input", function () {
        this.style.borderColor = ""
    })
    }
})

if (!isValid) {
    showNotification("Mohon lengkapi semua field!")
}

return isValid
}

// ===================================
// IMAGE LAZY LOADING
// ===================================
if ("IntersectionObserver" in window) {
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
    if (entry.isIntersecting) {
        const img = entry.target
        img.src = img.dataset.src
        img.classList.add("loaded")
        observer.unobserve(img)
    }
    })
})

document.querySelectorAll("img[data-src]").forEach((img) => {
    imageObserver.observe(img)
})
}
