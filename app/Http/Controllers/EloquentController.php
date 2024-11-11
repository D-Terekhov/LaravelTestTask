<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\DB;

class EloquentController extends Controller
{


    public function addWord(Request $request) {
        $word = new Word;
        $word ->word = $request ->word;
        $word ->save();
        return back();
    }

    public function getPage(Request $request) {
        $words = Word::paginate($request ->countItems);
        $words->appends(['countItems' => $request->countItems]);
        return view('paginate', ['words' => $words, 'count' => $request->countItems]);
    }

    public function getData() {
        $result = Word::select('word', DB::raw('count(*) as total'))->groupBy('word')->orderby('total', 'desc' ) ->get();
                    
        return $result;
    }

}
