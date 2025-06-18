@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </h1>
        </div>
    </div>

    {{-- Widgets --}}
    <div class="row">
        @foreach ($widgets as $stats)
            <div class="col-md-6 col-lg-3 mb-3">
                <x-widgets.stats title="{{ $stats['title'] }}" qnt="{{ $stats['qnt'] }}" icon="{{ $stats['icon'] }}"
                    color="{{ $stats['color'] }}" />
            </div>
        @endforeach
    </div>

    {{-- Ações Rápidas --}}
    <div class="row">
        <div class="col-12">
            <x-card title="Ações Rápidas">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('users.create') }}" class="btn btn-primary w-100">
                            <i class="bi bi-person-plus me-2"></i>
                            Cadastrar Novo Usuário
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100">
                            <i class="bi bi-list-ul me-2"></i>
                            Listar Usuários
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('users.index', ['search' => '']) }}" class="btn btn-outline-secondary w-100">
                            <i class="bi bi-search me-2"></i>
                            Buscar Usuários
                        </a>
                    </div>
                </div>
            </x-card>
        </div>
    </div>

    {{-- Tabela Usuários Recentes --}}
    <div class="row mt-4">
        <div class="col-12">
            <x-card title="Usuários Recentes" subtitle="Últimos 5 usuários cadastrados">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentUsers as $user)
                                <tr>
                                    <td>
                                        <i class="bi bi-person-circle me-2"></i>
                                        {{ $user->name }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Nenhum usuário encontrado
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>
    </div>
@endsection
