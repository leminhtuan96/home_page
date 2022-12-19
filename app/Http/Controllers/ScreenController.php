<?php

namespace App\Http\Controllers;

use App\Repositories\ScreenRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScreenController extends Controller
{
    public $ScreenRepository;

    public function __construct(ScreenRepository $ScreenRepository)
    {
        $this->ScreenRepository = $ScreenRepository;
    }

    public function index()
    {
        $screens = DB::table("screen")->paginate(4);
        return view("screen", compact("screens"));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "file" => "required",
            "name" => "required",
        ], [
            'file.required' => 'không được để trống',
            'name.required' => 'không được để trống',
        ]);

        $this->ScreenRepository->store($request, $validate);
        return redirect()->route('index');
    }

    public function search(Request $request){
        $search = $request->input('search');
        $screen = DB::table('screen')->query()
            ->orderByDesc('screen.id')
            ->select("screen.*")
            ->where('rooms.name','LIKE',"%{$search}%")->get();
        return view("index", compact("screen"));
    }

}
