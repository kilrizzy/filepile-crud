<?php

namespace App\Http\Controllers\__ModelClasses__;

use App\Http\Controllers\Controller;
use App\__ModelClass__;

class __ModelClass__Controller extends Controller
{

    public function index(){
        $__modelVariables__ = __ModelClass__::get();
        return view('__modelViewDirectory__.index',['__modelVariables__'=>$__modelVariables__]);
    }

    public function create(){
        return view('__modelViewDirectory__.create');
    }

    public function store(Request $request){
        $__modelVariable__ = __ModelClass__::create($request->all());
        return redirect('__modelRoute__')->withSuccess('Saved!');
    }

    public function show($__modelVariable__Id){
        $__modelVariable__ = __ModelClass__::where('id',$__modelVariable__Id)->first();
        return view('__modelViewDirectory__.show',['__modelVariable__'=>$__modelVariable__]);
    }

    public function edit($__modelVariable__Id){
        $__modelVariable__ = __ModelClass__::where('id',$__modelVariable__Id)->first();
        return view('__modelViewDirectory__.edit',[$this->variableNameSingular=>$model]);
    }

    public function update(Request $request, $__modelVariable__Id){
        $__modelVariable__ = __ModelClass__::where('id',$__modelVariable__Id)->first();
        $__modelVariable__->update($request->all());
        return redirect('__modelRoute__')->withSuccess('Saved!');
    }

    public function destroy($__modelVariable__Id){
        $__modelVariable__ = __ModelClass__::where('id',$__modelVariable__Id)->first();
        $__modelVariable__->delete();
        return redirect('__modelRoute__')->withSuccess('Deleted!');
    }

}
