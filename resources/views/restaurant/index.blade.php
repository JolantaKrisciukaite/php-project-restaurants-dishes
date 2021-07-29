@foreach ($restaurants as $restaurant)
  <a href="{{route('restaurant.edit',[$restaurant])}}">
    {{$restaurant->title}}
    {{$restaurant->customers}}
    {{$restaurant->employess}}
  </a>
  <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
   @csrf
   <a href="{{route('restaurant.edit',[$restaurant])}}">Edit</a>
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach



