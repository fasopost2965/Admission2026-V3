<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations élève - École La Victoire</title>
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
            width: 14%;
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

        .form-input.error {
            border-color: var(--danger);
        }

        .error-message {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        /* Radio Buttons */
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

        /* Date Picker */
        .date-input-wrapper {
            position: relative;
        }

        .date-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            pointer-events: none;
        }

        /* Photo Upload */
        .photo-upload {
            border: 2px dashed #e0e0e0;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: var(--gray-light);
        }

        .photo-upload:hover {
            border-color: var(--primary-blue);
            background: var(--light-blue);
        }

        .photo-upload-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray);
        }

        .photo-upload-text {
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .photo-upload-hint {
            font-size: 0.875rem;
            color: var(--gray);
        }

        .photo-preview {
            width: 120px;
            height: 120px;
            border-radius: 8px;
            object-fit: cover;
            margin: 1rem auto;
            display: none;
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

        /* Info Alert */
        .info-alert {
            background: var(--light-blue);
            border-left: 4px solid var(--primary-blue);
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .info-alert-icon {
            font-size: 1.5rem;
            color: var(--primary-blue);
        }

        .info-alert-text {
            flex: 1;
            color: var(--gray-dark);
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
                    <a href="{{ route('inscription.step1') }}" class="step-link" data-step="1">
                        <div class="step-circle completed">✓</div>
                        <div class="step-label">
                            Type d'inscription
                            <div class="step-label-ar">نوع التسجيل</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step active">
                    <div class="step-circle active">2</div>
                    <div class="step-label">
                        Informations élève
                        <div class="step-label-ar">معلومات التلميذ</div>
                    </div>
                </div>
                
                <div class="progress-step">
                    <a href="{{ route('inscription.step3') }}" class="step-link" data-step="3">
                        <div class="step-circle">3</div>
                        <div class="step-label">
                            Informations parents
                            <div class="step-label-ar">معلومات الوالدين</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step">
                    <a href="{{ route('inscription.step4') }}" class="step-link" data-step="4">
                        <div class="step-circle">4</div>
                        <div class="step-label">
                            Informations médicales
                            <div class="step-label-ar">المعلومات الطبية</div>
                        </div>
                    </a>
                </div>
                
                <div class="progress-step">
                    <a href="{{ route('inscription.step5') }}" class="step-link" data-step="5">
                        <div class="step-circle">5</div>
                        <div class="step-label">
                            Fournitures
                            <div class="step-label-ar">اللوازم المدرسية</div>
                        </div>
                    </a>
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
                <h1 class="form-title">Informations de l'élève</h1>
                <p class="form-subtitle">معلومات التلميذ</p>
            </div>

            <!-- Info Alert -->
            <div class="info-alert">
                <div class="info-alert-icon">ℹ️</div>
                <div class="info-alert-text">
                    Veuillez remplir tous les champs obligatoires marqués d'un astérisque (*). Les informations saisies doivent être exactes et conformes aux documents officiels.
                </div>
            </div>

            <form method="POST" action="{{ route('inscription.step2.store') }}" enctype="multipart/form-data" id="studentForm">
                @csrf
                
                <!-- Identité -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">👤</div>
                        Identité de l'élève
                    </h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="nom">
                                Nom *
                                <span class="form-label-ar">اللقب</span>
                            </label>
                            <input type="text" class="form-input @error('eleve.nom') error @enderror" id="nom" name="eleve[nom]" value="{{ old('eleve.nom', $inscription->eleve->nom ?? '') }}" required>
                            @error('eleve.nom')
                                <span class="error-message" style="display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="prenom">
                                Prénom *
                                <span class="form-label-ar">الاسم</span>
                            </label>
                            <input type="text" class="form-input @error('eleve.prenom') error @enderror" id="prenom" name="eleve[prenom]" value="{{ old('eleve.prenom', $inscription->eleve->prenom ?? '') }}" required>
                            @error('eleve.prenom')
                                <span class="error-message" style="display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="date_naissance">
                                Date de naissance *
                                <span class="form-label-ar">تاريخ الازدياد</span>
                            </label>
                            <div class="date-input-wrapper">
                                <input type="date" class="form-input @error('eleve.date_naissance') error @enderror" id="date_naissance" name="eleve[date_naissance]" value="{{ old('eleve.date_naissance', optional($inscription->eleve)->date_naissance ? optional($inscription->eleve)->date_naissance->format('Y-m-d') : '') }}" required>
                                <span class="date-icon">📅</span>
                            </div>
                            @error('eleve.date_naissance')
                                <span class="error-message" style="display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="lieu_naissance">
                                Lieu de naissance *
                                <span class="form-label-ar">مكان الازدياد</span>
                            </label>
                            <input type="text" class="form-input @error('eleve.lieu_naissance') error @enderror" id="lieu_naissance" name="eleve[lieu_naissance]" value="{{ old('eleve.lieu_naissance', $inscription->eleve->lieu_naissance ?? '') }}" required>
                            @error('eleve.lieu_naissance')
                                <span class="error-message" style="display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Sexe *
                                <span class="form-label-ar">الجنس</span>
                            </label>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" class="radio-input" id="male" name="eleve[sexe]" value="M" {{ old('eleve.sexe', $inscription->eleve->sexe ?? '') == 'M' ? 'checked' : '' }} required>
                                    <label class="radio-label" for="male">Garçon / ذكر</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" class="radio-input" id="female" name="eleve[sexe]" value="F" {{ old('eleve.sexe', $inscription->eleve->sexe ?? '') == 'F' ? 'checked' : '' }} required>
                                    <label class="radio-label" for="female">Fille / أنثى</label>
                                </div>
                            </div>
                             @error('eleve.sexe')
                                <span class="error-message" style="display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nationalite">
                                Nationalité *
                                <span class="form-label-ar">الجنسية</span>
                            </label>
                            <input type="text" class="form-input @error('eleve.nationalite') error @enderror" id="nationalite" name="eleve[nationalite]" value="{{ old('eleve.nationalite', $inscription->eleve->nationalite ?? 'Marocaine') }}" required>
                            @error('eleve.nationalite')
                                <span class="error-message" style="display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Scolarité précédente -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">🏫</div>
                        Scolarité précédente
                    </h2>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label" for="previousSchool">
                                École précédente
                                <span class="form-label-ar">المدرسة السابقة</span>
                            </label>
                            <input type="text" class="form-input" id="previousSchool" name="eleve[ecole_precedente]" value="{{ old('eleve.ecole_precedente', $inscription->eleve->ecole_precedente ?? '') }}" placeholder="Nom de l'école (si applicable)">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="previousLevel">
                                Niveau précédent
                                <span class="form-label-ar">المستوى السابق</span>
                            </label>
                            <select class="form-input" id="previousLevel" name="eleve[niveau_precedent]">
                                <option value="">-- Sélectionner --</option>
                                <option value="none" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'none') selected @endif>Aucun</option>
                                <option value="creche" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'creche') selected @endif>Crèche</option>
                                <option value="ps" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'ps') selected @endif>Petite Section</option>
                                <option value="ms" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'ms') selected @endif>Moyenne Section</option>
                                <option value="gs" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'gs') selected @endif>Grande Section</option>
                                <option value="cp" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'cp') selected @endif>CP / 1ère année</option>
                                <option value="ce1" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'ce1') selected @endif>CE1 / 2ème année</option>
                                <option value="ce2" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'ce2') selected @endif>CE2 / 3ème année</option>
                                <option value="cm1" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'cm1') selected @endif>CM1 / 4ème année</option>
                                <option value="cm2" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == 'cm2') selected @endif>CM2 / 5ème année</option>
                                <option value="6eme" @if(old('eleve.niveau_precedent', $inscription->eleve->niveau_precedent ?? '') == '6eme') selected @endif>6ème année</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="previousYear">
                                Année scolaire
                                <span class="form-label-ar">السنة الدراسية</span>
                            </label>
                            <input type="text" class="form-input" id="previousYear" name="eleve[annee_scolaire]" value="{{ old('eleve.annee_scolaire', $inscription->eleve->annee_scolaire ?? '') }}" placeholder="Ex: 2024-2025">
                        </div>
                    </div>
                </div>

                <!-- Photo -->
                <div class="form-section">
                    <h2 class="section-title">
                        <div class="section-icon">📸</div>
                        Photo de l'élève
                    </h2>
                    <div class="photo-upload" onclick="document.getElementById('photoInput').click()">
                        <div class="photo-upload-icon">📷</div>
                        <p class="photo-upload-text">Cliquez pour ajouter une photo</p>
                        <p class="photo-upload-hint">Format: JPG, PNG (Max 2MB)</p>
                        <img class="photo-preview" id="photoPreview" alt="Photo de l'élève" src="{{ optional($inscription->eleve)->photo ? asset('storage/' . $inscription->eleve->photo) : '' }}" style="{{ optional($inscription->eleve)->photo ? '' : 'display:none;' }}">
                        <input type="file" name="eleve[photo]" id="photoInput" accept="image/*" style="display: none;" onchange="previewPhoto(event)">
                    </div>
                    @error('eleve.photo')
                        <span class="error-message" style="display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('inscription.step1') }}" class="btn btn-secondary">
                        ← Précédent
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Suivant →
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        function previewPhoto(event) {
            const file = event.target.files[0];
            if (file && file.size <= 2 * 1024 * 1024) { // 2MB limit
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('photoPreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else if(file) {
                alert('La photo doit être inférieure à 2MB');
                event.target.value = ''; // Clear the input
            }
        }

        // Clear errors on input
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
                const errorMessage = this.parentElement.querySelector('.error-message');
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html> 