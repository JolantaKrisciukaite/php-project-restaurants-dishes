@foreach ($menus as $menu)
  {{$menu->title}} 
  {{$menu->price}} 
  {{$menu->weight}}
  {{$menu->meat}} 
  {{$menu->about}}
  <br>
@endforeach
