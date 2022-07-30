<x-master>
    <section id="services" class="services services mt-5">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            @if(isset($activite))
            <a class="" href="{{ route('activites.show', $activite) }}"><strong>retour en arriere</strong> </a>
            @else
            <a class="" href="{{ route('annonces') }}"><strong>retour en arriere</strong> </a>
            @endif
            <div class="section-title">
                <h2>Commenter sur l'activité {{ $activite->id }}</h2>
            </div>

            <div class="row">
                @if(isset($activite))
                <div class="col-lg-4 col-md-6 icon-box aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                    <div class="ico">
                        <img class="img-fluid" alt="" @if (count($activite->photos) > 0)
                        src="{{ asset('storage/images/activites/'.$photos->photo) ??
                        "https://picsum.photos/200/150" }}">
                        @else
                        src="{{ asset('/images/annonces/annonce.jpg') ?? "https://picsum.photos/200/150" }}">
                        @endif
                    </div>
                    <h4 class="title"><a href="">{{ $activite->intitule }}</a></h4>
                    <p class="description">{{ $activite->description }}</p>
                    <h6 class="title">{{ $activite->date_butoir }}</h6>
                    <a href="{{ route('activites.show', $activite) }}" title="Lire l'article">Voir detail</a>
                </div>
                @endif

                <div class="col-md-6 offset-md-2 mt-5">

                    @if (isset($activite))
                    <form action="{{ route('activites.commenter', $activite) }}" method="post" enctype="multipart/form-data">
                        @else
                        <form action="{{ route('annonces/store') }}" method="post" enctype="multipart/form-data">
                            @endif
                            @method('post')
                            @csrf

                            @error("commentaire")
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="commentaire" rows="10" placeholder="Ajouter un commentaire"
                                    required="" value="{{ old('description') }}">{{ old('commentaire') }}</textarea>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-success mt-2" type="submit">Publier le commentaire</button></div>
                        </form>
                </div>
            </div>
        </div>
    </section>
</x-master>