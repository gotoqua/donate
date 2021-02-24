<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Donations;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donations::all();
        return view('index', compact('donations'));
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
            'donor_id' => 'required|max:255', 
            'donate_interval' => 'required|max:255',
            'value_donate' => 'required|max:255',
            'form_pay' => 'required|max:255',
        ]);
        $donations = Donations::create($storeData);

        return redirect('/donations')->with('completed', 'Donation has been saved!');
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
        $donations = Donations::findOrFail($id);
        return view('edit', compact('donations'));
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
            'donor_id' => 'required|max:255', 
            'donate_interval' => 'required|max:255',
            'value_donate' => 'required|max:255',
            'form_pay' => 'required|max:255',
        ]);
        Donations::whereId($id)->update($updateData);
        return redirect('/donations')->with('completed', 'Donation has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donations = Donations::findOrFail($id);
        $donations->delete();

        return redirect('/donations')->with('completed', 'Donation has been deleted');
    }
}
