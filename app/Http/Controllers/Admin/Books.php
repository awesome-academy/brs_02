<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Book\BookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class Books extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Book $objmBook , Category $objmCat , User $objmUser){
        $this->objmBook = $objmBook;
        $this->objmCat = $objmCat;
        $this->objmUser = $objmUser;
    }

    public function index()
    {
        $objItemBooks = $this->objmBook->join('users', 'users.id', '=', 'book.user_id')
                                        ->join('catetory', 'catetory.cat_id', '=', 'book.cat_id')
                                        ->select('book.*', 'users.username as username', 'catetory.cname as cname')
                                        ->orderBy('book_id', 'DESC')->paginate(config('book.paginateBook'));
        return view('admin.book.index', compact('objItemBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objItemCats = $this->objmCat->get();
        $listItem = array();
        foreach ($objItemCats as $objItemCat){
            $listItem[$objItemCat->cat_id]= $objItemCat->cname;
        }

        return view('admin.book.add', compact('listItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        try{
            $bname = $request->bname;
            $preview_text = $request->preview;
            $author = $request->author;
            $cat = $request->cat;
            $picture = $request->file('picture');
            $sort = $request->sort;
            $extract = $request->extract;
            $userId = Auth::user()->id;

            if ($picture->isValid()){
                $path = $request->picture->store('media/files/book');
                $tmp = explode('/', $path);
                $fileName = end($tmp);
            }

            $mBook = new Book();
            $mBook->bname = $bname;
            $mBook->user_id = $userId;
            $mBook->preview_text = $preview_text;
            $mBook->author = $author;
            $mBook->cat_id = $cat;
            $mBook->picture = $fileName;
            $mBook->sort = $sort;
            $mBook->extract = $extract;
            $result = $mBook->save();

            if($result){

                return redirect()->route('book.index')->with('msg', trans('lable.successful_add'));
            } else {

                return redirect()->route('book.index')->with('msg', trans('lable.error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objItemCats = $this->objmCat->get();
        $listItem = array();
        foreach ($objItemCats as $objItemCat){
            $listItem[$objItemCat->cat_id]= $objItemCat->cname;
        }

        $objItemBooks = $this->objmBook->join('users', 'users.id', '=', 'book.user_id')
            ->join('catetory', 'catetory.cat_id', '=', 'book.cat_id')
            ->select('book.*', 'users.username as username', 'catetory.cname as cname')
            ->where('book_id', $id)
            ->first();

        if(!is_null($objItemBooks)){

            return view('admin.book.edit', compact('objItemBooks','listItem'));
        } else {

            return redirect()->route('book.index')->with('msg', trans('lable.error'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BookRequest $request)
    {

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
        try{
            $bname = $request->bname;
            $preview_text = $request->preview;
            $author = $request->author;
            $cat = $request->cat;
            $picture = $request->file('picture');
            $sort = $request->sort;
            $extract = $request->extract;

            $mBook = Book::findOrfail($id);
            if ($request->hasFile('picture')) {
                if ($request->file('picture')->isValid()) {
                    $objItemBook = $this->objmBook->findOrFail($id);
                    $pictureOld = $objItemBook->picture;
                    Storage::delete('media/files/book/' . $pictureOld); // xóa ảnh cũ

                    $path = $request->picture->store('media/files/book'); // thêm hình mới
                    $tmp = explode('/', $path);
                    $fileName = end($tmp);
                    $mBook->picture = $fileName;
                }
            }
            
            $mBook->bname = $bname;
            $mBook->preview_text = $preview_text;
            $mBook->author = $author;
            $mBook->cat_id = $cat;
            $mBook->sort = $sort;
            $mBook->extract = $extract;

            if($mBook->save()){

                return redirect()->route('book.index')->with('msg', trans('lable.successful_add'));
            } else {

                return redirect()->route('book.index')->with('msg', trans('lable.error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('book.index')->with('msg', trans('lable.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $objItemBook = $this->objmBook->findOrFail($id);
            $picture = $objItemBook->picture;
            $deleteBook = $this->objmBook->where('book_id', $id)->delete();
            if($deleteBook){
                Storage::delete('media/files/book/'.$picture); // xóa ảnh
                return redirect()->route('book.index')->with('msg', trans('lable.successful_delete'));
            } else {

                return redirect()->route('book.index')->with('msg', trans('lable.error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('book.index')->with('msg', trans('lable.error'));
        }
    }
}
