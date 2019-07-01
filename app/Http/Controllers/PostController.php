<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Contracts\ITagDbRepository;
use App\Contracts\IPostDbRepository;
use App\Contracts\ICatagoriesDbRepository;
use App\Http\Requests\Post\EditPostRequest;
use App\Http\Requests\Post\InsertPostRequest;
use App\Http\Requests\Post\DeletePostRequest;

class PostController extends Controller
{
    protected $postRepository;
    protected $tagRepository;
    protected $categoriesReponsitory;
    protected $fillData = [
        'title',
        'description',
        'content',
        'view',
        'slug',
        'status',
    ];
    public function __construct(IPostDbRepository $postRepository,ITagDbRepository $tagRepository,ICatagoriesDbRepository $categoriesReponsitory){
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
        $this->categoriesReponsitory = $categoriesReponsitory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->getAll();
        $tags = $this->postRepository->getAll();
        $dataView = compact('posts','tags');
        return view('posts.list',$dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tagRepository->getAll();
        $categories = $this->categoriesReponsitory->getAll();
        $dataView = compact('tags','categories');
        return view('posts.create',$dataView);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertPostRequest $request)
    {
        if(empty($request->slug)){
            $request->slug = $request->title;
        }
        $dataRequest = $request->only($this->fillData);
        $dataRequest['slug'] = Str::slug($request->slug, '-'); 
        $idPost =$this->postRepository->create($dataRequest);
        $categoryIds = $request->input('category_ids');
        $this->postRepository->Categories($categoryIds, $idPost);
        $tagIds = $request->input('tag_ids');
        $this->postRepository->Tags($tagIds, $idPost);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = $this->tagRepository->getAll();
        $categories = $this->categoriesReponsitory->getAll();
        $post = $this->postRepository->find($id);
        $dataView = compact('post','tags','categories');
        return view('posts.edit',$dataView);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditPostRequest $request)
    {
        if(empty($request->slug)){
            $request->slug = $request->title;
        }
        $dataRequest = $request->only($this->fillData);
        $dataRequest['slug'] = Str::slug($request->slug, '-'); 
        $this->postRepository->update($id, $dataRequest);
        $categoryIds = $request->input('category_ids');
        $this->postRepository->Categories($categoryIds, $id);
        $tagIds = $request->input('tag_ids');
        $this->postRepository->Tags($tagIds, $id);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('post.index');
    }
}
