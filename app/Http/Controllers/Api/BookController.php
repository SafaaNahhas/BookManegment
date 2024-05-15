<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // return(111111);
        $request->validate([
            'category_id'=>['integer'],
        ]);

        $q = Book::query();
        if($request->category_id)
            $q->where('category_id',$request->category_id);
        $books =$q->get();
        return response()->json(['success' => true, 'data' => $books],200);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // اضع المعلومات اللي بالجدول الضروري تنبعت وينحطلا شروط
            'title'=>'required',
            // علاقة
            'category_id'=>['required','integer','exists:categories,id'],
            // 'summary'=>'required',

            ]);
            // بعد عملية التحقق صار لازم احفظو بقاعدة البيانات فبعرف متغير وبقلو المعلومات الي رح تجيك من المستخدم اللي هية موجودة بالريكويست
            // خزنلي ياهن كلن بهذا الريكويست
            $input=$request->all();

            Book::create($input);
            // بعدما تنأنشأن رجعني لصفحة
            //success نضع اسم المتغير ومحتواه هنا اسمه with بال

            return response()->json($input,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // return response()->json($product,200);
        return new BookResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {

        $input=$request->all();

        $book->update($input);
        return response()->json($input,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json('deleted ');
    }

}
