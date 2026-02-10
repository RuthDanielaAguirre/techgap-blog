<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'username',
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

    /**
     * @return HasMany<Post>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return HasMany<Comment>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Métodos helper
    public function isAdmin(): bool
    {
        return $this->role && $this->role->name === 'admin';
    }

    public function isWriter(): bool
    {
        return $this->role && $this->role->name === 'writer';
    }

    public function isSubscriber(): bool
    {
        return $this->role && $this->role->name === 'subscriber';
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

    public function getRouteKeyName()
    {
        return 'username';
    }

    // Relaciones de Likes
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function likedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'likes')->withTimestamps();
    }

    // Relaciones de Bookmarks
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    public function bookmarkedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'bookmarks')->withTimestamps();
    }

    // Relación de Writer Application
    public function writerApplication(): HasOne
    {
        return $this->hasOne(WriterApplication::class);
    }

    // Relaciones de Notificaciones
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function unreadNotifications(): HasMany
    {
        return $this->hasMany(Notification::class)->unread();
    }

    // Métodos útiles
    public function hasLiked(Post $post): bool
    {
        return $this->likes()->where('post_id', $post->id)->exists();
    }

    public function hasBookmarked(Post $post): bool
    {
        return $this->bookmarks()->where('post_id', $post->id)->exists();
    }

    public function hasAppliedForWriter(): bool
    {
        return $this->writerApplication()->exists();
    }

    public function hasPendingWriterApplication(): bool
    {
        return $this->writerApplication()->where('status', 'pending')->exists();
    }
}
