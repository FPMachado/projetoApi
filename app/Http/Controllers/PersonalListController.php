<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\PersonalList;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class PersonalListController extends Controller
{
    public function index()
    {
        $movies = DB::table('personal_list')->select('id', 'user_id', 'note', 'movie_id')->where('user_id', auth()->user()->id)->orderBy("created_at", "desc")->get();
        
        if(empty($movies)){
            return view('personal_list.personal-list', compact('personal_movies'));
        }

        $personal_movies = [];
        foreach ($movies as $key => $movie) {
            $personal_movies[$key] =  DB::table('movies')->where('id', $movie->movie_id)->first();
            $personal_movies[$key]->note = $movie->note;
            $personal_movies[$key]->personal_list_id = $movie->id;
        }

        $personal_movies = $this->paginate($personal_movies);

        return view('personal_list.personal-list', compact('personal_movies'));
    }

    public function paginate($items, $perPage = 4, $page = null, $options = [])
    {
        $user_id = auth()->user()->id;
        $options = [
            'path' => "/my-personal-list/{$user_id}/movies",
        ];
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function search(Request $request)
    {
        $user = auth()->user()->id;
        $personal_movies = DB::select("select movies.*, personal_list.id as personal_list_id, personal_list.note from movies inner join personal_list on personal_list.movie_id = movies.id where movies.name like '%{$request->pesquisa}%' and personal_list.user_id = {$user}");
        if(empty($personal_movies)){
            return view('personal_list.personal-list', compact('personal_movies'));
        }
        $personal_movies = $this->paginate($personal_movies);
        
        return view('personal_list.personal-list', compact('personal_movies'));
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
        $personal_data = PersonalList::where('user_id', auth()->user()->id)->where('movie_id', $request->movie)->first();
        $data_movie = DB::table('movies')->where('id',$request->movie)->first();

        if(!empty($personal_data->note)){
            $data_movie->note = $personal_data->note;
        }
        return view('personal_list.personal-list-show', compact('data_movie', 'personal_data'));
    }

    public function update(Request $request)
    {
        $data_list = PersonalList::where('movie_id', $request->movie_id)->where('user_id', auth()->user()->id)->first();
        
        $data_list->update([
            'note' => number_format($request->note, 2, ".", "."),
            'assisted_in' =>  $request->assisted_in,
            'observation' => $request->observation,
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        
        if($user->recive_email == 't'){
            SendEmailsController::sendEmailAddMovie($data_list->user_id, $request->movie_id);
        }

        return redirect()->back()->with('message', 'Informações do filme da sua lista atualizada!');
    }

    public function delete(Request $request)
    {
        PersonalList::destroy($request->list_id);
        $user_id = auth()->user()->id;
        return redirect("my-personal-list/{$user_id}/movies/")->with('message', "Você deletou um filme da sua lista");
    }
}
