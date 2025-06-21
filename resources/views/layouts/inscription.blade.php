<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Inscription') - École La Victoire</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/inscription.css') }}" rel="stylesheet">
    @stack('styles')
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
                <span>{{ Auth::user()->name ?? 'Opératrice' }}</span>
                <div class="operator-avatar">{{ substr(Auth::user()->name ?? 'OP', 0, 2) }}</div>
            </div>
        </div>
    </header>

    <!-- Progress Bar Component -->
    @include('components.progress-bar', ['currentStep' => $currentStep ?? 1])

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/inscription.js') }}"></script>
    <script>
        // Fonction globale pour la navigation dans les barres de progression
        function handleStepNavigation(event, stepNumber, currentStep) {
            // Si on clique sur l'étape actuelle, ne rien faire
            if (stepNumber == currentStep) {
                event.preventDefault();
                return;
            }
            
            // Si on essaie d'aller vers une étape future non complétée
            if (stepNumber > currentStep) {
                event.preventDefault();
                
                // Vérifier si l'utilisateur a des données non sauvegardées
                const hasUnsavedData = checkUnsavedData();
                
                if (hasUnsavedData) {
                    if (confirm('Vous avez des données non sauvegardées. Voulez-vous vraiment quitter cette étape ?')) {
                        // Sauvegarder les données avant de naviguer
                        saveCurrentStepData();
                        window.location.href = event.target.closest('a').href;
                    }
                } else {
                    alert('Veuillez compléter l\'étape actuelle avant de continuer.');
                }
                return;
            }
            
            // Navigation vers une étape précédente (toujours autorisée)
            // L'utilisateur peut revenir en arrière sans problème
        }
        
        // Fonction pour vérifier s'il y a des données non sauvegardées
        function checkUnsavedData() {
            // Vérifier les champs de formulaire modifiés
            const form = document.querySelector('form');
            if (!form) return false;
            
            const inputs = form.querySelectorAll('input, select, textarea');
            for (let input of inputs) {
                if (input.value !== input.defaultValue) {
                    return true;
                }
            }
            return false;
        }
        
        // Fonction pour sauvegarder les données de l'étape actuelle
        function saveCurrentStepData() {
            // Sauvegarder dans localStorage
            const form = document.querySelector('form');
            if (form) {
                const formData = new FormData(form);
                const data = {};
                for (let [key, value] of formData.entries()) {
                    data[key] = value;
                }
                localStorage.setItem('stepData_' + getCurrentStep(), JSON.stringify(data));
            }
        }
        
        // Fonction pour récupérer le numéro de l'étape actuelle
        function getCurrentStep() {
            const activeStep = document.querySelector('.step.active, .progress-step.active');
            if (activeStep) {
                const stepCircle = activeStep.querySelector('.step-circle');
                if (stepCircle && stepCircle.textContent) {
                    return stepCircle.textContent.trim();
                }
            }
            return '1'; // Par défaut
        }
        
        // Ajouter des tooltips aux étapes
        document.addEventListener('DOMContentLoaded', function() {
            const stepLinks = document.querySelectorAll('.step-link');
            stepLinks.forEach(link => {
                const stepNumber = link.getAttribute('data-step');
                const currentStep = getCurrentStep();
                
                // Ajouter un tooltip
                link.title = `Étape ${stepNumber}`;
                
                // Ajouter une classe pour les étapes futures
                if (stepNumber > currentStep) {
                    link.classList.add('step-future');
                    link.title = `Étape ${stepNumber} - Complétez d'abord l'étape actuelle`;
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>

/* Styles pour les liens de navigation des étapes */
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
    position: relative;
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
    color: var(--primary-blue, #003C71);
}

/* Étapes futures (non accessibles) */
.step-link.step-future {
    opacity: 0.6;
    cursor: not-allowed;
}

.step-link.step-future:hover {
    background: rgba(239, 68, 68, 0.05);
    transform: none;
}

.step-link.step-future:hover .step-circle {
    transform: none;
    box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.3);
}

.step-link.step-future:hover .step-label {
    color: #EF4444;
}

/* Tooltip personnalisé */
.step-link[title]:hover::after {
    content: attr(title);
    position: absolute;
    bottom: -30px;
    left: 50%;
    transform: translateX(-50%);
    background: #1F2937;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 1000;
    pointer-events: none;
} 