@extends('layoutsddd.app')

@section('title', 'Kit Service | Profil')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
    <style>
        .fiche-wrapper {
            display: flex;
            justify-content: center;
            padding-top: 20px;
            position: relative;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .fiche {
            width: 100%;
            max-width: 21cm;
            padding: 1.5cm;
            font-size: 11px;
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .table td, .table th {
            vertical-align: middle;
            border-radius: 0 !important;
        }

        .photo-box, .signature-box, .alert {
            border-radius: 0 !important;
        }

        .header-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        @media (max-width: 768px) {
            .fiche {
                padding: 1rem;
                font-size: 10px;
            }

            .fiche .row > [class*="col-"] {
                margin-bottom: 1rem;
            }
        }
    </style>

    <div class="fiche-wrapper">

        <!-- Fiche principale -->
        <div class="fiche">

            <!-- En-tête -->
            <div class="d-flex align-items-center justify-content-between border-bottom mb-3">
                <div style="flex:1;">
                    <h1 class="h4 fw-bold" style="color:#FF6600; margin:0;">Kit Service Sarl</h1>
                </div>
                <div class="text-center" style="flex:2;">
                    <h2 class="h5 fw-bold text-dark" style="margin:0;">Fiche de Renseignement du Salarié</h2>
                </div>
                <div style="width:120px; height:120px; flex:none;" class="header-logo">
                    <img src="{{ asset('logo/img.png') }}" alt="Logo">
                </div>
            </div>

            <!-- Photo et tableau -->
            <div class="row mb-2">
                <div class="col-md-2 text-center mb-2 mb-md-0">
                    <div class="border bg-light d-flex align-items-center justify-content-center photo-box"
                         style="width:128px; height:160px; font-size:10px;">
                        Photo
                    </div>
                </div>

                <div class="col-md-10 table-responsive">
                    <table class="table table-bordered table-sm mb-0" style="font-size:11px;">
                        <tbody>
                        <tr class="table-secondary">
                            <th colspan="4">Informations Personnelles</th>
                        </tr>
                        <tr>
                            <td>Entreprise</td>
                            <td>Kit Service Sarl</td>
                            <td>Nom</td>
                            <td>{{ $employee->first_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>{{ $employee->last_name ?? 'N/A' }}</td>
                            <td>Situation familiale</td>
                            <td>Célibataire</td>
                        </tr>
                        <tr>
                            <td>Post nom</td>
                            <td>{{ $employee->middle_name ?? 'N/A' }}</td>
                            <td>Nombre d'enfants à charge</td>
                            <td>{{ $employee->children->count() ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Nombre de personnes à charge</td>
                            <td>{{ $employee->last_name ?? 'N/A' }}</td>
                            <td>Date de naissance</td>
                            <td>{{ $employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('d M Y') : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Département</td>
                            <td>{{ $employee->company->department ?? 'N/A' }}</td>
                            <td>Pays</td>
                            <td>{{ $employee->pays }}</td>
                        </tr>
                        <tr>
                            <td>N° carte CNSS</td>
                            <td>________________________</td>
                            <td>N° pièce d'identité</td>
                            <td>{{ $employee->number_card }}</td>
                        </tr>

                        <!-- Familiales -->
                        <tr class="table-secondary">
                            <th colspan="4">Informations Familiales</th>
                        </tr>
                        <tr>
                            <td>Nom du père </td>
                            <td>{{ $employee->Dependant->full_name ?? 'N/A'}}</td>
                            <td>Statut</td>
                            <td>Décédé</td>
                        </tr>
                        <tr>
                            <td>Nom de la mère</td>
                            <td>{{ $employee->Dependant->full_name ?? 'N/A'}}</td>
                            <td>Statut</td>
                            <td>En vie</td>
                        </tr>

                        <!-- Professionnelles -->
                        <tr class="table-secondary">
                            <th colspan="4">Informations Professionnelles</th>
                        </tr>
                        <tr>
                            <td>Adresse complète</td>
                            <td colspan="3">{{ $employee->Address->city}}</td>
                        </tr>
                        <tr>
                            <td>Emploi / Poste</td>
                            <td colspan="3">{{ $employee->Company->job_title ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Classification;</td>
                            <td>{{ $employee->Company->department ?? 'N/A' }}</td>
                            <td>Position</td>
                            <td>Senior</td>
                        </tr>
                        <tr>
                            <td>Niveau</td>
                            <td>2</td>
                            <td>Coefficient</td>
                            <td>{{ number_format($employee->salaries->base_salary,2 ?? 'N/A' ) }}</td>
                        </tr>
                        <tr>
                            <td>Échelon</td>
                            <td>1</td>
                            <td>Taux horaire brut (FC)</td>
                            <td>FC 600</td>
                        </tr>
                        <tr>
                            <td>Salaire mensuel brut</td>
                            <td>$ 1200.00</td>
                            <td>Horaire hebdomadaire & répartition</td>
                            <td>$ 300.00</td>
                        </tr>
                        <tr>
                            <td>Date d'embauche</td>
                            <td>01 Jan 2020</td>
                            <td>Numéro matricule</td>
                            <td>{{ $employee->employee_id }}</td>
                        </tr>
                        <tr>
                            <td>Type de contrat</td>
                            <td>{{ $employee->Company->contract_type ?? 'N/A'}}</td>
                            <td>Situation avant embauche</td>
                            <td>Étudiant</td>
                        </tr>

                        <!-- Conjoint & Enfants -->
                        <tr class="table-secondary">
                            <th colspan="4">Conjoint(e) et Enfants</th>
                        </tr>
                        <tr>
                            <td>Nom du conjoint(e)</td>
                            <td colspan="3">Jane Doe</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm mb-0" style="font-size:10px;">
                                        <thead class="table-light">
                                        <tr>
                                            <th>N°</th>
                                            <th>Prénom</th>
                                            <th>Nom</th>
                                            <th>Date de naissance</th>
                                            <th>☐ Décédé ☐ En vie</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Child1</td>
                                            <td>Doe</td>
                                            <td>01/01/2010</td>
                                            <td class="text-center">☐ Décédé ☑ En vie</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Child2</td>
                                            <td>Doe</td>
                                            <td>01/01/2012</td>
                                            <td class="text-center">☐ Décédé ☑ En vie</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>

                        <!-- Personne à contacter -->
                        <tr class="table-secondary">
                            <th colspan="4">Personne à contacter en cas d'urgence</th>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm mb-0" style="font-size:10px;">
                                        <thead class="table-light">
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom Complet</th>
                                            <th>Adresse</th>
                                            <th>Numéro Téléphone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Parent Doe</td>
                                            <td>Kinshasa</td>
                                            <td>+243 999 999 999</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="alert alert-warning p-2 mb-3" role="alert" style="font-size:10px;">
                <strong>Attention :</strong>
                <ul class="mb-0">
                    <li>Aucun de ceux du salaire ne pourra être établi après retour de cette fiche dûment complétée.
                    </li>
                    <li>Les champs signalés par un calendrier sont obligatoires pour établir la déclaration annuelle des
                        salaires.
                    </li>
                </ul>
            </div>

            <div class="row mt-3 text-center" style="font-size:10px;">
                <div class="col-md-6 mb-2 mb-md-0">
                    <div class="border p-2 signature-box">
                        <p class="fw-bold mb-2">Date et signature du représentant légal de l'entreprise</p>
                        <div class="border-top mt-1" style="height:50px;"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border p-2 signature-box">
                        <p class="fw-bold mb-2">Date et signature de l'agent</p>
                        <div class="border-top mt-1" style="height:50px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
