@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                 
                      <h3 class="titleRestaurants">Restaurants</h3>
         
                      <div>
                        <form action="{{ route('restaurant.index') }}" method="get" class="sort-form">
                            <fieldset>
                                <legend>Sort by</legend>
                                <div>
                                    <label>Title</label>
                                    <input type="radio" name="sort_by" value="title" @if ('title' == $sort) checked @endif>
                                    <label>Customers space</label>
                                    <input type="radio" name="sort_by" value="customers" @if ('customers' == $sort) checked @endif>
                                </div>
                            </fieldset>

                                <fieldset class="direction">
                                    <legend>Direction</legend>
                                    <div>
                                        <label>Asc</label>
                                        <input type="radio" name="dir" value="asc" @if ('asc' == $dir) checked @endif>
                                        <label>Dsc</label>
                                        <input type="radio" name="dir" value="desc" @if ('desc' == $dir) checked @endif>
                                    </div>
                                </fieldset>
                                <button class="addButtonCreate" type="submit">Sort</button>
                                <a href="{{ route('restaurant.index') }}" class="aButton">Clear</button></a>
                            </form>

                            <form action="{{ route('restaurant.index') }}" method="get" class="sort-form">
                                <fieldset class="filterBy">
                                    <legend>Filter by</legend>
                                    <select class="index" name="menu_id"><br>
                                        @foreach ($menus as $menu)
                                            <option value="{{ $menu->id }}" @if($defaultMenu == $menu->id) selected @endif>
                                                Title: {{$menu->title}} 
                                            </option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <button class="addButtonCreate" type="submit">Filter</button>
                                <a href="{{ route('restaurant.index') }}" class="aButton">Clear</button></a>
                            </form>

                            <form action="{{ route('restaurant.index') }}" method="get" class="sort-form">
                                <fieldset class="searchBy">
                                    <legend>Search by</legend>
                                    <input placeholder="Serach by type" type="text" class="index" name="s" value="{{$s}}">
                                </fieldset>
                                <button class="addButtonCreate" type="submit" name="do_search" value="1">Type</button>
                                <a href="{{ route('restaurant.index') }}" class="aButton">Clear</button></a>
                            </form>
                        </div>
                    </div>

                <div class="pager-links">
                {{ $restaurants->links() }}
                </div>

                    <div class="card-body">

                        @forelse ($restaurants as $restaurant)
                            <div class="index">Restaurant: {{ $restaurant->title }}</div>
                            <div class="index">Restaurant customers: {{ $restaurant->customers }}</div>
                            <div class="index">Menu: 
                                {{ $restaurant->restaurantMenu->title }}
                                ({{ $restaurant->restaurantMenu->price }} €)
                            </div>
                            <form method="POST" action="{{ route('restaurant.destroy', [$restaurant]) }}">
                                <a href="{{ route('restaurant.edit', [$restaurant]) }}" class="editButton">Edit</a>
                                @csrf
                                <button class="deleteButton" type="submit">Delete</button>
                            </form><br>

                            @empty 
                            <h3 class="title">No Results 😛</h3>
                        @endforelse

                    </div>
                <div class="pager-links">
                {{ $restaurants->links() }}
            </div>
        </div>
    </div>
@endsection

