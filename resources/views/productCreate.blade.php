<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
</head>

<body>
@include('components.header')
@include('components.sidebar')

<main id="main" class="main">

    <div class="pageTitle">
        <h1>Product Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active"><a href="{{ route("products.index") }}">List Product</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Product</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
                            @csrf
                            @if (isset($product))
                                @method('PUT')
                            @endif
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-5">
                                    <input type="text" name="name" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-5">
                                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', isset($product) ? $product->quantity : '') }}" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-5">
                                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price', isset($product) ? $product->price : '') }}"
                                           placeholder="Enter price" min="0" step="0.1" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-5">
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-5 mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@include('components.footer')
@include('components.scripts')
</body>

</html>
