// File: assets/admin/script.js
// Fungsi: JavaScript untuk admin dashboard

document.addEventListener("DOMContentLoaded", () => {
  // Search functionality
    const searchInputs = document.querySelectorAll('[id^="search"]')

    searchInputs.forEach((input) => {
        input.addEventListener("keyup", function () {
        const searchTerm = this.value.toLowerCase()
        const table = document.querySelector(".table")

        if (table) {
            const rows = table.querySelectorAll("tbody tr")
            rows.forEach((row) => {
            const text = row.textContent.toLowerCase()
            row.style.display = text.includes(searchTerm) ? "" : "none"
            })
        }
        })
    })

    // Sidebar active menu
    const currentPage = window.location.pathname
    const menuItems = document.querySelectorAll(".menu-item")

    menuItems.forEach((item) => {
        if (item.href && currentPage.includes(item.href.split("/").pop())) {
        item.classList.add("active")
        }
    })

    // Alert auto-hide
    const alerts = document.querySelectorAll(".alert")
    alerts.forEach((alert) => {
        setTimeout(() => {
        alert.style.opacity = "0"
        alert.style.transition = "opacity 0.3s ease"
        setTimeout(() => {
            alert.remove()
        }, 300)
        }, 5000)
    })

    // Form validation
    const forms = document.querySelectorAll("form")
    forms.forEach((form) => {
        form.addEventListener("submit", function (e) {
        const inputs = this.querySelectorAll("input[required], textarea[required], select[required]")
        let isValid = true

        inputs.forEach((input) => {
            if (!input.value.trim()) {
            isValid = false
            input.style.borderColor = "#dc3545"
            } else {
            input.style.borderColor = ""
            }
        })

        if (!isValid) {
            e.preventDefault()
            alert("Mohon isi semua field yang diperlukan!")
        }
        })
    })

    // Image preview
    const imageInputs = document.querySelectorAll('input[type="file"][accept*="image"]')
    imageInputs.forEach((input) => {
        input.addEventListener("change", (e) => {
        const file = e.target.files[0]
        if (file) {
            const reader = new FileReader()
            reader.onload = (event) => {
            const preview = document.querySelector(".image-preview img")
            if (preview) {
                preview.src = event.target.result
            }
            }
            reader.readAsDataURL(file)
        }
        })
    })

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
        e.preventDefault()
        const target = document.querySelector(this.getAttribute("href"))
        if (target) {
            target.scrollIntoView({ behavior: "smooth" })
        }
        })
    })
    })

    // Fungsi untuk format currency
    function formatCurrency(value) {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value)
    }

    // Fungsi untuk format date
    function formatDate(date) {
    return new Intl.DateTimeFormat("id-ID", {
        year: "numeric",
        month: "long",
        day: "numeric",
    }).format(new Date(date))
    }