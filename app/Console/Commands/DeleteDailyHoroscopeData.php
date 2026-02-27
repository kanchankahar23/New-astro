<?php

namespace App\Console\Commands;
use App\Models\DailyHoroscope;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DeleteDailyHoroscopeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'horoscope:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear daily zodiac data at the end of the day';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $currentDate = Carbon::now()->format('d/m/Y');

        DailyHoroscope::where('date', '>', $currentDate)
            ->update([
                'daily_zodiac_data' => null,
                'weekly_zodiac_data' => null,
                'yearly_zodiac_data' => null,
                'date' => null
            ]);

        $this->info('Daily zodiac data cleared successfully.');
    }
}
