<?php namespace Nielsvandendries\Planning\Components;

use Cms\Classes\ComponentBase;
use Auth;
use RainLab\User\Models\User;
use Nielsvandendries\Planning\Models\Klussen;

class Werkaanvraag extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Werkaanvraag Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        // Controleren of de gebruiker is ingelogd
        if (!Auth::check()) {
            // Toon een bericht dat de gebruiker moet inloggen
            $this->page['message'] = 'Log in om de klussen te zien.';
            return;
        }

        // Klussen ophalen en doorgeven aan de Twig-template
        $user = Auth::getUser();
        $this->page['klussen'] = Klussen::all();
        $this->page['user'] = $user;
    }

    public function onSaveChoices()
    {
        // Controleren of de gebruiker is ingelogd
        if (!Auth::check()) {
            // Geen toegang tot opslaan als de gebruiker niet is ingelogd
            return Redirect::to('/login'); // Redirect naar de inlogpagina
        }

        // Gegevens ophalen uit het POST-verzoek
        $user = Auth::getUser();
        $choices = post('keuze');

        // Loop door de keuzes en sla ze op in de database
        foreach ($choices as $klusId => $keuze) {
            // Hier moet je code toevoegen om de keuze van de gebruiker op te slaan in de database,
            // bijvoorbeeld in een aangepaste tabel die de relatie tussen gebruikers en klussen beheert.
            // Je kunt Eloquent-models gebruiken om dit te doen.
        }

        // Stuur een bevestigingsbericht of redirect naar een bedankpagina
        Flash::success('Je keuzes zijn opgeslagen.');
        return Redirect::back();
    }
}
