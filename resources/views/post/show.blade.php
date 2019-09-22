@extends('layouts.app')

@section('content')
<div class="container">
        <div class="show_post">
          <h2>{{$post->body}}</h2>
          {{$post->user->name}} | {{$post->created_at->diffForHumans()}}
        </div>
   </div>

<list-data v-bind:post="{{ $post }}"></list-data>

@endsection

