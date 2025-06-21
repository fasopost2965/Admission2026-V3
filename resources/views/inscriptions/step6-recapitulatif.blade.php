<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif inscription - École La Victoire</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #003C71;
            --primary-gold: #FFD700;
            --secondary-blue: #0056a3;
            --light-blue: #e6f2ff;
            --white: #ffffff;
            --gray-light: #f8f9fa;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 20px rgba(0, 0, 0, 0.15);
            --radius: 12px;
        }

        body {
            font-family: 'Poppins', 'Tajawal', sans-serif;
            background-color: var(--gray-light);
            color: var(--gray-dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: var(--white);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-gold), var(--primary-blue));
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--white);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-blue);
            font-family: 'Poppins', sans-serif;
        }

        .logo-subtitle {
            font-size: 0.875rem;
            color: var(--gray);
            font-family: 'Tajawal', sans-serif;
        }

        .operator-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--light-blue);
            padding: 0.5rem 1rem;
            border-radius: 50px;
        }

        .operator-avatar {
            width: 36px;
            height: 36px;
            background: var(--primary-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--primary-blue);
        }

        /* Progress Section */
        .progress-wrapper {
            background: var(--white);
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .progress-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 1rem;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e0e0e0;
            z-index: 1;
        }

        .progress-line-active {
            position: absolute;
            top: 20px;
            left: 0;
            width: 71%;
            height: 2px;
            background: var(--primary-gold);
            z-index: 2;
            transition: width 0.5s ease;
        }

        .progress-step {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        .step-link {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 8px;
            margin: -8px;
        }

        .step-link:hover {
            background: rgba(0, 60, 113, 0.05);
            transform: translateY(-2px);
        }

        .step-link:hover .step-circle {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 60, 113, 0.2);
        }

        .step-link:hover .step-label {
            color: var(--primary-blue);
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--white);
            border: 2px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--gray);
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
        }

        .step-circle.active {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            color: var(--white);
            transform: scale(1.1);
        }

        .step-circle.completed {
            background: var(--success);
            border-color: var(--success);
            color: var(--white);
        }

        .step-label {
            font-size: 0.75rem;
            color: var(--gray);
            text-align: center;
            max-width: 100px;
        }

        .step-label-ar {
            font-family: 'Tajawal', sans-serif;
            font-size: 0.7rem;
            opacity: 0.8;
        }

        .progress-step.active .step-label,
        .progress-step.completed .step-label {
            color: var(--primary-blue);
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }

        .form-container {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            animation: fadeIn 0.5s ease;
        }

        .form-header {
            text-align: center;
            padding: 2.5rem;
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--white) 100%);
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            font-size: 1.1rem;
            color: var(--gray);
            font-family: 'Tajawal', sans-serif;
        }

        /* ID Card */
        .id-card {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            padding: 2rem;
            margin: -2rem 2rem 2rem 2rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .id-photo {
            width: 120px;
            height: 150px;
            background: var(--white);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            font-size: 3rem;
            flex-shrink: 0;
        }

        .id-info {
            flex: 1;
        }

        .id-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .id-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .id-detail {
            font-size: 0.875rem;
        }

        .id-label {
            opacity: 0.8;
        }

        /* Summary Sections */
        .summary-container {
            padding: 2rem;
        }

        .summary-section {
            margin-bottom: 2rem;
            background: var(--gray-light);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .summary-header {
            background: var(--light-blue);
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .summary-header:hover {
            background: var(--primary-gold);
        }

        .summary-header.active {
            background: var(--primary-gold);
        }

        .summary-icon {
            width: 40px;
            height: 40px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .summary-title {
            flex: 1;
            font-weight: 600;
            color: var(--primary-blue);
        }

        .summary-toggle {
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .summary-header.active .summary-toggle {
            transform: rotate(180deg);
        }

        .summary-content {
            padding: 1.5rem;
            display: none;
        }

        .summary-content.active {
            display: block;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .summary-item {
            background: var(--white);
            padding: 1rem;
            border-radius: 8px;
            border-left: 3px solid var(--primary-gold);
        }

        .summary-label {
            font-size: 0.875rem;
            color: var(--gray);
            margin-bottom: 0.25rem;
        }

        .summary-value {
            font-weight: 600;
            color: var(--gray-dark);
        }

        /* Alert Boxes */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-success {
            background: #d4edda;
            border-left: 4px solid var(--success);
        }

        .alert-warning {
            background: #fff3cd;
            border-left: 4px solid var(--warning);
        }

        .alert-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        /* Documents Checklist */
        .documents-checklist {
            background: var(--white);
            border: 2px solid var(--light-blue);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin: 2rem 0;
        }

        .checklist-title {
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checklist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 0.75rem;
        }

        .checklist-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .checklist-item:hover {
            background: var(--gray-light);
        }

        .checklist-checkbox {
            width: 20px;
            height: 20px;
            accent-color: var(--primary-blue);
        }

        .checklist-label {
            flex: 1;
            cursor: pointer;
            user-select: none;
        }

        /* Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 3rem;
            padding: 2rem;
            background: var(--gray-light);
            border-top: 2px solid var(--light-blue);
        }

        .btn {
            padding: 0.875rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--secondary-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
        }

        .btn-secondary:hover {
            background: var(--light-blue);
        }

        .btn-warning {
            background: var(--warning);
            color: var(--gray-dark);
        }

        .btn-warning:hover {
            background: #e0a800;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        /* Print Button */
        .print-section {
            text-align: center;
        }

        .print-hint {
            font-size: 0.875rem;
            color: var(--gray);
            margin-top: 0.5rem;
        }

        /* Fee Summary */
        .fee-summary {
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--white) 100%);
            border-radius: var(--radius);
            padding: 2rem;
            margin: 2rem 0;
            text-align: center;
        }

        .fee-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 1rem;
        }

        .fee-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 1.5rem 0;
        }

        .fee-item {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .fee-label {
            font-size: 0.875rem;
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .fee-amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-gold);
        }

        .fee-total {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid var(--light-blue);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .id-card {
                flex-direction: column;
                text-align: center;
            }

            .id-details {
                grid-template-columns: 1fr;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .step-label {
                display: none;
            }
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
            }

            .header, .progress-wrapper, .form-actions {
                display: none;
            }

            .form-container {
                box-shadow: none;
            }

            .summary-content {
                display: block !important;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo-section">
                <div class="logo-icon">🎓</div>
                <div class="logo-text">
                    <div class="logo-title">École La Victoire</div>
                    <div class="logo-subtitle">مدرسة النصر</div>
                </div>
            </div>
            <div class="operator-info">
                <span>Opératrice: Fatima Z.</span>
                <div class="operator-avatar">FZ</div>
            </div>
        </div>
    </header>

    <!-- Progress Bar -->
    <div class="progress-wrapper">
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-line"></div>
                <div class="progress-line-active"></div>
                
                <div class="progress-step completed">
                    <a href="{{ route('inscription.step1') }}" class="step-link" data-step="1">
                        <div class="step-circle completed">✓</div>
                        <div class="step-label">
                            Type d'inscription
                            <div class="step-label-ar">نوع التسجيل</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step completed">
                    <a href="{{ route('inscription.step2') }}" class="step-link" data-step="2">
                        <div class="step-circle completed">✓</div>
                        <div class="step-label">
                            Informations élève
                            <div class="step-label-ar">معلومات التلميذ</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step completed">
                    <a href="{{ route('inscription.step3') }}" class="step-link" data-step="3">
                        <div class="step-circle completed">✓</div>
                        <div class="step-label">
                            Informations parents
                            <div class="step-label-ar">معلومات الوالدين</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step completed">
                    <a href="{{ route('inscription.step4') }}" class="step-link" data-step="4">
                        <div class="step-circle completed">✓</div>
                        <div class="step-label">
                            Informations médicales
                            <div class="step-label-ar">المعلومات الطبية</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step completed">
                    <a href="{{ route('inscription.step5') }}" class="step-link" data-step="5">
                        <div class="step-circle completed">✓</div>
                        <div class="step-label">
                            Fournitures
                            <div class="step-label-ar">اللوازم المدرسية</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step active">
                    <div class="step-circle active">6</div>
                    <div class="step-label">
                        Récapitulatif
                        <div class="step-label-ar">ملخص</div>
                    </div>
                </div>
                
                <div class="progress-step">
                    <a href="{{ route('inscription.step7', $inscription->id ?? '123') }}" class="step-link" data-step="7">
                        <div class="step-circle">7</div>
                        <div class="step-label">
                            Validation
                            <div class="step-label-ar">التأكيد</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="form-container">
            <div class="form-header">
                <h1 class="form-title">Récapitulatif de l'inscription</h1>
                <p class="form-subtitle">ملخص التسجيل</p>
            </div>

            <!-- ID Card -->
            <div class="id-card">
                <div class="id-photo">📷</div>
                <div class="id-info">
                    <h2 class="id-name">MARTIN Léa</h2>
                    <div class="id-details">
                        <div class="id-detail">
                            <span class="id-label">N° dossier:</span> 2024-1234
                        </div>
                        <div class="id-detail">
                            <span class="id-label">Classe:</span> CE2 (3ème année)
                        </div>
                        <div class="id-detail">
                            <span class="id-label">Date de naissance:</span> 15/03/2016
                        </div>
                        <div class="id-detail">
                            <span class="id-label">Type:</span> Nouvelle inscription
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-container">
                <!-- Success Alert -->
                <div class="alert alert-success">
                    <div class="alert-icon">✅</div>
                    <div>
                        <strong>Informations complètes!</strong> Toutes les étapes ont été remplies avec succès. Veuillez vérifier les informations ci-dessous avant de valider l'inscription.
                    </div>
                </div>

                <!-- Type d'inscription -->
                <div class="summary-section">
                    <div class="summary-header active" onclick="toggleSection(this)">
                        <div class="summary-icon">📋</div>
                        <h3 class="summary-title">Type d'inscription</h3>
                        <span class="summary-toggle">▼</span>
                    </div>
                    <div class="summary-content active">
                        <div class="summary-grid">
                            <div class="summary-item">
                                <div class="summary-label">Type</div>
                                <div class="summary-value">Nouvelle inscription</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Année scolaire</div>
                                <div class="summary-value">2024-2025</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Niveau demandé</div>
                                <div class="summary-value">CE2 (3ème année primaire)</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Régime</div>
                                <div class="summary-value">Externe</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations élève -->
                <div class="summary-section">
                    <div class="summary-header" onclick="toggleSection(this)">
                        <div class="summary-icon">👤</div>
                        <h3 class="summary-title">Informations de l'élève</h3>
                        <span class="summary-toggle">▼</span>
                    </div>
                    <div class="summary-content">
                        <div class="summary-grid">
                            <div class="summary-item">
                                <div class="summary-label">Nom complet</div>
                                <div class="summary-value">Bayane Ayoub</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Date de naissance</div>
                                <div class="summary-value">15/03/2016 à PaTetouan Maroc</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Nationalité</div>
                                <div class="summary-value">Marocaine</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Sexe</div>
                                <div class="summary-value">Masculin</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Adresse</div>
                                <div class="summary-value">123 Rue de la Paix, 75001 Tetouan</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">École précédente</div>
                                <div class="summary-value">École Jeanne d'Arc - CE2</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations parents -->
                <div class="summary-section">
                    <div class="summary-header" onclick="toggleSection(this)">
                        <div class="summary-icon">👨‍👩‍👧</div>
                        <h3 class="summary-title">Informations des parents</h3>
                        <span class="summary-toggle">▼</span>
                    </div>
                    <div class="summary-content">
                        <h4 style="color: var(--primary-blue); margin-bottom: 1rem;">Père</h4>
                        <div class="summary-grid">
                            <div class="summary-item">
                                <div class="summary-label">Nom complet</div>
                                <div class="summary-value">MARTIN Jean-Pierre</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Profession</div>
                                <div class="summary-value">Ingénieur</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Téléphone</div>
                                <div class="summary-value">06 12 34 56 78</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Email</div>
                                <div class="summary-value">jp.martin@email.com</div>
                            </div>
                        </div>

                        <h4 style="color: var(--primary-blue); margin: 1.5rem 0 1rem;">Mère</h4>
                        <div class="summary-grid">
                            <div class="summary-item">
                                <div class="summary-label">Nom complet</div>
                                <div class="summary-value">MARTIN Sophie</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Profession</div>
                                <div class="summary-value">Médecin</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Téléphone</div>
                                <div class="summary-value">06 87 65 43 21</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Email</div>
                                <div class="summary-value">s.martin@email.com</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations médicales -->
                <div class="summary-section">
                    <div class="summary-header" onclick="toggleSection(this)">
                        <div class="summary-icon">🏥</div>
                        <h3 class="summary-title">Informations médicales</h3>
                        <span class="summary-toggle">▼</span>
                    </div>
                    <div class="summary-content">
                        <div class="summary-grid">
                            <div class="summary-item">
                                <div class="summary-label">Groupe sanguin</div>
                                <div class="summary-value">A+</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Vaccinations</div>
                                <div class="summary-value">À jour</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Allergies</div>
                                <div class="summary-value">Aucune</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Médecin traitant</div>
                                <div class="summary-value">Dr. Dupont - 01 23 45 67 89</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Contact d'urgence</div>
                                <div class="summary-value">Grand-mère: 06 11 22 33 44</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Assurance scolaire</div>
                                <div class="summary-value">MAE - N° 123456789</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fournitures scolaires -->
                <div class="summary-section">
                    <div class="summary-header" onclick="toggleSection(this)">
                        <div class="summary-icon">📚</div>
                        <h3 class="summary-title">Fournitures scolaires</h3>
                        <span class="summary-toggle">▼</span>
                    </div>
                    <div class="summary-content">
                        <div class="alert alert-success">
                            <div class="alert-icon">✅</div>
                            <div>
                                <strong>100% des fournitures cochées</strong> - Liste complète validée pour CE2
                            </div>
                        </div>
                        <div class="summary-grid">
                            <div class="summary-item">
                                <div class="summary-label">Niveau</div>
                                <div class="summary-value">CE2 - 3ème année primaire</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Total fournitures</div>
                                <div class="summary-value">45 articles</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Date de remise</div>
                                <div class="summary-value">Jeudi 05 septembre 2024</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Attestation</div>
                                <div class="summary-value">Prête à imprimer</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents à fournir -->
                <div class="documents-checklist">
                    <h3 class="checklist-title">
                        <span>📄</span> Documents à fournir pour finaliser l'inscription
                    </h3>
                    <div class="checklist-grid">
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc1">
                            <label class="checklist-label" for="doc1">Certificat de scolarité de l'année précédente</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc2">
                            <label class="checklist-label" for="doc2">Extrait d'acte de naissance récent</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc3">
                            <label class="checklist-label" for="doc3">6 photos d'identité récentes</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc4">
                            <label class="checklist-label" for="doc4">Carnet de santé / vaccinations</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc5">
                            <label class="checklist-label" for="doc5">Attestation d'assurance scolaire</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc6">
                            <label class="checklist-label" for="doc6">Justificatif de domicile</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc7">
                            <label class="checklist-label" for="doc7">Copies CIN des parents</label>
                        </div>
                        <div class="checklist-item">
                            <input type="checkbox" class="checklist-checkbox" id="doc8">
                            <label class="checklist-label" for="doc8">Dossier médical (si applicable)</label>
                        </div>
                    </div>
                </div>

                <!-- Frais de scolarité -->
                <div class="fee-summary">
                    <h3 class="fee-title">Récapitulatif des frais de scolarité</h3>
                    <div class="fee-grid">
                        <div class="fee-item">
                            <div class="fee-label">Frais d'inscription</div>
                            <div class="fee-amount">500 DH</div>
                        </div>
                        <div class="fee-item">
                            <div class="fee-label">Frais de scolarité (mensuel)</div>
                            <div class="fee-amount">800 DH</div>
                        </div>
                        <div class="fee-item">
                            <div class="fee-label">Assurance scolaire</div>
                            <div class="fee-amount">400 DH</div>
                        </div>
                        <div class="fee-item">
                            <div class="fee-label">Activités parascolaires</div>
                            <div class="fee-amount">1,500 DH</div>
                        </div>
                    </div>
                    <div class="fee-total">
                        Total annuel: 10,400 DH
                    </div>
                </div>

                <!-- Notes importantes -->
                <div class="alert alert-warning">
                    <div class="alert-icon">⚠️</div>
                    <div>
                        <strong>Important:</strong> Cette inscription sera définitive après validation par l'administration et paiement des frais. Un email de confirmation vous sera envoyé dans les 48h.
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="goBack()">
                        ← Modifier les informations
                    </button>
                    
                    <div class="print-section">
                        <button type="button" class="btn btn-warning" onclick="printSummary()">
                            🖨️ Imprimer le récapitulatif
                        </button>
                        <p class="print-hint">Pour vos archives personnelles</p>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" onclick="proceedToValidation()">
                        Procéder à la validation →
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadSummaryData();
            updateProgressBar();
        });

        // Load summary data from previous steps
        function loadSummaryData() {
            // This would normally load from localStorage or session
            const registrationData = {
                type: localStorage.getItem('registrationType') || 'new',
                level: localStorage.getItem('level') || 'CE2',
                student: JSON.parse(localStorage.getItem('studentInfo') || '{}'),
                parents: JSON.parse(localStorage.getItem('parentsInfo') || '{}'),
                medical: JSON.parse(localStorage.getItem('medicalInfo') || '{}'),
                supplies: JSON.parse(localStorage.getItem('suppliesInfo') || '{}')
            };

            // Update the display with actual data
            updateSummaryDisplay(registrationData);
        }

        // Update summary display
        function updateSummaryDisplay(data) {
            // This would update all the summary sections with actual data
            // For now, using placeholder data
        }

        // Toggle section visibility
        function toggleSection(header) {
            const content = header.nextElementSibling;
            const toggle = header.querySelector('.summary-toggle');
            
            header.classList.toggle('active');
            content.classList.toggle('active');
        }

        // Update progress bar
        function updateProgressBar() {
            const progressLine = document.querySelector('.progress-line-active');
            progressLine.style.width = '71%';
        }

        // Print summary
        function printSummary() {
            // Expand all sections for printing
            document.querySelectorAll('.summary-content').forEach(content => {
                content.classList.add('active');
            });
            
            window.print();
        }

        // Go back to previous step
        function goBack() {
            if (confirm('Voulez-vous modifier les informations saisies ?')) {
                // Navigate to the desired step
                window.location.href = '{{ route("inscription.step5") }}';
            }
        }

        // Proceed to validation
        function proceedToValidation() {
            // Check if all documents are checked
            const checkboxes = document.querySelectorAll('.checklist-checkbox');
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            
            if (!allChecked) {
                alert('Veuillez confirmer que vous avez tous les documents requis avant de continuer.');
                return;
            }
            
            // Save summary state
            localStorage.setItem('summaryCompleted', 'true');
            
            // Navigate to validation step using the inscription ID from session
            const inscriptionId = '{{ $inscription->id ?? "123" }}';
            window.location.href = `/inscription/${inscriptionId}/validation`;
        }

        // Document checklist tracking
        document.querySelectorAll('.checklist-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                updateDocumentProgress();
            });
        });

        function updateDocumentProgress() {
            const checkboxes = document.querySelectorAll('.checklist-checkbox');
            const checked = Array.from(checkboxes).filter(cb => cb.checked).length;
            const total = checkboxes.length;
            
            // Update visual feedback
            if (checked === total) {
                document.querySelector('.documents-checklist').style.borderColor = 'var(--success)';
            }
        }

        // Auto-save functionality
        function autoSave() {
            const summaryData = {
                timestamp: new Date().toISOString(),
                documentsChecked: Array.from(document.querySelectorAll('.checklist-checkbox'))
                    .map(cb => ({ id: cb.id, checked: cb.checked }))
            };
            
            localStorage.setItem('summaryData', JSON.stringify(summaryData));
        }

        // Auto-save every 30 seconds
        setInterval(autoSave, 30000);

        // Save on page unload
        window.addEventListener('beforeunload', autoSave);
    </script>
</body>
</html> 