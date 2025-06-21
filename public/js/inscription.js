// Inscription JavaScript - École La Victoire

document.addEventListener('DOMContentLoaded', function() {
    // Gestion de la sélection des cartes d'inscription
    const inscriptionCards = document.querySelectorAll('.inscription-card');
    
    inscriptionCards.forEach(card => {
        card.addEventListener('click', function() {
            // Retirer la sélection précédente
            inscriptionCards.forEach(c => c.classList.remove('selected'));
            
            // Ajouter la sélection à la carte cliquée
            this.classList.add('selected');
            
            // Activer le bouton suivant
            const nextBtn = document.querySelector('.btn-primary');
            if (nextBtn) {
                nextBtn.disabled = false;
            }
            
            // Cocher automatiquement le radio button caché
            const radioInput = this.querySelector('input[type="radio"]');
            if (radioInput) {
                radioInput.checked = true;
            }
        });
    });

    // Animation de la barre de progression
    function animateProgress() {
        const progressLine = document.querySelector('.progress-line-active');
        if (progressLine) {
            const currentStep = parseInt(progressLine.style.width) || 0;
            const targetStep = (currentStep / 100) * 7;
            progressLine.style.width = ((targetStep + 1) / 7) * 100 + '%';
        }
    }

    // Gestion des formulaires avec validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Validation personnalisée si nécessaire
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                } else {
                    field.classList.remove('error');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showAlert('Veuillez remplir tous les champs obligatoires.', 'error');
            }
        });
    });

    // Fonction pour afficher les alertes
    function showAlert(message, type = 'info') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.textContent = message;
        
        const mainContent = document.querySelector('.main-content');
        if (mainContent) {
            mainContent.insertBefore(alertDiv, mainContent.firstChild);
            
            // Auto-suppression après 5 secondes
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }
    }

    // Gestion de l'auto-sauvegarde
    let autoSaveTimeout;
    const formInputs = document.querySelectorAll('input, select, textarea');
    
    formInputs.forEach(input => {
        input.addEventListener('change', function() {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => {
                saveFormData();
            }, 2000); // Sauvegarde après 2 secondes d'inactivité
        });
    });

    function saveFormData() {
        const formData = new FormData();
        const inputs = document.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            if (input.name && input.value) {
                formData.append(input.name, input.value);
            }
        });

        // Envoi des données au serveur
        fetch('/inscription/api/session', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAutoSaveIndicator();
            }
        })
        .catch(error => {
            console.error('Erreur de sauvegarde:', error);
        });
    }

    function showAutoSaveIndicator() {
        const indicator = document.createElement('div');
        indicator.className = 'auto-save-indicator';
        indicator.innerHTML = '✓ Sauvegardé automatiquement';
        indicator.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--success);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            z-index: 1000;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(indicator);
        
        setTimeout(() => {
            indicator.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => indicator.remove(), 300);
        }, 2000);
    }

    // Gestion de la navigation entre étapes
    const progressSteps = document.querySelectorAll('.progress-step');
    progressSteps.forEach((step, index) => {
        step.addEventListener('click', function() {
            const stepNumber = index + 1;
            // Vérifier si l'étape est accessible
            if (canAccessStep(stepNumber)) {
                navigateToStep(stepNumber);
            }
        });
    });

    function canAccessStep(stepNumber) {
        // Logique pour vérifier si l'étape est accessible
        // À implémenter selon vos règles métier
        return true;
    }

    function navigateToStep(stepNumber) {
        // Navigation vers l'étape spécifiée
        const currentUrl = window.location.pathname;
        const baseUrl = currentUrl.split('/').slice(0, -1).join('/');
        
        switch(stepNumber) {
            case 1:
                window.location.href = '/inscription';
                break;
            case 2:
                window.location.href = baseUrl + '/eleve';
                break;
            case 3:
                window.location.href = baseUrl + '/parents';
                break;
            case 4:
                window.location.href = baseUrl + '/medical';
                break;
            case 5:
                window.location.href = baseUrl + '/fournitures';
                break;
            case 6:
                window.location.href = baseUrl + '/recap';
                break;
            case 7:
                window.location.href = baseUrl + '/validation';
                break;
        }
    }

    // Animations CSS supplémentaires
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        .error {
            border-color: var(--danger) !important;
            box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.2) !important;
        }
        
        .auto-save-indicator {
            box-shadow: var(--shadow);
        }
    `;
    document.head.appendChild(style);

    // Gestion du responsive
    function handleResponsive() {
        const isMobile = window.innerWidth <= 768;
        const progressSteps = document.querySelectorAll('.progress-step');
        
        progressSteps.forEach(step => {
            const label = step.querySelector('.step-label');
            if (label) {
                label.style.display = isMobile ? 'none' : 'block';
            }
        });
    }

    // Écouter les changements de taille d'écran
    window.addEventListener('resize', handleResponsive);
    handleResponsive(); // Exécuter au chargement

    // Initialisation des tooltips et autres éléments UI
    initializeUI();
});

function initializeUI() {
    // Initialisation des tooltips
    const tooltips = document.querySelectorAll('[data-tooltip]');
    tooltips.forEach(element => {
        element.addEventListener('mouseenter', showTooltip);
        element.addEventListener('mouseleave', hideTooltip);
    });

    // Initialisation des champs avec masque
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                value = value.match(/(\d{0,2})(\d{0,2})(\d{0,2})(\d{0,2})/);
                e.target.value = !value[2] ? value[1] : !value[3] ? value[1] + ' ' + value[2] : !value[4] ? value[1] + ' ' + value[2] + ' ' + value[3] : value[1] + ' ' + value[2] + ' ' + value[3] + ' ' + value[4];
            }
        });
    });
}

function showTooltip(e) {
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip';
    tooltip.textContent = e.target.dataset.tooltip;
    tooltip.style.cssText = `
        position: absolute;
        background: var(--gray-dark);
        color: white;
        padding: 0.5rem;
        border-radius: 4px;
        font-size: 0.875rem;
        z-index: 1000;
        pointer-events: none;
    `;
    
    document.body.appendChild(tooltip);
    
    const rect = e.target.getBoundingClientRect();
    tooltip.style.left = rect.left + 'px';
    tooltip.style.top = (rect.top - tooltip.offsetHeight - 5) + 'px';
    
    e.target.tooltip = tooltip;
}

function hideTooltip(e) {
    if (e.target.tooltip) {
        e.target.tooltip.remove();
        e.target.tooltip = null;
    }
} 