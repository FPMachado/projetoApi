<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\PersonalList;
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

    public function paginate($items, $options = [], $perPage = 10, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function users()
    {
        $users = User::all(['id', 'name', 'last_name', 'email', 'email_verified_at'])->where('id', "!=", auth()->user()->id)->whereNull("email_verified_at");

        $options = [
            'path' => "/admin/users",
        ];
        $users = $this->paginate($users, $options);

        return view('admin.index', compact('users'));
    }

    public function movies()
    {
        $movies = Movies::all(['id', 'name', 'release_date']);

        $options = [
            'path' => "/admin/movies",
        ];
        $movies = $this->paginate($movies, $options);

        return view('admin.index', compact('movies'));
    }

    public function deleteUser(Request $request)
    {
        $personal_list_ids = PersonalList::select('id')->where('user_id', $request->user_id)->get();
 
        PersonalList::destroy($personal_list_ids);
        User::destroy($request->user_id);

        return redirect()->back()->with("message", "Usuário deletado com sucesso.");
    }
}
