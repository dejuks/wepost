<x-layout>
    <div class="post-container">
        <div class="post-title">{{ $post->title }}</div>

        <div class="post-meta">
            <span>👤 Author: {{ $post->user->name ?? 'N/A' }}</span>
            <span>📂 Category: {{ $post->category->name ?? 'Uncategorized' }}</span>
            <span>📅 {{ $post->created_at->format('F j, Y') }}</span>
        </div>

        <div class="post-content">
            {{ $post->content }}
        </div>

        <a href="{{ route('home') }}" class="back-link">← Back to Posts</a>
    </div></x-layout>
