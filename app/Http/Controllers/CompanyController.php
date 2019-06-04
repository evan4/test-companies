<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use App\Comment;

use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\CompanyImageUpdateRequest;

class CompanyController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = config('cms.image.directory');
    }

     /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('employees')->latest()->paginate(5);
       
        return view('companies.index', compact('companies'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company_id = $company->id;

        $emploees = Employee::with('position')->where('company_id', $company_id)
            ->latest()->paginate(5);

        $comments = Comment::with('company')->where('company_id', $company_id)
            ->latest()->get();

        return view('companies.show', compact('company', 'emploees', 'comments') );
    }

    public function update(CompanyUpdateRequest $request)
    {
        $company = Company::find(\Auth::id());
        $data = $request->all();
        $company->update(array_merge($data, ['slug' => str_slug($data['name'])]));

        return 'Данные успешно обновлены';
    }

    public function getPhoto()
    {
        $company = Company::find(\Auth::id());

        return view('backend.photoUpdate', compact('company') );
    }

    public function updatePhoto(CompanyImageUpdateRequest $request)
    {
        $company = Company::find(\Auth::id());
        
        $data = $this->handleRequest($request, $company->image);
        
        $company->update($data);

        return 'Данные успешно обновлены';
    }

    private function handleRequest($request, $old_image)
    {
        $destination = $this->uploadPath;
        $hasImage = false;
       
        $old = Storage::disk('local')->exists($destination, $old_image, 'public');
        if($old){
            $this->deleteImage($old_image);
        }
       
        $hasImage = $request['image'];
        
        if($hasImage){
            $image = $request->file('image');
            
            $path = Storage::disk('local')->put($destination, $image, 'public');
            $filename =explode('/', $path);
            $data['image'] = end($filename);
        }
        return $data;
    }

    private function deleteImage($old_image)
    {
        $destination = $this->uploadPath;

        Storage::disk('local')->delete($destination .'/'. $old_image);

    }

    public function destroy()
    {
        $company = Company::findOrFail(\Auth::id());
        
        $company->delete();

        \Auth::logout();
        return redirect('/login');
    }

}
