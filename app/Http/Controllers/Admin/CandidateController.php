<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->role_id !== User::SUPER_ADMIN, 404);

        $labels = Candidate::orderBy('number')->get()->groupBy('label');

        return view('admin.candidates.index', compact('labels'));
    }

    public function create()
    {
        abort_if(auth()->user()->role_id !== User::SUPER_ADMIN, 404);

        return view('admin.candidates.create');
    }

    public function store(Request $request)
    {
        abort_if(auth()->user()->role_id !== User::SUPER_ADMIN, 404);

        $candidate = $request->validate([
            'name' => ['required', 'string'],
            'label' => ['required', 'string', 'in:MPK,OSIS'],
            'number' => ['required', 'numeric', 'min:1'],
            'image' => ['required', 'mimes:png,jpg,svg,webp', 'max:2048'],
        ]);

        $candidate['image'] = $request->file('image')->store('candidates');

        Candidate::create($candidate);

        return redirect()->route('admin.candidates.index')->with('success', 'Berhasil menambah kandidat.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
