# Laravel Basic Usage


### Create Model (also migration and seeder):
(https://laravel.com/docs/5.2/eloquent#defining-models)

**Models** *(Eloquent (Laravel's ORM) entities)* are pretty automated so usually the only thing needed is to
create classes that correspond to DB tables and set up relations between them (that represent DB's FK relations).

*Note: there's no need for the in-between table models for many-to-many relations,
but name conventions set by laravel must be met and a migrations for such tables are still required*

`php artisan make:model -m Company` - will create a class (eloquent model)
Company that represents a table Companies in the DB. And thanks to "-m" key a migration file will also be created.
(Migrations: )

Files created:
 - Model: `app/Company.php`
 - Migration: `database/migrations/2016_03_01_225036_create_companies_table.php`


##### Migration:
Is used to store DB changes in VCS and easily redistribute new Schema changes.
(https://laravel.com/docs/5.2/migrations#writing-migrations)

Apply migrations to your DB: `php artisan migrate`

Create a migration: `php artisan make:migration`

File: `database/migrations/2016_03_01_225036_create_companies_table.php`


##### Optional: Define connections between Models (ForeignKey Relations):
Allow us to use calls like `$company->users()` that retrieves all users registered to current company
(https://laravel.com/docs/5.2/eloquent-relationships#defining-relationships)
*Required if Table is connected using FK's*

File: `application/app/Company.php` and Linked models


##### Optional: Create a Seeder
Seeders are used to fill the DB with real-looking fake data. It is recommended to use Factory approach.
(https://laravel.com/docs/5.2/seeding#using-model-factories)

Seed the DB: `php artisan db:seed`


**Create a seeder:**

 - Create a seeder stub: `php artisan make:seeder CompaniesTableSeeder`
    Edit: `database/seeds/CompaniesTableSeeder.php`
    Add: `factory(App\Company::class, 5)->create();`

 - Create a Factory for the Seeder
    Create: `database/factories/CompaniesFactory.php` *(sadly there's no generator command for this yet)*
    Add:
    ```
        return [
            'name' => $faker->unique()->company,
            'created_at' => $faker->dateTime(),
        ];
    ```
    *Faker is a library to generate real-like data (https://github.com/fzaninotto/Faker#basic-usage)*

 - Register the new Seeder so that it will be actually triggered
    *(this step is useful because seeders can depend on each-other so a strict run order should be preserved)*
    Edit: `application/database/seeds/DatabaseSeeder.php`
    Add: `$this->call(CompaniesTableSeeder::class);`


### Create Controller (RESTful)
(https://laravel.com/docs/5.2/controllers)

`php artisan make:controller --resource CompanyController` - Will create a Controller for the Company
that already has all the call functions defined (see documentation section 
"Actions Handled By Resource Controller" for an example).
Note that `--resource` is what makes a controller RESTful.

File created: `app/Http/Controllers/CompanyController.php`


##### Add a route
(https://laravel.com/docs/5.2/routing)

Edit: `app/Http/routes.php`
Add: `Route::resource('company', 'CompanyController');`
*(Resource routes automatically map all REST-related requests to appropriate controller's methods)*


##### Connect Controller with Model
Edit: `app/Http/Controllers/CompanyController.php`
Add:
```
// Get Data from the model
$companies = Company::all();

// Return a JSON data
return response()->json($companies);
```


##### Add saving logic to the Controller
(https://laravel.com/docs/5.2/eloquent#mass-assignment)

