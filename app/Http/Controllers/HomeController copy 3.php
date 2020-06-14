<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $monthlySalary = 0;

        //basic salary by month
        $basicSalary = 30000;

        //Insurance 5000/yrs each employee. 50% employee, 50% company
        $insurancePremium  = 5000;

        //total team members
        $teamMembers = 50;

        //total revenue this year
        $reveneuYearly = 20000000;


        //deduct 3% provident fund
        $providentFundParcent = 3;
        $providentFund = $basicSalary / 100 * 3;

        //deduct insurance premimum yearly, 50% company, 50% emplyee
        //[(5000 / 100 * 50) / 12]
        $insurance = ($insurancePremium / 100 * 50 );
        $insuranceMonthly = $insurance / 12;

        //add 5 % revenue share for tech staff (50). Not applicable
        $revenueForEmployee = ($reveneuYearly / 100 * 5 ) / $teamMembers;
        // $monthlySalary = $monthlySalary + $revenueForEmployee;

        //[basicSalary - (providentFund + insuranceMonthly)]
        $monthlySalary = $basicSalary - ($providentFund + $insuranceMonthly);
        dump("Monthly Salary {$monthlySalary}");


        //hourly salary calculation 
        //8 hours /day/week/month salary without extra holiday
        // [monthlySalary - (8 * 6 * 4)]
        $eightHourHourlyRate = $monthlySalary / (8 * 6 * 4);        
        dump("Hourly rate for eight hours  {$eightHourHourlyRate}");

        //9 hours /day/week/month salary + extra holiday
        // [monthlySalary / ((9 * 6 * 4) + (9 * 3))]
        $nineHourHourlyRate = $monthlySalary / ((9 * 6 * 4) + (9 * 3));        
        dump('Hourly rate for nine hours ' .  $nineHourHourlyRate);

        $eightHourMonthlySalary = $eightHourHourlyRate * (8 * 6 * 4);
        $nineHourMonthlySalary = $nineHourHourlyRate * ((9 * 6 * 4) + (9 * 3));   


        echo "<h1>Impect</h1>";
        $hourlyImpect = ($eightHourHourlyRate - $nineHourHourlyRate) ;
        $monthlyImpect = $hourlyImpect * ((9 * 6 * 4) + (9 * 3));
        $impectedMonthlySalary = $basicSalary - $monthlyImpect;

        dump('Hourly Impect ' . $hourlyImpect);
        dump('Monthly Impect ' . $monthlyImpect);
        dump('Original Monthly Salary ' . $basicSalary);
        dump('Impected Monthly Salary ' . $impectedMonthlySalary);

        //5% revenue share will not impect in hourly salary

        return view('home.index', compact(
            'basicSalary', 'insurancePremium', 'teamMembers', 'reveneuYearly',
            'providentFundParcent', 'providentFund', 'insuranceMonthly', 'monthlySalary',
            'nineHourHourlyRate', 'eightHourHourlyRate',
            'eightHourMonthlySalary', 'nineHourMonthlySalary', 'hourlyImpect', 'monthlyImpect',
            'impectedMonthlySalary'

        ));
    }

}
