@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-1">
                @if ($post->image != null)
                    <img class="img-fluid card-img-top" src="{{ $post->get_image }}" />
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text mt-3">
                        {{ $post->body }}
                    </p>
                    @if ($post->iframe != null)
                    <div class="card align-self-center mt-3 mb-3">    
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $post->iframe !!}
                        </div>
                    </div>
                    @endif
                    <p class="text-muted mb-0 align-self-end">
                        <em>
                            &ndash; {{ $post->user->name }}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
