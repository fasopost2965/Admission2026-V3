<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fournitures scolaires - École La Victoire</title>
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
            width: 57%;
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

        /* Level Info */
        .level-info {
            background: var(--primary-gold);
            color: var(--primary-blue);
            padding: 1rem 2rem;
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Supplies Container */
        .supplies-container {
            padding: 2.5rem;
        }

        /* Alert Box */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-info {
            background: var(--light-blue);
            border-left: 4px solid var(--info);
        }

        .alert-icon {
            font-size: 1.5rem;
            color: var(--info);
            flex-shrink: 0;
        }

        /* Progress Stats */
        .progress-stats {
            background: var(--gray-light);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-blue);
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--gray);
        }

        /* Categories */
        .category-section {
            margin-bottom: 2.5rem;
        }

        .category-header {
            background: var(--light-blue);
            padding: 1rem 1.5rem;
            border-radius: var(--radius) var(--radius) 0 0;
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-header:hover {
            background: var(--primary-gold);
        }

        .category-icon {
            width: 40px;
            height: 40px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .category-title {
            flex: 1;
            font-weight: 600;
            color: var(--primary-blue);
        }

        .category-count {
            background: var(--primary-blue);
            color: var(--white);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
        }

        .category-items {
            border: 2px solid var(--light-blue);
            border-top: none;
            border-radius: 0 0 var(--radius) var(--radius);
            padding: 1rem;
        }

        /* Supply Items */
        .supply-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            transition: all 0.2s ease;
        }

        .supply-item:hover {
            background: var(--gray-light);
        }

        .supply-checkbox {
            width: 22px;
            height: 22px;
            accent-color: var(--primary-blue);
            cursor: pointer;
            flex-shrink: 0;
        }

        .supply-label {
            flex: 1;
            margin-left: 1rem;
            cursor: pointer;
            user-select: none;
        }

        .supply-item.checked {
            background: var(--light-blue);
        }

        .supply-item.checked .supply-label {
            text-decoration: line-through;
            color: var(--gray);
        }

        .supply-quantity {
            font-weight: 600;
            color: var(--primary-blue);
            margin-right: 0.5rem;
        }

        .supply-brand {
            font-size: 0.875rem;
            color: var(--gray);
            font-style: italic;
        }

        /* Important Notes */
        .important-notes {
            background: #fff3cd;
            border-left: 4px solid var(--warning);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin: 2rem 0;
        }

        .important-title {
            font-weight: 700;
            color: var(--danger);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .note-list {
            list-style: none;
            padding-left: 1.5rem;
        }

        .note-list li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .note-list li::before {
            content: '⚠️';
            position: absolute;
            left: 0;
        }

        /* Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 3rem;
            padding-top: 2rem;
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

        .btn-success {
            background: var(--success);
            color: var(--white);
        }

        .btn-success:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Print Button */
        .print-section {
            text-align: center;
            margin-top: 1rem;
        }

        .print-hint {
            font-size: 0.875rem;
            color: var(--gray);
            margin-top: 0.5rem;
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

        @keyframes checkmark {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .supplies-container {
                padding: 1.5rem;
            }

            .progress-stats {
                flex-direction: column;
                gap: 1rem;
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
                
                <div class="progress-step active">
                    <div class="step-circle active">5</div>
                    <div class="step-label">
                        Fournitures
                        <div class="step-label-ar">اللوازم المدرسية</div>
                    </div>
                </div>
                
                <div class="progress-step">
                    <a href="{{ route('inscription.step6') }}" class="step-link" data-step="6">
                        <div class="step-circle">6</div>
                        <div class="step-label">
                            Récapitulatif
                            <div class="step-label-ar">ملخص</div>
                        </div>
                    </a>
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
                <h1 class="form-title">Liste des fournitures scolaires</h1>
                <p class="form-subtitle">قائمة اللوازم المدرسية</p>
            </div>

            <!-- Level Info -->
            <div class="level-info" id="levelInfo">
                <!-- Sera rempli dynamiquement -->
            </div>

            <div class="supplies-container">
                <!-- Alert -->
                <div class="alert alert-info">
                    <div class="alert-icon">ℹ️</div>
                    <div>
                        Veuillez cocher chaque fourniture une fois préparée. Une attestation sera générée à la fin pour signature.
                    </div>
                </div>

                <!-- Progress Stats -->
                <div class="progress-stats">
                    <div class="stat-item">
                        <div class="stat-number" id="totalItems">0</div>
                        <div class="stat-label">Total des fournitures</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="checkedItems">0</div>
                        <div class="stat-label">Fournitures cochées</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" id="progressPercent">0%</div>
                        <div class="stat-label">Progression</div>
                    </div>
                </div>

                <!-- Supplies List -->
                <div id="suppliesList">
                    <!-- Sera rempli dynamiquement selon le niveau -->
                </div>

                <!-- Important Notes -->
                <div class="important-notes">
                    <div class="important-title">
                        <span>⚠️</span> IMPORTANT - À NOTER
                    </div>
                    <ul class="note-list">
                        <li>Toutes les fournitures doivent porter le nom de l'enfant</li>
                        <li>Aucune fourniture ne sera acceptée le jour de la rentrée</li>
                        <li>Les cartables à roulettes sont strictement interdits</li>
                        <li>Les cahiers doivent être de très bonne qualité et sans spirale</li>
                        <li>Le Blanco est strictement interdit (pour le primaire)</li>
                    </ul>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="goBack()">
                        ← Précédent
                    </button>
                    <button type="submit" class="btn btn-primary" id="nextBtn" onclick="validateAndContinue()">
                        Suivant →
                    </button>
                </div>

                <div class="print-section">
                    <button class="btn btn-success" onclick="generateAttestation()" id="printBtn" style="display: none;">
                        📄 Générer l'attestation PDF
                    </button>
                    <p class="print-hint" id="printHint" style="display: none;">
                        L'attestation sera disponible après validation de toutes les fournitures
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Supplies data by level - Based on provided documents
        const suppliesData = {
            'MS': {
                name: 'Moyenne Section',
                deliveryDate: 'Mercredi 04 septembre 2024',
                startDate: 'Vendredi 06 septembre 2024',
                categories: [
                    {
                        name: 'Papeterie',
                        icon: '📝',
                        items: [
                            { qty: 1, item: 'Ramette de papier couleur au choix' },
                            { qty: 2, item: 'Cahiers 96 pages 24/32 sans spirales' },
                            { qty: 1, item: 'Porte document en plastique avec poignée pour emporter le cahier de vie le vendredi' },
                            { qty: 2, item: 'Protège-cahiers transparents 24/32' },
                            { qty: 2, item: 'Lutins de 60 vues' }
                        ]
                    },
                    {
                        name: 'Matériel de dessin et création',
                        icon: '🎨',
                        items: [
                            { qty: 1, item: 'Paquet de 12 crayons de cire', brand: 'marque Bic' },
                            { qty: 1, item: 'Paquet de 12 gros feutres', brand: 'marque Bic' },
                            { qty: 2, item: 'Crayons à papiers' },
                            { qty: 1, item: 'Tablette de pâte à modeler de bonne qualité' },
                            { qty: 1, item: 'Manualidades - assortiment de papiers pour travaux manuels', brand: 'édition Sadipal' }
                        ]
                    },
                    {
                        name: 'Hygiène',
                        icon: '🧼',
                        items: [
                            { qty: 2, item: 'Grandes boîtes de mouchoirs en papier' },
                            { qty: 4, item: 'Rouleaux de papier hygiénique' },
                            { qty: 1, item: 'Flacon de savon liquide', brand: 'Dettol, Taous ou Petit Marseillais' }
                        ]
                    },
                    {
                        name: 'Divers',
                        icon: '👕',
                        items: [
                            { qty: 1, item: 'Tenue de rechange complète et pratique qui restera à l\'école (à changer selon la saison)' },
                            { qty: 1, item: 'Tablier pour la peinture' },
                            { qty: 1, item: 'Petit oreiller pour la sieste' },
                            { qty: 1, item: 'Boîtier pédagogique TAM-TAM', brand: 'Samir Edition Moyenne Section' }
                        ]
                    }
                ]
            },
            'GS': {
                name: 'Grande Section',
                deliveryDate: 'Jeudi 05 septembre 2024',
                startDate: 'Lundi 09 septembre 2024',
                categories: [
                    {
                        name: 'Papeterie',
                        icon: '📝',
                        items: [
                            { qty: 1, item: 'Ramette de papier blanc', brand: 'marque NAVIGATOR' },
                            { qty: 2, item: 'Cahiers 96 pages 24/32 sans spirales' },
                            { qty: 1, item: 'Porte document en plastique avec poignée pour emporter le cahier de vie le vendredi' },
                            { qty: 2, item: 'Protège-cahiers transparents 24/32' },
                            { qty: 2, item: 'Lutins de 60 vues' }
                        ]
                    },
                    {
                        name: 'Matériel de dessin et création',
                        icon: '🎨',
                        items: [
                            { qty: 1, item: 'Paquet de 12 crayons de cire', brand: 'marque Bic' },
                            { qty: 1, item: 'Paquet de 12 feutres fins', brand: 'marque Bic' },
                            { qty: 3, item: 'Crayons à papiers de bonne qualité (HP2)' },
                            { qty: 1, item: 'Tablette de pâte à modeler de bonne qualité' },
                            { qty: 1, item: 'Manualidades - assortiment de papiers pour travaux manuels', brand: 'édition Sadipal' }
                        ]
                    },
                    {
                        name: 'Hygiène',
                        icon: '🧼',
                        items: [
                            { qty: 2, item: 'Grandes boîtes de mouchoirs en papier' },
                            { qty: 4, item: 'Rouleaux de papier hygiénique' },
                            { qty: 1, item: 'Flacon de savon liquide', brand: 'Dettol, Taous ou Petit Marseillais' }
                        ]
                    },
                    {
                        name: 'Divers',
                        icon: '👕',
                        items: [
                            { qty: 1, item: 'Tenue de rechange complète et pratique qui restera à l\'école (à changer selon la saison)' }
                        ]
                    }
                ]
            },
            'CP': {
                name: '1ère année primaire',
                deliveryDate: 'À apporter selon le planning de rentrée',
                startDate: 'Mercredi 04 septembre 2024',
                categories: [
                    {
                        name: 'Trousse garnie',
                        icon: '✏️',
                        items: [
                            { qty: 1, item: 'Stylo pilote à gomme' },
                            { qty: 4, item: 'Crayons à papier' },
                            { qty: 1, item: 'Gomme' },
                            { qty: 1, item: 'Stylo bic vert' },
                            { qty: 1, item: 'Taille-crayons' },
                            { qty: 1, item: 'Boîte de crayons de couleur' },
                            { qty: 1, item: 'Double décimètre' },
                            { qty: 1, item: 'Étiquettes autocollantes' },
                            { qty: 1, item: 'Ardoise à feutre avec 2 feutres' },
                            { qty: 1, item: 'Chiffon' },
                            { qty: 2, item: 'Grands tubes de colle UHU STIC' },
                            { qty: 1, item: 'Grand tube de colle liquide' }
                        ]
                    },
                    {
                        name: 'Matériel commun à toutes les matières',
                        icon: '📚',
                        items: [
                            { qty: 1, item: 'Ramette de papier de photocopie A4 80gr', brand: 'Impression laser de très bonne qualité' },
                            { qty: 1, item: 'Protège-cahier transparent pour le cahier de bord' },
                            { qty: 2, item: 'Cahiers d\'évaluations communs 96 pages 24x32', brand: 'avec 2 couvertures bleues' },
                            { qty: 1, item: 'Cahier petit format 50p', brand: 'avec protège-cahier violet' }
                        ]
                    }
                ]
            }
        };

        // Global variables
        let currentLevel = 'MS'; // Default level
        let checkedItems = new Set();
        let totalItems = 0;

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved data from localStorage
            loadSavedData();
            
            // Initialize the supplies list
            initializeSupplies();
            
            // Update progress
            updateProgress();
        });

        // Load saved data from localStorage
        function loadSavedData() {
            const savedLevel = localStorage.getItem('supplies_level');
            const savedChecked = localStorage.getItem('supplies_checked');
            
            if (savedLevel) {
                currentLevel = savedLevel;
            }
            
            if (savedChecked) {
                checkedItems = new Set(JSON.parse(savedChecked));
            }
        }

        // Save data to localStorage
        function saveData() {
            localStorage.setItem('supplies_level', currentLevel);
            localStorage.setItem('supplies_checked', JSON.stringify([...checkedItems]));
        }

        // Initialize supplies list
        function initializeSupplies() {
            const levelData = suppliesData[currentLevel];
            if (!levelData) return;

            // Update level info
            document.getElementById('levelInfo').innerHTML = `
                <strong>${levelData.name}</strong> - 
                Livraison: ${levelData.deliveryDate} | 
                Rentrée: ${levelData.startDate}
            `;

            // Generate supplies list
            const suppliesList = document.getElementById('suppliesList');
            suppliesList.innerHTML = '';

            levelData.categories.forEach((category, categoryIndex) => {
                const categorySection = document.createElement('div');
                categorySection.className = 'category-section';
                
                const categoryHeader = document.createElement('div');
                categoryHeader.className = 'category-header';
                categoryHeader.innerHTML = `
                    <div class="category-icon">${category.icon}</div>
                    <div class="category-title">${category.name}</div>
                    <div class="category-count">${category.items.length}</div>
                `;
                
                const categoryItems = document.createElement('div');
                categoryItems.className = 'category-items';
                
                category.items.forEach((item, itemIndex) => {
                    const itemId = `item_${categoryIndex}_${itemIndex}`;
                    const isChecked = checkedItems.has(itemId);
                    
                    const supplyItem = document.createElement('div');
                    supplyItem.className = `supply-item ${isChecked ? 'checked' : ''}`;
                    supplyItem.innerHTML = `
                        <input type="checkbox" 
                               class="supply-checkbox" 
                               id="${itemId}"
                               ${isChecked ? 'checked' : ''}
                               onchange="toggleItem('${itemId}')">
                        <label class="supply-label" for="${itemId}">
                            <span class="supply-quantity">${item.qty}x</span>
                            ${item.item}
                            ${item.brand ? `<span class="supply-brand">(${item.brand})</span>` : ''}
                        </label>
                    `;
                    
                    categoryItems.appendChild(supplyItem);
                });
                
                categorySection.appendChild(categoryHeader);
                categorySection.appendChild(categoryItems);
                suppliesList.appendChild(categorySection);
            });

            // Update total items count
            totalItems = levelData.categories.reduce((total, category) => total + category.items.length, 0);
        }

        // Toggle item checked state
        function toggleItem(itemId) {
            const item = document.getElementById(itemId);
            const supplyItem = item.closest('.supply-item');
            
            if (item.checked) {
                checkedItems.add(itemId);
                supplyItem.classList.add('checked');
            } else {
                checkedItems.delete(itemId);
                supplyItem.classList.remove('checked');
            }
            
            // Save to localStorage
            saveData();
            
            // Update progress
            updateProgress();
        }

        // Update progress stats
        function updateProgress() {
            const checkedCount = checkedItems.size;
            const progressPercent = totalItems > 0 ? Math.round((checkedCount / totalItems) * 100) : 0;
            
            document.getElementById('totalItems').textContent = totalItems;
            document.getElementById('checkedItems').textContent = checkedCount;
            document.getElementById('progressPercent').textContent = progressPercent + '%';
            
            // Show/hide print button
            const printBtn = document.getElementById('printBtn');
            const printHint = document.getElementById('printHint');
            
            if (progressPercent === 100) {
                printBtn.style.display = 'inline-flex';
                printHint.style.display = 'block';
            } else {
                printBtn.style.display = 'none';
                printHint.style.display = 'none';
            }
        }

        // Navigation functions
        function goBack() {
            // Save current state
            saveData();
            
            // Navigate to previous step
            window.location.href = '{{ route("inscription.step4") }}';
        }

        function validateAndContinue() {
            // Save current state
            saveData();
            
            // Navigate to next step
            window.location.href = '{{ route("inscription.step6") }}';
        }

        // Generate attestation PDF
        function generateAttestation() {
            if (checkedItems.size === totalItems) {
                // Here you would implement PDF generation
                alert('Fonctionnalité de génération PDF à implémenter');
                
                // For now, just print the page
                window.print();
            } else {
                alert('Veuillez cocher toutes les fournitures avant de générer l\'attestation.');
            }
        }

        // Level selector (if needed)
        function changeLevel(level) {
            currentLevel = level;
            checkedItems.clear();
            initializeSupplies();
            updateProgress();
            saveData();
        }
    </script>
</body>
</html> 