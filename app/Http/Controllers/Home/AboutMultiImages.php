<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutMultiImage;
use Carbon\Carbon;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutMultiImages extends Controller
{
    public function index()
    {
        $images = AboutMultiImage::latest()->get();
        return view('back.about.multi_imgs', compact('images'));
    }

    public function addImages()
    {
        return view('back.about.add_multi_imgs');
    }

    public function storeImgs(Request $request, FlasherInterface $flasher)
    {

        $images = $request->file('img_path');

        foreach ($images as $image)
        {
            $imgName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(400, 400)->save('uploads/about_multi_imgs/' . $imgName);

            $imgPath = 'uploads/about_multi_imgs/' . $imgName;

            AboutMultiImage::insert([
                'img_path' => $imgPath,
                'created_at' => Carbon::now()
            ]);

        }
        $flasher->addSuccess('Images Inserted Successfully');
        return redirect()->route('about.multi_images');
    }

    public function changeImg($id)
    {
        $image = AboutMultiImage::find($id);

        return view('back.about.change_img', compact('image'));
    }

    public function updateImg(Request $request, FlasherInterface $flasher)
    {
        $imgId = $request->img_id;
        $image = AboutMultiImage::findOrFail($imgId);

        $newImg = $request->file('img_path');

        if ($image)
        {
            $imgName = hexdec(uniqid()) . '.' . $newImg->getClientOriginalExtension();
            unlink($image->img_path);
            Image::make($newImg)->resize(400, 400)->save('uploads/about_multi_imgs/' . $imgName);
            $imgPath = 'uploads/about_multi_imgs/' . $imgName;

            $image->update([
                'img_path' => $imgPath
            ]);
            $flasher->addSuccess('Image Updated');
            return redirect()->route('about.multi_images');
        }
        else
        {
            $flasher->addError('Image not found');
            return redirect()->route('about.multi_images');
        }
    }

    public function deleteImage($id, FlasherInterface $flasher)
    {
        $img = AboutMultiImage::findOrFail($id);
        $img->delete();
        $flasher->addError('Image Deleted !');
        return redirect()->back();
    }
}
