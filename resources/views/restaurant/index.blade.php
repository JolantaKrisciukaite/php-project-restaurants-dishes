@foreach ($restaurants as $restaurant)
  <a href="{{route('restaurant.edit',[$restaurant])}}">
    {{$restaurant->title}}
    {{$restaurant->customers}}
    {{$restaurant->employess}}
  </a>
  <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach

@foreach ($menus as $menu)
  <a href="{{route('menu.edit',[$menu])}}">
    <span>
        {{$menu->title}} 
        {{$menu->price}} 
        {{$menu->weight}}
        {{$menu->meat}} 
        {{$menu->about}}
    </span>
 </a>
  <form method="POST" action="{{route('menu.destroy', [$menu])}}">
   @csrf
   <a href="{{route('restaurant.edit',[$better])}}">Edit</a>
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach


