
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5">
        <div class="container py-5">
            <div class="mb-4 pb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">{{ config('app.name') }}</h1>
                            <p class="text-secondary mb-0">{{ config('app.desc') }}</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="position-relative mx-auto">
                            <input type="number" class="form-control w-100 rounded-pill border-0 px-4 py-3"
                                placeholder="Your Email">
                            <button type="submit"
                                class="btn btn-primary border-secondary position-absolute rounded-pill border-0 px-4 py-3 text-white"
                                style="top: 0; right: 0;">Subscribe Now</button>
                        </div> --}}
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle me-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle me-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle me-2" href="#"><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a class="btn border-secondary rounded-pill text-primary px-4 py-2" href="#">Read
                            More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column footer-item text-start">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="#">About Us</a>
                        <a class="btn-link" href="#">Contact Us</a>
                        <a class="btn-link" href="#">Privacy Policy</a>
                        <a class="btn-link" href="#">Terms & Condition</a>
                        <a class="btn-link" href="#">Return Policy</a>
                        <a class="btn-link" href="#">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column footer-item text-start">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link" href="#">My Account</a>
                        <a class="btn-link" href="#">Shop details</a>
                        <a class="btn-link" href="#">Shopping Cart</a>
                        <a class="btn-link" href="#">Wishlist</a>
                        <a class="btn-link" href="{{ route('report.index') }}" wire:navigate>Order History</a>
                        <a class="btn-link" href="#">International Orders</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img class="img-fluid" src="{{ asset('assets/frontend/portal') }}/img/payment.png"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

      <!-- Copyright Start -->
      <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-md-start mb-md-0 mb-3 text-center">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>{{ config('app.name') }}</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 text-md-end my-auto text-center text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    Re-Script By <a class="border-bottom" href="https://github.com/mocfaisal">mocfaisal</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a class="btn btn-primary border-3 border-primary rounded-circle back-to-top" href="#"><i
            class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/portal') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('assets/frontend/portal') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('assets/frontend/portal') }}/lib/lightbox/js/lightbox.min.js"></script>
    <script src="{{ asset('assets/frontend/portal') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/frontend/portal') }}/js/main.js"></script>
