<div class="my-2 ms-4">
    <div class="w-100 my-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="pf-img">
                    <img src="{{ asset('storage/profile/' . $reply->user->profile) }}"
                        alt="">
                </div>
                <div class="mx-2">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $reply->user->name }}</h4>
                        @if ($reply->user->id === Auth::user()->id)
                            <div class="ms-5 d-flex align-items-center">
                                <form
                                    action="{{route('reply.delete', $reply->id)}}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-link p-0"
                                        onclick="return confirm('Are you sure to delete?')">
                                        <i
                                            class="fa-solid fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <span class="text-sm text-muted">{{$reply->created_at->diffForHumans()}}</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-between">
            <div class="flex-grow-1">
                <p class="fw-semibold">
                    {{ $reply->reply }}
                </p>
            </div>
            <div>
                Reply<i class="fa-solid fa-reply ms-3" title="Reply"
                    onclick="showReplyForm({{ $reply->id }})"></i>
            </div>
        </div>
        <div id="replyForm-{{$reply->id}}" style="display: none">
            <form action="{{route('reply.store')}}" method="post">
                @csrf
                <input type="hidden" name="parent_reply_id" value="{{$reply->id}}">
                <input type="hidden" name="comment_id" value="{{$reply->comment->id}}">
                <p class="text-muted">Replying to {{$reply->user->name}}</p>
                <textarea class="border-1 p-2 rounded" cols="140" rows="3" placeholder="Reply..." id="floatingTextarea"
                name="reply"></textarea>
                <button class="p-1 bg-secondary text-light border-0 rounded" type="submit">Reply</button>
            </form>
        </div>
        
    </div>
</div>