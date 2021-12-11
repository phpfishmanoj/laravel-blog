<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultModel;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogController extends Controller
{
    //
    public function __construct()
    {
        
    }
    public function index()
    {
        $fetch_post_data=DB::table('post_details')
        ->orderBy('post_id','desc')
        ->get();
        return view('vw_blog.vw_blog',compact('fetch_post_data'));
    }
    public function addEdit($edit_id=null)
    {
        $edit_post_data='';
        if(!empty($edit_id))
        {
            $edit_post_data=DB::table('post_details')
            ->where('post_id',$edit_id)
            ->first();
        }
        return view('vw_blog.vw_addEdit_post',compact('edit_post_data'));
    }
    public function addEditAction(Request $request)
    {  
        // dd($request->all());        
        $obj = new DefaultModel();
        $request->validate([
            'title' => 'required|min:4|max:100',
            'description' => 'required',
        ]);
        $msg='';
        if(empty($request['edit_id']) || $request['edit_id']==NULL)
        {
            // dd('if');
            $data=array(
                'title'=>$request['title'],
                'description'=>$request['description'],
                'status'=>'1',
                'created_at'=>date('Y-m-d H:i:s'),
                'ip_address'=>$_SERVER['REMOTE_ADDR']
            );
           $res=$obj->insertData('post_details',$data);
           if(!empty($res)){
                return redirect('blog-post-list')->with('success','You have created successfully post ');
            }else{
                return redirect()->back()->with('error','Failed to create Try Again Later!!!');
            }
              
        }else{
            // dd('else');
            $data=array(
                'title'=>$request['title'],
                'description'=>$request['description'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'ip_address'=>$_SERVER['REMOTE_ADDR']
            );
            $condition=['post_id'=>$request['edit_id']];
           $res=$obj->updateData('post_details',$data,$condition);
           if(!empty($res)){
                return redirect('blog-post-list')->with('success','Updated successfully');
            }else{
                return redirect()->back()->with('error','Failed to update, Try Again Later!!!');
            }
        }         
        
    }
    public function deletePost($id = null)
    {
        // dd($id);
        $res=DB::table('post_details')
        ->where('post_id',$id)
        ->delete();
        if(!empty($res)){
            return redirect('blog-post-list')->with('success','deleted successfully');
        }else{
            return redirect('blog-post-list')->with('error','Failed to delete, Try Again Later!!!');
        }
    }
}
