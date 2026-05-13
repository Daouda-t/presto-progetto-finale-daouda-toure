<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;


#[Signature('app:make-user-revisor')]
#[Description('Command description')]
class MakeUserRevisor extends Command
{
    /**
     * Execute the console command.
     */
    protected $signature = 'app:make-user-revisor {email}';
   protected $description = 'Rende un utente revisore';
    public function handle()
    {
      $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error('Utente non trovato.');
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info('Utente ' . $user->name . ' è ora un revisore.');
    }
}


