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
        <h1 class="mt-5 mb-4">Create a product</h1>
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
        <form method="post" action="{{route('product.store')}}">
            @csrf
            @method('post')
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" />
            </div>
            <div class="form-group">
                <label>Qty</label>
                <input type="text" class="form-control" name="qty" placeholder="Qty" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" />
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Save a New Product</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>