<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Referentiel;

class TypeController extends Controller
{
    public function index()
    {
        $type = Type::all();
        
        return view('type.indextype', compact('type'));
    }

    public function create()
    {
        return view('type/ajoutType');
    }

    public function storeType(Request $request)
    {
        $input = $request->all();
        Type::create($input);
        return redirect('type/create')->with('flash_message','Formation créé');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('type.editType', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        $input = $request->all();
        $type->update($input);
        return redirect('type/indexType')->with('flash_message', 'Type modifier!');  
    }

    public function destroy($id)
    {
        Type::destroy($id);
        return redirect('type/indexType')->with('flash_message', 'Type supprimer!'); 
    }
}
