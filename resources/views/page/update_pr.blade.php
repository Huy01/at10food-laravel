<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
    <form action="{{route('foods.store')}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
            <p>← Quay lại <a href="{{route('trang_chu')}}">trang chủ</a></p>
            <h1>{{$pageName}}</h1>
        <div class="form_control">
            @foreach($type_pr as $ty_pr)
                <input type="hidden" name="id_type" value="{{$ty_pr->id}}">
            @endforeach
            <small></small>
            <span></span>
        </div>
        <div class="form_control">
            <input id="description" name="name" type="text" placeholder="{{$products->name}}">
            <small></small>
            <span></span>
        </div>
        <div class="form_control">
            <input id="description" name="description" type="text" placeholder="{{$products->description}}">
            <small></small>
            <span></span>
        </div>
        <div class="form_control">
            <input id="description" name="unit_price" type="text" placeholder="{{$products->unit_price}}">
            <small></small>
            <span></span>
        </div>
    
        <div class="form_control">
            <input id="description" name="promotion_price" type="text" placeholder="{{$products->promotion_price}}">
            <small></small>
            <span></span>
        </div>
        <div class="form_control">
            <input id="description" name="unit" type="text" placeholder="{{$products->unit}}">
            <small></small>
            <span></span>
        </div>
        <div class="form_control">
            {{-- <label for="">Manufacturer</label> --}}
            @if(isset($type_pr))
                <select class="form-control" name="" id="">
                    @foreach($type_pr as $tpr)
                        <option value="{{$tpr->id}}">{{$tpr->name}}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="form_control">
            <input id="description" name="image" type="file" placeholder="Image">
            <small></small>
            <span></span>
        </div>
        <div class="button">
            <input class="btn" type="submit" name="btn" id="btn" value="Add">    
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>