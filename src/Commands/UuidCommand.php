<?php

namespace Ryangjchandler\Uuid\Commands;

use Illuminate\Console\Command;

class UuidCommand extends Command
{
    public $signature = 'laravel-uuid';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
