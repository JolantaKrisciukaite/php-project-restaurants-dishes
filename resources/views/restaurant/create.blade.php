<form method="POST" action="{{route('restaurant.store')}}">
    Title: <input type="text" name="restaurant_title">
    Customers: <input type="text" name="restaurant_isbn">
    Employess: <input type="text" name="restaurant_pages">
    <select name="menu_id">
        @foreach ($menus as $menu)
            <option value="{{$menu->id}}">{{$menu->name}} {{$menu->surname}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>
