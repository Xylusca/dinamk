@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            <i class="bi bi-people-fill me-2"></i>
            Gerenciar Usuários
        </h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus me-2"></i>
            Novo Usuário
        </a>
    </div>

    <x-card>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('users.index') }}" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control me-2"
                        placeholder="Buscar por nome ou e-mail..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="bi bi-search"></i>
                    </button>
                    @if (request('search'))
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary ms-2">
                            <i class="bi bi-x"></i>
                        </a>
                    @endif
                </form>
            </div>
            <div class="col-md-6 text-md-end">
                <small class="text-muted">
                    {{ $users->total() }} usuário(s) encontrado(s)
                </small>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Cadastrado em</th>
                        <th width="120">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <i class="bi bi-person-circle me-2"></i>
                                {{ $user->name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-primary me-2"
                                        title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-person-x fs-1 d-block mb-3"></i>
                                @if (request('search'))
                                    Nenhum usuário encontrado para "{{ request('search') }}"
                                    <br>
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                                        Ver todos os usuários
                                    </a>
                                @else
                                    Nenhum usuário cadastrado ainda
                                    <br>
                                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary mt-2">
                                        Cadastrar primeiro usuário
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($users->hasPages())
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 mx-5">
                <p class="text-muted mb-2 mb-md-0">
                    Mostrando <strong>{{ $users->firstItem() }}</strong> até <strong>{{ $users->lastItem() }}</strong> de
                    <strong>{{ $users->total() }}</strong> resultados
                </p>

                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </x-card>
@endsection
