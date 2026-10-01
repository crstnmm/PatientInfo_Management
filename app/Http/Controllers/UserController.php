<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
    $query = Patient::query();

    if ($request->filled('search')) {
        $query->where('full_name', 'like', '%' . $request->input('search') . '%');
    }

    $filterBy = $request->input('filter_by');
$filterValue = $request->input('filter_value');

    if ($filterValue !== null && $filterValue !== '') {
    if ($filterBy === 'date_of_birth') {
        $query->whereDate('date_of_birth', $filterValue);
    } elseif ($filterBy === 'gender') {
        $query->where('gender', $filterValue);
    } elseif ($filterBy === 'address') {
        $query->where('address', 'like', '%' . $filterValue . '%');
    }
    }

    $users = $query->get();

    return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:50',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:female,male',
            'email' => 'required|email|unique:patients,email',
            'address' => 'required|string|max:255',
    ]);

        Patient::create($request->only([
            'full_name',
            'suffix',
            'date_of_birth',
            'gender',
            'email',
            'address',
    ]));

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Patient::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Patient::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Patient::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:50',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:female,male',
            'email' => 'required|email|unique:patients,email,' . $id,
            'address' => 'required|string|max:255',
    ]);

        $user->update($validated);

        return redirect()->route('users.index', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Patient::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    public function dashboard()
    {
        $patientCount = Patient::count();

        return view('dashboard', compact('patientCount'));
    }


}
