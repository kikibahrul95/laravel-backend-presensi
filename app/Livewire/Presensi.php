<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Schedule;
use Auth;

class Presensi extends Component
{

    public $latitude;
    public $longitude;
    public $insideRadius = false;
    public function render()
    {
        $schedule =Schedule::where('user_id', Auth::user()->id)->first();
        return view('livewire.presensi', [
            'schedule' => $schedule,
            'insideRadius' => $this-> insideRadius
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
                    'schedule_latitude'=>$schedule->latitude,
                    'schedule_latitude'=>$scheduleschedule->latitude,
                    'schedule_start_time'=>$scheduleschedule->start_time,
                    'schedule_end_time'=>$scheduleschedule->end_time,
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
