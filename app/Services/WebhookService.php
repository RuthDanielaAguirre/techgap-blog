<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class WebhookService
{
    protected Client $client;
    protected string $sharedToken;

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 10,
            'verify' => false, // Para desarrollo local
        ]);
        
        $this->sharedToken = env('N8N_SHARED_TOKEN', '');
    }

    /**
     * Enviar webhook genérico
     */
    public function send(string $url, array $data): bool
    {
        if (empty($url) || empty($this->sharedToken)) {
            Log::warning('Webhook URL or token not configured');
            return false;
        }

        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'X-Shared-Token' => $this->sharedToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => array_merge($data, [
                    'timestamp' => now()->toIso8601String(),
                    'environment' => app()->environment(),
                ]),
            ]);

            Log::info('Webhook sent successfully', [
                'url' => $url,
                'status' => $response->getStatusCode(),
            ]);

            return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;

        } catch (GuzzleException $e) {
            Log::error('Webhook failed', [
                'url' => $url,
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }

    /**
     * Post creado
     */
    public function postCreated($post): bool
    {
        return $this->send(env('N8N_WEBHOOK_POST_CREATED'), [
            'event' => 'post.created',
            'post_id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'author_id' => $post->user_id,
            'author_name' => $post->user->name,
            'author_email' => $post->user->email,
            'category' => $post->category->name,
            'url' => route('posts.show', $post->slug),
        ]);
    }

    /**
     * Comentario creado
     */
    public function commentCreated($comment): bool
    {
        return $this->send(env('N8N_WEBHOOK_COMMENT_CREATED'), [
            'event' => 'comment.created',
            'comment_id' => $comment->id,
            'post_id' => $comment->post_id,
            'post_title' => $comment->post->title,
            'post_author_id' => $comment->post->user_id,
            'post_author_email' => $comment->post->user->email,
            'commenter_name' => $comment->user->name,
            'comment_text' => $comment->content,
            'url' => route('posts.show', $comment->post->slug),
        ]);
    }

    /**
     * Milestone alcanzado
     */
    public function postMilestone($post, string $milestoneType, int $value): bool
    {
        return $this->send(env('N8N_WEBHOOK_POST_MILESTONE'), [
            'event' => 'post.milestone',
            'post_id' => $post->id,
            'title' => $post->title,
            'author_id' => $post->user_id,
            'author_name' => $post->user->name,
            'author_email' => $post->user->email,
            'milestone_type' => $milestoneType, // 'likes', 'comments', 'views'
            'milestone_value' => $value,
            'message' => "Tu post '{$post->title}' alcanzó {$value} {$milestoneType}!",
            'url' => route('posts.show', $post->slug),
        ]);
    }

    /**
     * Solicitud de writer
     */
    public function writerApplication($application): bool
    {
        return $this->send(env('N8N_WEBHOOK_WRITER_APPLICATION'), [
            'event' => 'writer_application.created',
            'application_id' => $application->id,
            'user_id' => $application->user_id,
            'user_name' => $application->user->name,
            'user_email' => $application->user->email,
            'motivation' => $application->motivation,
            'portfolio_url' => $application->portfolio_url,
        ]);
    }

    /**
     * Solicitud aprobada
     */
    public function writerApproved($application): bool
    {
        return $this->send(env('N8N_WEBHOOK_WRITER_APPROVED'), [
            'event' => 'writer_application.approved',
            'application_id' => $application->id,
            'user_id' => $application->user_id,
            'user_name' => $application->user->name,
            'user_email' => $application->user->email,
            'reviewed_by' => $application->reviewer->name,
        ]);
    }

    /**
     * Solicitud rechazada
     */
    public function writerRejected($application): bool
    {
        return $this->send(env('N8N_WEBHOOK_WRITER_REJECTED'), [
            'event' => 'writer_application.rejected',
            'application_id' => $application->id,
            'user_id' => $application->user_id,
            'user_name' => $application->user->name,
            'user_email' => $application->user->email,
            'reviewed_by' => $application->reviewer->name,
            'admin_notes' => $application->admin_notes,
        ]);
    }
}
