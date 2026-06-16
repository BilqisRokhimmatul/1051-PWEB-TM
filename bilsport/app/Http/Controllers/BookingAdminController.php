<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    public function index()
    {
        // Mengarah ke resources/views/booking-admin/index.blade.php
        return view('booking-admin.index'); 
    }
}
