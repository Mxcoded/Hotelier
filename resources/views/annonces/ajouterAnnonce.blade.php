<x-master>
    <section id="services" class="services services mt-5">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <a class="" href="{{ route('annonces') }}"><strong>retour en arriere</strong> </a>
            <div class="section-title">
            @include("inc.message-validation")
                <h2>Nouvelle annonce</h2>
            </div>

            <div class="card col-md-8 offset-md-2">
                @if (isset($annonce))
                <form action="{{ route('annonces/modifier', $annonce) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @else
                    <form action="{{ route('annonces/store') }}" method="post" enctype="multipart/form-data">
                        @method('post')
                        @endif
                        @csrf
                        <div class="row">
                            @error("titre")
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-group">
                                <input type="text" name="titre" class="form-control" id="titre" placeholder="titre de l'annonce"
                                    required="" value="{{ isset($annonce->titre) ? $annonce->titre : old('titre') }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    @error("categorie")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-3">
                                        <input class="form-control" list="categories" name="categorie" value="{{ isset($annonce->categorie->designation) ? $annonce->categorie->designation : old('categorie') }}"
                                            placeholder="Catégorie de l'annonce">
                                        <datalist id="categories" name="provincategorie">
                                            @foreach( $categories as $categorie)
                                            <option value="{{ $categorie->designation }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    @error("source")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group mt-3">
                                        <input type="text" name="source" class="form-control" id="source" placeholder="Source de l'information"
                                            required="" value="{{ isset($annonce->lien_source) ? $annonce->lien_source : old('source') }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        @error("dateButoir")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group mt-3">
                            <input type="date" class="form-control" name="dateButoir" id="dateButoir" placeholder="Date butoir de l'annonce"
                                required="" value="{{ isset($annonce->date_fin) ? $annonce->date_fin : old('dateButoir') }}">
                        </div>

                        @error("description")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="description" rows="5" placeholder="Description detaillée de l'annonce"
                                required="" value="{{ isset($annonce->description) ? $annonce->description : old('description') }}">{{ isset($annonce->description) ? $annonce->description : old('description') }}</textarea>
                        </div>

                        @error("photo")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group mt-3">
                            <input type="file" name="photo" id="photo" class="form-control mt-1 image" placeholder="choisir une photo"
                                value="{{ old('photo') }}" />
                        </div>

                        <div class="text-center">
                            <a href="{{ route('annonces') }}" class="btn btn-danger mt-2" type="submit">annuler</a>
                            <button class="btn btn-success mt-2" type="submit">Publier l'annonce</button>
                            <button class="btn btn-success mt-2" type="reset">Initialiser</button>

                        </div>
            </div>
            </form>
        </div>
        </div>
    </section>
</x-master>