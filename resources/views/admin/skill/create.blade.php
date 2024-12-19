@extends('layouts.app')

@section('content')
    <div class="container py-3">
        @if($skill->name)
            <h1>{{ __('Modifica') }} {{ $skill->name }}</h1>
            <form action="{{ route('admin.skill.update', $skill) }}" method="POST" class="row" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
        @else
            <h1>{{ __('Nuova Skill') }}</h1>
            <form action="{{ route('admin.skill.store') }}" method="POST" class="row" id="manageCategoryForm" enctype="multipart/form-data">
                @csrf
        @endif
                <div class="form-group mt-3">
                    <input type="text" required minlength="3" value="{{ old('name', $skill->name) }}" placeholder="Nome Skill" class="form-control" name="name" id="name">
                </div>
                <div class="form-group mt-3">
                    <label for="type">{{ __('Tipo di Skill') }}</label>
                    <select required name="type" id="type" class="form-control" required>
                        <option value="Front-end" {{ old('type', $skill->type) == 'Front-end' ? 'selected' : '' }}>{{ __('Front-end') }}</option>
                        <option value="Back-end" {{ old('type', $skill->type) == 'Back-end' ? 'selected' : '' }}>{{ __('Back-end') }}</option>
                        <option value="Full-stack" {{ old('type', $skill->type) == 'Full-stack' ? 'selected' : '' }}>{{ __('Full-stack') }}</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <input type="text" required value="{{ old('color', $skill->color) }}" placeholder="Colore Skill" class="form-control" name="color" id="color">
                </div>
                <div class="form-group mt-3">
                    <input type="text" required value="{{ old('category', $skill->category) }}" placeholder="Categoria Skill" class="form-control" name="category" id="category">
                </div>
                <div class="form-group mt-3">
                    <input type="file" class="form-control" name="skill_image" id="skill_image">
                    @if($skill->skill_image)
                        <small class="text-muted">{{ $skill->skill_image }}</small>
                    @endif
                </div>
                <div class="form-group mt-3">
                    <input type="url" value="{{ old('url', $skill->url) }}" placeholder="Url Sito Web" class="form-control" name="url" id="url">
                </div>
                <div class="form-group mt-3">
                    <input required type="text" value="{{ old('user_id', $skill->user_id) }}" placeholder="Utente" class="form-control" name="user_id" id="user_id">
                </div>
                <div class="form-group mt-3 d-flex justify-content-center">
                    @if($skill->name)
                        <button class="btn btn-warning mt-2"><i class="fa-solid fa-pen px-1"></i>{{ __('Salva Modifiche') }}</button>
                    @else
                        <button class="btn btn-primary mt-2"><i class="fa-solid fa-save px-1"></i>{{ __('Salva') }}</button>
                    @endif
                </div>
            </form>

        @if($skill->name)
            <form action="{{ route('admin.skill.destroy', $skill) }}" class="row" onsubmit="return confirm('Sei sicuro di voler cancellare questa skill?')">
                @method("DELETE")
                @csrf
                <div class="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-danger mt-2" id="{{ $skill}}"><i class="fa-solid fa-trash px-1"></i>{{ __('Elimina') }}</button>
                </div>
            </form>
        @endif
    </div>
@endsection
