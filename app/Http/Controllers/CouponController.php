<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnCallback;

class CouponController extends Controller

{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.coupon.index',[
            'coupons' => Coupon::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(auth()->user()->can('Coupon Add')){
            $request->validate([
                'coupon_code' => ['required'],
                'coupon_ammount' => ['required'],
                'coupon_validity' => ['required']
            ]);

            $obj = new Coupon;

            $obj->coupon_code = $request->coupon_code;
            $obj->coupon_ammount = $request->coupon_ammount;
            $obj->coupon_percentage = $request->percentage;
            $obj->coupon_validity = $request->coupon_validity;
            $obj->limit = $request->limit;

            $obj->save();
            return redirect()->route('coupon.index')->with('success', 'Coupon Successfully Added !');
        }
        else{
            abort('404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon){
        return view('backend.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon){
        if(auth()->user()->can('Coupon Edit')){
            $request->validate([
                'coupon_code' => ['required'],
                'coupon_ammount' => ['required'],
                'coupon_validity' => ['required']
            ]);
            $coupon->coupon_code = $request->coupon_code;
            $coupon->coupon_ammount = $request->coupon_ammount;
            $coupon->coupon_percentage = $request->percentage;
            $coupon->coupon_validity = $request->coupon_validity;
            $coupon->limit = $request->limit;

            $coupon->save();
            return redirect()->route('coupon.index')->with('success', 'Coupon Successfully Updated !');
        }
        else{
            abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon){
        if(auth()->user()->can('Coupon Delete')){
            $coupon->delete();
            return redirect()->route('coupon.index')->with('success', 'Coupon Successfully Deleted !');
        }
        else{
            abort('404');
        }
    }

    public function trashed(){
        return view('backend.coupon.trashed',[
            'coupons' => Coupon::onlyTrashed()->get(),
        ]);
    }
    public function restore($id){
        if(auth()->user()->can('Coupon Trushed View')){
            $coupon = Coupon::onlyTrashed()->findOrFail($id)->restore();
            if($coupon){
                return redirect()->route('coupon.index')->with('success', 'Coupon Successfully Restore !');
            }
            else{
                return redirect()->route('coupon.index')->with('erorr', 'Coupon Unsuccessfully Restore !');
            }
        }
        else{
            abort('404');
        }
    }
}
