<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'reading_time',
        'status',
        'is_featured',
        'published_at',
        'views_count',
        'likes_count',
        'comments_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'views_count' => 'integer',
        'likes_count' => 'integer',
        'comments_count' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
            
            // Calcular tiempo de lectura
            if (empty($post->reading_time)) {
                $wordCount = str_word_count(strip_tags($post->content));
                $minutes = ceil($wordCount / 200); // 200 palabras por minuto
                $post->reading_time = $minutes . ' min';
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title') && empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Relaciones
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeRecent($query, $limit = 5)
    {
        return $query->published()
            ->latest('published_at')
            ->limit($limit);
    }

    public function scopePopular($query, $limit = 5)
    {
        return $query->published()
            ->orderByDesc('views_count')
            ->limit($limit);
    }

    public function scopeByCategory($query, $categorySlug)
    {
        return $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    public function scopeByTag($query, $tagSlug)
    {
        return $query->whereHas('tags', function ($q) use ($tagSlug) {
            $q->where('slug', $tagSlug);
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('content', 'like', "%{$search}%")
              ->orWhere('excerpt', 'like', "%{$search}%");
        });
    }

    // Métodos helper
    public function isPublished(): bool
    {
        return $this->status === 'published' 
            && $this->published_at 
            && $this->published_at->isPast();
    }

    public function canBeEditedBy(User $user): bool
    {
        return $user->isAdmin() || $this->user_id === $user->id;
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Relaciones de Likes
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    // Relaciones de Bookmarks
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    public function bookmarkedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks')->withTimestamps();
    }

    // Relaciones de Views
    public function views(): HasMany
    {
        return $this->hasMany(PostView::class);
    }

    // Scopes adicionales
    public function scopeMostLiked($query, $limit = 10)
    {
        return $query->orderBy('likes_count', 'desc')->limit($limit);
    }

    public function scopeMostViewed($query, $limit = 10)
    {
        return $query->orderBy('views_count', 'desc')->limit($limit);
    }

    public function scopeTrending($query, $limit = 10)
    {
        // Posts con más likes en los últimos 7 días
        return $query->where('published_at', '>', now()->subDays(7))
            ->orderBy('likes_count', 'desc')
            ->limit($limit);
    }

    // Métodos útiles
    public function isLikedBy(?User $user): bool
    {
        if (!$user) {
            return false;
        }
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function isBookmarkedBy(?User $user): bool
    {
        if (!$user) {
            return false;
        }
        return $this->bookmarks()->where('user_id', $user->id)->exists();
    }

    public function recordView($userId = null): void
    {
        PostView::recordView($this, $userId);
    }

    // Verificar si alcanzó un milestone
    public function checkMilestones(): void
    {
        $milestones = [
            ['type' => 'likes', 'threshold' => 10, 'message' => '¡Tu post alcanzó 10 likes!'],
            ['type' => 'likes', 'threshold' => 50, 'message' => '¡Tu post alcanzó 50 likes!'],
            ['type' => 'likes', 'threshold' => 100, 'message' => '¡Tu post alcanzó 100 likes!'],
            ['type' => 'comments', 'threshold' => 5, 'message' => '¡Tu post tiene 5 comentarios!'],
            ['type' => 'comments', 'threshold' => 20, 'message' => '¡Tu post tiene 20 comentarios!'],
            ['type' => 'views', 'threshold' => 100, 'message' => '¡Tu post alcanzó 100 vistas!'],
            ['type' => 'views', 'threshold' => 500, 'message' => '¡Tu post alcanzó 500 vistas!'],
            ['type' => 'views', 'threshold' => 1000, 'message' => '¡Tu post alcanzó 1000 vistas!'],
        ];

        foreach ($milestones as $milestone) {
            $count = match($milestone['type']) {
                'likes' => $this->likes_count,
                'comments' => $this->comments_count,
                'views' => $this->views_count,
            };

            // Si justo alcanzó el milestone (evitar múltiples notificaciones)
            if ($count === $milestone['threshold']) {
                $this->notifyMilestone($milestone['message']);
            }
        }
    }

    protected function notifyMilestone(string $message): void
    {
        Notification::create([
            'user_id' => $this->user_id,
            'type' => 'post_milestone',
            'title' => '¡Nuevo hito alcanzado!',
            'message' => $message,
            'data' => [
                'post_id' => $this->id,
                'post_title' => $this->title,
                'post_slug' => $this->slug,
            ],
        ]);

        // Aquí también se puede disparar el webhook a n8n
        $this->sendMilestoneWebhook($message);
    }

    protected function sendMilestoneWebhook(string $message): void
    {
        $webhookService = app(\App\Services\WebhookService::class);
        
        // Determinar tipo de milestone
        if (str_contains($message, 'likes')) {
            $type = 'likes';
            $value = $this->likes_count;
        } elseif (str_contains($message, 'comentarios')) {
            $type = 'comments';
            $value = $this->comments_count;
        } else {
            $type = 'views';
            $value = $this->views_count;
        }
        
        $webhookService->postMilestone($this, $type, $value);
    }
}
