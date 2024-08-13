<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Receipt;
use App\Models\BasketAndCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function addToBasket(Request $request, $car_id)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil atau buat keranjang (basket) untuk user
        $basket = $user->baskets()->firstOrCreate(['user_id' => $user->id]);

        // Tambahkan mobil ke dalam keranjang (pivot table basketandcar)
        $basket->cars()->attach($car_id);

        // Redirect atau kirim response sukses
        return redirect()->back()->with('success', 'Mobil berhasil ditambahkan ke keranjang.');
    }
    public function basketUser()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data keranjang berdasarkan user_id
        $baskets = Basket::with('cars')->where('user_id', $user->id)->get();

        // Kirim data keranjang ke view
        return view('basketUser', ['baskets' => $baskets]);
    }
   
    public function buyAllCars($id)
{
    // Ambil user yang sedang login
    $user = Auth::user();

    // Ambil keranjang berdasarkan ID dan user yang sedang login
    $basket = Basket::with('cars')->where('id', $id)->where('user_id', $user->id)->firstOrFail();

    // Pastikan keranjang tidak kosong
    if ($basket->cars->isEmpty()) {
        return redirect()->route('basketUser')->with('error', 'Keranjang kosong.');
    }

    // Simpan data pembelian untuk setiap mobil dalam keranjang
    foreach ($basket->cars as $car) {
        // Buat deskripsi atau data lain yang ingin disimpan
        $deskripsi = "Pembelian mobil: " . $car->name;

        // Simpan data ke tabel receipts
        Receipt::create([
            'basket_id' => $basket->id,
            'deskripsi' => $deskripsi,
        ]);
    }

    $basket->cars()->detach();
    return redirect('basketUser')->with('success', 'Semua mobil dalam keranjang berhasil dibeli dan dihapus dari keranjang.');
    }
    
    public function deleteCarFromBasket($basketId, $carId)
    {

        BasketAndCar::where('basket_id', $basketId)->where('car_id', $carId)->delete();
    
        return redirect('basketUser')->with('success', 'Mobil dari keranjang sukses dihapus');
    }
    



}
