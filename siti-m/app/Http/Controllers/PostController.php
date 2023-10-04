<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|image|mimes:jpeg,jpg,img|max:2048',
            'judul' => 'required|min:5',
            'konten' => 'required|min:10',
        ] );

        //uploud gambar
        $foto = $request->file('foto');
        $foto->storeAs('public/post',$foto->hashName());

        //simpan
        Post::create([
            'foto' => $foto->hashName(),
            'judul' => $request->judul,
            'konten' => $request->konten
        ]);

        //redirect to
        return redirect()->route('post.index')->with(['success'=>'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findOrFail($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=PostModel::findOrFail($id);
        storage::delete('public/post/',$podt -> image);
        $post->delete();
        return redirect()->route('posts.index')->with(['success'=>'Data Berhasil Dihapus!']);
    }
}
