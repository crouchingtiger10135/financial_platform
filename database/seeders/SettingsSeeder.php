<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['key' => 'platform_name', 'value' => 'Finance Platform'],
            ['key' => 'contact_email', 'value' => 'support@financeplatform.com'],
            ['key' => 'timezone', 'value' => 'UTC'],
            ['key' => 'language', 'value' => 'en'],
            ['key' => 'date_format', 'value' => 'Y-m-d'],
            ['key' => 'password_policy', 'value' => 'Minimum 8 characters'],
            ['key' => 'two_factor_auth', 'value' => 'off'],
            ['key' => 'account_lockout', 'value' => '5 attempts'],
            ['key' => 'session_timeout', 'value' => '30 minutes'],
            ['key' => 'email_notifications', 'value' => 'on'],
            ['key' => 'sms_notifications', 'value' => 'off'],
            ['key' => 'stripe_api_key', 'value' => 'your-stripe-api-key'],
            ['key' => 'webhook_url', 'value' => 'https://your-webhook-url.com'],
            ['key' => 'allowed_file_types', 'value' => 'pdf,jpg,jpeg,png'],
            ['key' => 'max_file_size', 'value' => '10MB'],
            ['key' => 'kyc_requirements', 'value' => 'Standard KYC'],
            ['key' => 'document_retention', 'value' => '5 years'],
            ['key' => 'theme', 'value' => 'light'],
            ['key' => 'branding', 'value' => 'Default'],
            ['key' => 'payment_methods', 'value' => 'Credit Card, PayPal'],
            ['key' => 'billing_cycles', 'value' => 'Monthly'],
            ['key' => 'invoice_settings', 'value' => 'Standard'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
