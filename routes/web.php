<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\FronendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Models\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// categories route
Route::get('categories', [CategoryController::class,'categories'])->middleware(['auth', 'verified'])->name('categories');
Route::get('categories/add', [CategoryController::class,'add_category'])->middleware(['auth', 'verified'])->name('add_category');
Route::post('categories/add/post', [CategoryController::class,'add_category_post'])->middleware(['auth', 'verified'])->name('add_category_post');
Route::get('categories/remove/{id}',[CategoryController::class,'category_remove'])->middleware(['auth', 'verified'])->name('category_remove');
Route::get('categories/edit/{id}',[CategoryController::class,'category_edit'])->middleware(['auth', 'verified'])->name('category_edit');
Route::post('categories/edit/post',[CategoryController::class,'category_edit_post'])->middleware(['auth', 'verified'])->name('category_edit_post');
Route::get('categories/trush',[CategoryController::class,'category_trush'])->middleware(['auth', 'verified'])->name('category_trush');
Route::get('categories/restore/{id}',[CategoryController::class,'category_restore'])->middleware(['auth', 'verified'])->name('category_restore');
Route::get('categories/delete/{id}',[CategoryController::class,'category_delete'])->middleware(['auth', 'verified'])->name('category_delete');

// subcategories route
Route::get('subcategoies',[SubcategoryController::class,'subcategories'])->middleware(['auth', 'verified'])->name('subcategories');
Route::get('subcategoies/add',[SubcategoryController::class,'subcategories_add'])->middleware(['auth', 'verified'])->name('subcategories_add');
Route::post('subcategories/add/post',[SubcategoryController::class,'subcategories_add_post'])->middleware(['auth', 'verified'])->name('subcategories_add_post');
Route::get('subcategories/edit/{id}',[SubcategoryController::class,'subcategories_edit'])->middleware(['auth', 'verified'])->name('subcategories_edit');
Route::post('subcategoies/edit/post',[SubcategoryController::class,'subcategories_edit_post'])->middleware(['auth', 'verified'])->name('subcategories_edit_post');
Route::get('subcategoies/remove/{id}',[SubcategoryController::class,'subcategories_remove'])->middleware(['auth', 'verified'])->name('subcategories_remove');
Route::get('subcategoies/trush/',[SubcategoryController::class,'subcategories_trush'])->middleware(['auth', 'verified'])->name('subcategories_trush');
Route::get('subcategoies/restore/{id}',[SubcategoryController::class,'subcategories_restore'])->middleware(['auth', 'verified'])->name('subcategories_restore');
Route::get('subcategoies/delete/{id}',[SubcategoryController::class,'subcategories_delete'])->middleware(['auth', 'verified'])->name('subcategories_delete');

// Colors Route
Route::get('colors', [ColorsController::class,'colors_view'])->middleware(['auth', 'verified'])->name('colors_view');
Route::get('colors/add', [ColorsController::class,'color_add'])->middleware(['auth', 'verified'])->name('color_add');
Route::post('colors/add/post', [ColorsController::class,'color_add_post'])->middleware(['auth', 'verified'])->name('color_add_post');
Route::get('colors/remove/{id}', [ColorsController::class,'color_remove'])->middleware(['auth', 'verified'])->name('color_remove');

// size Route
Route::get('sizes', [SizeController::class,'sizes_view'])->middleware(['auth', 'verified'])->name('sizes_view');
Route::get('sizes/add', [SizeController::class,'size_add'])->middleware(['auth', 'verified'])->name('size_add');
Route::post('sizes/add/post', [SizeController::class,'size_add_post'])->middleware(['auth', 'verified'])->name('size_add_post');
Route::get('sizes/remove/{id}', [SizeController::class,'size_remove'])->middleware(['auth', 'verified'])->name('size_remove');

// product Route
Route::get('products', [ProductController::class,'products'])->middleware(['auth', 'verified'])->name('products');
Route::get('product/add', [ProductController::class,'add_product'])->middleware(['auth', 'verified'])->name('add_product');
Route::post('product/add/post', [ProductController::class,'add_product_post'])->middleware(['auth', 'verified'])->name('add_product_post');
Route::get('api/get-subcats-list/{id}', [ProductController::class,'get_subcats_list'])->middleware(['auth', 'verified'])->name('get_subcats_list');
Route::get('product/edit/{id}', [ProductController::class,'product_edit'])->middleware(['auth', 'verified'])->name('product_edit');
Route::post('product/edit/post', [ProductController::class,'product_edit_post'])->middleware(['auth', 'verified'])->name('product_edit_post');
Route::get('product/remove/{id}', [ProductController::class,'product_remove'])->middleware(['auth', 'verified'])->name('product_remove');
Route::get('product/trush/', [ProductController::class,'product_trush'])->middleware(['auth', 'verified'])->name('product_trush');
Route::post('products/remove/selected', [ProductController::class,'product_remove_selected'])->middleware(['auth', 'verified'])->name('product_remove_selected');
Route::get('product/restore/{id}', [ProductController::class,'product_restore'])->middleware(['auth', 'verified'])->name('product_restore');
Route::get('product/delete/{id}', [ProductController::class,'product_delete'])->middleware(['auth', 'verified'])->name('product_delete');
Route::post('products/trush/selected', [ProductController::class,'product_trush_selected'])->middleware(['auth', 'verified'])->name('product_trush_selected');
Route::get('products/atribute/delete/{product_id}/{attribute_id}', [ProductController::class,'product_attr_delete'])->middleware(['auth', 'verified'])->name('product_attr_delete');
Route::get('products/gallery/delete/{product_id}/{image_id}', [ProductController::class,'product_gallery_delete'])->middleware(['auth', 'verified'])->name('product_gallery_delete');

