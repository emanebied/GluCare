# Diabetes Management System

The Diabetes Management System is designed to address the specific needs and challenges faced by individuals living with diabetes. It offers a range of features that cater to various aspects of diabetes management, including detection of diabetes, meal planning, exercise tracking, and personalized health insights. By incorporating these features into a single platform, the system aims to streamline the management process and enhance the quality of life for individuals with diabetes. Additionally, the application has its own dedicated extensive API, which requires authentication using Laravel Sanctum package.

## Features

### Authentication and Authorization:

-   User registration, login, and social login integration (Google & Facebook).
-   Forgot password and password reset functionalities.

### Email Verification:

-   Send, check, and resend email verification codes.

### User Profile Management:

-   View and update user profiles.

### Notifications:

-   Manage user notifications, mark as read, and delete.

### Admin Dashboard:

-   Role and permissions management.
-   User management (CRUD operations).
-   Website settings management.

### GluCare Application:

-   Blog management (categories, posts, comments, likes).
-   Appointments management (CRUD, approval).
-   Doctor management (view details).
-   Dietary recommendations (foods, ratings).
-   Activity recommendations (activities, ratings).
-   Patient data management (CRUD operations, health readings).
-   Chat functionality (real-time messaging).
-   Payment integration (Stripe).

### API Integration:

-   Third-party API integration for social login (Google & Facebook).

## Screenshots:

### Home Page:

![Home Page](https://github.com/emanebied/GluCare/assets/165226378/4eee699d-70b3-42a5-a3cd-f225d5bf9fa6)

### Diabetes Detection Page:

![detection](https://github.com/emanebied/GluCare/assets/165226378/bdb6bbb3-6888-4c76-a99a-4d9fa3b4608d)

### Dietary Recommendations Page:

![Dietary Recommendation](https://github.com/emanebied/GluCare/assets/165226378/5fee4f86-307a-4874-ab59-9f556146ad10)

### Activity Recommendations Page:

![activity Recommendation](https://github.com/emanebied/GluCare/assets/165226378/7fdc915b-94de-407c-88b0-a2c39bd832cf)

### Blog Page:

![Blog](https://github.com/emanebied/GluCare/assets/165226378/a94e6fb1-9c2d-409b-9f72-360b943d82bf)

### Live Chat Page:

![LiveChat](https://github.com/emanebied/GluCare/assets/165226378/03c3d2fa-5c01-486e-82a0-982cb1f0d38d)

### Chatbot Page:

![Chatbot](https://github.com/emanebied/GluCare/assets/165226378/a3108aca-0e03-402b-ba6c-df36df7afed7)

### Appointment Page:

![Appointment](https://github.com/emanebied/GluCare/assets/165226378/106ec8ee-3666-47d0-a08f-81364a3a3607)

### Reports Page:

![reports](https://github.com/emanebied/GluCare/assets/165226378/f226dee2-6ecb-4975-a1dc-60bc2d6992df)

### Admin Panel:

![Admin Dashboard](https://github.com/emanebied/GluCare/assets/165226378/40d362b1-42d1-4509-b1c7-55b9c726b3c4)

### Doctor Panel:

![Doctor Dashboard](https://github.com/emanebied/GluCare/assets/165226378/1a6966ae-d9af-46d5-8d4f-674acc092329)

### Employee Panel:

![Employee Dashboard](https://github.com/emanebied/GluCare/assets/165226378/41b155ac-0b5d-4fa6-b818-fc5bc3462f0a)

## Application

1- **GluCare**: The public-facing website can be accessed at http://127.0.0.1:8000/api/glucare This is where users/patients can interact with the website in general.

2- **Admin Panel**: The Admin Panel for managing the application is available at http://127.0.0.1:8000/api/dashboard/admin secure area is exclusively accessible to authorized administrators where only authenticated admin, doctors, and employees can access. It grants access to the administrative functionalities of the application, such as adding new features, users management, creating and editing website settings, etc.

## Application Routes and API Endpoints:

All application routes & API endpoints are defined in the **[api.php](routes/api.php)** file (API Endpoints).

## API Endpoints:

> **_\*\* Check the application API Collection on my Postman Profile: https://documenter.getpostman.com/view/30369130/2sA3JM726Z_**

> **_\*\* Also, you can test the API Endpoints yourself using Postman. Here is the API's Postman Collection .json file [API Postman Collection file](<Postman Collection of API Endpoints/GluCare.postman_collection.json>) that you can download and import into your Postman._**

## Installation & Configuration:

1- Open your terminal, and use the '**_git clone https://github.com/emanebied/GluCare.git_**' command, or just download the ZIP project.

2- Navigate/Change into (using the **cd** command) to the project root directory, then run the '**_composer install_**' command.

4- Create a MySQL database named **\`glucare\`**, then import the **[glucare database SQL Dump File](<database-glucare/glucare-SQL Dump File - phpMyAdmin Export.sql>)** into your **\`glucare\`** database.

5- Navigate to the **[.env](.env)** file and configure/update it with your MySQL database credentials and other configuration settings.

6- Run the '**_php artisan serve_**' command, and then open your browser and visit **http://127.0.0.1:8000**

\*\* Ready-to-use registered accounts credentials you can use to log in:

> 1. admin (to access the Admin Panel): Email: **admin@gmail.com**, Password: **admin@1234**

> 2. doctor (to access the Doctor Panel): Email: **doctor@gmail.com**, Password: **doctor@1234**

> 3. employee (to access the Employee Panel): Email: **employee@gmail.com**, Password: **employee@1234**

> 4. user (to access the Website): Email: **eman@gmail.com**, Password: **eman@1234**

## Contribution:

Contributions to my GluCare Laravel application are most welcome! If you find any issues or have suggestions for improvements or want to add new features, please open an issue or submit a pull request.
