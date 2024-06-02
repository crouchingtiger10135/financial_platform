@extends('layouts.app')

@section('content')
    <h1>Client Details: {{ $client->name }}</h1>
    <p>Email: {{ $client->email }}</p>
    <p>Identity Verified: {{ $client->identity_verified ? 'Yes' : 'No' }}</p>
    <p>708 Status: {{ $client->status_708 ? 'Yes' : 'No' }}</p>

    <h2>Documents</h2>
    <ul>
        @foreach($documents as $document)
            <li>{{ $document->document_name }} - <a href="{{ Storage::url($document->document_path) }}" target="_blank">View</a></li>
        @endforeach
    </ul>
@endsection
