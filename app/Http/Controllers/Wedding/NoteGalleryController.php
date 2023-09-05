<?php

namespace App\Http\Controllers\Wedding;

use App\Models\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteGalleryController extends Controller
{
    public function index()
    {
        $data['guests'] = Guest::select('v_name', 'v_notes')->get();
        return view('gallery', $data);
    }
}
