<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configuration École La Victoire
    |--------------------------------------------------------------------------
    |
    | Configuration générale pour le système d'inscription de l'École La Victoire
    |
    */

    // Année scolaire actuelle
    'annee_scolaire_actuelle' => env('ANNEE_SCOLAIRE', '2025-2026'),

    // Informations de l'école
    'nom' => 'École La Victoire',
    'nom_arabe' => 'مدرسة النصر',
    'adresse' => '123 Rue de l\'Éducation, Casablanca',
    'telephone' => '+212 5 22 123 456',
    'email' => 'contact@ecolelavictoire.ma',
    'site_web' => 'https://ecolelavictoire.ma',

    // Frais de scolarité par niveau (en DH)
    'frais_scolarite' => [
        'MS' => 8000,    // Moyenne Section
        'GS' => 8500,    // Grande Section
        'CP' => 9000,    // 1ère année primaire
        'CE1' => 9500,   // 2ème année primaire
        'CE2' => 10000,  // 3ème année primaire
        'CM1' => 10500,  // 4ème année primaire
        'CM2' => 11000,  // 5ème année primaire
        '6eme' => 11500, // 6ème année primaire
    ],

    // Frais d'inscription (pour nouvelles inscriptions uniquement)
    'frais_inscription' => 1500,

    // Réduction pour réinscription (%)
    'reduction_reinscription' => 10,

    // Réduction pour fratrie (%)
    'reduction_fratrie' => 15,

    // Limite d'élèves par classe
    'limite_eleves_classe' => 25,

    // Périodes d'inscription
    'periodes_inscription' => [
        'debut' => '2025-01-01',
        'fin' => '2025-07-31',
    ],

    // Niveaux disponibles
    'niveaux' => [
        'MS' => 'Moyenne Section',
        'GS' => 'Grande Section',
        'CP' => '1ère année primaire',
        'CE1' => '2ème année primaire',
        'CE2' => '3ème année primaire',
        'CM1' => '4ème année primaire',
        'CM2' => '5ème année primaire',
        '6eme' => '6ème année primaire',
    ],

    // Types d'inscription
    'types_inscription' => [
        'nouvelle' => 'Nouvelle inscription',
        'reinscription' => 'Réinscription',
        'transfert' => 'Transfert',
    ],

    // Statuts d'inscription
    'statuts_inscription' => [
        'en_cours' => 'En cours',
        'complete' => 'Complète',
        'validee' => 'Validée',
        'rejetee' => 'Rejetée',
    ],

    // Nationalités courantes
    'nationalites' => [
        'Marocain',
        'Français',
        'Algérien',
        'Tunisien',
        'Égyptien',
        'Sénégalais',
        'Mauritanien',
        'Autre',
    ],

    // Groupes sanguins
    'groupes_sanguins' => [
        'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
    ],

    // Niveaux d'étude des parents
    'niveaux_etude' => [
        'Primaire',
        'Collège',
        'Lycée',
        'Baccalauréat',
        'Bac+2',
        'Bac+3',
        'Bac+4',
        'Bac+5',
        'Doctorat',
    ],

    // Fournitures par défaut par niveau
    'fournitures_defaut' => [
        'MS' => [
            ['nom' => 'Uniforme scolaire', 'prix' => 150, 'obligatoire' => true],
            ['nom' => 'Cartable', 'prix' => 80, 'obligatoire' => true],
            ['nom' => 'Trousse complète', 'prix' => 45, 'obligatoire' => true],
            ['nom' => 'Cahiers', 'prix' => 30, 'obligatoire' => true],
        ],
        'GS' => [
            ['nom' => 'Uniforme scolaire', 'prix' => 150, 'obligatoire' => true],
            ['nom' => 'Cartable', 'prix' => 80, 'obligatoire' => true],
            ['nom' => 'Trousse complète', 'prix' => 45, 'obligatoire' => true],
            ['nom' => 'Cahiers', 'prix' => 35, 'obligatoire' => true],
        ],
        'CP' => [
            ['nom' => 'Uniforme scolaire', 'prix' => 150, 'obligatoire' => true],
            ['nom' => 'Cartable', 'prix' => 80, 'obligatoire' => true],
            ['nom' => 'Trousse complète', 'prix' => 45, 'obligatoire' => true],
            ['nom' => 'Cahiers', 'prix' => 40, 'obligatoire' => true],
            ['nom' => 'Livres de lecture', 'prix' => 120, 'obligatoire' => true],
        ],
        // ... autres niveaux
    ],

    // Configuration des documents
    'documents' => [
        'dossier_inscription' => [
            'format' => 'pdf',
            'template' => 'documents.dossier-inscription',
        ],
        'certificat_inscription' => [
            'format' => 'pdf',
            'template' => 'documents.certificat-inscription',
        ],
        'liste_fournitures' => [
            'format' => 'pdf',
            'template' => 'documents.liste-fournitures',
        ],
    ],

    // Configuration des notifications
    'notifications' => [
        'email' => [
            'enabled' => true,
            'from_address' => 'noreply@ecolelavictoire.ma',
            'from_name' => 'École La Victoire',
        ],
        'sms' => [
            'enabled' => false,
            'provider' => 'twilio',
        ],
    ],

    // Configuration du stockage
    'storage' => [
        'photos_eleves' => 'photos-eleves',
        'documents' => 'documents',
        'dossiers' => 'dossiers',
        'certificats' => 'certificats',
        'fournitures' => 'fournitures',
    ],

    // Configuration des sessions
    'session' => [
        'timeout' => 3600, // 1 heure
        'auto_save' => true,
        'save_interval' => 300, // 5 minutes
    ],

    // Configuration des validations
    'validation' => [
        'age_minimum' => 3,
        'age_maximum' => 12,
        'photo_max_size' => 2048, // KB
        'photo_formats' => ['jpg', 'jpeg', 'png'],
    ],
]; 