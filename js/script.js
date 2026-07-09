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

const ADMIN_USERNAME = 'admin';
const ADMIN_PASSWORD = 'AgriAdmin2026!';
const STORAGE_ADMIN_AUTH = 'agri_admin_authenticated';
const STORAGE_GALLERY = 'agri_gallery_items';

function getSiteBasePath() {
    const isPages = window.location.pathname.toLowerCase().includes('/pages/');
    const basePrefix = window.SITE_BASE || '/';
    return isPages ? (basePrefix === '/' ? '../' : basePrefix) : basePrefix;
}

function isAdminAuthenticated() {
    return localStorage.getItem(STORAGE_ADMIN_AUTH) === 'true';
}

function setAdminAuthenticated(isAuthenticated) {
    localStorage.setItem(STORAGE_ADMIN_AUTH, isAuthenticated ? 'true' : 'false');
}

function initAdminNav() {
    const adminNavItems = document.querySelectorAll('.admin-nav-item');

    if (!adminNavItems.length) {
        return;
    }

    if (isAdminAuthenticated()) {
        adminNavItems.forEach(item => item.classList.remove('hidden'));
    } else {
        adminNavItems.forEach(item => item.classList.add('hidden'));
    }
}

function getStoredGalleryItems() {
    const raw = localStorage.getItem(STORAGE_GALLERY);

    if (!raw) {
        return [];
    }

    try {
        const parsed = JSON.parse(raw);
        return Array.isArray(parsed) ? parsed : [];
    } catch {
        return [];
    }
}

function setStoredGalleryItems(items) {
    localStorage.setItem(STORAGE_GALLERY, JSON.stringify(items));
}

function loadDefaultGallerySeed() {
    const existing = getStoredGalleryItems();
    if (existing.length > 0) {
        return Promise.resolve(existing);
    }

    const base = window.SITE_BASE || '/';
    const source = `${base}data/gallery.json`;
    return fetch(source)
        .then(response => {
            if (!response.ok) {
                throw new Error('Unable to load default gallery seed.');
            }
            return response.json();
        })
        .then(items => {
            if (Array.isArray(items) && items.length > 0) {
                setStoredGalleryItems(items);
                return items;
            }
            return [];
        })
        .catch(() => []);
}

function resolveImagePath(imagePath) {
    if (!imagePath) {
        return '';
    }

    if (imagePath.startsWith('data:') || imagePath.startsWith('http://') || imagePath.startsWith('https://')) {
        return imagePath;
    }

    if (imagePath.startsWith('../') || imagePath.startsWith('./')) {
        return imagePath;
    }

    return `${getSiteBasePath()}${imagePath}`;
}

function renderGalleryItems(container, items) {
    if (!Array.isArray(items) || items.length === 0) {
        container.innerHTML = '<p class="gallery-empty">Gallery photos will appear here once they are uploaded.</p>';
        return;
    }

    container.innerHTML = items.map(item => {
        const resolvedImage = resolveImagePath(item.image);
        return `
            <figure class="gallery-card">
                <a href="${resolvedImage}" target="_blank" rel="noopener noreferrer">
                    <img src="${resolvedImage}" alt="${escapeHtml(item.title || 'Gallery image')}">
                </a>
                <figcaption>
                    <strong>${escapeHtml(item.title || 'Gallery Photo')}</strong>
                    <span>${escapeHtml(item.description || '')}</span>
                </figcaption>
            </figure>
        `;
    }).join('');
}

function loadPublicGallery() {
    const galleryGrid = document.getElementById('gallery-grid');

    if (!galleryGrid) {
        return;
    }

    const localItems = getStoredGalleryItems();
    if (localItems.length > 0) {
        renderGalleryItems(galleryGrid, localItems);
        return;
    }

    const base = window.SITE_BASE || '/';
    const source = galleryGrid.dataset.gallerySource || `${base}data/gallery.json`;
    fetch(source)
        .then(response => {
            if (!response.ok) {
                throw new Error('Unable to load gallery source.');
            }
            return response.json();
        })
        .then(items => {
            if (Array.isArray(items) && items.length > 0) {
                setStoredGalleryItems(items);
                renderGalleryItems(galleryGrid, items);
            } else {
                renderGalleryItems(galleryGrid, []);
            }
        })
        .catch(() => {
            galleryGrid.innerHTML = '<p class="gallery-empty">The gallery is temporarily unavailable.</p>';
        });
}

function initAdminPage() {
    const adminPage = document.getElementById('admin-page');
    if (!adminPage) {
        return;
    }

    const loginSection = document.getElementById('admin-login-section');
    const managerSection = document.getElementById('admin-manager-section');
    const loginForm = document.getElementById('admin-login-form');
    const uploadForm = document.getElementById('admin-upload-form');
    const logoutBtn = document.getElementById('admin-logout-btn');
    const statusMessage = document.getElementById('admin-status-message');
    const adminGallery = document.getElementById('admin-gallery-grid');

    const updateAdminView = () => {
        const authenticated = isAdminAuthenticated();
        loginSection.classList.toggle('hidden', authenticated);
        managerSection.classList.toggle('hidden', !authenticated);
        initAdminNav();
        renderGalleryItems(adminGallery, getStoredGalleryItems());
    };

    const showStatus = (message, type) => {
        statusMessage.textContent = message;
        statusMessage.classList.remove('hidden', 'success', 'error');
        statusMessage.classList.add(type);
    };

    loginForm.addEventListener('submit', event => {
        event.preventDefault();
        const formData = new FormData(loginForm);
        const username = String(formData.get('username') || '').trim();
        const password = String(formData.get('password') || '');

        if (username === ADMIN_USERNAME && password === ADMIN_PASSWORD) {
            setAdminAuthenticated(true);
            showStatus('Admin login successful.', 'success');
            loginForm.reset();
            updateAdminView();
            return;
        }

        showStatus('Invalid admin username or password.', 'error');
    });

    logoutBtn.addEventListener('click', () => {
        setAdminAuthenticated(false);
        showStatus('You have been logged out.', 'success');
        updateAdminView();
    });

    uploadForm.addEventListener('submit', event => {
        event.preventDefault();

        const formData = new FormData(uploadForm);
        const title = String(formData.get('title') || '').trim();
        const description = String(formData.get('description') || '').trim();
        const file = formData.get('gallery_photo');

        if (!(file instanceof File) || file.size === 0) {
            showStatus('Please choose an image to upload.', 'error');
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            showStatus('Image must be 5 MB or smaller.', 'error');
            return;
        }

        const extension = file.name.split('.').pop().toLowerCase();
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        if (!allowedExtensions.includes(extension)) {
            showStatus('Only JPG, JPEG, PNG, WEBP, and GIF files are allowed.', 'error');
            return;
        }

        const reader = new FileReader();
        reader.onload = () => {
            const items = getStoredGalleryItems();
            items.unshift({
                title: title || 'Gallery Photo',
                description,
                image: String(reader.result),
                uploadedAt: new Date().toISOString()
            });
            setStoredGalleryItems(items);
            uploadForm.reset();
            showStatus('Gallery image uploaded successfully.', 'success');
            renderGalleryItems(adminGallery, items);
        };
        reader.onerror = () => {
            showStatus('Unable to process the selected image.', 'error');
        };
        reader.readAsDataURL(file);
    });

    loadDefaultGallerySeed().finally(updateAdminView);
}

function escapeHtml(value) {
    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}

document.addEventListener('DOMContentLoaded', initAdminPage);
