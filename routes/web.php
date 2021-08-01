<?php
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CardComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\admin\AdminDashboardComponent;
use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminAddCategoryComponent;
use App\Http\Livewire\admin\AdminEditCategoryComponent;
use App\Http\Livewire\admin\AdminProductComponent;
use App\Http\Livewire\admin\AdminHomeSliderComponent;
use App\Http\Livewire\admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\admin\AdminAddProductComponent;
use App\Http\Livewire\admin\AdminSaleComponent;
use App\Http\Livewire\admin\AdminCouponsComponent;
use App\Http\Livewire\admin\AdminOrderComponent;
use App\Http\Livewire\admin\AdminOrderDetailsComponent;
use App\Http\Livewire\admin\AdminAddCouponComponent;
use App\Http\Livewire\admin\AdminEditCouponComponent;
use App\Http\Livewire\admin\AdminHomeCategoryComponent;
use App\Http\Livewire\admin\AdminEditProductComponent;
use App\Http\Livewire\admin\AdminContactComponent;
use App\Http\Livewire\admin\AdminSettingComponent;
use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\user\UserOrdersComponent;
use App\Http\Livewire\user\UserChangePasswordComponent;
use App\Http\Livewire\user\UserReviewComponent;
use App\Http\Livewire\user\UserOrderDetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\HeaderSearchComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class);

Route::get('/card',CardComponent::class)->name('product.cart');

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');

Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');

Route::get('/contact-us',ContactComponent::class)->name('contact');

Route::get('/about-us',AboutComponent::class)->name('about');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

// for user
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');

Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');

Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');

Route::get('/user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');

Route::get('/user/change-passord',UserChangePasswordComponent::class)->name('user.changepassword');

    
});

//for admin
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');

Route::get('/admin/category',AdminCategoryComponent::class)->name('admin.category');

Route::get('/admin/addcategory',AdminAddCategoryComponent::class)->name('admin.addcategory');

Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');

Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');

Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');

Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');

Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');

Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');

Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');

Route::get('/admin/coupon/add',AdminAddCouponComponent::class)->name('admin.addcoupon');

Route::get('/admin/coupon/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');

Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');

Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.ordersdetails');

Route::get('/admin/contact-us',AdminContactComponent::class)->name('admin.contact');

Route::get('/admin/settings',AdminSettingComponent::class)->name('admin.settings');
});