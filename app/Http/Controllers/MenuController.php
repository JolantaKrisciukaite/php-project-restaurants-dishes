<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', ['menus' => $menus]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->menuRestaurant->count()){
            return 'Couldn\'\t delete - restaurant has day menu.';
        }
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
