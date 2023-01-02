<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CovidController extends Controller
{
    public function getCovidCasesByCountry(Request $request)
    {
        $countryCases = $this->buildCountryCasesData($request->countryCases);
     
        return $countryCases;
    }

    private function buildCountryCasesData($countryCases)
    {
        return [
            'country' => $countryCases['country'],
            'cases' => $countryCases['timeline']['cases']
        ];
    }
}
