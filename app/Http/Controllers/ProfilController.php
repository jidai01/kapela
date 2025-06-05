<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sejarah()
    {
        $title = "Sejarah";
        $content = "Kapela Santo Agustinus Bello merupakan salah satu gereja Katolik tertua di Kota Kupang yang didirikan pada tahun 1947, dan kini menjadi stasi dari Paroki St. Fransiskus dari Assisi BTN Kolhua. Kapela ini menjadi cikal bakal pertumbuhan umat Katolik di Kupang, dimulai dari ibadah sederhana di rumah warga, lalu berkembang menjadi tempat ibadah darurat hingga berdiri kapela permanen. Awalnya hanya terdiri dari dua Kelompok Umat Basis (KUB), jumlahnya terus meningkat seiring dengan pertumbuhan umat hingga pada tahun 2025 telah mencapai 18 KUB yang tersebar dalam 9 wilayah, dengan jumlah umat sekitar 2.335 jiwa. Karena kapasitas kapela yang tidak lagi mencukupi, perluasan bangunan telah dilakukan tiga kali. Akhirnya, disepakati pembangunan kapela pendukung, dan peletakan batu pertamanya dilakukan oleh Uskup Agung Kupang, Mgr. Petrus Turang, pada 22 Januari 2017.";
        return view('view-umum/profil/sejarah', compact('title', 'content'));
    }
    public function organisasi()
    {
        $title = "Struktur Organisasi";
        return view('view-umum/profil/organisasi', compact('title', 'content'));
    }
}
