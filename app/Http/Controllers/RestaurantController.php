<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('type', 'asc') -> paginate(10)->withQueryString();

        $dir = 'asc';
        $sort = 'type';
        $defaultMaster = 0;
        $masters = Master::all();
        $s = '';


        // Rušiavimas

        // pabaigti šią dalį

        if ($request -> sort_by && $request -> dir) {
            if ('type'== $request -> sort_by && 'asc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('type') -> paginate(10)->withQueryString();
            } elseif ('type'== $request -> sort_by && 'desc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('type', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
            } elseif ('size'== $request -> sort_by && 'asc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('size') -> paginate(10)->withQueryString();
                $sort = 'size';
            } elseif ('size'== $request -> sort_by && 'desc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('size', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
                $sort = 'size';
            } else {
                $restaurant = Restaurant::paginate(10)->withQueryString();
            }
        }

        // Filtravimas

        elseif ($request -> master_id) {
            $restaurants = Restaurant::where('master_id', (int)$request -> master_id) -> paginate(10)->withQueryString();
            $defaultMaster = (int)$request -> master_id;
        }

        // Paieška

        elseif ($request -> s) {
            $restaurants = Restaurant::where('type', 'like', '%'.$request -> s.'%') -> paginate(10)->withQueryString();
            $s = $request -> s;
        } elseif ($request -> do_search) {
            $restaurants = Restaurant::where('type', 'like', '') -> paginate(10)->withQueryString();
        } else {
            $restaurants = Restaurant::paginate(10)->withQueryString();
        }

        return view('restaurant.index', [
            'restaurants' => $restaurants,
            'dir' => $dir,
            'sort' => $sort,
            'masters' => $masters,
            'defaultMaster' => $defaultMaster,
            's' => $s
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('restaurant.create', ['menus' => $menus]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employess = $request->restaurant_employess;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = Menu::all();
        return view('restaurant.edit', ['restaurant' => $restaurant, 'menus' => $menus]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employess = $request->restaurant_employess;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index');

    }
}
