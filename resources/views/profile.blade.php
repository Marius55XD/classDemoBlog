@extends('layouts.app')

@section('content')
<section class="hero-surface py-5 page-header">
    <div class="container py-4">
        <h1 class="display-6 fw-bold mb-2">Your Profile</h1>
        <p class="text-muted mb-0">Manage your account details and see your activity at a glance.</p>
    </div>
</section>

<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="soft-card p-4 text-center">
                <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center" style="width: 96px; height: 96px;">
                    <span class="fs-2 fw-bold text-muted">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>
                <h2 class="h4 fw-bold mt-3 mb-1">{{ Auth::user()->name }}</h2>
                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="soft-card p-4 p-lg-5">
                <h3 class="h5 fw-bold mb-3">Account details</h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="text-muted">Name</div>
                        <div class="fw-semibold">{{ Auth::user()->name }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-muted">Email</div>
                        <div class="fw-semibold">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-muted">Member since</div>
                        <div class="fw-semibold">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-muted">Posts</div>
                        <div class="fw-semibold">{{ \App\Models\Post::where('user_id', Auth::id())->count() }}</div>
                    </div>
                </div>
                <div class="mt-4 d-flex flex-wrap gap-2">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Write a Post</a>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">View Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
