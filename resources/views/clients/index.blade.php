@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Client Compliance Status</h1>
            <h2>Total Clients: 3,496 <span class="text-success">↑2.5%</span></h2>
            <p>Was 2,945 - 1 week ago</p>
        </div>
        <button class="btn btn-success" data-toggle="modal" data-target="#addClientModal">+ Add Client</button>
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
            <!-- Example data, replace with dynamic data in real implementation -->
            <tr>
                <td>John Doe</td>
                <td>2</td>
                <td><div class="status-circle approved"></div></td>
                <td><div class="status-circle approved"></div></td>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#addDocumentModal">Actions</button></td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>3</td>
                <td><div class="status-circle unapproved"></div></td>
                <td><div class="status-circle status-708"></div></td>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#addDocumentModal">Actions</button></td>
            </tr>
        </tbody>
    </table>

    <!-- Add Client Modal -->
    <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/clients" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Client Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Client Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Document Modal -->
    <div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="addDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentModalLabel">Upload Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/documents" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="client_id">Client</label>
                            <select class="form-control" id="client_id" name="client_id" required>
                                <!-- Example data, replace with dynamic data in real implementation -->
                                <option value="1">John Doe</option>
                                <option value="2">Jane Smith</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="document">Document</label>
                            <input type="file" class="form-control" id="document" name="document" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload Document</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
