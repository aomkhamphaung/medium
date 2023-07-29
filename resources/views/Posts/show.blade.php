<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Post details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />
</head>

<body>
    <header class="w-100 d-flex justify-content-center align-items-center border-bottom border-secondary">
        <div class="container-wrapper">
            <div class="w-100 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center py-3">
                    <a href="{{ route('welcome') }}">
                        <svg viewBox="0 0 1043.63 592.71" height="25px">
                            <g data-name="Layer 2">
                                <g data-name="Layer 1">
                                    <path
                                        d="M588.67 296.36c0 163.67-131.78 296.35-294.33 296.35S0 460 0 296.36 131.78 0 294.34 0s294.33 132.69 294.33 296.36M911.56 296.36c0 154.06-65.89 279-147.17 279s-147.17-124.94-147.17-279 65.88-279 147.16-279 147.17 124.9 147.17 279M1043.63 296.36c0 138-23.17 249.94-51.76 249.94s-51.75-111.91-51.75-249.94 23.17-249.94 51.75-249.94 51.76 111.9 51.76 249.94">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <div class="mx-4 bg-slate-opt rounded-pill overflow-hidden d-flex align-items-center pr-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.1 11.06a6.95 6.95 0 1 1 13.9 0 6.95 6.95 0 0 1-13.9 0zm6.94-8.05a8.05 8.05 0 1 0 5.13 14.26l3.75 3.75a.56.56 0 1 0 .8-.79l-3.74-3.73A8.05 8.05 0 0 0 11.04 3v.01z"
                                fill="currentColor"></path>
                        </svg>
                        <input type="text" class="w-100 border-0 py-2 px-3 bg-transparent"
                            placeholder="Search Medium" />
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Write">
                            <path
                                d="M14 4a.5.5 0 0 0 0-1v1zm7 6a.5.5 0 0 0-1 0h1zm-7-7H4v1h10V3zM3 4v16h1V4H3zm1 17h16v-1H4v1zm17-1V10h-1v10h1zm-1 1a1 1 0 0 0 1-1h-1v1zM3 20a1 1 0 0 0 1 1v-1H3zM4 3a1 1 0 0 0-1 1h1V3z"
                                fill="currentColor"></path>
                            <path
                                d="M17.5 4.5l-8.46 8.46a.25.25 0 0 0-.06.1l-.82 2.47c-.07.2.12.38.31.31l2.47-.82a.25.25 0 0 0 .1-.06L19.5 6.5m-2-2l2.32-2.32c.1-.1.26-.1.36 0l1.64 1.64c.1.1.1.26 0 .36L19.5 6.5m-2-2l2 2"
                                stroke="currentColor"></path>
                        </svg>
                        <span class="px-1"> <a href="{{ route('posts.create') }}">
                                {{ __('message.write') }}</a></span>
                    </button>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mx-2 overflow-hidden" style="width: 30px; height: 30px; border-radius: 50%">
                            @if (Auth::user()->profile)
                                <img src="{{ asset('storage/profile/' . Auth::user()->profile) }}" height="32px"
                                    width="32px" />
                            @else
                                <img src="{{ asset('storage/images/user_default.jpg') }}" alt="Profile" width="32px"
                                    height="32px">
                            @endif

                        </div>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('profile', Auth::user()->id) }}">{{ __('message.profile') }}</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('posts.index') }}">{{ __('message.lists') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('logout') }}">{{ __('message.sign_out') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="w-100 d-flex justify-content-center py-4">
        <div class="container-wrapper m-sm-2">
            <div class="w-80 w-sm-100 mx-auto d-flex flex-wrap col-12 border-1 border-bottom">
                <div class="col-lg-8 order-lg-1 col-sm-12 order-2 d-flex flex-column border-1 border-end pe-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="pf-img">
                                @if ($post->user->profile)
                                    <img src="{{ asset('storage/profile/' . $post->user->profile) }}" />
                                @else
                                    <img src="{{ asset('storage/images/user_profile.jpg') }}" alt="Profile">
                                @endif
                            </div>
                            <div class="mx-2">
                                <h5 class="writer">{{ $post->user->name }}</h5>
                                <span class="text-muted text-sm">{{ $post->created_at->diffForHumans() }} · 9 min read
                                    ·</span>
                            </div>
                        </div>
                        @auth
                            @if ($post->user->id === Auth::user()->id)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 rounded-pill bg-danger mx-3 text-light border-0 text-sm"
                                        onclick="return confirm('Are you sure to delete?')">{{ __('message.delete') }}</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                    <div class="w-100">
                        <div class="w-100 overflow-hidden my-3">
                            <img src="{{ asset('storage/images/' . $post->image) }}" alt="" width="100%" />
                        </div>
                        <h3 class="my-3">{{ $post->title }}</h3>
                        <p class="my-3 text-justify">
                            {!! $post->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-2 col-sm-12 order-1 border-left border-1 ps-3">
                    <h5>More from Medium</h5>
                    @foreach ($latest_posts as $latest_post)
                        <div class="w-100 mx-auto">
                            <div class="d-flex flex-column">
                                <div class="row my-3">
                                    <div class="col-md-12 d-flex">
                                        <div class="overflow-hidden rounded-circle d-flex align-items-center justify-content-center"
                                            height="30px" width="30px">
                                            <img src="{{ asset('storage/profile/' . $latest_post->user->profile) }}"
                                                alt="Profile" width="32px" height="32px" class="rounded" />
                                        </div>
                                        <span class="px-2 text-muted">{{ $latest_post->user->name }}</span>
                                    </div>
                                    <div class="col-8">
                                        <a href="{{ route('posts.show', $latest_post->id) }}"><span
                                                class="fw-semibold">{{ $latest_post->title }}
                                            </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="w-80 mx-auto py-3">
                <h5 class="cmt">
                    Comment
                    <span class="cmt-count fw-bold bg-secondary text-white">{{ count($post->comments) }}</span>
                </h5>
                @if (Session::has('success'))
                    <small class="text-success">{{ Session::get('success') }}</small>
                @endif
                @if (Session::has('error'))
                    <small class="text-danger">{{ Session::get('error') }}</small>
                @endif
                <div class="w-90 mx-auto p-4 text-sm">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="w-100 d-flex flex-column">
                            <label for="comment" class="fs-6">Here you can left message !
                            </label>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" id="">
                            <textarea class="border-1 p-2 rounded" cols="30" rows="3" placeholder="What are you thoughts?"
                                id="floatingTextarea" name="comment"></textarea>
                            <div class="d-flex align-items-center justify-content-end my-2">
                                <button class="p-1 bg-secondary text-light border-0 rounded" type="submit">
                                    Comment
                                </button>
                            </div>
                        </div>
                    </form>

                    @foreach ($post->comments as $comment)
                        @include('comments.comment')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        function showReplyForm(commentId) {
            console.log('comment id');
            const replyForm = document.getElementById(`replyForm-${commentId}`);
            replyForm.style.display = (replyForm.style.display === 'none') ? 'block' : 'none';
        }

        function showReplyForm(replyId) {
            console.log('reply id');
            const replyForm = document.getElementById(`replyForm-${replyId}`);
            replyForm.style.display = (replyForm.style.display === 'none') ? 'block' : 'none';
        }

        function showReplyForm(nestedReplyId) {
            const replyForm = document.getElementById(`replyForm-${nestedReplyId}`);
            replyForm.style.display = (replyForm.style.display === 'none') ? 'block' : 'none';
        }
    </script>
</body>

</html>
