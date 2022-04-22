<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Sample;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function search() 
    {
        return Sample::select('id', 'name', 'balance', 'favoriteTransportation')
                        ->orderBy('favoriteTransportation')
                        ->where('balance', '<', 10000)->get();
    }

    public function store()
    {
        $data = Sample::select('id', 'name', 'balance', 'favoriteTransportation as transportation')
                        ->orderBy('favoriteTransportation')
                        ->where('balance', '<', 10000)->get();

        Member::insert($data->toArray());
    }
}
