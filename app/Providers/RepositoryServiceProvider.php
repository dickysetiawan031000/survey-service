<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Survey\Interfaces\SurveyRepositoryInterface::class,
            \App\Infrastructure\Persistence\Eloquent\SurveyRepository::class
        );

        $this->app->bind(
            \App\Domain\Question\Interfaces\QuestionRepositoryInterface::class,
            \App\Infrastructure\Persistence\Eloquent\QuestionRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
