<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $registro=User::paginate(5);
        return  [ 
                  'paginate'=>
                   [
                               'total'=>$registro->total()       ,
                            'per_page'=>$registro->perPage()     ,
                           'last_page'=>$registro->lastPage()    ,
                        'current_page'=>$registro->currentPage() ,
                                'from'=>$registro->firstItem()   ,
                                  'to'=>$registro->lastItem()    ,
                           'item_page'=>$registro->count()       ,
                    ],
                           'registro'=>$registro                 ,
                 ];

    }
 
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       $this->validate( $request,[
                                  'name' => 'required',
                                  'email'=>'required' ,
                                  'password'=>'required']);

             //User::create($request->all());//Formaa general
             $registro= new User;
             $registro->name=$request->name;
             $registro->email=$request->email;
             $registro->password=bcrypt($request->password);
             $registro->save();

             return;
    }
         
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'name' =>'required',
           'email'=>'required']);
        User::find($id)->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=User::FindorFail($id);
        $registro->delete();
    }
    
    static function miError_404()
    {
        return view ('errors.404');
    }
}
