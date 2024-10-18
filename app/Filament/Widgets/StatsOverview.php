<?php

namespace App\Filament\Widgets;

use App\Models\LivroModel;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Total de Livros', LivroModel::query()->count())
            ->color('success'),

            Stat::make('Livros Disponíveis', LivroModel::where('Disponivel', true)->count())
            ->description(LivroModel::query()->count().'k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),

            Stat::make('Livros Em Uso', LivroModel::where('Disponivel', false)->count())
            ->description('7% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),

            

            Stat::make('Total de Colaboradores', User::query()->count())
            ->description('32 increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            
            Stat::make('Total de Usuarios Administradores', User::query()->where('is_admin', true)->count())
            ->description('3% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),

            

            
            
        ];
    }
}
