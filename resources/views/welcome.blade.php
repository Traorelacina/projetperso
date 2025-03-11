<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AgriConnect - Plateforme de mise en relation agriculteurs-commerçants</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            :root {
                --primary-blue: #1a73e8;
                --secondary-blue: #4285f4;
                --light-blue: #e8f0fe;
                --dark-blue: #0d47a1;
                --white: #ffffff;
                --light-gray: #f8f9fa;
                --text-dark: #202124;
                --text-gray: #5f6368;
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Instrument Sans', sans-serif;
                background-color: var(--white);
                color: var(--text-dark);
                line-height: 1.6;
            }
            
            .container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }
            
            /* Header & Navigation */
            header {
                background-color: var(--white);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                position: fixed;
                width: 100%;
                top: 0;
                z-index: 100;
            }
            
            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 0;
            }
            
            .logo {
                display: flex;
                align-items: center;
            }
            
            .logo img {
                height: 40px;
                margin-right: 10px;
            }
            
            .logo-text {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--primary-blue);
            }
            
            .nav-links {
                display: flex;
                list-style: none;
            }
            
            .nav-links li {
                margin-left: 25px;
            }
            
            .nav-links a {
                text-decoration: none;
                color: var(--text-gray);
                font-weight: 500;
                transition: color 0.3s;
            }
            
            .nav-links a:hover {
                color: var(--primary-blue);
            }
            
            .cta-button {
                background-color: var(--primary-blue);
                color: var(--white);
                padding: 10px 20px;
                border-radius: 4px;
                font-weight: 500;
                transition: background-color 0.3s;
            }
            
            .cta-button:hover {
                background-color: var(--dark-blue);
                color: var(--white);
            }
            
            .mobile-menu-btn {
                display: none;
                background: none;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
                color: var(--primary-blue);
            }
            
            /* Hero Section */
            .hero {
                background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
                color: var(--white);
                padding: 160px 0 80px;
                text-align: center;
            }
            
            .hero h1 {
                font-size: 2.8rem;
                margin-bottom: 20px;
                font-weight: 600;
            }
            
            .hero p {
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto 30px;
            }
            
            .hero-buttons {
                display: flex;
                justify-content: center;
                gap: 15px;
                margin-top: 30px;
            }
            
            .hero-buttons .primary-btn {
                background-color: var(--white);
                color: var(--primary-blue);
                padding: 12px 25px;
                border-radius: 4px;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s;
            }
            
            .hero-buttons .primary-btn:hover {
                background-color: var(--light-gray);
                transform: translateY(-2px);
            }
            
            .hero-buttons .secondary-btn {
                background-color: transparent;
                color: var(--white);
                padding: 12px 25px;
                border-radius: 4px;
                font-weight: 500;
                text-decoration: none;
                border: 1px solid var(--white);
                transition: all 0.3s;
            }
            
            .hero-buttons .secondary-btn:hover {
                background-color: rgba(255, 255, 255, 0.1);
                transform: translateY(-2px);
            }
            
            /* Features Section */
            .features {
                padding: 80px 0;
                background-color: var(--light-gray);
            }
            
            .section-title {
                text-align: center;
                margin-bottom: 50px;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
                color: var(--text-dark);
                margin-bottom: 15px;
            }
            
            .section-title p {
                color: var(--text-gray);
                max-width: 700px;
                margin: 0 auto;
            }
            
            .features-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
            }
            
            .feature-card {
                background-color: var(--white);
                border-radius: 8px;
                padding: 30px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }
            
            .feature-icon {
                width: 60px;
                height: 60px;
                background-color: var(--light-blue);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 20px;
            }
            
            .feature-icon i {
                color: var(--primary-blue);
                font-size: 1.5rem;
            }
            
            .feature-card h3 {
                font-size: 1.4rem;
                margin-bottom: 15px;
                color: var(--primary-blue);
            }
            
            .feature-card p {
                color: var(--text-gray);
            }
            
            /* Benefits Section */
            .benefits {
                padding: 80px 0;
            }
            
            .benefits-container {
                display: flex;
                align-items: center;
                gap: 50px;
            }
            
            .benefits-content {
                flex: 1;
            }
            
            .benefits-image {
                flex: 1;
                text-align: center;
            }
            
            .benefits-image img {
                max-width: 100%;
                border-radius: 8px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }
            
            .benefits-content h2 {
                font-size: 2.2rem;
                margin-bottom: 20px;
                color: var(--text-dark);
            }
            
            .benefits-list {
                list-style: none;
            }
            
            .benefits-list li {
                margin-bottom: 15px;
                display: flex;
                align-items: flex-start;
            }
            
            .benefits-list i {
                color: var(--primary-blue);
                margin-right: 10px;
                font-size: 1.2rem;
            }
            
            /* Call to Action */
            .cta {
                background-color: var(--primary-blue);
                padding: 80px 0;
                text-align: center;
                color: var(--white);
            }
            
            .cta h2 {
                font-size: 2.2rem;
                margin-bottom: 20px;
            }
            
            .cta p {
                max-width: 700px;
                margin: 0 auto 30px;
                font-size: 1.1rem;
            }
            
            .cta-buttons {
                display: flex;
                justify-content: center;
                gap: 15px;
            }
            
            .cta-buttons .white-btn {
                background-color: var(--white);
                color: var(--primary-blue);
                padding: 12px 25px;
                border-radius: 4px;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s;
            }
            
            .cta-buttons .white-btn:hover {
                background-color: var(--light-gray);
                transform: translateY(-2px);
            }
            
            .cta-buttons .outline-btn {
                background-color: transparent;
                color: var(--white);
                padding: 12px 25px;
                border-radius: 4px;
                font-weight: 500;
                text-decoration: none;
                border: 1px solid var(--white);
                transition: all 0.3s;
            }
            
            .cta-buttons .outline-btn:hover {
                background-color: rgba(255, 255, 255, 0.1);
                transform: translateY(-2px);
            }
            
            /* Footer */
            footer {
                background-color: var(--dark-blue);
                color: var(--white);
                padding: 60px 0 20px;
            }
            
            .footer-content {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 40px;
                margin-bottom: 40px;
            }
            
            .footer-column h3 {
                font-size: 1.2rem;
                margin-bottom: 20px;
                font-weight: 600;
            }
            
            .footer-links {
                list-style: none;
            }
            
            .footer-links li {
                margin-bottom: 10px;
            }
            
            .footer-links a {
                color: rgba(255, 255, 255, 0.8);
                text-decoration: none;
                transition: color 0.3s;
            }
            
            .footer-links a:hover {
                color: var(--white);
            }
            
            .social-links {
                display: flex;
                gap: 15px;
            }
            
            .social-links a {
                color: rgba(255, 255, 255, 0.8);
                font-size: 1.2rem;
                transition: color 0.3s;
            }
            
            .social-links a:hover {
                color: var(--white);
            }
            
            .footer-bottom {
                text-align: center;
                padding-top: 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.6);
            }
            
            /* Responsive Styles */
            @media (max-width: 992px) {
                .features-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
                
                .benefits-container {
                    flex-direction: column;
                }
                
                .footer-content {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
            
            @media (max-width: 768px) {
                .nav-links {
                    display: none;
                }
                
                .mobile-menu-btn {
                    display: block;
                }
                
                .hero h1 {
                    font-size: 2.2rem;
                }
                
                .hero p {
                    font-size: 1rem;
                }
                
                .hero-buttons {
                    flex-direction: column;
                    align-items: center;
                }
                
                .features-grid {
                    grid-template-columns: 1fr;
                }
                
                .footer-content {
                    grid-template-columns: 1fr;
                    gap: 30px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <header>
            <div class="container">
                <nav class="navbar">
                    <div class="logo">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#1a73e8"/>
                            <path d="M10 20C10 14.477 14.477 10 20 10C25.523 10 30 14.477 30 20C30 25.523 25.523 30 20 30" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M15 20C15 17.239 17.239 15 20 15C22.761 15 25 17.239 25 20C25 22.761 22.761 25 20 25C17.239 25 15 22.761 15 20Z" stroke="white" stroke-width="2"/>
                            <path d="M20 25V30" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M10 22.5H15" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12.5 30L12.5 25" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span class="logo-text">AgriConnect</span>
                    </div>
                    
                    <ul class="nav-links">
                        <li><a href="#features">Fonctionnalités</a></li>
                        <li><a href="#benefits">Avantages</a></li>
                        <li><a href="#" class="cta-button">S'inscrire</a></li>
                    </ul>
                    
                    <button class="mobile-menu-btn">≡</button>
                </nav>
            </div>
        </header>
        
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1>Transformez l'agriculture ivoirienne<br>avec AgriConnect</h1>
                <p>Une plateforme numérique complète qui connecte directement les agriculteurs aux commerçants, tout en offrant des services à valeur ajoutée pour améliorer la productivité et la rentabilité.</p>
                <div class="hero-buttons">
                    <a href="{{ route('register') }} " class="primary-btn">Commencer maintenant</a>
                    <a href="#" class="secondary-btn">En savoir plus</a>
                </div>
            </div>
        </section>
        
        <!-- Features Section -->
        <section class="features" id="features">
            <div class="container">
                <div class="section-title">
                    <h2>Nos fonctionnalités principales</h2>
                    <p>AgriConnect offre une gamme complète de services pour tous les acteurs de la chaîne de valeur agricole.</p>
                </div>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i>👨‍🌾</i>
                        </div>
                        <h3>Espace Agriculteurs</h3>
                        <p>Gérez votre profil, vos produits et vos ventes. Suivez les tendances du marché et planifiez vos cultures efficacement.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i>🏪</i>
                        </div>
                        <h3>Espace Commerçants</h3>
                        <p>Recherchez des produits, passez des commandes directes et comparez les prix. Suivez vos achats et évaluez vos fournisseurs.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i>🚚</i>
                        </div>
                        <h3>Logistique Intégrée</h3>
                        <p>Profitez d'un réseau de transporteurs certifiés avec suivi en temps réel et optimisation des itinéraires.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i>🎓</i>
                        </div>
                        <h3>Formation et Accompagnement</h3>
                        <p>Accédez à des ressources, des forums thématiques et des webinaires avec des experts du secteur agricole.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i>💳</i>
                        </div>
                        <h3>Services Financiers</h3>
                        <p>Bénéficiez de microcrédits, d'épargne dédiée et d'assurance récolte pour sécuriser votre activité.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i>📊</i>
                        </div>
                        <h3>Analyse de Données</h3>
                        <p>Exploitez les tendances du marché, les prévisions de récolte et des rapports personnalisés pour prendre les meilleures décisions.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Benefits Section -->
        <section class="benefits" id="benefits">
            <div class="container">
                <div class="benefits-container">
                    <div class="benefits-content">
                        <h2>Les avantages d'AgriConnect</h2>
                        <ul class="benefits-list">
                            <li>
                                <i>✓</i>
                                <div>
                                    <strong>Pour les agriculteurs</strong>: Augmentation des revenus de 15-30% grâce à l'élimination des intermédiaires et réduction des pertes post-récolte de 20-40%.
                                </div>
                            </li>
                            <li>
                                <i>✓</i>
                                <div>
                                    <strong>Pour les commerçants</strong>: Réduction des coûts d'approvisionnement de 10-25% et amélioration de la qualité et de la traçabilité des produits.
                                </div>
                            </li>
                            <li>
                                <i>✓</i>
                                <div>
                                    <strong>Pour l'économie ivoirienne</strong>: Création d'emplois, augmentation de la production agricole nationale et modernisation du secteur.
                                </div>
                            </li>
                            <li>
                                <i>✓</i>
                                <div>
                                    <strong>Technologie accessible</strong>: Applications web et mobile compatibles avec tous les appareils, même en zone à faible connectivité.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="benefits-image">
                        <img src="/api/placeholder/500/400" alt="Agriculteurs utilisant AgriConnect" />
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Call to Action Section -->
        <section class="cta">
            <div class="container">
                <h2>Rejoignez la révolution agricole numérique</h2>
                <p>Inscrivez-vous dès aujourd'hui pour transformer votre activité agricole ou commerciale et contribuer au développement durable de l'agriculture ivoirienne.</p>
                <div class="cta-buttons">
                    <a href="{{ route('register') }} " class="white-btn">S'inscrire gratuitement</a>
                    <a href="#" class="outline-btn">Demander une démo</a>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>AgriConnect</h3>
                        <p>Transformez la chaîne de valeur agricole en Côte d'Ivoire en connectant directement les producteurs aux acheteurs.</p>
                        <div class="social-links">
                            <a href="#">FB</a>
                            <a href="#">TW</a>
                            <a href="#">IN</a>
                            <a href="#">YT</a>
                        </div>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Liens rapides</h3>
                        <ul class="footer-links">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#features">Fonctionnalités</a></li>
                            <li><a href="#benefits">Avantages</a></li>
                            <li><a href="#">Tarification</a></li>
                            <li><a href="#">À propos</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Ressources</h3>
                        <ul class="footer-links">
                            <li><a href="#">Centre d'aide</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Témoignages</a></li>
                            <li><a href="#">Tutoriels</a></li>
                            <li><a href="#">Études de cas</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Contact</h3>
                        <ul class="footer-links">
                            <li>Abidjan, Côte d'Ivoire</li>
                            <li>info@agriconnect.ci</li>
                            <li>+225 XX XX XX XX</li>
                        </ul>
                    </div>
                </div>
                
                <div class="footer-bottom">
                    <p>&copy; 2025 AgriConnect. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </body>
</html>