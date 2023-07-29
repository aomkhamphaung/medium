<div class="my-2 ms-5">
    <div class="w-100 my-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="pf-img">
                    <img src="{{ asset('storage/profile/' . $nested_reply->user->profile) }}"
                        alt="">
                </div>
                <div class="mx-2">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $nested_reply->user->name }}</h4>
                        @if ($nested_reply->user->id === Auth::user()->id)
                            <div class="ms-5 d-flex align-items-center">
                                <form
                                    action="{{route('reply.delete', $nested_reply->id)}}"
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
                    <span class="text-sm text-muted">{{$nested_reply->created_at->diffForHumans()}}</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-between">
            <div class="flex-grow-1">
                <p class="fw-semibold">
                    {{ $nested_reply->reply }}
                </p>
            </div>
        </div>
    </div>
</div>