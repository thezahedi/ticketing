<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => [
                'required',
            ],
            'content' => [
                'required',
            ],
        ]);
    }
}
