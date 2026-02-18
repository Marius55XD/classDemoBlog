@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.bunny.net/css?family=playfair-display:400,600,700&family=source-sans-3:400,600');

    .about-hero {
        background: radial-gradient(circle at top left, rgba(255,255,255,0.15), rgba(255,255,255,0)) ,
                    linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #0b1324 100%);
        color: #f8fafc;
        position: relative;
        overflow: hidden;
    }
    .about-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" viewBox="0 0 160 160"><g fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="1"><circle cx="80" cy="80" r="40"/><circle cx="80" cy="80" r="70"/><path d="M0 80h160M80 0v160"/></g></svg>') center/320px repeat;
        opacity: 0.35;
    }
    .about-title {
        font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        letter-spacing: 0.5px;
    }
    .about-lede {
        font-family: "Source Sans 3", "Segoe UI", Tahoma, sans-serif;
    }
    .about-card {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        background: #fff;
    }
    .about-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.1);
    }
    .stat-pill {
        background: #0f172a;
        color: #e2e8f0;
        border-radius: 999px;
        padding: 0.35rem 0.9rem;
        font-size: 0.9rem;
    }
    .mission-band {
        background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
        border-radius: 18px;
        border: 1px solid #e2e8f0;
    }
    .value-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #0f172a;
        color: #e2e8f0;
    }
    .timeline {
        border-left: 2px solid #cbd5f5;
        padding-left: 1.5rem;
    }
    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -1.9rem;
        top: 0.2rem;
        width: 14px;
        height: 14px;
        background: #4f46e5;
        border-radius: 50%;
        box-shadow: 0 0 0 6px rgba(79, 70, 229, 0.12);
    }
</style>

<!-- Hero -->
<section class="about-hero py-5">
    <div class="container position-relative py-5" style="z-index: 1;">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="stat-pill mb-3 d-inline-flex">About the Studio</span>
                <h1 class="about-title display-4 fw-bold mb-3">We build a place for bold ideas and thoughtful writing.</h1>
                <p class="about-lede fs-5 mb-4">Laravel Blog is a modern publishing platform that helps developers share what they learn, document their journey, and build a community around their craft.</p>
                <div class="d-flex flex-wrap gap-3">
                    <div class="stat-pill">Founded 2026</div>
                    <div class="stat-pill">10k+ readers</div>
                    <div class="stat-pill">500+ posts</div>
                </div>
            </div>
            <div class="col-lg-5 mt-5 mt-lg-0">
                <div class="p-4 p-lg-5 bg-white text-dark rounded-4 shadow">
                    <h2 class="h5 fw-bold mb-3">Our Purpose</h2>
                    <p class="mb-4">Make technical knowledge accessible, practical, and inspiring for developers at every stage.</p>
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-lightning-charge-fill fs-2 text-primary"></i>
                        <div>
                            <div class="fw-semibold">Signal over noise</div>
                            <small class="text-muted">Crisp tutorials, real-world lessons.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Band -->
<section class="container my-5">
    <div class="mission-band p-4 p-lg-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <h2 class="about-title h2 fw-bold mb-3">Our mission is to elevate developer voices.</h2>
                <p class="about-lede text-muted mb-0">We partner with writers and community leaders to create content that is practical, authentic, and actionable. From first-time learners to senior engineers, we want every reader to leave with confidence.</p>
            </div>
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <span class="value-icon"><i class="bi bi-people-fill fs-4"></i></span>
                        <div>
                            <div class="fw-semibold">Community-first</div>
                            <small class="text-muted">Built with and for developers.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="value-icon"><i class="bi bi-journal-code fs-4"></i></span>
                        <div>
                            <div class="fw-semibold">Practical learning</div>
                            <small class="text-muted">Use today, understand tomorrow.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="value-icon"><i class="bi bi-shield-check fs-4"></i></span>
                        <div>
                            <div class="fw-semibold">Trusted guidance</div>
                            <small class="text-muted">Clear, honest, and transparent.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Cards -->
<section class="container my-5">
    <div class="text-center mb-5">
        <h2 class="about-title h2 fw-bold mb-2">What we stand for</h2>
        <p class="about-lede text-muted">A few principles that shape every story we publish.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="about-card p-4 h-100">
                <h3 class="h5 fw-semibold mb-3">Crafted storytelling</h3>
                <p class="text-muted mb-0">We edit for clarity and flow, making technical content feel human and approachable.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-card p-4 h-100">
                <h3 class="h5 fw-semibold mb-3">Evidence-driven</h3>
                <p class="text-muted mb-0">We share what we tested, built, and shipped, so you can trust the results.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-card p-4 h-100">
                <h3 class="h5 fw-semibold mb-3">Curated depth</h3>
                <p class="text-muted mb-0">We favor depth over noise, focusing on the ideas that truly move you forward.</p>
            </div>
        </div>
    </div>
</section>

<!-- Timeline -->
<section class="container my-5">
    <div class="row g-4">
        <div class="col-lg-5">
            <h2 class="about-title h2 fw-bold mb-3">Our journey</h2>
            <p class="about-lede text-muted">From a classroom demo to a platform for emerging voices.</p>
        </div>
        <div class="col-lg-7">
            <div class="timeline">
                <div class="timeline-item">
                    <h3 class="h6 fw-bold mb-1">2026 - The first draft</h3>
                    <p class="text-muted mb-0">Started as a class project to help students publish clean, readable technical articles.</p>
                </div>
                <div class="timeline-item">
                    <h3 class="h6 fw-bold mb-1">2026 - Community launch</h3>
                    <p class="text-muted mb-0">Opened the platform to contributors and launched weekly editorial themes.</p>
                </div>
                <div class="timeline-item">
                    <h3 class="h6 fw-bold mb-1">Next - Mentorship program</h3>
                    <p class="text-muted mb-0">Pairing new writers with experienced developers to build publishing confidence.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="container my-5">
    <div class="about-card p-5 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
        <div class="mb-4 mb-md-0">
            <h2 class="about-title h3 fw-bold mb-2">Want to publish with us?</h2>
            <p class="about-lede text-muted mb-0">Share your story and help others learn from your experience.</p>
        </div>
        <div class="d-flex gap-3">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">Write a Post</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-lg">Talk to us</a>
        </div>
    </div>
</section>
@endsection
