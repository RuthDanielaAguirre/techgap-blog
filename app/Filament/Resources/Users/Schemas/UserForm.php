<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Select::make('role_id')
                    ->relationship('role', 'name')
                    ->required()
                    ->default(3),
                TextInput::make('avatar'),
                Textarea::make('bio')
                    ->columnSpanFull(),
                TextInput::make('website')
                    ->url(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
