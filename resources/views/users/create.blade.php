@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h1 class="mb-0">
                    <i class="bi bi-person-plus me-2"></i>
                    Cadastrar Usuário
                </h1>
            </div>

            <x-card>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <x-form-input name="name" label="Nome Completo" :required="true" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <x-form-input name="email" label="E-mail" type="email" :required="true" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input name="password" label="Senha" type="password" :required="true" />
                        </div>
                        <div class="col-md-6">
                            <x-form-input name="password_confirmation" label="Confirmar Senha" type="password"
                                :required="true" />
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check2 me-2"></i>
                                    Cadastrar Usuário
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
