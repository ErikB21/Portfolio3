@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center experience mb-3">
                <h1>
                    {{ $work->exists ? __('Modifica Lavoro/Studio') : __('Nuovo Lavoro/Studio') }}
                </h1>
            </div>

            <form
                action="{{ $work->exists ? route('admin.work.update', $work) : route('admin.work.store') }}"
                method="POST"
                class="row"
                enctype="multipart/form-data"
            >
                @csrf
                @if($work->exists)
                    @method('PATCH')
                @endif

                <!-- Titolo Impiego -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Titolo Impiego') }}</label>
                    <input
                        type="text"
                        class="form-control"
                        name="work_title"
                        value="{{ old('work_title', $work->work_title) }}"
                        required
                        minlength="3"
                        placeholder="Titolo"
                    >
                </div>

                <!-- Azienda -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Azienda') }}</label>
                    <input
                        type="text"
                        class="form-control"
                        name="work_company"
                        value="{{ old('work_company', $work->work_company) }}"
                        required
                        minlength="3"
                        placeholder="Azienda"
                    >
                </div>

                <!-- Città -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Città') }}</label>
                    <input
                        type="text"
                        class="form-control"
                        name="work_city"
                        value="{{ old('work_city', $work->work_city) }}"
                        required
                        minlength="3"
                        placeholder="Città"
                    >
                </div>

                <!-- Inizio Impiego -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Inizio Impiego') }}</label>
                    <input
                        type="date"
                        class="form-control"
                        name="work_start"
                        value="{{ old('work_start', $work->work_start) }}"
                        required
                    >
                </div>

                <!-- Fine Impiego -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Fine Impiego') }}</label>
                    <input
                        type="date"
                        class="form-control"
                        name="work_end"
                        value="{{ old('work_end', $work->work_end) }}"
                    >
                </div>

                <!-- Presente -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels form-check-label text-secondary">{{ __('Presente') }}</label>
                    <input type="hidden" name="work_present" value="0"> <!-- Input nascosto -->
                    <input type="checkbox" class="form-check-input" name="work_present" value="1"
                        {{ old('work_present', $work->work_present) ? 'checked' : '' }}>
                </div>

                <!-- Immagine -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Immagine') }}</label>
                    <input type="file" class="form-control" name="work_logo">
                    @if($work->work_logo)
                        <small class="text-muted">{{ $work->work_logo }}</small>
                    @endif
                </div>

                <!-- Tipo: Lavoro o Studio -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Tipo') }}</label>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="type"
                            id="is_work"
                            value="work"
                            {{ old('type', $work->is_work ? 'work' : '') === 'work' ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="is_work">{{ __('Impiego') }}</label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="type"
                            id="is_study"
                            value="study"
                            {{ old('type', $work->is_study ? 'study' : '') === 'study' ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="is_study">{{ __('Studio') }}</label>
                    </div>
                </div>

                <!-- Descrizione -->
                <div class="col-md-12 form-group my-1">
                    <label class="labels text-secondary">{{ __('Descrizione Impiego') }}</label>
                    <textarea
                        class="form-control"
                        rows="3"
                        name="work_explained"
                        required
                        minlength="100"
                        maxlength="1000"
                    >{{ old('work_explained', $work->work_explained) }}</textarea>
                </div>

                <!-- Utente -->
                <div class="form-group mt-3">
                    <input
                        type="text"
                        class="form-control"
                        name="user_id"
                        value="{{ old('user_id', $work->user_id) }}"
                        required
                        placeholder="Utente"
                    >
                </div>

                <!-- Pulsanti -->
                <div class="form-group my-1 d-flex justify-content-center">
                    <button type="submit" class="btn btn-{{ $work ? 'warning' : 'primary' }} mt-2">
                        <i class="fa-solid fa-{{ $work ? 'pen' : 'save' }} px-1"></i>
                        {{ $work ? __('Salva Modifiche') : __('Salva') }}
                    </button>
                </div>
            </form>

            @if($work->exists)
                <form action="{{ route('admin.work.destroy', $work) }}" method="POST" class="row">
                    @method('DELETE')
                    @csrf
                    <div class="form-group mt-3 d-flex justify-content-center">
                        <button class="mx-3 btn btn-danger mt-2">
                            <i class="fa-solid fa-trash"></i> {{ __('Elimina') }}
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
