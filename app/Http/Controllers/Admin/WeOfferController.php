<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\WeOfferRequest;
use App\Models\WeOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WeOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:we offer create|we offer edit|we offer delete|we offer status', ['only' => ['index']]);
        $this->middleware('permission:we offer create')->only(['create', 'store']);
        $this->middleware('permission:we offer edit')->only(['edit', 'update']);
        $this->middleware('permission:we offer delete')->only(['destroy']);
        $this->middleware('permission:we offer status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all trusted Companies
        $weOffers = WeOffer::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $weOffers = $weOffers->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword);
        }

        $weOffers = $weOffers->paginate($perPage);

        //Show All Slides
        return view('admin.pages.we_offers.index', compact('weOffers'));
    }

    public function create()
    {
        return view('admin.pages.we_offers.create');
    }

    public function store(WeOfferRequest $request)
    {
        DB::beginTransaction();

        try {

            $weOffer = WeOffer::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'we_offers', ['width' => '800', 'height' => '600']);

                $weOffer->image()->create([
                    'url' => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type' => 'lg',
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'We Offer Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(WeOffer $weOffer)
    {
        return view('admin.pages.we_offers.edit', compact('weOffer'));
    }

    public function update(WeOfferRequest $request, WeOffer $weOffer)
    {
        DB::beginTransaction();

        try {

            $weOffer->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'we_offers', ['width' => '800', 'height' => '600']);

                FileHandler::delete($weOffer->image->base_path ?? null);

            }else{
                $image_name = $weOffer->image->base_path;
            }

            $weOffer->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'We Offer Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(WeOffer $weOffer)
    {
        DB::beginTransaction();

        try {
            FileHandler::delete($weOffer->image->base_path ?? null);
            $weOffer->delete();
            DB::commit();
            return redirect()->route('admin.we-offers.index')->with('success', 'We Offers Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.we-offers.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($offer)
    {
        $weOffer = WeOffer::where('id', $offer)->first();
        $weOffer->update(['status' => !$weOffer->status]);
        return response()->json(['status' => true]);
    }
}
