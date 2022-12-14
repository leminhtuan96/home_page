<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScreenController extends Controller
{
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
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs("images", $fileName, "public");
        } else {
            $path = "images/anh.jpg";
        }
        $request->validate([
            "file" => "required",
            "name" => "required",
        ], [
            'file.required' => 'không được để trống',
            'name.required' => 'không được để trống',
        ]);

        $screen =[
            'file'=>$path ?: null,
            'name'=>$request->name,
        ];
        DB::table('screen')->insert($screen);
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
