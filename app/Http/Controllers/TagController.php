<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Http\Requests\Tag\InsertTagRequest;
use App\Http\Requests\Tag\EditTagRequest;
use App\Http\Requests\Tag\DeleteTagRequest;

class TagController extends Controller
{
    protected $tagReponsitory;
    protected $fillData = 'name';

    public function __construct(ITagDbRepository $tagReponsitory){
        $this->tagReponsitory = $tagReponsitory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tagReponsitory->getAll();
        $dataView = compact('tags');
        return view('tags.list',$dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagAll = $this->tagReponsitory->getAll();
        $tags = $tagAll->pluck('name','id')->prepend('select parent', '')->toArray();
        $dataView = compact('tags');
        return view('tags.create',$dataView);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertTagRequest $request)
    {
        if(empty($request->slug)){
            $request->slug = $request->name;
        }
        $dataRequest = $request->validated();
        $dataRequest['slug'] = Str::slug($request->slug, '-'); 
        $dataRequest['parent_id'] = $request->input('parent_id');
        $this->tagReponsitory->create($dataRequest);
        $this->tagReponsitory->create($dataRequest);
        return redirect()->route('dashboard.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->tagReponsitory->find($id);
        $dataView = compact('tag');
        return view('tags.edit',$dataView);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(EditTagRequest $request, $id)
    {
        $dataRequest = $request->only($this->fillData);
        $this->tagReponsitory->update($id, $dataRequest);
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tagReponsitory->delete($id);
        return redirect()->route('tag.index');
    }
}
