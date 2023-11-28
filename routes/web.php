<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('home');
Route::view('/add-product', 'add-product')->name('add_product_view');

Route::get('/products', function (Request $request) {
    $products = Product::where('added_by', $request->user()->id)->get();
    return view('products', compact('products'));
})->name('products_view');

Route::delete('/products/{id}', function (int $id) {
    Product::whereId($id)->delete();
    return redirect()->back()->with('success', 'Product removed successfully.');
})->name('remove_product');

Route::put('/products/{id}', function (Request $request, int $id) {
    $product = Product::whereId($id)->first();
    if ($request->query('action') === 'decrement') {
        if ($product->quantity >= 1)
            Product::whereId($id)->update([
                'quantity' => $product->quantity - 1
            ]);
        else
            return redirect()->back()->withInput()->withErrors(['quantity.*' => 'Invalid quantity.']);
    } else if ($request->query('action') === 'increment')
        Product::whereId($id)->update([
            'quantity' => $product->quantity + 1
        ]);
    else if ($request->query('action') === 'update_price') {
        $validator = Validator::make($request->all(), [
            'price.*' => 'required|numeric|gte:1'
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        Product::whereId($id)->update([
            'price' => $request->price
        ]);
    } else {
        $validator = Validator::make($request->all(), [
            'quantity.*' => 'required|numeric|gte:1'
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        Product::whereId($id)->update([
            'quantity' => $request->quantity
        ]);
    }
    return redirect()->back()->with('success', 'Quantity updated successfully.');
})->name('update_product');

Route::post('/add-product', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric'
    ]);

    if ($validator->fails())
        return redirect()->back()->withInput()->withErrors($validator);

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'added_by' => $request->user()->id
    ]);

    return redirect()->route('products_view')->with('success', 'Product added successfully.');
})->name('add_product');
