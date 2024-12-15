@extends('layouts.app')

@section('content')
<div class="container my-5">
    @include('components.message')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark py-4 text-light">
            <h3 class="mb-0">{{ __('Progetti') }}</h3>

            <a class="btn btn-primary mx-3" href="{{ route('admin.project.create') }}">{{ __('Nuovo') }}</a>

            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cerca Progetti..." aria-label="Cerca Progetti">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark text-light">
                        <tr>
                            <th scope="col">{{ __('Progetto') }}</th>
                            <th scope="col">{{ __('Descrizione') }}</th>
                            <th scope="col">{{ __('Url') }}</th>
                            <th scope="col">{{ __('Url Video') }}</th>
                            <th scope="col">{{ __('Azioni') }}</th>
                        </tr>
                    </thead>
                    <tbody id="projectsTableBody">
                        @foreach ($projects as $project)
                        <tr class="align-middle">
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- @if($skill['skill_image'])
                                    <div class="me-3">
                                        <img src="{{ asset('storage/skill/' . $skill->skill_image) }}" class="img-fluid rounded-circle" alt="{{ $skill->name }}" style="width: 50px; height: 50px;">
                                    </div>
                                    @else
                                    <div class="me-3">
                                        <img src="/images/code/code.gif" class="img-fluid rounded-circle" alt="{{ $skill->name }}" style="width: 50px; height: 50px;">
                                    </div>
                                    @endif --}}
                                    <div>
                                        <a href="" class="text-decoration-none text-secondary fw-bold">{{ $project->name }}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ $project->text }}</span>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ $project->url }}</span>
                            </td>
                            <td class="text-center">
                                <span class="fw-semibold text-muted">{{ $project->url_video }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.project.edit', $project) }}" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifica">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.project.destroy', $project) }}" method="POST" class="mb-0" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
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
        const skillsTableBody = document.getElementById('projectsTableBody');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = skillsTableBody.getElementsByTagName('tr');

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
