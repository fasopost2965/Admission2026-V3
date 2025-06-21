<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Informations parents - École La Victoire</title>
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
            width: 28%;
            height: 2px;
            background: var(--primary-gold);
            z-index: 2;
            transition: width 0.5s ease;
        }

        .progress-step {
            position: relative;
            z-index: 3;
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
            padding: 2.5rem 2.5rem 2rem;
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

        /* Tabs */
        .tabs {
            display: flex;
            background: var(--gray-light);
            border-bottom: 2px solid var(--light-blue);
        }

        .tab {
            flex: 1;
            padding: 1.25rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .tab-icon {
            font-size: 1.25rem;
        }

        .tab-text {
            font-weight: 600;
            color: var(--gray);
        }

        .tab-text-ar {
            font-family: 'Tajawal', sans-serif;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .tab.active {
            background: var(--white);
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-gold);
        }

        .tab.active .tab-text {
            color: var(--primary-blue);
        }

        .tab-indicator {
            width: 24px;
            height: 24px;
            background: var(--success);
            color: var(--white);
            border-radius: 50%;
            font-size: 0.75rem;
            display: none;
            align-items: center;
            justify-content: center;
            margin-left: 0.5rem;
        }

        .tab.completed .tab-indicator {
            display: flex;
        }

        /* Form Sections */
        .form-body {
            padding: 2.5rem;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-icon {
            width: 35px;
            height: 35px;
            background: var(--light-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-weight: 600;
            color: var(--gray-dark);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-label-ar {
            font-family: 'Tajawal', sans-serif;
            color: var(--gray);
            font-weight: 500;
            margin-left: 0.5rem;
        }

        .required {
            color: var(--danger);
        }

        .form-input {
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 60, 113, 0.1);
        }

        .form-input.error {
            border-color: var(--danger);
        }

        .error-message {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        /* Emergency Contact Section */
        .emergency-contact-section {
            background: var(--light-blue);
            border-radius: var(--radius);
            padding: 2rem;
            margin-top: 2rem;
        }

        .emergency-selector {
            margin-bottom: 1.5rem;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 0.75rem;
        }

        .radio-card {
            flex: 1;
            min-width: 200px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--white);
            text-align: center;
        }

        .radio-card:hover {
            border-color: var(--primary-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .radio-card input[type="radio"] {
            display: none;
        }

        .radio-card.selected {
            border-color: var(--primary-blue);
            background: var(--white);
            box-shadow: var(--shadow);
        }

        .radio-card-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .radio-card-title {
            font-weight: 600;
            color: var(--gray-dark);
            margin-bottom: 0.25rem;
        }

        .radio-card-subtitle {
            font-size: 0.875rem;
            color: var(--gray);
            font-family: 'Tajawal', sans-serif;
        }

        /* Alert Box */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-info {
            background: var(--light-blue);
            border-left: 4px solid var(--info);
        }

        .alert-icon {
            font-size: 1.25rem;
            color: var(--info);
        }

        /* Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
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

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .tab-content.active {
            animation: slideIn 0.3s ease;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .tabs {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .tab {
                min-width: 150px;
            }

            .form-body {
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .radio-group {
                flex-direction: column;
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
                    <div class="step-circle completed">✓</div>
                    <div class="step-label">
                        Type d'inscription
                        <div class="step-label-ar">نوع التسجيل</div>
                    </div>
                </div>
                
                <div class="progress-step completed">
                    <div class="step-circle completed">✓</div>
                    <div class="step-label">
                        Informations élève
                        <div class="step-label-ar">معلومات التلميذ</div>
                    </div>
                </div>
                
                <div class="progress-step active">
                    <div class="step-circle active">3</div>
                    <div class="step-label">
                        Informations parents
                        <div class="step-label-ar">معلومات الوالدين</div>
                    </div>
                </div>
                
                <div class="progress-step">
                    <div class="step-circle">4</div>
                    <div class="step-label">
                        Informations médicales
                        <div class="step-label-ar">المعلومات الطبية</div>
                    </div>
                </div>
                
                <div class="progress-step">
                    <div class="step-circle">5</div>
                    <div class="step-label">
                        Fournitures
                        <div class="step-label-ar">اللوازم المدرسية</div>
                    </div>
                </div>
                
                <div class="progress-step">
                    <div class="step-circle">6</div>
                    <div class="step-label">
                        Récapitulatif
                        <div class="step-label-ar">ملخص</div>
                    </div>
                </div>
                
                <div class="progress-step">
                    <div class="step-circle">7</div>
                    <div class="step-label">
                        Validation
                        <div class="step-label-ar">التأكيد</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="form-container">
            <div class="form-header">
                <h1 class="form-title">Informations des parents et tuteurs</h1>
                <p class="form-subtitle">معلومات الوالدين والأوصياء</p>
            </div>

            <!-- Tabs -->
            <div class="tabs">
                <div class="tab active" onclick="switchTab('father')">
                    <span class="tab-icon">👨</span>
                    <div>
                        <div class="tab-text">Père</div>
                        <div class="tab-text-ar">الأب</div>
                    </div>
                    <span class="tab-indicator" id="fatherIndicator">✓</span>
                </div>
                <div class="tab" onclick="switchTab('mother')">
                    <span class="tab-icon">👩</span>
                    <div>
                        <div class="tab-text">Mère</div>
                        <div class="tab-text-ar">الأم</div>
                    </div>
                    <span class="tab-indicator" id="motherIndicator">✓</span>
                </div>
                <div class="tab" onclick="switchTab('guardian')">
                    <span class="tab-icon">👥</span>
                    <div>
                        <div class="tab-text">Contact d'urgence</div>
                        <div class="tab-text-ar">جهة اتصال الطوارئ</div>
                    </div>
                    <span class="tab-indicator" id="guardianIndicator">✓</span>
                </div>
            </div>

            <form id="parentsForm">
                @csrf
                <div class="form-body">
                    <!-- Father Tab -->
                    <div class="tab-content active" id="fatherTab">
                        <h2 class="section-title">
                            <div class="section-icon">👨</div>
                            Informations du père
                        </h2>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">
                                    Nom <span class="required">*</span>
                                    <span class="form-label-ar">اللقب</span>
                                </label>
                                <input type="text" class="form-input" name="father_lastName" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Prénom <span class="required">*</span>
                                    <span class="form-label-ar">الاسم</span>
                                </label>
                                <input type="text" class="form-input" name="father_firstName" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    CIN <span class="required">*</span>
                                    <span class="form-label-ar">رقم البطاقة الوطنية</span>
                                </label>
                                <input type="text" class="form-input" name="father_cin" placeholder="Ex: AB123456" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Profession <span class="required">*</span>
                                    <span class="form-label-ar">المهنة</span>
                                </label>
                                <input type="text" class="form-input" name="father_profession" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Téléphone mobile <span class="required">*</span>
                                    <span class="form-label-ar">الهاتف المحمول</span>
                                </label>
                                <input type="tel" class="form-input" name="father_mobile" placeholder="Ex: 0612345678" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Téléphone fixe
                                    <span class="form-label-ar">الهاتف الثابت</span>
                                </label>
                                <input type="tel" class="form-input" name="father_phone" placeholder="Ex: 0539123456">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Email <span class="required">*</span>
                                    <span class="form-label-ar">البريد الإلكتروني</span>
                                </label>
                                <input type="email" class="form-input" name="father_email" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Lieu de travail
                                    <span class="form-label-ar">مكان العمل</span>
                                </label>
                                <input type="text" class="form-input" name="father_workplace">
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label">
                                    Adresse domicile <span class="required">*</span>
                                    <span class="form-label-ar">عنوان السكن</span>
                                </label>
                                <input type="text" class="form-input" name="father_address" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>
                        </div>
                    </div>

                    <!-- Mother Tab -->
                    <div class="tab-content" id="motherTab">
                        <h2 class="section-title">
                            <div class="section-icon">👩</div>
                            Informations de la mère
                        </h2>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">
                                    Nom <span class="required">*</span>
                                    <span class="form-label-ar">اللقب</span>
                                </label>
                                <input type="text" class="form-input" name="mother_lastName" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Prénom <span class="required">*</span>
                                    <span class="form-label-ar">الاسم</span>
                                </label>
                                <input type="text" class="form-input" name="mother_firstName" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    CIN <span class="required">*</span>
                                    <span class="form-label-ar">رقم البطاقة الوطنية</span>
                                </label>
                                <input type="text" class="form-input" name="mother_cin" placeholder="Ex: CD123456" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Profession <span class="required">*</span>
                                    <span class="form-label-ar">المهنة</span>
                                </label>
                                <input type="text" class="form-input" name="mother_profession" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Téléphone mobile <span class="required">*</span>
                                    <span class="form-label-ar">الهاتف المحمول</span>
                                </label>
                                <input type="tel" class="form-input" name="mother_mobile" placeholder="Ex: 0612345678" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Téléphone fixe
                                    <span class="form-label-ar">الهاتف الثابت</span>
                                </label>
                                <input type="tel" class="form-input" name="mother_phone" placeholder="Ex: 0539123456">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Email <span class="required">*</span>
                                    <span class="form-label-ar">البريد الإلكتروني</span>
                                </label>
                                <input type="email" class="form-input" name="mother_email" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    Lieu de travail
                                    <span class="form-label-ar">مكان العمل</span>
                                </label>
                                <input type="text" class="form-input" name="mother_workplace">
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label">
                                    Adresse domicile <span class="required">*</span>
                                    <span class="form-label-ar">عنوان السكن</span>
                                </label>
                                <input type="text" class="form-input" name="mother_address" required>
                                <span class="error-message">Ce champ est obligatoire</span>
                            </div>
                        </div>
                    </div>

                    <!-- Guardian Tab -->
                    <div class="tab-content" id="guardianTab">
                        <h2 class="section-title">
                            <div class="section-icon">👥</div>
                            Contact d'urgence / Tuteur légal
                        </h2>

                        <div class="alert alert-info">
                            <div class="alert-icon">ℹ️</div>
                            <div>
                                <strong>Information :</strong> Le contact d'urgence sera utilisé en cas d'urgence si les parents ne sont pas joignables.
                            </div>
                        </div>

                        <div class="emergency-contact-section">
                            <div class="emergency-selector">
                                <label class="form-label">
                                    Qui sera le contact d'urgence principal ?
                                    <span class="form-label-ar">من سيكون جهة الاتصال الرئيسية في الطوارئ؟</span>
                                </label>
                                <div class="radio-group">
                                    <label class="radio-card" onclick="selectEmergencyContact('father')">
                                        <input type="radio" name="emergency_contact" value="father">
                                        <div class="radio-card-icon">👨</div>
                                        <div class="radio-card-title">Le père</div>
                                        <div class="radio-card-subtitle">الأب</div>
                                    </label>
                                    <label class="radio-card" onclick="selectEmergencyContact('mother')">
                                        <input type="radio" name="emergency_contact" value="mother">
                                        <div class="radio-card-icon">👩</div>
                                        <div class="radio-card-title">La mère</div>
                                        <div class="radio-card-subtitle">الأم</div>
                                    </label>
                                    <label class="radio-card" onclick="selectEmergencyContact('other')">
                                        <input type="radio" name="emergency_contact" value="other">
                                        <div class="radio-card-icon">👤</div>
                                        <div class="radio-card-title">Autre personne</div>
                                        <div class="radio-card-subtitle">شخص آخر</div>
                                    </label>
                                </div>
                            </div>

                            <div id="otherContactForm" style="display: none;">
                                <h3 class="section-title" style="font-size: 1.1rem; margin-bottom: 1rem;">
                                    <div class="section-icon" style="width: 30px; height: 30px; font-size: 1rem;">👤</div>
                                    Informations du contact d'urgence
                                </h3>
                                
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Nom <span class="required">*</span>
                                            <span class="form-label-ar">اللقب</span>
                                        </label>
                                        <input type="text" class="form-input" name="guardian_lastName">
                                        <span class="error-message">Ce champ est obligatoire</span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            Prénom <span class="required">*</span>
                                            <span class="form-label-ar">الاسم</span>
                                        </label>
                                        <input type="text" class="form-input" name="guardian_firstName">
                                        <span class="error-message">Ce champ est obligatoire</span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            Lien de parenté <span class="required">*</span>
                                            <span class="form-label-ar">صلة القرابة</span>
                                        </label>
                                        <input type="text" class="form-input" name="guardian_relationship" placeholder="Ex: Grand-père, Oncle, Tante...">
                                        <span class="error-message">Ce champ est obligatoire</span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            Téléphone mobile <span class="required">*</span>
                                            <span class="form-label-ar">الهاتف المحمول</span>
                                        </label>
                                        <input type="tel" class="form-input" name="guardian_mobile" placeholder="Ex: 0612345678">
                                        <span class="error-message">Ce champ est obligatoire</span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            Téléphone fixe
                                            <span class="form-label-ar">الهاتف الثابت</span>
                                        </label>
                                        <input type="tel" class="form-input" name="guardian_phone" placeholder="Ex: 0539123456">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            Email
                                            <span class="form-label-ar">البريد الإلكتروني</span>
                                        </label>
                                        <input type="email" class="form-input" name="guardian_email">
                                    </div>

                                    <div class="form-group full-width">
                                        <label class="form-label">
                                            Adresse <span class="required">*</span>
                                            <span class="form-label-ar">العنوان</span>
                                        </label>
                                        <input type="text" class="form-input" name="guardian_address">
                                        <span class="error-message">Ce champ est obligatoire</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="goBack()">
                            ← Précédent
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Suivant →
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        let currentTab = 'father';
        let completedTabs = new Set();

        // Switch between tabs
        function switchTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabName + 'Tab').classList.add('active');

            // Add active class to selected tab
            event.currentTarget.classList.add('active');

            currentTab = tabName;
        }

        // Select emergency contact
        function selectEmergencyContact(type) {
            // Remove selected class from all cards
            document.querySelectorAll('.radio-card').forEach(card => {
                card.classList.remove('selected');
            });

            // Add selected class to clicked card
            event.currentTarget.classList.add('selected');

            // Show/hide other contact form
            const otherForm = document.getElementById('otherContactForm');
            if (type === 'other') {
                otherForm.style.display = 'block';
            } else {
                otherForm.style.display = 'none';
            }
        }

        // Mark tab as completed
        function markTabCompleted(tabName) {
            completedTabs.add(tabName);
            const indicator = document.getElementById(tabName + 'Indicator');
            if (indicator) {
                indicator.style.display = 'flex';
            }
        }

        // Validate current tab
        function validateCurrentTab() {
            const currentTabContent = document.getElementById(currentTab + 'Tab');
            const requiredFields = currentTabContent.querySelectorAll('input[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    field.nextElementSibling.style.display = 'block';
                    isValid = false;
                } else {
                    field.classList.remove('error');
                    field.nextElementSibling.style.display = 'none';
                }
            });

            if (isValid) {
                markTabCompleted(currentTab);
            }

            return isValid;
        }

        // Form submission
        document.getElementById('parentsForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validate current tab
            if (!validateCurrentTab()) {
                return;
            }

            // Collect form data
            const formData = new FormData(this);
            const parentsData = {};

            // Process form data
            for (let [key, value] of formData.entries()) {
                parentsData[key] = value;
            }

            // Save to localStorage
            localStorage.setItem('parentsData', JSON.stringify(parentsData));
            localStorage.setItem('currentStep', '4');

            // Submit to server
            fetch('{{ route("inscription.step3.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url;
                } else if (response.ok) {
                    localStorage.removeItem('parentsData');
                    window.location.href = '{{ route("inscription.step4") }}';
                } else {
                    throw new Error('Erreur lors de la sauvegarde');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la sauvegarde des données des parents');
            });
        });

        // Go back
        function goBack() {
            window.location.href = '{{ route("inscription.step2") }}';
        }

        // Load saved data if exists
        window.onload = function() {
            const savedData = localStorage.getItem('parentsData');
            if (savedData) {
                const data = JSON.parse(savedData);
                
                // Restore form values
                Object.keys(data).forEach(key => {
                    const input = document.querySelector(`[name="${key}"]`);
                    if (input) {
                        input.value = data[key];
                        
                        // Handle radio buttons
                        if (input.type === 'radio' && input.checked) {
                            if (key === 'emergency_contact') {
                                selectEmergencyContact(data[key]);
                            }
                        }
                    }
                });
            }
        };

        // Real-time validation
        document.querySelectorAll('input[required]').forEach(input => {
            input.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.classList.add('error');
                    this.nextElementSibling.style.display = 'block';
                } else {
                    this.classList.remove('error');
                    this.nextElementSibling.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html> 