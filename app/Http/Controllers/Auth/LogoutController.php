<?php
/**
 * Created by: TriNQ
 * Date: 27-03-2018
 * Time: 8:40 AM
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller{


    public function logout(){
         Auth::logout();
         return redirect(url('/'));
    }
}