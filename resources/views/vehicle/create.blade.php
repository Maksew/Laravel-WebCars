<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- JS (placez ces scripts à la fin de votre document, juste avant la fermeture de la balise </body>) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/resources/js/AVG.js"></script>
<style>
    body {
        background-color: #ffffff; /* Couleur blanche */
    }

    .card {
        background-color: #ffffff; /* Couleur violet clair */
        color: #000000; /* Texte blanc */
    }

    body .btn-success {
        background-color: #7d52a1;
        border: none;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #7d52a1; /* Couleur violet clair */
        border: none;
        color: #ffffff; /* Texte blanc */
    }

    .btn-success:hover, .btn-danger:hover {
        background-color: #a17db3; /* Un violet encore plus clair au survol */
        opacity: 0.9;
    }
</style>


@auth

    @extends('layouts.app')

    @section('content')

        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('store.vehicle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand">Marque:</label>
                            <select id="brand" name="brand" class="form-control" onchange="updateModels()">
                                <option value="none">Sélectionnez une marque</option>
                                <option value="Alfa Romeo">Alfa Romeo</option>
                                <option value="Aston Martin">Aston Martin</option>
                                <option value="Audi">Audi</option>
                                <option value="Bentley">Bentley</option>
                                <option value="BMW">BMW</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Dodge">Dodge</option>
                                <option value="Ferrari">Ferrari</option>
                                <option value="Fiat">Fiat</option>
                                <option value="Ford">Ford</option>
                                <option value="Honda">Honda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Jaguar">Jaguar</option>
                                <option value="Jeep">Jeep</option>
                                <option value="Kia">Kia</option>
                                <option value="Lamborghini">Lamborghini</option>
                                <option value="Land Rover">Land Rover</option>
                                <option value="Lexus">Lexus</option>
                                <option value="Maserati">Maserati</option>
                                <option value="Mazda">Mazda</option>
                                <option value="McLaren">McLaren</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Mini">Mini</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Pagani">Pagani</option>
                                <option value="Porsche">Porsche</option>
                                <option value="Ram">Ram</option>
                                <option value="Rolls-Royce">Rolls-Royce</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Tesla">Tesla</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Volvo">Volvo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="model">Modèle:</label>
                            <select id="model" name="model" class="form-control">
                                <script>
                                    $(document).ready(function () {
                                        $('#brand').change(function () {
                                            var brand = $(this).val();
                                            $.ajax({
                                                type: "GET",
                                                url: "/get-models-by-brand/" + brand,
                                                success: function (res) {
                                                    $("#model").empty();
                                                    $("#model").append('<option>Sélectionnez un modèle</option>');
                                                    $.each(res, function (key, value) {
                                                        $("#model").append('<option value="' + value + '">' + value + '</option>');
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </select>
                        </div>

                        <!-- Catégorie et Énergie -->
                        <div class="form-group">
                            <label for="category" class="form-label">Catégorie:</label>
                            <select id="category" name="category" class="form-control">
                                <option value="none">Sélectionnez une catégorie</option>
                                <option value="berline">Berline</option>
                                <option value="suv">SUV</option>
                                <option value="cabriolet">Cabriolet</option>
                                <option value="coupe">Coupé</option>
                                <option value="monospace">Monospace</option>
                                <option value="hatchback">Hatchback</option>
                                <option value="pick-up">Pick-Up</option>
                                <option value="limousine">Limousine</option>
                                <option value="roadster">Roadster</option>
                                <option value="sport">Sportive</option>
                                <option value="utilitaire">Utilitaire</option>
                                <option value="off-road">Tout-Terrain</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="energy" class="form-label">Énergie:</label>
                            <select id="energy" name="energy" class="form-control">
                                <option value="none">Sélectionnez une énergie</option>
                                <option value="essence">Essence</option>
                                <option value="diesel">Diesel</option>
                                <option value="hybride">Hybride</option>
                                <option value="electrique">Electrique</option>
                                <option value="ethanol">Ethanol</option>
                                <option value="hydrogene">Hydrogène</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price" class="form-label">Prix:</label>
                            <input type="number" id="price" name="price" class="form-control"
                                   placeholder="Entrez le prix" required>
                        </div>


                        <div class="row mb-3">
                            <!-- Transmission -->
                            <div class="form-group col-md-3">
                                <label for="transmission" class="form-label">Transmission:</label>
                                <select id="transmission" name="transmission" class="form-control">
                                    <option value="none">Sélectionnez une transmission</option>
                                    <option value="manuelle">Manuelle</option>
                                    <option value="automatique">Automatique</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <!-- Année -->
                            <div class="form-group col-md-6">
                                <label for="year" class="form-label">Année:</label>
                                <input type="range" id="year" name="year" class="form-control" min="1900" max="2023"
                                       value="2023" oninput="yearOutput.value = year.value">
                                <output name="yearOutput" id="yearOutput">2023</output>
                            </div>

                            <!-- Kilométrage -->
                            <div class="form-group col-md-6">
                                <label for="kilometrage" class="form-label">Kilométrage:</label>
                                <div class="input-group">
                                    <input type="range" id="kilometrage" name="kilometrage" class="form-control-range"
                                           min="0" max="999999" value="0" oninput="syncValues()">
                                    <input type="number" id="kilometrageInput" name="kilometrageInput"
                                           class="form-control" min="0" max="999999" value="0" oninput="syncValues()">
                                </div>
                                <output name="kilometrageOutput" id="kilometrageOutput">0 km</output>
                            </div>

                            <script>
                                function syncValues() {
                                    var kilometrage = document.getElementById('kilometrage');
                                    var kilometrageInput = document.getElementById('kilometrageInput');
                                    var kilometrageOutput = document.getElementById('kilometrageOutput');

                                    // Synchroniser la valeur du curseur avec celle du champ de saisie numérique
                                    if (event.target.id === 'kilometrage') {
                                        kilometrageInput.value = kilometrage.value;
                                    } else {
                                        kilometrage.value = kilometrageInput.value;
                                    }

                                    // Mettre à jour l'affichage
                                    kilometrageOutput.value = kilometrage.value + ' km';
                                }
                            </script>

                        </div>


                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5 class="mb-3">Notes</h5>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="engine_rating" class="form-label">Note du moteur (sur 10):</label>
                                    <select id="engine_rating" name="engine_rating" class="form-control" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <textarea name="engine_justification" class="form-control mt-2"
                                              placeholder="Justificatif pour la note du moteur"></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="chassis" class="form-label">Châssis:</label>
                                    <select id="chassis" name="chassis_rating" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <textarea name="chassis_justification" class="form-control mt-2"
                                              placeholder="Justificatif pour la note du châssis"></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="handling" class="form-label">Tenue de route:</label>
                                    <select id="tenue" name="tenue_rating" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <textarea name="handling_justification" class="form-control mt-2"
                                              placeholder="Justificatif pour la note tenue de route"></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="visual" class="form-label">Visuel:</label>
                                    <select id="visual" name="visual_rating" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <textarea name="visual_justification" class="form-control mt-2"
                                              placeholder="Justificatif pour la note du visuel"></textarea>
                                </div>
                            </div>


                            <div class="form-group col-md-12 mt-3">
                                <label for="general" class="form-label">Note générale:</label>
                                <div id="generalDisplay">0</div> <!-- Affichage de la note générale -->
                                <input type="hidden" id="general" name="general_rating" value="0">
                                <!-- Champ caché pour soumettre la note générale -->
                                <textarea name="description" class="form-control mt-2"
                                          placeholder="Justificatif pour la note générale"></textarea>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const visualSelect = document.getElementById('visual');
                                    const tenueSelect = document.getElementById('tenue');
                                    const chassisSelect = document.getElementById('chassis');
                                    const engineSelect = document.getElementById('engine_rating');
                                    const generalDisplay = document.getElementById('generalDisplay');
                                    const generalInput = document.getElementById('general'); // Ceci est l'input caché

                                    visualSelect.addEventListener('change', updateGeneralRating);
                                    tenueSelect.addEventListener('change', updateGeneralRating);
                                    chassisSelect.addEventListener('change', updateGeneralRating);
                                    engineSelect.addEventListener('change', updateGeneralRating);

                                    function updateGeneralRating() {
                                        const visualValue = parseInt(visualSelect.value, 10);
                                        const tenueValue = parseInt(tenueSelect.value, 10);
                                        const chassisValue = parseInt(chassisSelect.value, 10);
                                        const engineValue = parseInt(engineSelect.value, 10);

                                        const average = Math.round((visualValue + tenueValue + chassisValue + engineValue) / 4);

                                        generalDisplay.textContent = average;
                                        generalInput.value = average;
                                    }
                                });
                            </script>


                            <!-- Images -->
                            <div class="form-group col-md-12">
                                <label for="images" class="form-label">Images du véhicule:</label>
                                <input type="file" id="images" name="vehicle_images[]" multiple class="form-control"
                                       accept="image/*">
                            </div>
                        </div>

                        <!-- Boutons -->
                        <button type="submit" class="btn btn-success">Ajouter le véhicule</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-danger">Annuler</a>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
        @else
            <?php
            // Rediriger vers la page de connexion avec un message flash
            header('Location: /login');
            session()->flash('error', 'Vous devez être connecté pour accéder à cette page.');
            exit();
            ?>

        @endauth
    @endsection




