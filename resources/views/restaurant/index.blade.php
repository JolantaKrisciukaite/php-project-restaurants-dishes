@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                 
                      <h3 class="title">Restaurants</h3>
                      <form action="{{ route('restaurant.index') }}" method="get" class="sort-form">
                          <fieldset>
                              <legend>Sort by</legend>
                              <div>
                                  <label>Type</label>
                                  <input type="radio" name="sort_by" value="type" @if ('type' == $sort) checked @endif>
                                  <label>Size</label>
                                  <input type="radio" name="sort_by" value="size" @if ('size' == $sort) checked @endif>
                              </div>
                          </fieldset>

                            <fieldset>
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
                            <fieldset class="fieldset">
                                <legend>Filter by</legend>
                                <select class="index" name="menu_id"><br>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}" @if($defaultMenu == $menu->id) selected @endif>
                                            {{$menu->title}} 
                                            {{$menu->price}} 
                                            {{$menu->weight}}
                                            {{$menu->meat}} 
                                            {{$menu->about}}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <button class="addButtonCreate" type="submit">Filter</button>
                            <a href="{{ route('restaurant.index') }}" class="aButton">Clear</button></a>
                        </form>

                        <form action="{{ route('restaurant.index') }}" method="get" class="sort-form">
                            <fieldset class="fieldset">
                                <legend>Search by</legend>
                                <input placeholder="Serach by type" type="text" class="index" name="s" value="{{$s}}">
                            </fieldset>
                            <button class="addButtonCreate" type="submit" name="do_search" value="1">Type</button>
                            <a href="{{ route('restaurant.index') }}" class="aButton">Clear</button></a>
                        </form>

                    </div>

                <div class="pager-links">
                {{ $restaurants->links() }}
                </div>

                    <div class="card-body">

                        @forelse ($restaurants as $restaurant)
                            <div class="index">Restaurant: {{ $restaurant->type }}</div>
                            <div class="index">Restaurant customers: {{ $restaurant->customers }}</div>
                            <div class="index">Menu: 
                                {{ $restaurant->restaurantMenu->title }}
                                {{ $restaurant->restaurantMenu->price }}
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

