@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
           <div class="card">
               <div class="card-header">Edit new restaurant</div>

               <div class="card-body">
                <form method="POST" action="{{route('restaurant.update',[$restaurant])}}">

                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="restaurant_title" class="form-control" value="{{old('restaurant_title', $restaurant->title)}}">
                    </div>

                    <div class="form-group">
                        <label>Customers:</label>
                        <input type="text" name="restaurant_customers" class="form-control" value="{{old('restaurant_customers', $restaurant->customers)}}">
                    </div>

                    <div class="form-group">
                        <label>Employess:</label>
                        <input type="text" name="restaurant_employess" class="form-control" value="{{old('restaurant_employess', $restaurant->employess)}}">
                    </div>

                    @csrf
                    <button class="editButton" type="submit">Edit</button>
                </form>
                
               </div>
           </div>
       </div>
   </div>
</div>

    
@endsection




