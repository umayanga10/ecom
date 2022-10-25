<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    public function index()
    {
        $category = Category::get();
        return view('admin.product.index',compact('category'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
        ]);

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time().'.'.$request->image->extension();
                Storage::put('/public/product_img/'.date("Y").'/'.date("m").'/'.date("d").'/'.$image_name,$image);
    
                $img_url = '/storage/product_img/'.date("Y").'/'.date("m").'/'.date("d").'/'.$image_name;
                
            } 
            else {
                $img_url = null;
            }
            
            $product = new Product;
            $product->category_id = $request->cat_id;
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->image = $img_url;
            $product->brand = $request->brand;
            $product->model = $request->model;
            $product->short_desc = $request->short_desc;
            $product->desc = $request->desc;
            $product->keywords = $request->key;
            $product->technical_spcification = $request->tech;
            $product->uses = $request->users;
            $product->warranty = $request->warranty;
            $product->save();

            DB::commit();
            return redirect()->route('product')->with('message', 'RECORD HAS BEEN SUCCESSFULLY INSERTED!');
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            return redirect()->route('product')->with('message', 'RECORD HAS NOT BEEN SUCCESSFULLY INSERTED!');
        }
       
    }

   
    public function view(Product $product)
    {
        $product = Product::get();
        $category = Category::get();
        return view('admin.product.view',compact('product','category'));
    }

    public function load_table(Request $request)
    {
        // dd($request->all());
        $products = DB::table('products AS p')
                        ->join('categories AS c', 'c.id', 'p.category_id')
                        ->select([
                                'c.id',
                                'p.id as pro_id',
                                'p.name',
                                'c.category_name',
                                'p.slug',
                                'p.brand',
                                'p.model',
                                'p.keywords',
                                'p.warranty',
                                'p.status',
                                'p.uses',
                            ]);
                           
           

            $products = $products->get();
            // dd($products);
            return view('admin.product.loadData', compact('products'));

    }

    public function export(Request $request)
    {
       dd("hit");
    }
  
    public function edit(Product $product)
    {
        
    }

   
    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
