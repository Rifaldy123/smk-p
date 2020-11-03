<?php
  
namespace App\Http\Controllers;
   
use App\Models\Carousels;
use Illuminate\Http\Request;
  
class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['carousels'] = Carousels::orderBy('id','desc')->paginate(5);
    
        return view('carousels.index', $data);
    }
      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousels.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $request->validate([
        	'type' => 'required',
            'title' => 'required',
            'url' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required',
        ]);
        $path = $request->file('url')->store('public/images');
        $carousel = new Carousels;
        $carousel->title = $request->title;
        $carousel->description = $request->description;
        $carousel->url = $path;
        $carousel->save();
     
        return redirect()->route('carousels.index')
                        ->with('success','Post has been created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Carousels $carousel)
    {
        return view('carousels.show',compact('carousels'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousels $carousel)
    {
        return view('carousels.edit',compact('carousel'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        	// 'type' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $carousel = Carousels::find($id);
        if($request->hasFile('url')){
            $request->validate([
              'url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('url')->store('public/images');
            $carousel->url = $path; 
        }
        $carousel->title = $request->title;
        $carousel->description = $request->description;
        $carousel->save();
    
        return redirect()->route('carousels.index')
                        ->with('success','Post updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousels $carousel)
    {
        $carousel->delete();
    
        return redirect()->route('carousels.index')
                        ->with('success','Post has been deleted successfully');
    }
}