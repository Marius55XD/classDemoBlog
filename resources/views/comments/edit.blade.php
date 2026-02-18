@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-secondary">
                    &larr; Back to Post
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Comment</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="content" class="form-label">Comment</label>
                            <textarea 
                                name="content" 
                                id="content" 
                                class="form-control @error('content') is-invalid @enderror" 
                                rows="5" 
                                required
                            >{{ old('content', $comment->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update Comment</button>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
