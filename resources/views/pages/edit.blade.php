@extends ('layouts.master') 

@section("content")
<h1>Edit page</h1>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
        @if($errors->any())
            <div class="bg-primary p-3 mt-5 text-center text-white">
                <ul>
                @foreach ( $errors->all() as $error )
                <li>{{ error }}</li>

                    
                @endforeach
                </ul>
            </div>
            @endif
        </div>
  

{{-- form --}}
<div class="container">
    <div class="row">
        <div class="col-sm-12">
         @if($errors->any())
            <div class="bg-primary p-3 mt-5 text-center text-white">
                <ul>
                @foreach ( $errors->all() as $error )
                <li>{{ error }}</li>

                    
                @endforeach
                </ul>
            </div>
            @endif
            </div>
<div class="col-sm-12">
<form action="{{url('/edit/'.$post->id)}}" method="post" class="m-5" enctype="multipart/form-data" >
@csrf
  <div class="form-group text-left">
    <label for="exampleFormControlInput1">Title of the post</label>
    <input type="text" value="{{ $post->name }}" required class="form-control" name="name" id="exampleFormControlInput1">
  </div>
 
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">content</label>
    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{ $post->content }}</textarea>
  </div>

    <div class="form-group">
    <label for="exampleFormControlFile1">image</label>
    <img src="../images/{{ $post->img}}" alt="foto"/>
    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
  </div>

<button type="submit" class="btn btn-primary mb-2">add New Post </button>

</form>
@endsection
