<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $options = [
            'path' => "/admin/users",
        ];
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function users()
    {
        $users = User::all(['id', 'name', 'last_name', 'email', 'email_verified_at'])->where('id', "!=", auth()->user()->id)->whereNull("email_verified_at");

        $users = $this->paginate($users);

        return view('admin.index', compact('users'));
    }
}
