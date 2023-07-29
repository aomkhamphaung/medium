<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Post Lists</title>
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
                        <input type="text" class="w-100 border-0 py-2 px-3 bg-transparent search" tabindex="0"
                            placeholder="Search Medium" />
                    </div>
                    <div>
                        <a href="{{route('posts.index')}}" class="btn bg-slate-opt text-muted rounded-pill">All Posts</a>
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
                                <img src="{{ asset('storage/profile/' . Auth::user()->profile) }}" height="20px"
                                    width="20px" class="rounded-circle" />
                            @else
                                <img src="{{ asset('storage/images/user_default.jpg') }}" alt="Profile" width="20px"
                                    height="20px" class="rounded-circle">
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
                                    @if (Auth::check())
                                        <a class="dropdown-item">{{ Auth::user()->name }}</a>
                                    @else
                                        <a href="">{{ $name }}</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-3">
        <div class="float-lg-end float-sm-none col-md-4 col-sm">
            <div class="col-md-12 mt-3" style="z-index: 1">
                <h5 class="aside-ttl">2023 in Latest Posts</h5>
                <div class="col-lg-4 order-lg-2 col-sm-12 order-1 border-left border-1 ps-3 list-asd">
                    <div class="w-100 mx-auto">
                        <div class="d-flex flex-column">
                            @foreach ($latests as $latest)
                                <div class="row my-3">
                                    <div class="col-md-12 d-flex">
                                        <div class="overflow-hidden rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 30px; height: 30px;">
                                            <img src="{{ asset('storage/profile/' . $latest->user->profile) }}"
                                                alt="Profile" width="30px" height="30px" class="rounded"/>
                                        </div>
                                        <h6 class="px-2">{{ $latest->user->name }}</h6>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="fw-semibold">{{ $latest->title }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success" id="success-alert" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger" id="error-alert" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            @foreach ($posts as $post)
                <div class="row mt-3 post-item" data-category="{{$post->category}}">
                    <div class="col-8">
                        <div class="d-flex justify-content-start">
                            @if ($post->user->profile)
                                <img src="{{ asset('storage/profile/' . $post->user->profile) }}" height="20px"
                                    width="20px" class="rounded-circle" />
                            @else
                                <img src="{{ asset('storage/images/user_default.jpg') }}" alt="Profile"
                                    width="20px" height="20px" class="rounded-circle">
                            @endif

                            <div class="px-2">
                                <p class="mb-2 pst-wrt">
                                    {{ $post->user->name }}
                                    <span class="text-muted pst-date">{{ $post->created_at }}</span>
                                </p>
                                <h6 class="list-ttl">
                                    {{ $post->title }}
                                </h6>
                                <p class="list-txt">
                                    {!! $post->description !!}
                                    @if (Auth::user()->favorites->contains('post_id', $post->id))
                                    <form action="{{route('favorites.remove')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <button title="delete from favorites" class="btn btn-link p-0 text-dark" type="submit"><i class="fa fa-heart"></i></button>
                                    </form>
                                    @else
                                    <form action="{{route('favorites.add')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <button title="add to favorites" class="btn btn-link p-0 text-dark" type="submit"><i class="fa-regular fa-heart"></i></button>
                                    </form>
                                    @endif                    
                                    
                                </p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <button class="btn cat-txt cat btn-sm text-dark rounded-pill filter-btn" data-category="{{$post->category}}">
                                            {{ $post->category }}
                                        </button>
                                        <span class="blog-date">9 min read ·</span>
                                        <span class="blog-date">Selected for you·</span>
                                    </div>
                                    <div class="col-md-4">
                                        @auth
                                            @if ($post->user_id === auth()->user()->id)
                                                <div class="dropdown">
                                                    <a class="btn dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </a>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none">
                                                        <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zM8.25 12h7.5"
                                                            stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('posts.edit', $post->id) }}">{{ __('message.edit') }}</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('posts.destroy', $post->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item text-danger"
                                                                    onclick="return confirm('Are you sure to delete?')">{{ __('message.delete') }}</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        @if ($post->image)
                            <a href="{{ route('posts.show', $post->id) }}" title="Go to detail page"><img
                                    src="{{ asset('storage/images/' . $post->image) }}" height="112"
                                    width="112" /></a>
                        @else
                            <img src="{{ asset('storage/images/default_image.png') }}" alt="">
                        @endif
                    </div>
                <hr />
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            $('.filter-btn').on('click', function(){
                const selectedCategory = $(this).data('category');
                console.log(selectedCategory);
                filteredPosts(selectedCategory);
            })

            function filteredPosts(category){
                $('.post-item').hide();
                $(`.post-item[data-category="${category}"]`).show();
            }
        })

        function hideAlerts(){
            $('#success-alert, #error-alert').fadeOut('slow', function(){
                $this.remove();
            })
        }

        $(document).ready(function(){
            $('#success-alert, error-alert').show();
            setTimeout(hideAlerts, 3000);
        })
    </script>
</body>

</html>
