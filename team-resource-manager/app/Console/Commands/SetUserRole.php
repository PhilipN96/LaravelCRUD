<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SetUserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:role {email : E-Mail-Adresse des Benutzers} {role : Neue Rolle (admin oder user)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setzt die Rolle eines Benutzers (admin oder user).';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->argument('email');
        $role  = $this->argument('role');

        if (! in_array($role, ['admin', 'user'], true)) {
            $this->error("Ungültige Rolle '{$role}'. Erlaubt sind: admin, user.");

            return self::FAILURE;
        }

        $user = User::where('email', $email)->first();

        if (! $user) {
            $this->error("Kein Benutzer mit der E-Mail '{$email}' gefunden.");

            return self::FAILURE;
        }

        $user->role = $role;
        $user->save();

        $this->info("Rolle von {$user->name} ({$email}) wurde auf '{$role}' gesetzt.");

        return self::SUCCESS;
    }
}
