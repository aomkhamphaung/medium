<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
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
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="search">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.1 11.06a6.95 6.95 0 1 1 13.9 0 6.95 6.95 0 0 1-13.9 0zm6.94-8.05a8.05 8.05 0 1 0 5.13 14.26l3.75 3.75a.56.56 0 1 0 .8-.79l-3.74-3.73A8.05 8.05 0 0 0 11.04 3v.01z"
                                fill="currentColor"></path>
                        </svg>
                        <input type="text" class="w-100 border-0 py-2 px-3 bg-transparent search" tabindex="0"
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
                            @if ($user->profile)
                                <img src="{{ asset('storage/profile/' . $user->profile) }}" height="32px"
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
                                    <a class="dropdown-item">{{ $user->name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-4 mt-5">
                <div class="d-flex justify-content-start">
                    @if ($user->profile)
                        <img src="{{ asset('storage/profile/' . $user->profile) }}" height="70" width="70"
                            class="rounded-circle" />
                    @else
                        <img src="{{ asset('storage/images/user_default.jpg') }}" alt="Photo" width="70"
                            height="70" class="rounded-circle">
                    @endif
                    <div class="px-2">
                        <h2 class="fw-bold name">{{ $user->name }}</h2>
                    </div>
                    <hr />
                </div>
            </div>
            <div class="col-4 mt-5">
                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#editModal">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="dot">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.39 12c0 .55.2 1.02.59 1.41.39.4.86.59 1.4.59.56 0 1.03-.2 1.42-.59.4-.39.59-.86.59-1.41 0-.55-.2-1.02-.6-1.41A1.93 1.93 0 0 0 6.4 10c-.55 0-1.02.2-1.41.59-.4.39-.6.86-.6 1.41zM10 12c0 .55.2 1.02.58 1.41.4.4.87.59 1.42.59.54 0 1.02-.2 1.4-.59.4-.39.6-.86.6-1.41 0-.55-.2-1.02-.6-1.41a1.93 1.93 0 0 0-1.4-.59c-.55 0-1.04.2-1.42.59-.4.39-.58.86-.58 1.41zm5.6 0c0 .55.2 1.02.57 1.41.4.4.88.59 1.43.59.57 0 1.04-.2 1.43-.59.39-.39.57-.86.57-1.41 0-.55-.2-1.02-.57-1.41A1.93 1.93 0 0 0 17.6 10c-.55 0-1.04.2-1.43.59-.38.39-.57.86-.57 1.41z"
                            fill="#000"></path>
                    </svg>
                </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-secondary rounded-pill modal-btn edit-txt"
                    data-bs-toggle="modal" data-bs-target="#editModal">
                    {{ __('message.edit_profile') }}
                </button>
                <button type="button" id="btn" class="btn btn-sm btn-primary rounded-pill modal-btn edit-txt"
                    data-bs-toggle="modal" data-bs-target="#passwordModal">
                    {{ __('message.change_password') }}
                </button>
                <!-- Edit Modal -->
                <form action="{{ route('update-profile', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalLabel">
                                        {{ __('message.profile_information') }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="col-8">
                                            @if ($user->profile)
                                                <img src="{{ asset('storage/profile/' . $user->profile) }}"
                                                    alt="Photo" width="70" height="70"
                                                    class="rounded-circle" id="profile-preview" />
                                            @else
                                                <img src="{{ asset('storage/images/user_default.jpg') }}"
                                                    alt="Photo" width="70" height="70"
                                                    class="rounded-circle" id="profile-preview">
                                            @endif
                                            <button class="btn text-success rounded-pill" type="button"
                                                id="update-button" onclick="updateProfile()">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                {{ __('message.profile_update') }}
                                                <input type="file" id="profile" name="profile"
                                                    accept="image/png, image/jpg, image/jpeg" hidden
                                                    onchange="previewProfile(event)">
                                            </button>

                                            <button class="btn text-danger rounded-pill" type="button">
                                                <i class="fa-solid fa-trash"></i>{{ __('message.remove') }}
                                            </button>

                                            <div class="mb-3 mt-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('message.name') }}</label>
                                                <input type="text" class="form-control inp"
                                                    id="exampleFormControlInput1" name="name"
                                                    placeholder="Your Name" value="{{ $user->name }}" />
                                                @error('name')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('message.bio') }}</label>
                                                <input type="text" class="form-control inp"
                                                    id="exampleFormControlInput1" placeholder="Bio" name="bio"
                                                    value="{{ $user->bio }}" />
                                                @error('bio')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-success rounded-pill"
                                        data-bs-dismiss="modal">
                                        {{ __('message.cancel') }}
                                    </button>
                                    <button type="submit"
                                        class="btn btn-outline-success rounded-pill bg-success text-white">
                                        {{ __('message.save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Password Modal -->
                <form action="{{ route('change-password', Auth::user()->id) }}" method="POST">
                    @csrf
                    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="passwordModalLabel">
                                        {{ __('message.change_password') }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="col-8">
                                            <div class="mb-3 mt-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('message.old_password') }}</label>
                                                <input type="text" class="form-control inp" name="old_password"
                                                    id="exampleFormControlInput1"
                                                    placeholder="{{ __('message.old_password') }}" />
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('message.new_password') }}</label>
                                                <input type="text" class="form-control inp" name="new_password"
                                                    id="exampleFormControlInput1"
                                                    placeholder="{{ __('message.new_password') }}" />
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label">{{ __('message.confirm_new_password') }}</label>
                                                <input type="text" class="form-control inp"
                                                    name="confirm_new_password" id="exampleFormControlInput1"
                                                    placeholder="{{ __('message.confirm_new_password') }}" />
                                                @error('confirm_new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-success rounded-pill"
                                        data-bs-dismiss="modal">
                                        {{ __('message.cancel') }}
                                    </button>
                                    <button type="submit"
                                        class="btn btn-outline-success rounded-pill bg-success text-white">
                                        {{ __('message.save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (Session::has('success'))
            <div id="success-alert" class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div id="error-alert" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="mt-5 info-ttl">{{ __('message.information') }}</h2>
        <hr />
        {{-- @dd($user->posts) --}}
        <div class="row">
            <div class="col-12 mt-3">
                <h6 class="pst-ttl2">{{ __('message.email') }}</h6>
                <p class="text-muted">{{ $user->email }}</p>
                <h6 class="pst-ttl2">{{ __('message.post_count') }}</h6>
                <button class="btn btn-sm pst-count rounded-pill bg-secondary text-white">
                    @if ($user->posts)
                        {{ count($user->posts) }}
                    @endif
                </button>
                <h6 class="mt-3 pst-ttl2">{{ __('message.bio') }}</h6>
                <p class="my-3 text-muted text-justify p-txt">
                    {{ $user->bio }}<br />
                </p>
                <h6 class="mypst-ttl">{{ __('message.my_posts') }}</h6>
                <hr />

                <div class="row">
                    <div class="col-md-8">
                        @foreach ($user->posts as $post)
                        <div class="row">
                            <div class="col-8 mt-3">
                                <div class="d-flex justify-content-start">
                                    @if ($user->profile)
                                        <img src="{{ asset('storage/profile/' . $user->profile) }}" height="20px"
                                            width="20px" />
                                    @else
                                        <img src="{{ asset('storage/images/user_default.jpg') }}" alt="Photo"
                                            width="20px" height="20px">
                                    @endif

                                    <div class="px-2">
                                        <h4 class="author text-muted">
                                            {{ $user->name }}
                                            <span class="blog-date">. {{ $post->created_at->diffForHumans() }}
                                            </span>
                                        </h4>
                                        <h6 class="mypst-ttl mb-2 mt-2">{{ $post->title }}</h6>
                                        <p class="content mb-2 justify-text">
                                            {!! $post->description !!}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="btn cat-txt btn-sm text-dark rounded-pill">
                                                    {{ $post->category }}
                                                </button>
                                            </div>
                                            <div class="col-md-6">
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
                                                                        href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <form action="{{ route('posts.destroy', $post->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item text-danger"
                                                                            onclick="return confirm('Are you sure to delete?')">Delete</button>
                                                                    </form>
                                                            </ul>

                                                        </div>
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <a href="{{ route('posts.show', $post->id) }}"><img
                                        src="{{ asset('storage/images/' . $post->image) }}" class="img" /></a>
                            </div>
                        </div>
                    @endforeach
                    </div>                  
                        <div class="col-md-4">
                            <h3>Favorite posts</h3>
                            <div class="border-left border-1 ps-3 list-asd">
                                <div class="w-100 mx-auto">
                                    <div class="d-flex flex-column">
                                        @if ($favorites)
                                            @foreach ($favorites as $favorite)
                                            <div class="row my-3">
                                                <div class="col-md-12 d-flex">
                                                    <div class="overflow-hidden rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 30px; height: 30px;">
                                                        <img src="{{ asset('storage/profile/' . $favorite->post->user->profile) }}"
                                                            alt="Profile" width="30px" height="30px" class="rounded"/>
                                                    </div>
                                                    <h6 class="px-2">{{ $favorite->post->user->name }}</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p class="fw-semibold"><a href="{{route('posts.show', $favorite->post_id)}}">{{ $favorite->post->title }}</a></p>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
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
        function updateProfile() {
            var fileInput = document.getElementById('profile');
            fileInput.click();
        }

        function previewProfile(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var previewImg = document.getElementById('profile-preview');
                    previewImg.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

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
