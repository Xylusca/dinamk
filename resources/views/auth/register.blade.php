@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Criar Conta" subtitle="Cadastre-se no sistema">
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf

                    <x-form-input name="name" label="Nome Completo" :required="true" />

                    <x-form-input name="email" label="E-mail" type="email" :required="true" />

                    <x-form-input name="password" label="Senha" type="password" :required="true" />

                    <x-form-input name="password_confirmation" label="Confirmar Senha" type="password" :required="true" />

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-person-plus me-2"></i>
                            Criar Conta
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="mb-0">
                        Já tem uma conta?
                        <a href="{{ route('login') }}">Fazer login</a>
                    </p>
                </div>
            </x-card>
        </div>
    </div>
@endsection
