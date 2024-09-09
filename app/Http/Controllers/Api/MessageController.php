<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Suite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class MessageController extends Controller
{
    public function store(Request $request, $slug)
    {
        $suite = Suite::where('slug', $slug)->first();
        $data = $request->all();
        $data['date'] = now();
        $data['suite_id'] = $suite->id;

        $validator = FacadesValidator::make($data, [

            'text' => 'required',
            'email' => 'required',
            'name' =>  'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                // la funzione errors() della classe Validator resituisce un array
                // in cui la chiave è il campo soggetto a validazione
                // e il valore è un array di messaggi di errore
                'errors' => $validator->errors()
            ]);
        }

        // salviamo a db i dati inseriti nel form di messaggio
        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
