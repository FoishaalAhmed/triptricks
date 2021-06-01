<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Trick extends Model
{
    protected $fillable = [
        'date', 'title', 'content', 'local_price', 'foreign_price', 'display',
    ];

    public function storeTrick(Object $request)
    {
        DB::transaction(function () use ($request) {

            $image = $request->file('display');

            if ($image) {

                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path     = 'public/images/tricks/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $this->display   = $image_url;
            }

            $this->date          = date('Y-m-d', strtotime($request->date));
            $this->title         = $request->title;
            $this->content       = $request->content;
            $this->local_price   = $request->local_price;
            $this->foreign_price = $request->foreign_price;

            $image = $request->file('file');

            if ($image) {

                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path     = 'public/images/tricks/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $this->file   = $image_url;
            }

            $storeTrick          = $this->save();
            $trick_id            = $this->id;

            if ($files = $request->file('photo')) {

                foreach ($files as $file) {

                    $multiple_upload_path = 'public/images/tricks/';
                    $name                 = $file->getClientOriginalName();
                    $multiple_image_name  = date('YmdHis') . '_' . $name;
                    $file->move($multiple_upload_path, $multiple_image_name);

                    $trickPhoto             = new PhotoTrick();
                    $trickPhoto->photo      = $multiple_upload_path . $multiple_image_name;
                    $trickPhoto->trick_id   = $trick_id;
                    $trickPhoto->save();
                }
            }

            $storeTrick
                ? session()->flash('message', 'Trick Updated Successfully!')
                : session()->flash('message', 'Something Went Wrong!');
        });
    }

    public function updateTrick(Object $request, Int $id)
    {
        DB::transaction(function () use ($request, $id) {
            $trick = $this::findOrFail($id);
            $image = $request->file('display');

            if ($image) {
                if (file_exists($trick->display)) unlink($trick->display);
                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path     = 'public/images/tricks/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $trick->display   = $image_url;
            }

            $trick->date          = date('Y-m-d', strtotime($request->date));
            $trick->title         = $request->title;
            $trick->content       = $request->content;
            $trick->local_price   = $request->local_price;
            $trick->foreign_price = $request->foreign_price;

            $image = $request->file('file');

            if ($image) {
                if (file_exists($trick->file)) unlink($trick->file);
                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path     = 'public/images/tricks/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $trick->file   = $image_url;
            }

            $updateTrick         = $trick->save();
            $trick_id            = $id;

            if ($files = $request->file('photo')) {

                foreach ($files as $file) {

                    $multiple_upload_path = 'public/images/tricks/';
                    $name                 = $file->getClientOriginalName();
                    $multiple_image_name  = date('YmdHis') . '_' . $name;
                    $file->move($multiple_upload_path, $multiple_image_name);

                    $trickPhoto             = new PhotoTrick();
                    $trickPhoto->photo      = $multiple_upload_path . $multiple_image_name;
                    $trickPhoto->trick_id   = $trick_id;
                    $trickPhoto->save();
                }
            }

            $updateTrick
                ? session()->flash('message', 'Trick Updated Successfully!')
                : session()->flash('message', 'Something Went Wrong!');
        });
    }

    public function destroyTrick(Int $id)
    {
        DB::transaction(function () use ($id) {
            $trick = $this::findOrFail($id);
            $photoTrick = PhotoTrick::where('trick_id', $id)->select('photo')->get();
            if (file_exists($trick->display)) unlink($trick->display);
            if (file_exists($trick->file)) unlink($trick->file);
            foreach ($photoTrick as $key => $value) {
                if (file_exists($value->photo)) unlink($value->photo);
            }
            PhotoTrick::where('trick_id', $id)->delete();
            $destroyTrick = $trick->delete();

            $destroyTrick
            ? session()->flash('message', 'Trick Deleted Successfully!')
            : session()->flash('message', 'Something Went Wrong!');
        });
    }
}
