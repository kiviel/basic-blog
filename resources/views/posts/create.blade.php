@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-inline-flex flex-row justify-content-between">
                    <div class="my-auto">Crear Artículo</div>
                    <div><a href="#" class="btn btn-sm btn-primary">Cancelar</a></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">                        
                        <div class="mb-3">
                            <label class="form-label">Titulo *</label>
                            <input type="text" class="form-control" name="title" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="file"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contenido *</label>
                            <textarea class="form-control" name="body" rows="6" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contenido embebido</label>
                            <textarea class="form-control" name="iframe" required></textarea>
                        </div>
                        <div class="mb-3">
                            @csrf
                            <input type="submit" class="btn btn-outline btn-primary" value="Guardar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
