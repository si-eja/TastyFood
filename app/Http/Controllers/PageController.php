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
    public function admin() {
        return view("admin.dashadm");
    }
    public function adminBerita() {
        return view("admin.berita");
    }
    public function adminGaleri() {
        return view("admin.galeri");
    }
    public function adminKontak() {
        return view("admin.kontak");
    }
    public function adminTentang() {
        return view("admin.tentang");
    }
    public function Adetberita() {
        return view("admin.detber");
    }
    public function login() {
        return view("login.login");
    }
    public function detberita() {
        return view("detber");
    }
}
