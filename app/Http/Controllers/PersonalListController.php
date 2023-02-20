<?php

namespace App\Http\Controllers;

use App\Models\PersonalList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalListController extends Controller
{
    public function __invoke()
    {
        $personal_movies = DB::table('personal_list')->where('user_id', auth()->user()->id)->paginate(4);
        return view('personal-list', compact('personal_movies'));
    }

    /**
     * Método responsável por adicionar um filme na lista pessoal
     */
    public function store(Request $request)
    {
        // dd($request->img_poster);
        PersonalList::create([
            'user_id' => auth()->user()->id,
            'note' => $request->note,
            'name' => $request->movie_name,
            'release_date' => $request->release_date,
            'synopsis' => $request->synopsis,
            'img_src' => $request->img_poster,
        ]);

        return redirect()->back()->with('message', "Filme adicionado na sua lista pessoal!");
    }
}
