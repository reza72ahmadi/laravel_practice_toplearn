<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function copan()
    {
        return view('admin.market.discount.copan');
    }
    public function copanCreate()
    {
        return view('admin.market.discount.copan-create');
    }
    //----------start commonDiscount---------------------------------------------------
    public function commonDiscount()
    {
        $commomDiscounts = CommonDiscount::all();
        return view('admin.market.discount.common', compact('commomDiscounts'));
    }
    public function commonDiscountCreate()
    {
        return view('admin.market.discount.common-create');
    }

    //update commonDiscountStore 

    public function commonDiscountStore(CommonDiscountRequest $request)
    {
        $inputs = $request->all();
        if (isset($request->start_date)) {
            $realTimeStamp = substr($request->start_date, 0, 10);
            $inputs['start_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }
        if (isset($request->end_date)) {
            $realTimeStamp = substr($request->end_date, 0, 10);
            $inputs['end_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }

        CommonDiscount::create($inputs);
        return redirect()->route('admin.market.discount.commonDiscount')
            ->with('swal-success', 'تخفیف عمومی شما موفقانه ایجاد شد');
    }

    public function commonDiscountEdit(CommonDiscount $commonDiscount)
    {
        return view('admin.market.discount.common-edit', compact('commonDiscount'));
    }

    //update commonDiscountUpdate
    public function commonDiscountUpdate(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
        $inputs = $request->all();
        if (isset($request->start_date)) {
            $realTimeStamp = substr($request->start_date, 0, 10);
            $inputs['start_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }
        if (isset($request->end_date)) {
            $realTimeStamp = substr($request->end_date, 0, 10);
            $inputs['end_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }

        $commonDiscount->update($inputs);
        return redirect()->route('admin.market.discount.commonDiscount')
            ->with('swal-success', 'تخفیف عمومی شما موفقانه ویرایش شد');
    }
    //delete commonDiscountDesroy

    public function commonDiscountDesroy(CommonDiscount $commonDiscount)
    {
        $commonDiscount->delete();
        return redirect()->route('admin.market.discount.commonDiscount')
            ->with('swal-success', 'تخفیف عمومی شما موفقانه حذف شد');
    }


    //------------------------------------------------------
    public function amazingSale()
    {
        $amazingSales = AmazingSale::all();
        return view('admin.market.discount.amazing', compact('amazingSales'));
    }
    public function amazingSaleCreate()
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-create', compact('products'));
    }
    public function amazingSaleStore(AmazingSaleRequest $request)
    {
        $inputs = $request->all();
        if (isset($request->start_date)) {
            $realTimeStamp = substr($request->start_date, 0, 10);
            $inputs['start_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }
        if (isset($request->end_date)) {
            $realTimeStamp = substr($request->end_date, 0, 10);
            $inputs['end_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }
        AmazingSale::create($inputs);
        return redirect()->route('admin.market.discount.amazingSale')
            ->with('swal-success', ' فروش شگفت انگیز شما موفقانه ثبت شد');
    }

    public function amazingSaleEdit(AmazingSale $amazingSale)
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-edit', compact('amazingSale', 'products'));
    }

    public function amazingSaleUpdate(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
        $inputs = $request->all();
        if (isset($request->start_date)) {
            $realTimeStamp = substr($request->start_date, 0, 10);
            $inputs['start_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }
        if (isset($request->end_date)) {
            $realTimeStamp = substr($request->end_date, 0, 10);
            $inputs['end_date'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }
        $amazingSale->update($inputs);
        return redirect()->route('admin.market.discount.amazingSale')
            ->with('swal-success', ' فروش شگفت انگیز شما موفقانه ویرایش شد');
    }

    public function amazingSaleDesroy(AmazingSale $amazingSale)
    {
        $amazingSale->delete();
        return redirect()->route('admin.market.discount.amazingSale')
            ->with('swal-success', ' فروش شگفت انگیز شما موفقانه حذف شد');
    }
}
