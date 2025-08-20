<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Pages\Auth\Register as BaseRegister;


use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Spatie\Permission\Models\Role;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),

                        TextInput::make('no_hp')
                            ->required()
                            ->label('No. Hp')
                            ->maxLength(255),
                        TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tempat_lahir')
                            ->required()
                            ->label('Tempat Lahir')
                            ->maxLength(255),
                        DatePicker::make('tgl_lahir')
                            ->label('Tanggal Lahir')
                            ->required()
                            ->displayFormat('d F Y')
                            ->native(false),
                        TextInput::make('pekerjaan')
                            ->label('Pekerjaan')
                            ->required()
                            ->maxLength(255),
                        Select::make('role')
                            ->label('Role')
                            ->options(Role::pluck('name', 'name')->toArray()) // Tambahkan toArray() untuk mengonversi collection ke array
                            ->default('admin')
                            ->required(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Tambahkan role ke user menggunakan Spatie
        $user->assignRole($data['role']);

        return $user;
    }
}
