@if(session('success'))
    <div class="container">
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    </div>
@elseif(session('danger'))
    <div class="container">
        <div class="alert alert-danger">
            <i class="fa-solid fa-circle-xmark"></i> {{ session('danger') }}
        </div>
    </div>
@endif

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            $('div.alert-success, div.alert-danger').fadeOut(500, function () {
                $(this).remove();
            });
        }, 4000);
    });
</script>
@endsection

