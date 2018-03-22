<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Image;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $product = Product::all();

        return view('backEnd.admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'category' => 'required', 'description' => 'required', 'stock' => 'required', 'deadline' => 'required', 'price' => 'required', ]);
       
        $input = $request->all();

        $product = Product::create($input);

        if ($request->hasFile('photo')) {
			$photo = $request->file('photo');
			$filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save(public_path('/uploads/' . $filename));
            $product->filename = $filename;
            $product->save();
        }

        Session::flash('message', 'Producto agregado.');
        Session::flash('status', 'success');

        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('backEnd.admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('backEnd.admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required', 'category' => 'required', 'description' => 'required', 'stock' => 'required', 'deadline' => 'required', 'price' => 'required', ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        Session::flash('message', 'Product updated!');
        Session::flash('status', 'success');

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        Session::flash('message', 'Product deleted!');
        Session::flash('status', 'success');

        return redirect('admin/product');
    }

}
