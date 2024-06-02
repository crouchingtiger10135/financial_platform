<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Document;
use Stripe\Stripe;
use Stripe\Identity\VerificationSession;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
        ]);

        $client = Client::create($validated);

        // Handle file upload
        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('documents');
            Document::create([
                'client_id' => $client->id,
                'document_name' => $request->file('document')->getClientOriginalName(),
                'document_path' => $path,
            ]);
        }

        return redirect()->route('clients.index')->with('success', 'Client added successfully!');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }

    public function verify(Client $client)
    {
        // Setup Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a verification session
        try {
            $verificationSession = VerificationSession::create([
                'type' => 'document',
                'metadata' => [
                    'client_id' => $client->id,
                ],
                'return_url' => route('clients.index'),
            ]);

            // Redirect the user to the verification session
            return redirect($verificationSession->url);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error creating verification session: ' . $e->getMessage()]);
        }
    }
}
