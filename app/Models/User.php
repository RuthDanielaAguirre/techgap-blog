<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar',
        'bio',
        'website',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    // Relaciones
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Métodos helper
    public function isAdmin(): bool
    {
        return $this->role->name === 'admin';
    }

    public function isWriter(): bool
    {
        return $this->role->name === 'writer';
    }

    public function isSubscriber(): bool
    {
        return $this->role->name === 'subscriber';
    }

    public function canCreatePosts(): bool
    {
        return $this->isAdmin() || $this->isWriter();
    }

    public function canManagePosts(): bool
    {
        return $this->isAdmin();
    }

    // Filament
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin() || $this->isWriter();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeWriters($query)
    {
        return $query->whereHas('role', function ($q) {
            $q->where('name', 'writer');
        });
    }
}
