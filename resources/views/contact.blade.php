@extends('layouts.app')

@section('content')
<style>
    .contact-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }
    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }
    .contact-card {
        border: none;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    }
    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .info-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        height: 100%;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }
    .info-card:hover {
        border-color: #667eea;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.15);
    }
    .info-card .icon-box {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    .btn-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }
    .contact-sidebar {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 2.5rem;
    }
    .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: white;
        color: #667eea;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .social-link:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
    .faq-item {
        border-bottom: 1px solid #e9ecef;
        padding: 1.5rem 0;
    }
    .faq-item:last-child {
        border-bottom: none;
    }
</style>

<!-- Hero Section -->
<div class="contact-hero text-white py-5 position-relative">
    <div class="container py-5 position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="mb-4">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill">Get in Touch</span>
                </div>
                <h1 class="display-2 fw-bold mb-4">Let's Start a Conversation</h1>
                <p class="lead mb-4 fs-4">We're here to help and answer any question you might have</p>
                <p class="fs-5 mb-0 opacity-90">Whether you have a question about features, technical support, or anything else, our team is ready to answer all your questions.</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Contact Section -->
<div class="container py-5 my-5">
    <div class="row g-5">
        <!-- Contact Form -->
        <div class="col-lg-8">
            <div class="contact-card p-5">
                <div class="mb-5">
                    <h2 class="h2 fw-bold mb-3">Send us a Message</h2>
                    <p class="text-muted">Fill out the form below and we'll get back to you within 24 hours</p>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person me-2 text-primary"></i>Full Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="John Doe"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope me-2 text-primary"></i>Email Address <span class="text-danger">*</span>
                            </label>
                            <input type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="john@example.com"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">
                                <i class="bi bi-telephone me-2 text-primary"></i>Phone Number
                            </label>
                            <input type="tel" 
                                   class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   placeholder="+1 (555) 000-0000">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="subject" class="form-label fw-semibold">
                                <i class="bi bi-tag me-2 text-primary"></i>Subject <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-lg @error('subject') is-invalid @enderror" 
                                    id="subject" 
                                    name="subject" 
                                    required>
                                <option value="" disabled selected>Select a topic</option>
                                <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                <option value="Technical Support" {{ old('subject') == 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
                                <option value="Account Issues" {{ old('subject') == 'Account Issues' ? 'selected' : '' }}>Account Issues</option>
                                <option value="Feature Request" {{ old('subject') == 'Feature Request' ? 'selected' : '' }}>Feature Request</option>
                                <option value="Bug Report" {{ old('subject') == 'Bug Report' ? 'selected' : '' }}>Bug Report</option>
                                <option value="Partnership" {{ old('subject') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label for="message" class="form-label fw-semibold">
                                <i class="bi bi-chat-left-text me-2 text-primary"></i>Message <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" 
                                      id="message" 
                                      name="message" 
                                      rows="6" 
                                      placeholder="Tell us more about how we can help you..."
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Please provide as much detail as possible</div>
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-gradient btn-lg px-5 py-3 text-white">
                                <i class="bi bi-send-fill me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Contact Sidebar -->
        <div class="col-lg-4">
            <div class="contact-sidebar mb-4">
                <h3 class="h4 fw-bold mb-4">Contact Information</h3>
                
                <div class="mb-4">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-envelope-fill fs-4 text-primary me-3"></i>
                        <div>
                            <h5 class="h6 fw-semibold mb-1">Email Us</h5>
                            <a href="mailto:info@laravelblog.com" class="text-muted text-decoration-none">info@laravelblog.com</a><br>
                            <a href="mailto:support@laravelblog.com" class="text-muted text-decoration-none">support@laravelblog.com</a>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-telephone-fill fs-4 text-primary me-3"></i>
                        <div>
                            <h5 class="h6 fw-semibold mb-1">Call Us</h5>
                            <a href="tel:+15551234567" class="text-muted text-decoration-none">+1 (555) 123-4567</a><br>
                            <small class="text-muted">Mon-Fri, 9am-5pm EST</small>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-geo-alt-fill fs-4 text-primary me-3"></i>
                        <div>
                            <h5 class="h6 fw-semibold mb-1">Visit Us</h5>
                            <p class="text-muted mb-0">123 Laravel Street<br>Developer City, DC 12345<br>United States</p>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div>
                    <h5 class="h6 fw-semibold mb-3">Follow Us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-link" title="Twitter">
                            <i class="bi bi-twitter fs-5"></i>
                        </a>
                        <a href="#" class="social-link" title="Facebook">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                        <a href="#" class="social-link" title="LinkedIn">
                            <i class="bi bi-linkedin fs-5"></i>
                        </a>
                        <a href="#" class="social-link" title="GitHub">
                            <i class="bi bi-github fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Response Time Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-clock-history fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold mb-2">Quick Response Time</h5>
                    <p class="text-muted mb-0 small">We typically respond within 24 hours on business days</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Info Cards -->
<div class="bg-light py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="h2 fw-bold mb-3">Other Ways to Reach Us</h2>
            <p class="text-muted">Choose the method that works best for you</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="info-card text-center">
                    <div class="icon-box">
                        <i class="bi bi-chat-dots-fill fs-2 text-white"></i>
                    </div>
                    <h4 class="h5 fw-bold mb-3">Live Chat</h4>
                    <p class="text-muted mb-3">Chat with our support team in real-time for immediate assistance</p>
                    <a href="#" class="btn btn-outline-primary">Start Chat</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="info-card text-center">
                    <div class="icon-box">
                        <i class="bi bi-book-fill fs-2 text-white"></i>
                    </div>
                    <h4 class="h5 fw-bold mb-3">Documentation</h4>
                    <p class="text-muted mb-3">Browse our comprehensive documentation and knowledge base</p>
                    <a href="#" class="btn btn-outline-primary">View Docs</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="info-card text-center">
                    <div class="icon-box">
                        <i class="bi bi-people-fill fs-2 text-white"></i>
                    </div>
                    <h4 class="h5 fw-bold mb-3">Community Forum</h4>
                    <p class="text-muted mb-3">Join our community and get help from fellow developers</p>
                    <a href="#" class="btn btn-outline-primary">Join Forum</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="container py-5 my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="text-muted">Quick answers to common questions</p>
            </div>
            
            <div class="faq-item">
                <h5 class="fw-bold mb-2">What is your typical response time?</h5>
                <p class="text-muted mb-0">We aim to respond to all inquiries within 24 hours during business days. For urgent matters, please call our support line directly.</p>
            </div>
            
            <div class="faq-item">
                <h5 class="fw-bold mb-2">Do you offer technical support?</h5>
                <p class="text-muted mb-0">Yes! Our technical support team is available to help you with any issues. Please select "Technical Support" as your subject when filling out the form.</p>
            </div>
            
            <div class="faq-item">
                <h5 class="fw-bold mb-2">Can I schedule a call with your team?</h5>
                <p class="text-muted mb-0">Absolutely! Please mention your preferred time in the message field, and we'll coordinate a call that works for both of us.</p>
            </div>
            
            <div class="faq-item">
                <h5 class="fw-bold mb-2">What information should I include in my message?</h5>
                <p class="text-muted mb-0">Please provide as much detail as possible about your inquiry, including any relevant account information, error messages, or screenshots that might help us assist you better.</p>
            </div>
        </div>
    </div>
</div>
@endsection
