@if(count($tags))
    <strong>Tags:</strong>
    <ul class="list-unstyled">
        @foreach($tags as $tag)
            <li><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
@endif
