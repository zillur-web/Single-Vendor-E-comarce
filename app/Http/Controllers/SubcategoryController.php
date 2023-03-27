<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }

    function subcategories(){
        return view('backend.subcategories.sub_category_view',[
            'subcats' => SubCategory::with('category')->latest()->paginate(10),
        ]);
    }
    function subcategories_add(){
        return view('backend.subcategories.add_sub_category',[
            'cats' => Category::orderBy('category_name', 'asc')->get(),
        ]);
    }
    function subcategories_add_post(Request $request){
        if(auth()->user()->can('Sub Category Add')){
            $request->validate([
                'subcategory_name' => ['required','min:3', 'max:30'],
                'subcategory_slug' => ['required','min:3', 'max:30','unique:sub_categories'],
                'category_id' => ['required'],
            ]);
            $subcat = new SubCategory;
            $subcat ->subcategory_name = $request->subcategory_name;
            $subcat ->subcategory_slug = Str::slug($request->subcategory_slug);
            $subcat ->category_id = $request->category_id;
            $subcat->save();

            return redirect('subcategoies')->with('success','Sub Category Added');
        }
        else{
            abort('404');
        }

    }
    function subcategories_edit($id){
        return view('backend.subcategories.sub_category_edit', [
            'subcat' => SubCategory::findOrFail($id),
        ]);
    }
    function subcategories_edit_post(Request $request){
        if(auth()->user()->can('Sub Category Edit')){
            $request->validate([
                'subcategory_name' => ['required','min:3', 'max:30'],
            ]);
            $subcat = SubCategory::findOrFail($request->id);
            $subcat->subcategory_name = $request->subcategory_name;
            $subcat->save();

            return redirect('subcategoies')->with('success','Sub Category Updeted');
        }
        else{
            abort('404');
        }
    }
    function subcategories_remove($id){
        if(auth()->user()->can('Sub Category Delete')){
            $subcat = SubCategory::findOrFail($id);

            if($subcat->product->count() == 0){
                $subcat->delete();
                return redirect('subcategoies')->with('success','Sub Category Removed');
            }
            else{
                return redirect('subcategoies')->with('warning','This subcategory has products so you cannot Remove it!');
            }
        }
        else{
            abort('404');
        }
    }
    function subcategories_trush(){
       return view('backend.subcategories.trush_subcategory',[
            'subcats' => SubCategory::onlyTrashed()->paginate(10),
       ]);
    }
    function subcategories_restore($id){
        if(auth()->user()->can('Sub Category Trush View')){
            $subcat = SubCategory::onlyTrashed()->findOrFail($id);
            $cats = Category::withTrashed()->findOrFail($subcat->category_id);
            if($cats->deleted_at == NULL){
                $subcat->restore();
            }
            else{
                $cats->restore();
                $subcat->restore();
            }
            return redirect('subcategoies')->with('success','Sub Category Restored');
        }
        else{
            abort('404');
        }

    }
    function subcategories_delete($id){
        if(auth()->user()->can('Sub Category Trush View')){
            $products = Product::onlyTrashed()->where('subcategory_id', $id)->count();
            if($products == 0){
                SubCategory::onlyTrashed()->findOrFail($id)->forceDelete();
                return redirect('subcategoies')->with('success','Sub Category Permanent Deleted');
            }
            else{
                return redirect('subcategoies')->with('warning','This subcategory has products so you cannot Delete it');
            }
        }
        else{
            abort('404');
        }
    }

}
