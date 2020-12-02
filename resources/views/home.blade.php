@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

            </div>
        </div>
        <div class="col col-12 mt-3">
            @foreach($comments as $comment)
                <div class="alert alert-info">
                    {{$comment->content}} by {{$comment->user->name}} at {{$comment->created_at->format("d-m-Y")}}
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
