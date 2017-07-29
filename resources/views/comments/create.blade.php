@if(auth()->check())
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/posts/{{ $post->id }}/comments">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Comment:</label>
                    <textarea class="form-control" id="body" name="body" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>

                @include('layouts.errors')
            </form>
        </div>
    </div>
@endif
