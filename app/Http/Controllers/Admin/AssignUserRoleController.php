<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AssignUserRoleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, string $role)
    {
        $map = [
            'admin' => 1,
            'reception' => 4,
        ];

        abort_unless(isset($map[$role]), 404);

        $user->role_id = $map[$role];
        $user->save();

        return back()->with('success', "Przypisano rolę: {$role}");
    }
}
