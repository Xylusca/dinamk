@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h1 class="mb-0">
                    <i class="bi bi-pencil me-2"></i>
                    Editar Usuário
                </h1>
            </div>

            <x-card subtitle="Editando: {{ $user->name }}">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <x-form-input name="name" label="Nome Completo" :value="$user->name" :required="true" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <x-form-input name="email" label="E-mail" type="email" :value="$user->email"
                                :required="true" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input name="password" label="Nova Senha"
                                formText="Deixe em branco para manter mesma senha." type="password" />
                        </div>
                        <div class="col-md-6">
                            <x-form-input name="password_confirmation" label="Confirmar Nova Senha" type="password" />
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check2 me-2"></i>
                                    Atualizar Usuário
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x me-2"></i>
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
@endsection
