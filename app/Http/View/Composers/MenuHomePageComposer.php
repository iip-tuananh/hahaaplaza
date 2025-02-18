<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Banner;
use App\Model\Admin\Category;
use App\Model\Admin\PostCategory;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\OrderRevenueDetail;

class MenuHomePageComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $productCategories = Category::query()->with([
            'childs' => function ($query) {
                $query->with(['childs']);
            }
        ])
        ->where(['type' => 1, 'parent_id' => 0])
        ->orderBy('sort_order')
        ->get();

        $user = Auth::guard('client')->user();
        if ($user) {
            $user_avatar = $user->image ? $user->image->path : '';
        } else {
            $user_avatar = '';
        }

        $postCategories = PostCategory::query()->where(['parent_id' => 0, 'show_home_page' => 1])->latest()->get();

        $view->with(['productCategories' => $productCategories, 'postCategories' => $postCategories, 'user_avatar' => $user_avatar]);
    }
}
