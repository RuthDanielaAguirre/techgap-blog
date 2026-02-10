<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostView extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'user_id',
        'ip_address',
        'user_agent',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    // Relaciones
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Método estático para registrar una vista
    public static function recordView(Post $post, $userId = null): void
    {
        $ipAddress = request()->ip();
        $userAgent = request()->userAgent();

        // Evitar contar múltiples vistas del mismo usuario/IP en las últimas 24h
        $recentView = self::where('post_id', $post->id)
            ->where(function ($query) use ($userId, $ipAddress) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('ip_address', $ipAddress);
                }
            })
            ->where('viewed_at', '>', now()->subDay())
            ->exists();

        if (!$recentView) {
            self::create([
                'post_id' => $post->id,
                'user_id' => $userId,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'viewed_at' => now(),
            ]);

            // Incrementar contador en el post
            $post->increment('views_count');
        }
    }
}
