<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w;
    private $h;
    private $fileName;
    private $path;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $croppedImage = Image::load($srcPath)
                        ->crop(Manipulations::CROP_CENTER , $w, $h)
                        ->save($destPath);
                        
                    $cropimage2=Image::load($destPath)->watermark(base_path('resources/logo/logo-presto.it.png'))
                                    ->watermarkOpacity(50)
                                    ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
                                    ->watermarkPadding(5, 5, Manipulations::UNIT_PERCENT)
                                    ->watermarkHeight(14, Manipulations::UNIT_PERCENT)
                                    ->watermarkWidth(7, Manipulations::UNIT_PERCENT)
                                    ->watermarkFit(Manipulations::FIT_CROP)
                                    ->save();     
    }

}
