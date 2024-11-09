<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Models\Market\CommonDiscount;
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
        return view('admin.market.discount.amazing');
    }
    public function amazingSaleCreate()
    {
        return view('admin.market.discount.amazing-create');
    }
}
