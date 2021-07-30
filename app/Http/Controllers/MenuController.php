<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        $validator = Validator::make($request->all(),
        [
            'menu_title' => ['required', 'min:3', 'max:200', 'alpha'],
            'menu_price' => ['required', 'decimal:6,2'],
            'menu_weight' => ['required'],
            'menu_meat' => ['required'],
            'menu_about' => ['required']
        ],
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        // elseif ($request->runs < $request->wins){
        //     return redirect()->back()->with('info_message', 'Menu wins couldn\'t\ be greater then menu runs.');
        // }

        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'New Menu created successfully.');
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

        $validator = Validator::make($request->all(),
        [
            'menu_title' => ['required', 'min:3', 'max:200', 'alpha'],
            'menu_price' => ['required', 'decimal'],
            'menu_weight' => ['required'],
            'menu_meat' => ['required'],
            'menu_about' => ['required']
        ],

        [
            'menu_title.min' => 'menu title needs min. 3 symbols.',
            'menu_title.max' => 'menu title needs max. 200 symbols.',
            // 'menu_price.decimal' => 'menu price needs number per decimal point'
        ]
            
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Menu updated successfully');

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
            return redirect()->route('menu.index')->with('info_message', 'Couldn\'t delete - Restaurant has a Menu');
        }
        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Menu deleted successfully.');
    }
}
