@props(['tags'])

<div class="side">
    <h3 class="sidbar-heading">Tags</h3>
    <div class="block-26">
       <ul>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a>
            </li>
        @endforeach
        </ul>
    </div>
</div>