<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Page de Profil</title>
    <style>
        /* Add custom colors based on the logo */
        .custom-color {
            background-color: #A6B1E1; /* Example color from the logo */
        }
    </style>
</head>

<body class="bg-light">

<!-- Barre de Navigation -->
@include('layouts.navigation')

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="container mt-4">

    <div class="py-12">
        <!-- Formulaire de Mise à Jour des Informations de Profil -->
        <div class="mb-4 p-4 sm:p-8 bg-white shadow custom-color">
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Formulaire de Mise à Jour du Mot de Passe -->
        <div class="mb-4 p-4 sm:p-8 bg-white shadow custom-color">
            @include('profile.partials.update-password-form')
        </div>

        <!-- Formulaire de Suppression de Compte -->
        <div class="p-4 sm:p-8 bg-white shadow custom-color">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>

<!-- Scripts Bootstrap et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
