<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'widgets' => $this->getUserWidgets(),
            'recentUsers' => User::latest()->limit(5)->get(),
        ]);
    }

    private function getUserWidgets(): array
    {
        $now = now();

        return [
            'totalUsers' => $this->createWidget('Total de Usuários', User::count(), 'bi-people-fill', 'primary'),
            'usersToday' => $this->createWidget(
                'Usuários Hoje',
                User::whereDate('created_at', today())->count(),
                'bi-person-plus-fill',
                'success'
            ),
            'usersThisWeek' => $this->createWidget(
                'Esta Semana',
                User::whereBetween('created_at', [$now->copy()->startOfWeek(), $now->copy()->endOfWeek()])->count(),
                'bi-calendar-week',
                'info'
            ),
            'usersThisMonth' => $this->createWidget(
                'Este Mês',
                User::whereMonth('created_at', $now->copy()->month)->count(),
                'bi-calendar-month',
                'warning'
            ),
        ];
    }

    private function createWidget(string $title, int $qnt, string $icon, string $color): array
    {
        return compact('title', 'qnt', 'icon', 'color');
    }
}
