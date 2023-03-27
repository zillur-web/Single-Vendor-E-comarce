<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Colors;
use App\Models\Size;
use App\Models\ProductGallery;
use App\Models\ProductAttribute;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }
    function products(){
        return view('backend.products.product_view',[
            'products' => Product::latest()->paginate(10),
        ]);
    }
    function add_product(){
        return view('backend.products.add_product',[
            'cats' => Category::all(),
            'colors' => Colors::all(),
            'sizes' => Size::all(),
        ]);
    }
    function add_product_post(Request $request){
        if(auth()->user()->can('Product Add')){
            $product = new Product;

            $request->validate([
                'title' => ['required','min:3','max: 60'],
                'category_id' => ['required'],
                'subcategory_id' => ['required'],
                'thumbnail' => ['required','mimes:jpg,jpeg,png'],
                'summary' => ['required','min:20'],
                'description' => ['required','min:20'],
            ]);

            $slug = Str::slug($request->title);

            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->title = $request->title;
            $product->slug = $slug;

            if ($request->hasFIle('thumbnail')){
                $image = $request->file('thumbnail');
                $thumbnail_name = Str::random(5).'-'.$slug.'.'.$image->getclientoriginalextension();

                Image::make($image)->save(public_path('image/products/thumbnail/'.$thumbnail_name));

                $product->thumbnail = $thumbnail_name;
            }
            $product->summary = $request->summary;
            $product->description = $request->description;

            $product->save();

            foreach($request->color as $key => $color){
                $attr = new ProductAttribute;

                $attr->product_id = $product->id;
                $attr->color_id = $color;
                $attr->size_id = $request->size[$key];
                $attr->quantity = $request->quantity[$key];
                $attr->regular_price = $request->reqular_price[$key];
                $attr->sale_price = $request->sale_price[$key];

                $attr->save();
            }


            if($request->hasFile('gallery_image')){
                $ga_image = $request->file('gallery_image');
                foreach($ga_image as $value){
                    $ga_image_name = Str::random(5).'-'.Str::slug($value).'_product_id_'.$product->id.'.'.$value->getclientoriginalextension();
                    Image::make($value)->save(public_path('image/products/gallery/'.$ga_image_name));
                    $gallery = new ProductGallery;

                    $gallery->product_id = $product->id;
                    $gallery->image_name = $ga_image_name;
                    $gallery->save();
                }

            }

            return redirect('products')->with('success','Product Added Successfully');
        }
        else{
            abort('404');
        }
    }
    function get_subcats_list($id){
        $subcats = SubCategory::where('category_id', $id)->get();
        return response()->json($subcats);
    }
    function product_edit($id){
        $product = Product::findOrFail($id);
        return view('backend.products.edit_product',[
            'cats' => Category::all(),
            'product' => $product,
            'scat' => SubCategory::where('category_id', $product->category_id)->get(),
            'colors' => Colors::all(),
            'sizes' => Size::all(),
        ]);
    }
    function product_edit_post(Request $request){
        if(auth()->user()->can('Product Edit')){
            $product = Product::findOrFail($request->id);
            $request->validate([
                'title' => ['required','min:3','max: 60'],
                'category_id' => ['required'],
                'subcategory_id' => ['required'],
                'summary' => ['required','min:20'],
                'description' => ['required','min:20'],
            ]);

            foreach($request->quantity as $key => $quantity){
                if($quantity == NULL){
                    $request->validate([
                        'quantity[]' => ['required'],
                    ]);
                }
            }
            foreach($request->reqular_price as $key => $reqular_price){
                if($reqular_price == NULL){
                    $request->validate([
                        'reqular_price[]' => ['required'],
                    ]);
                }
            }

            foreach($request->attribute_id as $i => $attribute){

                $attrCheck = ProductAttribute::where('id',$attribute)->where('product_id', $request->id)->where('color_id',$request->color[$i])->where('size_id', $request->size[$i])->exists();

                if($attrCheck){
                    $attr = ProductAttribute::findOrFail($request->attribute_id[$i]);
                    $attr->product_id = $request->id;
                    $attr->color_id = $request->color[$i];
                    $attr->size_id = $request->size[$i];
                    $attr->quantity = $request->quantity[$i];
                    $attr->regular_price = $request->reqular_price[$i];
                    $attr->sale_price = $request->sale_price[$i];

                    $attr->save();
                }
                else{
                    $attrAdd = new ProductAttribute;
                    $attrAdd->product_id = $request->id;
                    $attrAdd->color_id = $request->color[$i];
                    $attrAdd->size_id = $request->size[$i];
                    $attrAdd->quantity = $request->quantity[$i];
                    $attrAdd->regular_price = $request->reqular_price[$i];
                    $attrAdd->sale_price = $request->sale_price[$i];

                    $attrAdd->save();
                }
            }


            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->title = $request->title;

            if ($request->hasFIle('thumbnail')){
                $image = $request->file('thumbnail');
                $thumbnail_name = Str::random(5).'-'.$product->slug.'.'.$image->getclientoriginalextension();

                $old_img = public_path('image/products/thumbnail/'.$product->thumbnail);
                if(file_exists($old_img)){
                    unlink($old_img);
                }

                Image::make($image)->save(public_path('image/products/thumbnail/'.$thumbnail_name));

                $product->thumbnail = $thumbnail_name;
            }

            if($request->hasFile('gallery_image')){
                $ga_image = $request->file('gallery_image');
                foreach($ga_image as $value){
                    $ga_image_name = Str::random(5).'-'.Str::slug($value).'_product_id_'.$product->id.'.'.$value->getclientoriginalextension();
                    Image::make($value)->save(public_path('image/products/gallery/'.$ga_image_name));
                    $gallery = new ProductGallery;

                    $gallery->product_id = $request->id;
                    $gallery->image_name = $ga_image_name;
                    $gallery->save();
                }

            }

            $product->summary = $request->summary;
            $product->description = $request->description;

            $product->save();

            return redirect('products')->with('success','Product Update Successfully');
        }
        else{
            abort('404');
        }
    }
    function product_remove($id){
        if(auth()->user()->can('Product Delete')){
            Product::findOrFail($id)->delete();
            return redirect('products')->with('success', 'Product Delete Successfull');
        }
        else{
            abort('404');
        }
    }
    function product_trush(){
        return view('backend.products.product_trush',[
            'products' => Product::onlyTrashed()->paginate(10),
        ]);
    }
    function product_remove_selected(Request $request){
        if(auth()->user()->can('Product Delete')){
            if(count($request->all()) > 1){
                foreach($request->select as $value){
                    Product::findOrFail($value)->delete();
                }
                return redirect()->route('product_trush')->with('success','Product Removed Successfull');
            }
            else{
                return redirect()->route('products')->with('error','Product Removed Unsccessfull');
            }
        }
        else{
            abort('404');
        }
    }
    function product_restore($id){
        if(auth()->user()->can('Product Trash View')){
            Product::onlyTrashed()->findOrFail($id)->restore();
            return redirect()->route('products')->with('success', 'Product Restore Successfull');
        }
        else{
            abort('404');
        }
    }
    function product_delete($id){
        if(auth()->user()->can('Product Trash View')){
            $product = Product::onlyTrashed()->findOrFail($id);

            $old_img = public_path('image/products/thumbnail/'.$product->thumbnail);
            if(file_exists($old_img)){
                unlink($old_img);
            }

            $ProductGallery = ProductGallery::where('product_id', $id)->get();
            foreach($ProductGallery as $gallery){
                $old_gallery_img = public_path('image/products/gallery/'.$gallery->image_name);
                if(file_exists($old_gallery_img)){
                    unlink($old_gallery_img);
                }
            }

            $product->forceDelete();
            return redirect()->route('product_trush')->with('success', 'Product Permanet Delete Successfull');
        }
        else{
            abort('404');
        }
    }
    function product_trush_selected(Request $request){
        if(auth()->user()->can('Product Trash View')){
            if(isset($request->restore)){
                foreach($request->select as $value){
                    Product::onlyTrashed()->findOrFail($value)->restore();
                }
                return redirect()->route('products')->with('success', 'Product Restore Successfull');
            }
            else{
                foreach($request->select as $value){
                    $product = Product::onlyTrashed()->findOrFail($value);

                    $old_img = public_path('/image/products/thumbnail/'.$product->thumbnail);
                    if(file_exists($old_img)){
                        unlink($old_img);
                    }
                    $ProductGallery = ProductGallery::where('product_id', $value)->get();
                    foreach($ProductGallery as $gallery){
                        $old_gallery_img = public_path('image/products/gallery/'.$gallery->image_name);
                        if(file_exists($old_gallery_img)){
                            unlink($old_gallery_img);
                        }
                    }
                    $product->forceDelete();
                }
                return redirect()->route('products')->with('success', 'Product Permanet Delete Successfull');
            }
        }
        else{
            abort('404');
        }
    }
    function product_attr_delete($product_id, $product_attr_id){
        $obj = ProductAttribute::where('id', $product_attr_id)->where('product_id', $product_id)->first();
        $obj->forceDelete();

        return redirect()->route('product_edit',$product_id)->with('success', 'Product Attribute Delete Successfull');
    }
    function product_gallery_delete($product_id, $image_id){
        $obj = ProductGallery::where('id', $image_id)->where('product_id', $product_id)->first();
        $obj->forceDelete();

        return redirect()->route('product_edit',$product_id)->with('success', 'Product Attribute Delete Successfull');
    }
}
