<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colors;
use Illuminate\Support\Str;

class ColorsController extends Controller
{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }

    function colors_view(){
        $colors = Colors::latest()->paginate(10);
        return view('backend.colors.colors_view', compact('colors'));
    }
    function color_add(){
        return view('backend.colors.add_color');
    }
    function color_add_post(Request $request){
        if(auth()->user()->can('Color Add')){
            foreach($request->field as $value){
                $color = new Colors;
                $color->color_name = $value;
                $color->slug = Str::slug($value);
                $color->save();
            }
            return redirect('colors')->with('success','Color Added Successfull');
        }
        else{
            abort('404');
        }

    }
    function color_remove($id){
        if(auth()->user()->can('Color Delete')){
            $color = Colors::findOrFail($id)->forceDelete();
            if($color == true){
                return redirect('colors')->with('success', 'Color Delete Success');
            }
            else{
                return redirect('colors')->with('error', 'Color Delete Not Success');
            }
        }
        else{
            abort('404');
        }

    }
    function color_selected(Request $request){
        if(auth()->user()->can('Color Delete')){
            foreach($request->select as $value){
                Colors::findOrFail($value)->forceDelete();
            }
            return redirect('colors')->with('success', 'Color Delete Success');
        }
        else{
            abort('404');
        }

    }
}
