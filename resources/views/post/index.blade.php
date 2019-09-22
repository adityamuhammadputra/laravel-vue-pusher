@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action="/posts" method="POST">
                        @csrf
                        @method('POST')
                        <div class="input-group">
                            <input type="text" name="body" id="" class="form-control" placeholder="Enter Something ... ">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            @foreach($posts as $post)
            <div class="col-md-6">
                <div class="row">
                <div class="col-md-2">
                    <div class="card_image">
                        <img src="{{asset('images/profile.png')}}">
                    </div>
                    </div>
                    <div class="col-md-10">
                    <div class="card" id="card_post">
                        <a href="{{route('posts.show', $post->id)}}">
                            <div class="card-body" id="card_body">
                                <div class="card_user">
                                <h5>{{$post->user->name}}</h5>
                            </div>
                            <div class="card_p">
                                <p>{{$post->body}}</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
