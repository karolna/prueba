<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
