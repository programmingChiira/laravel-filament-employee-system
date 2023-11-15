<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestAdminEmployees extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Employee::query())
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('country.name'),
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
            ]);
    }
}
