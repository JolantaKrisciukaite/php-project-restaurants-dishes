@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="titleMenus">Edit new menu</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('menu.update',$menu)}}" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="menu_title" class="form-control"
                                    value="{{ old('menu_title', $menu->title) }}">
                            </div>

                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" name="menu_price" class="form-control"
                                    value="{{ old('menu_price', $menu->price) }} ">
                            </div>

                            <div class="form-group">
                                <label>Weight:</label>
                                <input type="text" name="menu_weight" class="form-control"
                                    value="{{ old('menu_weight', $menu->weight) }}">
                            </div>

                            <div class="form-group">
                                <label>Meat:</label>
                                <input type="text" name="menu_meat" class="form-control"
                                    value="{{ old('menu_meat', $menu->meat) }}">
                            </div>

                            <div class="form-group">
                                <div class="small-photo">
                                     @if($menu->photo)
                                         <img src="{{$menu->photo}}">
                                         <label>Delete photo</label>
                                         <input type="checkbox" name="delete_menu_photo">
                                     @else
                                          <img src="{{asset('noImage.jpg')}}">
                                     @endif
                                     <p class>Photo:</p>
                                     <input type="file" name="menu_photo">
                                 </div>
                             </div>

                            <div class="form-group">
                                <label>About:</label>
                                <textarea id="summernote" type="text" name="menu_about" class="form-control"
                                    value="{{ old('menu_about', $menu->about) }}">{{$menu->about}}</textarea>
                            </div>

                            @csrf
                            <button class="editButton" type="submit">Edit</button>
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
