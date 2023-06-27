<?php

namespace Database\Seeders;

use App\Models\Session;
use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sessions = [];
        #1 Session Software
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Software | session #1',
        ]);

        #2 Session Software
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Software | session #2',
        ]);

        #3 Session Software
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Software | session #3',
        ]);

        #4 Session Software
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Software | session #4',
        ]);

        $this->sessionsAddToTerm(1, $sessions);
        $sessions = [];

        # Network
        #5 Session Network
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Network | session #1',
        ]);

        #6 Session Network
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Network | session #2',
        ]);

        #7 Session Network
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Network | session #3',
        ]);

        #8 Session Network
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Network | session #4',
        ]);


        $this->sessionsAddToTerm(2, $sessions);
        $sessions = [];

        # Cyber
        #9 Session Cyber
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Cyber | session #1',
        ]);

        #10 Session Cyber
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Cyber | session #2',
        ]);

        #11 Session Cyber
        $sessions[] =  \App\Models\Session::factory()->create([
            'title' => 'Cyber | session #3',
        ]);

        #12 Session Cyber
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Cyber | session #4',
        ]);

        $this->sessionsAddToTerm(3, $sessions);
        $sessions = [];
    }



    private function sessionsAddToTerm($department_id, $sessions = [])
    {
        $terms = Term::with('Department')->whereHas('Department', function ($query) use ($department_id) {
            $query->where('id', $department_id);
        })->get();

        foreach ($terms as $term) {
            foreach ($sessions as $session) {
                $term->Sessions()->sync([$session->id => [
                    'order' => $term->Sessions()->max('order') + 1
                ]], false);
            }
        }
    }
}
