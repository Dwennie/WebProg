@extends('app')

@section('content')
    <!-- Main Introduction -->
    <section class="hero">
        <div class="availability-pill">My Background</div>
        <h1>Hello, I am Phil</h1>
        <p>A web developer based in the Philippines, focused on initial product strategy and building detailed interface systems. Bringing more than five years of expertise working alongside agile startups, connecting technical engineering with human-centric user experiences.</p>
    </section>

    <!-- Expertise Section -->
    <section id="expertise" class="skills">
        <span class="section-label">Professional Focus</span>
        <h2 class="section-title">Skills & Capabilities</h2>
        <p class="skills-description">I specialize in designing scalable UI frameworks, turning concepts into interactive wireframes, and creating rich micro-interactions.</p>
        <div class="skills-list">
            <div class="skill-pill">Figma Architectures</div>
            <div class="skill-pill">Backend Enhancements</div>
            <div class="skill-pill">Interactive Prototyping</div>
        </div>
    </section>

    <!-- Career History Section -->
    <section>
        <span class="section-label">My Journey</span>
        <h2 class="section-title">Career History</h2>

        <div class="timeline">
            <!-- Job 1 -->
            <div class="timeline-item active">
                <div class="timeline-dot"></div>
                <div class="timeline-date">2023 - Present</div>
                <h3 class="timeline-role">Independent Senior Developer</h3>
                <div class="timeline-company">Aegir Tech</div>
                <p class="timeline-desc">Engineered various robust web systems tailored for specialized client requirements.</p>
            </div>

            <!-- Job 2 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">2021 - 2023</div>
                <h3 class="timeline-role">Lead Frontend Developer</h3>
                <div class="timeline-company">Helio Smart Workspace</div>
                <p class="timeline-desc">Spearheaded the core development of a widely-used web-based conversational AI interface.</p>
            </div>

            <!-- Job 3 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-date">2019 - 2021</div>
                <h3 class="timeline-role">UI/UX Designer</h3>
                <div class="timeline-company">Aura Financial</div>
                <p class="timeline-desc">Directed the mobile application design lifecycle, moving from early research iterations straight through to precise visual hand-offs.</p>
            </div>
        </div>
    </section>

    <!-- Tools & Languages -->
    <section class="skills">
        <span class="section-label">My Toolkit</span>
        <h2 class="section-title">Preferred Technologies</h2>
        <div class="skills-list">
            <div class="skill-pill">Figma Pro</div>
            <div class="skill-pill">Webflow Setup</div>
            <div class="skill-pill">Design Tokens</div>
            <div class="skill-pill">CSS / JS</div>
            <div class="skill-pill">A/B Testing</div>
            <div class="skill-pill">User Journeys</div>
            <div class="skill-pill">Motion UI</div>
        </div>
    </section>
@endsection