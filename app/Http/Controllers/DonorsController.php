<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Donors;

class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donors::all();
        return view('index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([                        
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'cpf' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
            'dt_birth' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        $donors = Donors::create($storeData);

        return redirect('/donors')->with('completed', 'Donor has been saved!');
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
        $donors = Donors::findOrFail($id);
        return view('edit', compact('donors'));
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
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',        
            'cpf' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
            'dt_birth' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        Donors::whereId($id)->update($updateData);
        return redirect('/donors')->with('completed', 'Donor has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donors = Donors::findOrFail($id);
        $donors->delete();

        return redirect('/donors')->with('completed', 'Donor has been deleted');
    }
}
