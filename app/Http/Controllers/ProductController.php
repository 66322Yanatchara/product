<?php
//สินค้าที่มีในร้าน
namespace App\Http\Controllers;
//use App\Models\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;  
//use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;
class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => '2 Cool 4 Skool ', 
        'description' => ' อัลบั้มที่ 1 ', 
        'price' => 590, 
        'imageUrl' => 'https://keautiful.com/cdn/shop/files/7f0164b6e0de920ecec47718aa267f04-0.jpg?crop=center&height=430&v=1686240949&width=430'],

        ['id' => 2, 'name' => 'O!RUL8,2 ?', 
        'description' => ' อัลบั้มที่ 2', 
        'price' => 690, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/o_rul8_2/album-cover.jpg'],

        ['id' => 3, 'name' => 'Skool Luv Affair', 
        'description' => ' อัลบั้มที่ 3 ', 
        'price' => 590, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/skool_luv_affair/album-cover.jpg'],

        ['id' => 4, 'name' => 'Dark & Wild ', 
        'description' => 'อัลบั้มที่ 4', 
        'price' => 790, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/dark_and_wild/album-cover.jpg'],

        ['id' => 5, 'name' => '화양연화 pt. 1', 
        'description' => ' อัลบั้มที่ 5 ', 
        'price' => 790, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/hwayangyeonhwa-pt1/album-cover.jpg'],

        ['id' => 6, 'name' => '화양연화 pt. 2', 
        'description' => ' อัลบั้มที่ 6', 
        'price' => 900, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/hwayangyeonhwa-pt2/album-cover.jpg'],

        ['id' => 7, 'name' => 'Young Forever', 
        'description' => 'อัลบั้มที่ 7', 
        'price' => 990, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/young_forever/album-cover.jpg'],

        ['id' => 8, 'name' => 'WINGS', 
        'description' => 'อัลบั้มที่ 8 ', 
        'price' => 790, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/wings/album-cover.jpg'],

        ['id' => 9, 'name' =>'YOU NEVER WALK ALONE', 
        'description' => 'อัลบั้มที่ 9', 
        'price' => 800, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/you_never_walk_alone/album-cover.jpg'],

        ['id' => 10, 'name' => ' LOVE YOURSELF承 ‘HER’ ', 
        'description' => 'อัลบั้มที่ 10', 
        'price' => 990, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/love_yourself-her/album-cover.jpg'],

        ['id' => 11, 'name' => ' LOVE YOURSELF轉 ‘TEAR’ ', 
        'description' => 'อัลบั้มที่ 11', 
        'price' => 890, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/love_yourself-tear/album-cover.jpg'],
        
        ['id' => 12, 'name' => 'LOVE YOURSELF結 ‘ANSWER’ ', 
        'description' => 'อัลบั้มที่ 12', 
        'price' => 790, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/love_yourself-answer/album-cover.jpg'],

        ['id' => 13, 'name' => ' MAP OF THE SOUL : PERSONA ', 
        'description' => 'อัลบั้มที่ 13', 
        'price' => 800, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/map_of_the_soul-persona/album-cover.jpg'],

        ['id' => 14, 'name' => ' MAP OF THE SOUL : 7 ', 
        'description' => 'อัลบั้มที่ 14', 
        'price' => 790, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/map_of_the_soul-7/img01.jpg'],

        ['id' => 15, 'name' => ' DYNAMITE ', 
        'description' => 'อัลบั้มที่ 15', 
        'price' => 950, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/dynamite/Q7gBkUusiDcIYljQOMX9ow6W.jpg'],

        ['id' => 16, 'name' => ' BE', 
        'description' => 'อัลบั้มที่ 16', 
        'price' => 800, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/be/rwXJxHlQ87gEiJJynB1pmScl.jpg'],

        ['id' => 17, 'name' => ' Butte  ', 
        'description' => 'อัลบั้มที่ 17', 
        'price' => 790, 
        'imageUrl' => 'https://th.bing.com/th/id/OIP.TR6DWrNOKhuzJh8gkQEQsQHaHa?w=640&h=640&rs=1&pid=ImgDetMain'],

        ['id' => 18, 'name' => 'Permission to dance  ', 
        'description' => 'อัลบั้มที่ 18', 
        'price' => 900, 
        'imageUrl' => 'https://th.bing.com/th/id/OIP.dNSMJWvZHa3ti6ddZ5d_GAHaHa?rs=1&pid=ImgDetMain'],

        ['id' => 19, 'name' => ' Proof ', 
        'description' => 'อัลบั้มที่ 19', 
        'price' => 890, 
        'imageUrl' => 'https://th.bing.com/th/id/OIP.5uzOdBa6mRluysupMBHLLQHaHa?rs=1&pid=ImgDetMain'],

        ['id' => 20, 'name' => ' Take Two ', 
        'description' => 'อัลบั้มที่ 20', 
        'price' => 900, 
        'imageUrl' => 'https://ibighit.com/bts/images/bts/discography/take-two/album-cover.png'],

    ];
      
    /**
     * Display a listing of the resource.
     */

    public function index(): Response
    {
        //ฟังก์ชันนี้แสดงหน้ารายการสินค้าทั้งหมด โดยส่งข้อมูลสินค้าจาก $this->products ไปยังหน้า 'Products/Index'.
    return Inertia::render('Products/Index', ['products' => $this->products]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

     //โค้ดนี้ใช้ดึงข้อมูลสินค้าจาก $this->products ด้วย ID ($id) โดยใช้ firstWhere() หากไม่พบสินค้า จะส่ง HTTP 404 (Not Found) 
     //และถ้าพบสินค้า จะส่งข้อมูลไปยังหน้าที่เรนเดอร์ด้วย Inertia.js สำหรับแสดงรายละเอียดสินค้า.
    public function show(string $id)
    {
        //
        $product = collect($this->products)->firstWhere('id', $id);
        
        if (!$product) 
        {abort(404, 'Product not found');
        }
        return Inertia::render('Products/Show', ['product' => $product]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
