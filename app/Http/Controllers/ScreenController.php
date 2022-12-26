<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScreenRecordRequest;
use App\Repositories\ScreenRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ScreenController extends Controller
{
    public $screenRepository;

    public function __construct(ScreenRepository $screenRepository)
    {
        $this->screenRepository = $screenRepository;
    }

    public function index(Request $request)
    {
        $search = $request['search']??"";
        // if ($search != "")
        // {
        //     $screenRecords = $this->screenRepository->where('name','=',$search)->get();
        // }
        // else{
        // }
        $screen = $this->screenRepository;
        $screenRecords = $screen->getAll();

        return view("screen", compact("screenRecords"));
    }

    public function create()
    {
        return view('create');
    }

    public function store(ScreenRecordRequest $request)
    {
        $disk = Storage::disk('public');
        $data = [];
        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $filePath = $disk->putFileAs('screenRecords', $request->file('file'), $fileName);
            $data = [
                'name' => $request['name'],
                'file' => $filePath
            ];
        }

        $this->screenRepository->store($data);

        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $screen = DB::table('screen')->query()
            ->orderByDesc('screen.id')
            ->select("screen.*")
            ->where('screen.name','LIKE',"%{$search}%")->get();
        return view("index", compact("screen"));
    }

}
