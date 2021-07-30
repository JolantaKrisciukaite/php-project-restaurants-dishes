<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::orderBy('title', 'asc') -> paginate(10)->withQueryString();

        $dir = 'asc';
        $sort = 'title';
        $defaultMenu = 0;
        $menus = Menu::all();
        $s = '';

        // Rušiavimas

        // pabaigti šią dalį

        if ($request -> sort_by && $request -> dir) {

            if ('title'== $request -> sort_by && 'asc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('title') -> paginate(10)->withQueryString();
            } 
            
            elseif ('title'== $request -> sort_by && 'desc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('title', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
            } 
            
            elseif ('customers'== $request -> sort_by && 'asc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('customers') -> paginate(10)->withQueryString();
                $sort = 'customers';
            } 
            
            elseif ('customers'== $request -> sort_by && 'desc'== $request -> dir) {
                $restaurants = Restaurant::orderBy('customers', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
                $sort = 'customers';
            } 
            
            else {
                $restaurant = Restaurant::paginate(10)->withQueryString();
            }
        }

        // Filtravimas

        elseif ($request -> menu_id) {
            $restaurants = Restaurant::where('menu_id', (int)$request -> menu_id) -> paginate(10)->withQueryString();
            $defaultMaster = (int)$request -> menu_id;
        }

        // Paieška

        elseif ($request -> s) {
            $restaurants = Restaurant::where('title', 'like', '%'.$request -> s.'%') -> paginate(10)->withQueryString();
            $s = $request -> s;
        } 
        
        elseif ($request -> do_search) {
            $restaurants = Restaurant::where('title', 'like', '') -> paginate(10)->withQueryString();
        } 
        
        else {
            $restaurants = Restaurant::paginate(10)->withQueryString();
        }

        return view('restaurant.index', [
            'restaurants' => $restaurants,
            'dir' => $dir,
            'sort' => $sort,
            'menus' => $menus,
            'defaultMenu' => $defaultMenu,
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
        $validator = Validator::make($request->all(),
        [
            'restaurant_title' => ['required', 'min:3', 'max:200'],
            'restaurant_customers' => ['required', 'min:1', 'max:100'],
            'restaurant_employess' => ['required', 'min:1', 'max:100'],
            'restaurant_about' => ['required'],
            'menu_id' => ['required', 'integer', 'min:1']
        ],
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employess = $request->restaurant_employess;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'New Restaurant created.');
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
        $validator = Validator::make($request->all(),
        [
            'restaurant_title' => ['required', 'min:3', 'max:200'],
            'restaurant_customers' => ['required', 'min:1', 'max:100'],
            'restaurant_employess' => ['required', 'min:1', 'max:100'],
            'restaurant_about' => ['required'],
            'menu_id' => ['required', 'integer', 'min:1']
        ],
        
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employess = $request->restaurant_employess;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Restaurant updated successfully.');

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index')>with('success_message', 'Restaurant deleted successfully.');
    }
}
