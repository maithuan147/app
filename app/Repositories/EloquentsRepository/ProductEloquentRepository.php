<?php

namespace App\Repositories\EloquentsRepository;

use App\Product;
use App\Events\ProductEvents\ProductCloneTag;
use App\Events\ProductEvents\ProductCloneCategory;
use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;

class ProductEloquentRepository extends EloquentRepository implements IProductDbRepository{
    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Product::class;
    }
    public function saveCategories(array $categoryIds, int $postId){
        $post = $this->model->find($postId);
        $post->categories()->sync($categoryIds);
    }

    public function saveTags(array $tagIds, int $postId){
        $post = $this->model->find($postId);
        $post->tags()->sync($tagIds);
    }

    public function cloneTag(int $postId,int $id){
        $tagIds = $this->model->find($id)->tags->pluck('id')->toArray();
        $this->model->find($postId)->tags()->sync($tagIds);
    }

    public function cloneCategory(int $postId,int $id){
        $categoryIds = $this->model->find($id)->categories->pluck('id')->toArray();
        $this->model->find($postId)->categories()->sync($categoryIds);
    }
    
    public function clone(int $id){
        // dd($id);
        $postId = parent::clone($id);
        event(new ProductCloneTag($postId,$id));
        event(new ProductCloneCategory($postId,$id));
    }

    public function joinCategory(int $limit = 5,array $creatials=[],string $orderSort='',string $orderBy='asc'){
        if(!empty($orderSort)){
            return $this->model
            ->join('category_product_products', 'products.id', '=', 'category_product_products.product_id')
            ->join('category_products', 'category_product_products.category_product_id', '=', 'category_products.id')
            ->where($creatials)
            ->orderBy($orderSort,$orderBy)
            ->select('products.*', 'category_products.name')
            ->paginate($limit);
        }
        return $this->model
            ->join('category_product_products', 'products.id', '=', 'category_product_products.product_id')
            ->join('category_products', 'category_product_products.category_product_id', '=', 'category_products.id')
            ->where($creatials)
            ->select('products.*', 'category_products.name','category_products.slug AS slugCategory')
            ->paginate($limit);
    }

    public function CategoryProduct(string $queryCategory){
        return $this->joinCategory(9)->where('slugCategory',$queryCategory);
    }

    public function orderBy(string $orderSort='',string $orderBy='asc'){
        $post = $this->model->orderBy($orderSort,$orderBy)->get();
        $postFeatured  = $post->filter(function ($value, $key) {
            return $key < 3;
        });
        return $postFeatured->all();
    }

    public function getRouteKeyName(string $slug){
        return $this->model->where('slug',$slug)->first();
    }

}