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
        $providentFund = $basicSalary / 100 * 3;
        $monthlySalary = $basicSalary - $providentFund;
        dump("Monthly Salary {$monthlySalary}");

        //deduct insurance premimum yearly, 50% company, 50% emplyee
        $insurance = ($insurancePremium / 100 * 50 ) / 12;
        $monthlySalary = $monthlySalary - $insurance;
        dump("Monthly Salary {$monthlySalary}");

        //add 5 % revenue share for tech staff (50)
        $revenueForEmployee = ($reveneuYearly / 100 * 5 ) / $teamMembers;
        // $monthlySalary = $monthlySalary + $revenueForEmployee;


        dump("Monthly Salary {$monthlySalary}");


        //hourly salary calculation 
        //8 hours /day/week/month salary without extra holiday
        $eightHourMonthlySalary = $monthlySalary / (8 * 6 * 4);        
        dump("hours /day/week/month salary without extra holiday  {$eightHourMonthlySalary}");

        //9 hours /day/week/month salary + extra holiday
        $nineHourMonthlySalary = $monthlySalary / ((9 * 6 * 4) + (9 * 3));        
        dump('hours /day/week/month salary + extra holiday ' .  $nineHourMonthlySalary);
        echo "<h1>Impect</h1>";
        $hourlyImpect = ($eightHourMonthlySalary - $nineHourMonthlySalary) ;
        $monthlyImpect = $hourlyImpect * ((9 * 6 * 4) + (9 * 3));
        dump('Hourly Impect ' . $hourlyImpect);
        dump('Monthly Impect ' . $monthlyImpect);
        dump('Original Monthly Salary ' . $basicSalary);
        dump('Impected Monthly Salary ' . ($basicSalary - $monthlyImpect));

        //5% revenue share will not impect in hourly salary

        return view('home.index', compact(
            'basicSalary', 'insurancePremium'
        ));
    }

}
