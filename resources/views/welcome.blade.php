<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Schedulia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #0471ff;
            --secondary-color: #0056b3;
            --text-dark: #333;
            --text-light: #f8f9fa;
            --bg-light: #f8f9fa;
            --bg-dark: #212529;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, #6a11cb 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: var(--text-light);
            overflow-x: hidden;
        }

        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        .background-animation div {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.1);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }
        .background-animation div:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .background-animation div:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .background-animation div:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .background-animation div:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .background-animation div:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .background-animation div:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .background-animation div:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .background-animation div:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; }
        .background-animation div:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
        .background-animation div:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }

        @keyframes animate {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
        }

        .main-content-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1200px;
            padding: 40px 20px;
        }

        .hero-section {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 60px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
            color: var(--text-dark);
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-section h1 {
            color: var(--primary-color);
            font-weight: 800;
            margin-bottom: 25px;
            font-size: 3.5rem;
            line-height: 1.2; /* Adjusted line-height */
        }

        .hero-section .lead {
            font-size: 1.3rem;
            line-height: 1.8; /* Adjusted line-height */
            margin-bottom: 35px;
            font-weight: 400; /* Ensure good readability */
        }

        .logo {
            max-width: 200px;
            margin-bottom: 30px;
            animation: bounceIn 1s ease-out;
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); opacity: 1; }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 15px rgba(0, 113, 255, 0.3);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-3px);
        }

        .section {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 60px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            color: var(--text-dark);
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .section.animated {
            opacity: 1;
            transform: translateY(0);
        }

        .section h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 30px;
            font-size: 2.5rem;
            text-align: center;
            line-height: 1.3; /* Adjusted line-height */
        }

        .feature-item, .benefit-item {
            margin-bottom: 30px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 20px;
            border-radius: 10px;
        }

        .feature-item:hover, .benefit-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-item i, .benefit-item i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .feature-item h5, .benefit-item h5 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 1.4rem;
            line-height: 1.4; /* Adjusted line-height */
        }

        .feature-item p, .benefit-item p {
            color: var(--text-dark);
            font-size: 1rem;
            line-height: 1.7; /* Adjusted line-height */
            font-weight: 400; /* Ensure good readability */
        }

        .how-it-works-step {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .how-it-works-step:nth-child(odd) {
            flex-direction: row-reverse;
        }

        .how-it-works-step .step-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-color);
            margin: 0 30px;
            flex-shrink: 0;
        }

        .how-it-works-step .step-content {
            text-align: left;
            flex: 1;
        }

        .how-it-works-step .step-content h4 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 10px;
            line-height: 1.3; /* Adjusted line-height */
        }

        .how-it-works-step .step-content p {
            color: var(--text-dark);
            font-size: 1.1rem;
            line-height: 1.7; /* Adjusted line-height */
            font-weight: 400; /* Ensure good readability */
        }

        footer {
            width: 100%;
            background-color: var(--bg-dark);
            color: var(--text-light);
            text-align: center;
            padding: 30px 20px;
            margin-top: 40px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.2);
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.5; /* Adjusted line-height */
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-section h1 {
                font-size: 2.8rem;
            }
            .hero-section .lead {
                font-size: 1.1rem;
            }
            .section {
                padding: 40px;
            }
            .section h2 {
                font-size: 2rem;
            }
            .how-it-works-step {
                flex-direction: column !important;
            }
            .how-it-works-step .step-number {
                margin: 20px 0;
            }
            .how-it-works-step .step-content {
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 20px;
            }
            .hero-section h1 {
                font-size: 2.2rem;
            }
            .hero-section .lead {
                font-size: 1rem;
            }
            .logo {
                max-width: 150px;
            }
            .btn-primary {
                padding: 12px 30px;
                font-size: 1rem;
            }
            .section {
                padding: 30px 20px;
            }
            .section h2 {
                font-size: 1.8rem;
            }
            .feature-item i, .benefit-item i {
                font-size: 2.5rem;
            }
            .feature-item h5, .benefit-item h5 {
                font-size: 1.2rem;
            }
            .how-it-works-step .step-number {
                font-size: 2.5rem;
            }
            .how-it-works-step .step-content h4 {
                font-size: 1.5rem;
            }
            .how-it-works-step .step-content p {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="background-animation">
        <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
    </div>

    <div class="main-content-wrapper">
        <!-- Hero Section -->
        <section class="hero-section">
            <img src="{{ asset('images/SCHEDULIA-Logo.png') }}" alt="Schedulia Logo" class="logo">
            <h1>Selamat Datang di Schedulia</h1>
            <p class="lead">
                Schedulia adalah sistem informasi penjadwalan akademik inovatif yang dirancang untuk menyederhanakan proses pembuatan dan pengelolaan jadwal kuliah di universitas. Platform kami membantu mengoptimalkan alokasi sumber daya, meminimalkan konflik, dan menyediakan jadwal yang jelas serta mudah diakses bagi mahasiswa, dosen, dan administrator.
            </p>
            <a href="{{ route('login.form') }}" class="btn btn-primary">Masuk ke Schedulia</a>
        </section>

        <!-- Fitur Utama Section -->
        <section class="section" id="features">
            <h2>Fitur Utama Kami</h2>
            <div class="row mt-4">
                <div class="col-md-4 feature-item">
                    <i class="fas fa-calendar-alt"></i>
                    <h5>Penjadwalan Efisien</h5>
                    <p>Otomatiskan dan optimalkan pembuatan jadwal kuliah, mengurangi upaya manual dan potensi konflik.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="fas fa-users"></i>
                    <h5>Akses Berbasis Pengguna</h5>
                    <p>Menyediakan dasbor dan jadwal yang dipersonalisasi untuk mahasiswa, dosen, dan administrator.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="fas fa-chart-line"></i>
                    <h5>Optimasi Sumber Daya</h5>
                    <p>Kelola ruang kelas, dosen, dan alokasi mata kuliah secara efektif untuk efisiensi maksimal.</p>
                </div>
            </div>
        </section>

        <!-- Bagaimana Cara Kerjanya Section -->
        <section class="section" id="how-it-works">
            <h2>Bagaimana Schedulia Bekerja?</h2>
            <div class="how-it-works-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4>Input Data</h4>
                    <p>Administrator memasukkan data mata kuliah, dosen, ruang kelas, dan ketersediaan waktu ke dalam sistem.</p>
                </div>
            </div>
            <div class="how-it-works-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>Generasi Jadwal Otomatis</h4>
                    <p>Algoritma cerdas Schedulia memproses data untuk menghasilkan jadwal yang optimal, menghindari bentrokan dan memenuhi semua batasan.</p>
                </div>
            </div>
            <div class="how-it-works-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>Akses Mudah</h4>
                    <p>Mahasiswa dan dosen dapat melihat jadwal mereka yang dipersonalisasi melalui dasbor masing-masing, kapan saja dan di mana saja.</p>
                </div>
            </div>
            <div class="how-it-works-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>Manajemen Fleksibel</h4>
                    <p>Administrator dapat dengan mudah melakukan penyesuaian jadwal jika diperlukan, dengan sistem yang secara otomatis memeriksa potensi konflik.</p>
                </div>
            </div>
        </section>

        <!-- Manfaat Menggunakan Schedulia Section -->
        <section class="section" id="benefits">
            <h2>Manfaat Menggunakan Schedulia</h2>
            <div class="row mt-4">
                <div class="col-md-6 benefit-item">
                    <i class="fas fa-clock"></i>
                    <h5>Hemat Waktu</h5>
                    <p>Kurangi jam kerja manual yang dihabiskan untuk membuat dan merevisi jadwal.</p>
                </div>
                <div class="col-md-6 benefit-item">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h5>Kurangi Konflik</h5>
                    <p>Sistem secara otomatis mengidentifikasi dan mencegah bentrokan jadwal, memastikan kelancaran proses belajar mengajar.</p>
                </div>
                <div class="col-md-6 benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <h5>Akurasi Tinggi</h5>
                    <p>Pastikan semua jadwal akurat dan sesuai dengan ketersediaan sumber daya dan aturan universitas.</p>
                </div>
                <div class="col-md-6 benefit-item">
                    <i class="fas fa-mobile-alt"></i>
                    <h5>Aksesibilitas Universal</h5>
                    <p>Akses jadwal dari perangkat apa pun, kapan saja, untuk pengalaman pengguna yang lebih baik.</p>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="hero-section" style="background-color: rgba(255, 255, 255, 0.98);" id="call-to-action">
            <h2>Siap untuk Mengoptimalkan Penjadwalan Anda?</h2>
            <p class="lead text-dark">
                Bergabunglah dengan universitas lain yang telah merasakan kemudahan dan efisiensi dengan Schedulia. Masuk sekarang untuk memulai!
            </p>
            <a href="{{ route('login.form') }}" class="btn btn-primary">Masuk Sekarang</a>
        </section>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Schedulia. Hak Cipta Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.section');

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
</body>
</html>