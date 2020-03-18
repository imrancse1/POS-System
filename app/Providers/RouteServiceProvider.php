<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
   
    
    protected $namespaceProduct = 'App\Http\Controllers\Product';
    protected $namespaceWirehouse = 'App\Http\Controllers\Wirehouse';
    protected $namespaceSupplier = 'App\Http\Controllers\Supplier';
    protected $namespaceVendor = 'App\Http\Controllers\Vendor';
    protected $namespaceInventory = 'App\Http\Controllers\Inventory';
    protected $namespaceEmployee = 'App\Http\Controllers\Employee';
    protected $namespacePos = 'App\Http\Controllers\Pos';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));

        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/Routes.php'));     

               
        

        Route::middleware('web')
             ->namespace($this->namespaceProduct)
             ->group(base_path('routes/productRoutes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceWirehouse)
             ->group(base_path('routes/wirehouseRoutes.php'));   

        Route::middleware('web')
             ->namespace($this->namespaceSupplier)
             ->group(base_path('routes/SupplierRoutes.php'));
        Route::middleware('web')
             ->namespace($this->namespaceVendor)
             ->group(base_path('routes/VendorRoutes.php'));
        Route::middleware('web')
             ->namespace($this->namespaceInventory)
             ->group(base_path('routes/InventoryRoutes.php'));
        Route::middleware('web')
             ->namespace($this->namespaceEmployee)
             ->group(base_path('routes/EmployeeRoutes.php'));
        Route::middleware('web')
             ->namespace($this->namespacePos)
             ->group(base_path('routes/PosRoutes.php'));               
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
