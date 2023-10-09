<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) 
    {
        $supports = $support->all();

        return view('admin/supports/index', compact('support'));
    }

    public function show(string|int $id)
    {
        // Support::find($id)
        // Support::where('id', $id)->first(); entende que é igual
        // Support::where('id', '!=', $id)->first(); passando a condição
        
        if (!$support = Support::find($id)) {
            return back();
        }
         
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {               
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);
        
        return redirect()->route('support.index');
    }

    public function edit( Support $support, string|int $id)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }
         
        return view('admin/supports.edit', compact('support'));
    }
    
    public function update(Request $request, Support $support, string|int $id)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        $support->update($request->only([
            'subject, body'
        ]));

        return redirect()->route('support.index');
    }
}
