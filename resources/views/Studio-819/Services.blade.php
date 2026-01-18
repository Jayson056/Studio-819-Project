<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio 819 | Self-Photo Studio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {

            --bg-nude: #e6d5c3;
            --dark-brown: #5c3d2e;
            --medium-brown: #8d7b68;
            --accent-red: #5c1a1a;
            --white: #ffffff;
            --overlay: rgba(0, 0, 0, 0.5);

            --header-bg-color: #ebdfd1;
            --text-color: #634832;
            --brand-color: #5a2025;
            --brand-color-hover: #45181c;
            --navbar-height: 80px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-nude);
            color: var(--dark-brown);
            line-height: 1.6;
            padding-top: var(--navbar-height);
        }

        .custom-navbar {
            background-color: var(--header-bg-color) !important;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            position: fixed;
            top: 0;
            width: 100%;
            height: var(--navbar-height);
            z-index: 1030;
        }

        .custom-navbar .container-fluid {
            height: 100%;
        }

        .navbar-brand {
            z-index: 1031;
        }

        .navbar-brand-logo {
            height: 55px;
        }

        .custom-navbar .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .custom-navbar .nav-link:hover {
            color: var(--brand-color) !important;
        }

        .btn-sign-in {
            background-color: var(--brand-color) !important;
            border-color: var(--brand-color) !important;
            color: white !important;
            font-weight: 600;
            padding: 0.375rem 1.25rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-sign-in:hover {
            background-color: var(--brand-color-hover) !important;
            border-color: var(--brand-color-hover) !important;
            color: white !important;
        }


        .hero {
            height: 500px;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('ourservicesbanner.png');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: var(--dark-brown);
            padding: 20px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.3);
        }

        .hero p {
            max-width: 700px;
            font-size: 1.2rem;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.3);
        }

        .container-custom {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            text-align: center;
        }

        h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .tabs {
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .tab-btn {
            padding: 12px 25px;
            border: none;
            background: #d7c4b1;
            color: var(--dark-brown);
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            transition: 0.3s;
        }

        .tab-btn.active {
            background: var(--dark-brown);
            color: white;
        }

        .package-grid {
            display: none;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .package-grid.active {
            display: grid;
        }

        .card-custom {
            background: var(--dark-brown);
            color: #ebdfd1;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            text-align: left;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .card-img {
            height: 250px;
            background: #ccc;
            background-size: cover;
            background-position: center;
        }

        .card-body-custom {
            padding: 25px;
        }

        .card-body-custom h3 {
            margin-bottom: 8px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-body-custom p {
            opacity: 0.85;
            margin-bottom: 5px;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .card-body-custom .pax-info {
            margin-bottom: 3px;
        }

        .card-body-custom .duration-info {
            margin-bottom: 20px;
        }

        .btn-know {
            background: #83141d;
            color: white;
            border: none;
            padding: 10px 20px;
            width: 100%;
            cursor: pointer;
            font-weight: bold;
            border-radius: 4px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal-content-custom {
            background: var(--bg-nude);
            padding: 40px;
            border-radius: 10px;
            max-width: 500px;
            width: 90%;
            position: relative;
            color: var(--dark-brown);
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 25px;
            cursor: pointer;
        }

        .modal-price {
            font-size: 24px;
            font-weight: bold;
            color: var(--accent-red);
            margin: 10px 0;
        }

        .modal-list {
            text-align: left;
            margin: 20px 0;
        }

        .modal-list li {
            margin-bottom: 8px;
            list-style-type: '✓ ';
            padding-left: 10px;
        }

        .contact {
            background: #d7c4b1;
            padding: 60px 5%;
            margin-top: 50px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            max-width: 1100px;
            margin: auto;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            text-align: left;
        }

        .contact-form input,
        .contact-form textarea {
            padding: 12px;
            border: none;
            border-radius: 8px;
            width: 100%;
            background: var(--dark-brown);
            color: white;
            font-size: 1rem;
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: white;
        }

        .btn-send {
            background: var(--accent-red);
            color: white;
            border: none;
            padding: 12px 40px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 8px;
            width: fit-content;
            margin-top: 10px;
        }

        .contact-info {
            text-align: left;
        }

        .contact-info h3 {
            margin-top: 25px;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .contact-info p {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: var(--dark-brown);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            font-size: 22px;
            transition: background 0.3s, transform 0.3s;
        }

        .social-icons a:hover {
            background: var(--accent-red);
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid container">

            <a class="navbar-brand" href="index.html">
                <img src="Images/logo.png" alt="Studio 819 Logo" class="navbar-brand-logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819') }}">Home</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819-about') }}">About</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819-services') }}">Services</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819-contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-sign-in" href="{{ url('/Studio-819-login-singup') }}">Sign In</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <h1>OUR SERVICES</h1>
        <p>From self-shoot sessions to professional photographer packages, we've got the perfection for you.</p>
    </header>

    <div class="container-custom">
        <h2>Our Packages </h2>

        <div class="tabs">
            <button class="tab-btn active" onclick="switchTab('self-photo')">SELF-PHOTOSHOOT </button>
            <button class="tab-btn" onclick="switchTab('christmas')">CHRISTMAS PACKAGE </button>
        </div>

        <div id="self-photo" class="package-grid active">
            <div class="card-custom">
                <div class="card-img" style="background-image: url('litepackage.png')"></div>
                <div class="card-body-custom">
                    <h3>Lite Package</h3>
                    <p class="pax-info">1-2 pax</p>
                    <p class="duration-info">30 minutes</p>
                    <button class="btn-know" onclick="showModal('lite')">Know More ></button>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-img" style="background-image: url('basicpackage.png')"></div>
                <div class="card-body-custom">
                    <h3>Basic Package</h3>
                    <p class="pax-info">1-2 pax</p>
                    <p class="duration-info">30 minutes</p>
                    <button class="btn-know" onclick="showModal('basic')">Know More ></button>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-img" style="background-image: url('premiumpackage.png')"></div>
                <div class="card-body-custom">
                    <h3>Premium Package</h3>
                    <p class="pax-info">1-2 pax</p>
                    <p class="duration-info">30 minutes</p>
                    <button class="btn-know" onclick="showModal('premium')">Know More ></button>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-img" style="background-image: url('familygrouppackage.png')"></div>
                <div class="card-body-custom">
                    <h3>Family/Group Package</h3>
                    <p class="pax-info">Up to 7pax</p>
                    <p class="duration-info">45 minutes</p>
                    <button class="btn-know" onclick="showModal('standard')">Know More ></button>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-img" style="background-image: url('yearbookpackage.png')"></div>
                <div class="card-body-custom">
                    <h3>Yearbook Package</h3>
                    <p class="pax-info">1-2 pax</p>
                    <p class="duration-info">30 minutes</p>
                    <button class="btn-know" onclick="showModal('professional')">Know More ></button>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-img" style="background-image: url('photoboxpackage.png')"></div>
                <div class="card-body-custom">
                    <h3>Photobox</h3>
                    <p class="pax-info">1-3 pax</p>
                    <p class="duration-info">15 minutes</p>
                    <button class="btn-know" onclick="showModal('group')">Know More ></button>
                </div>
            </div>
        </div>

        <div id="christmas" class="package-grid">
            <div class="card-custom">
                <div class="card-img" style="background-image: url('christmasduo\(self-shoot\).png')"></div>
                <div class="card-body-custom">
                    <h3>Christmas DUO (Self-Shoot) </h3>
                    <p>1-2 pax | 30 minutes </p>
                    <button class="btn-know" onclick="showModal('christmas-duo')">Know More ></button>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-img" style="background-image: url('christmasfamilygroup.png')"></div>
                <div class="card-body-custom">
                    <h3>Christmas Family/Group </h3>
                    <p>Up to 5 pax | 45 minutes </p>
                    <button class="btn-know" onclick="showModal('christmas-family')">Know More ></button>
                </div>
            </div>
            <div class="card-custom">
                <div class="card-img" style="background-image: url('christmasphotographersession.png')"></div>
                <div class="card-body-custom">
                    <h3>Christmas Photographer</h3>
                    <p>1-2 pax | 60 minutes</p>
                    <button class="btn-know" onclick="showModal('christmas-professional')">Know More ></button>
                </div>
            </div>
        </div>
    </div>

    <section class="contact">
        <div class="contact-grid">
            <div class="contact-form">
                <h3>MESSAGE US </h3>
                <input type="text" placeholder="Your Name">
                <input type="email" placeholder="Your Email">
                <textarea rows="4" placeholder="Your Message"></textarea>
                <button class="btn-send">SEND </button>
            </div>
            <div class="contact-info">
                <h3>CALL US </h3>
                <p>0916 850 2077 </p>
                <h3>OR EMAIL US </h3>
                <p>studio819ph@gmail.com </p>
                <h3>SOCIAL US </h3>
                <div class="social-icons">
                    <a href="https://www.facebook.com/studio819ph" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/studio819ph" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>

    <div id="detailModal" class="modal">
        <div class="modal-content-custom">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2 id="m-title">Package Name</h2>
            <div id="m-price" class="modal-price">P 0.00</div>
            <ul id="m-list" class="modal-list"></ul>

            @auth
            <button class="btn-know" style="margin-top:20px;"
                onclick="window.location.href='{{ route('Studio-819/booking') }}'">
                Reserve Today
            </button>
            @else
            <button class="btn-know" style="margin-top:20px;"
                onclick="window.location.href='{{ route('Studio-819/loginsignup') }}'">
                Sign In to Reserve
            </button>
            @endauth
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const packageDetails = {
            // Self-Photoshoot Packages
            'lite': {
                title: 'Lite Package',
                price: 'P 350.00',
                inclusions: [
                    '1-2 pax',
                    '10 minutes self-photoshoot',
                    '5 soft copies',
                    '1 4R print and 4 photo cards',
                    '1 backdrop of your choice (7 colors: Nude, White, Black, Light Gray, Pink, Blue, Purple)'
                ]
            },
            'basic': {
                title: 'Basic Package',
                price: 'P 650.00',
                inclusions: [
                    '1-2 pax',
                    '20 minutes self-photoshoot',
                    '10 soft copies',
                    '2 4R prints and 6 photo cards',
                    '3 backdrops of your choice (7 colors: Nude, White, Black, Light Gray, Pink, Blue, Purple)'
                ]
            },
            'premium': {
                title: 'Premium Package',
                price: 'P 850.00',
                inclusions: [
                    '1-2 pax',
                    '20 minutes self-photoshoot',
                    '10 minutes photo selection',
                    'All soft copies',
                    '2 4R prints and 6 photo cards',
                    '3 backdrops of your choice (7 colors: Nude, White, Black, Light Gray, Pink, Blue, Purple)'
                ]
            },
            'standard': {
                title: 'Family/Group Package',
                price: 'P 1,400.00',
                inclusions: [
                    'Up to 5 pax',
                    '30 minutes self-photoshoot',
                    '15 minutes photo selection',
                    'All soft copies',
                    '5 4R prints and 10 photo cards',
                    '3 backdrops of your choice (7 colors: Nude, White, Black, Light Gray, Pink, Blue, Purple)'
                ]
            },
            'professional': {
                title: 'Yearbook Package',
                price: 'P 499.00',
                inclusions: [
                    '1-2 pax',
                    '15 minutes self-photoshoot',
                    '10 minutes photo selection',
                    '10 soft copies',
                    '2 4R prints and 2 ID card',
                    '1 yearbook backdrop of your choice (Black or Blue)',
                    'Free to use props, long sleeves, skirt, and necktie'
                ]
            },
            'group': {
                title: 'Photobox',
                price: 'P 499.00',
                inclusions: [
                    'HIGH ANGLE PHOTOSHOOT',
                    '1-3 pax',
                    '10 minutes self-photoshoot',
                    '3 photo strips (9 photos)',
                    '9 soft copies of curated photos'
                ]
            },

            // Christmas Packages
            'christmas-duo': {
                title: 'Christmas DUO (Self-Shoot)',
                price: 'P 850.00',
                inclusions: [
                    '1-2 pax',
                    '20 minutes Self-Shoot',
                    'Christmas Backdrop',
                    'Christmas Props',
                    'All soft copies',
                    '2 pcs 4R prints',
                    '6 Photo Cards'
                ]
            },
            'christmas-family': {
                title: 'Christmas Family/Group',
                price: 'P 1,400.00',
                inclusions: [
                    'Up to 5 pax',
                    '30 minutes Self-Shoot',
                    'Christmas Backdrop',
                    'Christmas Props',
                    'All soft copies',
                    '5 pcs 4R prints',
                    '10 Photo Cards'
                ]
            },
            'christmas-professional': {
                title: 'Christmas Photographer Session',
                price: 'P 2,499.00',
                inclusions: [
                    'Up to 5 pax',
                    'Photographer',
                    '1 Christmas Set Design',
                    '20 mins. Photoshoot (unlimited shots)',
                    '10 Enhanced Photos',
                    '5 pcs. 4R Print',
                    '10 pcs. Photo Cards',
                    'Up to 2 outfits (provided by client)',
                    'Free use of Christmas Props',
                    'All Soft Copies (Raw)'
                ]
            }
        };

        function switchTab(tabId) {
            document.querySelectorAll('.package-grid').forEach(g => g.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');
            event.target.classList.add('active');
        }

        function showModal(pkg) {
            const data = packageDetails[pkg];
            document.getElementById('m-title').innerText = data.title;
            document.getElementById('m-price').innerText = data.price;
            const list = document.getElementById('m-list');
            list.innerHTML = '';
            data.inclusions.forEach(item => {
                const li = document.createElement('li');
                li.innerText = item;
                list.appendChild(li);
            });
            document.getElementById('detailModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('detailModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('detailModal')) closeModal();
        }
    </script>
</body>

</html>