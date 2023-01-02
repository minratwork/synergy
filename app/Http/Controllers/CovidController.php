<?php

namespace App\Http\Controllers;

use App\Models\CovidCases;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CovidController extends Controller
{
    public function getCovidCasesByCountry(Request $request)
    {
        $countryCases = $this->buildCountryCasesData($request->countryCases);
        $this->saveCountryCases($countryCases);
        return $countryCases;
    }

    private function buildCountryCasesData($countryCases)
    {
        return [
            'country' => $countryCases['country'],
            'cases' => $countryCases['timeline']['cases']
        ];
    }

    private function saveCountryCases($countryCases)
    {
        // dd($countryCases);
        
        foreach($countryCases['cases'] as $key => $case) {
            $formattedDate = Carbon::parse($key);
            // dd($key, $t);
            CovidCases::updateOrCreate([
                'country' => $countryCases['country'],
                'date' => $formattedDate,
                'case' => $case
            ]);
        }
    }
}
