@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="titleRestaurants">Menus</h3>

                        <div>

                            <form action="{{ route('menu.index') }}" method="get" class="sort-form">
                                <fieldset>
                                    <legend>Sort by</legend>
                                    <div>
                                        <label>Price</label>
                                        <input type="radio" name="sort_by" value="price" @if ('price' == $sort) checked @endif>
                                        <label>Title</label>
                                        <input type="radio" name="sort_by" value="title" @if ('title' == $sort) checked @endif>
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
                                <a href="{{ route('menu.index') }}" class="aButton">Clear</button></a>
                            </form>

                        </div>
                    </div>

                    <div class="pager-links">
                        {{ $menus->links() }}
                    </div>
                    
                    <div class="card-body">

                        @foreach ($menus as $menu)

                        <div class="photo"> 
                            @if ($menu->photo)
                            <img src="{{$menu->photo}}">
                            @else
                            <img src="{{asset('noImage.jpg')}}">
                            @endif
                        </div>

                            <div class="index">Meal title: {{ $menu->title }}</div>
                            <div class="index">Price: {{ $menu->price }} €</div>
                            <div class="index">Portion weight: {{ $menu->weight }} g</div>
                            <div class="index">Amount of meat: {{ $menu->meat }} g</div>
                            <div class="index">About: {!! $menu->about !!}</div>

                            <form method="POST" action="{{ route('menu.destroy', $menu) }}">
                                <a href="{{ route('menu.edit', [$menu]) }}" class="editButton">Edit</a>
                                @csrf
                                <button class="deleteButton" type="submit">Delete</button>
                            </form>
                            <br>
                        @endforeach

                    </div>
                    <div class="pager-links">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
