@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
           <div class="card">
               <div class="titleMenus">Menus</div>

               <div class="card-body">

                    @foreach ($menus as $menu)
                    <div class="index">Meal title: {{$menu->title}}</div>
                    <div class="index">Price: {{$menu->price}} €</div>
                    <div class="index">Portion weight: {{$menu->weight}} g</div>
                    <div class="index">Amount of meat: {{$menu->meat}} g</div>
                    <div class="index">About: {{$menu->about}}</div>
               
                    <form method="POST" action="{{route('menu.destroy', $menu)}}">
                        <a href="{{route('menu.edit', [$menu])}}" class="editButton">Edit</a>
                    @csrf
                    <button class="deleteButton" type="submit">Delete</button>
                    </form>
                    <br>
                @endforeach
              
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
