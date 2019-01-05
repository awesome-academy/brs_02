<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class Book extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Book $objmBook , Cat $objmCat , User $objmUser){
        $this->objmBook = $objmBook;
        $this->objmCat = $objmCat;
        $this->objmUser = $objmUser;
    }

    public function index()
    {
        $objItemBooks = $this->objmBook->join('users', 'users.id', '=', 'book.user_id')
                                        ->select('book.*','users.username as username')
                                        ->orderBy('book_id', 'DESC')->paginate(10);
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
    public function store(Request $request)
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

                return redirect()->route('book.index')->with('msg', trans('lable.Successful_add'));
            } else {

                return redirect()->route('book.index')->with('msg', trans('lable.Error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('cat.index')->with('msg', trans('lable.Error'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
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
            $deleteBook = $this->objmBook->where('book_id', $id)->delete();
            if($deleteBook){

                return redirect()->route('book.index')->with('msg', trans('lable.Successful_delete'));
            } else {

                return redirect()->route('book.index')->with('msg', trans('lable.Error'));
            }
        } catch (Exception $exception) {

            return redirect()->route('book.index')->with('msg', trans('lable.Error'));
        }
    }
}
