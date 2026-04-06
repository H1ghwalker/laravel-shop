<?php

namespace App\Services\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class ProductService
{
    public function store($data) {
        try {

            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category']; //category_id
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIds($tags);

            $data['category_id'] = $this->getCategoryId($category);

            $product = Product::create($data);

            $product->tags()->attach($tagIds);

            DB::commit();

        } catch(\Exception $exception) {
            DB::rollback();
            return $exception->getMessage();
        }

        return $product;
    }

    public function update(Product $product, array $data) {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $category = $data['category']; //category_id
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIdsWithUpdate($tags);

            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $product->update($data);
            $product->tags()->sync($tagIds);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollback();
            return $exception->getMessage();

        }
        
        return $product->fresh();
    }

    private function getTagIds($tags) {
        $tagIds = [];
        foreach($tags as $tag) {
            
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;

    }

    private function getCategoryId($item) {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    private function getCategoryIdWithUpdate($item) {
        if(!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }

    private function getTagIdsWithUpdate($tags) {
        $tagIds = [];
        foreach($tags as $tag) {

            if(!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        return $tagIds;

    }
}