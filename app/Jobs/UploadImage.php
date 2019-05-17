<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected$obj, $name, $field;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($obj, $name, $field)
    {
        $this->obj = $obj;
        $this->name = $name;
        $this->field = $field;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {



//        $this->obj->update([$this->field => 'done']);

        // move to storage path
        // resize
        // upload to s3 || move to public path
//        Storage::move("Upload/{}")
        // delete temp file
        // update
    }
}
