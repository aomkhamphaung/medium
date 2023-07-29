@extends('layout.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Category
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('categories.update', $category->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="required" for="name">Category title</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{$category->name}}" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>                    
                </div>
                <div class="form-group col-md-6">
                    <button class="btn btn-success" type="submit">
                        Save
                    </button>
                    <a href="{{route('categories.index')}}" class="btn btn-secondary mx-3">Cancel</a>

                </div>


            </form>
        </div>
    </div>
@endsection
