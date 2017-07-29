@if(count($comments))
    <div class="comments">
        <ul class="list-group">
            @foreach ($comments as $comment)
                <li class="list-group-item">
                    <p>
                        <strong>
                            {{ $comment->created_at->diffForHumans() }} &middot;
                        </strong>
                        <a href="#">
                            {{ $comment->user->name }}
                        </a>: &nbsp;
                    </p>

                    <p>{{ $comment->body }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endif
