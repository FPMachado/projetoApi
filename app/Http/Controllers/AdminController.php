<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\PersonalList;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use PDF;

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

    public function searchUser(Request $request)
    {
        $users = User::where('name', 'like', '%'. $request->search .'%')->whereNull("email_verified_at")->get();

        $users = $this->paginate($users);

        return view('admin.index', compact('users'));
    }
    
    public function searchMovie(Request $request)
    {
        $movies =Movies::where('name', 'like', '%'. $request->search .'%')->get();

        $movies = $this->paginate($movies);

        return view('admin.index', compact('movies'));
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

    public function destroyUser(Request $request)
    {
        $personal_list_ids = PersonalList::select('id')->where('user_id', $request->user_id)->get();
 
        PersonalList::destroy($personal_list_ids);
        User::destroy($request->user_id);

        return redirect()->back()->with("message", "Usuário deletado com sucesso.");
    }

    public function update(Request $request)
    {
        $api_key = config('tmdb.api_key');
        $movie = Http::get(config('tmdb.base_url')."/3/movie/{$request->movie_id}"."?api_key={$api_key}&language=pt-BR&append_to_response=videos")->json();

        $data_movie = Movies::where('id', $request->movie_id)->first();

        $data_movie->update([
            'note'          => $movie['vote_average'],
            'name'          => $movie['title'],
            'release_date'  => $movie['release_date'],
            'img_src'       => config('tmdb.image_base_url')."{$movie['poster_path']}",
            'synopsis'      => $movie['overview'],
        ]);

        return redirect()->back()->with("message", "Filme atualizado com sucesso!");
    }

    public function reportMoviesIndex()
    {
        $relMovies = true;
        return view('admin.index', compact('relMovies'));
    }
   
    public function reportUserIndex()
    {
        $relUsers = true;
        return view('admin.index', compact('relUsers'));
    }

    public function reportMovies(Request $request)
    {
        if($request->tipoRel == 'movie01'){
            $movies = Movies::all();
        }elseif(!empty($request->dateSta) and !empty($request->dateEnd)){
            $movies = Movies::whereBetween('updated_at', ["{$request->dateSta} 00:00:00", "{$request->dateEnd} 23:59:59"])->get();            
        }

        if($request->tipoRel !=='movie01' and $movies->count() == 0){
            return redirect()->back()->with("warning", "Não há dados para este filtro");
        }
      
        $pdf = PDF::loadView('report.movie', compact('movies'));

        return $pdf->setPaper('a4', 'landscape')->download(strtoupper($request->tipoRel).date("dmYHis").".pdf");
    }
    
    public function reportUser(Request $request)
    {
        
        $users = User::all()->where('id', "!=", auth()->user()->id);

        if(empty($users)){
            return redirect()->back()->with("warning", "Não há dados para este filtro");
        }

        $pdf = PDF::loadView('report.user', compact('users'));

        return $pdf->setPaper('a4', 'landscape')->download(strtoupper($request->tipoRel).date("dmYHis").".pdf");
    }
}
