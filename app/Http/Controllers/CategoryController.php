<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Contracts\ICatagoriesDbRepository;
use App\Http\Requests\Category\InsertCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;

class CategoryController extends Controller
{
    protected $categoriesReponsitory;
    public $fillData = [
        'name',
        'description',
        'slug',
        'status',
    ];

    public function __construct(ICatagoriesDbRepository $categoriesReponsitory){
        $this->categoriesReponsitory = $categoriesReponsitory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = $this->categoriesReponsitory->getAll();
        $dataView  = compact('catagories');
        return view('categories.list',$dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertCategoryRequest $request)
    {
        $dataRequest = $request->only($this->fillData);
        $this->categoriesReponsitory->create($dataRequest);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoriesReponsitory->find($id);
        $dataView = compact('category');
        return view('categories.edit',$dataView);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataRequest = $request->only($this->fillData);
        $this->categoriesReponsitory->update($id,$dataRequest);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoriesReponsitory->delete($id);
        return redirect()->route('categories.index')->with('messageSuccess','Xoa Thanh Cong');
    }
}
