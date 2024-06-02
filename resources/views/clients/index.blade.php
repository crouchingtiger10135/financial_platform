@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client Compliance Status</h1>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>Total Clients: {{ $clients->count() }}</h2>
                <p class="text-success">+2.5% from last week</p>
            </div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addClientModal">+ Add Client</button>
        </div>
        <div class="d-flex justify-content-between mb-4">
            <div>
                <button class="btn btn-outline-secondary">Checks</button>
                <button class="btn btn-outline-secondary">Daily</button>
                <button class="btn btn-outline-secondary">Clients</button>
                <button class="btn btn-outline-secondary">Week to Date</button>
            </div>
            <div>
                <div class="status-circle approved"></div> Approved Clients
                <div class="status-circle unapproved"></div> Unapproved Clients
                <div class="status-circle identity-verification"></div> Identity Verification
                <div class="status-circle status-708"></div> 708 Status
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Clients</th>
                    <th>Checks</th>
                    <th>Identity Verified</th>
                    <th>708 Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->checks }}</td>
                        <td>
                            <div class="status-circle {{ $client->identity_verified ? 'approved' : 'unapproved' }}"></div>
                        </td>
                        <td>
                            <div class="status-circle {{ $client->documents->isNotEmpty() ? 'approved' : 'unapproved' }}"></div>
                        </td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actionModal-{{ $client->id }}">Actions</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add Client Modal -->
        <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/clients" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Client Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="document" class="form-label">Upload Document</label>
                                <input type="file" class="form-control" id="document" name="document" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Client</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Modal for Each Client -->
        @foreach($clients as $client)
            <div class="modal fade" id="actionModal-{{ $client->id }}" tabindex="-1" aria-labelledby="actionModalLabel-{{ $client->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="actionModalLabel-{{ $client->id }}">Actions for {{ $client->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/clients/{{ $client->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name-{{ $client->id }}" class="form-label">Client Name</label>
                                    <input type="text" class="form-control" id="name-{{ $client->id }}" name="name" value="{{ $client->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email-{{ $client->id }}" class="form-label">Client Email</label>
                                    <input type="email" class="form-control" id="email-{{ $client->id }}" name="email" value="{{ $client->email }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                            <hr>
                            <h5>Upload New Document</h5>
                            <form action="/documents" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <div class="mb-3">
                                    <label for="document-{{ $client->id }}" class="form-label">Document</label>
                                    <input type="file" class="form-control" id="document-{{ $client->id }}" name="document" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload Document</button>
                            </form>
                            <hr>
                            <h5>Documents</h5>
                            <ul>
                                @foreach($client->documents as $document)
                                    <li>
                                        {{ $document->document_name }} - <a href="{{ Storage::url($document->document_path) }}" target="_blank">Download</a>
                                        <form action="/documents/{{ $document->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <h5>Identity Verification</h5>
                            <form action="{{ route('clients.verify', $client->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Verify Identity</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
