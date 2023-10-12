<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter un véhicule</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.vehicle') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <!-- Marque -->
                        <div class="col-md-3">
                            <label for="brand" class="form-label">Marque:</label>
                            <select id="brand" name="brand" onchange="updateModels()" class="form-select">
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
                        <div class="col-md-3">
                            <label for="model" class="form-label">Modèle:</label>
                            <select id="model" name="model" class="form-select">
                                <!-- Modèle -->
                                <script>
                                    $(document).ready(function() {
                                        $('#brand').change(function() {
                                            var brand = $(this).val();
                                            $.ajax({
                                                type: "GET",
                                                url: "/get-models-by-brand/" + brand,
                                                success: function(res) {
                                                    $("#model").empty();
                                                    $("#model").append('<option>Sélectionnez un modèle</option>');
                                                    $.each(res, function(key, value) {
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
                        <div class="col-md-3">
                            <label for="category" class="form-label">Catégorie:</label>
                            <select id="category" name="category" class="form-select">
                                <!-- Options pour catégorie -->
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="energy" class="form-label">Énergie:</label>
                            <select id="energy" name="energy" class="form-select">
                                <!-- Options pour énergie -->
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Transmission et Agence -->
                        <div class="col-md-3">
                            <label for="transmission" class="form-label">Transmission:</label>
                            <select id="transmission" name="transmission" class="form-select">
                                <!-- Options pour transmission -->
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="agency" class="form-label">Agence:</label>
                            <select id="agency" name="agency" class="form-select">
                                <!-- Options pour agence -->
                            </select>
                        </div>

                        <!-- Prix -->
                        <div class="col-md-6">
                            <label for="price" class="form-label">Prix:</label>
                            <input type="number" id="price" name="price" class="form-control"
                                   placeholder="12€ — 200 012€">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Année -->
                        <div class="col-md-6">
                            <label for="year" class="form-label">Année:</label>
                            <input type="number" id="year" name="year" class="form-control" placeholder="1938 — 2023">
                        </div>

                        <!-- Kilométrage -->
                        <div class="col-md-6">
                            <label for="kilometrage" class="form-label">Kilométrage:</label>
                            <input type="number" id="kilometrage" name="kilometrage" class="form-control"
                                   placeholder="100km — 275 800km">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Région -->
                        <div class="col-md-12">
                            <label for="region" class="form-label">Région:</label>
                            <select id="region" name="region" class="form-select">
                                <!-- Options pour région -->
                            </select>
                        </div>
                    </div>

                    <h5 class="mb-3">Notes</h5>
                    <div class="row mb-3">
                        <!-- Notes -->
                        <div class="col-md-3">
                            <label for="engine" class="form-label">Motorisation:</label>
                            <input type="number" id="engine" name="engine_rating" min="0" max="10" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="chassis" class="form-label">Châssis:</label>
                            <input type="number" id="chassis" name="chassis_rating" min="0" max="10"
                                   class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="handling" class="form-label">Tenue de route:</label>
                            <input type="number" id="handling" name="handling_rating" min="0" max="10"
                                   class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="visual" class="form-label">Visuel:</label>
                            <input type="number" id="visual" name="visual_rating" min="0" max="10" class="form-control">
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="general" class="form-label">Note générale:</label>
                            <input type="number" id="general" name="general_rating" min="0" max="10"
                                   class="form-control">
                        </div>
                    </div>
                    <h5 class="mb-3">Autres informations</h5>
                    <div class="row mb-3">
                        <!-- Description -->
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description du véhicule:</label>
                            <textarea id="description" name="description" rows="4" class="form-control"
                                      placeholder="Entrez une description détaillée du véhicule..."></textarea>
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="images" class="form-label">Images du véhicule:</label>
                            <input type="file" id="images" name="vehicle_images[]" multiple class="form-control">
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Ajouter le véhicule</button>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Annuler</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection


