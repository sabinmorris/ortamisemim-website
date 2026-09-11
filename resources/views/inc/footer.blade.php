<!-- Responsive Centered Heading -->

<div class="row mb-4">
    <div class="col-12 text-center">
        <h2 class="fw-bold mb-2">
            <i class="bi bi-bar-chart-line-fill text-primary me-2"></i>
            Visitor Analytics
        </h2>

        <p class="text-muted mb-0">
            Ortamisemim visitors and traffic statistics.
        </p>

        <div class="mt-2">
            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->format('d M Y') }}
            </span>
        </div>

    </div>
</div>


<div class="row g-4">

    <!-- Total Visitors -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">Total Visitors</p>
                        <h3 class="fw-bold mb-0">
                            {{ $totalVisitors }}
                        </h3>
                    </div>

                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-people-fill text-primary fs-3"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Today's Visitors -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">Today's Visitors</p>
                        <h3 class="fw-bold mb-0">
                            {{ $todayVisitors }}
                        </h3>
                    </div>

                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-person-check-fill text-success fs-3"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Weekly Visitors -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">This Week</p>
                        <h3 class="fw-bold mb-0">
                            {{ $weeklyVisitors }}
                        </h3>
                    </div>

                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-calendar-week-fill text-warning fs-3"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Monthly Visitors -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">This Month</p>
                        <h3 class="fw-bold mb-0">
                            {{ $monthlyVisitors }}
                        </h3>
                    </div>

                    <div class="bg-info bg-opacity-10 rounded-circle p-3">
                        <i class="bi bi-calendar-month-fill text-info fs-3"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- <footer id="footer" class="footer dark-background"> -->
<footer id="footer" class="footer neon-mirror-blue">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center" translate="no">
                    <img src="assets/img/smz_logo.png" alt="">
                    <span class="sitename">Or-Tamisemim</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>2277 Barabara ya Vuga</p>
                    <p>70401 Mjini Maghararibi</p>
                    <p>Unguja</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+255 7799 925 22 / +255 2422 300 34 </span></p>
                    <p><strong>Email:</strong> <span>info@tamisemim.go.tz</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="https://tmismim1757" target="_blank" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/ortamisemim" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/ortamisemim_zanzibar/?hl=en" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://youtube.com/or-tamisemim" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Kurasa Zetu</h4>
                <ul>
                    <li><a href="{{Route('/')}}">Home</a></li>
                    <li><a href="{{Route('about_Us')}}">About us</a></li>
                    <li><a href="{{Route('utumishi_department', ['departmentName' => 'uratibu'])}}">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="{{Route('utumishi_department', ['departmentName' => 'idara maalum'])}}">Ulizi na Usalama</a></li>
                    <li><a href="{{Route('utumishi_department', ['departmentName' => 'uratibu'])}}">local Government</a></li>
                    <li><a href="{{Route('utumishi_department', ['departmentName' => 'mrajis'])}}">NG'Os</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Taasisi Zetu</h4>
                <ul>
                    <li><a href="#">KMKM</a></li>
                    <li><a href="#">JKUZ</a></li>
                    <li><a href="#">KVZ</a></li>
                    <li><a href="https://chuochamafunzohq.go.tz/" target="_blank">MF</a></li>
                    <li><a href="#">Matukio ya Kijamii</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Kurasa za Karibu</h4>
                <ul>
                    <li><a href="https://eoffice.goz.go.tz/login" target="_blank">E-Office</a></li>
                    <li><a href="https://mail.tamisemim.go.tz/" target="_blank">Mail</a></li>
                    <li><a href="https://www.zhsfsmz.go.tz/" target="_blank">ZHSF</a></li>
                    <li><a href="https://mutm.tamisemim.go.tz/zcrlb/index" target="_blank">Liquor Board</a></li>
                    <!--<li><a href="#">Flexo</a></li> -->
                </ul>

            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename" translate="no">Or-Tamisemim</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- Designed by <a href="{{Route('/')}}">Or-Tamisemim</a> Distributed by  <a href="https://tamisemim.go.tz">ThemeTawala</a> -->
        </div>
    </div>

</footer>
<!-- google_translate_element -->
<div id="google_translate_element" style="display: none;"></div>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>


