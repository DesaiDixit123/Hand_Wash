document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialize AOS (Animate on Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80
        });
    }

    // 2. Sticky Header Scroll Animations & States
    const headerWrapper = document.querySelector('header.fixed-top');
    const header = document.querySelector('.sticky-header');
    const brand = document.querySelector('.navbar-brand');
    
    if (headerWrapper) {
        const toggleHeaderScrolled = () => {
            if (window.scrollY > 50) {
                headerWrapper.classList.add('header-scrolled');
            } else {
                headerWrapper.classList.remove('header-scrolled');
            }
            
            // Maintain solid white layout for consistency
            if (header) {
                header.classList.add('scrolled');
                if (brand) {
                    brand.classList.remove('text-white');
                    brand.classList.add('text-dark');
                }
            }
        };

        // Run once on load to set correct status
        toggleHeaderScrolled();
        window.addEventListener('scroll', toggleHeaderScrolled);
    }

    // 3. GSAP Parallax & Float Animations for Hero Showcase
    if (typeof gsap !== 'undefined') {
        // Floating animation for product cards
        gsap.to('.floating-product-card', {
            y: -15,
            rotation: 2,
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
            stagger: 0.5
        });

        // Parallax mouse movements inside hero showcase
        const showcase = document.querySelector('.hero-showcase-container');
        if (showcase) {
            showcase.addEventListener('mousemove', (e) => {
                const { clientX, clientY } = e;
                const rect = showcase.getBoundingClientRect();
                const xPos = (clientX - rect.left) / rect.width - 0.5;
                const yPos = (clientY - rect.top) / rect.height - 0.5;

                gsap.to('.floating-product-card', {
                    x: xPos * 40,
                    y: yPos * 40,
                    duration: 1,
                    ease: "power2.out"
                });
            });

            showcase.addEventListener('mouseleave', () => {
                gsap.to('.floating-product-card', {
                    x: 0,
                    y: 0,
                    duration: 1,
                    ease: "power2.out"
                });
            });
        }
    }

    // Initialize Hero Swiper Slider
    if (document.querySelector('.hero-swiper')) {
        new Swiper('.hero-swiper', {
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            speed: 1000,
            pagination: {
                el: '.hero-swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.hero-swiper-button-next',
                prevEl: '.hero-swiper-button-prev',
            }
        });
    }

    // 4. Testimonials Swiper Slider
    if (document.querySelector('.testimonials-slider')) {
        new Swiper('.testimonials-slider', {
            loop: true,
            spaceBetween: 32,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                992: {
                    slidesPerView: 2
                }
            },
            pagination: {
                el: '.testimonials-pagination',
                clickable: true,
            }
        });
    }

    // 5. Statistics Counters Trigger (AOS / Scroll Trigger)
    const counters = document.querySelectorAll('.stats-number');
    if (counters.length > 0) {
        const runCounter = () => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const inc = Math.ceil(target / 120);

                    if (count < target) {
                        counter.innerText = count + inc;
                        setTimeout(updateCount, 15);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    runCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats-gradient-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
    }

    // 6. Interactive India SVG Map Click Handlers
    const states = document.querySelectorAll('.india-state');
    const mapCardTitle = document.getElementById('map-card-title');
    const mapCardCities = document.getElementById('map-card-cities');
    const mapCardDealers = document.getElementById('map-card-dealers');
    const mapCardDetails = document.getElementById('map-card-details');

    if (states.length > 0) {
        states.forEach(state => {
            state.addEventListener('click', function() {
                states.forEach(s => s.classList.remove('active-state'));
                this.classList.add('active-state');

                const stateName = this.getAttribute('data-name');
                const dealerCount = this.getAttribute('data-dealers') || '0';
                const citiesList = this.getAttribute('data-cities') || 'No direct offices';
                const detailsText = this.getAttribute('data-details') || 'Dealership inquiries open.';

                if (mapCardTitle) mapCardTitle.innerText = stateName;
                if (mapCardDealers) mapCardDealers.innerText = dealerCount + ' Active Dealers';
                if (mapCardCities) mapCardCities.innerText = 'Key Hubs: ' + citiesList;
                if (mapCardDetails) mapCardDetails.innerText = detailsText;
            });
        });

        // Trigger click on Gujarat by default
        const defaultState = document.querySelector('.india-state[data-name="Gujarat"]');
        if (defaultState) {
            defaultState.dispatchEvent(new Event('click'));
        }
    }
});

// 7. Multi-step Dealer Registration Wizard Functions (Global scope)
window.nextStep = function(step) {
    // Basic validation of fields in the current active step
    const activeStepDiv = document.querySelector('.form-step.active');
    const inputs = activeStepDiv.querySelectorAll('input[required], textarea[required]');
    
    let valid = true;
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            valid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });

    if (!valid) {
        alert('Please fill out all required fields in this step.');
        return;
    }

    // Transition Step Display
    document.querySelectorAll('.form-step').forEach(stepDiv => {
        stepDiv.classList.remove('active');
    });
    document.getElementById('step-' + step).classList.add('active');

    // Update Progress Bullets
    document.querySelectorAll('.step-bullet').forEach((bullet, index) => {
        if (index < step - 1) {
            bullet.classList.add('completed');
            bullet.classList.remove('active');
        } else if (index === step - 1) {
            bullet.classList.add('active');
            bullet.classList.remove('completed');
        } else {
            bullet.classList.remove('active', 'completed');
        }
    });

    // Update Progress Bar Fill Width
    const fill = document.getElementById('wizard-progress-fill');
    if (fill) {
        const widthPercent = ((step - 1) / 2) * 100;
        fill.style.width = widthPercent + '%';
    }
};

window.prevStep = function(step) {
    document.querySelectorAll('.form-step').forEach(stepDiv => {
        stepDiv.classList.remove('active');
    });
    document.getElementById('step-' + step).classList.add('active');

    document.querySelectorAll('.step-bullet').forEach((bullet, index) => {
        if (index < step - 1) {
            bullet.classList.add('completed');
            bullet.classList.remove('active');
        } else if (index === step - 1) {
            bullet.classList.add('active');
            bullet.classList.remove('completed');
        } else {
            bullet.classList.remove('active', 'completed');
        }
    });

    const fill = document.getElementById('wizard-progress-fill');
    if (fill) {
        const widthPercent = ((step - 1) / 2) * 100;
        fill.style.width = widthPercent + '%';
    }
};

// 8. Gallery Filter and Lightbox Selection Handler
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    if (filterBtns.length > 0 && galleryItems.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active states
                filterBtns.forEach(b => {
                    b.classList.remove('btn-premium', 'active');
                    b.classList.add('btn-outline-premium');
                });
                this.classList.add('btn-premium', 'active');
                this.classList.remove('btn-outline-premium');
                
                // Perform dynamic filtering
                const filter = this.getAttribute('data-filter');
                galleryItems.forEach(item => {
                    const type = item.getAttribute('data-type');
                    if (filter === 'all' || type === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // 9. Close Mobile Navbar collapse when non-dropdown links are clicked
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)');
    const menuToggle = document.getElementById('navbarNav');
    if (navLinks.length > 0 && menuToggle) {
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (menuToggle.classList.contains('show')) {
                    const togglerButton = document.querySelector('.navbar-toggler');
                    if (togglerButton) {
                        togglerButton.click();
                    }
                }
            });
        });
    }
});
