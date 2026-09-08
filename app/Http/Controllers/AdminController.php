<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * =========================================================
     * ADMIN DASHBOARD
     * =========================================================
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Staff
        |--------------------------------------------------------------------------
        */

        $staffMembers = User::whereIn('role', [
            'staff',
            'inventory_manager',
            'fulfillment'
        ])
        ->orderBy('name')
        ->get();

        $totalStaff = $staffMembers->count();

        $activeStaff = $staffMembers
            ->where('is_active', true)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Revenue
        |--------------------------------------------------------------------------
        */

        $totalRevenue = Order::where('status', 'completed')
            ->sum('total');

        $monthlyRevenue = Order::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | Orders
        |--------------------------------------------------------------------------
        */

        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')
            ->count();

        $completedOrders = Order::where('status', 'completed')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Recent Activity Logs
        |--------------------------------------------------------------------------
        */

        $logs = ActivityLog::latest()
            ->take(10)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        return view('admin.index', compact(
            'staffMembers',
            'totalStaff',
            'activeStaff',
            'totalRevenue',
            'monthlyRevenue',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'logs'
        ));
    }


    /**
     * =========================================================
     * STAFF MANAGEMENT
     * =========================================================
     */
    public function manage()
    {
        $staffMembers = User::whereIn('role', [
            'staff',
            'inventory_manager',
            'fulfillment'
        ])
        ->orderBy('name')
        ->get();

        return view('admin.manage', compact('staffMembers'));
    }


    /**
     * =========================================================
     * CREATE STAFF ACCOUNT
     * =========================================================
     */
    public function staffStore(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validate input
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email'
            ],

            'password' => [
                'required',
                'string',
                'min:8'
            ],

            'role' => [
                'required',
                'in:staff,inventory_manager,fulfillment'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Create staff
        |--------------------------------------------------------------------------
        */

        $staff = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_active' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([
            'user_id' => auth()->id(),

            'user_name' => auth()->user()->name ?? 'Admin',

            'action' => "Created staff account for {$staff->name}",

            'ip_address' => $request->ip(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.manage')
            ->with(
                'success',
                'Staff account created successfully.'
            );
    }


    /**
     * =========================================================
     * ENABLE / DISABLE STAFF ACCOUNT
     * =========================================================
     */
    public function staffToggle($id)
    {
        /*
        |--------------------------------------------------------------------------
        | Find Staff
        |--------------------------------------------------------------------------
        */

        $staff = User::whereIn('role', [
            'staff',
            'inventory_manager',
            'fulfillment'
        ])
        ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Toggle status
        |--------------------------------------------------------------------------
        */

        $staff->is_active = !$staff->is_active;

        $staff->save();


        /*
        |--------------------------------------------------------------------------
        | Determine action
        |--------------------------------------------------------------------------
        */

        $action = $staff->is_active
            ? "Enabled staff account for {$staff->name}"
            : "Disabled staff account for {$staff->name}";


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        ActivityLog::create([
            'user_id' => auth()->id(),

            'user_name' => auth()->user()->name ?? 'Admin',

            'action' => $action,

            'ip_address' => request()->ip(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.manage')
            ->with(
                'success',
                $staff->is_active
                    ? 'Staff account enabled successfully.'
                    : 'Staff account disabled successfully.'
            );
    }


    /**
     * =========================================================
     * ACTIVITY AUDIT LOGS
     * =========================================================
     */
    public function logs()
    {
        /*
        |--------------------------------------------------------------------------
        | Get all logs
        |--------------------------------------------------------------------------
        */

        $logs = ActivityLog::latest()
            ->paginate(20);


        /*
        |--------------------------------------------------------------------------
        | Display
        |--------------------------------------------------------------------------
        */

        return view('admin.logs', compact('logs'));
    }


    /**
     * =========================================================
     * ADMIN REPORTS
     * =========================================================
     */
public function reports(Request $request)
{
    // Selected reporting period
    $period = (int) $request->get('period', 30);

    // Allowed periods
    if (!in_array($period, [7, 30, 90, 365])) {
        $period = 30;
    }

    /*
    |--------------------------------------------------------------------------
    | Current Period
    |--------------------------------------------------------------------------
    */

    $startDate = now()->subDays($period);

    /*
    |--------------------------------------------------------------------------
    | Previous Period
    |--------------------------------------------------------------------------
    */

    $previousStartDate = now()->subDays($period * 2);
    $previousEndDate = now()->subDays($period);


    /*
    |--------------------------------------------------------------------------
    | Current Revenue
    |--------------------------------------------------------------------------
    */

    $totalRevenue = Order::where('status', 'completed')
        ->whereDate('created_at', '>=', $startDate)
        ->sum('total');


    /*
    |--------------------------------------------------------------------------
    | Previous Revenue
    |--------------------------------------------------------------------------
    */

    $previousRevenue = Order::where('status', 'completed')
        ->whereDate('created_at', '>=', $previousStartDate)
        ->whereDate('created_at', '<', $previousEndDate)
        ->sum('total');


    /*
    |--------------------------------------------------------------------------
    | Revenue Percentage Change
    |--------------------------------------------------------------------------
    */

    if ($previousRevenue > 0) {
        $revenueChange = (($totalRevenue - $previousRevenue) / $previousRevenue) * 100;
    } else {
        $revenueChange = $totalRevenue > 0 ? 100 : 0;
    }


    /*
    |--------------------------------------------------------------------------
    | Total Orders
    |--------------------------------------------------------------------------
    */

    $totalOrders = Order::whereDate('created_at', '>=', $startDate)
        ->count();


    /*
    |--------------------------------------------------------------------------
    | Completed Orders
    |--------------------------------------------------------------------------
    */

    $completedOrders = Order::where('status', 'completed')
        ->whereDate('created_at', '>=', $startDate)
        ->count();


    /*
    |--------------------------------------------------------------------------
    | Pending Orders
    |--------------------------------------------------------------------------
    */

    $pendingOrders = Order::where('status', 'pending')
        ->whereDate('created_at', '>=', $startDate)
        ->count();


    /*
    |--------------------------------------------------------------------------
    | Units Sold
    |--------------------------------------------------------------------------
    */

    $unitsSold = \DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->where('orders.status', 'completed')
        ->whereDate('orders.created_at', '>=', $startDate)
        ->sum('order_items.quantity');


    /*
    |--------------------------------------------------------------------------
    | Previous Units Sold
    |--------------------------------------------------------------------------
    */

    $previousUnitsSold = \DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->where('orders.status', 'completed')
        ->whereDate('orders.created_at', '>=', $previousStartDate)
        ->whereDate('orders.created_at', '<', $previousEndDate)
        ->sum('order_items.quantity');


    /*
    |--------------------------------------------------------------------------
    | Units Sold Percentage Change
    |--------------------------------------------------------------------------
    */

    if ($previousUnitsSold > 0) {
        $unitsChange = (($unitsSold - $previousUnitsSold) / $previousUnitsSold) * 100;
    } else {
        $unitsChange = $unitsSold > 0 ? 100 : 0;
    }


    /*
    |--------------------------------------------------------------------------
    | Average Order Value
    |--------------------------------------------------------------------------
    */

    $averageOrderValue = Order::where('status', 'completed')
        ->whereDate('created_at', '>=', $startDate)
        ->avg('total');


    /*
    |--------------------------------------------------------------------------
    | Sales By Category
    |--------------------------------------------------------------------------
    */

    $salesByCategory = \DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.status', 'completed')
        ->whereDate('orders.created_at', '>=', $startDate)
        ->select(
            'products.category',
            \DB::raw('SUM(order_items.quantity * order_items.price) as revenue'),
            \DB::raw('SUM(order_items.quantity) as units_sold')
        )
        ->groupBy('products.category')
        ->orderByDesc('revenue')
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Calculate Category Percentages
    |--------------------------------------------------------------------------
    */

    $categoryTotalRevenue = $salesByCategory->sum('revenue');

    $salesByCategory = $salesByCategory->map(function ($category) use ($categoryTotalRevenue) {

        $category->percentage = $categoryTotalRevenue > 0
            ? ($category->revenue / $categoryTotalRevenue) * 100
            : 0;

        return $category;
    });


    /*
    |--------------------------------------------------------------------------
    | Top Products
    |--------------------------------------------------------------------------
    */

    $topProducts = \DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.status', 'completed')
        ->whereDate('orders.created_at', '>=', $startDate)
        ->select(
            'products.id',
            'products.name',
            \DB::raw('SUM(order_items.quantity) as units_sold'),
            \DB::raw('SUM(order_items.quantity * order_items.price) as revenue')
        )
        ->groupBy('products.id', 'products.name')
        ->orderByDesc('units_sold')
        ->take(10)
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Sales By Date
    |--------------------------------------------------------------------------
    */

    $salesByDate = Order::where('status', 'completed')
        ->whereDate('created_at', '>=', $startDate)
        ->selectRaw(
            'DATE(created_at) as date,
             COUNT(*) as order_count,
             SUM(total) as revenue'
        )
        ->groupBy('date')
        ->orderBy('date')
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Activity Count
    |--------------------------------------------------------------------------
    */

    $activityCount = ActivityLog::whereDate(
        'created_at',
        '>=',
        $startDate
    )->count();


    /*
    |--------------------------------------------------------------------------
    | Return View
    |--------------------------------------------------------------------------
    */

    return view('admin.reports', compact(
        'period',
        'startDate',
        'totalRevenue',
        'revenueChange',
        'totalOrders',
        'completedOrders',
        'pendingOrders',
        'unitsSold',
        'unitsChange',
        'averageOrderValue',
        'salesByCategory',
        'topProducts',
        'salesByDate',
        'activityCount'
    ));
}
}
