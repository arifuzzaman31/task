<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Jobs\NewProductEmail;
use App\Events\ProductPurchased;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $productRepo;
    public function __construct(ProductRepository $pro)
    {
        $this->productRepo = $pro;
        $this->middleware('checkAdmin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return \Auth::user()->role;
        $products = $this->productRepo->getAll(12);
        return view("pages.product.product", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create_product', ['categories' => $categories]);
    }

    public function productPurchase(Request $request, $productId)
    {
        $product = Product::find($productId);
        if ($product->quantity < 1) {
            return redirect()->back()->with('success', 'Product Stock OUT.');
        }
        event(new ProductPurchased($product));
        return redirect()->back()->with('success', 'Product Purchase successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'category' => 'required'
        ]);
        $productData = $this->productRepo->makeData($request->all());
        $product = Product::create($productData);
        NewProductEmail::dispatch($product);
        return redirect()->back()->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv',
        ]);

        $file = $request->file('file');

        Excel::import(new ProductsImport, $file);

        return redirect()->back()->with('success', 'Products imported successfully.');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.csv');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.product.edit_product', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'category' => 'required'
        ]);
        try {
            $productData = $this->productRepo->makeData($request->all());
            Product::where("id", $product->id)
                ->update($productData);
            return redirect()->back()->with('success', 'Product Update Successfully.');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}