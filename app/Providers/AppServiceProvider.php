<?php

namespace App\Providers;

use App\QueryBuilders\ClinicsQueryBuilder;
use App\QueryBuilders\DiagnosisQueryBuilder;
use App\QueryBuilders\DoctorsQueryBuilder;
use App\QueryBuilders\DrugsQueryBuilder;
use App\QueryBuilders\MessagesQueryBuilder;
use App\QueryBuilders\OrganizationTypesQueryBuilder;
use App\QueryBuilders\PatientsQueryBuilder;
use App\QueryBuilders\PharmaciesQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\ReceiptsQueryBuilder;
use App\QueryBuilders\SickListsQueryBuilder;
use App\QueryBuilders\SpecialitiesQueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, ReceiptsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, DrugsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, PharmaciesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, ClinicsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, DoctorsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SpecialitiesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, PatientsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, MessagesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, DiagnosisQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, OrganizationTypesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SickListsQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
    }
}
