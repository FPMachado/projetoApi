<?php

namespace App\Http\Controllers;

use App\Models\PersonalList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPersonalListController extends Controller
{
    public function __invoke()
    {
        $personal_movies = DB::table('personal_list')->where('user_id', auth()->user()->id)->paginate(4);
        return view('personal_list.personal-list', compact('personal_movies'));
    }

    /**
     * Método responsável por adicionar um filme na lista pessoal
     */
    public function store(Request $request)
    {
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

    public function show(Request $request)
    {
        $data_movie = PersonalList::where('id', $request->list_id)->first();
        return view('personal_list.personal-list-show', compact('data_movie'));
    }

    public function update(Request $request)
    {
        // if($_POST['delete']){
        //     return $this->destroy($request);
        // }

        //TODO VERIFICAR FINDORFAIL COM ERRO
        $data_list = PersonalList::where('id',$request->personal_list_id)->first();

        $data_list->update([
            'note' => $request->note,
            'release_date' => $request->release_date,
            'assisted_in' =>  $request->assisted_in,
            'synopsis' => $request->synopsis,
            'observation' => $request->observation,
        ]);
        // dd($request->id);
        //TODO pOSSIBILIDADE DE CRIAR UMA TABELA PIVÔ E UM MODEL FILME
        SendEmailsController::sendEmailAddMovie($data_list->user_id, $request->id);

        return redirect()->back()->with('message', 'Informações do filme da sua lista atualizada!');
    }

    public function destroy(PersonalList $personal_list)
    {
        dd($personal_list);
    }
}
