<?php

namespace App\Providers;

use App\AgentPositionTypeTransaction;
use App\Position;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('agent_position_type_transactions')) {
            $years = Position::select('year')->where('is_deleted', '0')->groupBy('year')->get()->pluck('year','year');

            $pendingProposals = AgentPositionTypeTransaction::where('procedure_number', '')->count();
            View::share(compact('pendingProposals','years'));
        }
    }
}
