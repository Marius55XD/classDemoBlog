@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-secondary">
                    &larr; Back to Posts
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                @if($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <h1 class="card-title mb-3">{{ $post->title }}</h1>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="text-muted">
                            <small>
                                By <strong>{{ $post->user->name }}</strong> | 
                                {{ $post->created_at->format('F j, Y \a\t g:i a') }}
                                @if($post->created_at != $post->updated_at)
                                    <span class="ms-2">(Updated: {{ $post->updated_at->format('M d, Y') }})</span>
                                @endif
                            </small>
                        </div>
                        @can('update', $post)
                            <div>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        @endcan
                    </div>

                    <div class="card-text">
                        {!! nl2br(e($post->description)) !!}
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-4">
                <h3 class="mb-3">Comments ({{ $post->comments->count() }})</h3>

                <!-- Add Comment Form -->
                @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Leave a Comment</h5>
                            <form action="{{ route('comments.store', $post) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea 
                                        name="content" 
                                        class="form-control @error('content') is-invalid @enderror" 
                                        rows="3" 
                                        placeholder="Write your comment here..."
                                        required
                                    >{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Post Comment</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info mb-4">
                        <a href="{{ route('login') }}">Log in</a> to leave a comment.
                    </div>
                @endauth

                <!-- Display Comments -->
                @forelse($post->comments()->with(['user', 'likes'])->latest()->get() as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <strong>{{ $comment->user->name }}</strong>
                                    <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                                    @if($comment->created_at != $comment->updated_at)
                                        <small class="text-muted">(edited)</small>
                                    @endif
                                </div>
                                @auth
                                    @if(Auth::id() === $comment->user_id || Auth::id() === $post->user_id)
                                        <div>
                                            @if(Auth::id() === $comment->user_id)
                                                <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            @endif
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            <p class="mb-2">{{ $comment->content }}</p>
                            
                            <!-- Like Button and Counter -->
                            <div class="d-flex align-items-center gap-2">
                                @auth
                                    <form action="{{ route('comments.like', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $comment->isLikedBy(Auth::user()) ? 'btn-danger' : 'btn-outline-secondary' }} border-0">
                                            <i class="bi bi-heart{{ $comment->isLikedBy(Auth::user()) ? '-fill' : '' }}"></i>
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-outline-secondary border-0" disabled>
                                        <i class="bi bi-heart"></i>
                                    </button>
                                @endauth
                                <small class="text-muted">
                                    <strong>{{ $comment->likes->count() }}</strong> {{ Str::plural('like', $comment->likes->count()) }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No comments yet. Be the first to comment!</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
