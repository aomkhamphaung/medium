@include('layouts.header')

<div class="horizontal"></div>
<div class="w-100 d-flex justify-content-center align-items-center">
    <div class="container-wrapper">
        <div class="w-80 d-flex align-items-center justify-content-center py-4">
            <form action="{{ route('posts.store') }}"
                class="d-flex col-md-8 flex-column border border-3 forms border-secondary" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h2>{{__('message.post_create')}}</h2>
                <div class="d-flex flex-column mb-3">
                    <input type="text" id="title" name="title"
                        class="rounded form-control border border-1 px-3 py-2" placeholder="{{__('message.post_title')}}" />
                    @error('title')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex flex-column mb-3">
                    <select name="category" id="category" class="rounded form-select border border-1 px-3 py-2">
                        <option value="" selected disabled>{{__('message.category')}}</option>
                        @foreach ($category_names as $category_name)
                            <option value="{{$category_name}}" required>{{$category_name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="error text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-flex flex-column mb-3">
                    <input type="file" id="image" name="image" class="rounded form-control"
                        accept="image/jpg, image/png, image/jpeg" onchange="previewImage(event)" />
                    @error('image')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <div class="preview my-2 border-1 rounded-3 overflow-hidden" style="max-width: 150px">
                        <img src="{{asset('storage/images/default_image.png')}}" style="height: 80px; width: 80px" id="image-preview"/>
                    </div>
                </div>
                <div>
                    <textarea name="description" id="summerNote" cols="65"></textarea>
                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="w-auto border-0 fit-content px-3 py-2 mt-2 bg-secondary text-light rounded">
                    {{__('message.publish')}}
                </button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#summerNote").summernote({
            placeholder: "{{__('message.description')}}",
            height: 100,
            tabsize: 2,
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
            ],
        });
    });

    function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var previewImg = document.getElementById('image-preview');
                    previewImg.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

@include('layouts.footer')
