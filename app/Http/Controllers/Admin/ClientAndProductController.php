<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\ClientAndProductRequest;
use App\Models\ClientAndProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientAndProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:client and product create|client and product edit|client and product delete|client and product status', ['only' => ['index']]);
        $this->middleware('permission:client and product create')->only(['create', 'store']);
        $this->middleware('permission:client and product edit')->only(['edit', 'update']);
        $this->middleware('permission:client and product delete')->only(['destroy']);
        $this->middleware('permission:client and product status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all ClientAndProduct
        $clientAndProducts = ClientAndProduct::with('image')->orderBy('serial', 'ASC');

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $clientAndProducts = $clientAndProducts->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword)
                ->orWhere('serial', 'like', $keyword)
                ->orWhere('type', 'like', $keyword)
            ;
        }

        $clientAndProducts = $clientAndProducts->paginate($perPage);

        //Show All clientAndProducts
        return view('admin.pages.client_and_products.index', compact('clientAndProducts'));
    }

    public function create()
    {
        return view('admin.pages.client_and_products.create');
    }

    public function store(ClientAndProductRequest $request)
    {
        DB::beginTransaction();

        try {

            $clientAndProduct = ClientAndProduct::create([
                'title'    => $request->title,
                'type'    => $request->type,
                'serial'    => $request->serial,
                'description' => $request->description,
                'link' => $request->link,
                'status'   => $request->status ? true : false,
            ]);

            if ($request->file('image')) {

                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'ClientAndProducts', ['width' => '', 'height' => '']);

                $clientAndProduct->image()->create([
                    'url'       => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type'      => 'image',
                ]);
            }

            if($request->file('upload_file')) {

                $file = $request->file('upload_file');
                $fileName = 'devxhub'.'-'.time().'-'.uniqid(5).'-'.$file->getClientOriginalName();
                $file_path= $file->storeAs('uploads/ClientAndProducts/PDF', $fileName, 'public');

                $clientAndProduct->image()->create([
                    'url'       => Storage::url($file_path),
                    'base_path' => $file_path,
                    'type'      => 'pdf',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Client or product Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(ClientAndProduct $clientAndProduct)
    {
        return view('admin.pages.client_and_products.edit', compact('clientAndProduct'));
    }

    public function update(ClientAndProductRequest $request, ClientAndProduct $clientAndProduct)
    {
        DB::beginTransaction();

        try {

            $clientAndProduct->update([
                'title'    => $request->title,
                'type'    => $request->type,
                'serial'    => $request->serial,
                'description' => $request->description,
                'link' => $request->link,
                'status'   => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image      = $request->file('image');
                $image_name = FileHandler::upload($image, 'ClientAndProducts', ['width' => '', 'height' => '']);

                FileHandler::delete($clientAndProduct->image()->where('type', 'image')->first()->base_path ?? null);

                if ($exist = $clientAndProduct->image()->where('type', 'image')->first()){
                    $exist->update([
                        'url'       => Storage::url($image_name),
                        'base_path' => $image_name,
                        'type'      => 'image',
                    ]);
                }else{
                    $clientAndProduct->image()->create([
                        'url'       => Storage::url($image_name),
                        'base_path' => $image_name,
                        'type'      => 'image',
                    ]);
                }
            }

            if($request->file('upload_file')) {

                $file = $request->file('upload_file');
                $fileName = 'devxhub'.'-'.time().'-'.uniqid(5).'-'.$file->getClientOriginalName();
                $file_path= $file->storeAs('uploads/ClientAndProducts/PDF', $fileName, 'public');

                FileHandler::delete($clientAndProduct->image()->where('type', 'pdf')->first()->base_path ?? null);

                if ($exist = $clientAndProduct->image()->where('type', 'pdf')->first()){
                    $exist->update([
                        'url'       => Storage::url($file_path),
                        'base_path' => $file_path,
                        'type'      => 'pdf',
                    ]);
                }else{
                    $clientAndProduct->image()->create([
                        'url'       => Storage::url($file_path),
                        'base_path' => $file_path,
                        'type'      => 'pdf',
                    ]);
                }
            }


            DB::commit();

            return redirect()->back()->with('success', 'Client or product Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(ClientAndProduct $clientAndProduct)
    {
        DB::beginTransaction();

        try {

            FileHandler::delete($clientAndProduct->image()->where('type', 'pdf')->first()->base_path ?? null);
            FileHandler::delete($clientAndProduct->image()->where('type', 'image')->first()->base_path ?? null);

            $clientAndProduct->delete();

            DB::commit();

            return redirect()->route('admin.client-and-products.index')->with('success', 'Client or product Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.client-and-products.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($clientAndProduct)
    {
        $clientAndProduct = ClientAndProduct::where('id', $clientAndProduct)->first();
        $clientAndProduct->update(['status' => !$clientAndProduct->status]);
        return response()->json(['status' => true]);

    }
}
