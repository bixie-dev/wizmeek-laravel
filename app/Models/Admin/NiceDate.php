<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiceDate extends Model
{
    use HasFactory;

    public function nice_date($date) {
        $date = explode(' ', $date);
        $dateDate = explode('-', $date[0]);
        $dateTime = explode(':', $date[1]);

        $year = $dateDate[0];
        $day = $dateDate[2];

        switch($dateDate[1]){
            case '01':
                $month = 'Jan';
                break;
            case '02':
                $month = 'Feb';
                break;
            case '03':
                $month = 'Mar';
                break;
            case '04':
                $month = 'Apr';
                break;
            case '05':
                $month = 'May';
                break;
            case '06':
                $month = 'Jun';
                break;
            case '07':
                $month = 'Jul';
                break;
            case '08':
                $month = 'Aug';
                break;
            case '09':
                $month = 'Sep';
                break;
            case '10':
                $month = 'Oct';
                break;
            case '11':
                $month = 'Nov';
                break;
            case '12':
                $month = 'Dec';
                break;
        }
        return $month . ' ' . $year;
    }
}
