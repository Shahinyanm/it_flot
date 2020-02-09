<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category=null){

        $categories = Category::all();
        if($category){
            $categories = Category::where('slug',$category)->get();
        }

        return new CategoriesResource($categories);
    }
}
