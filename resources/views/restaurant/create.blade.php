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

