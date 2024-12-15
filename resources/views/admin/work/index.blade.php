
@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/work.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container my-5">
    @include('components.message')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-light py-4">
            <h3 class="mb-0 me-4">{{ __('Lavori') }}</h3>

            <a class="btn btn-primary me-4" href="{{ route('admin.work.create') }}">{{ __('Nuovo') }}</a>

            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cerca Lavori" aria-label="Cerca Lavori">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark text-light">
                        <tr>
                            <th scope="col">{{ __('Lavoro') }}</th>
                            <th scope="col">{{ __('Azienda') }}</th>
                            <th scope="col">{{ __('Città') }}</th>
                            <th scope="col">{{ __('Inizio lavoro') }}</th>
                            <th scope="col">{{ __('Fine Lavoro') }}</th>
                            <th scope="col">{{ __('Presente') }}</th>
                            <th scope="col">{{ __('Lavoro') }}</th>
                            <th scope="col">{{ __('Studio') }}</th>
                            <th scope="col">{{ __('Azioni') }}</th>
                        </tr>
                    </thead>
                    <tbody id="workTableBody">
                        @foreach ($works as $work)
                        <tr class="align-middle">
                            <td class="text-center">
                                <span class="fw-semibold text-muted fw-bold">{{ $work->work_title }}</span>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ $work->work_company }}</span>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ $work->work_city }}</span>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ \Carbon\Carbon::parse($work->work_start)->format('M Y') }}</span>
                            </td>
                            <td class="text-center">
                                @if($work->work_end)
                                    <span class="fw-semibold text-muted">{{ \Carbon\Carbon::parse($work->work_end)->format('M Y') }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($work->work_present)
                                    <span class="fw-semibold text-muted"><i class="fa-solid fa-star text-primary"></i></span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($work->is_work)
                                    <span class="fw-semibold text-muted"><i class="fa-solid fa-star text-primary"></i></span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($work->is_study)
                                    <span class="fw-semibold text-muted"><i class="fa-solid fa-star text-primary"></i></span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.work.edit', $work) }}" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifica">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.work.destroy', $work) }}" method="POST" class="mb-0" onsubmit="return confirm('Sei sicuro di voler eliminare questo lavoro?');">
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
        const workTableBody = document.getElementById('workTableBody');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = workTableBody.getElementsByTagName('tr');

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

