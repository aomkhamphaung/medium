<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Post</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css"
      integrity="sha256-IKhQVXDfwbVELwiR0ke6dX+pJt0RSmWky3WB2pNx9Hg="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}" />
  </head>

  <body>
    <header
      class="fixed-top w-100 d-flex justify-content-center align-items-center border-bottom border-secondary"
    >
      <div class="container-wrapper">
        <div class="w-100 d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center py-3">
            <a href="#">
              <svg viewBox="0 0 1043.63 592.71" height="25px">
                <g data-name="Layer 2">
                  <g data-name="Layer 1">
                    <path
                      d="M588.67 296.36c0 163.67-131.78 296.35-294.33 296.35S0 460 0 296.36 131.78 0 294.34 0s294.33 132.69 294.33 296.36M911.56 296.36c0 154.06-65.89 279-147.17 279s-147.17-124.94-147.17-279 65.88-279 147.16-279 147.17 124.9 147.17 279M1043.63 296.36c0 138-23.17 249.94-51.76 249.94s-51.75-111.91-51.75-249.94 23.17-249.94 51.75-249.94 51.76 111.9 51.76 249.94"
                    ></path>
                  </g>
                </g>
              </svg>
            </a>
            <div
              class="mx-4 bg-slate-opt rounded-pill overflow-hidden d-flex align-items-center pr-3"
            >
              <i
                class="fa-solid fa-magnifying-glass"
                style="padding-left: 0.8rem"
              ></i>
              <input
                type="text"
                class="w-100 border-0 py-2 px-3 bg-transparent search"
                placeholder="Search Medium"
              />
            </div>
          </div>
          <div class="d-flex align-items-center">
            <button
              class="d-flex mx-2 align-items-center justify-content-center border-0 bg-transparent"
            >
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                aria-label="Write"
              >
                <path
                  d="M14 4a.5.5 0 0 0 0-1v1zm7 6a.5.5 0 0 0-1 0h1zm-7-7H4v1h10V3zM3 4v16h1V4H3zm1 17h16v-1H4v1zm17-1V10h-1v10h1zm-1 1a1 1 0 0 0 1-1h-1v1zM3 20a1 1 0 0 0 1 1v-1H3zM4 3a1 1 0 0 0-1 1h1V3z"
                  fill="currentColor"
                ></path>
                <path
                  d="M17.5 4.5l-8.46 8.46a.25.25 0 0 0-.06.1l-.82 2.47c-.07.2.12.38.31.31l2.47-.82a.25.25 0 0 0 .1-.06L19.5 6.5m-2-2l2.32-2.32c.1-.1.26-.1.36 0l1.64 1.64c.1.1.1.26 0 .36L19.5 6.5m-2-2l2 2"
                  stroke="currentColor"
                ></path>
              </svg>
              <span class="px-1">{{__('message.write')}}</span>
            </button>
            <div class="d-flex align-items-center justify-content-between">
              <div
                class="mx-2 overflow-hidden"
                style="width: 30px; height: 30px; border-radius: 50%"
              >
              @if (Auth::user()->profile)
              <img src="{{ asset('storage/profile/' . Auth::user()->profile) }}" height="32px"
                  width="32px" />
          @else
              <img src="{{ asset('storage/images/user_default.jpg') }}" alt="Profile" width="32px"
                  height="32px">
          @endif
              </div>
              <div class="dropdown">
                <a
                  class="btn dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="{{route('profile', Auth::user()->id)}}">{{__('message.profile')}}</a>
                  </li>
                  <li><a class="dropdown-item" href="{{route('posts.index')}}">{{__('message.lists')}}</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="{{route('logout')}}">{{__('message.sign_out')}}</a>
                  </li>
                  <li>
                    @if (Auth::check())
                    <a class="dropdown-item">{{ Auth::user()->name }}</a>
                @else
                    @isset($name)
                      <a href="">{{$name}}</a>
                    @endisset
                @endif
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>