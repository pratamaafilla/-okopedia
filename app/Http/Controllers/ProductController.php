<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //Function buat search product diambil dari request
    //Function nya bisa dipanggil di index, sama product details
    function search($request){   
        $user_id = Auth::id();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();

        //Tampilin product dimana nama nya diambil dari request
        $search = $request->input('search');
        $products = Product::where('name', 'like', "%$search%")->paginate(3);
        
        return view('home', compact('products','count'));
    }

    public function index(Request $request)
    {
        $user_id = Auth::id();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();
        
        //Kalo ada request, panggil function search()
        if(count($request->all()) > 0){
            return $this->search($request);
        }else{ //Munculin semua product lalu di paginate 3
            $products = Product::paginate(3);
            return view('home', compact('products','count'));
        }
    }

    public function product($id, Request $request)
    {
        $user_id = Auth::id();
        $count = DB::table('cartitems')->where('user_id',$user_id)->count();

        if(count($request->all()) > 0){
            return $this->search($request);
        }else{
            $products = Product::where('id',$id)->first();
            return view('product', compact('products','count'));
        }
        
    }

    public function index_admin(){
        //Join table products dengan categories untuk di tampilin di product list
        $products = DB::table('products')->join('categories','products.category_id','=','categories.category_id')->get();

        return view('admin', compact('products'));
    }

    public function index_admin_delete($id){
        //Delete product yang id nya sama dengan id yang di passing
        DB::delete('delete from products where id = ?',[$id]);

        return back();
    }

    public function index_admin_categorylist(){
        $categories = Category::all();

        return view('admin_category_list', compact('categories'));
    }

    public function search_product_by_category($id){
        //Join table categories dan products lalu cari yang id nya sama dengan id yang di passing
        $products = Product::join('categories','products.category_id','=','categories.category_id')
        ->where('products.category_id',$id)
        ->get();

        $categories = Category::all();

        return view('admin_category_list', compact('products','categories'));
    }

    public function index_admin_addproduct(){
        $products = DB::table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->get();
        $categories = Category::all();

        return view('admin_add_product', compact('products','categories'));
    }

    public function upload_product(Request $request){
        //Buat validasi request nya
        $request->validate([
            'name' => 'required|unique:products,name',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:100',
            'image' => 'required|image|max:10000',
        ]);
        
        //Dimasukin ke variable
        $name = $request->input('name');
        $category = $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');
    
        //File nya disimpen ke path images
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

