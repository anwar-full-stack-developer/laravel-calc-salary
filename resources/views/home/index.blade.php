@extends('layouts.master')

@section('content')

<div>
    <strong>Question</strong><br/>
    If you work an average 9 hours per day and there are 3 extra holidays except friday, what is the impact on your monthly salary and expected earnings per month?
    
    <br/><strong>Answer</strong><br/>
    Expected earning was {{ $basicSalary }} TK but impected {{ $monthlyImpect }} TK final earning is {{ $impectedMonthlySalary }} TK. Details see bellow


</div>
<hr/>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" colspan="3">Input</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Basic Salary</th>
      <td>{{ $basicSalary }} TK / month</td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Insurance Premium</th>
      <td>{{ $insurancePremium }} TK /year </td>
      <td>Insurance {{ $insurancePremium }}/year for each employee. 50% employee, 50% company</td>
    </tr>
    
    <tr>
      <th scope="row">Provident Fund</th>
      <td>{{ $providentFundParcent }}% /month </td>
      <td>{{ $providentFundParcent }}% of basic</td>
    </tr>
    
    <tr>
      <th scope="row">Team Members</th>
      <td>{{ $teamMembers }} </td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Revenue</th>
      <td>{{ $reveneuYearly }}/year </td>
      <td>payable once after finishing financial year. 
      In 2020, revenue will be about 2 crore taka and technical team members are 50.
      Not applicable for hourly rate calculation</td>
    </tr>
    
    <tr>
      <th scope="row">Hour</th>
      <td>8/day </td>
      <td>6 day/week, 4 weeks/Month</td>
    </tr>
    <tr>
      <th scope="row">Requirements / User Story</th>
      <td>On email attachment </td>
      <td></td>
    </tr>
  </tbody>
</table>

<br/>
<br/>
<h4>Calculate Salary</h4>
<table class="table ">
  <thead>
    <tr>
      <th scope="col">Salary calculation for daily 8 hours without extra holiday</th>
      <th scope="col">Salary calculation for daily 9 hours + extra 3 holidays</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <table>
            <tbody>
                <tr>
                    <th>Basic Salary</th>
                    <td>{{ $basicSalary }} TK / Month</td>
                </tr>               
                <tr>
                    <th>Insurance</th>
                    <td>{{ $insuranceMonthly }} TK / Month
                        <br/>
                        <small>[(5000 / 100 * 50) / 12]</small>
                    </td>
                </tr>
                <tr>
                    <th>Provident Fund</th>
                    <td>{{ $providentFund }} TK / Month [{{ $providentFundParcent }}% of basic salary ]</td>
                </tr>
                <tr>
                    <th>Monthly Salary</th>
                    <td>{{ $monthlySalary }}
                        <br/>
                        <small>[basicSalary - (providentFund + insuranceMonthly)]</small>
                    </td>
                </tr>
                <tr>
                    <th>Hourly Rate</th>
                    <td>{{ $eightHourHourlyRate }}
                        <br/>
                        <small>[monthlySalary - (8 * 6 * 4)]</small>
                    </td>
                </tr>
            </tbody>
        </table>
      
      
      </td>
      <td>
      <table>
            <tbody>
                <tr>
                    <th>Basic Salary</th>
                    <td>{{ $basicSalary }} TK / Month</td>
                </tr>               
                <tr>
                    <th>Insurance</th>
                    <td>{{ $insuranceMonthly }} TK / Month
                        <br/>
                        <small>[(5000 / 100 * 50) / 12]</small>
                    </td>
                </tr>
                <tr>
                    <th>Provident Fund</th>
                    <td>{{ $providentFund }} TK / Month [{{ $providentFundParcent }}% of basic salary ]</td>
                </tr>
                <tr>
                    <th>Monthly Salary</th>
                    <td>{{ $nineHourMonthlySalary }}
                        <br/>
                        <small>[basicSalary - (providentFund + insuranceMonthly)]</small>
                    </td>
                </tr>
                <tr>
                    <th>Hourly Rate</th>
                    <td>{{ $nineHourHourlyRate }}
                        <br/>
                        <small>[monthlySalary / ((9 * 6 * 4) + (9 * 3))]</small>
                    </td>
                </tr>
            </tbody>
        </table>
            
      </td>
    </tr>
  </tbody>
</table>


<br/>
<br/>
<h4>Impact</h4>
<table class="table">
    <tbody>
        <tr>
            <th>Hourly Impect</th>
            <td>{{ $hourlyImpect }} TK </td>
        </tr> 
        <tr>
            <th>Monthly Impect</th>
            <td>{{ $monthlyImpect }} TK </td>
        </tr> 
        <tr>
            <th>Base Salary</th>
            <td>{{ $basicSalary }} TK </td>
        </tr> 
        <tr>
            <th>Impected Monthly Salary</th>
            <td>{{ $impectedMonthlySalary }} TK </td>
        </tr> 
    </tbody>
</table>

@endsection