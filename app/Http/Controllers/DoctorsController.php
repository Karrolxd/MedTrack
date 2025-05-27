<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorsRequest;
use App\Http\Requests\UpdateDoctorsRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('admin.create-doctor', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorsRequest $request, User $user)
    {
        $data = $request->validated();

        $doctor = $user->doctor()->create($data);

        $user->update(['role_id' => 3]);

        $doctor->specialities()->sync($data['specialities']);

        return to_route('admin.dashboard')->with('success', 'Doktor dodany.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorsRequest $request, Doctor $doctors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctors)
    {
        //
    }
}
