<?php

namespace App\Services;

use Google\Client;
use Google\Service\Gmail;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\ConferenceData;
use Google\Service\Calendar\ConferenceDataRequest;

class GoogleService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        // $this->client->setAccessToken(env('GOOGLE_REFRESH_TOKEN'));
        $this->client->addScope([Gmail::GMAIL_SEND, Calendar::CALENDAR]);
    }

    public function getGmailService()
    {
        return new Gmail($this->client);
    }

    public function getCalendarService()
    {
        return new Calendar($this->client);
    }

    public function sendEmail($userEmail, $subject, $htmlContent)
    {
        $service = $this->getGmailService();
        
        $message = new \Google\Service\Gmail\Message();
        $message->setRaw(base64_encode("To: {$userEmail}\r\nSubject: {$subject}\r\nContent-Type: text/html; charset=UTF-8\r\n\r\n{$htmlContent}"));
        
        try {
            $service->users_messages->send('me', $message);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function createCalendarEvent($summary, $description, $startDatetime, $endDatetime, $attendeesEmails, $travellerId){
        $service = $this->getCalendarService();
        $event = new Event();
        
        $event->setSummary($summary);
        $event->setDescription($description);
        $event->setStart(new \Google_Service_Calendar_EventDateTime([
            'dateTime' => $startDatetime,
            'timeZone' => 'Africa/Harare',
        ]));
        $event->setEnd(new \Google_Service_Calendar_EventDateTime([
            'dateTime' => $endDatetime,
            'timeZone' => 'Africa/Harare',
        ]));
        
        // Add attendees
        $attendees = [];
        foreach ($attendeesEmails as $email) {
            $attendees[] = new \Google_Service_Calendar_EventAttendee(['email' => $email]);
        }
        $event->attendees = $attendees;

        $event->setReminders(new \Google_Service_Calendar_EventReminders([
            'useDefault' => false,
            'overrides' => [
                ['method' => 'email', 'minutes' => 24 * 60],
                ['method' => 'popup', 'minutes' => 10],
            ]
        ]));
        
        $event->setExtendedProperties(new \Google_Service_Calendar_EventExtendedProperties([
            'private' => ['travellerId' => $travellerId],
        ]));

        try {
            $createdEvent = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);
            return $createdEvent;
        } catch (\Google_Service_Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Method to generate the authentication URL
    public function getAuthUrl()
    {
        $authUrl = $this->client->createAuthUrl();
        return $authUrl;
    }

    // Method to handle the OAuth2 callback and get the access token
    public function handleOAuthCallback($code)
    {
        try {
            // Exchange the authorization code for an access token
            $this->client->authenticate($code);
            $accessToken = $this->client->getAccessToken();
            // You can save the access token to session or database for future use
            return $accessToken;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function initiateOAuthFlow()
    {
        $googleService = new GoogleService();
        $authUrl = $googleService->getAuthUrl();
        
        // Redirect user to the Google OAuth authorization URL
        return redirect()->to($authUrl);
    }
}
