<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;



class CategoriesController extends Controller
{

    public function __construct() {
        //$this->middleware('auth');
    }

    public function getIndex() {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    public function  postCreate() {
        $validator = Validator::make(Input::all(), Category::$rules);

        if ($validator->passes()) {
            $category = new Category;
            $category->name = Input::get('name');
            $category->save();

            return redirect('admin/categories')
                ->with('message', 'Category Created');
        }

        return redirect('admin/categories')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function postDestroy() {
        
        $category = Category::find(Input::get('id'));

        if ($category) {
            $category->delete();
            return redirect('admin/categories')
                ->with('message', 'Category Deleted');
        }

        return redirect('admin/categories')
            ->with('message', 'Something went wrong, please try again');
    }
}


