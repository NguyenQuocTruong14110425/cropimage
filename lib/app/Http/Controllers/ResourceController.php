<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ResourceController extends Controller
{

    public function getList()
    {
        Session::flash('message', 'find success');
        $resources=  Resource::all();
        return view('resources.list',
            ["resources" => $resources]);;


    }

    public function getFind($id)
    {
        $resources= Resource::find($id);
            Session::flash('message', 'find success');
            return view('resources.find',
                ["resources" => $resources]);


    }
    public function getCreate()
    {
        return view('resources.create');
    }

    public function postCreate(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');

                $x1 = $request->x1;
                $y1 = $request->y1;
                $w = $request->w;
                $h = $request->h;
                $pathSave = base_path('../public/upload/' . $request->type);
                $fileName = $request->type . '_' . $file->getClientOriginalName();
                $fileNameThumb = $file->getClientOriginalName();
                $pathThumb = base_path('../public/upload/thumb/' . $fileNameThumb);
                $fileThumb = Image::make($file);
//                $height = $fileThumb->height();
//                $width = $fileThumb->width();
                $fileThumb->crop($w,$h,$x1,$y1);
//                $fileThumb->resize($width/4,$height/4);
                $fileThumb->save($pathThumb);
//                $file->move($pathSave, $fileName);

            $data = [
                'resources_title'=>$request->title,
                'resources_description'=>$request->description,
                'files'=> $file,
                'resources_path' => $fileName,
                'resources_thumb' => $fileNameThumb,
                'resources_type' => $request->type,
                'resources_lang_code' => $request->lang_code
            ];
            $resources= Resource::create($data);

            Session::flash('message', 'Create new resourcess success');
            return redirect('resources/');
            } else {
                Session::flash('messageQuery', 'khong co file');
                return view('resources.create');
            }
        }
        catch (\Exception $e)
        {
            dd($e);
        }

    }

    public function getUpdate($id)
    {
        $resources_destail= Resource::find($id);
        return view('resources.update',['resources_destail'=>$resources_destail]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $resources = Resource::find($id);

        $resources->resources_title=$request->title;
        $resources->resources_description>$request->description;
        $resources->resources_path = null;
        $resources->resources_thumb = null;
        $resources->resources_type = $request->tags;
        $resources->resources_lang_code = $request->lang_code;

        $resources->save();

            Session::flash('message', 'Update Resource ssuccess');
            return redirect('admin/resources/');
    }
    public function getDelete($id)
    {
        $resources = Resource::find($id);
        $resources->delete();
        Session::flash('message', 'delete Resource ssuccess');
        return redirect('admin/resources/');
    }
}
