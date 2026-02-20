<?php
$clinic = [
    "name" => "MyVetCare Covilhã",
    "city" => "Covilhã",
    "address" => "Rua Centro de Artes, Lote 10 - Loja 3",
    "postal" => "6200 - 505 Covilhã",
    "phone_fixed" => "275 333 033",
    "phone_mobile" => "926 797 534",
    "email" => "geral@myvetcare.pt",
    "google_maps_url" => "https://www.google.com/maps/search/?api=1&query=MyVetCare+Rua+Centro+de+Artes+Lote+10+Loja+3+Covilha"
];

$documents = [
    "Estatuto Jurídico dos Animais", "As tartarugas da Flórida", "Programa Leispro 2016",
    "Prevenção da dirofilariose", "Despesas médico-veterinárias no IRS", "A importância das visitas de rotina ao veterinário",
    "Vacinação", "Doenças transmitidas pelas carraças", "Pulgas",
    "Leishmaniose", "Aprenda a cuidar dos seus coelhos"
];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= $clinic["name"] ?> | Clínica Veterinária</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --secondary: #22c55e;
            --dark: #0f172a;
            --white-glass: rgba(255, 255, 255, 0.95);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: white;
            overflow-x: hidden;
        }

        .container { max-width: 1200px; margin: auto; padding: 0 30px; }
        .full-width { width: 100vw; margin-left: calc(50% - 50vw); }

        /* ===== HEADER REVISADO PARA MÓVIL ===== */
        header {
            position: fixed; top: 0; width: 100%;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(15px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        nav { height: 80px; display: flex; align-items: center; justify-content: space-between; }
        
        .logo { display: flex; align-items: center; gap: 12px; font-family: 'Poppins', sans-serif; font-weight: 600; z-index: 1100; }
        .logo img { height: 40px; }
        .logo span { font-size: 1.1rem; }

        /* Menú Desktop */
        nav ul { list-style: none; display: flex; gap: 25px; }
        nav a { color: white; text-decoration: none; font-weight: 500; cursor: pointer; transition: 0.3s; }
        nav a:hover { color: var(--secondary); }

        /* Botón Hamburguesa */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 6px;
            cursor: pointer;
            z-index: 1100;
            padding: 10px;
        }
        .menu-toggle span {
            width: 30px;
            height: 3px;
            background: white;
            border-radius: 10px;
            transition: 0.3s;
        }

        /* Responsive Nav */
        @media(max-width: 992px) {
            .menu-toggle { display: flex; }
            
            nav ul {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                height: 100vh;
                background: var(--dark);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transition: 0.5s;
                box-shadow: -10px 0 30px rgba(0,0,0,0.5);
            }

            nav ul.active { right: 0; }
            
            nav ul li { margin: 15px 0; }
            nav a { font-size: 1.5rem; }

            /* Animación Hamburguesa */
            .menu-toggle.open span:nth-child(1) { transform: rotate(45deg) translate(6px, 6px); }
            .menu-toggle.open span:nth-child(2) { opacity: 0; }
            .menu-toggle.open span:nth-child(3) { transform: rotate(-45deg) translate(7px, -7px); }
        }

        /* ===== VIDEO SYSTEM ===== */
        .bg-video { position: absolute; inset: 0; z-index: 0; overflow: hidden; }
        .bg-video video {
            width: 100%; height: 100%; object-fit: cover;
            filter: blur(5px) brightness(0.6);
            transform: scale(1.05);
        }
        .overlay {
            position: absolute; inset: 0; z-index: 1;
            background: linear-gradient(to bottom, rgba(15,23,42,0.8), rgba(15,23,42,0.4));
        }
        .fade-top, .fade-bottom {
            position: absolute; left: 0; right: 0; height: 200px;
            z-index: 2; pointer-events: none;
        }
        .fade-top { top: 0; background: linear-gradient(to top, rgba(15,23,42,0), rgba(15,23,42,1)); }
        .fade-bottom { bottom: 0; background: linear-gradient(to bottom, rgba(15,23,42,0), rgba(15,23,42,1)); }

        /* ===== SECTIONS ===== */
        .hero, .section-video {
            position: relative; min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden; padding: 120px 0;
        }
        .section-content { position: relative; z-index: 3; width: 100%; }

        .hero h2 { font-family: 'Poppins'; font-size: clamp(32px, 6vw, 64px); line-height: 1.1; margin-bottom: 20px; }
        .hero p { max-width: 650px; font-size: 18px; color: #cbd5e1; margin-bottom: 40px; }

        .btn {
            display: inline-block; padding: 18px 48px;
            background: linear-gradient(135deg, var(--secondary), #16a34a);
            color: white; border-radius: 50px; text-decoration: none;
            font-weight: 600; box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            transition: 0.3s; border: none; cursor: pointer;
            text-align: center;
        }
        .btn:hover { transform: translateY(-3px); filter: brightness(1.1); }

        /* ===== MAP SECTION ===== */
        .map-section { background: #0f172a; padding: 80px 0; text-align: left; }
        .map-wrapper { 
            border-radius: 40px; overflow: hidden; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.5); 
            height: 450px; border: 1px solid rgba(255,255,255,0.1);
        }
        .map-wrapper iframe { width: 100%; height: 100%; border: none; }

        /* ===== SERVICES GRID ===== */
        .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 30px; margin-bottom: 50px; }
        .service-item {
            background: var(--white-glass); color: var(--dark);
            padding: 60px 40px; border-radius: 35px; text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        .service-item i { font-size: 48px; color: var(--primary); margin-bottom: 25px; }
        .service-item h4 { font-family: 'Poppins'; font-size: 1.4rem; }

        /* ===== INFO CARDS ===== */
        .info-container { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
        .info-card {
            background: var(--white-glass); color: var(--dark);
            padding: 60px; border-radius: 40px; box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        .info-card h3 { font-family: 'Poppins'; font-size: 2rem; color: var(--primary); margin-bottom: 25px; }
        .info-card p { font-size: 1.1rem; line-height: 1.7; margin-bottom: 15px; }

        /* ===== MODALS ===== */
        .modal {
            position: fixed; inset: 0; background: rgba(15,23,42,0.95);
            backdrop-filter: blur(12px); display: none; align-items: center;
            justify-content: center; z-index: 3000; padding: 20px;
        }
        .modal.active { display: flex; }
        .modal-box {
            background: white; color: var(--dark); max-width: 700px; width: 100%;
            max-height: 90vh; overflow-y: auto; padding: 50px; border-radius: 40px;
            position: relative; animation: modalIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .modal-xl { max-width: 1000px; }

        @keyframes modalIn { from { opacity: 0; transform: scale(0.9) translateY(30px); } to { opacity: 1; transform: scale(1) translateY(0); } }
        .modal-close { position: absolute; top: 25px; right: 30px; font-size: 28px; cursor: pointer; color: #94a3b8; }

        /* ===== DOWNLOAD GRID ===== */
        .download-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px; margin-top: 30px;
        }
        .download-card {
            background: #f1f5f9; padding: 20px; border-radius: 20px;
            display: flex; align-items: center; gap: 15px;
            text-decoration: none; color: var(--dark); transition: 0.3s;
            border: 1px solid transparent;
        }
        .download-card:hover { background: #e2e8f0; border-color: var(--primary); transform: translateY(-2px); }
        .download-card i { font-size: 24px; color: #ef4444; }

        /* ===== CONTACTS IN MODAL ===== */
        .schedule-display {
            background: #f8fafc; border-radius: 25px; padding: 30px; margin: 25px 0;
            display: grid; gap: 15px; border: 1px solid #e2e8f0;
        }
        .schedule-row { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
        .day-label { font-weight: 600; display: flex; align-items: center; gap: 10px; }
        
        .contact-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 20px; }
        .action-link {
            display: flex; align-items: center; justify-content: center; gap: 12px;
            padding: 20px; border-radius: 18px; text-decoration: none; font-weight: 600; transition: 0.3s;
        }
        .link-tel { background: #f0fdf4; color: #16a34a; border: 1px solid #dcfce7; }
        .link-mail { background: #eff6ff; color: #2563eb; border: 1px solid #dbeafe; }

        footer { padding: 80px 0; text-align: center; color: #64748b; background: #0f172a; border-top: 1px solid rgba(255,255,255,0.05); }

        /* ===== RESPONSIVE FIXES ===== */
        @media(max-width: 992px) {
            .info-container { grid-template-columns: 1fr; }
            .info-card { padding: 40px 30px; }
            .hero h2 { font-size: 36px; }
            .contact-actions, .download-grid { grid-template-columns: 1fr; }
            .map-wrapper { height: 350px; }
            .modal-box { padding: 40px 25px; }
            .services-grid { gap: 15px; }
            .service-item { padding: 40px 20px; }
            .logo span { font-size: 0.9rem; }
        }
    </style>
</head>

<body>

<header>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="images/logo.PNG" alt="MyVetCare">
                <span><?= $clinic["name"] ?></span>
            </div>
            
            <div class="menu-toggle" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul id="nav-list">
                <li><a onclick="menuClose(); openModal('infoModal')">Informações</a></li>
                <li><a onclick="menuClose(); openModal('servicesModal')">Serviços</a></li>
                <li><a onclick="menuClose(); openModal('aboutModal')">Sobre Nós</a></li>
                <li><a onclick="menuClose(); openModal('contactModal')">Contactos</a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="hero full-width">
    <div class="bg-video"><video autoplay muted loop playsinline><source src="videos/video1.mp4" type="video/mp4"></video></div>
    <div class="overlay"></div>
    <div class="section-content container">
        <h2>Cuidamos de quem faz parte da sua família</h2>
        <p>Desde 2002, o Centro Veterinário da Covilhã ofrece dedicação, experiência e amor pelos animais.</p>
        <button onclick="openModal('contactModal')" class="btn">Marcar Consulta Agora</button>
    </div>
    <div class="fade-bottom"></div>
</section>

<section class="section-video full-width">
    <div class="bg-video"><video autoplay muted loop playsinline><source src="videos/video2.mp4" type="video/mp4"></video></div>
    <div class="overlay"></div>
    <div class="fade-top"></div>
    <div class="fade-bottom"></div>
    <div class="section-content container">
        <div class="services-grid">
            <div class="service-item"><i class="fas fa-stethoscope"></i><h4>Consultas</h4></div>
            <div class="service-item"><i class="fas fa-microscope"></i><h4>Análises</h4></div>
            <div class="service-item"><i class="fas fa-syringe"></i><h4>Prevenção</h4></div>
            <div class="service-item"><i class="fas fa-heartbeat"></i><h4>Cirurgia</h4></div>
        </div>
        <center>
            <button onclick="openModal('servicesModal')" class="btn" style="background: white; color: var(--primary);">Ver Todos os Serviços</button>
        </center>
    </div>
</section>

<section class="section-video full-width">
    <div class="bg-video"><video autoplay muted loop playsinline><source src="videos/video3.mp4" type="video/mp4"></video></div>
    <div class="overlay"></div>
    <div class="fade-top"></div>
    <div class="section-content container info-container">
        <div class="info-card">
            <h3>Onde Estamos</h3>
            <p><strong><?= $clinic["name"] ?></strong></p>
            <p><?= $clinic["address"] ?></p>
            <p><?= $clinic["postal"] ?></p>
            <br>
            <p><i class="fas fa-phone-alt"></i> <?= $clinic["phone_fixed"] ?></p>
            <p><i class="fas fa-mobile-alt"></i> <?= $clinic["phone_mobile"] ?></p>
        </div>
        <div class="info-card">
            <h3>Horário</h3>
            <p><strong>Segunda a Sexta</strong><br>10h00 – 13h00 | 15h00 – 20h00</p>
            <p><strong>Sábado</strong><br>10h00 – 13h00 | 14h30 – 16h00</p>
            <br>
            <button onclick="openModal('contactModal')" class="btn" style="width: 100%;">Contactar Agora</button>
        </div>
    </div>
</section>

<section class="map-section">
    <div class="container">
        <h2 style="font-family: 'Poppins'; font-size: 2.5rem; margin-bottom: 30px;">Localização</h2>
        <div class="map-wrapper">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3055.4332561937666!2d-7.50293122345638!3d40.27725916428469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3d1f3b38c2c69d%3A0x67343e0e7a16f88d!2sRua%20Centro%20de%20Artes%2C%20Covilh%C3%A3!5e0!3m2!1spt!2spt!4v1700000000000!5m2!1spt!2spt" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <p>© <?= date("Y") ?> <?= $clinic["name"] ?> · Covilhã, Portugal</p>
    </div>
</footer>

<div class="modal" id="infoModal" onclick="closeModal(event, 'infoModal')">
    <div class="modal-box modal-xl">
        <div class="modal-close" onclick="closeModal(null, 'infoModal')">✕</div>
        <h2 style="font-family: Poppins; color: var(--primary); margin-bottom: 10px;">Informações e Documentos</h2>
        <p style="color: #64748b; margin-bottom: 30px;">Consulte ou descarregue os nossos guias práticos em formato PDF.</p>
        <div class="download-grid">
            <?php foreach($documents as $index => $doc): ?>
            <a href="downloads/pdf<?= ($index+1) ?>.pdf" class="download-card" download>
                <i class="fas fa-file-pdf"></i>
                <span><?= $doc ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal" id="servicesModal" onclick="closeModal(event, 'servicesModal')">
    <div class="modal-box">
        <div class="modal-close" onclick="closeModal(null, 'servicesModal')">✕</div>
        <h2 style="font-family: Poppins; color: var(--primary); margin-bottom: 25px;">Nossos Serviços</h2>
        <ul style="columns: 1; line-height: 2.2; color: #334155; padding-left: 20px;">
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Medicina preventiva</li>
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Identificação electrónica</li>
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Destartarização</li>
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Rx digital e Ecografias</li>
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Electrocardiograma</li>
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Banhos e tosquias</li>
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Domicílios</li>
            <li><i class="fas fa-check-circle" style="color:var(--secondary); margin-right:10px;"></i>Cirurgias Gerais</li>
        </ul>
    </div>
</div>

<div class="modal" id="aboutModal" onclick="closeModal(event, 'aboutModal')">
    <div class="modal-box">
        <div class="modal-close" onclick="closeModal(null, 'aboutModal')">✕</div>
        <h2 style="font-family: Poppins; color: var(--primary); margin-bottom: 20px;">Sobre Nós</h2>
        <div style="line-height: 1.8; color: #334155;">
            <p><strong>O Centro Veterinário da Covilhã foi criado em 2002.</strong></p>
            <p>A clínica e a cirurgia dos animais de companhia são a nossa prioridade e principal atividade.</p>
            <p>Contamos con uma equipa experiente e instalações modernas para oferecer o melhor diagnóstico.</p>
        </div>
    </div>
</div>

<div class="modal" id="contactModal" onclick="closeModal(event, 'contactModal')">
    <div class="modal-box" style="text-align: center;">
        <div class="modal-close" onclick="closeModal(null, 'contactModal')">✕</div>
        <h2 style="font-family: Poppins; color: var(--primary);">Horário e Contacto</h2>
        
        <div class="schedule-display">
            <div class="schedule-row">
                <span class="day-label"><i class="far fa-clock"></i> Segunda a Sexta</span>
                <span style="color:var(--primary); font-weight:600;">10h-13h | 15h-20h</span>
            </div>
            <div class="schedule-row">
                <span class="day-label"><i class="far fa-clock"></i> Sábado</span>
                <span style="color:var(--primary); font-weight:600;">10h-13h | 14h30-16h</span>
            </div>
        </div>

        <div class="contact-actions">
            <a href="tel:<?= str_replace(' ', '', $clinic["phone_mobile"]) ?>" class="action-link link-tel">
                <i class="fas fa-phone-alt"></i> Chamar
            </a>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $clinic["email"] ?>" target="_blank" class="action-link link-mail">
                <i class="fas fa-envelope"></i> Gmail
            </a>
        </div>
    </div>
</div>

<script>
    // Gestión del Menú Hamburguesa
    const menuToggle = document.getElementById('mobile-menu');
    const navList = document.getElementById('nav-list');

    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('open');
        navList.classList.toggle('active');
    });

    function menuClose() {
        menuToggle.classList.remove('open');
        navList.classList.remove('active');
    }

    // Gestión de Modales
    function openModal(id) {
        document.getElementById(id).classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal(e, id) {
        if (!e || e.target.id === id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal').forEach(m => m.classList.remove('active'));
            document.body.style.overflow = '';
        }
    });
</script>

</body>
</html>