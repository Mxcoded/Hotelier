<x-master>
    <section id="detailactivites" class="about mt-5">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title">
                <h2>Detail de l'activité n° {{ $activites->id }}</h2>
                <h3 class="card">{{ $activites->titre }}</h3>
            </div>

            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-right">
                    <div class="icon-box mt-5 mt-lg-0">
                        <i class="bx bx-receipt"></i>
                        <h4>{{ $activites->intitule }}</h4>
                        <p>{{ $activites->description }}</p>
                    </div>
                    <div class="icon-box mt-5">
                        <i class="bx bx-cube-alt"></i>
                        <h4>Structure promotaire : <span>{{ $activites->structure->nom }} </span></h4>
                        <p>domaine : {{ $activites->structure->domaine }}</p>
                    </div>
                    <div class="icon-box mt-5">
                        <i class="bx bx-images"></i>
                        <h4>Description de l'activité</h4>
                        <p>{{ $activites->description }}</p>
                    </div>
                    <div class="icon-box mt-5">
                        <i class="bx bx-shield"></i>
                        <h4>Date de deroulement de l'activite</h4>
                        <p> du {{ $activites->date_debut }} au {{ $activites->date_butoir }}</p>
                        <p> Lieu de l'activité : {{ $activites->lieu }}</p>
                        <h5>Contacts :</h5>
                        <p>
                            <i class="bx bx-envelope"></i> {{ $activites->structure->mail }} <br>
                            <i class="bx bx-phone-call"></i> {{ $activites->structure->numero }}
                        </p>
                    </div>
                </div>
                <div class="image col-lg-6 order-1 order-lg-2 aos-init aos-animate" style="background-image: url( {{ asset('frontend/medico/img/features.jpg') }})"
                    data-aos="zoom-in">
                    <img class="img-fluid" alt="" @if (count($activites->photos) > 0)
                    src="{{ asset('storage/images/activites/'.$photos->photo) ?? "https://picsum.photos/200/150" }}">
                    @else
                    src="{{ asset('/images/activitess/activites.jpg') ?? "https://picsum.photos/200/150" }}">
                    @endif
                </div>
            </div>
            <ul class="nav-link d-flex-1 mb-3">
                <h4> <i class="bi bi-check-circle"></i> <a href="">Participer à cette activites</a></h4>
                <h4><i class="bi bi-check-circle"></i> <a href="{{ route('activites.commentaire', $activites) }}">Commenter
                        cette activité</a></h4>
                <h4><i class="bi bi-check-circle"></i><a href="mailto:{{ $activites->user->email }}">Contacter l'auteur
                        du
                        poste</a></h4>
            </ul>

            @if(count($activites->commentaires) > 0)
            <section id="faq" class="faq section-bg">
                <div class="container" data-aos="fade-up">
                    <ul class="faq-list">
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1"> <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i>Voir les commentaires</div>
                        <div class="row">
                            @foreach ($activites->commentaires as $commentaire)
                            <li class="col-md-4">
                                <div id="faq1" class="collapse card-body card" data-bs-parent=".faq-list">
                                    <h6>date commentaire {{ $commentaire->created_at }} </h6>
                                    <h6>Auteur : {{ $commentaire->user->name }} </h6>
                                    <p>
                                        {{ $commentaire->commentaire }}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </div>
                    </ul>
                </div>
            </section>
            @endif

        </div>
        @if (Auth()->user() && Auth()->user()->profile->profile = 'admin')
            <div class="offset-md-2 mt-3 col-md-10 d-flex-5">
            <a class="btn btn-primary" href="{{ route('activites.create') }}"><i class="fas fa-plus"></i> Ajouter une
                activites
                de meme categorie</a>
            <a class="btn btn-warning" href="{{ route('activites.edit', $activites->id) }}"><i class="fas fa-edit"></i>Modifier
                l'activitess</a>
            <a class="btn btn-danger" href="" onClick="event.preventDefault(); document.getElementById('supprimer').submit()">
                <i class="fas fa-trash"></i></a>
            <!-- Formulaire pour supprimer un Post : "activites.destroy" -->
            <form method="POST" id="supprimer" action="{{ route('activites.destroy', $activites) }}">
                <!-- CSRF token -->
                @csrf
                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                @method("DELETE")
            </form>
        </div>
        @endif
        
    </section>
</x-master>