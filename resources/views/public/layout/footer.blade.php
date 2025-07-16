<!-- Footer -->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo-symbol" src="{{ asset('/assets/public/img/logo.svg') }}" alt="Logo">
            <p class="pt-3">{{ __('layout.footer.0') }}</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">{{ __('layout.footer.1') }}</h5>
            <ul class="text-uppercase">
                <li><a href="#">{{ __('layout.footer.2') }}</a></li>
                <li><a href="#">{{ __('layout.footer.3') }}</a></li>
                <li><a href="#">{{ __('layout.footer.4') }}</a></li>
                <li><a href="#">{{ __('layout.footer.5') }}</a></li>
                <li><a href="#">{{ __('layout.footer.6') }}</a></li>
                <li><a href="#">{{ __('layout.footer.7') }}</a></li>
            </ul>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">{{ __('layout.footer.8') }}</h5>
            <div>
                <h6 class="text-uppercase">{{ __('layout.footer.9') }}</h6>
                <p>1234 Street Name, City</p>
            </div>
            <div>
                <h6 class="text-uppercase">{{ __('layout.footer.10') }}</h6>
                <p>123 456 7890</p>
            </div>
            <div>
                <h6 class="text-uppercase">Email</h6>
                <p>info@email.com</p>
            </div>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Instagram</h5>
            <div class="row">
                <img src="/assets/imgs/featured1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                <img src="/assets/imgs/featured2.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                <img src="/assets/imgs/featured3.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                <img src="/assets/imgs/featured4.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                <img src="/assets/imgs/clothes1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
            </div>
        </div>
    </div>

    <div class="copyright mt-5">
        <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                <img src="{{ asset('/assets/public/img/payment.jpg') }}" alt="">
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 mb-4 text-nowrap">
                <p>{{ 'E-Commerce © ' . date('Y') . ' ' . __('layout.footer.11') }}</p>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>
