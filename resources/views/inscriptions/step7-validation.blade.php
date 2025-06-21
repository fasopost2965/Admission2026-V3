@extends('layouts.inscription')

@section('content')
<div class="validation-container">
    <div class="validation-header">
        <div class="school-logo">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="school-info">
            <h1>École La Victoire</h1>
            <p>Système d'inscription 2026</p>
        </div>
    </div>

    <div class="progress-section">
        <div class="stepper">
            <div class="step completed">
                <a href="{{ route('inscription.step1') }}" class="step-link" data-step="1">
                    <div class="step-circle">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="step-label">Type</span>
                </a>
            </div>
            <div class="step-connector completed"></div>
            <div class="step completed">
                <a href="{{ route('inscription.step2') }}" class="step-link" data-step="2">
                    <div class="step-circle">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="step-label">Élève</span>
                </a>
            </div>
            <div class="step-connector completed"></div>
            <div class="step completed">
                <a href="{{ route('inscription.step3') }}" class="step-link" data-step="3">
                    <div class="step-circle">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="step-label">Parents</span>
                </a>
            </div>
            <div class="step-connector completed"></div>
            <div class="step completed">
                <a href="{{ route('inscription.step4') }}" class="step-link" data-step="4">
                    <div class="step-circle">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="step-label">Médical</span>
                </a>
            </div>
            <div class="step-connector completed"></div>
            <div class="step completed">
                <a href="{{ route('inscription.step5') }}" class="step-link" data-step="5">
                    <div class="step-circle">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="step-label">Fournitures</span>
                </a>
            </div>
            <div class="step-connector completed"></div>
            <div class="step completed">
                <a href="{{ route('inscription.step6') }}" class="step-link" data-step="6">
                    <div class="step-circle">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="step-label">Récapitulatif</span>
                </a>
            </div>
            <div class="step-connector completed"></div>
            <div class="step active">
                <div class="step-circle">7</div>
                <span class="step-label">Validation</span>
            </div>
        </div>
    </div>

    <div class="validation-content">
        <div class="validation-card">
            <div class="validation-header">
                <h2><i class="fas fa-check-circle text-green-500"></i> Validation Finale</h2>
                <p>Votre inscription est prête à être validée</p>
            </div>

            <div class="inscription-summary">
                <div class="summary-section">
                    <h3>Informations de l'inscription</h3>
                    <div class="summary-grid">
                        <div class="summary-item">
                            <span class="label">Numéro d'inscription :</span>
                            <span class="value">{{ $inscription->numero_inscription ?? 'N/A' }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Type :</span>
                            <span class="value">{{ ucfirst($inscription->type ?? 'N/A') }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Statut :</span>
                            <span class="value status-pending">En attente de validation</span>
                        </div>
                    </div>
                </div>

                @if($inscription->eleve)
                <div class="summary-section">
                    <h3>Informations de l'élève</h3>
                    <div class="summary-grid">
                        <div class="summary-item">
                            <span class="label">Nom complet :</span>
                            <span class="value">{{ $inscription->eleve->prenom }} {{ $inscription->eleve->nom }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Date de naissance :</span>
                            <span class="value">{{ $inscription->eleve->date_naissance ?? 'N/A' }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="label">Niveau demandé :</span>
                            <span class="value">{{ $inscription->eleve->niveau_demande ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
                @endif

                <div class="summary-section">
                    <h3>Montant total</h3>
                    <div class="total-amount">
                        <span class="amount">{{ number_format($totalGeneral ?? 0, 2) }} MAD</span>
                        <span class="currency">Dirhams marocains</span>
                    </div>
                </div>
            </div>

            <div class="validation-actions">
                <div class="action-info">
                    <div class="info-item">
                        <i class="fas fa-info-circle text-blue-500"></i>
                        <span>Votre inscription sera validée après confirmation</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock text-orange-500"></i>
                        <span>Vous recevrez un email de confirmation</span>
                    </div>
                </div>

                <div class="action-buttons">
                    <button type="button" class="btn btn-secondary" onclick="goBack()">
                        <i class="fas fa-arrow-left"></i>
                        Retour
                    </button>
                    
                    <form method="POST" action="{{ route('inscription.step7.store', $inscription->id) }}" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i>
                            Valider l'inscription
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.validation-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 24px;
    background: #F7F7F7;
    min-height: 100vh;
}

.validation-header {
    display: flex;
    align-items: center;
    gap: 16px;
    background: white;
    padding: 24px;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    margin-bottom: 24px;
}

.school-logo {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #003C71, #0069FF);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
}

.school-info h1 {
    margin: 0;
    color: #003C71;
    font-size: 24px;
    font-weight: 700;
}

.school-info p {
    margin: 4px 0 0 0;
    color: #64748B;
    font-size: 14px;
}

.progress-section {
    background: white;
    padding: 24px;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    margin-bottom: 24px;
}

.stepper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.step-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
}

.step.completed .step-circle {
    background: #10B981;
    color: white;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
}

.step.active .step-circle {
    background: #003C71;
    color: white;
    box-shadow: 0 0 0 4px rgba(0, 60, 113, 0.2);
    animation: pulse 2s infinite;
}

.step-label {
    font-size: 12px;
    font-weight: 500;
    color: #64748B;
}

.step.completed .step-label,
.step.active .step-label {
    color: #003C71;
    font-weight: 600;
}

.step-connector {
    width: 40px;
    height: 2px;
    background: #E5E7EB;
    margin: 0 4px;
}

.step-connector.completed {
    background: #10B981;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 4px rgba(0, 60, 113, 0.2); }
    50% { box-shadow: 0 0 0 8px rgba(0, 60, 113, 0.1); }
    100% { box-shadow: 0 0 0 4px rgba(0, 60, 113, 0.2); }
}

.validation-content {
    background: white;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    overflow: hidden;
}

.validation-card {
    padding: 32px;
}

.validation-header {
    text-align: center;
    margin-bottom: 32px;
}

.validation-header h2 {
    margin: 0 0 8px 0;
    color: #003C71;
    font-size: 28px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}

.validation-header p {
    margin: 0;
    color: #64748B;
    font-size: 16px;
}

.inscription-summary {
    margin-bottom: 32px;
}

.summary-section {
    margin-bottom: 24px;
    padding: 20px;
    background: #F8FAFC;
    border-radius: 12px;
    border-left: 4px solid #003C71;
}

.summary-section h3 {
    margin: 0 0 16px 0;
    color: #003C71;
    font-size: 18px;
    font-weight: 600;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 16px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #E2E8F0;
}

.summary-item:last-child {
    border-bottom: none;
}

.summary-item .label {
    font-weight: 500;
    color: #64748B;
}

.summary-item .value {
    font-weight: 600;
    color: #1E293B;
}

.status-pending {
    color: #F59E0B;
    background: #FEF3C7;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.total-amount {
    text-align: center;
    padding: 24px;
    background: linear-gradient(135deg, #003C71, #0069FF);
    border-radius: 12px;
    color: white;
}

.total-amount .amount {
    display: block;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 4px;
}

.total-amount .currency {
    font-size: 14px;
    opacity: 0.9;
}

.validation-actions {
    border-top: 1px solid #E2E8F0;
    padding-top: 24px;
}

.action-info {
    margin-bottom: 24px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    font-size: 14px;
    color: #64748B;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
}

.btn {
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.btn-primary {
    background: linear-gradient(135deg, #003C71 0%, #0069FF 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(0, 60, 113, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(0, 60, 113, 0.4);
}

.btn-secondary {
    background: #F1F5F9;
    color: #64748B;
    border: 1px solid #E2E8F0;
}

.btn-secondary:hover {
    background: #E2E8F0;
    transform: translateY(-1px);
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
    color: #003C71;
}

@media (max-width: 768px) {
    .validation-container {
        padding: 12px;
    }
    
    .stepper {
        flex-wrap: wrap;
        gap: 4px;
    }
    
    .step-circle {
        width: 36px;
        height: 36px;
        font-size: 14px;
    }
    
    .step-label {
        font-size: 10px;
    }
    
    .step-connector {
        width: 20px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
function goBack() {
    window.history.back();
}

// Auto-save validation state
document.addEventListener('DOMContentLoaded', function() {
    localStorage.setItem('validationStep', 'completed');
    
    // Add some interaction feedback
    const validateBtn = document.querySelector('.btn-primary');
    if (validateBtn) {
        validateBtn.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Validation en cours...';
            this.disabled = true;
        });
    }
});
</script>
@endsection 