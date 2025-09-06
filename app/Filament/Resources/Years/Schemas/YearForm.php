<?php

namespace App\Filament\Resources\Years\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class YearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title'),
                RichEditor::make('vision')
                    ->helperText('Vision for this year'),
                DateTimePicker::make('start_date'),
                DateTimePicker::make('end_date') // TODO auto generate based on start_date
            ]);
    }
}
