@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Login" subtitle="Entre em sua conta">
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <x-form-input name="email" label="E-mail" type="email" :required="true" />

                    <x-form-input name="password" label="Senha" type="password" :required="true" />

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Entrar
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="mb-0">
                        Não tem uma conta?
                        <a href="{{ route('register') }}">Criar conta</a>
                    </p>
                </div>
            </x-card>
        </div>
    </div>
@endsection
