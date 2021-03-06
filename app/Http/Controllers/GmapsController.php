<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GmapsController extends Controller
{
   public function index()
    {
        //configuaración
        $map = array();
        $config = array();
        $config['center'] = 'auto';
        $config['zoom'] = 15;

        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
 
            });
        }
        centreGot = true;';
 
        \Gmaps::initialize($config);
 
        // Colocar el marcador 
        // Una vez se conozca la posición del usuario
        $marker = array();
        \Gmaps::add_marker($marker);
 
        $map = \Gmaps::create_map();
 
        //Devolver vista con datos del mapa
        return view('gmaps', compact('map'));
    }

    
}
