<?php

namespace App\Modules\SuCoYKhoa\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaoCaoSuCoYKhoaController extends Controller
{

    public function viewBaoCao()
    {
        return view('SuCoYKhoa::bao_cao.bao_cao_su_co');
    }

    public function create(Request $request)
    {
        dd($request);
    }
}