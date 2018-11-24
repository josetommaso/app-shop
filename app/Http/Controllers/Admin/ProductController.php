<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
      $products = Product::paginate(10);
      return view('admin.products.index')->with(compact('products')); // listado
    }

    public function create() {
      return view('admin.products.create'); // formulario de registro
    }

    public function store(Request $request) {
      // validar
      $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el producto',
        'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
        'description.required' => 'Es necesario incluir una descripción para el producto',
        'description.max' => 'La descripción del producto NO debe contener mas de 200 caracteres',
        'price.required' => 'Es necesario ingresar un precio para el producto',
        'price.numeric' => 'El precio debe tener solo números',
        'price.min' => 'No se admiten valores negativos',
      ];
      $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'price' => 'required|numeric|min:0'

      ];
      $this->validate($request, $rules, $messages);
      // registrar el nuevo producto en la bd
      $product = new Product();
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->save(); // INSERT

      return redirect('/admin/products');
    }

    public function edit($id) {
      // return "Mostrar aquí el form de edición para el producto con id $id";
      $product = Product::find($id);
      return view('admin.products.edit')->with(compact('product')); // formulario de edición
    }

    public function update(Request $request, $id) {
      // validar
      $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el producto',
        'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
        'description.required' => 'Es necesario incluir una descripción para el producto',
        'description.max' => 'La descripción del producto NO debe contener mas de 200 caracteres',
        'price.required' => 'Es necesario ingresar un precio para el producto',
        'price.numeric' => 'El precio debe tener solo números',
        'price.min' => 'No se admiten valores negativos',
      ];
      $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'price' => 'required|numeric|min:0'

      ];
      $this->validate($request, $rules, $messages);

      // registrar el nuevo producto en la bd
      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->save(); // UPDATE

      return redirect('/admin/products');
    }
    public function destroy($id) {

      $product = Product::find($id);
      $product->delete(); // DELETE

      return back();
    }
}
