<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) { }

    public function index(Request $request){

        $supports = $this->service->getAll($request->filter);
dd($supports);

        return view('admin/supports/index', compact('supports'));
    }

    public function show(string $id){
        // Support::find($id)
        // Support::where('id', $id)->first(); entende que é igual
        // Support::where('id', '!=', $id)->first(); passando a condição
        
        // if (!$supports = Support::find($id)) {
        //     return back();
        // }
        dd($supports);
        if (!$supports = $this->service->findOne($id)) {
            return back();
        }
         
        return view('admin/supports/show', compact('supports'));
    }

    public function create(){               
        return view('admin/supports/create');
    }

    public function store(StoreSupportRequest $request, Support $support){

        // $data = $request->all();
        // $data = $request->validated();
        // $data['status'] = 'a';

        // $support->create($data);
        
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(string $id){
        
        // if (!$support = $support->where('id', $id)->first()) {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
         
        return view('admin/supports.edit', compact('support'));
    }
    
    public function update(StoreSupportRequest $request, Support $support){
        
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request),
        );
        
        if (!$support) {
            return back();
        }

        // if (!$support = $support->find($id)) {
        //     return back();
        // }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();
        
        // $support->update($request->only([
        //     'subject', 
        //     'body'
        // ]));

        // $support->update($request->validated());


        return redirect()->route('supports.index');
    }

    public function destroy(string $id){

        // if (!$support = Support::find($id)) {
        //     return back();
        // }

        // $support->delete();

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
