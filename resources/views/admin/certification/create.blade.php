@extends('layouts.app')

@section('content')
    <div class="container py-3">
        @if($certification->title_certifications)
            <h1>{{ __('Modifica') }} {{ $certification->title_certifications }}</h1>
            <form action="{{ route('admin.certification.update', $certification) }}" method="POST" class="row" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
        @else
            <h1>{{ __('Nuova Certificazione') }}</h1>
            <form action="{{ route('admin.certification.store') }}" method="POST" class="row" id="manageCategoryForm" enctype="multipart/form-data">
                @csrf
        @endif
                <div class="form-group mt-3">
                    <input type="text" required minlength="3" value="{{ old('title_certifications', $certification->title_certifications) }}" placeholder="Titolo Certificazione" class="form-control" name="title_certifications" id="title_certifications">
                </div>
                @error('title_certifications')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror


                <div class="form-group mt-3">
                    <input type="text" required value="{{ old('company_certifications', $certification->company_certifications) }}" placeholder="Titolo Azienda Certificazione" class="form-control" name="company_certifications" id="company_certifications">
                </div>
                @error('company_certifications')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror



                <div class="form-group mt-3">
                    <input type="url" value="{{ old('url_certifications', $certification->url_certifications) }}" placeholder="Url Certificazione" class="form-control" name="url_certifications" id="url_certifications">
                </div>
                @error('url_certifications')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror



                <div class="form-group mt-3">
                    <input type="text" value="{{ old('id_certifications', $certification->id_certifications) }}" placeholder="Id Certificazione" class="form-control" name="id_certifications" id="id_certifications">
                </div>
                @error('id_certifications')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror



                <div class="form-group mt-3">
                    <input type="file" class="form-control" name="image_certifications" id="image_certifications">
                    @if($certification->image_certifications)
                        <small class="text-muted">{{ $certification->image_certifications }}</small>
                    @endif
                </div>
                @error('image_certifications')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror




                <div class="form-group mt-3">
                    <input type="date" value="{{ old('date_relase_certifications', \Carbon\Carbon::parse($certification->date_relase_certifications)->format('Y-m-d')) }}" placeholder="Data Rilascio Certificazione" class="form-control" name="date_relase_certifications" id="date_relase_certifications">
                </div>
                @error('date_relase_certifications')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror




                <div class="form-group mt-3">
                    <input type="number" required value="{{ old('user_id', $certification->user_id) }}" placeholder="Utente Certificazione" class="form-control" name="user_id" id="user_id">
                </div>
                @error('user_id')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror



                <div class="form-group mt-3 d-flex justify-content-center">
                    @if($certification->title_certifications)
                        <button class="btn btn-warning mt-2"><i class="fa-solid fa-pen px-1"></i>{{ __('Salva Modifiche') }}</button>
                    @else
                        <button class="btn btn-primary mt-2"><i class="fa-solid fa-save px-1"></i>{{ __('Salva') }}</button>
                    @endif
                </div>
            </form>

        @if($certification->title_certifications)
            <form action="{{ route('admin.certification.destroy', $certification->id) }}" method="POST" class="row">
                @method('DELETE')
                @csrf
                <div class="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-danger mt-2" id="{{ $certification->id }}"><i class="fa-solid fa-trash px-1"></i>{{ __('Elimina') }}</button>
                </div>
            </form>
        @endif
    </div>
@endsection
