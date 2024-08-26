async function getISO3166Code() {
    if (!navigator.geolocation) {
        console.error('La géolocalisation n\'est pas supportée par ce navigateur.');
        return null;
    }

    try {
        const position = await new Promise((resolve, reject) => {
            navigator.geolocation.getCurrentPosition(resolve, reject);
        });

        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`);
        const data = await response.json();

        const isoCode = data.address['ISO3166-2-lvl4'];
        if (isoCode) {
            // Envoyer le code ISO directement au HomeController
            const response = await fetch('/home', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ isoCode }),
            });
            const result = await response.json();
            console.log(result); // Afficher la réponse du serveur
            return isoCode;
        } else {
            console.error('Code ISO 3166-2 non trouvé.');
            return null;
        }
    } catch (error) {
        console.error(`Erreur: ${error.message}`);
        return null;
    }
}

// Appeler la fonction pour tester
getISO3166Code();
