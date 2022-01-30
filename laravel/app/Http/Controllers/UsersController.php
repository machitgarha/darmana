<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function query1()//--> select * from users
    {
        $var1=DB::table('users')->get() ;
        return $var1 ;
    }
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

    private static function getAllTemperaments(): array
    {
        return [
            "Cold & Dry",
            "Hot & Dry",
            "Cold & Wet",
            "Hot & Wet",
            "Medium",
        ];
    }

    private static function getAllCountries(): array
    {
        return [
            "Iran"
        ];
    }

    private static function getAllCities(): array
    {
        return [
            "Tehran",
            "Qazvin",
            "Hamendan",
        ];
    }

    private static function getAllSexes(): array
    {
        return ["f", "m"];
    }

    public function new(
        string $name,
        int $id,
        string $temperament,
        int $birthYear,
        int $birthMonth,
        string $livingCountry,
        string $livingCity,
        string $sex,
    ): bool {
        if (
            !in_array($temperament, self::getAllTemperaments(), true) ||
            // A one day baby is even possible! :)
            $birthYear > date("Y") ||
            ($birthMonth < 1 || $birthMonth > 12) ||
            !in_array($livingCountry, self::getAllCountries(), true) ||
            !in_array($livingCity, self::getAllCities(), true) ||
            !in_array($sex, self::getAllSexes(), true)
        ) {
            return false;
        }

        return DB::table("users")->insert([
            "name" => $name,
            "user_id" => $id,
            "Temperament" => $temperament,
            "year of birth" => $birthYear,
            "month of birth" => $birthMonth,
            "country" => $livingCountry,
            "city" => $livingCity,
            "sex" => $sex,
        ]);
    }
}
