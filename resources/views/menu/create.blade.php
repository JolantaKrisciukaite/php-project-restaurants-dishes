@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">

                    <h3 class="titleMenus">Create new menu</h3>
                   
                    <div class="card-body">
                        <form method="POST" action="{{ route('menu.store') }}">

                            <div class="form-group">
                                <label>Title:</label>
                                <input placeholder="Enter menu title" type="text" name="menu_title" class="form-control"
                                    value="{{ old('menu_title') }}">
                            </div>

                            <div class="form-group">
                                <label>Price:</label>
                                <input placeholder="Enter info about portion price" type="text" name="menu_price"
                                    class="form-control" value="{{ old('menu_price') }}">
                            </div>

                            <div class="form-group">
                                <label>Weight:</label>
                                <input placeholder="Enter info about grams of portion" type="text" name="menu_weight"
                                    class="form-control" value="{{ old('menu_weight') }}">
                            </div>

                            <div class="form-group">
                                <label>Meat:</label>
                                <input placeholder="Enter the amount of meat" type="text"
                                    name="menu_meat" class="form-control" value="{{ old('menu_meat') }}">
                            </div>

                            <div class="form-group">
                                <label>About:</label>
                                <textarea id="summernote" placeholder="Enter info about menu" type="text"
                                    name="menu_about" class="form-control" value="{{ old('menu_about') }}"></textarea>
                            </div>

                            @csrf
                            <button class="addButton" type="submit">Add</button>
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
 