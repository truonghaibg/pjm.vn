<?php

namespace App\Http\Controllers;

use App\News;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layout.dashboard');
    }

    public function getDashboard()
    {
        $totalOfProduct = Product::all()->count();
        $totalOfProductActive = Product::where('status', '!=', 0)->count();
        $totalOfProductInActive = Product::where('status', 0)->count();

        $product['total'] = $totalOfProduct;
        $product['active'] = $totalOfProductActive;
        $product['inactive'] = $totalOfProductInActive;
        $product['link'] = 'admin/product';

        $news['total'] = News::all()->count();
        $news['active'] = News::where('status', '!=', 0)->count();
        $news['inactive'] = News::where('status', 0)->count();
        $news['link'] = 'admin/news';

        return view('admin.layout.dashboard', [
            "product" => $product,
            "news" => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
