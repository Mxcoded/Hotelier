<x-master>
    <section id="about mt-5" class="about">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>Detail du programme n° {{ $programme->id }}</h2>
                <p>{{ $programme->libelle }}</p>
            </div>

            <div class="row">
                <div class="col-lg-8 aos-init aos-animate" data-aos="fade-right">
                    @if ($programme->fichier != null)

                    <object data="{{ asset('storage/images/programmes/'.$programme->fichier) }}" type="application/pdf"
                        width="700" height="500">
                    </object>

                    @else

                    @endif
                    <img src="assets/img/about.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0 content aos-init aos-animate" data-aos="fade-left">
                    <h3>Filière : {{ $programme->filiere->filiere }} Promotion {{ $programme->filiere->promotion }}</h3>
                    <p class="fst-italic">
                        date de debut : {{ $programme->date_debut }} <br>
                        date de fin : {{ $programme->date_fin }} <br>
                        {{ $programme->infoSupp }}
                    </p>

                </div>
            </div>

        </div>
    </section>
</x-master>