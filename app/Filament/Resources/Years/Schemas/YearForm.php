<?php

namespace App\Filament\Resources\Years\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;

class YearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                ->tabs([
                    Tab::make('Define')
                        ->schema([
                            TextInput::make('title'),
                            RichEditor::make('vision')
                                ->helperText('Vision for this year'),
                            DateTimePicker::make('start_date'),
                            DateTimePicker::make('end_date') // TODO auto generate based on start_date
                        ]),
                    Tab::make('Goals')
                        ->schema([
                            Repeater::make('goals')
                                ->relationship('goals')
                                ->schema([
                                    TextInput::make('title'),
                                    Textarea::make('info'),
                                    Select::make('lag_indicator_type')
                                    ->options([
                                        'number' => 'Number',
                                        'text' => 'Text'
                                    ])->live(),
                                    Grid::make(1)
                                    ->schema(fn (Get $get): array => match($get('lag_indicator_type')){
                                        'number' => [
                                            TextInput::make('lag_indicator')->type('number')
                                        ],
                                        'text' => [
                                            TextInput::make('lag_indicator')
                                        ],
                                        default => []
                                    })
                                ])
                        ])
                        /**
                         * TODO: 
                         *  - tab: goals with lag inducators, with tactics due dates.
                         *  - second page: week planning
                         */
                ])
            ]);
    }
}
