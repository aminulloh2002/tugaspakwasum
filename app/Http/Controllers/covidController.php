<?php

namespace App\Http\Controllers;

use App\Covid;
use Illuminate\Http\Request;
use PDF;
class covidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function search(Request $request){
         $search = $request->search;
        $covids =  Covid::where('country', 'LIKE', "%{$search}%")
        ->orWhere('confirmed', 'LIKE', "%{$search}%")
        ->orWhere('recovered', 'LIKE', "%{$search}%")
        ->orWhere('death', 'LIKE', "%{$search}%")
        ->get();
        
        return view('index',compact('covids'));
    }
    public function index()
    {
       $covids = Covid::all();
       return view('index',compact('covids'));
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
        Covid::create($request->all());
        return redirect('/covid');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function show(Covid $covid)
    {
        return view('detail',compact('covid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function edit(Covid $covid)
    {
        return view('update',compact('covid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Covid $covid)
    {
        Covid::where('id',$covid->id)->update($request->except('_token','_method'));
        return redirect('/covid');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Covid $covid)
    {
        Covid::destroy($covid->id);
        return redirect('/covid');
    }

    public function printpdf($id)
{
    $covid = Covid::find($id);
    $pdf = PDF::loadView('print', compact('covid'))->setPaper('a4', 'landscape');
    return $pdf->stream('Info-Covid19.pdf');
}
}
