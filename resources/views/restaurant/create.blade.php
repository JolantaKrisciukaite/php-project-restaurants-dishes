@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="titleMenus">Create new restaurant</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('restaurant.store') }}">

                            <div class="form-group">
                                <label>Title:</label>
                                <input placeholder="Enter restaurant title" type="text" name="restaurant_title" class="form-control"
                                    value="{{ old('restaurant_title') }}">
                            </div>

                            <div class="form-group">
                                <label>Customers:</label>
                                <input placeholder="Enter number of customers in the restaurant" type="text" name="restaurant_customers" class="form-control"
                                    value="{{ old('restaurant_customers') }}">
                            </div>

                            <div class="form-group">
                                <label>Employess:</label>
                                <input placeholder="Enter number of employess in the restaurant" type="text" name="restaurant_employess" class="form-control"
                                    value="{{ old('restaurant_employess') }}">
                            </div>

                            <select class="index" name="menu_id"><br>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">
                                        Title: {{$menu->title}} 🖐
                                        Price: {{$menu->price}} 💰
                                        Weight: {{$menu->weight}} ⌛
                                        Meat: {{$menu->meat}} 🍚
                                    </option>
                                @endforeach
                            </select>

                            @csrf
                            <button class="addButtonCreate" type="submit">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection

