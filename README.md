# learning material management system
 
## Installation
1. Clone this project
    ```bash
    git clone clone razorisuru/learning_management_system
    ```
2. Install dependencies
    ```bash
    composer install
    ```
    And javascript dependencies
    ```bash
    yarn install && yarn dev

    #OR

    npm install && npm run dev
    ```

3. Set up Laravel configurations
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

4. Set your database in .env

5. Migrate database
    ```bash
    php artisan migrate
    php artisan db:seed --class=UsersTableSeeder
    php artisan db:seed --class=DegreeTableSeeder
    php artisan db:seed --class=SubjectsTableSeeder
    ```

6. Serve the application
    ```bash
    php artisan serve
    ```

7. Login credentials

**Email:** isuru@mail.com

**Password:** Isuru@123
