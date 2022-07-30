<x-master>
  <section id="detailAnnonce" class="about mt-5">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="section-title">
        <h2>Detail de l'annonce n° {{ $annonce->id }}</h2>
        <h3 class="card">{{ $annonce->titre }}</h3>
      </div>

      <div class="row">
        <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
          <img class="img-fluid" alt="" @if (count($annonce->photos) > 0)
          src="{{ asset('storage/images/annonces/'.$photos->photo) ?? "https://picsum.photos/200/150" }}">
          @else
          src="{{ asset('/images/annonces/annonce.jpg') ?? "https://picsum.photos/200/150" }}">
          @endif
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content aos-init aos-animate" data-aos="fade-left">
          <p class="card card-body fst-italic">{{ $annonce->description }}</p>

          <h3> {{ $annonce->categorie->designation }} </h3>
          <h5 class="fst-italic">
            {{ $annonce->categorie->description }}
          </h5>
          <p><strong>Date de poste : {{ $annonce->created_at }}</strong></p>
          <p><strong>Source de l'annonce : <a href="{{ $annonce->lien_source }}"> {{ $annonce->lien_source }}</a></strong></p>
          <p><strong>Date limite : {{ $annonce->date_fin }}</strong></p>
          <p><strong>Auteurs du poste : {{ $annonce->user->nom }} {{ $annonce->user->prenom }}</strong></p>
          <ul>   
            <li><i class="bi bi-check-circle"></i> <a href="">Ajouter dans la liste des souhaits</a></li>
              <li><i class="bi bi-check-circle"></i> <a href="{!! $annonce->lien_source !!}">Postuler à cette annonces</a>
            </li>
            <li><i class="bi bi-check-circle"></i><a href="mailto:{{ $annonce->user->email }}">Contacter l'auteur du
                poste</a></li>
          </ul>
        </div>
      </div>
      <div class="offset-md-2 mt-3 col-md-10 d-flex-5">
        <a class="btn btn-primary" href="{{ route('annonces/creer') }}"><i class="fas fa-plus"></i> Ajouter une annonce
          de meme categorie</a>
           @if (Auth()->user() && Auth()->user()->id == $annonce->user->id)
        <a class="btn btn-warning" href="{{ route('annonces/edit', $annonce->id) }}"><i class="fas fa-edit"></i>Modifier
          l'annonces</a>
        <a class="btn btn-danger" href="" onClick="event.preventDefault(); document.getElementById('supprimer').submit()">
          <i class="fas fa-trash"></i></a>
        <form class="group-form ml-3" method="POSt" id="supprimer" action="{{ route('annonces/destroy', $annonce) }}">
          @csrf
          @method('PUT')
        </form>
        @endif
      </div>
    </div>
  </section>
</x-master>