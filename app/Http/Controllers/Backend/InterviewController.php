<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Auth;
class InterviewController extends Controller
{
    public function interview(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.employee.interview.list',$data);
    }
}