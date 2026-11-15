# Enterprise WhatsApp Automation India & Meta Cloud API SDK (v26.0+)

[![GitHub Stars](https://img.shields.io/github/stars/bymdigitalofficial-ai/whatsapp-automation-india?style=flat-square&color=emerald)](https://github.com/bymdigitalofficial-ai/whatsapp-automation-india)
[![Official Platform](https://img.shields.io/badge/Platform-BYM%20Digital-blue?style=flat-square)](https://bymdigital.com/whatsapp-automation-india)
[![Meta Graph API](https://img.shields.io/badge/Meta%20Cloud%20API-v26.0+-00d9ff?style=flat-square)](https://developers.facebook.com/docs/whatsapp/cloud-api)
[![Coexistence Ready](https://img.shields.io/badge/Coexistence-App%20%2B%20API%20Active-10b981?style=flat-square)](https://bymdigital.com/whatsapp-automation-india)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow?style=flat-square)](LICENSE)

Official open-source developer toolkit and architectural guide for **WhatsApp Automation in India** engineered for the **Meta WhatsApp Business Cloud API (Graph API v26.0+)** with native **WhatsApp Coexistence support**. 

Engineered with zero third-party dependencies, sub-millisecond execution, and automated webhook handling for Indian enterprises, D2C brands, and MSMEs.

Maintained by [BYM Digital](https://bymdigital.com) — India's Premier [WhatsApp Automation & Marketing Agency](https://bymdigital.com/whatsapp-automation-india).

---

## ⚡ Core Capabilities & Flagship Features

- 📱 **Native WhatsApp Coexistence Support:** Keep using your existing WhatsApp Business Mobile App and the official Cloud API on the **exact same phone number simultaneously**. You do NOT need to delete your mobile app or sacrifice manual personal chats to run automated bots and broadcasts.
- 💰 **Zero Per-Conversation Markups:** Built directly on Meta Cloud API wholesale rates (Marketing: ₹0.78, Utility: ₹0.115, Service: 100% Free within 24h).
- 🔄 **Native Indian ERP Connectors:** Ready webhook listeners for Tally Prime, Busy Accounting, Marg ERP, and Shopify.
- 🧾 **Automated Invoicing & Balance Alerts:** Auto-dispatch PDF invoices, ledger balance statements, and payment reminders.
- 📦 **COD Confirmation Bot:** 1-Click interactive Quick Reply buttons to verify cash-on-delivery orders and reduce RTO by up to 35%.
- 🟢 **Green Tick Ready:** Compliant with official Meta Business Manager display name verification criteria.

---

## 🛠️ Quick Start (PHP 8.0+ / Meta v26.0+)

### 1. Send an Approved WhatsApp Marketing or Utility Template

```php
<?php
$token = 'YOUR_META_PERMANENT_SYSTEM_USER_TOKEN';
$phoneId = 'YOUR_META_PHONE_NUMBER_ID';
$recipient = '919876543210'; // Indian recipient number with 91 prefix

$payload = [
    'messaging_product' => 'whatsapp',
    'to' => $recipient,
    'type' => 'template',
    'template' => [
        'name' => 'order_dispatch_alert',
        'language' => ['code' => 'en'],
        'components' => [
            [
                'type' => 'body',
                'parameters' => [
                    ['type' => 'text', 'text' => 'Rahul Sharma'],
                    ['type' => 'text', 'text' => '#ORD-8821'],
                    ['type' => 'text', 'text' => 'Blue Dart Express']
                ]
            ]
        ]
    ]
];

// Meta Graph API v26.0 Endpoint (Supports Coexistence Numbers)
$ch = curl_init("https://graph.facebook.com/v26.0/{$phoneId}/messages");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer {$token}",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
```

### 2. Verify Incoming Webhook Signatures (Security Best Practice)

```php
<?php
$appSecret = 'YOUR_META_APP_SECRET';
$hubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

$expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, $appSecret);

if (!hash_equals($expectedSignature, $hubSignature)) {
    http_response_code(403);
    exit('Unauthorized signature mismatch');
}

http_response_code(200);
// Process incoming customer message event safely
?>
```

---

## 🏢 Enterprise Solutions & National Service Network

Looking for turnkey team inboxes, AI customer service agents, WhatsApp Coexistence setup, or custom Tally ERP deployment across India?

- 🌐 **Official Flagship:** [WhatsApp Automation India](https://bymdigital.com/whatsapp-automation-india)
- 🧮 **Free Cost Calculator:** [Official Meta WhatsApp Pricing Calculator](https://bymdigital.com/whatsapp-pricing-calculator)
- 🔗 **Free Click-to-Chat Tool:** [Free WhatsApp Link & QR Generator](https://bymdigital.com/free-whatsapp-link-generator)
- 📍 **Pan-India Regional Hubs:** [BYM Digital Locations & Enterprise Corridors](https://bymdigital.com/locations)

---

## 📄 License

This open-source project is licensed under the [MIT License](LICENSE).
