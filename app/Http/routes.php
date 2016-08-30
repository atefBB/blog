<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('ffmpeg', function(){
	
	$ffmpeg = FFMpeg\FFMpeg::create(array(
			'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
			'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe',
			'timeout'          => 3600, // The timeout for the underlying process
			'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
		));
	$video = $ffmpeg->open('https://www.youtube.com/watch?v=WOg_XPJR_Mk');
	$video->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4');
});
