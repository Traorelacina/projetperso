<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Créer un compte | AgriConnect</title>

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
                --gray: #e1e1e1;
                --text-dark: #202124;
                --text-gray: #5f6368;
                --error-red: #d93025;
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Instrument Sans', sans-serif;
                background-color: var(--light-gray);
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
                padding: 15px 0;
            }
            
            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .logo {
                display: flex;
                align-items: center;
                text-decoration: none;
            }
            
            .logo svg {
                margin-right: 10px;
            }
            
            .logo-text {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--primary-blue);
            }
            
            /* Main Content */
            .main-content {
                padding: 60px 0;
            }
            
            .registration-container {
                max-width: 900px;
                margin: 0 auto;
                background-color: var(--white);
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            
            .registration-header {
                background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
                color: var(--white);
                padding: 30px;
                text-align: center;
            }
            
            .registration-header h1 {
                font-size: 2rem;
                margin-bottom: 10px;
            }
            
            .registration-header p {
                opacity: 0.9;
            }
            
            .form-container {
                padding: 30px;
            }
            
            .form-tabs {
                display: flex;
                border-bottom: 1px solid var(--gray);
                margin-bottom: 30px;
            }
            
            .form-tab {
                padding: 15px 20px;
                cursor: pointer;
                font-weight: 500;
                color: var(--text-gray);
                position: relative;
            }
            
            .form-tab.active {
                color: var(--primary-blue);
            }
            
            .form-tab.active::after {
                content: '';
                position: absolute;
                bottom: -1px;
                left: 0;
                width: 100%;
                height: 3px;
                background-color: var(--primary-blue);
            }
            
            .tab-content {
                display: none;
            }
            
            .tab-content.active {
                display: block;
            }
            
            .form-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            
            .form-group.full-width {
                grid-column: span 2;
            }
            
            .form-label {
                display: block;
                margin-bottom: 8px;
                font-weight: 500;
                color: var(--text-dark);
            }
            
            .form-control {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid var(--gray);
                border-radius: 4px;
                font-size: 1rem;
                transition: border-color 0.3s, box-shadow 0.3s;
            }
            
            .form-control:focus {
                border-color: var(--primary-blue);
                box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
                outline: none;
            }
            
            .form-check {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
            }
            
            .form-check-input {
                margin-right: 10px;
            }
            
            .help-text {
                font-size: 0.85rem;
                color: var(--text-gray);
                margin-top: 5px;
            }
            
            .btn {
                display: inline-block;
                padding: 12px 24px;
                background-color: var(--primary-blue);
                color: var(--white);
                border: none;
                border-radius: 4px;
                font-size: 1rem;
                font-weight: 500;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.2s;
            }
            
            .btn:hover {
                background-color: var(--dark-blue);
                transform: translateY(-2px);
            }
            
            .btn-block {
                display: block;
                width: 100%;
            }
            
            .text-center {
                text-align: center;
            }
            
            .login-link {
                margin-top: 20px;
                color: var(--text-gray);
            }
            
            .login-link a {
                color: var(--primary-blue);
                text-decoration: none;
            }
            
            .login-link a:hover {
                text-decoration: underline;
            }
            
            .error-message {
                color: var(--error-red);
                font-size: 0.85rem;
                margin-top: 5px;
                display: none;
            }
            
            .form-control.error {
                border-color: var(--error-red);
            }
            
            .form-control.error + .error-message {
                display: block;
            }
            
            /* Farmer specific fields */
            .farmer-fields {
                display: none;
            }
            
            /* Input file custom styling */
            .file-input-container {
                position: relative;
                margin-bottom: 20px;
            }
            
            .file-input-label {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border: 2px dashed var(--gray);
                border-radius: 4px;
                padding: 20px;
                text-align: center;
                cursor: pointer;
                transition: border-color 0.3s;
            }
            
            .file-input-label:hover {
                border-color: var(--primary-blue);
            }
            
            .file-input-label i {
                font-size: 2rem;
                color: var(--primary-blue);
                margin-bottom: 10px;
            }
            
            .file-input {
                position: absolute;
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                z-index: -1;
            }
            
            .file-name {
                margin-top: 10px;
                font-size: 0.9rem;
                color: var(--text-gray);
            }
            
            /* Responsive styles */
            @media (max-width: 768px) {
                .form-grid {
                    grid-template-columns: 1fr;
                }
                
                .form-group.full-width {
                    grid-column: span 1;
                }
                
                .registration-header h1 {
                    font-size: 1.5rem;
                }
                
                .form-container {
                    padding: 20px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <header>
            <div class="container">
                <nav class="navbar">
                    <a href="/" class="logo">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#1a73e8"/>
                            <path d="M10 20C10 14.477 14.477 10 20 10C25.523 10 30 14.477 30 20C30 25.523 25.523 30 20 30" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M15 20C15 17.239 17.239 15 20 15C22.761 15 25 17.239 25 20C25 22.761 22.761 25 20 25C17.239 25 15 22.761 15 20Z" stroke="white" stroke-width="2"/>
                            <path d="M20 25V30" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M10 22.5H15" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12.5 30L12.5 25" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span class="logo-text">AgriConnect</span>
                    </a>
                </nav>
            </div>
        </header>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="container">
                <div class="registration-container">
                    <div class="registration-header">
                        <h1>Créer votre compte AgriConnect</h1>
                        <p>Rejoignez notre plateforme pour connecter l'agriculture ivoirienne</p>
                    </div>
                    
                    <div class="form-container">
                        <div class="form-tabs">
                            <div class="form-tab active" data-tab="commerçant">Je suis Commerçant</div>
                            <div class="form-tab" data-tab="agriculteur">Je suis Agriculteur</div>
                        </div>
                        
                        <form id="registration-form" action="/register" method="POST" enctype="multipart/form-data">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="profileable_type" id="profileable_type" value="App\Models\Merchant">
                            
                            <div class="tab-content active" id="commerçant-tab">
                                <!-- Informations de base communes à tous -->
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nom complet *</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                        <div class="error-message">Veuillez saisir votre nom complet</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="form-label">Adresse email *</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                        <div class="error-message">Veuillez saisir une adresse email valide</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Numéro de téléphone *</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" required>
                                        <div class="error-message">Veuillez saisir un numéro de téléphone valide</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="region_id" class="form-label">Région *</label>
                                        <select id="region_id" name="region_id" class="form-control" required>
                                            <option value="">Sélectionnez votre région</option>
                                            <option value="1">Abidjan</option>
                                            <option value="2">Basilikiri</option>
                                            <option value="3">Bouaké</option>
                                            <option value="4">Daloa</option>
                                            <option value="5">Divo</option>
                                            <option value="6">Korhogo</option>
                                            <option value="7">San Pedro</option>
                                            <option value="8">Yamoussoukro</option>
                                            <option value="9">Man</option>
                                            <option value="10">Odienné</option>
                                            <option value="11">Séguéla</option>
                                            <option value="12">Touba</option>
                                            <option value="13">Ferkessédougou</option>
                                            <option value="14">Aboisso</option>
                                            <option value="15">Bondoukou</option>
                                            <option value="16">Tanda</option>
                                            <option value="17">Gagnoa</option>
                                            <option value="18">Agboville</option>
                                            <option value="19">Bongouanou</option>
                                        </select>
                                        <div class="error-message">Veuillez sélectionner votre région</div>
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <label for="address" class="form-label">Adresse *</label>
                                        <input type="text" id="address" name="address" class="form-control" required>
                                        <div class="error-message">Veuillez saisir votre adresse</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password" class="form-label">Mot de passe *</label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                        <div class="help-text">Au moins 8 caractères, une majuscule, un chiffre et un caractère spécial</div>
                                        <div class="error-message">Le mot de passe doit contenir au moins 8 caractères</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe *</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                        <div class="error-message">Les mots de passe ne correspondent pas</div>
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <div class="file-input-container">
                                            <label for="profile_image" class="file-input-label">
                                                <i>📷</i>
                                                <span>Photo de profil (optionnelle)</span>
                                                <span class="file-name">Aucun fichier sélectionné</span>
                                            </label>
                                            <input type="file" id="profile_image" name="profile_image" class="file-input" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tab content for Agriculteur -->
                            <div class="tab-content" id="agriculteur-tab">
                                <!-- The same basic fields will be shown here, plus farmer specific fields -->
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label for="name-farmer" class="form-label">Nom complet *</label>
                                        <input type="text" id="name-farmer" name="name" class="form-control" required>
                                        <div class="error-message">Veuillez saisir votre nom complet</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email-farmer" class="form-label">Adresse email *</label>
                                        <input type="email" id="email-farmer" name="email" class="form-control" required>
                                        <div class="error-message">Veuillez saisir une adresse email valide</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone-farmer" class="form-label">Numéro de téléphone *</label>
                                        <input type="tel" id="phone-farmer" name="phone" class="form-control" required>
                                        <div class="error-message">Veuillez saisir un numéro de téléphone valide</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="region_id-farmer" class="form-label">Région *</label>
                                        <select id="region_id-farmer" name="region_id" class="form-control" required>
                                            <option value="">Sélectionnez votre région</option>
                                            <option value="1">Abidjan</option>
                                            <option value="2">Basilikiri</option>
                                            <option value="3">Bouaké</option>
                                            <option value="4">Daloa</option>
                                            <option value="5">Divo</option>
                                            <option value="6">Korhogo</option>
                                            <option value="7">San Pedro</option>
                                            <option value="8">Yamoussoukro</option>
                                            <option value="9">Man</option>
                                            <option value="10">Odienné</option>
                                            <option value="11">Séguéla</option>
                                            <option value="12">Touba</option>
                                            <option value="13">Ferkessédougou</option>
                                            <option value="14">Aboisso</option>
                                            <option value="15">Bondoukou</option>
                                            <option value="16">Tanda</option>
                                            <option value="17">Gagnoa</option>
                                            <option value="18">Agboville</option>
                                            <option value="19">Bongouanou</option>
                                        </select>
                                        <div class="error-message">Veuillez sélectionner votre région</div>
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <label for="address-farmer" class="form-label">Adresse *</label>
                                        <input type="text" id="address-farmer" name="address" class="form-control" required>
                                        <div class="error-message">Veuillez saisir votre adresse</div>
                                    </div>
                                    
                                    <!-- Farmer specific fields -->
                                    <div class="form-group">
                                        <label for="farm_name" class="form-label">Nom de la ferme *</label>
                                        <input type="text" id="farm_name" name="profileable[farm_name]" class="form-control" data-required="true">
                                        <div class="error-message">Veuillez saisir le nom de votre ferme</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="farm_size" class="form-label">Taille de la ferme (hectares) *</label>
                                        <input type="number" id="farm_size" name="profileable[farm_size]" class="form-control farmer-field" min="0" step="0.1" required>
                                        <div class="error-message">Veuillez saisir une taille valide</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="experience_years" class="form-label">Années d'expérience *</label>
                                        <input type="number" id="experience_years" name="profileable[experience_years]" class="form-control farmer-field" min="0" required>
                                        <div class="error-message">Veuillez saisir vos années d'expérience</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="production_capacity" class="form-label">Capacité de production (tonnes/an) *</label>
                                        <input type="number" id="production_capacity" name="profileable[production_capacity]" class="form-control farmer-field" min="0" step="0.1" required>
                                        <div class="error-message">Veuillez saisir votre capacité de production</div>
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <label for="farm_description" class="form-label">Description de la ferme *</label>
                                        <textarea id="farm_description" name="profileable[farm_description]" class="form-control farmer-field" rows="4" required></textarea>
                                        <div class="error-message">Veuillez décrire votre ferme</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="farm_latitude" class="form-label">Latitude (optionnelle)</label>
                                        <input type="text" id="farm_latitude" name="profileable[farm_latitude]" class="form-control farmer-field">
                                        <div class="help-text">Exemple: 5.3600</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="farm_longitude" class="form-label">Longitude (optionnelle)</label>
                                        <input type="text" id="farm_longitude" name="profileable[farm_longitude]" class="form-control farmer-field">
                                        <div class="help-text">Exemple: -4.0083</div>
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <label class="form-label">Certifications (optionnelles)</label>
                                        <div class="form-check">
                                            <input type="checkbox" id="cert_bio" name="profileable[certifications][]" value="bio" class="form-check-input farmer-field">
                                            <label for="cert_bio">Agriculture biologique</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="cert_fair_trade" name="profileable[certifications][]" value="fair_trade" class="form-check-input farmer-field">
                                            <label for="cert_fair_trade">Commerce équitable</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="cert_rainforest" name="profileable[certifications][]" value="rainforest" class="form-check-input farmer-field">
                                            <label for="cert_rainforest">Rainforest Alliance</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="cert_global_gap" name="profileable[certifications][]" value="global_gap" class="form-check-input farmer-field">
                                            <label for="cert_global_gap">GlobalG.A.P.</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password-farmer" class="form-label">Mot de passe *</label>
                                        <input type="password" id="password-farmer" name="password" class="form-control" required>
                                        <div class="help-text">Au moins 8 caractères, une majuscule, un chiffre et un caractère spécial</div>
                                        <div class="error-message">Le mot de passe doit contenir au moins 8 caractères</div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password_confirmation-farmer" class="form-label">Confirmer le mot de passe *</label>
                                        <input type="password" id="password_confirmation-farmer" name="password_confirmation" class="form-control" required>
                                        <div class="error-message">Les mots de passe ne correspondent pas</div>
                                    </div>
                                    
                                    <div class="form-group full-width">
                                        <div class="file-input-container">
                                            <label for="profile_image-farmer" class="file-input-label">
                                                <i>📷</i>
                                                <span>Photo de profil (optionnelle)</span>
                                                <span class="file-name">Aucun fichier sélectionné</span>
                                            </label>
                                            <input type="file" id="profile_image-farmer" name="profile_image" class="file-input" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-check full-width">
                                <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                                <label for="terms">J'accepte les <a href="#" target="_blank">conditions d'utilisation</a> et la <a href="#" target="_blank">politique de confidentialité</a> *</label>
                            </div>
                            
                            <button type="submit" class="btn btn-block">Créer mon compte</button>
                            
                            <p class="text-center login-link">
                                Vous avez déjà un compte? <a href="/login">Connectez-vous ici</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.form-tab');
    const tabContents = document.querySelectorAll('.tab-content');
    const profileableTypeInput = document.getElementById('profileable_type');
    
    // Fonction pour gérer la visibilité et le required des champs
    function toggleTabFields() {
        // Désactiver tous les champs dans les onglets inactifs
        document.querySelectorAll('.tab-content:not(.active) input, .tab-content:not(.active) select, .tab-content:not(.active) textarea').forEach(field => {
            field.disabled = true;
        });
        
        // Activer tous les champs dans l'onglet actif
        document.querySelectorAll('.tab-content.active input, .tab-content.active select, .tab-content.active textarea').forEach(field => {
            field.disabled = false;
        });
    }
    
    // Initialiser l'état des champs au chargement
    toggleTabFields();
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all tab contents
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding tab content
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId + '-tab').classList.add('active');
            
            // Update the profileable_type hidden input
            if (tabId === 'agriculteur') {
                profileableTypeInput.value = 'App\\Models\\Farmer';
            } else {
                profileableTypeInput.value = 'App\\Models\\Merchant';
            }
            
            // Toggle fields visibility and required state
            toggleTabFields();
        });
    });
    
    // File input custom styling
    const fileInputs = document.querySelectorAll('.file-input');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const fileName = this.value.split('\\').pop();
            const fileNameElement = this.previousElementSibling.querySelector('.file-name');
            
            if (fileName) {
                fileNameElement.textContent = fileName;
            } else {
                fileNameElement.textContent = 'Aucun fichier sélectionné';
            }
        });
    });
    
    // Form validation
    const form = document.getElementById('registration-form');
    form.addEventListener('submit', function(event) {
        let isValid = true;
        
        // Get active tab
        const activeTab = document.querySelector('.tab-content.active');
        const inputs = activeTab.querySelectorAll('input[required]:not([disabled]), select[required]:not([disabled]), textarea[required]:not([disabled])');
        
        inputs.forEach(input => {
            if (!input.value) {
                input.classList.add('error');
                isValid = false;
            } else {
                input.classList.remove('error');
            }
        });
        
        // Email validation
        const emailInput = activeTab.querySelector('input[type="email"]');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailInput.value && !emailRegex.test(emailInput.value)) {
            emailInput.classList.add('error');
            isValid = false;
        }
        
        // Password validation
        const passwordInput = activeTab.querySelector('input[name="password"]');
        const confirmPasswordInput = activeTab.querySelector('input[name="password_confirmation"]');
        
        if (passwordInput.value.length < 8) {
            passwordInput.classList.add('error');
            isValid = false;
        }
        
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.classList.add('error');
            isValid = false;
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    });
});

        </script>
    </body>
</html>