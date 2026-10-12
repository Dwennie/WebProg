<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Dwen-D</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #ffffff;
            --text-primary: #111111;
            --text-secondary: #555555;
            --accent-color: #5544ff;
            --accent-light: #eef1ff;
            --border-color: #eaeaea;
            --dark-bg: #151518;
            --dark-border: #2a2a2e;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 1040px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* --- Header & Navbar --- */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 0;
            margin-bottom: 48px;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .logo {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            text-decoration: none;
            color: var(--text-primary);
        }

        /* Desktop Navigation */
        .desktop-nav {
            display: flex;
            gap: 32px;
            align-items: center;
        }

        .desktop-nav a {
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .desktop-nav a:hover {
            color: var(--text-primary);
        }

        .menu-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border: 1px solid var(--border-color);
            border-radius: 50%;
            background: transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .menu-btn:hover {
            background-color: #f5f5f5;
        }

        /* --- Hero Section --- */
        .hero {
            margin-bottom: 96px;
            max-width: 800px;
        }

        .availability-pill {
            display: inline-flex;
            align-items: center;
            background-color: var(--accent-light);
            color: var(--accent-color);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1.5px;
            margin-bottom: 24px;
        }

        .hero p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 680px;
            line-height: 1.6;
        }

        /* --- Global Section Styles --- */
        section {
            margin-bottom: 96px;
            scroll-margin-top: 40px;
        }

        .section-label {
            display: block;
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--accent-color);
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 32px;
        }

        /* --- Featured Work --- */
        .project-card {
            border: 1px solid var(--border-color);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 32px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
        }

        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        .project-img-placeholder {
            width: 100%;
            height: 340px;
            background-size: cover;
            background-position: center;
        }

        .img-1 {
            background: linear-gradient(135deg, #121420 0%, #1e2238 100%);
            position: relative;
        }
        
        .img-1::after {
            content: '';
            position: absolute;
            top: 20%; left: 10%; right: 10%; bottom: 0;
            background: linear-gradient(90deg, rgba(23, 219, 219, 0.4) 0%, rgba(206, 44, 230, 0.4) 100%);
            filter: blur(40px);
            opacity: 0.5;
        }

        .img-2 {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            position: relative;
        }

        .img-2::after {
            content: '';
            position: absolute;
            top: 20%; left: 10%; right: 10%; bottom: 0;
            background: rgba(139, 92, 246, 0.1);
            filter: blur(30px);
        }

        .project-info {
            padding: 32px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .project-info h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-top: 8px;
        }

        .arrow-icon {
            color: var(--text-primary);
        }

        /* --- Services & Skills --- */
        .skills-description {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 32px;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill-pill {
            padding: 10px 20px;
            border: 1px solid var(--border-color);
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        /* --- Testimonial --- */
        .testimonial {
            padding: 48px 0;
            border-top: 1px solid var(--border-color);
        }

        .stars {
            display: flex;
            gap: 4px;
            margin-bottom: 24px;
        }

        .testimonial-quote {
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: -0.5px;
            margin-bottom: 32px;
            max-width: 900px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #ddd;
            background-image: url('https://i.pravatar.cc/150?img=11');
            background-size: cover;
        }

        .author-info h4 {
            font-size: 1rem;
            font-weight: 600;
        }

        .author-info p {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 2px;
        }

        /* --- CTA & Footer Area --- */
        .bottom-wrapper {
            background-color: var(--bg-color);
            padding-bottom: 48px;
        }

        .cta-box {
            background-color: var(--dark-bg);
            color: white;
            border-radius: 32px;
            padding: 64px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            scroll-margin-top: 40px;
        }

        .cta-box h2 {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 16px;
        }

        .cta-box p {
            color: #a1a1aa;
            font-size: 1.1rem;
            margin-bottom: 40px;
            max-width: 600px;
        }

        .btn-primary {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            background-color: var(--accent-color);
            color: white;
            padding: 20px 32px;
            border-radius: 16px;
            font-size: 1.125rem;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #4335df;
        }

        /* --- Footer --- */
        footer {
            margin-top: 32px;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #a1a1aa;
            font-size: 0.875rem;
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-links a {
            color: #a1a1aa;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        /* --- Responsive Design --- */
        @media (max-width: 768px) {
            .hero h1 { font-size: 3rem; }
            .section-title { font-size: 1.75rem; }
            .testimonial-quote { font-size: 1.25rem; }
            .cta-box { padding: 40px 24px; border-radius: 24px; }
            .cta-box h2 { font-size: 2rem; }
            .project-img-placeholder { height: 240px; }
            footer { flex-direction: column; gap: 16px; text-align: center; }
            
            
            .desktop-nav { display: none; }
        }
        
        @media (min-width: 769px) {
            
            .menu-btn { display: none; } 
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <header>
            <a href="{{ route('portfolio.home') }}" class="logo">Dwen-D</a>
            
            <nav class="desktop-nav">
                <a href="{{ route('work') }}">Work</a>
                <a href="{{ route('expertise') }}">Expertise</a>
                <a href="{{ route('testimonials') }}">Testimonials</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('aboutme') }}">About Me</a>
            </nav>

            <button class="menu-btn" aria-label="Menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="12" x2="20" y2="12"></line>
                    <line x1="4" y1="6" x2="20" y2="6"></line>
                    <line x1="4" y1="18" x2="20" y2="18"></line>
                </svg>
            </button>
        </header>

        @hasSection('content')
            @yield('content')
        @else
            <!-- Hero Section -->
            <section class="hero">
                <div class="availability-pill">Available for Q1 Projects</div>
                <h1>Designing digital products that feel human.</h1>
                <p>I'm Phil, a freelance Web Developer based in Bohol. I partner with tech startups to craft seamless, aesthetic, and functional user interfaces.</p>
            </section>

            
            <section id="work" class="work">
                <span class="section-label">Featured Work</span>
                <h2 class="section-title">Selected Projects</h2>

                <!-- Project 1 -->
                <a href="https://carent.infinityfreeapp.com/" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: inherit;">
                    <div class="project-card">
                        <div class="project-img-placeholder img-1"></div>
                        <div class="project-info">
                            <div>
                                <span class="section-label">Learning Module</span>
                                <h3>Iskwela Web</h3>
                            </div>
                            <div class="arrow-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                
                <div class="project-card">
                    <div class="project-img-placeholder img-2"></div>
                    <div class="project-info">
                        <div>
                            <span class="section-label">SaaS Platform</span>
                            <h3>Car Rent</h3>
                        </div>
                        <div class="arrow-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            <section id="expertise" class="skills">
                <span class="section-label">My Expertise</span>
                <h2 class="section-title">Services & Skills</h2>
                <p class="skills-description">I help teams build interactive wireframes, launch high-fidelity visuals, and define scalable design systems.</p>

                <div class="skills-list">
                    <div class="skill-pill">User Research</div>
                    <div class="skill-pill">UI/UX Design</div>
                    <div class="skill-pill">Interactive Prototypes</div>
                    <div class="skill-pill">Figma Design Systems</div>
                    <div class="skill-pill">Webflow Dev</div>
                    <div class="skill-pill">Brand Identity</div>
                    <div class="skill-pill">Design Tokens</div>
                </div>
            </section>

            <!-- Testimonial Section -->
            <section id="testimonials" class="testimonial">
                <div class="stars">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#fbbf24" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <h3 class="testimonial-quote">"Phil transformed our rough dashboard idea into a beautiful, highly intuitive product that helped us secure our Seed funding."</h3>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div class="author-info">
                        <h4>Marcus Vance</h4>
                        <p>Founder, Helio AI</p>
                    </div>
                </div>
            </section>
        @endif
    </div>

    <!-- Contact & Footer -->
    <div style="background-color: #151518; padding-top: 4px;">
        <div class="container" style="padding-bottom: 32px;">
            <div id="contact" class="cta-box">
                <h2>Let's build something together</h2>
                <p>Have an exciting idea or need help scaling your design team? Drop me a message and let's schedule a intro call.</p>
                <a href="#" class="btn-primary">
                    Get in Touch
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </a>
            </div>

            <footer>
                <div>© 2025 Dwen Design</div>
                <div class="footer-links">
                    <a href="#">Twitter</a>
                    <a href="#">LinkedIn</a>
                </div>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const isHomePage = @json(!View::hasSection('content'));

            function smoothScrollTo(targetId) {
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }

            // Handle clicks on nav links if on home page
            if (isHomePage) {
                document.querySelectorAll('header a[href]').forEach(link => {
                    const url = new URL(link.href, window.location.origin);
                    if (url.origin === window.location.origin && url.pathname !== '/aboutme') {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            const path = url.pathname;
                            if (window.location.pathname !== path) {
                                history.pushState(null, '', path);
                            }
                            
                            if (path === '/' || path === '/portfolio') {
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                            } else {
                                const targetId = path.replace(/^\/|\/$/g, '').split('/').pop();
                                smoothScrollTo(targetId);
                            }
                        });
                    }
                });
            }

            // Handle direct navigation and browser back/forward buttons
            function handleLocation() {
                if (isHomePage) {
                    const path = window.location.pathname;
                    const sectionName = path.replace(/^\/|\/$/g, '').split('/').pop();
                    if (sectionName && ['work', 'expertise', 'testimonials', 'contact'].includes(sectionName)) {
                        setTimeout(() => smoothScrollTo(sectionName), 80);
                    } else if (path === '/' || path === '/portfolio') {
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                }
            }

            handleLocation();
            window.addEventListener('popstate', handleLocation);
        });
    </script>
</body>
</html>