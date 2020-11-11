<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Game;
use Illuminate\Console\Command;

class CreateGameResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'result:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create game result';

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
     * @return int
     */
    public function handle()
    {

        $games = Game::where('is_finished', 0)->where('date', Carbon::yesterday()->format('Y-m-d'))->get();
        foreach ($games as $game) {
            $game->team1_score = random_int(0, 5);
            $game->team2_score = random_int(0, 5);
            $game->is_finished = 1;

            $game->save();

            $team1Players = $game->team1->players->all();
            foreach ($team1Players as $player) {
                $game->players()->attach($player->id);
            }

            $team2Players = $game->team2->players->all();
            foreach ($team2Players as $player) {
                $game->players()->attach($player->id);
            }
        }
        $this->line('This command creates game results');
    }
}
