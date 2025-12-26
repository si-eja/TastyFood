<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home() {
        return view("home");
    }
    public function berita() {
        return view("berita");
    }
    public function galeri() {
        return view("galeri");
    }
    public function kontak() {
        return view("kontak"); 
    }
    public function tentang() {
        return view("tentang");
    }
}
