<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Category Tables - NiceAdmin Bootstrap Template</title>
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

    <div class="pagetitle">
        <h1>Category Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Category Add</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="center">
                <div class="card">
                    <div class="card-body" style="margin: 5px 40px">
                        <h5 class="card-title">List Category</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <!-- Update Button -->
                                    <td>
                                        <form action="{{ route('categories.edit', $category->id) }}" method="GET">
                                            <button type="submit" class="btn btn-warning mb-2">
                                                Update <span class="badge bg-white text-warning"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-2">Delete
                                                <span class="badge bg-white text-danger"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
