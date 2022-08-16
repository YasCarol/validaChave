<?php
require __DIR__ . '/vendor/autoload.php';


//CONEXAO COM O GOOGLE SHEETS
function Sheets()
{
    $client = new \Google_Client();
    $client->setApplicationName('Google Sheets and PHP');
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    $client->setAccessType('offline');
    $client->setAuthConfig(__DIR__ . '/credentials.json');


    //BUSCANDO OS DADOS DAS PLANILHAS
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = array('1QH2jiFMqtKhBKiiVxKi23KEqAyyJPH8S_lmI8sYq2Jk'); // ID DAS PLANILHAS
    foreach ($spreadsheetId as $va) {
        $range = 'dados !A:S';
        $response = $service->spreadsheets_values->get($va, $range);
        $values = $response->getValues();

        //MAPEAMENTO
        $map = [
            "EMAIL" => "EMAIL",
            "LOGIN" => "LOGIN",
            "SENHA" => "SENHA"
        ];
    }
    echo json_encode($map);
}
Sheets();
