@extends('layouts.default')

@section('title', 'My profile')

@section('content')
    <section>
        <h2>{{ $user->username }} profile</h2>

        <p>
            <a href="{{ route('posts.create') }}">Add new post</a>
        </p>

        <h3>My recent posts</h3>
        <div class="posts-list">
            @forelse ($posts as $post)
                @if ($post->user_id === auth()->id())
                    @include('posts.includes.post-small', ['post' => $post])
                @endif
            @empty
                <p>No posts have been added yet.</p>
            @endforelse
        </div>
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </section>
@endsection