//Coupon Route
Route::get('coupon/trash', [CouponController::class,'trashed'])->middleware(['auth', 'verified'])->name('coupon.trashed');
Route::get('coupon/restore/{id}', [CouponController::class,'restore'])->middleware(['auth', 'verified'])->name('coupon.restore');
Route::resource('coupon', CouponController::class)->middleware(['auth', 'verified']);

// Role Route
Route::post('role/assign/user/post', [RoleController::class,'assignUserStore'])->middleware(['auth', 'verified'])->name('user.assign.sotre');
Route::get('role/assign/user', [RoleController::class,'assignUser'])->middleware(['auth', 'verified'])->name('role.assign.user');
Route::get('role/user/add', [RoleController::class,'addAdmin'])->middleware(['auth', 'verified'])->name('role.admin.add');
Route::post('role/user/add', [RoleController::class,'addAdminStore'])->middleware(['auth', 'verified'])->name('role.admin.store');
Route::get('role/user/delete/{id}', [RoleController::class,'addAdminDelete'])->middleware(['auth', 'verified'])->name('role.admin.destroy');
Route::resource('role', RoleController::class)->middleware(['auth', 'verified']);


// admin profile Route
Route::get('user/profile/{id}', [ProfileController::class,'UserProfile'])->middleware(['auth', 'verified'])->name('user.profile');
Route::post('user/profile/image-update', [ProfileController::class,'UserProfileImageUpdate'])->middleware(['auth', 'verified'])->name('user.profile.image.update');
Route::post('user/profile/name-update', [ProfileController::class,'UserProfileNameUpdate'])->middleware(['auth', 'verified'])->name('user.profile.name.update');
Route::post('user/profile/description-update', [ProfileController::class,'UserProfileDiscUpdate'])->middleware(['auth', 'verified'])->name('user.profile.description.update');
Route::post('user/profile/skils-update', [ProfileController::class,'UserProfileSkilsUpdate'])->middleware(['auth', 'verified'])->name('user.profile.skils.update');
Route::post('user/profile/address-update', [ProfileController::class,'UserProfileAddressUpdate'])->middleware(['auth', 'verified'])->name('user.profile.address.update');
Route::post('user/profile/education-add', [ProfileController::class,'UserProfileEducationAdd'])->middleware(['auth', 'verified'])->name('user.profile.education.add');
Route::get('user/profile/education-delete/{id}/{user}', [ProfileController::class,'UserProfileEducationDelete'])->middleware(['auth', 'verified'])->name('user.profile.education.delete');


// Frontend Route
Route::get('/', [FronendController::class,'landing'])->name('landing');
Route::get('/product/slug/{id}/{slug}', [FronendController::class,'productDetails'])->name('productDetails');
Route::get('/get/color/size/{product_id}/{color_id}', [FronendController::class,'GetColorSize'])->name('GetColorSize');

// Cart Route
Route::get('carts', [CartController::class,'Cart'])->name('Cart');
Route::get('carts/{coupon}', [CartController::class,'Cart']);
Route::post('/carts/post', [CartController::class,'cartPost'])->name('cartPost');

// Checkout Route
Route::get('/checkout', [CheckoutController::class,'checkout'])->name('checkout');
Route::post('get/city/list', [CheckoutController::class,'get_city_list'])->name('get_city_list');
Route::post('checkout/store', [CheckoutController::class,'store'])->name('checkout.store');

// Customer Orders
Route::get('my-orders',[FronendController::class, 'CoustomerOrders'])->middleware(['auth', 'verified', 'iscustomer'])->name('customer.orders');
Route::get('my-orders/customer/invoice/download/{id}',[FronendController::class, 'CoustomerOrdersInvoiceDownload'])->middleware(['auth', 'verified', 'iscustomer'])->name('customer.orders.invoice.download');








require __DIR__.'/auth.php';
