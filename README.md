## Backend Assignment

## Task
You were given a sample [Laravel][laravel] project which implements sort of a personal wishlist
where user can add their wanted products with some basic information (price, link etc.) and
view the list.

#### Refactoring
The `ItemController` is messy. Please use your best judgement to improve the code. Your task
is to identify the imperfect areas and improve them whilst keeping the backwards compatibility.

#### New feature
Please modify the project to add statistics for the wishlist items. Statistics should include:

- total items count
- average price of an item
- the website with the highest total price of its items
- total price of items added this month

The statistics should be exposed using an API endpoint. **Moreover**, user should be able to
display the statistics using a CLI command.

Please also include a way for the command to display a single information from the statistics,
for example just the average price. You can add a command parameter/option to specify which
statistic should be displayed.

## Open questions
Please write your answers to following questions.

> **Please briefly explain your implementation of the new feature**  
>  For Statistics feature i created a small action for each metric
>  this approach guarantee that each standalone metric can be implemented and tested individually
>  then i used the enum to make our Statistics extendable we can add other metrics without touching the api or console command
> i tried to implement a common interface for metrics but the returned data might differ depending on each metric

> **For the refactoring, would you change something else if you had more time?**  
>  For the refactoring part i moved most of the bussins logic away from the controllers if i have more time i will study and make sure the abstraction is not overkill , Implement DDD , for now i have just one domain i thought it's not      needed yet
> ensure the reusability of the code throughout the codebase
> I will develop A common Response / Request Convention to facilitate the integration with others , 
> Writing more test case to make sure everything is covered


## Thank you for including the test it was very helpful during the refactoring
## Running the project
This project requires a database to run. For the server part, you can use `php artisan serve`
or whatever you're most comfortable with.

You can use the attached DB seeder to get data to work with.

#### Running tests
The attached test suite can be run using `php artisan test` command.

[laravel]: https://laravel.com/docs/8.x
