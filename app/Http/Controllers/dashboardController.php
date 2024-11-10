<?php

namespace App\Http\Controllers;

use Hash;
use Exception;
use App\Models\User;
use App\Models\store;
use App\Models\product;
use App\Models\category;
use App\Models\SaleProduct;
use Illuminate\Http\Request;
use App\Models\QrCodeSetting;
use App\Models\SaleProductData;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $products = product::get();
        View::share('products', $products);
    }
    public function adminDashboard()
    {
        return view('dashboard.index');
    }
    // Store methods
    public function storeList()
    {
        $stores = store::get();
        return view('dashboard.store_list', compact('stores'));
    }
    public function storeAdd()
    {
        return view('dashboard.store_add');
    }
    public function storeSave(Request $request)
    {
        try{
            $image = '';
            if ($request->hasFile('image')) {
                $image = Storage::disk('storage')->put('images', $request->file('image'));
            }
            $store =  store::Create([
                'name' => $request->name,
                'code' => $request->code,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'receipt_header' => $request->receipt_header,
                'image' => $image,
            ]);
            if ($store) {
                return redirect('store_list')->with([
                    'message' => 'Data has been saved successfully!',
                    'title' => 'Saved',
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'Data has not been saved successfully!',
                    'title' => 'fail',
                    'type' => 'fail'
                ]);
            }
        }
        catch(Exception $ex){
             // Handle any error that occurs during the process
             return redirect()->back()->with([
                'message' => 'Store adding failed. Error: ' . $ex->getMessage(),
                'title' => 'Failed',
                'type' => 'danger'
            ])->withInput();
        }
    }
    public function storeEdit($id)
    {
        $store = store::find($id);
        return view('dashboard.store_edit', compact('store'));
    }
    public function storeUpdate(Request $request)
    {
        try {
            $store = Store::findOrFail($request->id);
            $image = $store->image; // Keep the existing image if none is uploaded

            if ($request->hasFile('image')) {
                // Delete the previous image if it exists
                if ($image && Storage::disk('storage')->exists($image)) {
                    Storage::disk('storage')->delete($image);
                }
                if ($request->hasFile('image')) {
                    $image = Storage::disk('storage')->put('images', $request->file('image'));
                }
            }
            // Update the store record
            $store->update([
                'name' => $request->name,
                'code' => $request->code,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'receipt_header' => $request->receipt_header,
                'image' => $image,
            ]);


            // Redirect with success message
            return redirect('store_list')->with([
                'message' => 'Data has been updated successfully!',
                'title' => 'Success',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            // Handle any error that occurs during the process
            return redirect()->back()->with([
                'message' => 'Data could not be updated. Error: ' . $e->getMessage(),
                'title' => 'Failed',
                'type' => 'danger'
            ])->withInput();
        }
    }
    public function deleteStore($id)
    {
        $store = Store::find($id);
        if ($store) {
            $oldStoreImg = $store->image; // assuming 'image' is the path like 'images/filename.jpg'
            // Check if the image exists and delete it from the storage disk
            if ($oldStoreImg && Storage::disk('storage')->exists($oldStoreImg)) {
                Storage::disk('storage')->delete($oldStoreImg);
            }
            // Delete the store from the database
            $store->delete();
            return redirect()->back()->with(['success' => 'Store deleted successfully.']);
        }
    }
    // POS method
    public function pos()
    {
        $QrCodeSetting = QrCodeSetting::get()->first();
        $products = product::get();
        return view('dashboard.pos', compact('products', 'QrCodeSetting'));
    }
    // Product methods
    public function searchProduct(Request $request)
    {
        $products = product::where('name', 'LIKE', '%' . $request->search . '%')->orwhere('code', 'LIKE', '%' . $request->search . '%')->get();
        return view('dashboard.search_product', compact('products'));
    }
    public function productList()
    {
        $products = product::with('category')->get();
        return view('dashboard.product_list', compact('products'));
    }
    public function productAdd()
    {
        $categories = category::get();
        return view('dashboard.product_add', compact('categories'));
    }
    public function productStore(Request $request)
    {
        $image = '';
        if ($request->hasFile('image')) {
            $image = Storage::disk('storage')->put('images', $request->file('image'));
        }
        $product =  product::Create([
            'type' => $request->type,
            'name' => $request->name,
            'code' => $request->code,
            'bar_code_symbol' => $request->bar_code_symbol,
            'category_id' => $request->category,
            'cost' => $request->cost,
            'price' => $request->price,
            'product_tax' => $request->product_tax,
            'tax_method' => $request->tax_method,
            'quantity' => $request->quantity,
            'details' => strip_tags($request->details),
            'image' => $image,
        ]);
        if ($product) {
            return redirect('product_list')->with([
                'message' => 'Data has been saved successfully!',
                'title' => 'Saved',
                'type' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Data has not been saved successfully!',
                'title' => 'fail',
                'type' => 'fail'
            ]);
        }
    }
    public function productEdit($id)
    {
        $product = product::find($id);
        return view('dashboard.product_edit', compact('product'));
    }
    public function productImport()
    {
        return view('dashboard.product_import');
    }
    public function productImportProcess(Request $request)
    {
        if ($request->hasFile('import_product')) {
            $file = $request->file('import_product');
            $data = array_map('str_getcsv', file($file->getRealPath()));
            $header = array_map('strtolower', array_shift($data)); // Assuming first row is the header

            foreach ($data as $row) {
                $row = array_combine($header, $row); // Map data to header
                $product = Product::where('name', $row['name'])->first();
                if ($product) {
                    // Update quantity by adding new quantity from CSV
                    $product->quantity += (int)$row['quantity'];
                    $product->save();
                } else {
                    // Create a new product entry with formatted bar_code_symbol
                    Product::create([
                        'type' => $row['type'] ?? 'Standard', // Provide default value if needed
                        'name' => $row['name'],
                        'code' => $row['code'],
                        'bar_code_symbol' => $row['bar code symbol'] ?? '', // Save formatted bar_code_symbol
                        'category_id' => $this->getCategoryId($row['category']),
                        'cost' => $row['cost'] ?? 0, // Default to 0 if cost is missing
                        'price' => $row['price'] ?? 0, // Default to 0 if price is missing
                        'product_tax' => $row['product tax'] ?? 0, // Default to 0 if product_tax is missing
                        'tax_method' => $row['tax method'] ?? 'Exclusive', // Default to 'Exclusive' if missing
                        'quantity' => $row['quantity'] ?? 0, // Default to 0 if quantity is missing
                        'details' => $row['details'] ?? '',
                    ]);
                }
            }

            return redirect()->back()->with([
                'message' => 'Products imported successfully!',
                'title' => 'Saved',
                'type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Please upload a valid CSV file!',
            'title' => 'Fail',
            'type' => 'fail'
        ]);
    }
    private function getCategoryId($categoryName)
    {
        // Assuming you have a Category model and want to link categories by name
        return category::firstOrCreate(['name' => $categoryName])->id;
    }
    public function productsExport()
    {
        $products = Product::all();
        // Define the CSV header
        $csvHeader = ['Type', 'Name', 'Code', 'Bar Code Symbol', 'Category', 'Cost', 'Price', 'Product Tax', 'Tax Method', 'Quantity', 'Details'];
        // Start a buffer and write data to it instead of directly outputting to `php://output`
        $output = fopen('php://temp', 'r+'); // Open temporary file
        // Write header row
        fputcsv($output, $csvHeader);
        // Loop through products and add rows to CSV
        foreach ($products as $product) {
            fputcsv($output, [
                $product->type,
                $product->name,
                $product->code,
                $product->bar_code_symbol,
                optional($product->category)->name,  // Handle null category
                $product->cost,
                $product->price,
                $product->product_tax,
                $product->tax_method,
                $product->quantity,
                $product->details,
            ]);
        }

        // Reset the pointer to the beginning of the file before streaming
        rewind($output);

        // Define headers for CSV download
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="products_sample.csv"',
        ];


        // Stream the CSV file to the browser as a download
        return response()->stream(function () use ($output) {
            fpassthru($output);
            fclose($output);  // Close buffer
        }, 200, $headers);
    }
    public function exportToPDF()
    {
        $products = Product::all();
        $pdf = PDF::loadView('dashboard.product_pdf', compact('products'));
        return $pdf->download('products.pdf');
    }
    public function productUpdate(Request $request)
    {
        try {
            $product = product::findOrFail($request->id);
            $image = $product->image; // Keep the existing image if none is uploaded
            if ($request->hasFile('image')) {
                // Delete the previous image if it exists
                if ($image && Storage::disk('storage')->exists($image)) {
                    Storage::disk('storage')->delete($image);
                }
                if ($request->hasFile('image')) {
                    $image = Storage::disk('storage')->put('images', $request->file('image'));
                }
            }
            $product->update([
                'type' => $request->type,
                'name' => $request->name,
                'code' => $request->code,
                'bar_code_symbol' => $request->bar_code_symbol,
                'category_id' => $request->category,
                'cost' => $request->cost,
                'price' => $request->price,
                'product_tax' => $request->product_tax,
                'tax_method' => $request->tax_method,
                'quantity' => $request->quantity,
                'details' => strip_tags($request->details),
                'image' => $image,
            ]);

            // Redirect with success message
            return redirect('product_list')->with([
                'message' => 'Data has been updated successfully!',
                'title' => 'Success',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            // Handle any error that occurs during the process
            return redirect()->back()->with([
                'message' => 'Data could not be updated. Error: ' . $e->getMessage(),
                'title' => 'Failed',
                'type' => 'danger'
            ])->withInput();
        }
    }
    // Category methods
    public function categoryList()
    {
        $categories = category::get();
        return view('dashboard.category_list', compact('categories'));
    }
    public function categoryAdd()
    {
        return view('dashboard.category_add');
    }
    public function categoryStore(Request $request)
    {
        $image = '';
        if ($request->hasFile('image')) {
            $image = Storage::disk('storage')->put('images', $request->file('image'));
        }
        $category =  category::Create([
            'name' => $request->name,
            'code' => $request->code,
            'image' => $image,
        ]);
        if ($category) {
            return redirect('category_list')->with([
                'message' => 'Data has been saved successfully!',
                'title' => 'Saved',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Data has not been saved successfully!',
                'title' => 'fail',
                'type' => 'fail'
            ]);
        }
    }
    public function categoryEdit($id)
    {
        $category = category::find($id);
        return view('dashboard.category_edit', compact('category'));
    }
    public function categoryUpdate(Request $request)
    {
        try {
            $category = category::findOrFail($request->id);
            $image = $category->image; // Keep the existing image if none is uploaded
            if ($request->hasFile('image')) {
                // Delete the previous image if it exists
                if ($image && Storage::disk('storage')->exists($image)) {
                    Storage::disk('storage')->delete($image);
                }
                if ($request->hasFile('image')) {
                    $image = Storage::disk('storage')->put('images', $request->file('image'));
                }
            }
            // Update the store record
            $category->update([
                'name' => $request->name,
                'code' => $request->code,
                'image' => $image,
            ]);
            // Redirect with success message
            return redirect('category_list')->with([
                'message' => 'Data has been updated successfully!',
                'title' => 'Success',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            // Handle any error that occurs during the process
            return redirect()->back()->with([
                'message' => 'Data could not be updated. Error: ' . $e->getMessage(),
                'title' => 'Failed',
                'type' => 'danger'
            ])->withInput();
        }
    }
    // User methods
    public function userList()
    {
        $users = User::get();
        return view('dashboard.user_list', compact('users'));
    }
    public function userAdd()
    {
        return view('dashboard.user_add');
    }
    public function user_Store(Request $request)
    {
        $user =  User::Create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'status' => $request->status,
            'role' => $request->role,
        ]);
        if ($user) {
            return redirect('user_list')->with([
                'message' => 'User has been saved successfully!',
                'title' => 'Saved',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'User has not been saved successfully!',
                'title' => 'fail',
                'type' => 'fail'
            ]);
        }
    }
    // Customer methods
    public function customerList()
    {
        $customers = User::where('role', 'customer')->get();
        return view('dashboard.customer_list', compact('customers'));
    }
    public function customerAdd()
    {
        return view('dashboard.customer_add');
    }
    public function customerStore(Request $request)
    {
        $customer =  User::Create([
            'first_name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        if ($customer) {
            return redirect('customer_list')->with([
                'message' => 'Customer has been saved successfully!',
                'title' => 'Saved',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Customer has not been saved successfully!',
                'title' => 'fail',
                'type' => 'fail'
            ]);
        }
    }
    // Payment method
    public function processPayment(request $request)
    {
        $saleProduct = SaleProduct::create([
            'items' => $request->totalItems,
            'total_amount' => $request->totalAmount,
            'discount' => $request->discountAmount,
            'tax_amount' => $request->taxAmount,
            'final_amount' => $request->finalAmount,
            'paying_by' => $request->payingBy,
            'payment_note' => $request->paymentNote,
        ]);

        // Loop through products and create SaleProductData records
        if ($saleProduct) {

            foreach ($request->products as $item) {
                $SaleProductData = SaleProductData::create([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'sale_id' => $saleProduct->id,
                ]);
            }

            if ($SaleProductData) {
                return response()->json(['message' => 'Payment Successfully Paid', 'title' => 'Done', 'type' => 'success']);
            } else {
                return response()->json(['message' => 'Payment Not Successfully Paid', 'title' => 'Fail', 'type' => 'warning']);
            }
        }
    }
    // Daily report method
    public function dailyReport()
    {
        $salesData = SaleProduct::selectRaw('DATE(created_at) as date, SUM(total_amount) as total, SUM(items) as items, SUM(discount) as discount, SUM(tax_amount) as tax_amount, SUM(final_amount) as grand_total')
            ->groupBy('date')
            ->get()
            ->keyBy('date');
        $GrandToal = SaleProduct::selectRaw('SUM(final_amount) as grand_total')->get();
        return view('dashboard.daily_report', ['salesData' => $salesData, 'GrandToal' => $GrandToal]);
    }
    // Monthly report method
    public function monthlyReport()
    {
        $salesData = SaleProduct::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_amount) as total, SUM(items) as items, SUM(discount) as discount,SUM(tax_amount) as tax_amount, SUM(final_amount) as grand_total')
            ->groupBy('month')
            ->get()
            ->keyBy('month');
        $GrandTotal = SaleProduct::selectRaw('SUM(final_amount) as grand_total')->first();
        return view('dashboard.monthly_report', ['salesData' => $salesData, 'GrandTotal' => $GrandTotal]);
    }
    public function salesReport()
    {
        $saleProduct = saleProduct::get();
        return view('dashboard.sales_reports', compact('saleProduct'));
    }
    // Sales report methods
    public function salesReportDetail(Request $request)
    {
        $saleProductData = saleProductData::where('sale_id', $request->id)->with('Product')->get();
        $total_amount = $request->total_amount;
        $tax_amount = $request->tax_amount;
        $discount = $request->discount;
        $final_amount = $request->final_amount;


        return view('dashboard.sales_reports_deatil', compact('saleProductData', 'total_amount', 'tax_amount', 'discount', 'final_amount'));
    }
    // Setting methods
    public function settings()
    {
        $settings = QrCodeSetting::get()->first();
        return view('dashboard.settings', compact('settings'));
    }
    public function updateSettings(Request $request)
    {
        try {
            $QrCodeSetting = QrCodeSetting::findOrFail($request->id);
            // Update the store record
            $QrCodeSetting->update([
                'qrcode' => $request->qrcode,
                'company_name' => $request->company_name,
                'tax' => $request->tax,
                'customer_name' => $request->customer_name,
                'sub_total' => $request->sub_total,
            ]);
            // Redirect with success message
            return redirect('settings')->with([
                'message' => 'Qrcode Setting Has been updated successfully!',
                'title' => 'Success',
                'type' => 'success'
            ]);
        } catch (Exception $e) {
            // Handle any error that occurs during the process
            return redirect()->back()->with([
                'message' => 'Qrcode Setting could not be updated. Error: ' . $e->getMessage(),
                'title' => 'Failed',
                'type' => 'danger'
            ])->withInput();
        }
    }
    // Logout methods
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}