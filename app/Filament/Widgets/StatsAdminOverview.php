<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::query()->count())
                ->description('All users from the database')
                ->color('success'),
            Stat::make('Bounce rate', '21%')
                ->description('7% increase')
                ->color('danger'),
            Stat::make('Employees', Employee::query()->count())
                ->description('Employee count')
                ->color('success'),
        ];
    }
}
