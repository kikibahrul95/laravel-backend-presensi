<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use App\Models\Attendance;
use App\Models\Support\Carbon;
use Auth;


class Presensi extends Component
{

    public $latitude;
    public $longitude;
    public $insideRadius = false;
    public function render()
    {
        $schedule =Schedule::where('user_id', Auth::user()->id)->first();
        $attedence = Attendance::where('user_id', Auth::user()->id)
        ->where('created_at', Carbon::today())->first();
        return view('livewire.presensi', [
            'schedule' => $schedule,
            'insideRadius' => $this-> insideRadius,
            'attendance'=> $attedance
        ] );
    }
    public function store() {
        $this->validate([
            'latitude'=> 'required',
            'longitude'=> 'required'
        ]
        );
        $schedule = Schedule::where('user_id', Auth::user()->id)->first();

        if($schedule){
            $attedence = Attendance::where('user_id', Auth::user()->id)
                       ->where('created_at', Carbon::today())->first();
            if(!$attedence) {
                $attedence =Attedance::create([
                    'user_id'=>Auth::user()->id,
                    'schedule_latitude'=>$schedule->office->latitude,
                    'schedule_latitude'=>$scheduleschedule->office->latitude,
                    'schedule_start_time'=>$scheduleschedule->shift->start_time,
                    'schedule_end_time'=>$scheduleschedule->shift->end_time,
                    'latitude'=>$this->latitude,
                    'longitude'=>$this->longitude,
                    'start_time'=>Carbon::now()->toTimeString(),
                    'end_time'=>Carbon::now()->toTimeString(),
                ]);

            }  else{
                $attedence->update([
                    'latitude'=>$this->latitude,
                     'longitude'=>$this->longitude,
                     'end_time'=>Carbon::now()->toTimeSring(),
                ]);
            }
            return redirect()->route('presensi',[
                'schedule'=>$schedule,
                'insideRadius'=> false
            ]

            );
            
        }

    }
}
