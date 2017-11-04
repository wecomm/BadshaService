<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\User\Phone;
use App\Model\User\Repair_type;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();
        $repair_types = Repair_type::all();
        return view('admin/repair/show',compact('repair_types','phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phones = Phone::all();
        return view('admin/repair/create',compact('phones'));
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
        'title' => 'required|unique:repair_types|max:50',
        'phone_id' => 'required',
        'content' => 'required',
        'price' => 'required',
        'repair_time' => 'required',
        'guarantee' => 'required',
        ]);
        $repair_types = new Repair_type;
        $repair_types->title = $request->title;
        $repair_types->phone_id = $request->phone_id;
        $repair_types->content = $request->content;
        $repair_types->price = $request->price;
        $repair_types->repair_time = $request->repair_time;
        $repair_types->guarantee = $request->guarantee;
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/repair_image');
        }
        $repair_types->image = $imageName;
        $repair_types->save();
         return redirect(route('repair.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phones = Phone::all();
        $repair = Repair_type::find($id);
        return view('admin/repair/edit',compact('repair','phones'));
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
        'phone_id' => 'required',
        'content' => 'required',
        'price' => 'required',
        'repair_time' => 'required',
        'guarantee' => 'required',
        ]);
        $repair_types = Repair_type::find($id);
        $repair_types->title = $request->title;
        $repair_types->phone_id = $request->phone_id;
        $repair_types->content = $request->content;
        $repair_types->price = $request->price;
        $repair_types->repair_time = $request->repair_time;
        $repair_types->guarantee = $request->guarantee;
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/repair_image');
        }
        $repair_types->image = $imageName;
        $repair_types->save();
        return redirect(route('repair.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repair = Repair_type::find($id);
        $repair->delete();
        return redirect()->back()->with('message', 
            'Repair type is deleted successfully');
    }
}
