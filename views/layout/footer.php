
<footer class="footer pt-6 pb-5 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4"><img class="navbar-brand-dark mb-4" height="35" src="../../assets/img/brand/light.svg"
                                       alt="Logo light">
                <p>Pixel Pro is a premium Bootstrap 5 UI Kit that will help you prototype and design beautiful, creative
                    and modern websites.</p>
                <ul class="social-buttons mb-5 mb-lg-0">
                    <li><a href="https://twitter.com/themesberg" aria-label="twitter social link"
                           class="icon-white me-2"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="https://www.facebook.com/themesberg/" class="icon-white me-2"
                           aria-label="facebook social link"><span class="fab fa-facebook"></span></a></li>
                    <li><a href="https://github.com/themesberg" aria-label="github social link" class="icon-white me-2"><span
                                class="fab fa-github"></span></a></li>
                    <li><a href="https://dribbble.com/themesberg" class="icon-white"
                           aria-label="dribbble social link"><span class="fab fa-dribbble"></span></a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-5 mb-lg-0"><span class="h5">Themesberg</span>
                <ul class="footer-links mt-2">
                    <li><a target="_blank" href="https://themesberg.com/blog">Blog</a></li>
                    <li><a target="_blank" href="https://themesberg.com/products">Products</a></li>
                    <li><a target="_blank" href="https://themesberg.com/about">About Us</a></li>
                    <li><a target="_blank" href="https://themesberg.com/contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-5 mb-lg-0"><span class="h5">Other</span>
                <ul class="footer-links mt-2">
                    <li><a href="https://themesberg.com/docs/bootstrap-5/pixel/getting-started/quick-start/"
                           target="_blank">Docs <span class="badge badge-sm bg-success ms-2">v5.3</span></a></li>
                    <li><a href="https://themesberg.com/docs/pixel-bootstrap/getting-started/changelog" target="_blank">Changelog</a>
                    </li>
                    <li><a target="_blank" href="https://themesberg.com/licensing">License</a></li>
                    <li><a target="_blank"
                           href="https://github.com/themesberg/pixel-bootstrap-ui-kit/issues">Support</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 mb-5 mb-lg-0"><span class="h5">Subscribe</span>
                <p class="text-muted font-small mt-2">Join our mailing list. We write rarely, but only the best
                    content.</p>
                <form action="#">
                    <div class="form-row mb-2">
                        <div class="col-12"><label class="h6 fw-normal text-muted" for="exampleInputEmail3">Email
                                address</label> <input type="email" class="form-control mb-2"
                                                       placeholder="example@company.com" name="email"
                                                       aria-label="Subscribe form" id="exampleInputEmail3" required></div>
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-tertiary" data-loading-text="Sending">
                                <span>Subscribe</span></button>
                        </div>
                    </div>
                </form>
                <p class="text-muted font-small m-0">We’ll never share your details. See our <a class="text-white"
                                                                                                href="#">Privacy
                        Policy</a></p></div>
        </div>
        <hr class="bg-secondary my-3 my-lg-5">
        <div class="row">
            <div class="col mb-md-0"><a href="https://themesberg.com/" target="_blank"
                                        class="d-flex justify-content-center mb-3"><img
                        src="../../assets/img/themesberg.svg" height="30" class="me-2" alt="Themesberg Logo">
                    <p class="text-white fw-bold footer-logo-text m-0">Themesberg</p></a>
                <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo"><p
                        class="fw-normal font-small mb-0">Copyright © Themesberg 2019-<span
                            class="current-year">2021</span>. All rights reserved.</p></div>
            </div>
        </div>
    </div>
</footer>
<script src="../../vendor/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../vendor/headroom.js/dist/headroom.min.js"></script>
<script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>
<script src="../../vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="../../vendor/jarallax/dist/jarallax.min.js"></script>
<script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="../../vendor/vivus/dist/vivus.min.js"></script>
<script src="../../vendor/chartist/dist/chartist.min.js"></script>
<script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../../vendor/%40glidejs/glide/dist/glide.min.js"></script>
<script src="../../vendor/countup.js/dist/countUp.umd.js"></script>
<script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
<script async defer="defer" src="../../../../../buttons.github.io/buttons.js"></script>
<script src="../../assets/js/pixel.js"></script>
<script>// here you should load content from an Ajax request and when it
    // loads you can disable the button from loading
    $('#loadOnClick').click(function () {
        $button = $(this);
        $loadContent = $('#extraContent');
        $allLoaded = $('#allLoadedText');
        $button.addClass('btn-loading');
        $button.attr('disabled', true);

        setTimeout(function () {
            $loadContent.show();
            $button.hide();
            $allLoaded.show();
        }, 1500);
    });</script>
<script type="text/javascript">(function () {
        window['__CF$cv$params'] = {
            r: '6507008918882c92',
            m: '7cbcbe8f234a770e1ed98a3fa3970c50a7aa2dde-1621193232-1800-AfeSSvoHPjd1lOzCGGey4+HHZ71mSLQhSh3AuDgcHQoCXungSY1EMBrN7m9tczNghAm2S+9oJZqhNC6RpnNhLB4X7T2NSYyKDf7VYzKFN3uY2aW+eSbYqTAC71CRv7jUnHgdj/+RxA4evR2uKN4iurGCmrbfGnmvL5DRzdG6c8kK',
            s: [0xe206b56c1b, 0x520291e696],
        }
    })();</script>
</body>
<!-- Mirrored from demo.themesberg.com/pixel-pro/v5/html/pages/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 19:31:40 GMT -->
</html>