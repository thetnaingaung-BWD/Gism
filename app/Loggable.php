<?php

namespace App;

use App\Models\Media;
use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


trait Loggable
{
    // Upload Image and store Session data
    public function uploadImage(Request $request, $fileInputName, $directory = 'tmp' )
    {

        if ($request->hasFile($fileInputName)) {

            $newImageName = uniqid() . $request->file($fileInputName)->getClientOriginalName();

            $request->file($fileInputName)->storeAs($directory, $newImageName, 'public');

            return $newImageName;

        }

        return null;
    }
    // Final Save and store to database
     public function SaveAndStore($sessionData,$section)
    {
        $homeContent = array_key_exists('homeContent', $sessionData) && $sessionData['homeContent'] !== null ? $sessionData['homeContent'] : null;

        $homeMedia = array_key_exists('homeMedia', $sessionData) && $sessionData['homeMedia'] !== null ? $sessionData['homeMedia'] : null;
        if ($homeContent != null) {

            foreach ($homeContent as $key => $items) {

                if ($items != null) {
                    foreach ($items as $title => $item){
                        $newTitle = preg_replace('/_[^_]+$/', '', $title);
                        if(preg_replace('/_[^_]+$/', '', $title) == 'about_school' ){
                            $lastData = Content::select('key')->where('key', 'like', '%'.$newTitle.'_%')->latest()->first();
                            if ($lastData) {
                                $lastData = preg_replace('/about_school_/', '', $lastData -> key);
                                $title =  $newTitle .'_'. $lastData+1 ;
                            }else{
                                $title = $newTitle . "_1";
                            }
                        }
                        Content::where('key',$title)
                                ->where('section',$section)
                                ->updateOrCreate(
                                    ['key' => $title, 'section' => $section],
                                    ['body' => json_encode($item)]
                                );

                        session()->forget($key);
                    }
                }
            }
        }
        if ($homeMedia != null) {

            foreach ($homeMedia as $key => $items) {

                if ($items != null) {

                    foreach ($items as $title => $item) {

                        // Get old image path from database
                        $oldImagePath = Media::select('img_path')
                              ->where('title',$title)
                              ->where('section',$section)
                              ->first();
                        // Delete old image
                        if (Storage::disk('public')->exists('asset/'.$section.'/'. $oldImagePath->img_path)) {

                            Storage::disk('public')->delete('asset/'.$section.'/'. $oldImagePath->img_path);
                        }
                        Media::where('title',$title)
                              ->where('section',$section)
                              ->updateOrCreate(
                                ['title' => $title ,'section' => $section],
                                ['img_path' => $item]
                            );

                        session()->forget($key);

                        // move from tmp to asset file
                        $oldPath ='tmp/'.$section.'/'. $item ;

                        $newPath = 'asset/'.$section.'/' . $item;

                        if (Storage::disk('public')->exists($oldPath)) {

                            Storage::disk('public')->move($oldPath, $newPath);
                        }
                    }

                }
            }
        }
        $files = Storage::disk('public')->allFiles('tmp/'.$section);

        if (!empty($files)) {

            // Delete all files and subdirectories in the 'tmp' directory
            Storage::disk('public')->delete($files);
        }

    }
    // Reset Session and Tmp File
    public function resetAndDelete($sessionData,$directory) {
        $homeContent = $sessionData['homeContent'] != null ? $sessionData['homeContent'] : null;

        $homeMedia = $sessionData['homeMedia'];

        if ($homeContent != null) {

            foreach ($homeContent as $key => $items) {

                if ($items != null) {

                    session()->forget($key);

                }
            }
        }
        if ($homeMedia != null) {

            foreach ($homeMedia as $key => $items) {

                if ($items != null) {

                    session()->forget($key);
                }
            }
        }
        $files = Storage::disk('public')->allFiles($directory);

        if (!empty($files)) {

            // Delete all files and subdirectories in the 'tmp' directory
            Storage::disk('public')->delete($files);
        }
    }




}
