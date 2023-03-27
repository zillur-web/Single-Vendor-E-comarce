<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Size;

class SizeController extends Controller
{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }
    function sizes_view(){
        $sizes = Size::latest()->paginate(10);
        return view('backend.sizes.sizes_view', compact('sizes'));
    }
    function size_add(){
        return view('backend.sizes.add_size');
    }
    function size_add_post(Request $request){
        if(auth()->user()->can('Size Add')){
            foreach($request->field as $value){
                $size = new Size;
                $size->size_name = $value;
                $size->slug = Str::slug($value);
                $size->save();
            }
            return redirect('sizes')->with('success','Size Added Successfull');
        }
        else{
            abort('404');
        }
    }
    function size_remove($id){
        if(auth()->user()->can('Size Delete')){
            Size::findOrFail($id)->forceDelete();
            return redirect('sizes')->with('success','Size Delete Successfull');
        }
        else{
            abort('404');
        }
    }
    function size_selected_remove(Request $request){
        if(auth()->user()->can('Size Delete')){
            if($request->select != NULL){
                foreach($request->select as $value){
                    Size::findOrFail($value)->forceDelete();
                }
                return redirect('sizes')->with('success','Size Delete Successfull');
            }
            else{
                return redirect('sizes')->with('warning','Please Select Sizes');
            }
        }
        else{
            abort('404');
        }
    }
}
