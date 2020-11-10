<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('cari')){
            $posts = Post::where('judul','LIKE', '%' .$request->cari. '%')->paginate(10);
        }else{
        $posts = Post::all();
        }
        return view('post.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $this->validate(request(),[
            'judul' => 'required',
            'isi' => 'required'
        ]);
        Post::create($post);
        return redirect()->route('post.index')->with('success', 'Pemberitahuan berhasil dikirim');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate(request(), [
            'judul' => 'required',
            'isi' => 'required',
            ]);
            $post->judul = $request->get('judul');
            $post->isi = $request->get('isi');
            $post->save();
            return redirect()->route('post.index')->with('success', 'Pemberitahuan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success','Pemberitahuan berhasil dihapus');
      
    }
}
