<?php
   
namespace App\Console\Commands;
   
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Models\poke_dt;
use App\Mail\sendmail2;
use App\Models\User;


use DB;


   
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
     
        
        


        $date=date('d F, y');
        $time=date('H:i');
        $ms=poke_dt::wheredate('date',$date)->wheretime('time',$time)->whereNull('status')->get();
        foreach($ms as $row){
            DB::table('poke_dts')->where('id', $row->id)
            ->update([
               'status' => 'send'
            ]);
            $mail=User::where('id',$row->to)->value('email');
            $data =$row->msg;
            Mail::to($mail)->send(new sendmail2($data));
      


       
      }
      
    }
}