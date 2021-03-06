<?php

namespace App\Http\Front\Controllers;

use App\Http\Front\Requests\SubscribeToEmailListRequest;
use Exception;
use Illuminate\Support\Facades\Http;

class SubscribeToEmailListController
{
    public function __invoke(SubscribeToEmailListRequest $request)
    {
        $response = Http::post('https://spatie.be/mailcoach/subscribe/4af46b59-3784-41a5-9272-6da31afa3a02', [
            'email' => $request->email,
            'tags' => 'laravelpackage-training',
        ]);

        if (! $response->successful()) {
            throw new Exception('Could not subscribe');
        }

        session()->flash('subscribed');

        return back();
    }
}
