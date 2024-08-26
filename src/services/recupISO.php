<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class RecupISO
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function obtenirCodeISO3166(): ?string
    {
        // Récupérer l'adresse IP du client
        $ipAddress = $_SERVER['REMOTE_ADDR'];

        // Utiliser un service pour obtenir les coordonnées géographiques à partir de l'adresse IP
        $response = $this->httpClient->request('GET', 'https://ipinfo.io/' . $ipAddress . '/json');
        $data = $response->toArray();
        $location = $data['loc'] ?? null;

        if ($location) {
            [$latitude, $longitude] = explode(',', $location);

            // Utiliser les coordonnées pour obtenir le code ISO 3166-2
            $response = $this->httpClient->request('GET', "https://nominatim.openstreetmap.org/reverse?lat={$latitude}&lon={$longitude}&format=json");
            $data = $response->toArray();
            return $data['address']['ISO3166-2-lvl4'] ?? null;
        }

        return null;
    }
}
