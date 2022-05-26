<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

Class Task
{
    /**
     * @return array
     */
    public function getFirstTask(): array
    {
        $req = Http::get('http://www.mocky.io/v2/5d47f24c330000623fa3ebfa');
        $res = $req->json();

        $arr = [];

        foreach ($res as $data){
            $arr[] = [
                'name' => $data['id'],
                'level' => $data['zorluk'],
                'estimated_duration' => $data['sure'],
            ];
        }

        return $arr;
    }

    /**
     * @return array
     */
    public function getSecondTask(): array
    {
        $req = Http::get('http://www.mocky.io/v2/5d47f235330000623fa3ebf7');
        $res = $req->json();

        $arr = [];

        foreach ($res as $upperArr){
            foreach ($upperArr as $key => $data){
                $arr[] = [
                    'name' => $key,
                    'level' => $data['level'],
                    'estimated_duration' => $data['estimated_duration'],
                ];
            }
        }

        return $arr;
    }
}
