<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(
        CategoryRepository $CategoryRepository
    ) {
        $this->categoryRepository = $CategoryRepository;
    }

    /**
     * @group CategoryController(類別)
     * category1.取得類別
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->categoryRepository->getAll();
    }

    /**
     * @group CategoryController(類別)
     * category2.新增類別
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'display_name' => ['string', 'required'],
        // ]);

        $fillable = $this->categoryRepository->getFillable();
        $this->categoryRepository->create(
            $request->only($fillable)
        );
    }

    /**
     * @group CategoryController(類別)
     * category3.取得一個類別
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->categoryRepository->getById($id);
    }

    /**
     * @group CategoryController(類別)
     * category4.修改類別
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'display_name' => ['string', 'required'],
        // ]);

        $fillable = $this->categoryRepository->getFillable();
        $this->categoryRepository->update(
            $request->only($fillable),
            $id
        );
    }

    /**
     * @group CategoryController(類別)
     * category5.刪除類別
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
    }
}
