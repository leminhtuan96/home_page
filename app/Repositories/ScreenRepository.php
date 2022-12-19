<?php

namespace App\Repositories;

use App\Models\Screen;

class ScreenRepository extends BaseRepository
{

    public function getModel()
    {
        return Screen::class;
    }

    public function store($request)
    {
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs("images", $fileName, "public");
        } else {
            $path = "images/anh.jpg";
        }


        $screen = new Screen();
        $screen->name = $request->name;
        $screen->file = $path;
        $screen->save();
    }

}
