<?php

class HomeController {
    public function index() {
        include 'Views/Home.PHP';
    }

    public function index2() {
        include 'Views/Pelanggan/HomePelanggan.PHP';
    }
    public function index3() {
        include 'Views/Admin/HomeAdmin.PHP';
    }
}
