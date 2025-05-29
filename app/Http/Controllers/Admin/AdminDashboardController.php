<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        $guestRoleId = Role::firstWhere('name', 'guest')->id;
        $receptionistRoleId = Role::firstWhere('name', 'reception')->id;
        $guestUsers = $users->where('role_id', $guestRoleId);

        $countedUsers = $users->count();
        $countedDoctors = Doctor::all()->count();
        $countedPatients = Patient::all()->count();
        $countedReceptionists = $users->where('role_id', $receptionistRoleId)->count();

        return view('admin.dashboard', [
            'countedUsers' => $countedUsers,
            'countedDoctors' => $countedDoctors,
            'countedPatients' => $countedPatients,
            'countedReceptionists' => $countedReceptionists,
            'guestUsers' => $guestUsers,
        ]);
    }
}
