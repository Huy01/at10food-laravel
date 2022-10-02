<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $sp_loai1 = Product::where('id_type', 1)->paginate(8);
        $sp_loai2 = Product::where('id_type', 2)->paginate(8);
        $sp_loai3 = Product::where('id_type', 3)->paginate(8);


        return view('page.index', compact('products', 'sp_loai1', 'sp_loai2', 'sp_loai3'));
    }

    public function getChiTietSanPham(Request $req)
    {
        $sanpham = Product::where('id', $req->id)->first();
        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(4);
        $loai = TypeProduct::where('id', '<=', 3 )->get();
        return view('page.detailproduct', compact('sanpham', 'sp_tuongtu', 'loai'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_pr = TypeProduct::all();
        return view('page.add_product', compact('type_pr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            [
                //Kiểm tra giá trị rỗng
                'name' => 'required',
                'description' => 'required|max:255',
                'unit_price' => 'required|integer',
                'promotion_price' => 'required|integer|not_in:0',
                'unit' => 'required',
                'image_file'=>'mimes:jpeg,jpg,png,gif|max:10000'
            ],
            [
                //Tùy chỉnh hiển thị thông báo
                'name.required' => 'Tên sản phẩm không được để trống!',
                'description.required' => 'Bạn chưa nhập mô tả!',
                'description.required' =>'Mô tả tối đa 255 ký tự',
                'unit_price.required' => 'Giá không được để trống!',
                'unit_price.integer' => 'Giá phải là số nguyên!',
                'promotion_price.required' => 'Giá khuyến mãi không được để trống!',
                'promotion_price.integer' => 'Giá khuyến mãi phải là số nguyên!',
                'unit.required' => 'Đơn vị tính không được để trống!',
                'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image_file.max' => 'Hình thẻ giới hạn dung lượng không quá 10MB',
            ]        
        );
         //kiểm tra file tồn tại
         $name='';
         if($request->hasfile('image'))
         {
             $file = $request->file('image');
             $name=$file->getClientOriginalName();
             $destinationPath=public_path('image/product'); 
             $file->move($destinationPath, $name); 
         }
        $pr = new Product();
            $pr->name=$request->input('name');
            $pr->id_type=$request->input('id_type');
            $pr->description=$request->input('description');
            $pr->unit_price=$request->input('unit_price');
            $pr->promotion_price=$request->input('promotion_price');
            $pr->image=$name;
            $pr->unit=$request->input('unit');
            $pr->save();
        return redirect('add_product')->with('success','Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $type_pr = TypeProduct::all();
        $pageName = 'Product Update';
        return view('page.update_pr', compact('products', 'pageName', 'type_pr'));
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
        //kiểm tra file tồn tại
        $name='';
        if($request->hasfile('image_file'))
        {
            $file = $request->file('image_file');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move('image/product', $name); 
        }
        $products = Product::find($id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        $products->image =$name;
        $products->unit = $request->unit;


        $products->save();
        return redirect()->action([FoodController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
