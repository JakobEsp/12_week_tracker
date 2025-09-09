<?php

namespace App\Filament\Resources\Years\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Support\Enums\GridDirection;
use Filament\Tables\Columns\Layout\Split;

class YearForm
{
    public static function configure(Schema $schema): Schema
    {
        /**
         * TODO: 
         *  - tab: goals with lag inducators, with tactics due dates.
         *  - second page: week planning
         */
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
                                ->label('Goals')
                                ->relationship('goals')
                                ->schema([
                                    TextInput::make('title'),
                                    Textarea::make('info'),
                                    Select::make('lag_indicator_type')
                                    ->options([
                                        'number' => 'Number',
                                        'text' => 'Text'
                                    ])->live(),
                                    // TextInput::make('lag_indicator'),
                                    Grid::make(1)
                                    ->schema(fn (Get $get): array => match($get('lag_indicator_type')){
                                        'number' => [
                                            TextInput::make('lag_indicator')->type('number')
                                        ],
                                        'text' => [
                                            TextInput::make('lag_indicator')
                                        ],
                                        default => []
                                    }),
                                    Repeater::make('tactics')
                                        ->label('Tactics')
                                        ->relationship('tactics')
                                        ->schema([
                                            // Grid::make(2)
                                            //     ->schema([
                                           Flex::make([
                                               TextInput::make('title'),
                                               CheckboxList::make('')
                                                   ->options([
                                                       'monday' => 'm',
                                                       'tuesday'=>'t',
                                                       'wednesday' => 'w',
                                                       'thursday'=> 't',
                                                       'firday'=>'f',
                                                       'saturday'=>'s',
                                                       'sunday'=>'s'
                                                   ])
                                           ])
                                        ])
                                ])
                            ]),
                    Tab::make('Commitments')
                        ->schema([
                            Repeater::make('commitments')
                                ->label('Commitment')
                                ->relationship('commitments')
                                ->schema([
                                    TextInput::make('title'),
                                    Textarea::make('description')
                                ])
                        ])
                ])
            ]);
    }
}
