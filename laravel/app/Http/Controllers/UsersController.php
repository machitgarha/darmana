<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
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

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'result' => DB::table('users')
                ->orderBy('user_id')
                ->get(),
        ]);
    }

    private static function keyMapping(): array
    {
        return [
            'id' => 'user_id',
            'temperament' => 'Temperament',
            'birth_year' => 'year of birth',
            'birth_month' => 'mounth of birth',
            'living_country' => 'country',
            'living_city' => 'city',
        ];
    }

    private static function exchangeKeys(array $data): array
    {
        foreach (self::keyMapping() as $search => $replacement) {
            if (isset($data[$search])) {
                $data[$replacement] = $data[$search];
                unset($data[$search]);
            }
        }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request): JsonResponse
    {
        $data = $request->validated();

        $isInserted = DB::table('users')
            ->insert(self::exchangeKeys($data));

        return response()->json(
            ['success' => $isInserted],
            $isInserted ? 201 : 500
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'result' => DB::table('users')
                ->where('user_id', '=', $id)
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = $id;

        $isInserted = (bool)DB::table('users')
            ->update(self::exchangeKeys($data));

        return response()->json(
            ['success' => $isInserted],
            $isInserted ? 201 : 500
        );
    }

    private static function notSupported(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'result' => 'Not supported'
        ], 501);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): JsonResponse
    {
        return self::notSupported();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        return self::notSupported();
    }
}
