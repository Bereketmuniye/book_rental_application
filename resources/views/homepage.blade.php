<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid"> 
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
       
    </div>
    <!-- Topbar End -->


   <!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <!-- Placeholder for branding or logo if needed -->
        </div>
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">B</span>Renter
                    </h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="" class="nav-item nav-link active">Home</a>
                        <a href="shop.html" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                            <div class="dropdown-menu rounded-0 m-0 p-3" style="min-width: 300px;">
                                <form method="GET" class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <input type="text" id="search" class="form-control" placeholder="Search by title or author" onkeyup="filterTable()">
                                            <select id="categoryFilter" class="form-select" onchange="filterTable()">
                                                <option value="">All Categories</option>
                                                <option value="fiction">Fiction</option>
                                                <option value="non-fiction">Non-Fiction</option>
                                                <option value="science">Science</option>
                                                <option value="history">History</option>
                                                <option value="biography">Biography</option>
                                                <option value="fantasy">Fantasy</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                        <a href="" class="nav-item nav-link">Register</a>
                    </div>
                </div>
            </nav>

            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($books as $index => $book)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="height: 500px;">
                            <img class="img-fluid"  src="{{ asset('storage/' . $book->file) }}" alt="{{ $book->title }}">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 1000px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Rent</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $book->title }}</h3>
                                    <a href="" class="btn btn-light py-2 px-3">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->




    <!-- Products Start -->
    <div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">ALL Book Category</span></h2>
    </div>

    <div class="row px-xl-5 pb-3">
        @foreach($books as $book)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4 h-80"> <!-- Use h-100 to make cards full height -->
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $book->file) }}" alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
                    </div>
                    
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 flex-grow-1">
                        <h6 class="text-truncate mb-3">{{ $book->title }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format($book->price, 2) }} Birr</h6>
                            @if ($book->original_price)
                                <h6 class="text-muted ml-2"><del>{{ number_format($book->original_price, 2) }} Birr</del></h6>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="#" class="btn btn-sm text-dark p-0" 
                           data-toggle="modal" 
                           data-target="#bookDetailModal{{ $book->id }}">
                            <i class="fas fa-eye text-primary mr-1"></i>View Detail
                        </a>
                    
                        <a href="#" class="btn btn-sm text-dark p-0"
                                data-toggle="modal"
                                data-target="#rentBookModal{{ $book->id }}">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Rent Book
                        </a>
                    </div>
                </div>
            </div>
    
        <!-- Modal -->
        <div class="modal fade" id="bookDetailModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="bookDetailModalLabel{{ $book->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookDetailModalLabel{{ $book->id }}">Book Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $book->file) }}" alt="{{ $book->title }}">
                        <h6><strong>Book Title :</strong>{{ $book->title }}</h6>
                        <p><strong>Book Author :</strong>{{ $book->author }}</p>
                        <p><strong>Book Category:</strong>{{ $book->category }}</p>
                        <h6><strong>Rent Price per week:</strong>{{ number_format($book->price, 2) }} Birr</h6>
                    </div>
                </div>
            </div>
        </div>
   
    <!-- Products End -->

 <!-- Rent Book Modal -->

<div class="modal fade" id="rentBookModal{{ $book->id }}" tabindex="-1" aria-labelledby="rentBookModalLabel{{ $book->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rentBookModalLabel{{ $book->id }}">Rent Book: {{ $book->title }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('books.rent', $book->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <strong>Price per week:</strong> {{ number_format($book->price, 2) }} Birr
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Rental</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">B</span>Renter</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Addis Ababa, Ethiopia</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. 
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    
<script>
function filterTable() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const table = document.getElementById('booksTable');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        const title = cells[0].textContent.toLowerCase();
        const author = cells[1].textContent.toLowerCase();
        const category = cells[2].textContent.toLowerCase();

        const titleMatch = title.includes(searchInput);
        const authorMatch = author.includes(searchInput);
        const categoryMatch = categoryFilter === '' || category === categoryFilter;

        if ((titleMatch || authorMatch) && categoryMatch) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}
</script> 
</body>

</html>