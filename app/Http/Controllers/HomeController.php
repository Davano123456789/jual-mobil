<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua mobil dengan kondisi_id = 2 beserta relasi yang diperlukan
        $cars = Car::with(['brand', 'condition', 'image'])->where('condition_id', 2)->get();
        $carBekas = Car::with(['brand', 'condition', 'image'])->where('condition_id', 11)->get();
        $carBekasBagus = Car::with(['brand', 'condition', 'image'])->where('condition_id', 12)->get();
        $brand = Brand::all();
    
        // Mengirim data ke view
        return view('home', ['cars' => $cars, "carBekas"=>$carBekas,"carBekasBagus"=>$carBekasBagus,"brand"=>$brand]);
    }
    public function showCarNew(Request $request)
    {
        $query = $request->input('query');
    
        // Jika ada query, cari mobil berdasarkan nama
        if ($query) {
            $cars = Car::with(['condition', 'image'])
                ->where('condition_id', 2)
                ->where('name', 'LIKE', '%' . $query . '%')
                ->get();
        } else {
            // Mengambil semua mobil dengan condition_id = 2 beserta relasi yang diperlukan
            $cars = Car::with(['condition', 'image'])->where('condition_id', 2)->get();
        }
    
        // Mengirim data ke view
        return view('showCarNew', ['cars' => $cars]);
    }
    public function showCarBekas()
    {
        // Mengambil semua mobil dengan kondisi_id = 2 beserta relasi yang diperlukan
        $cars = Car::with(['condition', 'image'])->where('condition_id', 11)->get();
    
        // Mengirim data ke view
        return view('showCarBekas', ['cars' => $cars]);
    }
    public function showCarBaruBekas()
    {
        // Mengambil semua mobil dengan kondisi_id = 2 beserta relasi yang diperlukan
        $cars = Car::with(['condition', 'image'])->where('condition_id', 12)->get();
        
        // Mengirim data ke view
        return view('showCarBaruBekas', ['cars' => $cars]);
        }
    
        public function showAllCar(Request $request)
    {
        $query = $request->input('query');
    
        // Jika ada query, cari mobil berdasarkan nama
        if ($query) {
            $cars = Car::with(['condition', 'image'])
                ->where('name', 'LIKE', '%' . $query . '%')
                ->get();
        } else {
            // Mengambil semua mobil dengan kondisi_id = 2 beserta relasi yang diperlukan
            $cars = Car::with(['condition', 'image'])->get();
        }
    
        // Mengirim data ke view
        return view('showAllCar', ['cars' => $cars]);
    }
    
    
    public function showCarBrand($id)
    {
        // Mengambil semua mobil dengan kondisi_id = 2 beserta relasi yang diperlukan
        $cars = Car::with(['brand','image'])->where('brand_id', $id)->get();
    
        // Mengirim data ke view
        return view('showCarBrand', ['cars' => $cars]);
    }
    public function showCar($id)
    {
        // Mengambil semua mobil dengan kondisi_id = 2 beserta relasi yang diperlukan
        $cars = Car::with(['brand','image','condition'])->where('id', $id)->first();
    
        // Mengirim data ke view
        return view('showCar', ['cars' => $cars]);
    }
    
    
}
