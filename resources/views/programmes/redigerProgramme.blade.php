<x-master>
    <section id="programme about" class="mt-5 programme">
        <div class="section-tittle">
            <h1 class="card-tittle text-center">Redaction d'un nouveau programme</h1>
        </div>
        <div class="container text-center card col-md-6">
            <form action="{{ route('programme/publier') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="form-group mt-4">
                    <input class="form-control" list="filieres" name="filiere" value="{{ isset($filieres->filiere) ? $filieres->filiere : old('filiere') }}"
                        placeholder="Choisir la filière concernée">
                    <datalist id="filieres" name="filiere">
                        @foreach( $filieres as $filiere)
                        <option value="{{ $filiere->id }}">{{ $filiere->filiere }} -Promotion {{ $filiere->promotion }}</option>
                        @endforeach
                    </datalist>
                </div>

                <div class="row mt-5">
                    <label for="choix" class="label">Fichier Déja Disponible ?</label>
                    <select name="choix" id="choix" class="form-control col-md-3">
                        <option value="1">Charger un fichier</option>
                        <option value="0">Rediger </option>
                    </select>
                </div>

                <div class="col-md-6 mt-5">
                    <input type="file" name="fichier" id="fichier" class="form-control">
                </div>

                @error("dateDebut")
                <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-group mt-5">
                    <input type="date" class="form-control" name="dateDebut" id="dateDebut" placeholder="Date butoir de l'annonce"
                        required="" value="{{ old('dateDebut') }}">
                </div>

                @error("dateFin")
                <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-group mt-5">
                    <input type="date" class="form-control" name="dateFin" id="dateFin" placeholder="Date butoir de l'annonce"
                        required="" value="{{ old('dateFin') }}">
                </div>


                <div class="mt-5">
                    <button class="btn btn-success" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </section>
</x-master>