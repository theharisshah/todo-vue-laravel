## **Todo App Using Laravel and VueJs**

#### How to run :
```
composer install 
npm install
copy .env.example to .env
set up database
php artisan migrate --seed
npm run dev
```

##### Things To Do:
<ul>
    <li><del>Create Mark Todo Complete API</del></li>
    <li><del>Delete Todo API</del></li>
    <li>Mark All Todos as Complete API</li>
    <li>Delete All Todos API</li>
    <li>Show paginated results</li>
    <li>Filter Date Wise Results</li>
</ul>

##### Backend Details:
I have used service for inserting and updating data which although unnecessary in small project 
but will help those who want to write clean code in Laravel. 
Service helps to keep controllers clean. And services can be used from different types of controllers.
This project would have worked fine without using laravel. The API's can be written using microframeworks
like lumen or flask. And Vue app would have been seperate. But this project was created to show how we can use
Vue with laravel seamlessly. Although in very huge projects this should be avoided as
single monolithic code base is very hard to maintain.
I have seperated API url and WEB url with domain. Check `RouteServiceProvider` for
more details.
