@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               {{$post->body}}
       </div>

                @foreach($comment as $c)
                <ul>
                   <li>{{$c->comment}}</li>
            </ul>
            <div>
                <form action="{{url('post/comment')}}" method="post" >
                    @csrf
                    <textarea name="comment" class="form-control"></textarea>
                    <button type="submit" value="add comment" class="form-control">add comment</button>
                    <input type="hidden" name="post_id" value="{{$post->id}}">

                </form>
            </div>
        </div>
    </div>

@endsection
