@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Menus</div>

               <div class="card-body">
                @foreach ($menus as $menu)
                <div class="index">
                  {{$menu->title}} 
                  {{$menu->price}} 
                  {{$menu->weight}}
                  {{$menu->meat}} 
                  {{$menu->about}}
                </div>
                <form method="POST" action="{{route('menu.destroy', $menu)}}">
                    <a href="{{route('menu.edit',[$menu])}}" class="editButton">Edit</a>
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
