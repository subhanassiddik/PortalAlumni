<?php

namespace App\Http\Controllers\Vacancy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Vacancy;
use App\Tag;

class VacancyController extends Controller
{

    public function index(Request $request)
    {   
        $tags = Tag::all();

        $search_q = urlencode($request->input('search'));

        if (!empty($search_q)) 
            $vacancies = vacancy::latest()->where('title','like','%'.$search_q.'%')->Paginate(10);
        else
            $vacancies = Vacancy::latest()->Paginate(10);

        return view('vacancy.index',compact('vacancies','tags'));
    } 

    public function filter($tag)
    {   
        $tags = Tag::all();

        $vacancies = Vacancy::whereHas('tags',function($query) use ($tag){
                $query->where('name',$tag);
        })->Paginate(10);
        
        return view('vacancy.index',compact('vacancies','tags'));
    }

    public function show($slug)
    {
        $vacancy = Vacancy::where('slug',$slug)->first();

        $next_id = Vacancy::where('id','>',$vacancy->id)->min('id');
        $prev_id = Vacancy::where('id','<',$vacancy->id)->max('id');


        if (empty($vacancy)) return abort(403,'Halaman Yang Anda Akses Tidak DiTemukan');

        return view('vacancy.show',compact('vacancy'))
                                        ->with('next',Vacancy::find($next_id))
                                        ->with('prev',Vacancy::find($prev_id));
    }

    public function create()
    {   
        $tags = Tag::all(); 
        return view('vacancy.create',compact('tags'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required',
            'description' => 'required'
            ]);

        // $request->tags = array_diff($request->tags,[0]);
        
        if (empty($request->tags)) {
            return redirect('/vacancies')->withInput($request->input())->with('toast_warning','Tag tidak boleh kosong');
        }
            
        $slug = str_slug($request->title, '-');
        
        $vacancy = Vacancy::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'vacancyable_id' => '1',
            'vacancyable_type' => 'App\Admin'
            ]);
        
        $vacancy->tags()->sync($request->tags,false);

        return redirect('/')->with('success', 'Lowongan Berhasil Ditambah');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function edit($slug)
    {   
        // dd($slug);
        $vacancy = Vacancy::where('slug',$slug)->first();
        
        $tags = Tag::all();

        $tags2 = array();
        foreach ($tags as $tag)
        {
            $tags2[$tag->id] = $tag->name;
        }

        return view('vacancy.edit',compact('vacancy','tags','tags2'));
    }

    public function update(Request $request,$slug)
    {   
        $vacancy = Vacancy::where('slug',$slug)->first();

        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required'
            ]);


        if (empty($request->tags)) {
            return redirect()->back()->withInput($request->input())->with('toast_warning','Tag tidak boleh kosong');
        }

        $slug = str_slug($request->title, '-');
           
        $vacancy->update([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'vacancyable_id' => '1',
                'vacancyable_type' => 'App\Admin'
            ]);
        $vacancy->tags()->sync($request->tags,false);

        return redirect('/')->with('success','Lowongan Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $vacancy = vacancy::findOrFail($id);
        
        $vacancy->delete();

        return redirect('/')->with('success', 'Lowongan Berhasil Di Hapus');
    }
    
}
