@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="py-2 bg-warning my-2">
            @foreach ($errors->all() as $error)
                <p class="mx-5 mt-4">{{ $error }}</p>
            @endforeach
    </div>
@endif

<form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="cover">Cover Image</label>
            <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverImgHelper">

            <br>

            <label for="category_id" class="form-label">Categories:</label>
            <select class="form-select w-25 my-2 form-select-lg @error('category_id') 'is-invalid' @enderror" name="category_id" id="category_id">
                <option selected>Select one</option>

                @foreach ($categories as $category )
                <option value="{{$category->id}}" {{ old('category_id') ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach

            </select>

            <label for="title">title</label>
            <input type="text" title="title" name="title" id="title" value="{{old('title')}}">
            <label for="author">author</label>
            <input type="text" title="author" name="author" id="author" value="{{old('author')}}">
            <label for="deadline">deadline</label>
            <input type="text" title="author" name="deadline" id="deadline" value="{{old('deadline')}}">

            <button type="submit">send</button>
        </div>

    </form>
@endsection