<form method="POST" action="{{route('restaurant.store')}}">
    Title: <input type="text" name="restaurant_title">
    Customers: <input type="text" name="restaurant_customers">
    Employess: <input type="text" name="restaurant_employess">
    <select name="menu_id">
        @foreach ($menus as $menu)
            <option value="{{$menu->id}}">
                {{$menu->title}} 
                {{$menu->price}} 
                {{$menu->weight}}
                {{$menu->meat}} 
                {{$menu->about}}
            </option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>

 @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new restaurant</div>

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

