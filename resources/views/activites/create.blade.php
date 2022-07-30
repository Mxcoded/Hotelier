<x-master>
    <section id="services" class="services services mt-5">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <a class="" href="{{ route('activites.index') }}"><strong>retour en arriere</strong> </a>
            <div class="section-title">
                <h2>Edidtion d'une nouvelle activité</h2>
            </div>

            <div class="">
                @if (isset($activites))
                <form action="{{ route('activites.update', $activites) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @else
                    <form action="{{ route('activites.store') }}" method="post" enctype="multipart/form-data">
                        @method('post')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Information annonce</legend>
                                    @error("intitule")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <input type="text" name="intitule" class="form-control" id="intitule"
                                            placeholder="Intitule de l'activites" required="" value="{{ isset($activites->intitule) ? $activites->intitule : old('intitule') }}">
                                    </div>

                                    @error("categorie")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-4">
                                        <input class="form-control" list="categories" name="categorie" value="{{ isset($activites->categorie->designation) ? $activites->categorie->designation : old('categorie') }}"
                                            placeholder="Catégorie de l'activites">
                                        <datalist id="categories" name="provincategorie">
                                            @foreach( $categories as $categorie)
                                            <option value="{{ $categorie->designation }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    @error("description")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="description" rows="9" placeholder="Description detaillée de l'activites"
                                            required="" value="{{ isset($activites->description) ? $activites->description : old('description') }}">{{ isset($activites->description) ? $activites->description : old('description') }}</textarea>
                                    </div>

                                    @error("photo")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-4">
                                        <input type="file" name="photo" id="photo" class="form-control mt-1 image"
                                            placeholder="choisir une photo" value="{{ old('photo') }}" />
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Information sur la structure</legend>
                                    @error("structure")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-5">
                                        <input class="form-control" list="structures" name="structure" value="{{ isset($activites->structure->nom) ? $activites->structure->nom : old('structure') }}"
                                            placeholder="Entrer le nom de la structure">
                                        <datalist id="structures" name="structure">
                                            @foreach( $structures as $structure)
                                            <option value="{{ $structure->nom }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    @error("domaine")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <input type="text" name="domaine" class="form-control" id="domaine" placeholder="domaine d'activite"
                                            required="" value="{{ isset($activites->structure->domaine) ? $activites->structure->domaine : old('domaine') }}">
                                    </div>

                                    @error("mail")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-2">
                                        <input type="text" name="mail" class="form-control" id="mail" placeholder="Adresse mail"
                                            required="" value="{{ isset($activites->structure->mail) ? $activites->structure->mail : old('mail') }}">
                                    </div>

                                    @error("adresse")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-2">
                                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="adresse d'activite"
                                            required="" value="{{ isset($activites->structure->adresse) ? $activites->structure->adresse : old('adresse') }}">
                                    </div>

                                    @error("numero")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-2">
                                        <input type="text" name="numero" class="form-control" id="numero" placeholder="numero de telephone"
                                            required="" value="{{ isset($activites->structure->numero) ? $activites->structure->numero : old('numero') }}">
                                    </div>

                                    @error("dateDebut")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-2"> Date de debut :
                                        <input type="date" class="form-control col-md-2" name="dateDebut" id="dateDebut"
                                            placeholder="Date butoir de l'activites" required="" value="{{ isset($activites->date_debut) ? $activites->date_debut : old('dateDebut') }}">
                                    </div>

                                    @error("dateButoir")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <div class="row col-md-10">
                                            <label class="col-md-4" for="dateButoir">Date de fin :</label>
                                            <input type="date" class="form-control col-md-3" name="dateButoir" id="dateButoir"
                                                placeholder="Date butoir de l'activites" required="" value="{{ isset($activites->date_butoir) ? $activites->date_butoir : old('dateButoir') }}">
                                        </div>
                                    </div>

                                    @error("lieu")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-2">
                                        <input type="text" name="lieu" class="form-control" id="lieu" placeholder="lieu de derouement de l'activites"
                                            required="" value="{{ isset($activites->lieu) ? $activites->lieu : old('lieu') }}">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('activites.index') }}" class="btn btn-danger mt-2" type="submit">annuler</a>
                            <button class="btn btn-success mt-2" type="reset">Initialiser</button>
                            <button class="btn btn-success mt-2" type="submit">Publier l'activité</button>

                        </div>
                    </form>
            </div>
        </div>
    </section>
</x-master>