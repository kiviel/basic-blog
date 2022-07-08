<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        //usar compact() es igual que usar un array esta es simplemente otra manera de enviar datos
        return view("posts.index", compact('posts')); //posts es la variable $posts asi funciona el metodo compact
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //salvar
        $post = Post::create(
            ['user_id' => auth()->user()->id]
             + $request->validated()
        );

        //imagen
        if($request->file('file')){
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();

        }
        //retornar
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //salvar
        $post->update($request->validated());

        //imagen
        if($request->file('file')){
            
            //eliminar la imagen fisicamente
            Storage::disk('public')->delete((string) $post->image);

            //guardar nueva imagen en storage/ y en la base de datos
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();

        }
        //retornar
        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //eliminar imagen
        Storage::disk('public')->delete((string) $post->image);
        //Eliminar el registro de la base de datos
        $post->delete();

        return back()->with('status', 'Eliminado con éxito');
    }
}
