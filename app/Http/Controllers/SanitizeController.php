<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class SanitizeController extends Controller
{
    public function decodeSocials($profile)
    {
        $jsondata = $profile->social_media;
        $data = json_decode($jsondata, true);

        $output = '';
        foreach ($data as $socialMedia => $link) {
            // Choose icon based on the social media name
            $icon = '';
            switch ($socialMedia) {
                case 'instagram':
                    $icon = '<i class="fab fa-instagram"></i>';
                    break;
                case 'facebook':
                    $icon = '<i class="fa-brands fa-facebook"></i>';
                    break;
                case 'twitter':
                    $icon = '<i class="fab fa-twitter"></i>';
                    break;
                default:
                    $icon = '<i class="fas fa-link"></i>';
                    break;
            }
    
            // Create the link with the icon
            $output .= '<a href="' . $link . '" target="_blank">' . $icon . ' ' . ucfirst($socialMedia) . '</a><br>';
        }
        return $output;
    }
    public function sanitizeJson($jsonString)
    {
        $data = json_decode($jsonString, true);
        if (is_array($data)) {
            array_walk_recursive($data, function (&$value) {
                $value = strip_tags($value);
            });
            return json_encode($data);
        }
        return $jsonString;
    }
}
