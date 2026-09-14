<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class MakeVuePage extends Command
{
    protected $signature = 'make:vue {name : The path/name of the Vue component (e.g. auth/Login or Dashboard)}';
    protected $description = 'Create a new Inertia Vue page component';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Strip .vue if the user typed it manually
        $name = preg_replace('/\.vue$/i', '', $this->argument('name'));
        $path = resource_path("js/pages/{$name}.vue");

        if (File::exists($path)) {
            $this->error("File {$path} already exists!");
            return;
        }

        File::ensureDirectoryExists(dirname($path));

        $stub = <<<'VUE'
    <script setup lang="ts">
    import { Head } from '@inertiajs/vue3'
    </script>

    <template>
    <Head title="Page Title" />
    <div>
        <!-- Page Content -->
    </div>
    </template>
    VUE;

        File::put($path, $stub);
        $this->info("Created: resources/js/pages/{$name}.vue");
    }
}
