// Hamburger Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    if (hamburger) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    }

    // Close menu when a link is clicked
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navMenu.classList.remove('active');
            if (hamburger) {
                hamburger.classList.remove('active');
            }
        });
    });

    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    initAdminNav();
    loadPublicGallery();
});

// Add to Cart Function
function addToCart(productId) {
    const cartItems = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    
    const existingItem = cartItems.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cartItems.push({
            id: productId,
            quantity: 1
        });
    }
    
    localStorage.setItem('cart', JSON.stringify(cartItems));
    alert('Produkto ay idinagdag sa cart! / Product added to cart!');
}

// Contact Form Submission
function submitContactForm(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData);
    
    // Validate form
    if (!data.name || !data.email || !data.message) {
        alert('Mangyaring punan ang lahat ng patlang. / Please fill in all fields.');
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(data.email)) {
        alert('Mangyaring maglagay ng wastong email. / Please enter a valid email.');
        return;
    }
    
    // Here you would typically send the data to a server
    console.log('Form Data:', data);
    alert('Salamat sa inyong mensahe! Malapit na kaming makikipag-ugnayan. / Thank you for your message! We will contact you soon.');
    event.target.reset();
}

// Filter Products
function filterProducts(category) {
    const products = document.querySelectorAll('.product-card');
    
    products.forEach(product => {
        if (category === 'all' || product.dataset.category === category) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

// Get Cart Count
function updateCartCount() {
    const cartItems = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    const totalItems = cartItems.reduce((sum, item) => sum + item.quantity, 0);
    
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        cartCount.textContent = totalItems;
    }
}

// Initialize cart count on page load
document.addEventListener('DOMContentLoaded', updateCartCount);

// Scroll to top button
window.addEventListener('scroll', function() {
    const scrollTopBtn = document.querySelector('.scroll-to-top');
    if (scrollTopBtn) {
        if (window.pageYOffset > 300) {
            scrollTopBtn.style.display = 'block';
        } else {
            scrollTopBtn.style.display = 'none';
        }
    }
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Navigation active state
function setActiveNav() {
    const navLinks = document.querySelectorAll('.nav-menu a');
    const currentLocation = location.href;
    
    navLinks.forEach(link => {
        if (link.href === currentLocation) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', setActiveNav);

function getSiteBasePath() {
    return window.location.pathname.toLowerCase().includes('/pages/') ? '../' : '';
}

function initAdminNav() {
    const adminNavItems = document.querySelectorAll('.admin-nav-item');

    if (!adminNavItems.length) {
        return;
    }

    const statusUrl = `${getSiteBasePath()}includes/admin-status.php`;

    fetch(statusUrl, {
        credentials: 'same-origin'
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Unable to load admin status.');
            }

            return response.json();
        })
        .then(data => {
            if (data.authenticated) {
                adminNavItems.forEach(item => item.classList.remove('hidden'));
            }
        })
        .catch(() => {
            adminNavItems.forEach(item => item.classList.add('hidden'));
        });
}

function loadPublicGallery() {
    const galleryGrid = document.getElementById('gallery-grid');

    if (!galleryGrid) {
        return;
    }

    const endpoint = galleryGrid.dataset.galleryEndpoint || `${getSiteBasePath()}includes/gallery-feed.php`;

    fetch(endpoint, {
        credentials: 'same-origin'
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Unable to load gallery.');
            }

            return response.json();
        })
        .then(items => {
            if (!Array.isArray(items) || items.length === 0) {
                galleryGrid.innerHTML = '<p class="gallery-empty">Gallery photos will appear here once they are uploaded.</p>';
                return;
            }

            galleryGrid.innerHTML = items.map(item => `
                <figure class="gallery-card">
                    <a href="../${item.image}" target="_blank" rel="noopener noreferrer">
                        <img src="../${item.image}" alt="${escapeHtml(item.title || 'Gallery image')}">
                    </a>
                    <figcaption>
                        <strong>${escapeHtml(item.title || 'Gallery Photo')}</strong>
                        <span>${escapeHtml(item.description || '')}</span>
                    </figcaption>
                </figure>
            `).join('');
        })
        .catch(() => {
            galleryGrid.innerHTML = '<p class="gallery-empty">The gallery is temporarily unavailable.</p>';
        });
}

function escapeHtml(value) {
    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}
