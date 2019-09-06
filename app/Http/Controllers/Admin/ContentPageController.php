<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentPageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentPageController extends Controller
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
        $items = DB::table('content_pages')->paginate(10);
        /**
         * đây là truyền controller xuống view
         */
        $data=array();
        $data['pages']=$items;
        return view('admin.content.content.page.index',$data);

    }

    public function create(){
        $data=array();
        return view('admin.content.content.page.submit',$data);

    }

    public function edit($id){
        $data=array();
        $item=ContentPageModel::find($id);
        $data['page']=$item;

        return view('admin.content.content.page.edit',$data);

    }

    public function delete($id){
        $item = ContentPageModel::find($id);
        $data = array();
        $data['page'] = $item;
        return view('admin.content.content.page.delete', $data);

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        $input=$request->all();
        $item=new ContentPageModel();
        $item->name=$input['name'];
        $item->slug=$input['slug'];
        $item->images=$input['images'];
        $item->intro=$input['intro'];
        $item->author_id=isset($input['author_id']) ? $input['author_id']:0;
        $item->view=isset($input['view'])? $input['view']:0;
        $item->desc=$input['desc'];
        $item->save();
        return redirect('/admin/content/page');


    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);
        $input = $request->all();
        $item = ContentPageModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->author_id =isset($input['author_id']) ? $input['author_id']:0;
        $item->view =isset($input['view']) ? $input['view']:0;
        $item->desc = $input['desc'];
        $item->save();
        return redirect('/admin/content/page');
    }


    public function destroy($id){
        $item=ContentPageModel::find($id);
        $item->delete();
        return redirect('/admin/content/page');


    }
}
