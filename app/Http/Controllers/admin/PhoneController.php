<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\User\Phone;
use App\Model\User\Phone_company;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();
        return view('admin/phone/show',compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Phone_company::all();
       
        return view('admin/phone/create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required|unique:phones|max:50',
        ]);
        $phones = new Phone;
        $phones->title = $request->title;
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/pho_image');
        }
        $phones->image = $imageName;
        $phones->Phone_company_id = $request->company_id;
        $phones->save();
        //$phones->phone_companies()->sync($request->phone_companies);
        return redirect(route('phone.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = Phone::find($id);
        $companies = Phone_company::all();
        return view('admin/phone/edit',compact('phone','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'title' => 'required|max:50',
        ]);
        $phones = Phone::find($id);
        $phones->title = $request->title;
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/pho_image');
        }
        $phones->image = $imageName;
        $phones->Phone_company_id = $request->company_id;
        $phones->save();
        //$phones->phone_companies()->sync($request->phone_companies);
        return redirect(route('phone.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phones = Phone::find($id);
        $phones->delete();
        return redirect()->back()->with('message','Phone is deleted successfully');
    }
}
