<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    function search($request){   
        $search = $request->input('search');
        $products = Product::where('name', 'like', "%$search%")->paginate(3);
        
        return view('home', compact('products'));
    }

    public function index(Request $request)
    {
        if(count($request->all()) > 0){
            return $this->search($request);
        }else{
            $products = Product::paginate(3);
            return view('home', compact('products'));
        }
    }

    public function product($id, Request $request)
    {
        if(count($request->all()) > 0){
            return $this->search($request);
        }else{
            $products = Product::where('id',$id)->first();
            return view('product', compact('products'));
        }
        
    }

    public function index_admin(){
        $products = DB::table('products')->join('categories','products.category_id','=','categories.category_id')->get();

        return view('admin', compact('products'));
    }

    public function index_admin_delete($id){
        DB::delete('delete from products where id = ?',[$id]);

        return back();
    }

    public function index_admin_categorylist(){

        $categories = Category::all();

        return view('admin_category_list', compact('categories'));
    }

    public function search_product_by_category($id){
        $products = Product::join('categories','products.category_id','=','categories.category_id')->where('products.category_id',$id)->get();
        $categories = Category::all();

        return view('admin_category_list', compact('products','categories'));
    }

    public function index_admin_addproduct(){
        $products = DB::table('products')->join('categories','products.category_id','=','categories.category_id')->get();
        $categories = Category::all();

        return view('admin_add_product', compact('products','categories'));
    }

    public function upload_product(Request $request){

        $request->validate([
            'name' => 'required|unique:products,name',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:100',
            'image' => 'required|image|max:10000',
        ]);
        
        $name = $request->input('name');
        $category = $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');
    
        $file = $request->file('image');
        $image = $file->getClientOriginalName();
    
            
        $file->move(base_path('\public\images'), $file->getClientOriginalName());
                
        DB::table('products')->insert(
            ['name' => $name, 'category_id' => $category, 'description'=> $description, 'price' => $price, 'image' => $image]
        );
        return back();
    }

    public function index_admin_addcategory(){

        $categories = Category::all();
        
        return view('admin_add_category', compact('categories'));
    }

    public function upload_category(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,category_name',
        ]);
        $name = $request->input('name');

        DB::table('categories')->insert(
            ['category_name' => $name]
        );
        return back();
    }
}

