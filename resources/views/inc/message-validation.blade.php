<div class="col-md-12 col-sm-12">
    @if(session('notification'))
        <div class="alert alert-success alert-dismissible fade show" role= "alert">
            {!! session("notification") !!}
            @if(strstr(session('notification'), 'panier'))
                <a class="nav-link alert alert-success col-md-2" href="/panier">Voir mon panier <i class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i>
                </a>
            @endif
            <button type="button" class="close" data-dismiss="alert" arial-label ="close">
                <span arial-hedden="true">&times;</span>
            </button>

        </div>
    @endif

    <script type="text/javascript">
        $(".alert").alert();
    </script>

</div>
