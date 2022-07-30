<x-master>
    <section class="container mt-5">
        <a href="{{ route('programmer') }}">Rediger un programme</a>
        <h1>Les programmes</h1>

        @if(count($programmes) > 0)

        <div class="container">
            <table class="table">
                <thead>
                    <th>nom du programme</th>
                    <th>date_debut</th>
                    <th>date_fin</th>
                    <th>Filières</th>
                </thead>
                <tbody>
                    @foreach($programmes as $p)
                    <tr>
                        <td>{{ $p->libelle }}</td>
                        <td>{{ $p->date_debut }}</td>
                        <td>{{ $p->date_fin }}</td>
                        <td>{{ $p->filiere->filiere }}</td>
                        <td><a class="btn btn-info" href="{{ route('programme.show', $p) }}"> <i class="fas fa-folder"></i>
                                voir detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else
        <h5>Aucun programme disponible</h5>
        @endif
    </section>


</x-master>