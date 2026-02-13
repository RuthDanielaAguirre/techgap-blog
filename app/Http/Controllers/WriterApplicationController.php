<?php

namespace App\Http\Controllers;

use App\Models\WriterApplication;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WriterApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = auth()->user();

        // Solo subscribers pueden aplicar
        if (!$user->isSubscriber()) {
            return redirect()->route('home')->with('error', 'Solo los subscribers pueden solicitar ser escritores.');
        }

        // Verificar si ya aplicó
        if ($user->hasAppliedForWriter()) {
            $application = $user->writerApplication;
            return redirect()->route('writer-applications.status')
                ->with('info', 'Ya has enviado una solicitud anteriormente.');
        }

        return view('writer-applications.create2');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Validar que no haya aplicado antes
        if ($user->hasAppliedForWriter()) {
            return redirect()->route('writer-applications.status')
                ->with('error', 'Ya has enviado una solicitud.');
        }

        $validated = $request->validate([
            'motivation' => ['required', 'string', 'min:100', 'max:1000'],
            'portfolio_url' => ['nullable', 'url', 'max:255'],
        ]);

        $application = $user->writerApplication()->create([
            'motivation' => $validated['motivation'],
            'portfolio_url' => $validated['portfolio_url'] ?? null,
            'status' => 'pending',
        ]);

        // Enviar webhook a n8n
        $this->sendApplicationWebhook($application);

        return redirect()->route('writer-applications.status')
            ->with('success', '¡Solicitud enviada correctamente! Te notificaremos cuando sea revisada.');
    }

    public function status()
    {
        $user = auth()->user();
        $application = $user->writerApplication;

        if (!$application) {
            return redirect()->route('writer-applications.create');
        }

        return view('writer-applications.status', compact('application'));
    }

    // protected function sendApplicationWebhook(WriterApplication $application)
    // {
    //     $webhookUrl = env('N8N_WEBHOOK_WRITER_APPLICATION');
    //     $sharedToken = env('N8N_SHARED_TOKEN');

    //     if (!$webhookUrl) {
    //         return;
    //     }

    //     try {
    //         $client = new \GuzzleHttp\Client();
    //         $client->post($webhookUrl, [
    //             'headers' => [
    //                 'X-Shared-Token' => $sharedToken,
    //                 'Content-Type' => 'application/json',
    //             ],
    //             'json' => [
    //                 'application_id' => $application->id,
    //                 'user_id' => $application->user_id,
    //                 'user_name' => $application->user->name,
    //                 'user_email' => $application->user->email,
    //                 'motivation' => $application->motivation,
    //                 'portfolio_url' => $application->portfolio_url,
    //                 'submitted_at' => $application->created_at->toIso8601String(),
    //             ],
    //         ]);
    //     } catch (\Exception $e) {
    //         \Log::error('Error sending writer application webhook: ' . $e->getMessage());
    //     }
    // }

    protected function sendApplicationWebhook(WriterApplication $application)
    {
        app(\App\Services\WebhookService::class)->writerApplication($application);
    }
}
