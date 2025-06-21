@extends('layouts.inscription')

@section('title', "Type d'inscription")

@section('content')
<div class="main-content">
    <div class="page-header">
        <div class="school-year">Année scolaire {{ $anneeScolaire ?? '2025-2026' }}</div>
        <h1 class="page-title">Choisissez le type d'inscription</h1>
        <p class="page-subtitle">اختر نوع التسجيل</p>
    </div>

    <form method="POST" action="{{ route('inscription.step1.store') }}">
        @csrf
        <input type="hidden" name="type_inscription" id="type_inscription" value="{{ old('type_inscription') }}">

        <div class="cards-container">
            <!-- Nouvelle inscription -->
            <div class="inscription-card" onclick="selectType(this, 'nouveau')">
                <div class="card-icon">🎒</div>
                <h2 class="card-title">Nouvelle inscription</h2>
                <p class="card-subtitle">تسجيل جديد</p>
                <p class="card-description">
                    Pour les nouveaux élèves qui rejoignent l'École La Victoire pour la première fois.
                </p>
                <div class="card-features">
                    <div class="feature-item"><span class="feature-icon">✓</span><span>Création complète du dossier</span></div>
                    <div class="feature-item"><span class="feature-icon">✓</span><span>Attribution d'un numéro</span></div>
                    <div class="feature-item"><span class="feature-icon">✓</span><span>Formulaire détaillé</span></div>
                </div>
            </div>

            <!-- Réinscription -->
            <div class="inscription-card" onclick="selectType(this, 'reinscription')">
                <div class="card-icon">📚</div>
                <h2 class="card-title">Réinscription</h2>
                <p class="card-subtitle">إعادة التسجيل</p>
                 <p class="card-description">
                    Pour les élèves déjà inscrits qui continuent leur scolarité à l'École La Victoire.
                </p>
                <div class="card-features">
                    <div class="feature-item"><span class="feature-icon">✓</span><span>Mise à jour des informations</span></div>
                    <div class="feature-item"><span class="feature-icon">✓</span><span>Passage au niveau supérieur</span></div>
                    <div class="feature-item"><span class="feature-icon">✓</span><span>Formulaire pré-rempli</span></div>
                </div>
            </div>
        </div>
        @error('type_inscription')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Niveau scolaire -->
        <div class="form-section" id="niveau-section" style="display: none;">
            <h3 class="section-title">Niveau scolaire demandé</h3>
            <div class="form-group">
                <select name="niveau_demande" id="niveau_demande" class="form-control @error('niveau_demande') is-invalid @enderror">
                    <option value="">-- Sélectionner un niveau --</option>
                    <option value="ps" @if(old('niveau_demande') == 'ps') selected @endif>Petite Section</option>
                    <option value="ms" @if(old('niveau_demande') == 'ms') selected @endif>Moyenne Section</option>
                    <option value="gs" @if(old('niveau_demande') == 'gs') selected @endif>Grande Section</option>
                    <option value="cp" @if(old('niveau_demande') == 'cp') selected @endif>CP / 1ère année</option>
                    <option value="ce1" @if(old('niveau_demande') == 'ce1') selected @endif>CE1 / 2ème année</option>
                    <option value="ce2" @if(old('niveau_demande') == 'ce2') selected @endif>CE2 / 3ème année</option>
                    <option value="cm1" @if(old('niveau_demande') == 'cm1') selected @endif>CM1 / 4ème année</option>
                    <option value="cm2" @if(old('niveau_demande') == 'cm2') selected @endif>CM2 / 5ème année</option>
                    <option value="6eme" @if(old('niveau_demande') == '6eme') selected @endif>6ème année</option>
                </select>
                @error('niveau_demande')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="actions">
            <a href="#" class="btn btn-secondary">
                ← Retour
            </a>
            <button type="submit" class="btn btn-primary" id="nextBtn" disabled>
                Continuer →
            </button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    .main-content { max-width: 1000px; margin: 0 auto; padding: 0 2rem 4rem; }
    .page-header { text-align: center; margin-bottom: 3rem; }
    .page-title { font-size: 2rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 0.5rem; }
    .page-subtitle { font-size: 1.25rem; color: var(--gray); font-family: 'Tajawal', sans-serif; }
    .cards-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; margin-bottom: 1rem; }
    .inscription-card { background: var(--white); border-radius: var(--radius); padding: 2.5rem; box-shadow: var(--shadow); cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; border: 3px solid transparent; animation: fadeIn 0.5s ease forwards; opacity: 0; }
    .inscription-card:nth-child(1) { animation-delay: 0.1s; }
    .inscription-card:nth-child(2) { animation-delay: 0.2s; }
    .inscription-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: linear-gradient(90deg, var(--primary-blue), var(--primary-gold)); transform: translateY(-100%); transition: transform 0.3s ease; }
    .inscription-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
    .inscription-card:hover::before { transform: translateY(0); }
    .card-icon { width: 80px; height: 80px; background: var(--light-blue); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2.5rem; transition: all 0.3s ease; }
    .inscription-card:hover .card-icon { background: var(--primary-gold); transform: scale(1.1); }
    .card-title { font-size: 1.5rem; font-weight: 600; color: var(--primary-blue); text-align: center; margin-bottom: 0.5rem; }
    .card-subtitle { font-size: 1.1rem; color: var(--gray); text-align: center; font-family: 'Tajawal', sans-serif; margin-bottom: 1rem; }
    .card-description { text-align: center; color: var(--gray); line-height: 1.8; margin-bottom: 1.5rem; }
    .card-features { margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e0e0e0; }
    .feature-item { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem; color: var(--gray); font-size: 0.9rem; }
    .feature-icon { color: var(--primary-gold); }
    .inscription-card.selected { border-color: var(--primary-blue); background: linear-gradient(to bottom right, #f0f7ff, #fff); }
    .inscription-card.selected::after { content: '✓'; position: absolute; top: 1rem; right: 1rem; width: 35px; height: 35px; background: var(--success); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; font-weight: bold; animation: scaleIn 0.3s ease; }
    .actions { display: flex; justify-content: center; gap: 1rem; margin-top: 3rem; }
    .btn { padding: 0.875rem 2.5rem; border-radius: 50px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-size: 1rem; }
    .btn-primary { background: var(--primary-blue); color: var(--white); }
    .btn-primary:hover:not(:disabled) { background: var(--secondary-blue); transform: translateY(-2px); box-shadow: var(--shadow); }
    .btn-secondary { background: var(--white); color: var(--primary-blue); border: 2px solid var(--primary-blue); }
    .btn-secondary:hover { background: var(--light-blue); }
    .btn:disabled { opacity: 0.5; cursor: not-allowed; }
    .school-year { background: var(--primary-gold); color: var(--primary-blue); padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 600; display: inline-block; margin: 0 auto 2rem; }
    .alert.alert-danger { padding: 1rem; background: #ffe6e6; border: 1px solid var(--danger); color: var(--danger); border-radius: 8px; text-align: center; margin-top:1rem; }
    .form-section { background: var(--white); border-radius: var(--radius); padding: 2rem; margin-top:2rem; box-shadow: var(--shadow); animation: fadeIn 0.5s ease forwards; }
    .section-title { font-size: 1.25rem; font-weight: 600; color: var(--primary-blue); margin-bottom: 1rem; text-align: center; }
    .form-control { width: 100%; padding: 0.875rem 1rem; border: 2px solid #e0e0e0; border-radius: var(--radius); font-size: 1rem; background-color: #fff; }
    .form-control.is-invalid { border-color: var(--danger); }
    .invalid-feedback { color: var(--danger); font-size: 0.875rem; margin-top: 0.25rem; display: block; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes scaleIn { from { transform: scale(0); } to { transform: scale(1); } }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeInput = document.getElementById('type_inscription');
        const niveauSelect = document.getElementById('niveau_demande');
        const nextBtn = document.getElementById('nextBtn');
        const cards = document.querySelectorAll('.inscription-card');
        const niveauSection = document.getElementById('niveau-section');

        function checkCanContinue() {
            if (typeInput.value && niveauSelect.value) {
                nextBtn.disabled = false;
            } else {
                nextBtn.disabled = true;
            }
        }

        window.selectType = function(card, type) {
            cards.forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            typeInput.value = type;
            niveauSection.style.display = 'block';
            checkCanContinue();
        }

        niveauSelect.addEventListener('change', checkCanContinue);

        if (typeInput.value) {
            niveauSection.style.display = 'block';
            cards.forEach(card => {
                if (card.getAttribute('onclick').includes("'" + typeInput.value + "'")) {
                    card.classList.add('selected');
                }
            });
            checkCanContinue();
        }
    });
</script>
@endpush 