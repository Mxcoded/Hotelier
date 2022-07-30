<x-master>
    <section id="about" class="about mt-5">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-tittle">La liste des modules</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Intitulé</th>
                            <th>UE</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modules as $module)
                        <tr>
                            <td>{!! $module->id !!} </td>
                            <td>{!! $module->intitule !!} </td>
                            <td>{!! $module->ue !!} </td>
                            <td>{!! $module->description !!} </td>
                            <td>
                                <a class='btn btn-primary btn-block' href="{!! route ('modules.show', $module->id) !!}">Voir</a>
                                <a class='btn btn-warning btn-block' href="{!! route ('modules.edit', $module->id) !!}">Modifier</a>
                                <a class="btn btn-danger" href="" onclick="event.preventDefault(); document.getElementById('supprimer').submit()">
                                    <i class="fas fa-trash"></i>Supprimer</a>
                                <form class="group-form ml-3" method="PUT" id="supprimer" action="{{ route('modules.destroy', $module->id) }}">
                                    @csrf
                                    @method('PUT')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-master>