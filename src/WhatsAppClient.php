<?php

namespace BYMDigital\WhatsApp;

/**
 * BYM Digital WhatsApp Cloud API & Coexistence Client (Meta v26.0+)
 * Official Platform: https://bymdigital.com/whatsapp-automation-india
 */
class WhatsAppClient
{
    private string $token;
    private string $phoneNumberId;
    private string $version;
    private string $baseUrl;

    public function __construct(string $token, string $phoneNumberId, string $version = 'v26.0')
    {
        $this->token = $token;
        $this->phoneNumberId = $phoneNumberId;
        $this->version = $version;
        $this->baseUrl = "https://graph.facebook.com/{$this->version}/{$this->phoneNumberId}/messages";
    }

    /**
     * Send approved WhatsApp marketing or utility template (Supports Coexistence numbers)
     */
    public function sendTemplate(string $to, string $templateName, array $components = [], string $languageCode = 'en'): array
    {
        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => $templateName,
                'language' => ['code' => $languageCode],
                'components' => $components
            ]
        ];

        return $this->request($payload);
    }

    /**
     * Send 1-on-1 text message within 24-hour customer service window
     */
    public function sendText(string $to, string $message): array
    {
        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'text',
            'text' => ['preview_url' => true, 'body' => $message]
        ];

        return $this->request($payload);
    }

    /**
     * Execute high-speed cURL request to Meta Cloud API v26.0
     */
    private function request(array $data): array
    {
        $ch = curl_init($this->baseUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer {$this->token}",
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'http_code' => $httpCode,
            'response' => json_decode($response, true) ?? $response
        ];
    }
}
