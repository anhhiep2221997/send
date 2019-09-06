<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentTagModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentTagController extends Controller
{
    /**
     * AdminManagerController constructor.
     * hàm được khởi tạo của class được chạy ngay khi khởi tạo đối tượng
     * hàm này được chạy trước các hàm khác trong class
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function index(){
        $items = DB::table('content_tags')->paginate(10);
        /**
         * đây là truyền controller xuống view
         */
        $data=array();
        $data['tags']=$items;
        return view('admin.content.content.tag.index',$data);

    }

    public function create(){
        $data=array();
        return view('admin.content.content.tag.submit',$data);

    }

    public function edit($id){
        $data=array();
        $item=ContentTagModel::find($id);
        $data['tag']=$item;

        return view('admin.content.content.tag.edit',$data);

    }

    public function delete($id){
        $item = ContentTagModel::find($id);
        $data = array();
        $data['tag'] = $item;
        return view('admin.content.content.tag.delete', $data);

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
        ]);

        $input=$request->all();
        $item=new ContentTagModel();
        $item->name=$input['name'];
        $item->slug=$input['slug'];
        $item->images=$input['images'];
        $item->intro=$input['intro'];
        $item->author_id=isset($input['author_id']) ? $input['author_id']:0;
        $item->view=isset($input['view'])? $input['view']:0;
        $item->save();
        return redirect('/admin/content/tag');


    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
        ]);
        $input = $request->all();
        $item = ContenttagModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->author_id =isset($input['author_id']) ? $input['author_id']:0;
        $item->view =isset($input['view']) ? $input['view']:0;
        $item->save();
        return redirect('/admin/content/tag');
    }


    public function destroy($id){
        $item=ContentTagModel::find($id);
        $item->delete();
        return redirect('/admin/content/tag');


    }
}
