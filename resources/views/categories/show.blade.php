@extends('main_layouts.master')

@section('title', $category->name . ' Category | MyBlog')

@section('content')

<div class="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 posts-col">

            @forelse($posts as $post)

            <div class="block-21 d-flex animate-box post">
                <a 
                href="{{ route('posts.show', $post) }}" 
                class="blog-img" 
                style="background-image: url({{ asset('storage/' . $post->image->path. '')  }});"></a>
                <div class="text">
                   <h3 class="heading"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                   <p class="excerpt">{{ $post->excerpt }}</p>
                   <div class="meta">
                       <div><a class='date' href="#"><span class="icon-calendar"></span>  {{ $post->created_at->diffForHumans() }}</a></div>
                       <div><a href="#"><span class="icon-user2"></span> {{ $post->author->name }}</a></div>
                        <div class="comments-count">
                            <a href="{{ route('posts.show', $post) }}#post-comments">
                                <span class="icon-chat"></span> {{ $post->comments_count }}
                            </a>
                        </div>
                   </div>
                </div>
            </div>
            @empty
                <p class='lead'>There are no posts related to this category.</p>

            @endforelse
            
            {{ $posts->links() }}

             </div>

            <!-- SIDEBAR: start -->
            <div class="col-md-4 animate-box">
                <div class="sidebar">
                    
                    <x-blog.side-categories :categories="$categories"/>

                    <x-blog.side-recent-posts :recentPosts="$recent_posts"/>

                    <x-blog.side-tags :tags="$tags"/>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
