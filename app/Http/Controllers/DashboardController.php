<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Condition;
use App\Models\Image;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{

    return view('dashboard');
}  
public function listCar()
{
    // Eager load the 'brand' and 'condition' relationships
    $cars = Car::with(['brand', 'condition'])->get();
    return view('list-car', ['cars' => $cars]);
} 
    public function listConditions()
{
$condition = Condition::all();
    return view('list-conditions', ['condition'=>$condition]);
}  
    public function addCondition()
{
    return view('addCondition');
}  
public function addCar()
{
    $brands = Brand::all();
    $conditions = Condition::all();
    return view('addCar', ['brands' => $brands, 'conditions' => $conditions]);
}

    public function rilAddCar(Request $request)

{
  // Validate the request
  $validated = $request->validate([
    'brand_id' => 'required|exists:brands,id',
    'condition_id' => 'required|exists:conditions,id',
    'name' => 'required|string|max:255',
    'mesin' => 'required|string|max:255',
    'bahan_bakar' => 'required|string|max:255',
    'transmisi' => 'required|string|max:255',
    'harga' => 'required|numeric',
]);

// Create a new Car instance and save it
Car::create($validated);

// Redirect with success message
return redirect('list-car')->with('success', 'Car berhasil ditambahkan');
}  
    public function addImage()
{
     // Ambil semua mobil
     $cars = Car::all();
    return view('addImage',['cars'=>$cars]);
}   
public function rilAddImage(Request $request)
{
    $validated = $request->validate([
        'car_id' => 'required|exists:cars,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $newName = '';
    if ($request->file('image')) {
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = 'image-'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('name', $newName); // Store in the 'images' directory
    }

    // Prepare the data for saving
    $data = [
        'car_id' => $request->car_id,
        'image' => $newName,
    ];
// masukan ke database
$request['name'] = $newName;
    // Insert into the database
    $image = Image::create($request->all());

    return redirect('list-images')->with('success', 'Menambah brand baru sukses');
}




// ///////
public function listImages()
{
    // Eager load the 'car' relationship
    $image = Image::with('car')->get();
    return view('listImages', ['image' => $image]);
}

    public function addBrand()
{
    return view('addBrand');
}  
    public function listBrands()
{
    $brand = Brand::all();
    return view('listBrands',['brand'=>$brand]);
}  
public function deleteBrand($id)
{

    $brand = Brand::where('id',$id)->first();

    return view('deleteBrand',['brand'=>$brand]);
}



public function deletedBrand($id)
{
    // Temukan merek (brand) yang akan dihapus
    $brand = Brand::findOrFail($id);

    // Temukan dan hapus semua data terkait di tabel cars
    Car::where('brand_id', $id)->delete();

    // Hapus merek (brand)
    $brand->delete();

    // Redirect atau menampilkan pesan setelah penghapusan
    return redirect("listBrands")->with('success', 'Data berhasil dihapus!');
}
public function deleteImage($id)
{
    // Temukan merek (brand) yang akan dihapus
    $image = Image::findOrFail($id);

    // Temukan dan hapus semua data terkait di tabel cars
    Image::where('car_id', $id)->delete();

    // Hapus merek (brand)
    $image->delete();

    // Redirect atau menampilkan pesan setelah penghapusan
    return redirect("list-images")->with('success', 'Data berhasil dihapus!');
}




public function rilAddCondition(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required',
    ]);


    Condition::create($validatedData);

    // Redirect atau menampilkan view setelah data disimpan
    return redirect("list-conditions")->with('success', 'Data berhasil disimpan!');
}
public function rilAddBrand(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $newName = '';
if($request->file('image')){
$extension = $request->file('image')->getClientOriginalExtension();
$newName = $request->name.'-'.now()->timestamp.'.'.$extension;
$request->file('image')->storeAs('cover',$newName);

}
// masukan ke database
$request['cover'] = $newName;

    $brand = Brand::create($request->all());
    return redirect('listBrands')->with('success', 'menambah brand baru sukses');  
     
}
public function deleteCondition($id)
{
    // Cari data kondisi berdasarkan ID
    $condition = Condition::findOrFail($id);
    
    // Dapatkan semua mobil yang terkait dengan kondisi ini
    $cars = Car::where('condition_id', $id)->get();

    // Hapus semua gambar yang terkait dengan mobil-mobil tersebut
    foreach ($cars as $car) {
        Image::where('car_id', $car->id)->delete();
    }

    // Hapus semua mobil yang terkait dengan kondisi ini
    Car::where('condition_id', $id)->delete();

    // Hapus data kondisi
    $condition->delete();

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data berhasil dihapus!');
}


}
