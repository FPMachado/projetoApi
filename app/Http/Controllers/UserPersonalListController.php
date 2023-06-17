<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\PersonalList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class UserPersonalListController extends Controller
{
    public function __invoke()
    {
        // $personal_movies = DB::table('personal_list')->where('user_id', auth()->user()->id)->paginate(4);
        $movies = DB::table('personal_list')->select('user_id', 'note', 'movie_id')->where('user_id', auth()->user()->id)->get();
        $personal_movies = [];
        foreach ($movies as $key => $movie) {
            $personal_movies[$key] =  DB::table('movies')->where('id', $movie->movie_id)->first();
            $personal_movies[$key]->note = $movie->note;
        }

        $personal_movies = $this->paginate($personal_movies);

        return view('personal_list.personal-list', compact('personal_movies'));
    }

    public function paginate($items, $perPage = 4, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => 'personal_list.personal-list']);
    }

    /**
     * Método responsável por adicionar um filme na lista pessoal
     */
    public function store(Request $request)
    {
        $movie_exists = PersonalList::where('movie_id', $request->movie_id)->where('user_id', auth()->user()->id)->first();
        $movie        = Movies::where('id', $request->movie_id)->first();

        if(empty($movie)){
            MovieController::store($request);
        }

        if(!empty($movie_exists)){
            return redirect()->back()->with('warning', "Você já possui este filme em sua lista");
        }

        PersonalList::create([
            'user_id' => auth()->user()->id,
            'note' => $request->note,
            'movie_id' => $request->movie_id,
        ]);


        return redirect()->back()->with('message', "Filme adicionado na sua lista pessoal!");
    }

    public function show(Request $request)
    {
        $personal_data = PersonalList::where('user_id', auth()->user()->id)->where('movie_id', $request->list_id)->first();
        $data_movie = DB::table('movies')->where('id',$request->list_id)->first();
        if(!empty($personal_data->note)){
            $data_movie->note = $personal_data->note;
        }
        return view('personal_list.personal-list-show', compact('data_movie', 'personal_data'));
    }

    public function update(Request $request)
    {
        $data_list = PersonalList::where('movie_id', $request->movie_id)->where('user_id', auth()->user()->id)->first();
        // dd($request);
        
        $data_list->update([
            'note' => number_format($request->note, 2, ".", "."),
            'assisted_in' =>  $request->assisted_in,
            'observation' => $request->observation,
        ]);
        // dd($data_list);
        // dd($request->id);
        //TODO pOSSIBILIDADE DE CRIAR UMA TABELA PIVÔ E UM MODEL FILME
        // SendEmailsController::sendEmailAddMovie($data_list->user_id, $request->id);

        return redirect()->back()->with('message', 'Informações do filme da sua lista atualizada!');
    }

    public function destroy(PersonalList $personal_list)
    {
        // dd($personal_list);
    }
}
