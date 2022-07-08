@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-inline-flex flex-row justify-content-between">
                    <div class="my-auto">Editar Artículo</div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Titulo *</label>
                            <input type="text" class="form-control" name="title" required value="{{ old('title', $post->title) }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen</label>
                            @if($post->image != null)
                            <div class=" w-50 mb-3">
                                <img class="img-fluid" src="{{ url('storage/'. old('image', $post->image)) }}"  />
                            </div>
                            @endif
                            <input type="file" class="form-control" name="file" value="{{ old('image', $post->image) }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contenido *</label>
                            <textarea class="form-control" name="body" rows="6" required>{{ old('body', $post->body) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contenido embebido</label>
                            <textarea class="form-control" name="iframe">{{ old('iframe', $post->iframe) }}</textarea>
                        </div>
                        <div class="mb-3 d-flex flex-row">
                            <div class="mb-3">
                                @csrf
                                <input type="submit" class="btn btn-outline btn-primary" value="Actializar" />
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
