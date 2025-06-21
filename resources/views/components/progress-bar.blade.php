@props(['currentStep' => 1])

<div class="progress-wrapper">
    <div class="progress-container">
        <div class="progress-bar">
            <div class="progress-line"></div>
            <div class="progress-line-active" style="width: {{ ($currentStep / 7) * 100 }}%;"></div>
            
            @php
                $steps = [
                    1 => ['label' => "Type d'inscription", 'label_ar' => 'نوع التسجيل'],
                    2 => ['label' => 'Informations élève', 'label_ar' => 'معلومات التلميذ'],
                    3 => ['label' => 'Informations parents', 'label_ar' => 'معلومات الوالدين'],
                    4 => ['label' => 'Informations médicales', 'label_ar' => 'المعلومات الطبية'],
                    5 => ['label' => 'Fournitures', 'label_ar' => 'اللوازم المدرسية'],
                    6 => ['label' => 'Récapitulatif', 'label_ar' => 'ملخص'],
                    7 => ['label' => 'Validation', 'label_ar' => 'التأكيد']
                ];
            @endphp
            
            @foreach($steps as $step => $labels)
                <div class="progress-step {{ $step < $currentStep ? 'completed' : ($step == $currentStep ? 'active' : '') }}">
                    <div class="step-circle {{ $step < $currentStep ? 'completed' : ($step == $currentStep ? 'active' : '') }}">
                        {{ $step < $currentStep ? '✓' : $step }}
                    </div>
                    <div class="step-label">
                        {{ $labels['label'] }}
                        <div class="step-label-ar">{{ $labels['label_ar'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> 