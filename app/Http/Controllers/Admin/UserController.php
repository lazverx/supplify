<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query()->where('role', '!=', 'admin');

        // Search by name or email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Pagination (10 per page)
        $users = $query->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function exportIndexPdf(Request $request)
    {
        $query = User::with('profile');

        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        $users = $query->get(); // ambil semua hasil filter (tanpa paginate)

        $pdf = Pdf::loadView('admin.users.index-pdf', compact('users'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('daftar-user.pdf');
    }


    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted');
    }
}
