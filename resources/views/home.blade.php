@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <a href="{{url('post/'.$post->id)}}">
                    <h2 class="post-title">
                       {{$post->title}}
                    </h2>
                    <h3 class="post-subtitle">
                       {{$post->excerpt}}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{\App\User::find($post->author_id)->name}}</a>
                    {{$post->created_at}}</p>
            </div>

            <hr>

            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
    @endforeach
@endsection
