<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dinamk Tech') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container">
            {{-- Logo --}}
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/">
                <i class="bi bi-people-fill fs-4"></i> Dinamk Tech
            </a>

            {{-- Botão do menu mobile --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Conteúdo do menu --}}
            <div class="collapse navbar-collapse" id="mainNavbar">
                @auth
                    {{-- Links principais --}}
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-1" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-1" href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i> Usuários
                            </a>
                        </li>
                    </ul>

                    {{-- Menu do usuário --}}
                    <ul class="navbar-nav  ms-auto ms-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                                id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-5"></i>
                                <span class="fw-semibold">{{ Str::limit(auth()->user()->name, 20) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('users.edit', auth()->user()) }}">
                                        <i class="bi bi-person-lines-fill me-2 text-secondary"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="px-3">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                                            <i class="bi bi-box-arrow-right me-2"></i> Sair
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto ms-3 gap-2">
                        <li class="nav-item">
                            <a class="nav-link text-white d-flex align-items-center border rounded"
                                href="{{ route('login') }}">
                                Entrar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white d-flex align-items-center border rounded"
                                href="{{ route('register') }}">
                                Criar uma Conta
                            </a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container pt-5 mt-4">
        @foreach (['success', 'error'] as $msg)
            @if (session($msg))
                <x-alert type="{{ $msg === 'error' ? 'danger' : $msg }}" :message="session($msg)" :duration="3000" />
            @endif
        @endforeach


        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>

</html>
