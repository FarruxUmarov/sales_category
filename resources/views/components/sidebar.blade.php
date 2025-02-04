<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if (url()->current() == route('home')) active @else collapsed @endif" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link @if(url()->current() == route('categories.index')) active @else collapsed @endif" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <i class="bi bi-circle">
                        </i><span>Category</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Category Nav -->

        <li class="nav-item">
            <a class="nav-link @if (url()->current() == route('products.index')) active @else collapsed @endif" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link" href="{{ route('products.create') }}">
                        <i class="bi bi-circle">
                        </i><span>Add Products</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('products.index') }}">
                        <i class="bi bi-circle">
                        </i><span>Product List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Category Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sale-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Sale</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sales-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="sales-bootstrap.html">
                        <i class="bi bi-circle"></i><span>Bootstrap Sale</span>
                    </a>
                </li>
                <li>
                    <a href="sales-remix.html">
                        <i class="bi bi-circle"></i><span>Remix Sales</span>
                    </a>
                </li>
                <li>
                    <a href="Sales-boxicons.html">
                        <i class="bi bi-circle"></i><span>Sales</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Sales Nav -->
    </ul>

</aside><!-- End Sidebar-->
