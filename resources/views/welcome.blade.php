@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h1 class="display-4 mb-4">
                    <i class="bi bi-people-fill text-primary"></i>
                    Sistema de Gerenciamento de Usuários
                </h1>
                <p class="lead mb-4">
                    Uma aplicação completa para gerenciar usuários com autenticação segura e interface moderna.
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-md-2">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Entrar
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-person-plus me-2"></i>
                        Criar Conta
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
