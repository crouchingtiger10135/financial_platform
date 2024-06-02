@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Platform Settings</h1>
    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="user-management-tab" data-bs-toggle="tab" data-bs-target="#user-management" type="button" role="tab" aria-controls="user-management" aria-selected="false">User Management</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab" aria-controls="notifications" aria-selected="false">Notifications</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="integrations-tab" data-bs-toggle="tab" data-bs-target="#integrations" type="button" role="tab" aria-controls="integrations" aria-selected="false">Integrations</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab" aria-controls="documents" aria-selected="false">Documents</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="compliance-tab" data-bs-toggle="tab" data-bs-target="#compliance" type="button" role="tab" aria-controls="compliance" aria-selected="false">Compliance</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="appearance-tab" data-bs-toggle="tab" data-bs-target="#appearance" type="button" role="tab" aria-controls="appearance" aria-selected="false">Appearance</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="billing-tab" data-bs-toggle="tab" data-bs-target="#billing" type="button" role="tab" aria-controls="billing" aria-selected="false">Billing & Payment</button>
        </li>
    </ul>
    <form action="{{ route('settings.update') }}" method="POST" class="needs-validation mt-3" novalidate>
        @csrf
        <div class="tab-content" id="settingsTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                <div class="mb-3">
                    <label for="platform_name" class="form-label">Platform Name</label>
                    <input type="text" class="form-control" id="platform_name" name="platform_name" value="{{ $settings->where('key', 'platform_name')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="contact_email" class="form-label">Contact Email</label>
                    <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $settings->where('key', 'contact_email')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="timezone" class="form-label">Timezone</label>
                    <input type="text" class="form-control" id="timezone" name="timezone" value="{{ $settings->where('key', 'timezone')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="language" class="form-label">Language</label>
                    <input type="text" class="form-control" id="language" name="language" value="{{ $settings->where('key', 'language')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="date_format" class="form-label">Date Format</label>
                    <input type="text" class="form-control" id="date_format" name="date_format" value="{{ $settings->where('key', 'date_format')->first()->value ?? '' }}" required>
                </div>
            </div>

            <div class="tab-pane fade" id="user-management" role="tabpanel" aria-labelledby="user-management-tab">
                <div class="mb-3">
                    <label for="password_policy" class="form-label">Password Policy</label>
                    <input type="text" class="form-control" id="password_policy" name="password_policy" value="{{ $settings->where('key', 'password_policy')->first()->value ?? '' }}" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="two_factor_auth" name="two_factor_auth" {{ $settings->where('key', 'two_factor_auth')->first()->value == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="two_factor_auth">Two-Factor Authentication</label>
                </div>
            </div>

            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                <div class="mb-3">
                    <label for="account_lockout" class="form-label">Account Lockout</label>
                    <input type="text" class="form-control" id="account_lockout" name="account_lockout" value="{{ $settings->where('key', 'account_lockout')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="session_timeout" class="form-label">Session Timeout</label>
                    <input type="text" class="form-control" id="session_timeout" name="session_timeout" value="{{ $settings->where('key', 'session_timeout')->first()->value ?? '' }}" required>
                </div>
            </div>

            <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications" {{ $settings->where('key', 'email_notifications')->first()->value == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="email_notifications">Email Notifications</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="sms_notifications" name="sms_notifications" {{ $settings->where('key', 'sms_notifications')->first()->value == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sms_notifications">SMS Notifications</label>
                </div>
            </div>

            <div class="tab-pane fade" id="integrations" role="tabpanel" aria-labelledby="integrations-tab">
                <div class="mb-3">
                    <label for="stripe_api_key" class="form-label">Stripe API Key</label>
                    <input type="text" class="form-control" id="stripe_api_key" name="stripe_api_key" value="{{ $settings->where('key', 'stripe_api_key')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="webhook_url" class="form-label">Webhook URL</label>
                    <input type="text" class="form-control" id="webhook_url" name="webhook_url" value="{{ $settings->where('key', 'webhook_url')->first()->value ?? '' }}" required>
                </div>
            </div>

            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                <div class="mb-3">
                    <label for="allowed_file_types" class="form-label">Allowed File Types</label>
                    <input type="text" class="form-control" id="allowed_file_types" name="allowed_file_types" value="{{ $settings->where('key', 'allowed_file_types')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="max_file_size" class="form-label">Max File Size</label>
                    <input type="text" class="form-control" id="max_file_size" name="max_file_size" value="{{ $settings->where('key', 'max_file_size')->first()->value ?? '' }}" required>
                </div>
            </div>

            <div class="tab-pane fade" id="compliance" role="tabpanel" aria-labelledby="compliance-tab">
                <div class="mb-3">
                    <label for="kyc_requirements" class="form-label">KYC Requirements</label>
                    <input type="text" class="form-control" id="kyc_requirements" name="kyc_requirements" value="{{ $settings->where('key', 'kyc_requirements')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="document_retention" class="form-label">Document Retention Policies</label>
                    <input type="text" class="form-control" id="document_retention" name="document_retention" value="{{ $settings->where('key', 'document_retention')->first()->value ?? '' }}" required>
                </div>
            </div>

            <div class="tab-pane fade" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
                <div class="mb-3">
                    <label for="theme" class="form-label">Theme</label>
                    <input type="text" class="form-control" id="theme" name="theme" value="{{ $settings->where('key', 'theme')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="branding" class="form-label">Branding</label>
                    <input type="text" class="form-control" id="branding" name="branding" value="{{ $settings->where('key', 'branding')->first()->value ?? '' }}" required>
                </div>
            </div>

            <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                <div class="mb-3">
                    <label for="payment_methods" class="form-label">Payment Methods</label>
                    <input type="text" class="form-control" id="payment_methods" name="payment_methods" value="{{ $settings->where('key', 'payment_methods')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="billing_cycles" class="form-label">Billing Cycles</label>
                    <input type="text" class="form-control" id="billing_cycles" name="billing_cycles" value="{{ $settings->where('key', 'billing_cycles')->first()->value ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="invoice_settings" class="form-label">Invoice Settings</label>
                    <input type="text" class="form-control" id="invoice_settings" name="invoice_settings" value="{{ $settings->where('key', 'invoice_settings')->first()->value ?? '' }}" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save Settings</button>
    </form>
@endsection
