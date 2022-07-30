<x-master>
	<div class="container mt-5">
		<section id="services" class="services services">
			<div class="container aos-init aos-animate" data-aos="fade-up">
				<!-- Lien pour créer un nouvel article : "activites.create" -->
				<a class="btn btn-primary" href="{{ route('activites.create') }}" title="Créer un article">Publier une activité</a>

				<div class="section-title">
				@include("inc.message-validation")
					<h2>Les activités</h2>
					<p>Ici nous présentons toutes activités ménées par les différentes structure de l'ESI et de l'UNB</p>
				</div>

				<div class="row">
					@foreach ($activites as $activite)
					<div class="col-lg-4 col-md-6 icon-box aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
						<div class="icon">
							<img class="img-fluid" alt="" @if (count($activite->photos) > 0)
							src="{{ asset('storage/images/activites/'.$activite->photos[0]->photo) ??
							"https://picsum.photos/200/150" }}">
							@else
							src="{{ asset('/images/annonces/annonce.jpg') ?? "https://picsum.photos/200/150" }}">
							@endif
						</div>
						<h4 class="title"><a href="">{{ $activite->intitule }}</a></h4>
						<p class="description">{{ substr($activite->description, 0, 50) }}</p>
						<h6 class="title">{{ $activite->date_butoir }}</h6>
						<a href="{{ route('activites.show', $activite) }}" title="Lire l'article">Voir detail</a>
					</div>
					@endforeach

				</div>

			</div>
		</section>
	</div>
</x-master>