<form method="POST" action="{{route('menu.store')}}">
    Title: <input type="text" name="menu_title">
    Price: <input type="text" name="menu_price">
    Weight: <input type="text" name="menu_weight">
    Meat: <input type="text" name="menu_meat">
    About: <input type="text" name="menu_about">
    @csrf
    <button type="submit">ADD</button>
 </form>
 