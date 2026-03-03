/**
 * STI Group Theme - Main JavaScript
 * 
 * @package STI_Group
 * @version 1.0.0
 */

(function() {
    'use strict';

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initParallax();
        initScrollAnimations();
        initMobileMenu();
        initSmoothScroll();
        initHeaderScroll();
    });

    /**
     * Parallax effect for gradient orbs
     */
    function initParallax() {
        const orbs = document.querySelectorAll('.glow');
        
        if (orbs.length === 0) return;

        document.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            
            orbs.forEach((orb, index) => {
                const speed = (index + 1) * 20;
                const xOffset = (window.innerWidth / 2 - e.clientX) / speed;
                const yOffset = (window.innerHeight / 2 - e.clientY) / speed;
                orb.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
            });
        });
    }

    /**
     * Intersection Observer for scroll animations
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all cards
        document.querySelectorAll('.glass-card').forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = `all 0.6s ease ${index * 0.1}s`;
            observer.observe(el);
        });

        // Observe stat items
        document.querySelectorAll('.stat-item').forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.animationDelay = `${index * 0.1 + 0.3}s`;
        });
    }

    /**
     * Mobile menu toggle
     */
    function initMobileMenu() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (!menuBtn || !mobileMenu) return;

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icon
            const icon = menuBtn.querySelector('svg');
            if (mobileMenu.classList.contains('hidden')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
            }
        });

        // Close menu on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuBtn.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>';
            });
        });
    }

    /**
     * Smooth scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const navHeight = document.querySelector('.nav-pill')?.offsetHeight || 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Header scroll effect
     */
    function initHeaderScroll() {
        const nav = document.querySelector('.nav-pill');
        if (!nav) return;

        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                nav.style.background = 'rgba(20, 20, 35, 0.8)';
                nav.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.3)';
            } else {
                nav.style.background = 'rgba(20, 20, 35, 0.6)';
                nav.style.boxShadow = 'none';
            }

            // Hide/show on scroll
            if (currentScroll > lastScroll && currentScroll > 200) {
                nav.style.transform = 'translate(-50%, -100%)';
            } else {
                nav.style.transform = 'translate(-50%, 0)';
            }
            
            nav.style.transition = 'all 0.3s ease';
            lastScroll = currentScroll;
        });
    }

    /**
     * Counter animation for stats
     */
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    /**
     * Lazy loading images (fallback for browsers without native support)
     */
    function initLazyLoading() {
        if ('loading' in HTMLImageElement.prototype) return;

        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    }

    /**
     * Form handling (contact form, calculator, etc.)
     */
    function initForms() {
        const forms = document.querySelectorAll('form[data-ajax="true"]');
        
        forms.forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                const formData = new FormData(form);
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn?.textContent;
                
                // Show loading state
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Отправка...';
                }
                
                try {
                    const response = await fetch(stiGroupAjax.ajaxurl, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showNotification('Сообщение успешно отправлено!', 'success');
                        form.reset();
                    } else {
                        showNotification('Ошибка отправки. Попробуйте ещё раз.', 'error');
                    }
                } catch (error) {
                    showNotification('Ошибка соединения. Попробуйте ещё раз.', 'error');
                } finally {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                    }
                }
            });
        });
    }

    /**
     * Show notification
     */
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed bottom-4 right-4 px-6 py-4 rounded-2xl glass-strong z-50 transform translate-y-20 opacity-0 transition-all duration-300`;
        notification.textContent = message;
        
        if (type === 'success') {
            notification.classList.add('border-green-500/50');
            notification.classList.add('text-green-400');
        } else if (type === 'error') {
            notification.classList.add('border-red-500/50');
            notification.classList.add('text-red-400');
        }
        
        document.body.appendChild(notification);
        
        // Animate in
        requestAnimationFrame(() => {
            notification.classList.remove('translate-y-20', 'opacity-0');
        });
        
        // Remove after 5 seconds
        setTimeout(() => {
            notification.classList.add('translate-y-20', 'opacity-0');
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }

    /**
     * Calculator functionality (if needed)
     */
    function initCalculator() {
        const calculatorSection = document.getElementById('calculator');
        if (!calculatorSection) return;

        // Add calculator logic here if you want a real calculator
        // For now it's a CTA section that scrolls to contact form
    }

    /**
     * Initialize all
     */
    function init() {
        initLazyLoading();
        initForms();
        initCalculator();
    }

    // Run additional initializations
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
