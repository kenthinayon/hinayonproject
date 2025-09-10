<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Professional Construction Services - Malunggay Pandesal DPWH')">
    <meta name="author" content="Malunggay Pandesal GP DPWH">
    
    <title>@yield('title', 'Construction Management') - Malunggay Pandesal.GP.DPWH</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    
    @stack('styles')
    @yield('head')
</head>
<body class="@yield('body-class', '')">
    <!-- Loading Spinner -->
    <div id="loading-spinner" class="loading-overlay">
        <div class="spinner">
            <div class="spinner-ring"></div>
            <div class="spinner-text">Building Excellence...</div>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="site-header">
        <nav class="navbar" role="navigation" aria-label="Main navigation">
            <!-- Logo/Brand -->
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="logo" aria-label="Home - Construction Management System">
                    <span class="logo-icon">🏗️</span>
                    <span class="logo-text">Hinayon Builder</span>
                    <span class="logo-subtitle">Construction Excellence</span>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="hamburger" onclick="toggleMenu()" aria-label="Toggle navigation menu" aria-expanded="false">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="menu" role="menu">
                <a href="{{ url('/') }}" 
                   class="menu-item {{ request()->is('/') ? 'active' : '' }}" 
                   role="menuitem">
                    <span class="menu-icon">🏠</span>
                    <span class="menu-text">Home</span>
                </a>
                <a href="{{ url('/about') }}" 
                   class="menu-item {{ request()->is('about') ? 'active' : '' }}" 
                   role="menuitem">
                    <span class="menu-icon">ℹ️</span>
                    <span class="menu-text">About Us</span>
                </a>
                <a href="{{ url('/contact') }}" 
                   class="menu-item {{ request()->is('contact') ? 'active' : '' }}" 
                   role="menuitem">
                    <span class="menu-icon">📞</span>
                    <span class="menu-text">Contact</span>
                </a>
            </div>

           
        </nav>

        <!-- Project Status Bar -->
        <div class="status-bar">
            <div class="status-item">
                <span class="status-icon">🏗️</span>
                <span class="status-label">Active Projects:</span>
                <span class="status-value">{{ $activeProjects ?? '12' }}</span>
            </div>
            <div class="status-item">
                <span class="status-icon">✅</span>
                <span class="status-label">Completed:</span>
                <span class="status-value">{{ $completedProjects ?? '284' }}</span>
            </div>
            <div class="status-item">
                <span class="status-icon">👷</span>
                <span class="status-label">Team Members:</span>
                <span class="status-value">{{ $teamMembers ?? '45' }}</span>
            </div>
        </div>

        <!-- Breadcrumb Navigation -->
        @if(!request()->is('/'))
        <div class="breadcrumb-container">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="breadcrumb-item">🏠 Home</a>
                @yield('breadcrumb')
            </nav>
        </div>
        @endif
    </header>

    <!-- Page Content -->
    <main class="main-content" role="main">
        <!-- Page Header -->
        @hasSection('page-header')
        <section class="page-header">
            <div class="header-bg"></div>
            <div class="container">
                <h1 class="page-title">@yield('page-title')</h1>
                @hasSection('page-subtitle')
                <p class="page-subtitle">@yield('page-subtitle')</p>
                @endif
                @hasSection('page-actions')
                <div class="page-actions">
                    @yield('page-actions')
                </div>
                @endif
            </div>
        </section>
        @endif

        <!-- Flash Messages -->
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <span class="alert-icon">✅</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close" onclick="this.parentElement.remove()" aria-label="Close alert">&times;</button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error" role="alert">
            <span class="alert-icon">⚠️</span>
            <span class="alert-message">{{ session('error') }}</span>
            <button class="alert-close" onclick="this.parentElement.remove()" aria-label="Close alert">&times;</button>
        </div>
        @endif

        @if(session('warning'))
        <div class="alert alert-warning" role="alert">
            <span class="alert-icon">🚧</span>
            <span class="alert-message">{{ session('warning') }}</span>
            <button class="alert-close" onclick="this.parentElement.remove()" aria-label="Close alert">&times;</button>
        </div>
        @endif

        <!-- Main Content Area -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer" role="contentinfo">
        <div class="footer-pattern"></div>
        <div class="footer-content">
            <!-- Company Info -->
            <div class="footer-section">
                <div class="footer-logo">
                    <span class="footer-logo-icon">🏗️</span>
                    <div class="footer-logo-text">
                        <h4>Hinayon Builder</h4>
                        <p>Construction Excellence</p>
                    </div>
                </div>
                <p class="company-description">
                    Leading the Philippines in infrastructure development with over 20 years of construction expertise.
                </p>
                <div class="certifications">
                    <span class="cert-badge">🏆 ISO 9001</span>
                    <span class="cert-badge">🛡️ PCAB Licensed</span>
                    <span class="cert-badge">✅ DPWH Accredited</span>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">🏠 Home</a></li>
                    <li><a href="{{ url('/about') }}">ℹ️ About Us</a></li>
                    <li><a href="{{ url('/careers') }}">💼 Careers</a></li>
                    <li><a href="{{ url('/contact') }}">📞 Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section">
                <h4 class="footer-title">Get In Touch</h4>
                <div class="contact-info">
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <div class="contact-details">
                            <strong>Head Office</strong>
                            <p>Malunggay Pandesal GP. DPWH<br>Butuan City</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <div class="contact-details">
                            <strong>Phone</strong>
                            <p>+63 (88) 123-4567<br>+63 (88) 987-6543</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">✉️</span>
                        <div class="contact-details">
                            <strong>Email</strong>
                            <p>info@malunggoypandesal.gov.ph<br>projects@dpwh.gov.ph</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-divider"></div>
            <div class="footer-bottom-content">
                <p class="copyright">
                    &copy; {{ date('Y') }} Malunggay Pandesal GP DPWH. All rights reserved.
                    <span class="version">Construction Pro v2.0</span>
                </p>
                <div class="footer-links-bottom">
                    <a href="{{ url('/privacy') }}">Privacy Policy</a>
                    <a href="{{ url('/terms') }}">Terms of Service</a>
                    <a href="{{ url('/safety') }}">Safety Standards</a>
                </div>
                <div class="footer-tech">
                    <span>⚡ Built with Laravel {{ app()->version() }} | 🏗️ Engineered for Excellence</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top" onclick="scrollToTop()" aria-label="Back to top">
        <span class="back-to-top-icon">⬆️</span>
    </button>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    
    <script>
        // Loading spinner
        window.addEventListener('load', function() {
            const loader = document.getElementById('loading-spinner');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 300);
            }
        });

        // Mobile menu toggle
        function toggleMenu() {
            const menu = document.querySelector('.menu');
            const hamburger = document.querySelector('.hamburger');
            
            menu.classList.toggle('active');
            hamburger.classList.toggle('active');
            hamburger.setAttribute('aria-expanded', menu.classList.contains('active'));
        }

        // Back to top functionality
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/hide back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        // Auto-hide alerts after 7 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }, 7000);
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Dynamic status bar updates (if needed)
        function updateStatusBar() {
            // Add your status update logic here
        }

        // Construction-themed animations
        function addConstructionAnimations() {
            const constructionElements = document.querySelectorAll('.construction-animate');
            constructionElements.forEach(element => {
                element.style.animation = 'constructionBuild 2s ease-in-out';
            });
        }

        // Initialize construction theme
        document.addEventListener('DOMContentLoaded', function() {
            addConstructionAnimations();
            
            // Add subtle parallax effect to header background
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const headerBg = document.querySelector('.header-bg');
                if (headerBg) {
                    headerBg.style.transform = `translateY(${scrolled * 0.5}px)`;
                }
            });
        });
    </script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>