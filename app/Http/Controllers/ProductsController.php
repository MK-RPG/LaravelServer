<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use File;


class ProductsController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function getIndex() {
        $categories = [];

        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        return view('products.index')
            ->with('products', Product::all())
            ->with('categories', $categories);
    }

    public function postCreate() {

        $validator = Validator::make(Input::all(), Product::$rules);


        if ($validator->passes()) {
            $product = new Product;
            $product->category_id = Input::get('category_id');
            $product->title = Input::get('title');
            $product->description = Input::get('description');
            $product->price = Input::get('price');

            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('img/products/' . $filename);
            Image::make($image->getRealPath())->resize(468, 249)->save($path);
            $product->image = 'img/products/'.$filename;
            $product->save();
            echo 'pass';
            return  redirect('admin/products')
                ->with('message', 'Product Created');
        }

        return redirect('admin/products')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function postDestroy() {
        $product = Product::find(Input::get('id'));

        if ($product) {
            File::delete('public/'.$product->image);
            $product->delete();
            return redirect('admin/products')
                ->with('message', 'Product Deleted');
        }

        return redirect('admin/products')
            ->with('message', 'Something went wrong, please try again');
    }

    public function postToggleAvailability() {
        $product = Product::find(Input::get('id'));

        if ($product) {
            $product->availability = Input::get('availability');
            $product->save();
            return redirect('admin/products')->with('message', 'Product Updated');
        }

        return redirect('admin/products')->with('message', 'Invalid Product');
    }
}
