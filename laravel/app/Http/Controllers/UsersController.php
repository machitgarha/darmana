<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{
    public function query2()
    {
        $var2=DB::table('users')->select('name','user_id')->distinct('name')->get() ;//-->select (distinct)name user_id from users
        return $var2 ;
    }
    public function query3()
    {
        $var3=DB::table('illness')
                                ->join('history_illness','snot','=','sn_owner')
                                ->select('illness.name of illness','history_illness.id_owner','history_illness.name_expert')
                                ->get() ;
        return $var3 ;
    }
    public function query4()
    {
        $var4=DB::table('treatments')
                                    ->join('providing_traetment','snot','=','snt')
                                    ->select('providing_traetment.id','treatments.name of treatment')
                                    ->groupBy('providing_traetment.id')
                                    ->having('providing_traetment.point','>',3)
                                    ->get() ;
        return $var4 ;
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'result' => DB::table('users')->get(),
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        $isInserted = DB::table('users')->insert([
            'name' => $data['name'],
            'user_id' => $data['id'],
            'Temperament' => $data['temperament'],
            'year of birth' => $data['birth_year'],
            'mounth of birth' => $data['birth_month'],
            'country' => $data['living_country'],
            'city' => $data['living_city'],
            'sex' => $data['sex'],
        ]);

        return response()->json(
            ['success' => $isInserted],
            $isInserted ? 201 : 500
        );
    }
}
