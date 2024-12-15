
@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/certification.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container my-5">
    @include('components.message')
    <div class="card mb-4">
        <div class="card-header bg-dark text-light py-4 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 me-4">{{ __('Certificazioni') }}</h3>

            <a class="btn btn-primary me-4" href="{{ route('admin.certification.create') }}">{{ __('Nuovo') }}</a>

            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cerca Certificazioni" aria-label="Cerca Certificazioni">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark text-bg-light">
                        <tr>
                            <th scope="col">{{ __('Certificazione') }}</th>
                            <th scope="col">{{ __('Azienda') }}</th>
                            <th scope="col">{{ __('Data Rilascio') }}</th>
                            <th scope="col">{{ __('Url Certificazione') }}</th>
                            <th scope="col">{{ __('Id Certificazione') }}</th>
                            <th scope="col">{{ __('Azioni') }}</th>
                        </tr>
                    </thead>
                    <tbody id="certificationsTableBody">
                        @foreach ($certifications as $cer)
                        <tr class="align-middle">
                            <td class="text-center">
                                <span class="fw-semibold text-muted fw-bold">{{ $cer->title_certifications }}</span>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ $cer->company_certifications }}</span>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ \Carbon\Carbon::parse($cer->date_relase_certifications)->format('M Y') }}</span>
                            </td>
                            <td class="text-center">
                                <a class="fw-semibold text-success text-decoration-none">{{ $cer->url_certifications }}</a>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ $cer->id_certifications }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.certification.edit', $cer) }}" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifica">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.certification.destroy', $cer) }}" method="POST" class="mb-0" onsubmit="return confirm('Sei sicuro di voler eliminare questo lavoro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Elimina">
                                            <i class="fa-solid fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('searchInput');
        const certificationsTableBody = document.getElementById('certificationsTableBody');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = certificationsTableBody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;

                // Rimuovi la classe di evidenziazione dalle righe precedenti
                rows[i].classList.remove('highlight-row');

                // Loop through each cell in the row to check for a match
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().includes(filter)) {
                        found = true;
                        break;
                    }
                }

                // Aggiungi la classe di evidenziazione alla riga se trovata
                if (found) {
                    rows[i].classList.add('highlight-row');
                }

                // Show or hide the row based on the search
                rows[i].style.display = found ? "" : "none";
            }
        });
    });
</script>
@endsection


@endsection

