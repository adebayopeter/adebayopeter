<?php

namespace App\Http\Controllers;

use App\Client;
use App\AppCategory;
use App\Photo;
use App\Application;
use App\Http\Requests\ApplicationCreateRequest;
use App\Http\Requests\ApplicationEditRequest;
use Illuminate\Http\Request;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'applications' => Application::all(),
        ];
        //dd($data);
        return view('admin.applications.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'clients' => Client::all(),
            'appCategories' => AppCategory::all(),
        ];
        return view('admin.applications.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationCreateRequest $request)
    {
        $input = $request->all();

        if (count($request->file('photo_id')) > 3) {
            session()->flash('image_error_msg', 'Image upload must not be greater than 3!');

            return redirect('admin/applications/create')->withInput();
        }

        if ($files = $request->file('photo_id')) {

            $i = 0;
            $name = array();
            foreach($files as $file) {
                $name[$i] = time() . $file->getClientOriginalName();
                $file->move('images', $name[$i]);

                $i++;
            }
            if (count($name) == 1) {
                $name[1] = null;
                $name[2] = null;
            }
            else if (count($name) == 2) {
                $name[2] = null;
            }
            $photo = Photo::create([
                'file1' => $name[0], 
                'file2' => $name[1],
                'file3' => $name[2],
            ]);
            $input['photo_id'] = $photo->id;

            Application::create($input);

            session()->flash('application_created', 'Application has been created successfully!');

            return redirect('admin/applications');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'application' => Application::findOrFail($id),
        ];
        return view('admin.applications.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'application' => Application::findOrFail($id),
            'clients' => Client::all(),
            'appCategories' => AppCategory::all(),
        ];
        return view('admin.applications.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationEditRequest $request, $id)
    {
        $application = Application::findOrFail($id);

        $input = $request->all();

        if ($files = $request->file('photo_id')) {

            if (count($request->file('photo_id')) > 3) {
                session()->flash('image_error_msg', 'Image upload must not be greater than 3!');
    
                return redirect('admin/applications/edit')->withInput();
            }

            $photo = Photo::findOrFail($application->photo_id);

            $i = 0;
            $name = array();
            foreach($files as $file) {
                $name[$i] = time() . $file->getClientOriginalName();
                $file->move('images', $name[$i]);

                $i++;
            }
            if (count($name) == 1) {
                $name[1] = $photo->file2;
                $name[2] = $photo->file3;
            }
            else if (count($name) == 2) {
                $name[2] = $photo->file3;
            }
            $photo->update([
                'file1' => $name[0], 
                'file2' => $name[1],
                'file3' => $name[2],
            ]);
            $input['photo_id'] = $photo->id;
        }

        $application->update($input);

        session()->flash('application_saved', 'Application has been created successfully!');

        return redirect('admin/applications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        $photo = Photo::findOrFail($application->photo_id);

        if ($photo->file1) {
            unlink(public_path() . '\images\\' . $application->photo->file1);
        }

        if ($photo->file2) {
            unlink(public_path() . '\images\\' . $application->photo->file2);
        }

        if ($photo->file3) {
            unlink(public_path() . '\images\\' . $application->photo->file3);
        }

        $photo->delete();

        $application->delete();

        session()->flash('application_deleted', 'Application has been deleted successfully!');

        return redirect('admin/applications');
    }
}
