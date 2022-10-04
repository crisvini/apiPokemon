<?php

class Pokemon
{
    public static function returnPokemons()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.canalti.com.br/api/pokemons.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        $json = json_decode($response, true);
        curl_close($curl);

        $htmlPokemons = '';
        foreach ($json["pokemon"] as $key => $value) {
            $type = '';
            foreach ($value["type"] as $key2 => $value2) {
                $type .= '<li>' . $value2 . '</li>';
            }
            $weaknesses = '';
            foreach ($value["weaknesses"] as $key3 => $value3) {
                $weaknesses .= '<li>' . $value3 . '</li>';
            }
            $htmlPokemons .= '<div class="col-3">
                                <div class="row p-2 text-light h-100">
                                    <div class="bg-warning bg-gradient p-2 rounded">
                                        <div class="col-12 text-center fs-5 fw-bold">
                                            ' . $value["name"] . '
                                        </div>
                                        <div class="col-12 text-center w-100">
                                            <img src="' . $value["img"] . '">
                                        </div>
                                        <div class="col-12">
                                            <span class="fw-bold">Type:</span>
                                            <ul>
                                                ' . $type . '
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <span class="fw-bold">Weaknesses:</span>
                                            <ul>
                                                ' . $weaknesses . '
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>';
        }
        return $htmlPokemons;
    }
}
