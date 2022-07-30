<x-master>
    <section id="featured-services" class="featured-services mt-5">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title">
                <h2>Les annonces</h2>
            </div>
            <div class="container aos-init aos-animate mb-3">
                <a class="btn btn-success cta-btn scrollto" href="{{ route('annonces/creer') }}"><i class="fas fa-plus"></i>Ajouter
                    une nouvelle annonce</a>
            </div>
            @include("inc.message-validation")
            @if(count($annonces) > 0 )
            <hr>
            <div class="row">
                @foreach ($annonces as $annonce)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon">
                            <img class="img-fluid" alt="" @if (count($annonce->photos) > 0)
                            src="{{ asset('storage/images/annonces/'.$annonce->photos[0]->photo) ??
                            "https://picsum.photos/200/150" }}">
                            @else
                            src="{{ asset('/images/annonces/annonce.jpg') ?? "https://picsum.photos/200/150" }}">
                            @endif
                        </div>
                        <h4 class="title"><a href="">{{ $annonce->titre }}</a></h4>
                        <h4 class="title">Catégorie : {{ $annonce->categorie->designation }} </h4>
                        <p class="description">{{ substr($annonce->description, 0, 30) }}</p>
                        <p>date de fin : {{ $annonce->date_fin }} </p>
                        <a class="text-center" href="{{ route('annonces/detail', $annonce->id) }}">Voir detail</a>
                    </div>
                </div>
                @endforeach
                @else
                <h4> Annonces indisponible </h4>
                @endif

            </div>

        </div>
    </section>
</x-master>