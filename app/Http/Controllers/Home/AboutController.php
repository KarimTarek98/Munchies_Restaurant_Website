<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutMultiImage;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutPage()
    {
        $about = About::where('id', '=', 1)->first();
        return view('back.about.about_info', compact('about'));
    }

    public function editAbout($id)
    {
        $about = About::find($id);
        return view('back.about.edit', compact('about'));
    }

    public function updateAbout(Request $request, FlasherInterface $flasher)
    {
        $request->validate([
            'short_desc' => 'required|string',
            'long_desc' => 'required|string',
        ]);

        $aboutId = $request->about_id;

        $about = About::findOrFail($aboutId);
        $about->update([
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        $flasher->addSuccess('About Info Updated Successful');
        return redirect()->route('about.info');
    }

    public function appAbout()
    {
        $about = About::where('id', '=', 1)->first();
        $aboutImgs = [
            'img1' => AboutMultiImage::where('id', '=', 1)->first(),
            'img2' => AboutMultiImage::where('id', '=', 2)->first(),
            'img3' => AboutMultiImage::where('id', '=', 3)->first(),
            'img4' => AboutMultiImage::where('id', '=', 4)->first(),
        ];

        return view('app.about.about_page', compact('about', 'aboutImgs'));
    }
}