<script type="text/javascript" src="{{ asset('assets/engine1/wowslider.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/engine1/script.js')}}"></script>
<!-- End WOWSlider.com BODY section -->


<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js')}}"></script>

<!-- Google Translate Script -->
<script type="text/javascript">
    var googleTranslateElementInit = function() {
        new google.translate.TranslateElement({
            pageLanguage: 'auto',
            includedLanguages: 'en,sw',
            autoDisplay: false
        }, 'google_translate_element');

        // Auto-translate on first load
        setTimeout(function() {
            // Check if we need to translate
            if (!localStorage.getItem('selectedLanguage') || localStorage.getItem('selectedLanguage') === 'sw') {
                document.cookie = 'googtrans=/auto/sw; path=/;';
                document.cookie = `googtrans=/auto/sw; path=/; domain=${window.location.hostname}`;
            } else if (localStorage.getItem('selectedLanguage') === 'en') {
                document.cookie = 'googtrans=/auto/en; path=/;';
                document.cookie = `googtrans=/auto/en; path=/; domain=${window.location.hostname}`;
            }
        }, 500);
    };
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<!-- Main JS -->
<script>
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Sticky Navigation
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar-main');
        if (window.scrollY > 200) {
            navbar.classList.add('sticky-top');
            navbar.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
        } else {
            navbar.classList.remove('sticky-top');
            navbar.style.boxShadow = 'none';
        }
    });

    // Initialize maps when document is ready
    $(document).ready(function() {
        // Initialize South Pemba Map with Google Maps
        if ($('#north-pemba-map').length) {
            // South Pemba coordinates
            const northPembaCoords = {
                lat: -5.0746,
                lng: 39.7948
            };

            // Create map
            const northPembaMap = new google.maps.Map(document.getElementById("north-pemba-map"), {
                center: northPembaCoords,
                zoom: 11,
                disableDefaultUI: false,
                zoomControl: true,
                draggable: false
            });

            // Add a marker for South Pemba
            new google.maps.Marker({
                position: northPembaCoords,
                map: northPembaMap,
                title: "South Pemba Region"
            });
        }

        // World Map is initialized in worldMap.js
    });
</script>

<script>
    function changeLanguage(lang) {
        localStorage.setItem('selectedLanguage', lang);

        if (lang === 'en') {
            // Set translation to English
            document.cookie = 'googtrans=/auto/en; path=/;';
            document.cookie = `googtrans=/auto/en; path=/; domain=${window.location.hostname}`;
            console.log("Switched to EN - Cookie set to auto detect and translate to English");
        } else if (lang === 'sw') {
            // Set translation to Swahili
            document.cookie = 'googtrans=/auto/sw; path=/;';
            document.cookie = `googtrans=/auto/sw; path=/; domain=${window.location.hostname}`;
            console.log("Switched to SW - Cookie set to auto detect and translate to Swahili");
        }

        // Reload once after language change
        location.reload();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const lang = localStorage.getItem('selectedLanguage') || 'en';
        const select = document.getElementById('language-select');
        if (select) select.value = lang;

        const cookieLang = getCookieValue('googtrans');
        console.log('LocalStorage:', lang, '| Cookie:', cookieLang);

        // Check if translator needs to be initialized
        if (lang === 'en' && (!cookieLang || !cookieLang.endsWith('/en'))) {
            document.cookie = 'googtrans=/auto/en; path=/;';
            document.cookie = `googtrans=/auto/en; path=/; domain=${window.location.hostname}`;
        } else if (lang === 'sw' && (!cookieLang || !cookieLang.endsWith('/sw'))) {
            document.cookie = 'googtrans=/auto/sw; path=/;';
            document.cookie = `googtrans=/auto/sw; path=/; domain=${window.location.hostname}`;
        }
    });

    function getCookieValue(name) {
        const match = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
        return match ? decodeURIComponent(match.pop()) : '';
    }

    // Optional debug tool
    function clearTranslation() {
        localStorage.removeItem('selectedLanguage');
        ['', '.' + window.location.hostname].forEach(domain => {
            document.cookie = 'googtrans=; Max-Age=0; path=/;';
            document.cookie = `googtrans=; Max-Age=0; path=/; domain=${domain};`;
        });
        console.log("Cleared all translation cookies & localStorage.");
        location.reload();
    }
</script>