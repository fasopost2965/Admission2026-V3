<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Informations médicales - École La Victoire</title>
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
            width: 42%;
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
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }

        .form-container {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2.5rem;
            animation: fadeIn 0.5s ease;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid var(--light-blue);
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

        /* Alert Box */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: flex-start;
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

        .alert-text {
            flex: 1;
        }

        .alert-text strong {
            color: var(--primary-blue);
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 2.5rem;
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

        .form-textarea {
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            resize: vertical;
            min-height: 100px;
        }

        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 60, 113, 0.1);
        }

        /* Radio and Checkbox Groups */
        .radio-group {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.5rem;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .radio-input {
            width: 20px;
            height: 20px;
            accent-color: var(--primary-blue);
            cursor: pointer;
        }

        .radio-label {
            cursor: pointer;
            user-select: none;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .checkbox-item:hover {
            background: var(--light-blue);
        }

        .checkbox-input {
            width: 20px;
            height: 20px;
            accent-color: var(--primary-blue);
            cursor: pointer;
        }

        .checkbox-label {
            cursor: pointer;
            user-select: none;
            flex: 1;
        }

        /* Health Status Cards */
        .health-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .health-card {
            background: var(--gray-light);
            border-radius: 8px;
            padding: 1.5rem;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .health-card:hover {
            border-color: var(--primary-gold);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .health-card-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .health-card-icon {
            width: 40px;
            height: 40px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .health-card-title {
            font-weight: 600;
            color: var(--primary-blue);
        }

        /* Optional Section */
        .optional-badge {
            background: var(--warning);
            color: var(--white);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
            margin-left: 0.5rem;
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

        /* Note text */
        .note-text {
            font-size: 0.875rem;
            color: var(--gray);
            font-style: italic;
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

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                padding: 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .radio-group {
                flex-direction: column;
            }

            .health-cards {
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
                
                <div class="progress-step completed">
                    <div class="step-circle completed">✓</div>
                    <div class="step-label">
                        Informations parents
                        <div class="step-label-ar">معلومات الوالدين</div>
                    </div>
                </div>
                
                <div class="progress-step active">
                    <div class="step-circle active">4</div>
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
                <h1 class="form-title">Informations médicales de l'élève</h1>
                <p class="form-subtitle">المعلومات الطبية للتلميذ</p>
            </div>

            <!-- Info Alert -->
            <div class="alert alert-info">
                <div class="alert-icon">ℹ️</div>
                <div class="alert-text">
                    <strong>Note importante :</strong> Ces informations sont facultatives mais fortement recommandées pour assurer la sécurité et le bien-être de votre enfant à l'école. Toutes les données médicales sont strictement confidentielles.
                </div>
            </div>

            <form id="medicalForm">
                @csrf
                <!-- État de santé général -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">🏥</div>
                        État de santé général
                        <span class="optional-badge">Facultatif</span>
                    </h2>

                    <div class="health-cards">
                        <div class="health-card">
                            <div class="health-card-header">
                                <div class="health-card-icon">💊</div>
                                <div class="health-card-title">Allergies</div>
                            </div>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" class="radio-input" id="allergies_no" name="has_allergies" value="no" checked>
                                    <label class="radio-label" for="allergies_no">Non / لا</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" class="radio-input" id="allergies_yes" name="has_allergies" value="yes">
                                    <label class="radio-label" for="allergies_yes">Oui / نعم</label>
                                </div>
                            </div>
                            <div id="allergiesDetails" style="display: none; margin-top: 1rem;">
                                <textarea class="form-textarea" name="allergies_details" placeholder="Précisez les allergies (alimentaires, médicamenteuses, autres...)"></textarea>
                            </div>
                        </div>

                        <div class="health-card">
                            <div class="health-card-header">
                                <div class="health-card-icon">🏥</div>
                                <div class="health-card-title">Maladies chroniques</div>
                            </div>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" class="radio-input" id="chronic_no" name="has_chronic" value="no" checked>
                                    <label class="radio-label" for="chronic_no">Non / لا</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" class="radio-input" id="chronic_yes" name="has_chronic" value="yes">
                                    <label class="radio-label" for="chronic_yes">Oui / نعم</label>
                                </div>
                            </div>
                            <div id="chronicDetails" style="display: none; margin-top: 1rem;">
                                <textarea class="form-textarea" name="chronic_details" placeholder="Précisez (asthme, diabète, épilepsie, etc.)"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label">
                                Médicaments à prendre durant les heures scolaires
                                <span class="form-label-ar">الأدوية التي يجب تناولها خلال ساعات الدراسة</span>
                            </label>
                            <textarea class="form-textarea" name="medications" placeholder="Nom du médicament, dosage et horaire de prise"></textarea>
                            <p class="note-text">Une ordonnance médicale sera demandée pour tout médicament</p>
                        </div>
                    </div>
                </div>

                <!-- Informations médicales -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">👨‍⚕️</div>
                        Suivi médical
                    </h2>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                Groupe sanguin
                                <span class="form-label-ar">فصيلة الدم</span>
                            </label>
                            <select class="form-input" name="blood_group">
                                <option value="">-- Non connu --</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Nom du médecin traitant
                                <span class="form-label-ar">اسم الطبيب المعالج</span>
                            </label>
                            <input type="text" class="form-input" name="doctor_name" placeholder="Dr. ...">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Téléphone du médecin
                                <span class="form-label-ar">هاتف الطبيب</span>
                            </label>
                            <input type="tel" class="form-input" name="doctor_phone" placeholder="Ex: 0612345678">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Numéro d'assurance maladie
                                <span class="form-label-ar">رقم التأمين الصحي</span>
                            </label>
                            <input type="text" class="form-input" name="insurance_number" placeholder="Si applicable">
                        </div>
                    </div>
                </div>

                <!-- Besoins particuliers -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">♿</div>
                        Besoins particuliers
                    </h2>

                    <div class="form-group full-width">
                        <label class="form-label">
                            L'élève a-t-il des besoins éducatifs particuliers ?
                            <span class="form-label-ar">هل للتلميذ احتياجات تعليمية خاصة؟</span>
                        </label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="need_visual" name="special_needs[]" value="visual">
                                <label class="checkbox-label" for="need_visual">Difficultés visuelles / صعوبات بصرية</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="need_hearing" name="special_needs[]" value="hearing">
                                <label class="checkbox-label" for="need_hearing">Difficultés auditives / صعوبات سمعية</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="need_mobility" name="special_needs[]" value="mobility">
                                <label class="checkbox-label" for="need_mobility">Difficultés motrices / صعوبات حركية</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="need_speech" name="special_needs[]" value="speech">
                                <label class="checkbox-label" for="need_speech">Difficultés de langage / صعوبات في النطق</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="need_learning" name="special_needs[]" value="learning">
                                <label class="checkbox-label" for="need_learning">Difficultés d'apprentissage / صعوبات في التعلم</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="need_behavioral" name="special_needs[]" value="behavioral">
                                <label class="checkbox-label" for="need_behavioral">Troubles du comportement / اضطرابات سلوكية</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="need_other" name="special_needs[]" value="other">
                                <label class="checkbox-label" for="need_other">Autre / أخرى</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group full-width" id="specialNeedsDetails" style="display: none;">
                        <label class="form-label">
                            Précisions sur les besoins particuliers
                            <span class="form-label-ar">تفاصيل حول الاحتياجات الخاصة</span>
                        </label>
                        <textarea class="form-textarea" name="special_needs_details" placeholder="Décrivez les besoins spécifiques et les aménagements nécessaires"></textarea>
                    </div>
                </div>

                <!-- Régime alimentaire -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">🍽️</div>
                        Régime alimentaire particulier
                    </h2>

                    <div class="form-group full-width">
                        <label class="form-label">
                            L'élève suit-il un régime alimentaire particulier ?
                            <span class="form-label-ar">هل يتبع التلميذ نظاماً غذائياً خاصاً؟</span>
                        </label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="diet_vegetarian" name="dietary_restrictions[]" value="vegetarian">
                                <label class="checkbox-label" for="diet_vegetarian">Végétarien / نباتي</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="diet_halal" name="dietary_restrictions[]" value="halal">
                                <label class="checkbox-label" for="diet_halal">Halal uniquement / حلال فقط</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="diet_gluten" name="dietary_restrictions[]" value="gluten_free">
                                <label class="checkbox-label" for="diet_gluten">Sans gluten / خالٍ من الغلوتين</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="diet_lactose" name="dietary_restrictions[]" value="lactose_free">
                                <label class="checkbox-label" for="diet_lactose">Sans lactose / خالٍ من اللاكتوز</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="diet_diabetic" name="dietary_restrictions[]" value="diabetic">
                                <label class="checkbox-label" for="diet_diabetic">Diabétique / سكري</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" class="checkbox-input" id="diet_other" name="dietary_restrictions[]" value="other">
                                <label class="checkbox-label" for="diet_other">Autre / أخرى</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group full-width" id="dietDetails" style="display: none;">
                        <label class="form-label">
                            Précisions sur le régime alimentaire
                            <span class="form-label-ar">تفاصيل حول النظام الغذائي</span>
                        </label>
                        <textarea class="form-textarea" name="diet_details" placeholder="Précisez les restrictions alimentaires ou autres informations importantes"></textarea>
                    </div>
                </div>

                <!-- Observations -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">📝</div>
                        Observations complémentaires
                    </h2>

                    <div class="form-group full-width">
                        <label class="form-label">
                            Autres informations médicales importantes
                            <span class="form-label-ar">معلومات طبية مهمة أخرى</span>
                        </label>
                        <textarea class="form-textarea" name="additional_info" rows="4" placeholder="Toute information que vous jugez utile de porter à notre connaissance pour le bien-être de votre enfant"></textarea>
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
            </form>
        </div>
    </main>

    <script>
        // Toggle details for allergies
        document.getElementById('allergies_yes').addEventListener('change', function() {
            document.getElementById('allergiesDetails').style.display = this.checked ? 'block' : 'none';
        });
        document.getElementById('allergies_no').addEventListener('change', function() {
            document.getElementById('allergiesDetails').style.display = 'none';
        });

        // Toggle details for chronic diseases
        document.getElementById('chronic_yes').addEventListener('change', function() {
            document.getElementById('chronicDetails').style.display = this.checked ? 'block' : 'none';
        });
        document.getElementById('chronic_no').addEventListener('change', function() {
            document.getElementById('chronicDetails').style.display = 'none';
        });

        // Toggle special needs details
        const specialNeedsCheckboxes = document.querySelectorAll('input[name="special_needs[]"]');
        specialNeedsCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const anyChecked = Array.from(specialNeedsCheckboxes).some(cb => cb.checked);
                document.getElementById('specialNeedsDetails').style.display = anyChecked ? 'block' : 'none';
            });
        });

        // Toggle dietary details
        const dietCheckboxes = document.querySelectorAll('input[name="dietary_restrictions[]"]');
        dietCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const anyChecked = Array.from(dietCheckboxes).some(cb => cb.checked);
                document.getElementById('dietDetails').style.display = anyChecked ? 'block' : 'none';
            });
        });

        // Form submission
        document.getElementById('medicalForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Collect form data
            const formData = new FormData(this);
            const medicalData = {};

            // Process form data
            for (let [key, value] of formData.entries()) {
                if (key.endsWith('[]')) {
                    // Handle arrays (checkboxes)
                    const cleanKey = key.replace('[]', '');
                    if (!medicalData[cleanKey]) {
                        medicalData[cleanKey] = [];
                    }
                    medicalData[cleanKey].push(value);
                } else {
                    medicalData[key] = value;
                }
            }

            // Save to localStorage
            localStorage.setItem('medicalData', JSON.stringify(medicalData));
            localStorage.setItem('currentStep', '5');

            // Submit to server
            fetch('{{ route("inscription.step4.store") }}', {
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
                    localStorage.removeItem('medicalData');
                    window.location.href = '{{ route("inscription.step5") }}';
                } else {
                    throw new Error('Erreur lors de la sauvegarde');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la sauvegarde des données médicales');
            });
        });

        // Go back
        function goBack() {
            window.location.href = '{{ route("inscription.step3") }}';
        }

        // Load saved data if exists
        window.onload = function() {
            const savedData = localStorage.getItem('medicalData');
            if (savedData) {
                const data = JSON.parse(savedData);
                
                // Restore form values
                Object.keys(data).forEach(key => {
                    if (Array.isArray(data[key])) {
                        // Handle checkboxes
                        data[key].forEach(value => {
                            const checkbox = document.querySelector(`input[name="${key}[]"][value="${value}"]`);
                            if (checkbox) {
                                checkbox.checked = true;
                                checkbox.dispatchEvent(new Event('change'));
                            }
                        });
                    } else {
                        // Handle regular inputs
                        const input = document.querySelector(`[name="${key}"]`);
                        if (input) {
                            if (input.type === 'radio') {
                                const radio = document.querySelector(`input[name="${key}"][value="${data[key]}"]`);
                                if (radio) {
                                    radio.checked = true;
                                    radio.dispatchEvent(new Event('change'));
                                }
                            } else {
                                input.value = data[key];
                            }
                        }
                    }
                });
            }
        };
    </script>
</body>
</html> 