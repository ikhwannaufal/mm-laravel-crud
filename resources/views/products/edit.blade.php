<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Edit a product</h1>
        <div class="mb-4"> 
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <form method="post" action="{{route('product.update', ['product' => $product])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$product->name}}"/>
            </div>
            <div class="form-group">
                <label>Qty</label>
                <input type="text" class="form-control" name="qty" placeholder="Qty" value="{{$product->qty}}"/>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" value="{{$product->price}}"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" value="{{$product->description}}"/>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>