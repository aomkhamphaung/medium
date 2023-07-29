<div class="my-2">
    <div class="w-100 my-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="pf-img">
                    <img src="{{ asset('storage/profile/' . $comment->user->profile) }}"
                        alt="" />
                </div>
                <div class="mx-2">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $comment->user->name }}</h4>
                        @if ($comment->user->id === Auth::user()->id)
                            <div class="ms-5 d-flex align-items-center">
                                <form action="{{ route('comments.destroy', $comment->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0"
                                        onclick="return confirm('Are you sure to delete?')">
                                        <i class="fa-solid fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <span
                        class="text-sm text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-between">
            <div class="flex-grow-1">
                <p class="fw-semibold">
                    {{ $comment->comment }}
                </p>
            </div>
            <div>
                Reply<i class="fa-solid fa-reply ms-3" title="Reply"
                    onclick="showReplyForm({{ $comment->id }})"></i>
            </div>
        </div>
        @if ($comment->replies)
            @foreach ($comment->replies as $reply)
                @include('comments.reply')
                @if ($reply->replies)
                    @foreach ($reply->replies as $nested_reply)
                        @include('comments.nested_reply') 
                    @endforeach
                @endif
            @endforeach
        @endif
        <div id="replyForm-{{ $comment->id }}" style="display: none">
            <form action="{{ route('reply.store') }}" method="post">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <p class="text-muted">Replying to {{ $comment->user->name }}</p>
                <textarea class="border-1 p-2 rounded" cols="140" rows="3" placeholder="Reply..." id="floatingTextarea"
                    name="reply"></textarea>
                <button class="p-1 bg-secondary text-light border-0 rounded"
                    type="submit">Reply</button>
            </form>
        </div>
        <hr>
    </div>
</div>