@extends ('layouts.master') @section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="bg-primary p-3 mt-5 text-center text-white">
                Index Page
            </h1>
        </div>
    </div>
</div>
{{-- {{  dd($posts) }} --}}

<div class="container-fluid">
    <div class="row">
        @foreach ($posts as $post )
        <div class="col-sm-3">
            <div class="card m-3">
                <img
                    class="card-img-top"
                    src="./images/{{ $post->img}}"
                    alt="Card image cap"
                />
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">
                        {{ $post->content }}
                    </p>
                    <a
                        href="{{url('/edit/'.$post->id)}}"
                        class="btn btn-primary"
                        >Edit</a
                    >
                    <a
                        href="{{url('/delete/'.$post->id)}}"
                        class="btn btn-primary"
                        >Delete</a
                    >
                </div>
            </div>
        </div>

        @endforeach @if(session()->has('message'))
        <div
            class="m-0 text-center alert alert-warning alert-dismissible fade show"
            role="alert"
        >
            {{ session()->get('message') }}
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
        @endif

        <div class="col-sm-12 p-5 text-center d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
