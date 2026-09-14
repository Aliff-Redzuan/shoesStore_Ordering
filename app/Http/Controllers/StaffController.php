<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\OrderItem;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Staff Dashboard
     */
    public function index()
    {
        $totalOrders = Order::count();

        $pendingOrders = Order::whereIn('status', [
            'pending',
            'processing'
        ])->count();

        $completedOrders = Order::whereIn('status', [
            'completed',
            'delivered'
        ])->count();

        $todayOrders = Order::whereDate(
            'created_at',
            today()
        )->count();

        $totalRevenue = Order::whereIn('status', [
            'completed',
            'delivered'
        ])->sum('total');

        $monthlyRevenue = Order::whereIn('status', [
            'completed',
            'delivered'
        ])
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->sum('total');

        $outOfStockProducts = Product::where(
            'stock',
            '<=',
            0
        )->get();

        $lowStockProducts = Product::where(
            'stock',
            '>',
            0
        )
        ->where(
            'stock',
            '<',
            5
        )
        ->get();

        $recentOrders = Order::with([
            'user',
            'items'
        ])
        ->latest()
        ->take(10)
        ->get();

        $processedToday = Order::whereDate(
            'updated_at',
            today()
        )
        ->whereIn('status', [
            'processing',
            'shipped',
            'delivered',
            'completed'
        ])
        ->count();

        $shippedToday = Order::whereDate(
            'updated_at',
            today()
        )
        ->where(
            'status',
            'shipped'
        )
        ->count();

        $returnedToday = Order::whereDate(
            'updated_at',
            today()
        )
        ->whereIn('status', [
            'returned',
            'refunded'
        ])
        ->count();

        $cancelledToday = Order::whereDate(
            'updated_at',
            today()
        )
        ->where(
            'status',
            'cancelled'
        )
        ->count();

        $stats = [
            'total_orders' => $totalOrders,
            'pending_orders' => $pendingOrders,
            'completed_orders' => $completedOrders,
            'today_orders' => $todayOrders,
            'processed_today' => $processedToday,
            'shipped_today' => $shippedToday,
            'returned_today' => $returnedToday,
            'cancelled_today' => $cancelledToday,
        ];

        return view('staff.index', compact(
            'stats',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'todayOrders',
            'totalRevenue',
            'monthlyRevenue',
            'outOfStockProducts',
            'lowStockProducts',
            'recentOrders'
        ));
    }


    /**
     * Staff Order Management
     */
    public function orders(Request $request)
    {
        $status = strtolower(
            trim($request->input('status', ''))
        );

        $search = trim(
            $request->input('search', '')
        );


        /*
        |--------------------------------------------------------------------------
        | Order Statistics
        |--------------------------------------------------------------------------
        */

        $stats = [
            'total' => Order::count(),

            'pending' => Order::where(
                'status',
                'pending'
            )->count(),

            'processing' => Order::where(
                'status',
                'processing'
            )->count(),

            'shipped' => Order::where(
                'status',
                'shipped'
            )->count(),

            'delivered' => Order::where(
                'status',
                'delivered'
            )->count(),

            'completed' => Order::where(
                'status',
                'completed'
            )->count(),

            'cancelled' => Order::where(
                'status',
                'cancelled'
            )->count(),
        ];


        /*
        |--------------------------------------------------------------------------
        | Order Query
        |--------------------------------------------------------------------------
        */

        $query = Order::query();


        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($status === 'pending') {

            $query->where(
                'status',
                'pending'
            );

        } elseif ($status === 'processing') {

            $query->where(
                'status',
                'processing'
            );

        } elseif ($status === 'shipped') {

            $query->where(
                'status',
                'shipped'
            );

        } elseif ($status === 'delivered') {

            $query->where(
                'status',
                'delivered'
            );

        } elseif ($status === 'completed') {

            $query->where(
                'status',
                'completed'
            );

        } elseif ($status === 'cancelled') {

            $query->where(
                'status',
                'cancelled'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $query->where(function ($q) use ($search) {

                $q->where(
                    'order_number',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'customer_name',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'customer_email',
                    'like',
                    '%' . $search . '%'
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Prepare Orders
        |--------------------------------------------------------------------------
        */

        $orders = $query
            ->latest()
            ->get()
            ->map(function ($order) {

                return [
                    'id' => $order->id,

                    'order_no' => $order->order_number,

                    'customer' => $order->customer_name,

                    'email' => $order->customer_email,

                    'date' => $order->created_at
                        ? $order->created_at->format('Y-m-d H:i')
                        : '',

                    'total' => $order->total,

                    'payment' => $order->payment_method,

                    'status' => strtolower(
                        trim($order->status)
                    ),
                ];
            });


        return view(
            'staff.orders',
            compact(
                'orders',
                'stats'
            )
        );
    }


    /**
     * Update Order Status
     */
    public function updateOrderStatus(
        Request $request,
        $id
    ) {

        $validated = $request->validate([

            'status' => [
                'required',
                'in:pending,processing,shipped,delivered,completed,cancelled'
            ],

            'notes' => [
                'nullable',
                'string',
                'max:1000'
            ],

        ]);


        $order = Order::findOrFail($id);


        $oldStatus = $order->status;


        $order->status =
            $validated['status'];


        if ($request->filled('notes')) {

            $order->notes =
                $validated['notes'];
        }


        $order->save();


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        if (class_exists(ActivityLog::class)) {

            ActivityLog::create([

                'user_id' =>
                    auth()->id(),

                'user_name' =>
                    auth()->user()->name ?? 'Staff',

                'action' =>
                    "Updated order #{$order->id} status "
                    . "from {$oldStatus} to {$order->status}",

                'ip_address' =>
                    $request->ip(),

            ]);
        }


        return redirect()
            ->route('staff.orders.index')
            ->with(
                'success',
                "Order #{$order->id} status updated successfully."
            );
    }


    /**
     * Staff Inventory Management
     */
    public function inventory(Request $request)
    {
        $category = strtolower(
            trim($request->input('category', ''))
        );

        $search = trim(
            $request->input('search', '')
        );


        /*
        |--------------------------------------------------------------------------
        | Inventory Statistics
        |--------------------------------------------------------------------------
        */

        $stats = [

            'total_items' =>
                Product::count(),

            'total_stock' =>
                Product::sum('stock'),

            'low_stock' =>
                Product::where(
                    'stock',
                    '>',
                    0
                )
                ->where(
                    'stock',
                    '<=',
                    5
                )
                ->count(),

            'out_of_stock' =>
                Product::where(
                    'stock',
                    '<=',
                    0
                )
                ->count(),

        ];


        /*
        |--------------------------------------------------------------------------
        | Product Query
        |--------------------------------------------------------------------------
        */

        $query = Product::query();


        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($category !== '') {

            $query->whereRaw(
                'LOWER(category) = ?',
                [$category]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Product Name Search
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $query->where(
                'name',
                'like',
                '%' . $search . '%'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Get Products
        |--------------------------------------------------------------------------
        */

        $products = $query
            ->latest()
            ->get()
            ->map(function ($product) {

                return [

                    'id' =>
                        $product->id,

                    'name' =>
                        $product->name,

                    'brand' =>
                        $product->brand,

                    'category' =>
                        $product->category,

                    'price' =>
                        $product->price,

                    'stock' =>
                        $product->stock,

                    'sizes' =>
                        $product->sizes,

                    'image' =>
                        $product->image,

                ];

            });


        return view(
            'staff.inventory',
            compact(
                'products',
                'stats'
            )
        );
    }


    /**
     * Update Product Stock and Price
     */
    public function updateStock(
        Request $request,
        $id
    ) {

        $validated = $request->validate([

            'stock' => [
                'required',
                'integer',
                'min:0'
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ]);


        $product =
            Product::findOrFail($id);


        $oldStock =
            $product->stock;


        $oldPrice =
            $product->price;


        $product->stock =
            $validated['stock'];


        if (
            array_key_exists(
                'price',
                $validated
            )
            &&
            $validated['price'] !== null
        ) {

            $product->price =
                $validated['price'];
        }


        /*
        |--------------------------------------------------------------------------
        | Update Product Image
        |--------------------------------------------------------------------------
        */

        $oldImage = $product->image;
        $newImageUploaded = false;

        if ($request->hasFile('image')) {

            $product->image =
                $request->file('image')->store(
                    'products',
                    'public'
                );

            $newImageUploaded = true;
        }


        $product->save();


        /*
        |--------------------------------------------------------------------------
        | Remove Old Image After Successful Save
        |--------------------------------------------------------------------------
        */

        if (
            $newImageUploaded
            &&
            !empty($oldImage)
            &&
            $oldImage !== $product->image
            &&
            Storage::disk('public')->exists($oldImage)
        ) {

            Storage::disk('public')->delete($oldImage);
        }


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        if (class_exists(ActivityLog::class)) {

            $changes = [];


            if (
                $oldStock !=
                $product->stock
            ) {

                $changes[] =
                    "stock from {$oldStock} "
                    . "to {$product->stock}";
            }


            if (
                $oldPrice !=
                $product->price
            ) {

                $changes[] =
                    "price from RM "
                    . number_format(
                        $oldPrice,
                        2
                    )
                    . " to RM "
                    . number_format(
                        $product->price,
                        2
                    );
            }


            if ($newImageUploaded) {

                $changes[] = 'product image updated';
            }


            $action = !empty($changes)

                ? "Updated {$product->name}: "
                    . implode(
                        ', ',
                        $changes
                    )

                : "Updated {$product->name}";


            ActivityLog::create([

                'user_id' =>
                    auth()->id(),

                'user_name' =>
                    auth()->user()->name ?? 'Staff',

                'action' =>
                    $action,

                'ip_address' =>
                    $request->ip(),

            ]);
        }


        return redirect()
            ->route('staff.inventory.index')
            ->with(
                'success',
                "Product {$product->name} updated successfully."
            );
    }


    /**
     * Add New Product
     */
    public function storeProduct(
        Request $request
    ) {

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'brand' => [
                'required',
                'string',
                'max:100'
            ],

            'category' => [
                'required',
                'string',
                'max:100'
            ],

            'price' => [
                'required',
                'numeric',
                'min:0'
            ],

            'stock' => [
                'required',
                'integer',
                'min:0'
            ],

            'sizes' => [
                'nullable',
                'string',
                'max:255'
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Store Product Image
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store(
                'products',
                'public'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */

        $product = Product::create([

            'name' =>
                $validated['name'],

            'brand' =>
                $validated['brand'],

            'category' =>
                $validated['category'],

            'price' =>
                $validated['price'],

            'stock' =>
                $validated['stock'],

            'sizes' =>
                $validated['sizes'] ?? null,

            'image' =>
                $imagePath,

        ]);


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        if (class_exists(ActivityLog::class)) {

            ActivityLog::create([

                'user_id' =>
                    auth()->id(),

                'user_name' =>
                    auth()->user()->name ?? 'Staff',

                'action' =>
                    "Added new product: {$product->name}",

                'ip_address' =>
                    $request->ip(),

            ]);
        }


        return redirect()
            ->route('staff.inventory.index')
            ->with(
                'success',
                "Product {$product->name} added successfully."
            );
    }


    /**
     * Staff Reports & Analytics
     */
    public function reports(Request $request)
    {
        $dateFrom =
            $request->input('date_from');

        $dateTo =
            $request->input('date_to');


        /*
        |--------------------------------------------------------------------------
        | Base Order Query
        |--------------------------------------------------------------------------
        */

        $orderQuery =
            Order::query();


        /*
        |--------------------------------------------------------------------------
        | Date Filters
        |--------------------------------------------------------------------------
        */

        if ($dateFrom) {

            $orderQuery->whereDate(
                'created_at',
                '>=',
                $dateFrom
            );
        }


        if ($dateTo) {

            $orderQuery->whereDate(
                'created_at',
                '<=',
                $dateTo
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Revenue
        |--------------------------------------------------------------------------
        */

        $totalRevenue =
            (clone $orderQuery)
                ->whereIn(
                    'status',
                    [
                        'completed',
                        'delivered'
                    ]
                )
                ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | Total Orders
        |--------------------------------------------------------------------------
        */

        $totalOrders =
            (clone $orderQuery)
                ->count();


        /*
        |--------------------------------------------------------------------------
        | Average Order Value
        |--------------------------------------------------------------------------
        */

        $averageOrderValue =
            $totalOrders > 0
                ? $totalRevenue / $totalOrders
                : 0;


        /*
        |--------------------------------------------------------------------------
        | Status Counts
        |--------------------------------------------------------------------------
        */

        $pendingOrders =
            (clone $orderQuery)
                ->where(
                    'status',
                    'pending'
                )
                ->count();


        $processingOrders =
            (clone $orderQuery)
                ->where(
                    'status',
                    'processing'
                )
                ->count();


        $shippedOrders =
            (clone $orderQuery)
                ->where(
                    'status',
                    'shipped'
                )
                ->count();


        $deliveredOrders =
            (clone $orderQuery)
                ->whereIn(
                    'status',
                    [
                        'delivered',
                        'completed'
                    ]
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | Top Selling Products
        |--------------------------------------------------------------------------
        */

        $itemQuery =
            OrderItem::query()
                ->join(
                    'orders',
                    'order_items.order_id',
                    '=',
                    'orders.id'
                );


        if ($dateFrom) {

            $itemQuery->whereDate(
                'orders.created_at',
                '>=',
                $dateFrom
            );
        }


        if ($dateTo) {

            $itemQuery->whereDate(
                'orders.created_at',
                '<=',
                $dateTo
            );
        }


        $topSellingProducts =
            $itemQuery
                ->select(

                    'order_items.product_name',

                    DB::raw(
                        'SUM(order_items.quantity) as units_sold'
                    ),

                    DB::raw(
                        'SUM(order_items.subtotal) as revenue'
                    )

                )
                ->groupBy(
                    'order_items.product_name'
                )
                ->orderByDesc(
                    'units_sold'
                )
                ->take(5)
                ->get();


        /*
        |--------------------------------------------------------------------------
        | Sales By Category
        |--------------------------------------------------------------------------
        */

        $categoryQuery =
            OrderItem::query()
                ->join(
                    'orders',
                    'order_items.order_id',
                    '=',
                    'orders.id'
                )
                ->join(
                    'products',
                    'order_items.product_id',
                    '=',
                    'products.id'
                );


        if ($dateFrom) {

            $categoryQuery->whereDate(
                'orders.created_at',
                '>=',
                $dateFrom
            );
        }


        if ($dateTo) {

            $categoryQuery->whereDate(
                'orders.created_at',
                '<=',
                $dateTo
            );
        }


        $categorySales =
            $categoryQuery
                ->select(

                    'products.category',

                    DB::raw(
                        'SUM(order_items.subtotal) as revenue'
                    )

                )
                ->groupBy(
                    'products.category'
                )
                ->orderByDesc(
                    'revenue'
                )
                ->get();


        /*
        |--------------------------------------------------------------------------
        | Category Percentages
        |--------------------------------------------------------------------------
        */

        $categoryTotal =
            $categorySales->sum('revenue');


        $categorySales =
            $categorySales->map(
                function ($category) use (
                    $categoryTotal
                ) {

                    $category->percentage =
                        $categoryTotal > 0

                            ? round(
                                (
                                    $category->revenue /
                                    $categoryTotal
                                ) * 100,
                                1
                            )

                            : 0;


                    return $category;
                }
            );


        /*
        |--------------------------------------------------------------------------
        | Revenue Trend
        |--------------------------------------------------------------------------
        */

        $revenueQuery =
            Order::query()
                ->whereIn(
                    'status',
                    [
                        'completed',
                        'delivered'
                    ]
                );


        if ($dateFrom) {

            $revenueQuery->whereDate(
                'created_at',
                '>=',
                $dateFrom
            );
        }


        if ($dateTo) {

            $revenueQuery->whereDate(
                'created_at',
                '<=',
                $dateTo
            );
        }


        $revenueByMonth =
            $revenueQuery
                ->select(

                    DB::raw(
                        'YEAR(created_at) as year'
                    ),

                    DB::raw(
                        'MONTH(created_at) as month'
                    ),

                    DB::raw(
                        'SUM(total) as revenue'
                    )

                )
                ->groupBy(
                    DB::raw(
                        'YEAR(created_at)'
                    ),
                    DB::raw(
                        'MONTH(created_at)'
                    )
                )
                ->orderBy('year')
                ->orderBy('month')
                ->get();


        $revenueLabels = [];

        $revenueData = [];


        foreach ($revenueByMonth as $revenue) {

            $revenueLabels[] =
                date(
                    'M Y',
                    mktime(
                        0,
                        0,
                        0,
                        $revenue->month,
                        1,
                        $revenue->year
                    )
                );


            $revenueData[] =
                (float) $revenue->revenue;
        }


        /*
        |--------------------------------------------------------------------------
        | Customer Satisfaction
        |--------------------------------------------------------------------------
        */

        $reviewQuery =
            Review::query();

        if ($dateFrom) {
            $reviewQuery->whereDate(
                'created_at',
                '>=',
                $dateFrom
            );
        }

        if ($dateTo) {
            $reviewQuery->whereDate(
                'created_at',
                '<=',
                $dateTo
            );
        }

        $reviewCount =
            $reviewQuery->count();

        $averageRating =
            $reviewCount > 0
                ? round(
                    (float) $reviewQuery->avg('rating'),
                    1
                )
                : 0;


        /*
        |--------------------------------------------------------------------------
        | Average Processing Time
        |--------------------------------------------------------------------------
        */

        $completedOrderRecords =
            (clone $orderQuery)
                ->whereIn(
                    'status',
                    [
                        'completed',
                        'delivered'
                    ]
                )
                ->get();


        $processingDays = [];


        foreach (
            $completedOrderRecords
            as $order
        ) {

            if (
                $order->created_at &&
                $order->updated_at
            ) {

                $processingDays[] =
                    $order->created_at
                        ->diffInHours(
                            $order->updated_at
                        ) / 24;
            }
        }


        $averageProcessingTime =
            count($processingDays) > 0

                ? round(
                    array_sum(
                        $processingDays
                    )
                    /
                    count(
                        $processingDays
                    ),
                    1
                )

                : 0;


        /*
        |--------------------------------------------------------------------------
        | Cancelled
        |--------------------------------------------------------------------------
        */

        $cancelledOrders =
            (clone $orderQuery)
                ->where(
                    'status',
                    'cancelled'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | Returned
        |--------------------------------------------------------------------------
        */

        $returnedOrders =
            (clone $orderQuery)
                ->whereIn(
                    'status',
                    [
                        'returned',
                        'refunded'
                    ]
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | Return Rate
        |--------------------------------------------------------------------------
        */

        $returnRate =
            $totalOrders > 0

                ? round(
                    (
                        $returnedOrders /
                        $totalOrders
                    ) * 100,
                    1
                )

                : 0;


        /*
        |--------------------------------------------------------------------------
        | Delivery Rate
        |--------------------------------------------------------------------------
        */

        $onTimeDeliveryRate =
            $totalOrders > 0

                ? round(
                    (
                        $deliveredOrders /
                        $totalOrders
                    ) * 100,
                    1
                )

                : 0;


        if ($onTimeDeliveryRate < 0) {
            $onTimeDeliveryRate = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | Report Stats
        |--------------------------------------------------------------------------
        */

        $stats = [

            'total_revenue' =>
                $totalRevenue,

            'total_orders' =>
                $totalOrders,

            'average_order_value' =>
                $averageOrderValue,

            'pending' =>
                $pendingOrders,

            'processing' =>
                $processingOrders,

            'shipped' =>
                $shippedOrders,

            'delivered' =>
                $deliveredOrders,

            'average_processing_time' =>
                $averageProcessingTime,

            'on_time_delivery_rate' =>
                $onTimeDeliveryRate,

            'return_rate' =>
                $returnRate,

        ];


        return view(
            'staff.reports',
            compact(

                'stats',

                'totalRevenue',

                'totalOrders',

                'averageOrderValue',

                'pendingOrders',

                'processingOrders',

                'shippedOrders',

                'deliveredOrders',

                'topSellingProducts',

                'categorySales',

                'revenueLabels',

                'revenueData',

                'averageProcessingTime',

                'onTimeDeliveryRate',

                'returnRate',

                'averageRating',
                'reviewCount',

                'dateFrom',

                'dateTo'

            )
        );
    }
}