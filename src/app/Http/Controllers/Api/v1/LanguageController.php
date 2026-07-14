<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Language\LanguageResource;
use App\Models\Language;

class LanguageController extends Controller
{
    //
    public function index()
    {
        return LanguageResource::collection(
            Language::all()
        );
    }
}
