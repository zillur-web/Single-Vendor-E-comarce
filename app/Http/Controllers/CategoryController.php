<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductGallery;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }
    function categories(){
        $cats = Category::latest()->paginate(10);
        return view('backend.categories.category_view', compact('cats'));
    }
    function add_category(){
        return view('backend.categories.add_new');
    }
    function add_category_post(Request $request){
        $request->validate([
            'category_name' => ['required', 'min: 3', 'max:30'],
            'category_slug' => ['required','min: 3', 'max:30','unique:categories'],
        ]);

        $cat = new Category;
        $cat->category_name = $request->category_name;
        $cat->category_slug = Str::slug($request->category_slug);
        $cat->save();

        return redirect('categories')->with('success', 'Category Add Success!');
    }
    function category_remove($id){
        if(auth()->user()->can('Category Delete')){
            $cats = Category::with('subcategory')->findOrFail($id);
            if($cats->subcategory->count() == 0){
                $cats->delete();
                return redirect('categories')->with('success','Category Delete Success!');
            }
            else{
                return redirect('categories')->with('warning','This category has subcategories so you cannot remove it!');
            }
        }
        else{
            abort('404');
        }


    }
    function category_edit($id){
        return view('backend.categories.category_edit',[
            'cats' => Category::findOrFail($id),
        ]);
    }
    function category_edit_post(Request $request){
        if(auth()->user()->can('Category Edit')){
            $request->validate([
                'category_name' => ['required', 'min: 3', 'max:30'],
            ]);
            $cat = Category::findOrFail($request->id);
            $cat->category_name = $request->category_name;
            $cat->save();
            return redirect('categories')->with('info', 'Category Update Success!');
        }
        else{
            abort('404');
        }

    }
    function category_trush(){
        return view('backend.categories.category_trush',[
            'cats' => Category::onlyTrashed()->paginate(10),
        ]);
    }
    function category_restore($id){
        if(auth()->user()->can('Category Trush View')){
            Category::onlyTrashed()->findOrFail($id)->restore();
            return back()->with('success', 'Category Restore Succes!');
        }
        else{
            abort('404');
        }
    }

    function category_delete($id){
        if(auth()->user()->can('Category Delete')){
            // Category::onlyTrashed()->findOrFail($id)->forceDelete();
        $cats = Category::onlyTrashed()->with('subcategory')->findOrFail($id);
        if($cats->subcategory->count() == 0){
            $cats->forceDelete();
            return back()->with('error', 'Category Delete Succes!');
        }
        else{
            return back()->with('warning', 'This category has subcategories so you cannot Delete it!');
        }
        }
        else{
            abort('404');
        }
    }
}
