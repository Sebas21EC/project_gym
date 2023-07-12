<?php

namespace App\Http\Controllers\staff\occupation;

use App\Http\Controllers\Controller;
use App\Models\staff\occupation\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    //
    public function index()
    {
        $occupation = Occupation::all();
        return view('staff.occupation.index', ['occupations' => $occupation]);
    }
}
