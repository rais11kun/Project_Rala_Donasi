<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Schema;
class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }

    public function boot()
    {
    // Tambahkan ini jika menggunakan MySQL untuk mengabaikan error constraint saat migrasi
    Schema::disableForeignKeyConstraints();
    }
}
